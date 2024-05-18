<?php
/**
 * The template for displaying the Team page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
        <?php
			$args = array(
				'post_type'      => 'zen-wellness-team',
				'posts_per_page' => -1,
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) :
		?>
		<?php
			while ($query->have_posts()) :
				$query->the_post();
				if (function_exists('get_field')) :
		?>
			<section class="rates-container">
				<?php
					$rates_bullets = get_field('rates_bullets');
					if ($rates_bullets && is_array($rates_bullets)) : 
						echo '<ul class="rates-bullets">';
						foreach ($rates_bullets as $item) {
							echo '<li>' . $item['bullet_points'] . '</li>';
						}
						echo '</ul>';
					endif;
				?>
			</section>
			<section class="hours-container">
				<h3>Hours</h3>
				<?php
					$hours_bullets = get_field('hours_bullets');
					if ($hours_bullets && is_array($hours_bullets)) : 
						echo '<ul class="rates-bullets">';
						foreach ($hours_bullets as $item) {
							echo '<li>' . $item['bullet_points'] . '</li>';
						}
						echo '</ul>';
					endif;
				?>
			</section>
            <?php
			endif;
			endwhile;
			wp_reset_postdata();
			endif 
		?>
            <section class="insurance-container">
                <h3>We provide direct billing to your insurance company!</h3>
                <?php
                    $insurance_list = get_field('insurance_list');
                    if ($insurance_list && is_array($insurance_list)) : 
                        echo '<ul class="insurance-types">';
                        foreach ($insurance_list as $item) {
                            echo '<li>' . $item['insurance_types'] . '</li>';
                        }
                        echo '</ul>';
                    endif;
                ?>
            </section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
