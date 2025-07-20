<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Empty Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package custiom_wp_theme
 */

get_header();
?>

	<main id="primary" class="site-main no-padding">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page-empty' );


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
<?php
get_footer();
