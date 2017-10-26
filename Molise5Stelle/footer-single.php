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
			<span><strong>www.molise5stelle.it</strong> usa una licenza <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribuzione - Non commerciale - Condividi allo stesso modo 4.0 Internazionale</a> | Questo blog non rappresenta una testata giornalistica in quanto viene aggiornato senza alcuna periodicità. Non può pertanto considerarsi un prodotto editoriale ai sensi della legge n. 62 del 7.03.2001. Se è stato pubblicato materiale soggetto a copyright vi preghiamo di <a href="/contatti/">comunicarcelo</a>, provvederemo tempestivamente alla rimozione.<br />
<a href="/informativa/">Informativa Privacy &amp; Cookie</a><br /><br />
Gruppo Consiliare MoVimento 5 Stelle - Via IV Novembre, 87 - 86100 Campobasso - 0874.424040 - C.F. 92067570702
</span>
		</div>
		<p class="fp-credits">Design and development: <a href="https://fabripalladino.com" target="_blank">FabriPalladino</a>. Powered by <a href="https://wordpress.org">WP</a></p>
	</footer>
</div><!-- .site -->

<?php wp_footer(); ?>
<!-- <script src='https://www.google.com/recaptcha/api.js'  async defer></script> -->
<script type="text/javascript">
jQuery("#submit").click(function(e){
        var data_2;
    jQuery.ajax({
                type: "POST",
                url: "/wp-content/themes/Molise5Stelle/google_captcha.php",
                data: jQuery('#commentform').serialize(),
                async:false,
                success: function(data) {
                 if(data.nocaptcha==="true") {
               data_2=1;
                  } else if(data.spam==="true") {
               data_2=1;
                  } else {
               data_2=0;
                  }
                }
            });
            if(data_2!=0) {
              e.preventDefault();
              if(data_2==1) {
                alert("Please check the captcha");
              } else {
                console.log("Per cortesia inserisci il captcha");
              }
            } else {
                jQuery("#commentform").submit
           }
  });
</script>
</body>
</html>
