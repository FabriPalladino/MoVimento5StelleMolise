<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->
	</div><!-- .site-inner -->
	<footer class="m5s-footer">
		<div class="site-inner">
			<?php
				/**
				 * Fires before the twentysixteen footer text for footer customization.
				 *
				 * @since Twenty Sixteen 1.0
				 */
				do_action( 'twentysixteen_credits' );
			?>
			<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?><?php twentysixteen_the_custom_logo(); ?></a></span>
			<a href="<?php //echo esc_url( __( 'http://fabripalladino.com/', 'twentysixteen' ) ); ?>"><?php //printf( __( 'Development by %s', 'twentysixteen' ), 'FabriPalladino' ); ?></a>

		</div>
	</footer>
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
