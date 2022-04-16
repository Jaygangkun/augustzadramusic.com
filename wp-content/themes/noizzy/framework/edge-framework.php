<?php

require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.welcome.page.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.kses.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.layout1.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.layout2.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.layout3.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.layout.tax.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.layout.user.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.layout.dashboard.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.optionsapi.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.framework.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.functions.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edge.icons/edge.icons.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/admin/options/edge-options-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/admin/meta-boxes/edge-meta-boxes-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/modules/edge-modules-loader.php";

if ( ! function_exists( 'noizzy_edge_admin_scripts_init' ) ) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function noizzy_edge_admin_scripts_init() {
		
		//This part is required for field type address
		$enable_google_map_in_admin = apply_filters('noizzy_edge_google_maps_in_backend', false);
		if($enable_google_map_in_admin) {
			//include google map api script
			$google_maps_api_key          = noizzy_edge_options()->getOptionValue( 'google_maps_api_key' );
			$google_maps_extensions       = '';
			$google_maps_extensions_array = apply_filters( 'noizzy_edge_google_maps_extensions_array', array() );
			if ( ! empty( $google_maps_extensions_array ) ) {
				$google_maps_extensions .= '&libraries=';
				$google_maps_extensions .= implode( ',', $google_maps_extensions_array );
			}
			if ( ! empty( $google_maps_api_key ) ) {
                wp_enqueue_script( 'edge-admin-maps', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
                wp_enqueue_script( 'jquery.geocomplete', get_template_directory_uri() . '/framework/admin/assets/js/jquery.geocomplete.min.js', array('edge-admin-maps'), false, true );
			}
		}

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/framework/admin/assets/js/bootstrap.min.js', array(), false, true );
		wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/framework/admin/assets/js/bootstrap-select.min.js', array(), false, true );
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/framework/admin/assets/js/select2.min.js', array(), false, true );
		wp_enqueue_script( 'edge-ui-admin', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-ui.js', array(), false, true );


		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/admin/assets/css/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css' );

		/**
		 * @see NoizzyEdgeSkinAbstract::registerScripts - hooked with 10
		 * @see NoizzyEdgeSkinAbstract::registerStyles - hooked with 10
		 */
		do_action( 'noizzy_edge_admin_scripts_init' );
	}

	add_action( 'admin_init', 'noizzy_edge_admin_scripts_init' );
}

if ( ! function_exists( 'noizzy_edge_enqueue_admin_styles' ) ) {
	/**
	 * Function that enqueues styles for options page
	 */
	function noizzy_edge_enqueue_admin_styles() {
		wp_enqueue_style( 'wp-color-picker' );

		/**
		 * @see NoizzyEdgeSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action( 'noizzy_edge_enqueue_admin_styles' );
	}
}

if ( ! function_exists( 'noizzy_edge_enqueue_admin_scripts' ) ) {
	/**
	 * Function that enqueues styles for options page
	 */
	function noizzy_edge_enqueue_admin_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
		wp_enqueue_script( 'edge-dependence', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-dependence.js', array(), false, true );
		wp_enqueue_script( 'edge-twitter-connect', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-twitter-connect.js', array(), false, true );

		/**
		 * @see NoizzyEdgeSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action( 'noizzy_edge_enqueue_admin_scripts' );
	}
}

if ( ! function_exists( 'noizzy_edge_enqueue_meta_box_styles' ) ) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function noizzy_edge_enqueue_meta_box_styles() {
		global $post;
		wp_enqueue_style( 'wp-color-picker' );


		if($post->post_type == 'event' || $post->post_type == 'album'){
			wp_enqueue_style("edge-jquery-ui", get_template_directory_uri().'/framework/admin/assets/css/jquery-ui/jquery-ui.css');
		}

		/**
		 * @see NoizzyEdgeSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action( 'noizzy_edge_enqueue_meta_box_styles' );
	}
}

if ( ! function_exists( 'noizzy_edge_enqueue_meta_box_scripts' ) ) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function noizzy_edge_enqueue_meta_box_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
        wp_enqueue_script( 'edge-dependence', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-dependence.js', array(), false, true );
        wp_enqueue_script( 'edge-repeater', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-ui-repeater.js', array(), false, true );

		/**
		 * @see NoizzyEdgeSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action( 'noizzy_edge_enqueue_meta_box_scripts' );
	}
}

if ( ! function_exists( 'noizzy_edge_enqueue_nav_menu_script' ) ) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function noizzy_edge_enqueue_nav_menu_script( $hook ) {
		if ( $hook == 'nav-menus.php' ) {
			wp_enqueue_script( 'edge-nav-menu', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-nav-menu.js' );
			wp_enqueue_style( 'edge-nav-menu', get_template_directory_uri() . '/framework/admin/assets/css/edge-nav-menu.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'noizzy_edge_enqueue_nav_menu_script' );
}

if ( ! function_exists( 'noizzy_edge_enqueue_widgets_admin_script' ) ) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 *
	 * @param $hook string current page hook to check
	 */
	function noizzy_edge_enqueue_widgets_admin_script( $hook ) {
		if ( $hook == 'widgets.php' ) {
			wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'edge-dependence', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-dependence.js', array(), false, true );
			wp_enqueue_script( 'edge-widgets-dependence', get_template_directory_uri() . '/framework/admin/assets/js/edge-ui/edge-widget-dependence.js', array(), false, true );
		}
	}

	add_action( 'admin_enqueue_scripts', 'noizzy_edge_enqueue_widgets_admin_script' );
}

if ( ! function_exists( 'noizzy_edge_enqueue_taxonomy_script' ) ) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function noizzy_edge_enqueue_taxonomy_script( $hook ) {
		if ( $hook == 'edit-tags.php' || $hook == 'term.php' ) {
			wp_enqueue_script( 'select2' );
			wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'noizzy_edge_enqueue_taxonomy_script' );
}


if ( ! function_exists( 'noizzy_edge_dashboard_page' ) ) {
	/**
	 * Function that checks whether Dashboard assets needs to be loaded.
	 *
	 */
	function noizzy_edge_dashboard_page() {
		return is_page_template('user-dashboard.php');
	}
}

if ( ! function_exists( 'noizzy_edge_init_theme_options_array' ) ) {
	/**
	 * Function that merges $noizzy_edge_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function noizzy_edge_init_theme_options_array() {
		global $noizzy_edge_options, $noizzy_edge_Framework;

		$db_options = get_option( 'edge_options_noizzy' );

		//does edge_options_noizzy exists in db?
		if ( is_array( $db_options ) ) {
			//merge with default options
			$noizzy_edge_options = array_merge( $noizzy_edge_Framework->edgeOptions->options, get_option( 'edge_options_noizzy' ) );
		} else {
			//options don't exists in db, take default ones
			$noizzy_edge_options = $noizzy_edge_Framework->edgeOptions->options;
		}
	}

	add_action( 'noizzy_edge_after_options_map', 'noizzy_edge_init_theme_options_array', 0 );
}

if ( ! function_exists( 'noizzy_edge_init_theme_options' ) ) {
	/**
	 * Function that sets $noizzy_edge_options variable if it does'nt exists
	 */
	function noizzy_edge_init_theme_options() {
		global $noizzy_edge_options;
		global $noizzy_edge_Framework;
		if ( isset( $noizzy_edge_options['reset_to_defaults'] ) ) {
			if ( $noizzy_edge_options['reset_to_defaults'] == 'yes' ) {
				delete_option( "edge_options_noizzy" );
			}
		}

		if ( ! get_option( "edge_options_noizzy" ) ) {
			add_option( "edge_options_noizzy", $noizzy_edge_Framework->edgeOptions->options );

			$noizzy_edge_options = $noizzy_edge_Framework->edgeOptions->options;
		}
	}
}

if ( ! function_exists( 'noizzy_edge_register_theme_settings' ) ) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function noizzy_edge_register_theme_settings() {
		register_setting( EDGE_OPTIONS_SLUG, 'edge_options' );
	}

	add_action( 'admin_init', 'noizzy_edge_register_theme_settings' );
}

if ( ! function_exists( 'noizzy_edge_get_admin_tab' ) ) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function noizzy_edge_get_admin_tab() {
		return isset( $_GET['page'] ) ? noizzy_edge_strafter( $_GET['page'], 'tab' ) : null;
	}
}

if ( ! function_exists( 'noizzy_edge_strafter' ) ) {
	/**
	 * Function that returns string that comes after found string
	 *
	 * @param $string string where to search
	 * @param $substring string what to search for
	 *
	 * @return null|string string that comes after found string
	 */
	function noizzy_edge_strafter( $string, $substring ) {
		$pos = strpos( $string, $substring );
		if ( $pos === false ) {
			return null;
		}

		return ( substr( $string, $pos + strlen( $substring ) ) );
	}
}

if ( ! function_exists( 'noizzy_edge_save_options' ) ) {
	/**
	 * Function that saves theme options to db.
	 */
	function noizzy_edge_save_options() {
		global $noizzy_edge_options;

		if ( current_user_can( 'administrator' ) ) {
			$_REQUEST = stripslashes_deep( $_REQUEST );

			unset( $_REQUEST['action'] );

			check_ajax_referer( 'edge_ajax_save_nonce', 'edge_ajax_save_nonce' );

			$noizzy_edge_options = array_merge( $noizzy_edge_options, $_REQUEST );

			update_option( 'edge_options_noizzy', $noizzy_edge_options );

			do_action( 'noizzy_edge_after_theme_option_save' );
			echo esc_html__( 'Saved', 'noizzy' );

			die();
		}
	}

	add_action( 'wp_ajax_noizzy_edge_save_options', 'noizzy_edge_save_options' );
}

if ( ! function_exists( 'noizzy_edge_meta_box_add' ) ) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function noizzy_edge_meta_box_add() {
		global $noizzy_edge_Framework;

		foreach ( $noizzy_edge_Framework->edgeMetaBoxes->metaBoxes as $key => $box ) {
			$hidden = false;
			if ( ! empty( $box->hidden_property ) ) {
				foreach ( $box->hidden_values as $value ) {
					if ( noizzy_edge_option_get_value( $box->hidden_property ) == $value ) {
						$hidden = true;
					}
				}
			}

			if ( is_string( $box->scope ) ) {
				$box->scope = array( $box->scope );
			}

			if ( is_array( $box->scope ) && count( $box->scope ) ) {
				foreach ( $box->scope as $screen ) {
					noizzy_edge_create_meta_box_handler( $box, $key, $screen );

					if ( $hidden ) {
						add_filter( 'postbox_classes_' . $screen . '_edge-meta-box-' . $key, 'noizzy_edge_meta_box_add_hidden_class' );
					}
				}
			}
		}

		add_action( 'admin_enqueue_scripts', 'noizzy_edge_enqueue_meta_box_styles' );
		add_action( 'admin_enqueue_scripts', 'noizzy_edge_enqueue_meta_box_scripts' );
	}

}

if ( ! function_exists( 'noizzy_edge_meta_box_save' ) ) {
	/**
	 * Function that saves meta box to postmeta table
	 *
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function noizzy_edge_meta_box_save( $post_id, $post ) {
		global $noizzy_edge_Framework;

		$nonces_array = array();
		$meta_boxes   = noizzy_edge_framework()->edgeMetaBoxes->getMetaBoxesByScope( $post->post_type );

		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta_box ) {
				$nonces_array[] = 'noizzy_edge_meta_box_' . $meta_box->name . '_save';
			}
		}

		if ( is_array( $nonces_array ) && count( $nonces_array ) ) {
			foreach ( $nonces_array as $nonce ) {
				if ( ! isset( $_POST[ $nonce ] ) || ! wp_verify_nonce( $_POST[ $nonce ], $nonce ) ) {
					return;
				}
			}
		}

		$postTypes = apply_filters( 'noizzy_edge_meta_box_post_types_save', array( 'post', 'page' ) );

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! in_array( $post->post_type, $postTypes ) ) {
			return;
		}

		foreach ( $noizzy_edge_Framework->edgeMetaBoxes->options as $key => $box ) {

			if ( isset( $_POST[ $key ] ) && trim( $_POST[ $key ] !== '' ) ) {

				$value = $_POST[ $key ];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}
		
        noizzy_edge_save_instagram_twitter_post_options($post_id, $post);
	}

	add_action( 'save_post', 'noizzy_edge_meta_box_save', 1, 2 );
}

if ( ! function_exists( 'noizzy_edge_render_meta_box' ) ) {
	/**
	 * Function that renders meta box
	 *
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function noizzy_edge_render_meta_box( $post, $metabox ) { ?>
		<div class="edge-meta-box edge-page">
			<div class="edge-meta-box-holder">
				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field( 'noizzy_edge_meta_box_' . $metabox['args']['box']->name . '_save', 'noizzy_edge_meta_box_' . $metabox['args']['box']->name . '_save' ); ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'noizzy_edge_meta_box_add_hidden_class' ) ) {
	/**
	 * Function that adds class that will initially hide meta box
	 *
	 * @param array $classes array of classes
	 *
	 * @return array modified array of classes
	 */
	function noizzy_edge_meta_box_add_hidden_class( $classes = array() ) {
		if ( ! in_array( 'edge-meta-box-hidden', $classes ) ) {
			$classes[] = 'edge-meta-box-hidden';
		}

		return $classes;
	}
}

if ( ! function_exists( 'noizzy_edge_remove_default_custom_fields' ) ) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function noizzy_edge_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( apply_filters( 'noizzy_edge_meta_box_post_types_remove', array( 'post', 'page' ) ) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action( 'do_meta_boxes', 'noizzy_edge_remove_default_custom_fields' );
}

if ( ! function_exists( 'noizzy_edge_generate_icon_pack_options' ) ) {
	/**
	 * Generates options HTML for each icon in given icon pack
	 */
	function noizzy_edge_generate_icon_pack_options() {
		check_ajax_referer( 'update-nav_menu', 'update_nav_menu_nonce' );

		global $noizzy_edge_IconCollections;

		$html               = '';
		$icon_pack          = isset( $_POST['icon_pack'] ) ? $_POST['icon_pack'] : '';
		$collections_object = $noizzy_edge_IconCollections->getIconCollection( $icon_pack );

		if ( $collections_object ) {
			$icons = $collections_object->getIconsArray();
			if ( is_array( $icons ) && count( $icons ) ) {
				foreach ( $icons as $key => $icon ) {
					$html .= '<option value="' . esc_attr( $key ) . '">' . esc_html( $key ) . '</option>';
				}
			}
		}

		echo wp_kses( $html, array( 'option' => array( 'value' => true ) ) );
	}

	add_action( 'wp_ajax_update_admin_nav_icon_options', 'noizzy_edge_generate_icon_pack_options' );
}

if ( ! function_exists( 'noizzy_edge_save_dismisable_notice' ) ) {
	/**
	 * Updates user meta with dismisable notice. Hooks to admin_init action
	 * in order to check this on every page request in admin
	 */
	function noizzy_edge_save_dismisable_notice() {
		if ( is_admin() && ! empty( $_GET['edge_dismis_notice'] ) ) {
			$notice_id       = sanitize_key( $_GET['edge_dismis_notice'] );
			$current_user_id = get_current_user_id();

			update_user_meta( $current_user_id, 'dismis_' . $notice_id, 1 );
		}
	}

	add_action( 'admin_init', 'noizzy_edge_save_dismisable_notice' );
}

if ( ! function_exists( 'noizzy_edge_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 */
	function noizzy_edge_ajax_status( $status, $message, $data = null ) {
		$response = array(
			'status'  => $status,
			'message' => $message,
			'data'    => $data
		);

		$output = json_encode( $response );

		exit( $output );
	}
}

if ( ! function_exists( 'noizzy_edge_hook_twitter_request_ajax' ) ) {
	/**
	 * Wrapper function for obtaining twitter request token.
	 *
	 * @see EdgeTwitterApi::obtainRequestToken()
	 */
	function noizzy_edge_hook_twitter_request_ajax() {
		check_ajax_referer( 'qodef_twitter_connect_nonce', 'twitter_connect_nonce' );

		NoizzyTwitterApi::getInstance()->obtainRequestToken();
	}
	
	add_action( 'wp_ajax_edge_twitter_obtain_request_token', 'noizzy_edge_hook_twitter_request_ajax' );
}


if ( ! function_exists( 'noizzy_edge_set_admin_google_api_class' ) ) {
	function noizzy_edge_set_admin_google_api_class( $classes ) {
		$google_map_api = noizzy_edge_options()->getOptionValue( 'google_maps_api_key' );

		if ( empty( $google_map_api ) ) {
			$classes .= ' edge-empty-google-api';
		}
		
		return $classes;
	}
	
	add_filter( 'admin_body_class', 'noizzy_edge_set_admin_google_api_class' );
}

if ( ! function_exists( 'noizzy_edge_comment' ) ) {
	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */
	function noizzy_edge_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		
		global $post;
		
		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment   = $post->post_author == $comment->user_id;
		
		$comment_class = 'edge-comment clearfix';
		
		if ( $is_author_comment ) {
			$comment_class .= ' edge-post-author-comment';
		}
		
		if ( $is_pingback_comment ) {
			$comment_class .= ' edge-pingback-comment';
		}
		?>
		
		<li>
		<div class="<?php echo esc_attr( $comment_class ); ?>">
			<?php if ( ! $is_pingback_comment ) { ?>
				<div class="edge-comment-image"> <?php echo noizzy_edge_kses_img( get_avatar( $comment, 110 ) ); ?> </div>
			<?php } ?>
			<div class="edge-comment-text">
				<div class="edge-comment-info">
					<div class="edge-comment-name vcard">
						<?php if ( $is_pingback_comment ) {
							esc_html_e( 'Pingback:', 'noizzy' );
						} ?>
						<?php echo wp_kses_post( get_comment_author_link() ); ?>
					</div>
				</div>
				<div class="edge-comment-date"><?php comment_time( get_option( 'date_format' ) ); ?></div>
				<?php if ( ! $is_pingback_comment ) { ?>
					<div class="edge-text-holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
                    <div class="edge-comment-btns">
                        <?php
                        comment_reply_link( array_merge( $args, array(
                            'reply_text' => sprintf( '%s<span class="fa fa-angle-double-right"></span>', esc_html__( 'reply', 'noizzy' ) ),
                            'depth'      => $depth,
                            'max_depth'  => $args['max_depth']
                        ) ) );
                        edit_comment_link( esc_html__( 'edit', 'noizzy' ) );
                        ?>
                    </div>
				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
		<?php
	}
}

/* Taxonomy custom fields functions - START */

if ( ! function_exists( 'noizzy_edge_init_custom_taxonomy_fields' ) ) {
	function noizzy_edge_init_custom_taxonomy_fields() {
		do_action( 'noizzy_edge_custom_taxonomy_fields' );
	}
	
	add_action( 'after_setup_theme', 'noizzy_edge_init_custom_taxonomy_fields' );
}

if ( ! function_exists( 'noizzy_edge_taxonomy_fields_add' ) ) {
	function noizzy_edge_taxonomy_fields_add() {
		global $noizzy_edge_Framework;
		
		foreach ( $noizzy_edge_Framework->edgeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			add_action( $fields->scope . '_add_form_fields', 'noizzy_edge_taxonomy_fields_display_add', 10, 2 );
		}
	}
	
	add_action( 'after_setup_theme', 'noizzy_edge_taxonomy_fields_add', 11 );
}

if ( ! function_exists( 'noizzy_edge_taxonomy_fields_edit' ) ) {
	function noizzy_edge_taxonomy_fields_edit() {
		global $noizzy_edge_Framework;
		
		foreach ( $noizzy_edge_Framework->edgeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			add_action( $fields->scope . '_edit_form_fields', 'noizzy_edge_taxonomy_fields_display_edit', 10, 2 );
		}
	}
	
	add_action( 'after_setup_theme', 'noizzy_edge_taxonomy_fields_edit', 11 );
}

if ( ! function_exists( 'noizzy_edge_taxonomy_fields_display_add' ) ) {
	function noizzy_edge_taxonomy_fields_display_add( $taxonomy ) {
		global $noizzy_edge_Framework;
		
		foreach ( $noizzy_edge_Framework->edgeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			if ( $taxonomy == $fields->scope ) {
				$fields->render();
			}
		}
	}
}

if ( ! function_exists( 'noizzy_edge_taxonomy_fields_display_edit' ) ) {
	function noizzy_edge_taxonomy_fields_display_edit( $term, $taxonomy ) {
		global $noizzy_edge_Framework;
		
		foreach ( $noizzy_edge_Framework->edgeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			if ( $taxonomy == $fields->scope ) {
				$fields->render();
			}
		}
	}
}

if ( ! function_exists( 'noizzy_edge_save_taxonomy_custom_fields' ) ) {
	function noizzy_edge_save_taxonomy_custom_fields( $term_id ) {
		$fields = apply_filters( 'noizzy_edge_taxonomy_fields', array() );
		
		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				add_term_meta( $term_id, $value, $_POST[ $value ] );
			}
		}
	}
	
	add_action( 'created_term', 'noizzy_edge_save_taxonomy_custom_fields', 10, 2 );
}

if ( ! function_exists( 'noizzy_edge_update_taxonomy_custom_fields' ) ) {
	function noizzy_edge_update_taxonomy_custom_fields( $term_id ) {
		$fields = apply_filters( 'noizzy_edge_taxonomy_fields', array() );
		
		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				update_term_meta( $term_id, $value, $_POST[ $value ] );
			} else {
				update_term_meta( $term_id, $value, '' );
			}
		}
	}
	
	add_action( 'edited_term', 'noizzy_edge_update_taxonomy_custom_fields', 10, 2 );
}

if ( ! function_exists( 'noizzy_edge_tax_add_script' ) ) {
	function noizzy_edge_tax_add_script() {
		wp_enqueue_media();
		wp_enqueue_script( 'edge-tax-js', EDGE_FRAMEWORK_ROOT . '/admin/assets/js/edge-ui/edge-tax-custom-fields.js' );
	}
	
	add_action( 'admin_enqueue_scripts', 'noizzy_edge_tax_add_script' );
}

/** Taxonomy Delete Image **/
if ( ! function_exists( 'noizzy_edge_tax_del_image' ) ) {
	function noizzy_edge_tax_del_image() {
		check_ajax_referer( 'qodef_tax_del_image_nonce', 'tax_del_image_nonce' );

		/** If we don't have a term_id, bail out **/
		if ( ! isset( $_GET['term_id'] ) ) {
			esc_html_e( 'Not Set or Empty', 'noizzy' );
			exit;
		}
		
		$field_name = $_GET['field_name'];
		$term_id    = $_GET['term_id'];
		$imageID    = get_term_meta( $term_id, $field_name, true );  // Get our attachment ID
		
		if ( is_numeric( $imageID ) ) {                              // Verify that the attachment ID is indeed a number
			wp_delete_attachment( $imageID );                       // Delete our image
			delete_term_meta( $term_id, $field_name );// Delete our image meta
			exit;
		}
		
		esc_html_e( 'Contact Administrator', 'noizzy' ); // If we've reached this point, something went wrong - enable debugging
		exit;
	}
	
	add_action( 'wp_ajax_noizzy_edge_tax_del_image', 'noizzy_edge_tax_del_image' );
}

/* Taxonomy custom fields functions - END */

/* User custom fields functions - START */

if ( ! function_exists( 'noizzy_edge_user_add_script' ) ) {
	function noizzy_edge_user_add_script() {
		wp_enqueue_script( 'edge-user-js', EDGE_FRAMEWORK_ROOT . '/admin/assets/js/edge-ui/edge-user-custom-fields.js' );
	}

	add_action( 'admin_enqueue_scripts', 'noizzy_edge_user_add_script' );
}


if ( ! function_exists( 'noizzy_edge_init_custom_user_fields' ) ) {
	function noizzy_edge_init_custom_user_fields() {
		do_action( 'noizzy_edge_custom_user_fields' );
	}
	
	add_action( 'after_setup_theme', 'noizzy_edge_init_custom_user_fields' );
}

if ( ! function_exists( 'noizzy_edge_user_fields_edit' ) ) {
	function noizzy_edge_user_fields_edit($user) {
		global $noizzy_edge_Framework;

		foreach ( $noizzy_edge_Framework->edgeUserOptions->userOptions as $key => $fields ) {

			$display_fields = false;
			foreach ($user->roles as $role) {
				if (in_array($role, $fields->scope)){
					$display_fields = true;
					break;
				}
			}
			if ( $display_fields ) {
				$fields->render();
			}
		}
	}
	
	add_action('show_user_profile', 'noizzy_edge_user_fields_edit');
	add_action('edit_user_profile', 'noizzy_edge_user_fields_edit');
}

if ( ! function_exists( 'noizzy_edge_save_user_fields' ) ) {
	function noizzy_edge_save_user_fields($user_id) {

		$fields = apply_filters( 'noizzy_edge_user_fields', array() );

		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				update_user_meta( $user_id, $value, $_POST[ $value ] );
			}
		}
	}
		
	add_action( 'personal_options_update', 'noizzy_edge_save_user_fields');
	add_action( 'edit_user_profile_update', 'noizzy_edge_save_user_fields');
}
/* User custom fields functions - END */

/** User Delete Image **/
if ( ! function_exists( 'noizzy_edge_user_del_image' ) ) {
	function noizzy_edge_user_del_image() {
		check_ajax_referer( 'qodef_user_del_image_nonce', 'user_del_image_nonce' );

		/** If we don't have a term_id, bail out **/
		if ( ! isset( $_GET['user_id'] ) ) {
			esc_html_e( 'Not Set or Empty', 'noizzy' );
			exit;
		}

		$field_name = $_GET['field_name'];
		$user_id    = $_GET['user_id'];
		$imageID    = get_user_meta( $user_id, $field_name, true );;  // Get our attachment ID

		if ( is_numeric( $imageID ) ) {               // Verify that the attachment ID is indeed a number
			delete_user_meta( $user_id, $field_name );// Delete our image meta
			exit;
		}

		esc_html_e( 'Contact Administrator', 'noizzy' ); // If we've reached this point, something went wrong - enable debugging
		exit;
	}

	add_action( 'wp_ajax_noizzy_edge_user_del_image', 'noizzy_edge_user_del_image' );
}
?>