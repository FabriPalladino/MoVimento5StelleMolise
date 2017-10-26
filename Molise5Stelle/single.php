<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(single); ?>

<div class="site-inner">

<div id="content" class="site-content">
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

		if( get_post_type() === 'comunicato-stampa' ) {
			// Include the single post content template.
			get_template_part( 'template-parts/content', 'comunicati' );
		} else {
			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );
		}


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();

			}
?>

<section class="m5s-single-pagination">
			<div class="post-pagination-left">
			    <?php // Get previous post.
			    $prev_post = get_previous_post();

			    if ( ! empty( $prev_post ) ) : ?>
			        <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="link">
			            <!-- <svg/></svg> -->
			            <p>&nbsp;Precedente</p>
			            <p class="single-pagination__title">
										<?php echo $prev_post->post_title; ?>
									</p>

			        <figure class="pagination-image pagination-image__left" style="background-image: url('<?php echo get_the_post_thumbnail_url( $prev_post->ID );?>')"></figure>
					</a>
			    <?php endif; ?>
			</div>

			<div class="post-pagination-right">
				<?php // Get previous post.
				$next_post = get_next_post();

				if ( ! empty( $next_post ) ) : ?>
					<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="link">
							<!-- <svg/></svg> -->
							<p>&nbsp;Successivo</p>
							<p class="single-pagination__title">
								<?php echo $next_post->post_title; ?>
							</p>

					<figure class="pagination-image pagination-image__right" style="background-image: url('<?php echo get_the_post_thumbnail_url( $next_post->ID );?>')"></figure>
			</a>
				<?php endif; ?>
			</div>

			</section>
<?php
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer('single'); ?>
