<?php

// include custom jQuery
function m5s_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'm5s_include_custom_jquery');

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'm5s-fonts', 'https://fonts.googleapis.com/css?family=Oswald:400,700|Titillium+Web:300,400,400i,700' );
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'M5s-main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'));
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function pn_body_class_add_categories( $classes ) {

	// Only proceed if we're on a single post page
	if ( !is_single() )
		return $classes;

	// Get the categories that are assigned to this post
	$post_categories = get_the_category();

	// Loop over each category in the $categories array
	foreach( $post_categories as $current_category ) {

		// Add the current category's slug to the $body_classes array
		$classes[] = 'category-' . $current_category->slug;

	}

	// Finally, return the $body_classes array
	return $classes;
}
add_filter( 'body_class', 'pn_body_class_add_categories' );

function twentysixteen_m5s_cat() {
  $categories_list = get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $categories_list && twentysixteen_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'twentysixteen' ),
			$categories_list
		);
	}
}

function twentysixteen_m5s_tag() {

  $tags_list = get_the_tag_list( '', _x( '- ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'twentysixteen' ),
			$tags_list
		);
	}

}

function twentysixteen_m5s_author() {
  if ( 'post' === get_post_type() ) {
    $author_avatar_size = apply_filters( 'twentysixteen_author_avatar_size', 49 );
    printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
      get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
      _x( 'Author', 'Used before post author name.', 'twentysixteen' ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      get_the_author()
    );
  }
}

function m5s_custom_posttypes() {

	$labels = array(
			'name'               => 'Comunicati Stampa',
			'singular_name'      => 'Comunicato Stampa',
			'menu_name'          => 'Comunicati Stampa',
			'name_admin_bar'     => 'Comunicato Stampa',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Comunicato Stampa',
			'new_item'           => 'New Comunicato Stampa',
			'edit_item'          => 'Edit Comunicato Stampa',
			'view_item'          => 'View Comunicato Stampa',
			'all_items'          => 'All Comunicati Stampa',
			'search_items'       => 'Search Comunicati Stampa',
			'parent_item_colon'  => 'Parent Comunicati Stampa:',
			'not_found'          => 'No Comunicati Stampa found.',
			'not_found_in_trash' => 'No Comunicati Stampa found in Trash.',
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-megaphone',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'comunicati-stampa' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'thumbnail'),
			'show_in_rest'		 => true
	);
	register_post_type( 'comunicato-stampa', $args );

	$labels = array(
			'name'               => 'Restituzione',
			'singular_name'      => 'Restituzione',
			'menu_name'          => 'Restituzione',
			'name_admin_bar'     => 'Restituzione',
			'edit_item'          => 'Edit Restituzione',
			'parent_item_colon'  => 'Parent Restituzione:',
			'not_found'          => 'No Restituzione found.',
			'not_found_in_trash' => 'No Restituzione found in Trash.',
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-nametag',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'restituzione' ),
			'capability_type'    => 'page',
			'has_archive'        => false,
			'hierarchical'       => true,
			'menu_position'      => 6,
			'supports'           => array( 'title'),
			'show_in_rest'		 => true
	);
	register_post_type( 'restituzione', $args );

}
add_action( 'init', 'm5s_custom_posttypes' );

// Flush rewrite rules to add "review" as a permalink slug
function m5s_rewrite_flush() {
    m5s_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'm5s_rewrite_flush' );

function register_top_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_top_menu' );
