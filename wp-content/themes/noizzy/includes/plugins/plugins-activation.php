<?php

if(!function_exists('noizzy_edge_register_required_plugins')) {
    /**
     * Registers theme required and optional plugins. Hooks to tgmpa_register hook
     */
    function noizzy_edge_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'noizzy'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'version'            => '6.5.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'noizzy'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '6.3.3',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Noizzy Core', 'noizzy'),
                'slug'               => 'noizzy-core',
                'source'             => get_template_directory().'/includes/plugins/noizzy-core.zip',
                'version'            => '1.0.2',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Noizzy Music', 'noizzy'),
                'slug'               => 'noizzy-music',
                'source'             => get_template_directory().'/includes/plugins/noizzy-music.zip',
                'version'            => '1.0.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Noizzy Instagram Feed', 'noizzy'),
                'slug'               => 'noizzy-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/noizzy-instagram-feed.zip',
                'version'            => '2.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
	        array(
		        'name'     => esc_html__( 'WooCommerce plugin', 'noizzy' ),
		        'slug'     => 'woocommerce',
		        'required' => false
	        ),
	        array(
		        'name'     => esc_html__( 'Contact Form 7', 'noizzy' ),
		        'slug'     => 'contact-form-7',
		        'required' => false
	        ),
            array(
                'name'               => esc_html__('Envato Market', 'noizzy'),
                'slug'               => 'envato-market',
                'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
                'required' => false
            )
        );

        $config = array(
            'domain'           => 'noizzy',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'noizzy'),
                'menu_title'                      => esc_html__('Install Plugins', 'noizzy'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'noizzy'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'noizzy'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'noizzy'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'noizzy'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'noizzy'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'noizzy'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'noizzy'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'noizzy'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'noizzy'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'noizzy'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'noizzy'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'noizzy'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'noizzy'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'noizzy'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'noizzy'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'noizzy_edge_register_required_plugins');
}