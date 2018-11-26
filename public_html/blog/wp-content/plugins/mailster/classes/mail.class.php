<?php

class MailsterMail {

	public $embed_images = true;
	public $headers = array();
	public $content = '';
	public $plaintext = '';
	public $subject = '';
	public $from;
	public $from_name;
	public $to;
	public $to_name;
	public $bcc;
	public $hash = '';
	public $reply_to;
	public $deliverymethod;
	public $dkim;
	public $bouncemail;
	public $baselink;
	public $add_tracking_image = true;
	public $errors = array();
	public $sent = false;
	public $pre_send = false;

	public $mailer;

	public $attachments = array();

	public $send_limit;
	public $sent_within_period = 0;
	public $sentlimitreached = false;

	private $campaignID = null;
	private $subscriberID = null;
	private $messageID = null;

	public $text = '';

	public $last_error = '';
	private $error_log = array();

	private $hostname = '';

	private static $_instance = null;

	/**
	 *
	 *
	 * @return unknown
	 */
	public static function get_instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	private function __construct() {

		$this->deliverymethod = mailster_option( 'deliverymethod', 'simple' );

		$this->dkim = mailster_option( 'dkim' );

		require_once MAILSTER_DIR . 'classes/mail.helper.class.php';
		$this->mailer = new mailster_mail_helper( true );

		if ( $this->deliverymethod == 'smtp' ) {

			$this->mailer->IsSMTP();

			$this->mailer->Host = mailster_option( 'smtp_host' );
			$this->mailer->Port = mailster_option( 'smtp_port', 25 );
			$this->mailer->Timeout = mailster_option( 'smtp_timeout', 10 );
			$this->mailer->SMTPAuth = ! ! mailster_option( 'smtp_auth', false );
			if ( $this->mailer->SMTPAuth ) {
				$this->mailer->AuthType = mailster_option( 'smtp_auth', '' );
				$this->mailer->Username = mailster_option( 'smtp_user' );
				$this->mailer->Password = mailster_option( 'smtp_pwd' );
			}
			$this->mailer->SMTPSecure = mailster_option( 'smtp_secure', '' );
			$this->mailer->SMTPKeepAlive = true;

			add_action( 'mailster_presend', array( &$this, 'pre_send' ), 1, 10 );
			add_action( 'mailster_dosend', array( &$this, 'do_send' ), 1, 10 );

		} elseif ( $this->deliverymethod == 'gmail' ) {

			$this->mailer->IsSMTP();

			$this->mailer->Host = 'smtp.googlemail.com';
			$this->mailer->Port = 587;
			$this->mailer->SMTPAuth = true;

			$this->mailer->Username = mailster_option( 'gmail_user' );
			$this->mailer->Password = mailster_option( 'gmail_pwd' );

			$this->mailer->SMTPSecure = 'tls';
			$this->mailer->SMTPKeepAlive = true;

			add_action( 'mailster_presend', array( &$this, 'pre_send' ), 1, 10 );
			add_action( 'mailster_dosend', array( &$this, 'do_send' ), 1, 10 );

		} elseif ( $this->deliverymethod == 'simple' ) {

			$method = mailster_option( 'simplemethod' );

			if ( $method == 'sendmail' ) {
				$this->mailer->Sendmail = mailster_option( 'sendmail_path' );
				if ( empty( $this->mailer->Sendmail ) ) {
					$this->mailer->Sendmail = '/usr/sbin/sendmail';
				}

				$this->mailer->IsSendmail();
			} elseif ( $method == 'qmail' ) {
				$this->mailer->IsQmail();
			} else {
				$this->mailer->IsMail();
			}

			add_action( 'mailster_presend', array( &$this, 'pre_send' ), 1, 10 );
			add_action( 'mailster_dosend', array( &$this, 'do_send' ), 1, 10 );

		}

		do_action( 'mailster_initsend', $this );
		do_action( 'mymail_initsend', $this );

		if ( $this->dkim ) {
			$this->mailer->DKIM_selector = mailster_option( 'dkim_selector' );
			$this->mailer->DKIM_domain = mailster_option( 'dkim_domain' );

			$folder = MAILSTER_UPLOAD_DIR . '/dkim';

			$this->mailer->DKIM_private = $folder . '/' . mailster_option( 'dkim_private_hash' ) . '.pem';
			$this->mailer->DKIM_passphrase = mailster_option( 'dkim_passphrase' );
			$this->mailer->DKIM_identity = mailster_option( 'dkim_identity' );
		}

		$this->from = mailster_option( 'from' );
		$this->from_name = mailster_option( 'from_name' );

		$this->send_limit = mailster_option( 'send_limit' );

		$subscriber_errors = array(
			'SMTP Error: The following recipients failed',
			'The following From address failed',
			'Invalid address:',
			'SMTP Error: Data not accepted',
		);
		$this->subscriber_errors = apply_filters( 'mymail_subscriber_errors', apply_filters( 'mailster_subscriber_errors', $subscriber_errors ) );
		$system_errors = array(
			'Not in Time Frame',
		);
		$this->system_errors = apply_filters( 'mailster_system_errors', $system_errors );

		if ( ! get_transient( '_mailster_send_period_timeout' ) ) {
			set_transient( '_mailster_send_period_timeout', true, mailster_option( 'send_period' ) * 3600 );
		} else {
			$this->sent_within_period = get_transient( '_mailster_send_period' );

			if ( ! $this->sent_within_period ) {
				$this->sent_within_period = 0;
			}
		}

		$this->sentlimitreached = $this->sent_within_period >= $this->send_limit;

		if ( $this->sentlimitreached ) {
			$msg = sprintf( __( 'Sent limit of %1$s reached! You have to wait %2$s before you can send more mails!', 'mailster' ), '<strong>' . $this->send_limit . '</strong>', '<strong>' . human_time_diff( get_option( '_transient_timeout__mailster_send_period_timeout' ) ) . '</strong>' );
			mailster_notice( $msg, 'error', false, 'dailylimit' );

			$e = new Exception( $msg, 1 );
			$this->last_error = $e;
			$this->errors[] = $e;

		} else {

			mailster_remove_notice( 'dailylimit' );

		}

		if ( 'smtp' == $this->mailer->Mailer ) {
			$this->mailer->setAsSMTP();
		}

		$this->hostname = $this->serverHostname();

	}


	/**
	 *
	 *
	 * @param unknown $level  (optional)
	 * @param unknown $output (optional)
	 */
	public function debug( $level = 2, $output = null ) {

		if ( $this->mailer && 'smtp' == $this->mailer->Mailer ) {

			if ( version_compare( $this->mailer->Version, '5.2.7' ) <= 0 ) {
				$this->mailer->Debugoutput = 'error_log';
			} else {
				$this->mailer->Debugoutput = is_null( $output ) ? array( &$this, 'debugger' ) : $output;
			}

			$this->mailer->SMTPDebug = $level; // 0 = off, 1 = commands, 2 = commands and data
			// Options: "echo", "html" or "error_log";
		}
	}


	/**
	 *
	 *
	 * @param unknown $str
	 * @param unknown $level
	 */
	public function debugger( $str, $level ) {

		$str = trim( $str );

		if ( ! empty( $str ) ) {
			$this->error_log[] = $str;
		}

	}


	/**
	 *
	 *
	 * @param unknown $separator (optional)
	 * @return unknown
	 */
	public function get_error_log( $separator = "\n" ) {

		return implode( $separator, $this->error_log );

	}


	public function __destruct() {

		$this->close();
	}


	public function close() {
		if ( $this->mailer && $this->mailer->Mailer == 'smtp' ) {
			$this->mailer->SmtpClose();
		}
	}


	/**
	 *
	 *
	 * @param unknown $name
	 * @param unknown $value
	 */
	public function __set( $name, $value ) {
		switch ( $name ) {
			case 'mailer':
			break;
			default:
				$this->{$name} = apply_filters( "mailster_mail_set_{$name}", $value );
		}
	}


	/**
	 *
	 *
	 * @param unknown $name
	 * @return unknown
	 */
	public function __get( $name ) {
		if ( isset( $this->{$name} ) ) {
			return $this->{$name};
		}
		return null;
	}


	/**
	 *
	 *
	 * @param unknown $id
	 */
	public function set_campaign( $id ) {
		$this->campaignID = (int) $id;
		$this->baselink = mailster()->get_base_link( (int) $id );
	}


	/**
	 *
	 *
	 * @param unknown $id
	 */
	public function set_subscriber( $id ) {
		$this->subscriberID = (int) $id;
	}


	/**
	 *
	 *
	 * @param unknown $headers
	 */
	public function apply_raw_headers( $headers ) {
		if ( empty( $headers ) || ! $this->mailer ) {
			return;
		}

		$headers = is_array( $headers ) ? $headers : explode( "\n", $headers );
		foreach ( $headers as $header ) {
			if ( empty( $header ) ) {
				continue;
			}

			if ( preg_match( '#^from: ?(.*) (<([^ ]+)>)?#i', $header, $from ) ) {
				$this->from_name = trim( $from[1], '"' );
				$this->from = isset( $from[3] ) ? trim( $from[3] ) : '';

			} elseif ( preg_match( '#^content-type#i', $header, $from ) ) {
				continue;
			} else {
				$parts = array_map( 'trim', explode( ':', $header ) );
				$this->add_header( $parts[0], $parts[1] );
			}
		}
	}


	/**
	 *
	 *
	 * @param unknown $key
	 * @param unknown $value
	 */
	public function add_header( $key, $value = null ) {
		if ( is_array( $key ) ) {
			$header = $key;
		} else {
			$header = array( $key => $value );
		}

		foreach ( $header as $k => $v ) {
			$this->headers[ $k ] = str_replace( array( "\n", ' ' ), array( '%0D%0A', '%20' ), (string) $v );
		}
	}


	/**
	 *
	 *
	 * @param unknown $header (optional)
	 */
	public function set_headers( $header = array() ) {

		foreach ( $header as $key => $value ) {
			$this->add_header( $key, $value );
		}

		$this->mailer->clearCustomHeaders();

		foreach ( $this->headers as $key => $value ) {
			$this->mailer->addCustomHeader( $key . ':' . $value );
		}

	}


	/**
	 *
	 *
	 * @param unknown $content
	 * @param unknown $headline (optional)
	 * @param unknown $replace  (optional)
	 * @param unknown $force    (optional)
	 * @param unknown $file     (optional)
	 * @param unknown $template (optional)
	 * @return unknown
	 */
	public function send_notification( $content, $headline = null, $replace = array(), $force = false, $file = 'notification.html', $template = null ) {

		if ( is_null( $headline ) ) {
			$headline = $this->subject;
		}

		$template = ! is_null( $template ) ? $template : mailster_option( 'default_template' );

		if ( $template ) {
			$template = mailster( 'template', $template, $file );
			$this->content = $template->get( true, true );
		} else {
			$this->content = '{headline}<br>{content}';
		}

		$placeholder = mailster( 'placeholder', $this->content );

		$placeholder->add( array(
			'subject' => $this->subject,
			'preheader' => $headline,
			'headline' => $headline,
			'content' => $content,
		) );

		$placeholder->add( $replace );

		$this->content = $placeholder->get_content();
		$this->content = mailster( 'helper' )->prepare_content( $this->content );

		$placeholder->set_content( $this->subject );
		$this->subject = $placeholder->get_content();

		$this->add_tracking_image = false;
		$this->embed_images = mailster_option( 'embed_images' );

		$success = $this->send( $force );

		$this->close();
		return $success;

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function send() {

		$this->sent = false;

		if ( $this->sentlimitreached ) {
			return false;
		}

		// add some linebreaks to prevent "auto linebreaks" in UTF 8
		$this->content = str_replace( '</tr>', "</tr>\n", $this->content );

		do_action( 'mailster_presend', $this );
		do_action( 'mymail_presend', $this );
		if ( ! $this->pre_send ) {
			return false;
		}

		do_action( 'mailster_dosend', $this );
		do_action( 'mymail_dosend', $this );

		if ( $this->sent ) {

			$this->sent_within_period++;
			$this->sentlimitreached = $this->sent_within_period >= $this->send_limit;
			set_transient( '_mailster_send_period', $this->sent_within_period );

		}

		if ( $this->sent ) {
			return $this->messageID;
		} else {
			return false;
		}

	}


	public function do_send() {

		try {

			$this->sent = $this->mailer->Send();

		} catch ( _mailster_phpmailerException $e ) {

			$this->last_error = $e;
			$this->errors[] = $e;
			$this->sent = false;

		} catch ( mailerException $e ) {

			$this->last_error = $e;
			$this->errors[] = $e;
			$this->sent = false;

		} catch ( Exception $e ) {

			$this->last_error = $e;
			$this->errors[] = $e;
			$this->sent = false;

		}

	}


	public function reset() {

		$this->mailer->clearAllRecipients();
		$this->mailer->clearAttachments();
		$this->mailer->clearCustomHeaders();
		$this->mailer->clearReplyTos();

	}


	public function pre_send() {

		try {

			$this->messageID = null;
			$this->last_error = null;

			// Empty out the values that may be set
			$this->reset();

			if ( ! is_array( $this->to ) ) {
				$this->to = array( $this->to );
			}
			if ( ! is_array( $this->to_name ) ) {
				$this->to_name = array( $this->to_name );
			}

			foreach ( $this->to as $i => $address ) {
				$this->mailer->AddAddress( $address, isset( $this->to_name[ $i ] ) ? $this->to_name[ $i ] : null );
			}

			if ( $this->bcc ) {
				if ( ! is_array( $this->bcc ) ) {
					$this->bcc = array( $this->bcc );
				}

				foreach ( $this->bcc as $address ) {
					$this->mailer->addBCC( $address );
				}
			}

			$this->subject = htmlspecialchars_decode( $this->subject );
			$this->from_name = htmlspecialchars_decode( $this->from_name );

			$this->mailer->Subject = $this->subject;
			$this->mailer->SetFrom( $this->from, $this->from_name, false );

			$this->mailer->IsHTML( true );

			if ( $this->embed_images ) {
				$this->content = $this->make_img_relative( $this->content );
				$this->mailer->msgHTML( $this->content, trailingslashit( dirname( MAILSTER_UPLOAD_DIR ) ) );
			} else {
				$this->mailer->Body = $this->mailer->normalizeBreaks( $this->content );
			}

			$this->mailer->AltBody = $this->mailer->normalizeBreaks( ! empty( $this->plaintext ) ? $this->plaintext : mailster( 'helper' )->plain_text( $this->content ) );

			( $this->bouncemail )
				? $this->mailer->ReturnPath = $this->mailer->Sender = $this->bouncemail
				: $this->mailer->ReturnPath = $this->mailer->Sender = $this->from;

			( $this->reply_to )
				? $this->mailer->AddReplyTo( $this->reply_to )
				: $this->mailer->AddReplyTo( $this->from );

			// add the tracking image at the bottom
			if ( $this->add_tracking_image ) {

				if ( mailster( 'helper' )->using_permalinks() ) {

					$tracking_url = trailingslashit( $this->baselink ) . $this->hash . '/';

				} else {

					$tracking_url = add_query_arg( array( 'k' => $this->hash ), $this->baselink );

				}

				$this->mailer->Body = str_replace( '</body>', '<img src="' . $tracking_url . '" alt="" width="1" height="1"></body>', $this->mailer->Body );

			}

			$this->messageID = uniqid();
			$this->mailer->messageID = sprintf( '<%s@%s>',
				$this->messageID . '-' . $this->hash . '-' . $this->campaignID . '-' . mailster_option( 'ID' ),
			$this->hostname );

			$this->add_header( 'X-Message-ID', $this->mailer->messageID );

			$this->set_headers();

			if ( is_array( $this->attachments ) ) {
				foreach ( $this->attachments as $name => $attachment ) {
					if ( file_exists( $attachment ) ) {
						$this->mailer->AddAttachment( $attachment, ! is_int( $name ) ? $name : '' );
					}
				}
			}

			$this->pre_send = true;

		} catch ( _mailster_phpmailerException $e ) {

			$this->last_error = $e;
			$this->errors[] = $e;
			$this->pre_send = false;

		} catch ( mailerException $e ) {

			$this->last_error = $e;
			$this->errors[] = $e;
			$this->pre_send = false;

		} catch ( Exception $e ) {

			$this->last_error = $e;
			$this->errors[] = $e;
			$this->sent = false;

		}

	}


	/**
	 *
	 *
	 * @param unknown $error (optional)
	 * @return unknown
	 */
	public function is_user_error( $error = null ) {

		if ( is_null( $error ) ) {
			$error = $this->last_error;
		}

		if ( empty( $error ) ) {
			return false;
		}

		$errormsg = $error->getMessage();

		// check for subscriber error
		foreach ( $this->subscriber_errors as $subscriber_error ) {
			if ( stripos( $errormsg, $subscriber_error ) !== false ) {
				return true;
			}
		}

		return false;

	}


	/**
	 *
	 *
	 * @param unknown $error (optional)
	 * @return unknown
	 */
	public function is_system_error( $error = null ) {

		if ( is_null( $error ) ) {
			$error = $this->last_error;
		}

		if ( empty( $error ) ) {
			return false;
		}

		$errormsg = $error->getMessage();

		// check for subscriber error
		foreach ( $this->system_errors as $system_errors ) {
			if ( stripos( $errormsg, $system_errors ) !== false ) {
				return true;
			}
		}

		return false;

	}


	/**
	 *
	 *
	 * @param unknown $errors
	 */
	public function set_error( $errors ) {
		if ( ! is_array( $errors ) ) {
			$errors = array( $errors );
		}

		foreach ( $errors as $error ) {
			if ( ! is_array( $error ) ) {
				$error = array( $error );
			}

			foreach ( $error as $e ) {
				$this->last_error = new Exception( $e, 1 );
				$this->errors[] = $this->last_error;
			}
		}
	}


	/**
	 *
	 *
	 * @param unknown $format (optional)
	 * @return unknown
	 */
	public function get_errors( $format = '' ) {

		$messages = array();
		if ( ! empty( $this->errors ) ) {

			foreach ( $this->errors as $e ) {
				$m = $e->getMessage();
				if ( ! empty( $m ) ) {
					$messages[] = $e->getMessage();
				}
			}
		}

		switch ( $format ) {
			case 'ul':
			case 'ol':
				$html = '<' . $format . ' class="mailster-mail-error">';
				foreach ( $messages as $msg ) {
					$html .= '<li>' . $msg . '</li>';
				}
				$html .= '</' . $format . '>';
				$return = $html;
			break;
			case 'array':
				$return = $messages;
			break;
			case 'object':
				$return = (object) $messages;
			break;
			case 'string':
				$return = $messages[0];
			break;
			case 'br':
				$format = '<br>';
			default:
				$html = '<span class="mailster-mail-error">';
				foreach ( $messages as $msg ) {
					$html .= $format . $msg . "\n";
				}
				$html .= '</span>';
				$return = $html;
			break;
		}
		return $return;
	}


	/**
	 *
	 *
	 * @param unknown $html
	 * @return unknown
	 */
	public function make_img_relative( $html ) {
		$html = str_replace( ' src="' . trailingslashit( dirname( MAILSTER_UPLOAD_URI ) ), ' src="', $html );
		return $html;
	}


	/**
	 *
	 *
	 * @param unknown $html
	 * @return unknown
	 */
	public function plain_text( $html ) {
		return $this->mailer->html2text( $html );
	}


	/**
	 *
	 *
	 * @return unknown
	 */
	private function ServerHostname() {
		if ( $this->Hostname != '' ) {
			$result = $this->Hostname;
		} elseif ( isset( $_SERVER['SERVER_NAME'] ) && $_SERVER['SERVER_NAME'] != '' ) {
			$result = $_SERVER['SERVER_NAME'];
		} else {
			$result = 'localhost.localdomain';
		}

		return $result;
	}


}
