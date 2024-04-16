<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zen_Wellness
 */

?>

	<footer id="colophon" class="site-footer">
		<h2>Visit Us</h2>
		<div class="map-location">
			<?php 
				// google map in footer
				echo do_shortcode( '[wpgmza id="1"]' ); 
			?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
