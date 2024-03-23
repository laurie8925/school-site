<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Project
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="footer-logo">
        <?php
        // Get the ACF image field value
		// if (function_exists('get_field')) {
        //     if (get_field('footer_image')) {
		// 		the_field('footer_image');
		// 	}}
		
        // Check if custom logo is available
        if (function_exists('the_custom_logo')) {
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
            if ($logo_url) {
                echo '<a href="' . esc_url(home_url('/')) . '">';
                echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '">';
                echo '</a>';
            }
        }
     
        ?>
    </div>
	<nav id="footer-navigation" class="footer-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu') ); ?>
		</nav>
	
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'school-project' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'school-project' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'school-project' ), 'school-project', '<a href="https://rathans.com/School">Rathan Srivarathan</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<!-- just testing -->
