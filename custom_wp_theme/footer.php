<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custiom_wp_theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-row">
			<div class="site-branding">
				<p class="site-title"><?php bloginfo( 'name' ); ?></p>
				<p class="site-tagline"><?php echo get_bloginfo( 'description' ); ?></p>
				<div class="social-links">
					<?php if ( get_theme_mod( 'social_behance' ) ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'social_behance' ) ); ?>" target="_blank"><i class="fa-brands fa-behance"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'social_pinterest' ) ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'social_pinterest' ) ); ?>" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'social_instagram' ) ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'social_instagram' ) ); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'social_twitter' ) ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'social_twitter' ) ); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer-menu">

			</div>
			<div class="footer-menu">
				<h4 class="footer-menu-title">Contact Us</h4>
				<?php if ( get_theme_mod( 'contact_phone' ) ) : ?>
					<p><?php echo esc_html( get_theme_mod( 'contact_phone' ) ); ?></p>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'contact_email' ) ) : ?>
					<p><?php echo esc_html( get_theme_mod( 'contact_email' ) ); ?></p>
				<?php endif; ?>
				<div class="contact-address">
					<?php if ( get_theme_mod( 'contact_address' ) ) : ?>
						<p><?php echo esc_html( get_theme_mod( 'contact_address' ) ); ?></p>
					<?php endif; ?>
				</div>
				
			</div>
			<div class="footer-menu">
				<h4 class="footer-menu-title">Navigation</h4>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
			</div>
		</div>
		<div class="site-info">
			<p>Copyright <?php echo date("Y"); ?> - <?php bloginfo( 'name' ); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
