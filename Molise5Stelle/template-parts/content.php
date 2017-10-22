<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<aside class="article__date">
			<?php
				$data = get_the_date();;
				list($day, $month, $year) = explode(" ", $data);
				echo '<span>' . $day . ' ' . $month . ' ' . $year . '</span>';

			?>
		</aside>
	<?php twentysixteen_m5s_cat(); ?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>


			<?php //twentysixteen_post_thumbnail(); ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php twentysixteen_m5s_tag(); ?>

	</header><!-- .entry-header -->

	<?php //twentysixteen_excerpt(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			// the_content( sprintf(
			// 	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
			// 	get_the_title()
			// ) );

			echo wp_trim_words( get_the_content(), 100, '...' );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
