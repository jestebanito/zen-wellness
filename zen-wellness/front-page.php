<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zen_Wellness
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<!-- Main Navigation -->
		<section class="main-nav">
			<ul>
			<li class="main-team-nav">
				<h2>Meet your RMT</h2>
				<div>
					<a href="">Our Team</a>
				</div>
			</li>

			<li class="main-book-nav">
				<h2>Find your Zen</h2>
				<div>
					<a href="">Book a session</a>
				</div>
			</li>

			<li class="main-contact-nav">
				<h2>Contact us</h2>
				<div>
					<a href="">Contact us</a>
				</div>
			</li>
			</ul>
		</section>

	</main><!-- #main -->

<?php
get_footer();
