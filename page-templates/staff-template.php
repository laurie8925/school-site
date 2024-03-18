<?php
/* Template Name: Staff Template */

// Query and display staff members for Administrative term
$args = array(
    'post_type'      => 'staff',
    'posts_per_page' => -1,
    'orderby'            => 'title',
    'order'              => 'ASC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'staff_category',
            'field'    => 'slug',
            'terms'    => 'administrative'
        ),
    ),
);
$adam_query = new WP_Query($args);

if ($adam_query->have_posts()) {
    echo '<section class="staff-section"><h2 id="' . esc_attr(get_the_ID()) . '">' . esc_html__('Administrative', 'School Project') . '</h2>';
    while ($adam_query->have_posts()) {
        $adam_query->the_post();

        if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail');
        }

        if (function_exists('get_field')) {
            if (get_field('staff_biography')) {
                echo '<h3 id="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</h3>';
                the_field('staff_biography');
                if (get_field('courses')) {
                    echo '<p>Courses Teaching: ' . get_field('courses') . '</p>';
                }

                // links
                $link = get_field('instructor_website');
                if ($link) : ?> <!--link statement-->
                    <a class="button" href="<?php echo esc_url($link); ?>"> <?php echo esc_html('Visit Instructor Website', 'School Project'); ?></a>
                <?php endif; //link if statement
            }
        }
    }
    wp_reset_postdata();
    echo '</section>';
}

// Query and display staff members for Faculty term
$faculty_query = new WP_Query(array(
    'post_type' => 'staff',
    'tax_query' => array(
        array(
            'taxonomy' => 'staff_category',
            'field' => 'slug',
            'terms' => 'faculty',
        ),
    ),
));
if ($faculty_query->have_posts()) {
    echo '<section class="staff-section"><h2 id="' . esc_attr(get_the_ID()) . '">' . esc_html__('Faculty', 'School Project') . '</h2>';
    while ($faculty_query->have_posts()) {
        $faculty_query->the_post();

        if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail');
        }

        echo '<h3 id="' . esc_attr(get_the_ID()) . '">' . get_the_title() . '</h3>';
        echo '<p>' . get_field('staff_biography') . '</p>';
        // Display additional information for Faculty
        if (get_field('courses')) {
            echo '<p>Courses Teaching: ' . get_field('courses') . '</p>';
        }
        $link = get_field('instructor_website');
        if ($link) {
            echo '<a class="button" href="' . esc_url($link) . '"> ' . esc_html('Visit Instructor Website', 'School Project') . '</a>';

            // echo '<p>Instructor Website: <a href="' . get_field('instructor_website') . '">' . get_field('instructor_website') . '</a></p>';
        }
    }
    wp_reset_postdata();
    echo '</section>';
}
?>
