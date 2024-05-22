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

	<div class="map-location">
		<h2>Visit Us</h2>
		<p>988 West Broadway, Vancouver, V5Z 1K7</p>
		<?php 
			// google map in footer
			echo do_shortcode( '[wpgmza id="1"]' ); 
		?>
	</div>
	<footer id="colophon" class="site-footer">
		<?php echo file_get_contents(get_template_directory_uri() . '/icons/zen-wellness-icon-lrg.svg'); ?>
		<div class="email">
			<p id="email-text">
				<a href="mailto:zenwellnessbc@gmail.com">
					zenwellnessbc@gmail.com
				</a>
			</p>
			<img src="<?php echo get_template_directory_uri() . '/icons/copy-icon.svg'; ?>" alt="Copy Icon" id="copy-button"/>
		</div>	
		
		<p>&copy; 2024 Zen Wellness, All rights reserved.</p>

		<p>Powered by
			<a class="website-url" href="<?php echo esc_url('https://je-codes.com/'); ?>"> je.codes</a>
		</p>
		

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
