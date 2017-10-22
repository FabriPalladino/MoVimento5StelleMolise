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
			<span><a href="http://www.molise5stelle.it">www.molise5stelle.it</a> usa una licenza Creative Commons Attribuzione - Non commerciale - Condividi allo stesso modo 4.0 Internazionale | Questo blog non rappresenta una testata giornalistica in quanto viene aggiornato senza alcuna periodicità. Non può pertanto considerarsi un prodotto editoriale ai sensi della legge n. 62 del 7.03.2001. Se è stato pubblicato materiale soggetto a copyright vi preghiamo di comunicarcelo, provvederemo tempestivamente alla rimozione.
		Gruppo Consiliare MoVimento 5 Stelle - Via IV Novembre, 87 - 86100 Campobasso - 0874.424040 - C.F. 92067570702
		Tutti i dati raccolti su questo sito sono soggetti alla informativa sulla privacy</span>
		</div>
	</footer>
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
