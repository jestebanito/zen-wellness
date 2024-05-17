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
			<?php echo file_get_contents(get_template_directory_uri() . '/icons/team-icon.svg'); ?>
				<h2>Meet your RMT</h2>
					<a href="<?php echo esc_url(get_permalink(get_page_by_path('team'))); ?>">Our Team</a>
			</li>

			<li class="main-book-nav">
				<?php echo file_get_contents(get_template_directory_uri() . '/icons/book-icon.svg'); ?>
				<h2>Find your Zen</h2>
					<a href="">Book a session</a>
			</li>

			<li class="main-contact-nav">
				<?php echo file_get_contents(get_template_directory_uri() . '/icons/contact-icon.svg'); ?>
				<h2>Contact us</h2>
					<a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact us</a>
			</li>
			</ul>
		</section>

		<section class="rmt-container">
			<div class="rmt-info">
			<div>
			<?php
				$rmt_image = get_field('rmt_image');
				if ($rmt_image) : ?>
					<?php echo '<img src="' . esc_url($rmt_image) . '"alt = "Massage therapist working">'; ?>
				<?php
				endif;
				?></div>
			<div><?php
				$rmt_definition = get_field('rmt_definition');
				if ($rmt_definition) : ?>
					<h3><?php echo esc_html($rmt_definition); ?></h3>
					
				<?php
				endif;
			?></div>
			<div><?php
				$condition_title = get_field('condition_title');
				if ($condition_title) : ?>
					<h3><?php echo esc_html($condition_title); ?></h3>
				<?php
				endif;
				
				$rmt_conditions = get_field('rmt_conditions');
				if ($rmt_conditions && is_array($rmt_conditions)) : 
					echo '<ul class="rmt-conditions">';
					foreach ($rmt_conditions as $item) {
						echo '<li>' . $item['condition_types'] . '</li>';
					}
					echo '</ul>';
				endif;
			?></div>
			<div><?php
				$advantage_title = get_field('advantage_title');
				if ($advantage_title) : ?>
					<h3><?php echo esc_html($advantage_title); ?></h3>
				<?php
				endif;
				
				$rmt_advantages = get_field('rmt_advantages');
				if ($rmt_advantages && is_array($rmt_advantages)) : 
					echo '<ul class="rmt-conditions">';
					foreach ($rmt_advantages as $item) {
						echo '<li>' . $item['advantage_types'] . '</li>';
					}
					echo '</ul>';
				endif;
			?></div>
			</div>
				<a class="rmt-info-book-btn" href="<?php echo esc_url(get_permalink(get_page_by_path('book'))); ?>">
					Book a session
				</a>
		</section>

	</main><!-- #main -->

<?php
get_footer();
