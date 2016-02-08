<?php
/**
 * Custom Post Types for this theme
 *
 * @package riverside
 */

// ROOMS
add_action( 'init', 'room_types_cpt' );

function room_types_cpt() {
	register_post_type( 'rooms',
		array(
			'labels' => array(
				'name' => __( 'Rooms' ),
				'singular_name' => __( 'Room' )
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}

// THINGS TO DO
add_action( 'init', 'activities_cpt' );

function activities_cpt() {
	register_post_type( 'activities',
		array(
			'labels' => array(
				'name' => __( 'Activities' ),
				'singular_name' => __( 'Activitiy' )
			),
			'taxonomies' => array('category'),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}