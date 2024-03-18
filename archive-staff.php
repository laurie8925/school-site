<?php

/**
 * The template for displaying Staff archive pages
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
	<?php get_template_part('page-templates/staff-template'); ?>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
