<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zen_Wellness
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404-not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'zen-wellness' ); ?></h1>
				<p class="desktop-message"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links above?', 'zen-wellness' ); ?></p>
				<p class="mobile-message"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links in the  navigation bar below?', 'zen-wellness' ); ?></p>
			</header><!-- .page-header -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
