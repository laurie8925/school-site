<?php
/**
 * Template part for displaying Student posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Project
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
			<div class="entry-meta">
				<?php
				school_project_posted_on();
				school_project_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php school_project_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		// Display the student's content
		the_content();

		// Display related students
		$terms = wp_get_post_terms(get_the_ID(), 'custom_taxonomy_student');

		if ($terms && !is_wp_error($terms)) {
			$term_ids = wp_list_pluck($terms, 'term_id');
			$args = array(
				'post_type' => 'student',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'custom_taxonomy_student',
						'field' => 'id',
						'terms' => $term_ids,
						'operator' => 'IN'
					)
				),
				'post__not_in' => array(get_the_ID())
			);
			$related_students = new WP_Query($args);

			if ($related_students->have_posts()) {
				echo '<h3>Related Students</h3>';
				echo '<ul>';
				while ($related_students->have_posts()) : $related_students->the_post();
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				endwhile;
				echo '</ul>';
			}
			wp_reset_postdata();
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php school_project_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->