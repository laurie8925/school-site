<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Project
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', get_post_type());

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

    <section class="home-blog">
        <h2><?php esc_html_e('Recent News', 'School Project'); ?></h2>
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' =>  3
        );
        $blog_query = new WP_Query($args);
        if ($blog_query->have_posts()) {
            while ($blog_query->have_posts()) {
                $blog_query->the_post();
        ?>
                <article class="blog-post">
                    <?php the_post_thumbnail('medium'); ?>
                    <div class="overlay">
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    </div>
                </article>
        <?php
            }
            wp_reset_postdata();
        }
        ?>
        <!-- Add a link to the news page -->
        <p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php esc_html_e('View All News', 'School Project'); ?></a></p>
    </section>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
