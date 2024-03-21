<?php
/*
Template Name: Student Template
*/

$terms = get_terms(
    array(
        'taxonomy' => 'student_category',
    )
);

if ($terms && !is_wp_error($terms)) {
    echo '<section class="student-section">';
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
            // echo '<section class="student-section">';
            // echo '<h2 id="' . esc_attr(get_the_ID()) . '">' . esc_html__($term->name) . '</h2>';
            while ($query->have_posts()) {
                $query->the_post();


                if (function_exists('get_field')) {
                    echo '<article class="student-container">';
                    if (get_field('short_biography')) {
                        echo '<h2 id="' . esc_attr(get_the_ID()) . '"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h2>';
                    }
                    the_post_thumbnail('student-blog');

                    the_excerpt();
                    echo '<a href="' . esc_url(get_permalink()) . '">Read More about the Student</a>';


                    // links
                    // $link = get_field('portfolio');
                    // if ($link) {
                    //     echo '<a class="button" href="' . esc_url($link) . '"> ' . esc_html(get_the_title()) . ' portfolio </a>';
                    // }

                    $term_link = get_term_link($term); // Get the link to the term's archive page

                    if (!is_wp_error($term_link)) { // Check if the link is valid
                        echo '<p>Specialty: <a href="' . esc_url($term_link) . '">' . esc_html__($term->name) . '</a></p>';
                    } else {
                        echo '<p>Specialty: ' . esc_html__($term->name) . '</p>';
                    }

                    echo '</article>';
                }
            }
            wp_reset_postdata();
            // echo '</section>';
        }
    }
    echo '</section>';
}
