<?php
/* Template Name: Staff Template */
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        // Display paragraph of text
        echo '<p>This is some introductory text before displaying staff members.</p>';
        
        // Query and display staff members for Faculty term
        $faculty_query = new WP_Query( array(
            'post_type' => 'staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'staff_category',
                    'field' => 'slug',
                    'terms' => 'faculty',
                ),
            ),
        ) );
        if ( $faculty_query->have_posts() ) {
            echo '<h2>Faculty</h2>';
            while ( $faculty_query->have_posts() ) {
                $faculty_query->the_post();
                echo '<h3>' . get_the_title() . '</h3>';
                echo '<p>' . get_field('short_biography') . '</p>';
                // Display additional information for Faculty
                echo '<p>Courses Teaching: ' . get_field('courses_teaching') . '</p>';
                echo '<p>Instructor Website: <a href="' . get_field('instructor_website') . '">' . get_field('instructor_website') . '</a></p>';
            }
            wp_reset_postdata();
        }
        
        // Query and display staff members for Administrative term
        $admin_query = new WP_Query( array(
            'post_type' => 'staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'staff_category',
                    'field' => 'slug',
                    'terms' => 'administrative',
                ),
            ),
        ) );
        if ( $admin_query->have_posts() ) {
            echo '<h2>Administrative</h2>';
            while ( $admin_query->have_posts() ) {
                $admin_query->the_post();
                echo '<h3>' . get_the_title() . '</h3>';
                echo '<p>' . get_field('short_biography') . '</p>';
            }
            wp_reset_postdata();
        }
    }
}
?>