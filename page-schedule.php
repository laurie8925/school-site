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
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	<?php

	$field_object = get_field_object('schedule');

	// Accessing the field name
	$field_name = $field_object['name'];
	// Get the repeater field value
	$table_rows = get_field('schedule');

	// Check if the repeater field value exists
	if ($table_rows) {
		echo '<table class=' . $field_name . '>';
		echo '<caption>Weekly Course Schedule</caption>';
		// Output sub-field names at the top
		echo '<tr>';
		foreach ($table_rows[0] as $sub_field_name => $sub_field_value) {
			$sub_field_name = ucfirst($sub_field_name);
			echo '<th>' . $sub_field_name . '</th>';
		}
		echo '</tr>';

		// Loop through each row
		foreach ($table_rows as $row) {
			echo '<tr>';
			// Loop through each sub-field (column)
			foreach ($row as $sub_field_name => $sub_field_value) {
				echo '<td>' . $sub_field_value . '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
	}
	?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
