<?php
/**
 * Template Name: Full List Page
 *
 * @package WordPress
 * @subpackage movimento-5-stelle-molise
 * @since movimento-5-stelle-molise 1.0
 */


 get_header(); ?>
 <div class="site-inner">

 <div id="content" class="site-content">

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

 			<header class="page-header">
 				<?php
 					the_archive_title( '<h1 class="page-title">', '</h1>' );
 					the_archive_description( '<div class="taxonomy-description">', '</div>' );
 				?>
 			</header><!-- .page-header -->

      <?php
      $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
      $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged
      );
        // the query
        $the_query = new WP_Query( $query_args ); ?>

        <?php if ( $the_query->have_posts() ) : ?>

          <!-- pagination here -->

          <!-- the loop -->
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php  get_template_part( 'template-parts/content', get_post_format() ); ?>
          <?php endwhile; ?>
          <!-- end of the loop -->

          <!-- pagination here -->

          <?php wp_reset_postdata(); ?>

        <?php else:  ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


      </main><!-- .site-main -->
        </div><!-- .content-area -->

 <?php get_sidebar(); ?>
 <?php get_footer(); ?>
