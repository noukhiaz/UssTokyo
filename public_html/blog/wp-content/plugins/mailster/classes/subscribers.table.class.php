<?php

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Mailster_Subscribers_Table extends WP_List_Table {

	public $total_items;
	public $total_pages;
	public $per_page;

	public function __construct() {

		parent::__construct( array(
			'singular' => __( 'Subscriber', 'mailster' ), // singular name of the listed records
			'plural' => __( 'Subscribers', 'mailster' ), // plural name of the listed records
			'ajax' => false, // does this table support ajax?
		) );

		add_action( 'admin_footer', array( &$this, 'script' ) );
		add_filter( 'manage_newsletter_page_mailster_subscribers_columns', array( &$this, 'get_columns' ) );

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_views() {

		$counts = mailster( 'subscribers' )->get_count_by_status();
		$statuses = mailster( 'subscribers' )->get_status();
		$statuses_nice = mailster( 'subscribers' )->get_status( null, true );
		$link = admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers' );
		// $link = add_query_arg( array() );
		$views = array(
			'view-all' => '<a href="' . remove_query_arg( 'status', $link ) . '">' . __( 'All', 'mailster' ) . ' <span class="count">(' . number_format_i18n( array_sum( $counts ) ) . ')</span></a>',
		);

		foreach ( $counts as $id => $count ) {
			$views[ 'view-' . $statuses[ $id ] ] = '<a href="' . add_query_arg( array( 'status' => $id ), $link ) . '">' . $statuses_nice[ $id ] . ' <span class="count">(' . number_format_i18n( $count ) . ')</span></a>';
		}

		return $views;
	}


	public function script() {
	}


	public function no_items() {

		$status = isset( $_GET['status'] ) ? (int) $_GET['status'] : null;

		switch ( $status ) {
			case '0': // pending
				esc_html_e( 'No pending subscribers found', 'mailster' );
			break;
			case '2': // unsubscribed
				esc_html_e( 'No unsubscribed subscribers found', 'mailster' );
			break;
			case '3': // hardbounced
				esc_html_e( 'No hardbounced subscribers found', 'mailster' );
			break;
			case '4': // error
				esc_html_e( 'No subscriber with delivery errors found', 'mailster' );
			break;
			default:
				esc_html_e( 'No subscribers found', 'mailster' );

		}

		if ( current_user_can( 'mailster_add_subscribers' ) ) {
			echo ' <a href="edit.php?post_type=newsletter&page=mailster_subscribers&new">' . __( 'Add New', 'mailster' ) . '</a>';
		}

	}


	/**
	 *
	 *
	 * @param unknown $text
	 * @param unknown $input_id
	 */
	public function search_box( $text, $input_id ) {

		if ( ! count( $this->items ) && ! isset( $_GET['s'] ) ) {
			return;
		}

		if ( isset( $_GET['conditions'] ) ) {
			mailster( 'conditions' )->render( $_GET['conditions'] );
		}

?>
	<form id="searchform" action method="get">
	<?php if ( isset( $_GET['post_type'] ) ) : ?><input type="hidden" name="post_type" value="<?php echo esc_attr( $_GET['post_type'] ) ?>"><?php endif; ?>
	<?php if ( isset( $_GET['page'] ) ) : ?><input type="hidden" name="page" value="<?php echo esc_attr( $_GET['page'] ) ?>"><?php endif; ?>
	<?php if ( isset( $_GET['paged'] ) ) : ?><input type="hidden" name="_paged" value="<?php echo esc_attr( $_GET['paged'] ) ?>"><?php endif; ?>
	<?php if ( isset( $_GET['status'] ) ) : ?><input type="hidden" name="status" value="<?php echo esc_attr( $_GET['status'] ) ?>"><?php endif; ?>
	<?php if ( isset( $_GET['lists'] ) ) :
		foreach ( array_filter( (array) $_GET['lists'], 'is_numeric' ) as $list_id ) {?>
	            <input type="hidden" name="lists[]" value="<?php echo $list_id ?>">
	        <?php }endif;?>
	<p class="search-box">
		<label class="screen-reader-text" for="sa-search-input"><?php echo $text; ?></label>
		<input type="search" id="<?php echo $input_id ?>" name="s" value="<?php if ( isset( $_GET['s'] ) ) {
			echo esc_attr( stripslashes( $_GET['s'] ) );
}
		?>">
		<input type="submit" name="" id="search-submit" class="button" value="<?php echo esc_attr( $text ); ?>">
	</p>
	</form>
<?php
	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_columns() {
		return mailster( 'subscribers' )->get_columns();
	}


	/**
	 *
	 *
	 * @param unknown $item
	 * @param unknown $column_name
	 * @return unknown
	 */
	public function column_default( $item, $column_name ) {

		switch ( $column_name ) {

			case 'name':

				if ( get_option( 'show_avatars' ) ) {
					$avatar = '<div class="mailster-avatar"><a href="' . admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&ID=' . $item->ID ) . '"><span class="mailster-avatar-40' . ( $item->wp_id ? ' wp-user' : '' ) . '" style="background-image:url(' . mailster( 'subscribers' )->get_gravatar_uri( $item->email, 80 ) . ')"></span></a></div>';
				} else {
					$avatar = '';
				}

				if ( $item->fullname ) {
					$html = '<a class="name" href="' . admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&ID=' . $item->ID ) . '">' . $item->fullname . '</a><br><a class="email" href="' . admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&ID=' . $item->ID ) . '" title="' . $item->{'email'} . '">' . $item->{'email'} . '</a>';
				} else {
					$html = '<a class="name" href="' . admin_url( 'edit.php?post_type=newsletter&page=mailster_subscribers&ID=' . $item->ID ) . '" title="' . $item->{'email'} . '">' . $item->{'email'} . '</a><br><span class="email">&nbsp;</span>';
				}

				$stars = ( round( $item->rating / 10, 2 ) * 50 );
				$full = max( 0, min( 5, floor( $stars ) ) );
				$half = max( 0, min( 5, round( $stars - $full ) ) );
				$empty = max( 0, min( 5, 5 - $full - $half ) );

				$userrating = '<div class="userrating" title="' . ( $item->rating * 100 ) . '%">'
				. str_repeat( '<span class="mailster-icon mailster-icon-star"></span>', $full )
				. str_repeat( '<span class="mailster-icon mailster-icon-star-half"></span>', $half )
				. str_repeat( '<span class="mailster-icon mailster-icon-star-empty"></span>', $empty ) . '</div>';

			return '<div class="table-data">' . $avatar . '<div class="mailster-name">' . $html . $userrating . '</div></div>';

			case 'lists':

				$lists = mailster( 'subscribers' )->get_lists( $item->ID );

				$elements = array();

				foreach ( $lists as $i => $list ) {
					$elements[] = '<a href="edit.php?post_type=newsletter&page=mailster_lists&ID=' . $list->ID . '" title="' . ($list->confirmed ? esc_attr__( 'confirmed', 'mailster' ) :  esc_attr__( 'not confirmed', 'mailster' )) . '" class="' . ($list->confirmed ? 'confirmed' : 'not-confirmed') . '">' . esc_html( $list->name ) . '</a>';
				}
			return '<div class="table-data">' . implode( ', ', $elements ) . '</div>';

			case 'emails':

			return '<div class="table-data">' . number_format_i18n( mailster( 'subscribers' )->get_sent( $item->ID, true ) ) . '</div>';

			case 'status':

			return '<div class="table-data"><span class="nowrap tiny">' . mailster( 'subscribers' )->get_status( $item->{$column_name}, true ) . '</span></div>';

			case 'signup':
				$timestring = ( ! $item->{$column_name} ) ? __( 'unknown', 'mailster' ) : date_i18n( mailster( 'helper' )->timeformat(), $item->{$column_name} + mailster( 'helper' )->gmt_offset( true ) );
			return '<div class="table-data">' . $timestring . '</div>';

			default:
				$custom_fields = mailster()->get_custom_fields();
				if ( in_array( $column_name, array_keys( $custom_fields ) ) ) {
					switch ( $custom_fields[ $column_name ]['type'] ) {
						case 'checkbox':
						return '<div class="table-data">' . ($item->{$column_name} ? '&#10004;' : '&#10005;') . '</div>';
						break;
						case 'date':
						return '<div class="table-data">' . ($item->{$column_name} ? date_i18n( mailster( 'helper' )->dateformat(), strtotime( $item->{$column_name} ) ) : '') . '</div>';
						break;
						default:
						return '<div class="table-data">' . ($item->{$column_name}) . '</div>';
					}
				}
			return print_r( $item, true ); // Show the whole array for troubleshooting purposes
		}
	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'name' => array( 'name', false ),
			'status' => array( 'status', false ),
			'signup' => array( 'signup', false ),

		);
		$custom_fields = mailster()->get_custom_fields();
		foreach ( $custom_fields as $key => $field ) {
			$sortable_columns[ $key ] = array( $key, false );
		}
		return $sortable_columns;
	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_bulk_actions() {
		$actions = array(
			'delete' => __( 'Delete', 'mailster' ),
			'send_campaign' => __( 'Send new Campaign', 'mailster' ),
			'confirmation' => __( 'Resend Confirmation', 'mailster' ),
			'verify' => __( 'Verify', 'mailster' ),
		);

		if ( ! current_user_can( 'mailster_delete_subscribers' ) ) {
			unset( $actions['delete'] );
		}

		return $actions;
	}


	/**
	 *
	 *
	 * @param unknown $which (optional)
	 */
	public function bulk_actions( $which = '' ) {

		ob_start();
		parent::bulk_actions( $which );
		$actions = ob_get_contents();
		ob_end_clean();

		$status = '<option value="pending">&#x2514; ' . __( 'pending', 'mailster' ) . '</option>';
		$status .= '<option value="subscribed">&#x2514; ' . __( 'subscribed', 'mailster' ) . '</option>';
		$status .= '<option value="unsubscribed">&#x2514; ' . __( 'unsubscribed', 'mailster' ) . '</option>';

		$actions = str_replace( '</select>', '<optgroup label="' . __( 'change status', 'mailster' ) . '">' . $status . '</optgroup></select>', $actions );

		$lists = mailster( 'lists' )->get();

		if ( empty( $lists ) ) {
			echo $actions;
			return;
		}

		$add = '';
		$remove = '';
		$confirm = '<option value="confirm_list_all">&nbsp;' . esc_html__( 'all', 'mailster' ) . '</option>';
		$unconfirm = '<option value="unconfirm_list_all">&nbsp;' . esc_html__( 'all', 'mailster' ) . '</option>';
		foreach ( $lists as $list ) {
			$add .= '<option value="add_list_' . $list->ID . '">' . ( $list->parent_id ? '&nbsp;' : '' ) . '&#x2514; ' . $list->name . '</option>';
			$remove .= '<option value="remove_list_' . $list->ID . '">' . ( $list->parent_id ? '&nbsp;' : '' ) . '&#x2514; ' . $list->name . '</option>';
			$confirm .= '<option value="confirm_list_' . $list->ID . '">' . ( $list->parent_id ? '&nbsp;' : '' ) . '&#x2514; ' . $list->name . '</option>';
			$unconfirm .= '<option value="unconfirm_list_' . $list->ID . '">' . ( $list->parent_id ? '&nbsp;' : '' ) . '&#x2514; ' . $list->name . '</option>';
		}

		echo str_replace( '</select>', '<optgroup label="' . __( 'add to list', 'mailster' ) . '">' . $add . '</optgroup><optgroup label="' . __( 'remove from list', 'mailster' ) . '">' . $remove . '</optgroup><optgroup label="' . __( 'confirm list', 'mailster' ) . '">' . $confirm . '</optgroup><optgroup label="' . __( 'unconfirm list', 'mailster' ) . '">' . $unconfirm . '</optgroup></select>', $actions );

	}


	/**
	 *
	 *
	 * @param unknown $which (optional)
	 */
	public function extra_tablenav( $which = '' ) {}


	/**
	 *
	 *
	 * @param unknown $item
	 * @return unknown
	 */
	public function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="subscribers[]" value="%s" class="subscriber_cb" />', $item->ID
		);
	}


	/**
	 *
	 *
	 * @param unknown $current_mode
	 * @return unknown
	 */
	public function view_switcher( $current_mode ) {
		return '';
	}


	/**
	 *
	 *
	 * @param unknown $domain  (optional)
	 * @param unknown $post_id (optional)
	 */
	public function prepare_items( $domain = null, $post_id = null ) {

		global $wpdb;
		$screen = get_current_screen();
		$columns = $this->get_columns();
		$hidden = get_hidden_columns( $screen );
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );

		$args = array(
			'status' => isset( $_GET['status'] ) ? (int) $_GET['status'] : false,
			's'      => isset( $_GET['s'] ) ? stripslashes( $_GET['s'] ) : null,
			'strict' => isset( $_GET['strict'] ) ? boolval( $_GET['strict'] ) : false,
			'lists' => isset( $_GET['lists'] ) ? ($_GET['lists'] ) : false,
			'conditions' => isset( $_GET['conditions'] ) ? $_GET['conditions'] : null,
		);

		// How many to display per page?
		if ( ! ($this->per_page = (int) get_user_option( 'mailster_subscribers_per_page' )) ) {
			$this->per_page = 50;
		}

		$offset = isset( $_GET['paged'] ) ? ( (int) $_GET['paged'] - 1 ) * $this->per_page : 0;
		$orderby = ! empty( $_GET['orderby'] ) ? esc_sql( $_GET['orderby'] ) : 'id';
		$order = ! empty( $_GET['order'] ) ? esc_sql( $_GET['order'] ) : 'DESC';

		switch ( $orderby ) {
			case 'name':
			case 'lastname':
				$orderby = array( 'lastname', 'firstname' );
				break;
			case 'firstname':
				$orderby = array( 'firstname', 'lastname' );
				break;
		}

		$items = mailster( 'subscribers' )->query( wp_parse_args( $args, array(
			'calc_found_rows' => true,
			'orderby' => $orderby,
			'order' => $order,
			'fields' => 'all',
			'limit' => $this->per_page,
			'offset' => $offset,
		)) );

		$this->items = $items;
		$this->total_items = $wpdb->get_var( 'SELECT FOUND_ROWS();' );

		$this->total_pages = ceil( $this->total_items / $this->per_page );

		$this->set_pagination_args( array(
			'total_items' => $this->total_items,
			'total_pages' => $this->total_pages,
			'per_page' => $this->per_page,
		) );

	}


}
