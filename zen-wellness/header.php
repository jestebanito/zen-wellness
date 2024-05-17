<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zen_Wellness
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'zen-wellness' ); ?>
	</a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
			?>
				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php echo file_get_contents(get_template_directory_uri() . '/icons/zen-wellness-icon.svg'); ?>
					</a>
				</div>
			<?php
			else :
			?>
				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php echo file_get_contents(get_template_directory_uri() . '/icons/zen-wellness-icon.svg'); ?>
					</a>
				</div>
			<?php
			endif;
			$zen_wellness_description = get_bloginfo( 'description', 'display' );
			if ( $zen_wellness_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $zen_wellness_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php 
			endif; 
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">

			<a href="<?php echo esc_url(get_permalink(get_page_by_path('home'))); ?>" class="home-button">
				<?php echo file_get_contents(get_template_directory_uri() . '/icons/home-button-icon.svg'); ?>
			</a>

			<button id="menu-btn" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php echo file_get_contents(get_template_directory_uri() . '/icons/menu-open-icon.svg'); ?>
			</button>
			<?php

			wp_nav_menu(
				array(
					'theme_location' => 'header',
					'menu_id'        => 'header-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
