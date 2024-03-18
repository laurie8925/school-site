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
        $footer_logo = get_field('footer_image', 'option');

        // Check if the logo exists
        if ($footer_logo) {
            echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . esc_url($footer_logo['url']) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
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
