<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Project
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php

	$terms = get_terms(
		array(
			'taxonomy' => 'staff_category',
		)
	);
	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			// Add your WP_Query() code here
			$args = array(
				'post_type'      => 'staff',
				'posts_per_page' => -1,
				'orderby'            => 'title',
				'order'              => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'staff_category',
						'field'    => 'slug',
						'terms'    => $term->slug
					),
				),
			);
			$query = new WP_Query($args);

			if ($query->have_posts()) {
				echo '<section class="staff-section"><h2 id="' . esc_attr(get_the_ID()) . '">' . esc_html__($term->name) . '</h2>';
				while ($query->have_posts()) {
					$query->the_post();


					if (function_exists('get_field')) {
						if (get_field('staff_biography')) {
							echo '<h2 id="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</h2>';
							the_field('staff_biography');
						}
					}
	?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_title('<h3 id="' . esc_attr(get_the_ID()) . '">', '</h3>'); ?>
						<?php echo get_field('staff'); ?>
					</article>
	<?php
				}
				wp_reset_postdata();
			}
			// endforeach; 
			// Use $term->slug in your tax_query
			// Use $term->name to organize the posts
		}
	}
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
