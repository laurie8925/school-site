<?php

/**
 * Template Name: News Page Template
 *
 * The template for displaying the News page.
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

        // Display post excerpt only if it's the News page
        if (is_page_template('page-news.php')) {
            the_excerpt();
        } else {
            get_template_part('template-parts/content', 'page');
        }

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
