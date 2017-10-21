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
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
       $args = array(
           'posts_per_page' => 9,
           'paged' => $paged
       );

   			$all_posts = new WP_Query( $args );
   			 if ( $all_posts->have_posts() ) {

        while ( $all_posts->have_posts() ) {
            $all_posts->the_post();
            get_template_part( 'template-parts/content', get_post_format() );
        }

    } else {
        echo 'Sorry, no posts found.';
    }



   		?>

 		</main><!-- .site-main -->
 	</div><!-- .content-area -->

<?php
// Previous/next page navigation.
the_posts_pagination( array(
  'prev_text'          => __( 'Previous page', 'twentysixteen' ),
  'next_text'          => __( 'Next page', 'twentysixteen' ),
  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
) );
?>
 <?php get_sidebar(); ?>
 <?php get_footer(); ?>
