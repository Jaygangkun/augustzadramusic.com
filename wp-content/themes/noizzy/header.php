<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * noizzy_edge_header_meta hook
	 *
	 * @see noizzy_edge_header_meta() - hooked with 10
	 * @see noizzy_edge_user_scalable_meta - hooked with 10
	 * @see noizzy_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'noizzy_edge_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * noizzy_edge_after_body_tag hook
	 *
	 * @see noizzy_edge_get_side_area() - hooked with 10
	 * @see noizzy_edge_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'noizzy_edge_after_body_tag' ); ?>

    <div class="edge-wrapper">
        <div class="edge-wrapper-inner">
            <?php
            /**
             * noizzy_edge_after_wrapper_inner hook
             *
             * @see noizzy_edge_get_header() - hooked with 10
             * @see noizzy_edge_get_mobile_header() - hooked with 20
             * @see noizzy_edge_back_to_top_button() - hooked with 30
             * @see noizzy_edge_get_header_minimal_full_screen_menu() - hooked with 40
             * @see noizzy_edge_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'noizzy_edge_after_wrapper_inner' ); ?>
	        
            <div class="edge-content">
                <div class="edge-content-inner">