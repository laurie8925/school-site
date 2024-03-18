<?php

/**
 
 *The template for displaying the Developer archive in the Student Category Taxonomy.*
 *@link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *@package School_Project
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

        <header class="page-header">
            <h1><?php single_term_title(); ?> Students</h1>
        </header><!-- .page-header -->

        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();
        ?>

            <article>
                <a href="<?php the_permalink() ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php the_post_thumbnail('large'); ?>
                </a>
                <?php the_content(); ?>
                <?php
                $link = get_field('portfolio');
                if ($link) {
                    echo '<a class="button" href="' . esc_url($link) . '"> ' . esc_html(get_the_title()) . ' portfolio </a>';
                }
                ?>

            </article>

    <?php

        endwhile;

        the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #primary -->

<?php

get_footer();
