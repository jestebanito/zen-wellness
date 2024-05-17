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
        <section class="zen-wellness-teampage">
            <?php
                while ($query->have_posts()) :
                    $query->the_post();
                    if (function_exists('get_field')) :
            ?>
            <article class="team-page">
                <?php the_post_thumbnail('medium'); ?> 
            </article>
            <?php
					endif;
				endwhile;
				wp_reset_postdata();
			endif 
			?>
        </section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
