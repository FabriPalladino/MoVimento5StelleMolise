<?php

// include custom jQuery
function m5s_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'm5s_include_custom_jquery');

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
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

// function twentysixteen_entry_taxonomies() {
//
//
//
// }

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
