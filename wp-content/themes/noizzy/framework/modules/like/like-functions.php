<?php

if ( ! function_exists( 'noizzy_edge_like' ) ) {
	/**
	 * Returns NoizzyEdgeLike instance
	 *
	 * @return NoizzyEdgeLike
	 */
	function noizzy_edge_like() {
		return NoizzyEdgeLike::get_instance();
	}
}

function noizzy_edge_get_like() {
	
	echo wp_kses( noizzy_edge_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	) );
}