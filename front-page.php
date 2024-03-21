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
        echo '<h1> Welcome to our School </h1> ';
        the_post();
    ?>
        <div class="entry-content">
            <?php
            the_content();
            ?>
        </div><!-- .entry-content -->
    <?php
    endwhile; // End of the loop.
    ?>



    <section class="home-blog">
        <h2><?php esc_html_e('Recent News', 'fwd'); ?></h2>
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
        <p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php esc_html_e('View All News', 'fwd'); ?></a></p>
    </section>


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
