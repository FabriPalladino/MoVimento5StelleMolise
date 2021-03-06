<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header('home'); ?>
<div class="grid-strip">
	<section class="news-grid site-inner">

		<?php
			query_posts('posts_per_page=5&ignore_sticky_posts=1');
			if ( have_posts() ) while ( have_posts() ) : the_post();

			get_template_part('template-parts/grid');

		endwhile;

		wp_reset_query();

		?>

	</section>

</div>

<div class="site-inner">

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php query_posts('offset=5&posts_per_page=10');
				if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>

				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			// the_posts_pagination( array(
			// 	'prev_text'          => __( 'Previous page', 'twentysixteen' ),
			// 	'next_text'          => __( 'Next page', 'twentysixteen' ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			// ) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		<a href="/tutti-gli-articoli" class="all-articles">Vedi tutti gli Articoli -></a>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
