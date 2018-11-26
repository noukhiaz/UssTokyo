<?php

class MailsterPlaceholder {

	private $content;
	private $styles;
	private $keeptag;
	private $keeptags;
	private $placeholder = array();
	private $campaignID = null;
	private $subscriberID = null;
	private $subscriberHash = null;
	private $progress_conditions = false;
	private $replace_custom = true;
	private $social_services;
	private $apply_the_excerpt_filters = true;
	private $last_post_args = null;

	/**
	 *
	 *
	 * @param unknown $content (optional)
	 */
	public function __construct( $content = '', $deprecated = null ) {

		$this->content = $content;

	}


	public function __destruct() { }


	/**
	 *
	 *
	 * @param unknown $option
	 * @param unknown $fallback
	 * @param unknown $campaignID   (optional)
	 * @param unknown $subscriberID (optional)
	 * @return unknown
	 */
	public function urlencode_tags( $option, $fallback, $campaignID = null, $subscriberID = null ) {

		if ( $subscriber = mailster( 'subscribers' )->get( $subscriberID ) && isset( $subscriber->{$option} ) ) {
			$return = rawurlencode( $subscriber->{$option} );
		} else {
			$return = '{' . $option;
			if ( $fallback ) {
				$return .= '|' . $fallback;
			}

			$return .= '}';
		}

		return $return;
	}


	/**
	 *
	 *
	 * @param unknown $content (optional)
	 */
	public function set_content( $content = '' ) {
		$this->content = $content;
	}


	/**
	 *
	 *
	 * @param unknown $id
	 */
	public function set_campaign( $id ) {
		$this->campaignID = $id;
		$autoresponder = mailster( 'campaigns' )->meta( $id, 'autoresponder' );
		if ( $autoresponder && isset( $autoresponder['since'] ) ) {
			$timeoffset = mailster( 'helper' )->gmt_offset( true );
			$this->set_last_post_args( array(
				'date_query' => array( 'after' => date( 'Y-m-d H:i:s', $autoresponder['since'] + $timeoffset ) ),
			) );
		}
	}


	/**
	 *
	 *
	 * @param unknown $id
	 */
	public function set_subscriber( $id ) {
		$this->subscriberID = $id;
	}

	/**
	 *
	 *
	 * @param unknown $args
	 */
	public function set_last_post_args( $args ) {
		$this->last_post_args = wp_parse_args( $args, $this->last_post_args );
	}


	public function remove_last_post_args() {
		$this->last_post_args = null;
	}


	/**
	 *
	 *
	 * @param unknown $hash
	 */
	public function set_hash( $hash ) {
		$this->subscriberHash = $hash;
	}


	/**
	 *
	 *
	 * @param unknown $bool (optional)
	 */
	public function replace_custom_tags( $bool = true ) {
		$this->replace_custom = $bool;
	}


	/**
	 *
	 *
	 * @param unknown $removeunused         (optional)
	 * @param unknown $placeholders         (optional)
	 * @param unknown $relative_to_absolute (optional)
	 * @return unknown
	 */
	public function get_content( $removeunused = true, $placeholders = array(), $relative_to_absolute = false ) {
		return $this->do_placeholder( $removeunused, $placeholders, $relative_to_absolute );
	}

	public function has_content( $check_for_modules = false ) {
		$html = $this->get_content( false );
		if ( $check_for_modules ) {
			return preg_match( '/<\/module>/', $html );
		}

		return ! empty( trim( $html ) );
	}


	public function clear_placeholder() {
		$this->placeholder = array();
	}


	/**
	 *
	 *
	 * @param unknown $do (optional)
	 */
	public function excerpt_filters( $do = true ) {
		$this->apply_the_excerpt_filters = $do;
	}


	/**
	 *
	 *
	 * @param unknown $campaign_id (optional)
	 * @param unknown $args        (optional)
	 * @return unknown
	 */
	public function add_defaults( $campaign_id = null, $args = array() ) {

		$time = explode( '|', date( 'Y|m|d|H|m', current_time( 'timestamp' ) ) );

		$defaults = array(
			'email' => '<a href="">{emailaddress}</a>',
			'year' => $time[0],
			'month' => $time[1],
			'day' => $time[2],
			'hour' => $time[3],
			'minute' => $time[4],
		);

		if ( $campaign_id ) {
			$meta = mailster( 'campaigns' )->meta( $campaign_id );
			if ( ! $meta ) {
				$meta = mailster( 'campaigns' )->meta_defaults();
			}

			$defaults = wp_parse_args( array(
				'preheader' => $meta['preheader'],
				'subject' => $meta['subject'],
				'webversion' => '<a href="{webversionlink}">{webversionlinktext}</a>',
				'unsub' => '<a href="{unsublink}">{unsublinktext}</a>',
				'forward' => '<a href="{forwardlink}">{forwardlinktext}</a>',
				'profile' => '<a href="{profilelink}">{profilelinktext}</a>',
				'webversionlink' => get_permalink( $campaign_id ),
				'lists' => mailster( 'campaigns' )->get_formated_lists( $campaign_id ),
			), $defaults );

			if ( ! $meta['webversion'] ) {
				$defaults['webversion'] = '';
				$defaults['webversionlink'] = '';
			}

			$this->share_service( get_permalink( $campaign_id ), get_the_title( $campaign_id ) );
		}

		$args = wp_parse_args( $args, $defaults );

		$this->add( apply_filters( 'mailster_placeholder_defaults', $args, $campaign_id ) );
	}


	/**
	 *
	 *
	 * @param unknown $campaign_id
	 * @param unknown $args    (optional)
	 * @return unknown
	 */
	public function add_custom( $campaign_id, $args = array() ) {

		$unsubscribelink = mailster()->get_unsubscribe_link( $campaign_id, $this->subscriberHash );
		$forwardlink = mailster()->get_forward_link( $campaign_id );
		$profilelink = mailster()->get_profile_link( $campaign_id, $this->subscriberHash );

		$defaults = array(
			'webversionlinktext' => mailster_text( 'webversion' ),
			'unsublinktext' => mailster_text( 'unsubscribelink' ),
			'forwardlinktext' => mailster_text( 'forward' ),
			'profilelinktext' => mailster_text( 'profile' ),
			'unsublink' => $unsubscribelink,
			'forwardlink' => $forwardlink,
			'profilelink' => $profilelink,
		);

		$args = wp_parse_args( $args, $defaults );

		$this->add( apply_filters( 'mailster_placeholder_custom', $args, $campaign_id, $this->subscriberID ) );
	}


	/**
	 *
	 *
	 * @param unknown $placeholder (optional)
	 * @param unknown $brackets    (optional)
	 * @return unknown
	 */
	public function add( $placeholder = array(), $brackets = true ) {
		if ( empty( $placeholder ) ) {
			return false;
		}

		foreach ( $placeholder as $key => $value ) {
			( $brackets )
				? $this->placeholder[ '{' . $key . '}' ] = $value
				: $this->placeholder[ $key ] = $value;
		}
	}


	/**
	 *
	 *
	 * @param unknown $bool (optional)
	 */
	public function do_conditions( $bool = true ) {
		$this->progress_conditions = (bool) $bool;
	}


	/**
	 *
	 *
	 * @param unknown $removeunused         (optional)
	 * @param unknown $placeholders         (optional)
	 * @param unknown $relative_to_absolute (optional)
	 * @return unknown
	 */
	public function do_placeholder( $removeunused = true, $placeholders = array(), $relative_to_absolute = false ) {

		// nothing to replace for sure
		if ( empty( $this->content ) || false === strpos( $this->content, '{' ) ) {
			return $this->content;
		}

		$this->add( $placeholders );
		$this->add( mailster_option( 'custom_tags', array() ) );
		$this->add( mailster_option( 'tags', array() ) );

		// temporary remove style blocks
		if ( preg_match_all( '#(<style(>|[^<]+?>)([^<]+)<\/style>)#', $this->content, $this->styles ) ) {
			foreach ( $this->styles[0] as $i => $style ) {
				$this->content = str_replace( $style, '<!--Mailster:styleblock' . $i . '-->', $this->content );
			}
		}

		$this->remove_modules();
		$this->conditions();

		$k = 0;

		// as long there are tags in the content.
		while ( false !== strpos( $this->content, '{' ) ) {
			$this->replace_images( $relative_to_absolute );
			$this->replace_dynamic( $relative_to_absolute );
			$this->replace_static( $removeunused );

			// just in case to prevent infinity loops,
			if ( ++$k >= 10 ) {
				break;
			}
		}

		if ( ! empty( $this->keeptag ) ) {
			foreach ( $this->keeptag as $i => $keeptag ) {
				$this->content = str_replace( '<!--Mailster:keeptag' . $i . '-->', $keeptag, $this->content );
			}
		}

		if ( ! empty( $this->styles[0] ) ) {
			foreach ( $this->styles[0] as $i => $style ) {
				$this->content = str_replace( '<!--Mailster:styleblock' . $i . '-->', $style, $this->content );
			}
		}

		// handle shortcodes.
		$this->content = apply_filters( 'mymail_strip_shortcodes', apply_filters( 'mailster_strip_shortcodes', true ) )
			? strip_shortcodes( $this->content )
			: do_shortcode( $this->content );

		return $this->content;

	}


	/**
	 *
	 *
	 * @param unknown $url
	 * @param unknown $title (optional)
	 */
	private function share_service( $url, $title = '' ) {

		$placeholders = array();

		$social = array( 'twitter', 'facebook', 'google', 'linkedin' );

		$social = implode( '|', apply_filters( 'mymail_share_services', apply_filters( 'mailster_share_services', $social ) ) );

		if ( $count = preg_match_all( '#\{(share:(' . $social . ') ?([^}]+)?)\}#i', $this->content, $hits ) ) {

			for ( $i = 0; $i < $count; $i++ ) {

				$service = $hits[2][ $i ];

				$url = ! empty( $hits[3][ $i ] ) ? $hits[3][ $i ] : $url;

				$placeholders[ $hits[1][ $i ] ] = $this->get_social_service( $service, $url, $title );

			}
		}

		$this->add( $placeholders );

	}


	/**
	 *
	 *
	 * @param unknown $service
	 * @param unknown $url
	 * @param unknown $title    (optional)
	 * @param unknown $fallback (optional)
	 * @return unknown
	 */
	private function get_social_service( $service, $url, $title = '', $fallback = '' ) {

		// bit caching
		if ( ! $this->social_services ) {
			$this->social_services = mailster( 'helper' )->social_services();
		}

		if ( ! isset( $this->social_services[ $service ] ) ) {
			return $fallback;
		}

		$_url = str_replace( array( '%title', '%url' ), array(
				rawurlencode( $title ),
				rawurlencode( $url ),
		), $this->social_services[ $service ]['url'] );

		$content = '<img alt="' . esc_attr( sprintf( __( 'Share this on %s', 'mailster' ), $this->social_services[ $service ]['name'] ) ) . '" src="' . MAILSTER_URI . 'assets/img/share/share_' . $service . '.png" style="display:inline;display:inline !important;" />';

		$content = apply_filters( 'mymail_share_button_' . $service, apply_filters( 'mailster_share_button_' . $service, $content ) );

		return '<a href="' . $_url . '" class="social">' . $content . '</a>' . "\n";

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	private function remove_modules() {

		if ( preg_match_all( '#<module[^>]*?data-tag="{(([a-z0-9_-]+):(-)?([\d]+)(;([0-9;,]+))?)\}"(.*?)".*?</module>#ms', $this->content, $modules ) ) {

			foreach ( $modules[0] as $i => $html ) {

				$search = $modules[0][ $i ];
				$tag = $modules[1][ $i ];
				$post_type = $modules[2][ $i ];
				$post_or_offset = $modules[4][ $i ];

				if ( empty( $modules[3][ $i ] ) ) {
					$post = get_post( $post_or_offset );
				} else {
					$term_ids = ! empty( $modules[6][ $i ] ) ? explode( ';', trim( $modules[6][ $i ] ) ) : array();
					$post = mailster()->get_last_post( $post_or_offset - 1, $post_type, $term_ids, $this->last_post_args, $this->campaignID, $this->subscriberID );
				}

				if ( ! $post ) {
					$this->content = str_replace( $search, '', $this->content );
				}
			}
		}

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function conditions() {

		if ( ! $this->progress_conditions ) {
			return;
		}

		if ( preg_match_all( '#<(module|single|multi)[^>]*?condition="([a-z0-9-_]+)([=!GLTE\^$]+)(.*?)".*?</(\\1)>#ms', $this->content, $conditions ) ) {

			$subscriber = $this->subscriberID ? mailster( 'subscribers' )->get( $this->subscriberID, true ) : false;

			foreach ( $conditions[0] as $i => $html ) {
				$key = $conditions[2][ $i ];
				$operator = $conditions[3][ $i ];
				$value = $conditions[4][ $i ];

				if ( $operator == '=' && isset( $subscriber->{$key} ) && $subscriber->{$key} == $value ) {
					continue;
				}

				if ( $operator == '!=' && ( ! isset( $subscriber->{$key} ) || $subscriber->{$key} != $value ) ) {
					continue;
				}

				if ( $operator == '^' && isset( $subscriber->{$key} ) && false !== ( strrpos( $subscriber->{$key}, $value, -strlen( $subscriber->{$key} ) ) ) ) {
					continue;
				}

				if ( $operator == '$' && isset( $subscriber->{$key} ) && false !== ( ( $t = strlen( $subscriber->{$key} ) - strlen( $value ) ) >= 0 && strpos( $subscriber->{$key}, $value, $t ) ) ) {
					continue;
				}

				if ( $operator == 'GT' && isset( $subscriber->{$key} ) && $subscriber->{$key} > $value ) {
					continue;
				}

				if ( $operator == 'GTE' && isset( $subscriber->{$key} ) && $subscriber->{$key} >= $value ) {
					continue;
				}

				if ( $operator == 'LT' && isset( $subscriber->{$key} ) && $subscriber->{$key} < $value ) {
					continue;
				}

				if ( $operator == 'LTE' && isset( $subscriber->{$key} ) && $subscriber->{$key} <= $value ) {
					continue;
				}

				$this->content = str_replace( $html, '', $this->content );
			}
		}

		if ( preg_match_all( '#<if field="([a-z0-9-_]+)" operator="([a-z_]+)+" value="(.*?)">(.*?)</if>#s', $this->content, $if_conditions ) ) {

			$subscriber = $this->subscriberID ? mailster( 'subscribers' )->get( $this->subscriberID, true ) : false;

			foreach ( $if_conditions[0] as $i => $ifhtml ) {

				// if condition passed
				if ( $this->check_condition( $subscriber, $if_conditions[1][ $i ], $if_conditions[2][ $i ], $if_conditions[3][ $i ] ) ) {

					$html = $if_conditions[4][ $i ];
					$html = preg_replace( '#<elseif(.*?)<\/elseif>#s', '', $if_conditions[4][ $i ] );
					$html = preg_replace( '#<else(.*?)<\/else>#s', '', $html );
					$this->content = str_replace( $ifhtml, $html, $this->content );

				} else {

					// elseif exists
					if ( preg_match_all( '#<elseif field="([a-z0-9-_]+)" operator="([a-z_]+)+" value="(.*?)">(.*?)</elseif>#s', $ifhtml, $elseif_conditions ) ) {

						foreach ( $elseif_conditions[0] as $j => $elseifhtml ) {

							// elseif condition passed
							if ( $this->check_condition( $subscriber, $elseif_conditions[1][ $j ], $elseif_conditions[2][ $j ], $elseif_conditions[3][ $j ] ) ) {

								$this->content = str_replace( $ifhtml, $elseif_conditions[4][ $j ], $this->content );

								break;

							} elseif ( $j == count( $elseif_conditions[0] ) - 1 ) {
									// no elseif passes
								if ( preg_match( '#<else>(.*?)</else>#s', $ifhtml, $else_conditions ) ) {

									$this->content = str_replace( $ifhtml, $else_conditions[1], $this->content );

									break;

								}
							}
						}

						// no else if but else
					} elseif ( preg_match( '#<else>(.*?)</else>#s', $ifhtml, $else_conditions ) ) {

						$this->content = str_replace( $ifhtml, $else_conditions[1], $this->content );

						// only if statement but didn't pass
					} else {

						$this->content = str_replace( $ifhtml, '', $this->content );

					}
				}
			}
		}

		return $this->content;

	}


	/**
	 *
	 *
	 * @param unknown $subscriber
	 * @param unknown $field
	 * @param unknown $operator
	 * @param unknown $value
	 * @return unknown
	 */
	private function check_condition( $subscriber, $field, $operator, $value ) {

		// return only true if operator is is_not
		if ( ! isset( $subscriber->{$field} ) ) {
			return $operator == 'is_not' || $operator == 'not_pattern';
		}

		switch ( $operator ) {
			case 'is':return $subscriber->{$field} == $value;
			case 'is_not':return $subscriber->{$field} != $value;
			case 'begin_with':return false !== ( strrpos( $subscriber->{$key}, $value, - strlen( $subscriber->{$key} ) ) );
			case 'end_with':return false !== ( ( $t = strlen( $subscriber->{$key} ) - strlen( $value ) ) >= 0 && strpos( $subscriber->{$key}, $value, $t ) );
			case 'is_greater':return $subscriber->{$key} > $value;
			case 'is_greater_equal':return $subscriber->{$key} >= $value;
			case 'is_smaller':return $subscriber->{$key} < $value;
			case 'is_smaller_equal':return $subscriber->{$key} <= $value;
			case 'pattern':return preg_match( '#' . preg_quote( $subscriber->{$key} ) . '#', $value );
			case 'not_pattern':return ! preg_match( '#' . preg_quote( $subscriber->{$key} ) . '#', $value );
		}

		return false;

	}


	/**
	 *
	 *
	 * @param unknown $relative_to_absolute (optional)
	 */
	private function replace_images( $relative_to_absolute = false ) {

		// placeholder images
		if ( $count = preg_match_all( '#<(img|td|th|v:fill)([^>]*)(src|background)="(.*)\?action=mailster_image_placeholder([^"]+)"([^>]*)>#', $this->content, $hits ) ) {

			for ( $i = 0; $i < $count; $i++ ) {

				$search = $hits[0][ $i ];

				// check if string is still there
				if ( $i && false === strrpos( $this->content, $search ) ) {
					continue;
				}
				$tag = $hits[1][ $i ];
				$pre_stuff = $hits[2][ $i ];
				$attribute = $hits[3][ $i ];
				$imagestring = $hits[4][ $i ];
				$querystring = str_replace( '&amp;', '&', $hits[5][ $i ] );
				$post_stuff = $hits[6][ $i ];
				$is_img_tag = 'img' == $tag;

				parse_str( $querystring, $query );

				if ( isset( $query['tag'] ) ) {

					$replace_to = mailster_cache_get( 'mailster_' . $querystring );

					if ( false === $replace_to ) {

						$parts = explode( ':', trim( $query['tag'] ) );
						$factor = isset( $query['f'] ) && $is_img_tag ? (int) $query['f'] : 1;
						$width = isset( $query['w'] ) ? (int) $query['w'] * $factor : null;
						$height = isset( $query['h'] ) ? (int) $query['h'] * $factor : null;
						$crop = isset( $query['c'] ) && $height ? ! ! ( $query['c'] ) : false;
						$post_type = str_replace( '_image', '', $parts[0] );
						$is_post = $post_type != $parts[0];
						$org_src = false;

						if ( $is_post ) {
							// cropping requires height
							if ( ! $crop ) {
								$height = null;
							}
							$extra = explode( '|', $parts[1] );
							$term_ids = explode( ';', $extra[0] );
							$fallback_id = isset( $extra[1] ) ? (int) $extra[1] : mailster_option( 'fallback_image' );
							$post_id = (int) array_shift( $term_ids );

							if ( $post_id < 0 ) {

								$post = mailster()->get_last_post( abs( $post_id ) - 1, $post_type, $term_ids, $this->last_post_args, $this->campaignID, $this->subscriberID );

							} elseif ( $post_id > 0 ) {

								if ( $relative_to_absolute ) {
									continue;
								}

								$post = get_post( $post_id );

							}
						} else {

							$fallback_id = mailster_option( 'fallback_image' );
							$post = null;
							$thumb_id = null;
							$src = apply_filters( 'mailster_image_placeholder', $query['tag'], $width, $height, $crop, $this->campaignID, $this->subscriberID );
							if ( $src && $src != $query['tag'] ) {
								if ( ! is_array( $src ) ) {
									$src = array( $src, $width, $height );
								}
								$org_src = $src;
							}
						}

						if ( ! $relative_to_absolute ) {

							if ( ! empty( $post ) ) {
								$thumb_id = get_post_thumbnail_id( $post->ID );

								$org_src = wp_get_attachment_image_src( $thumb_id, 'full' );

								if ( empty( $org_src ) && isset( $post->post_image ) ) {
									if ( is_numeric( $post->post_image ) ) {
										$org_src = wp_get_attachment_image_src( $post->post_image, 'full' );
									} else {
										$org_src = array( $post->post_image,0,0,false );
									}
								}
							}

							if ( empty( $org_src ) && $fallback_id ) {
								$thumb_id = $fallback_id;

								$org_src = wp_get_attachment_image_src( $thumb_id, 'full' );

							}

							if ( ! empty( $org_src ) ) {

								if ( $org_src[1] && $org_src[2] ) {
									$asp = $org_src[1] / $org_src[2];
									$height = $height ? $height : round( ($width / $asp) / $factor );
									$img = mailster( 'helper' )->create_image( $thumb_id, $org_src[0], $width, $height, $crop );
								} else {
									$img = array( 'url' => $org_src[0] );
								}

								if ( $is_img_tag ) {
									// set new height
									$post_stuff = preg_replace( '# height="(\d+)"#i', $height ? ' height="' . $height . '"' : '', $post_stuff );
									$pre_stuff = preg_replace( '# height="(\d+)"#i', $height ? ' height="' . $height . '"' : '', $pre_stuff );

									$replace_to = '<img ' . $pre_stuff . 'src="' . $img['url'] . '" ' . $post_stuff . '>';
								} else {
									$pre_stuff = str_replace( $imagestring, $img['url'], $pre_stuff );
									$post_stuff = str_replace( $imagestring, $img['url'], $post_stuff );
									$replace_to = '<' . $tag . ' ' . $pre_stuff . 'background="' . $img['url'] . '" ' . $post_stuff . '>';
								}
							} else {

								if ( $is_img_tag ) {
									$replace_to = '';
								} else {
									$pre_stuff = str_replace( $imagestring, '', $pre_stuff );
									$post_stuff = str_replace( $imagestring, '', $post_stuff );
									$replace_to = '<' . $tag . ' ' . $pre_stuff . 'background="" ' . $post_stuff . '>';
								}
							}

							mailster_cache_set( 'mailster_' . $querystring, $replace_to );

						} else {

							$replace_to = str_replace( 'tag=' . $query['tag'], 'tag=' . $post_type . '_image:' . $post->ID, $search );

						}
					}

					if ( false !== $replace_to ) {
						$replace_to = apply_filters( 'mailster_replace_image', $replace_to, $search, $this->campaignID, $this->subscriberID );
						$this->content = str_replace( $search, $replace_to, $this->content );
					}
				}
			}
		}
	}


	/**
	 *
	 *
	 * @param unknown $relative_to_absolute (optional)
	 */
	private function replace_dynamic( $relative_to_absolute = false ) {

		// all dynamic post type tags
		if ( $count = preg_match_all( '#\{(([a-z0-9_-]+)_([^}]+):(-)?([\d]+)(;([0-9;,]+))?)\}#i', $this->content, $hits ) ) {

			for ( $i = 0; $i < $count; $i++ ) {

				$search = $hits[0][ $i ];
				$post_or_offset = $hits[5][ $i ];
				$post_type = $hits[2][ $i ];

				if ( empty( $hits[4][ $i ] ) ) {

					if ( $relative_to_absolute ) {
						continue;
					}

					$post = get_post( $post_or_offset );

					if ( ! $post ) {
						continue;
					}

					if ( empty( $post->post_excerpt ) ) {
						if ( preg_match( '/<!--more(.*?)?-->/', $post->post_content, $matches ) ) {
							$content = explode( $matches[0], $post->post_content, 2 );
							$post->post_excerpt = trim( $content[0] );
						}
						if ( ! $post->post_excerpt ) {
							$post->post_excerpt = mailster( 'helper' )->get_excerpt( $post->post_content );
						}
					}
					if ( $this->apply_the_excerpt_filters ) {
						if ( $length = apply_filters( 'mailster_excerpt_length', false ) ) {
							$post->post_excerpt = wp_trim_words( $post->post_excerpt, $length );
						}
						$post->post_excerpt = apply_filters( 'the_excerpt', $post->post_excerpt );
					}
				} else {

					$term_ids = ! empty( $hits[7][ $i ] ) ? explode( ';', trim( $hits[7][ $i ] ) ) : array();
					$post = mailster()->get_last_post( $post_or_offset - 1, $post_type, $term_ids, $this->last_post_args, $this->campaignID, $this->subscriberID );

				}

				if ( $relative_to_absolute ) {

					$replace_to = '{' . $post_type . '_' . $hits[3][ $i ] . ':' . $post->ID . '}';

				} elseif ( $post ) {

					$what = $hits[3][ $i ];

					$replace_to = $this->get_replace( $post, $what );

					if ( is_null( $replace_to ) ) {
						continue;
					}
				} else {
					$replace_to = '';
				}

				$this->content = str_replace( $search, $replace_to, $this->content );

			}
		}

		if ( ! $relative_to_absolute ) {
			if ( $count = preg_match_all( '#\{(tweet:([^}|]+)\|?([^}]+)?)\}#i', $this->content, $hits ) ) {

				for ( $i = 0; $i < $count; $i++ ) {
					$search = $hits[0][ $i ];
					$tweet = $this->get_last_tweet( $hits[2][ $i ], $hits[3][ $i ] );
					$this->content = str_replace( $search, $tweet, $this->content );
				}
			}
		}

	}


	/**
	 *
	 *
	 */
	private function replace_static( $removeunused = true ) {

		global $mailster_tags;

		$keep = $this->get_keep_tags();

		// replace static
		if ( $count = preg_match_all( '#\{([a-z0-9-_]+):?([^\}|]+)?\|?([^\}]+)?\}#i', $this->content, $hits_fallback ) ) {

			for ( $i = 0; $i < $count; $i++ ) {

				$search = $hits_fallback[0][ $i ];

				// check if string is still there
				if ( $i && false === strrpos( $this->content, $search ) ) {
					continue;
				}

				$tag = $hits_fallback[1][ $i ];
				$option = $hits_fallback[2][ $i ];
				$fallback = $hits_fallback[3][ $i ];
				$replace = '';

				// tag is in placeholders
				if ( isset( $this->placeholder[ $search ] ) ) {
					$replace = $this->placeholder[ $search ];

					// tag is a custom tag
				} elseif ( isset( $this->placeholder[ '{' . $tag . '}' ] ) ) {
					$replace = $this->placeholder[ '{' . $tag . '}' ];

					// tag is a custom tag
				} elseif ( isset( $mailster_tags[ $tag ] ) && $this->replace_custom ) {
					$replace = call_user_func_array( $mailster_tags[ $tag ], array( $option, $fallback, $this->campaignID, $this->subscriberID ) );
					// prevent infinity loops if replace contains it's own tag
					if ( false !== strpos( $replace, '{' . $tag ) ) {
						$replace = str_replace( array( '{', '}' ), array( '!', '!' ), $replace );
					}

					// tag should be kept
				} elseif ( in_array( $tag, $keep ) ) {
					if ( $fallback ) {
						$replace = $fallback;
					} else {
						$this->keeptag[ $i ] = $search;
						$replace = '<!--Mailster:keeptag' . $i . '-->';
					}

					// keep unused
				} elseif ( ! $removeunused ) {
					continue;
				}
				$replace_to = apply_filters( 'mailster_replace_' . $tag, $replace, $option, $fallback, $this->campaignID, $this->subscriberID );

				$this->content = str_replace( $search, $replace_to, $this->content );
			}

			// break out to prevent infinity loop
			if ( ! $removeunused ) {
				// break;
			}
		}

	}

	public function get_replace( $post, $what ) {

		$extra = null;
		$post_type = $post->post_type;
		$timeformat = mailster( 'helper' )->timeformat();
		$dateformat = mailster( 'helper' )->dateformat();

		if ( 0 === strpos( $what, 'author' ) ) {
			$author = get_user_by( 'id', $post->post_author );
			$extra = $author;

		} elseif ( 0 === strpos( $what, 'meta[' ) ) {
			preg_match( '#meta\[(.*)\]#i', $what, $metakey );
			if ( ! isset( $metakey[1] ) ) {
				return null;
			}

			$metakey = trim( $metakey[1] );
			$metavalue = get_post_meta( $post->ID, $metakey, true );
			if ( is_null( $metavalue ) ) {
				return null;
			}

			$what = 'meta';
			$extra = $metakey;

		} elseif ( 0 === strpos( $what, 'category' ) ) {
			preg_match( '#category\[(.*)\]#i', $what, $category );
			if ( isset( $category[1] ) ) {
				$category = trim( $category[1] );
			} else {
				$category = 'category';
			}
			$categories = get_the_term_list( $post->ID, $category, '', ', ' );

			if ( is_wp_error( $categories ) ) {
				return null;
			}

			if ( 'category_strip' != $what ) {
				$what = 'category';
			}
			$extra = $categories;
		}

		switch ( $what ) {
			case 'id':
				$replace_to = $post->ID;
				break;
			case 'link':
			case 'permalink':
				$replace_to = get_permalink( $post->ID );
				if ( ! $replace_to ) {
					$replace_to = $post->post_link;
				}
				if ( ! $replace_to ) {
					$replace_to = $post->post_permalink;
				}
				break;
			case 'shortlink':
				$replace_to = wp_get_shortlink( $post->ID );
				break;
			case 'author':
			case 'author_strip':
				if ( $author->data->user_url && $what != 'author_strip' ) {
					$replace_to = '<a href="' . $author->data->user_url . '">' . $author->data->display_name . '</a>';
				} else {
					$replace_to = $author->data->display_name;
				}
				break;
			case 'author_name':
				$replace_to = $author->data->display_name;
				break;
			case 'author_nicename':
				$replace_to = $author->data->user_nicename;
				break;
			case 'author_email':
				$replace_to = $author->data->user_email;
				break;
			case 'author_url':
				$replace_to = $author->data->user_url;
				break;
			case 'date':
			case 'date_gmt':
			case 'modified':
			case 'modified_gmt':
				$replace_to = date( $dateformat, strtotime( $post->{'post_' . $what} ) );
				break;
			case 'time':
				$what = 'date';
			case 'time_gmt':
				$what = isset( $what ) ? $what : 'date_gmt';
			case 'modified_time':
				$what = isset( $what ) ? $what : 'modified';
			case 'modified_time_gmt':
				$what = isset( $what ) ? $what : 'modified_gmt';
				$replace_to = date( $timeformat, strtotime( $post->{'post_' . $what} ) );
				break;
			case 'excerpt':
				if ( ! empty( $post->{'post_excerpt'} ) ) {
					$replace_to = wpautop( $post->{'post_excerpt'} );
				} else {
					$replace_to = mailster( 'helper' )->get_excerpt( $post->{'post_content'} );
				}
				break;
			case 'content':
				$replace_to = wpautop( $post->{'post_content'} );
				break;
			case 'meta':
				$replace_to = maybe_unserialize( $metavalue );
				break;
			case 'category':
				$replace_to = $categories;
				break;
			case 'category_strip':
				$replace_to = strip_tags( $categories );
				break;
			case 'twitter':
			case 'facebook':
			case 'google':
			case 'linkedin':
				$replace_to = $this->get_social_service( $what, get_permalink( $post->ID ), get_the_title( $post->ID ) );
				break;
			case 'image':
				$replace_to = '[' . ( sprintf( __( 'use the tag %s as url in the editbar', 'mailster' ), '"' . $hits[1][ $i ] . '"' ) ) . ']';
				break;
			default:
				if ( isset( $post->{'post_' . $what} ) ) {
					$replace_to = $post->{'post_' . $what};
				} elseif ( isset( $post->{$what} ) ) {
					$replace_to = $post->{$what};
				} else {
					$replace_to = '';
				}
		}

		return apply_filters( 'mailster_replace_' . $post_type . '_' . $what, $replace_to, $post, $extra, $this->campaignID, $this->subscriberID );

	}


	private function replace_embeds() {

		// TODO
		/*
		require_once( ABSPATH . WPINC . '/class-oembed.php' );
		$oembed = _wp_oembed_get_object();

		if(preg_match_all('#<iframe.*?src="([^"]+)".*?>.*?<\/iframe>#', $this->content, $iframes)){

		foreach($iframes[0] as $i => $iframe){
		$width = NULL;
		$height = NULL;
		$src = $iframes[1][$i];
		if(preg_match('#width="([^"]+)"#', $iframe, $match)) $width = $match[1];
		if(preg_match('#height="([^"]+)"#', $iframe, $match)) $height = $match[1];
		if(preg_match('#youtube\.com/embed/([a-zA-Z0-9]+)$#',$src, $id)){
		$src = 'http://img.youtube.com/vi/'.$id[1].'/maxresdefault.jpg';
		}
		$this->content = str_replace($iframe, $width.' '.$height.' '.$src, $this->content);
		}
		}
		*/
	}


	/**
	 *
	 *
	 * @param unknown $username
	 * @param unknown $fallback (optional)
	 * @return unknown
	 */
	private function get_last_tweet( $username, $fallback = '' ) {

		if ( false === ( $tweet = get_transient( 'mailster_tweet_' . $username ) ) ) {

			$token = mailster_option( 'twitter_token' );
			$token_secret = mailster_option( 'twitter_token_secret' );
			$consumer_key = mailster_option( 'twitter_consumer_key' );
			$consumer_secret = mailster_option( 'twitter_consumer_secret' );

			if ( ! $token || ! $token_secret || ! $consumer_key || ! $consumer_secret ) {

				return __( 'Please enter your Twitter application credentials on the settings page', 'mailster' );

			}

			require_once MAILSTER_DIR . 'classes/libs/twitter.class.php';

			$twitter = new TwitterApiClass( $token, $token_secret, $consumer_key, $consumer_secret );

			if ( is_numeric( $username ) ) {
				$method = 'statuses/show/' . $username;

				$args = array();
			} else {
				$method = 'statuses/user_timeline';

				$args = array(
					'screen_name' => $username,
					'count' => 1,
					'include_rts' => false,
					'exclude_replies' => true,
					'include_entities' => true,
				);
			}

			$response = $twitter->query( $method, $args );

			if ( is_wp_error( $response ) ) {
				return $fallback;
			}

			$data = $response;

			if ( isset( $data->errors ) ) {
				return $fallback;
			}

			if ( isset( $data->error ) ) {
				return $fallback;
			}

			$tweet = ( is_array( $data ) ) ? $data[0] : $data;

			if ( ! isset( $tweet->text ) ) {
				return $fallback;
			}

			if ( $tweet->entities->hashtags ) {
				foreach ( $tweet->entities->hashtags as $hashtag ) {
					$tweet->text = str_replace( '#' . $hashtag->text, '#<a href="https://twitter.com/search/%23' . $hashtag->text . '">' . $hashtag->text . '</a>', $tweet->text );

				}
			}
			if ( $tweet->entities->urls ) {
				foreach ( $tweet->entities->urls as $url ) {
					$tweet->text = str_replace( $url->url, '<a href="' . $url->url . '">' . $url->display_url . '</a>', $tweet->text );

				}
			}

			// $tweet->text = preg_replace('/(http|https|ftp|ftps)\:\/\/([a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*))?/','<a href="\0">\2</a>', $tweet->text);
			// $tweet->text = preg_replace('/(^|\s)#(\w+)/','\1#<a href="https://twitter.com/search/%23\2">\2</a>',$tweet->text);
			$tweet->text = preg_replace( '/(^|\s)@(\w+)/', '\1@<a href="https://twitter.com/\2">\2</a>', $tweet->text );

			set_transient( 'mailster_tweet_' . $username, $tweet, 60 * mailster_option( 'tweet_cache_time' ) );
		}

		return $tweet->text;
	}


	private function get_keep_tags() {
		if ( is_null( $this->keeptags ) ) {
			$this->keeptags = array_unique( (array) apply_filters( 'mailster_keep_tags', array() ) );
		}
		return $this->keeptags;

	}

}
