<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Project
 */

get_header();
?>

<main id="primary" class="site-main">

	<header class="page-header">
		<?php
		add_filter('get_the_archive_title_prefix', '__return_empty_string');
		the_archive_title('<h1 class="page-title">', '</h1>');
		the_archive_description('<div class="archive-description">', '</div>');
		?>
	</header><!-- .page-header -->

	<!-- post content -->
	<?php

	$terms = get_terms(
		array(
			'taxonomy' => 'student_category',
		)
	);

	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$args = array(
				'post_type'      => 'student',
				'posts_per_page' => -1,
				'orderby'            => 'title',
				'order'              => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'student_category',
						'field'    => 'slug',
						'terms'    => $term->slug
					),
				),
			);
			$query = new WP_Query($args);

			if ($query->have_posts()) {
				echo '<section class="student-section"><h2 id="' . esc_attr(get_the_ID()) . '">' . esc_html__($term->name) . '</h2>';
				while ($query->have_posts()) {
					$query->the_post();


					if (function_exists('get_field')) {
						if (get_field('short_biography')) {
							echo '<h3 id="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</h3>';
						}
						the_post_thumbnail('large');
						the_excerpt();
						// links
						$link = get_field('portfolio');
						if ($link) {
							echo '<a class="button" href="' . esc_url($link) . '"> ' . esc_html(get_the_title()) . ' portfolio </a>';
						}

						echo '<p>Sepcality: ' . esc_html__($term->name) . '</p>';
					}
				}
				wp_reset_postdata();
				echo '</section>';
			}
		}
	}

	?>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
