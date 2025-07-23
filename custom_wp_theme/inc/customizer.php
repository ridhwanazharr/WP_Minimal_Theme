<?php
/**
 * custiom_wp_theme Theme Customizer
 *
 * @package custiom_wp_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function custiom_wp_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'custiom_wp_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'custiom_wp_theme_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section( 'contact_social_section', array(
			'title'    => __( 'Contact & Social Info', 'custiom_wp_theme' ),
			'priority' => 30,
		) );

		// Contact Info
		$wp_customize->add_setting( 'contact_phone', array( 'default' => '' ) );
		$wp_customize->add_control( 'contact_phone', array(
			'label'    => __( 'Phone Number', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( 'contact_email', array( 'default' => '' ) );
		$wp_customize->add_control( 'contact_email', array(
			'label'    => __( 'Email Address', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( 'contact_address', array( 'default' => '' ) );
		$wp_customize->add_control( 'contact_address', array(
			'label'    => __( 'Address', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'text',
		) );

		// Social Links
		$wp_customize->add_setting( 'social_behance', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_behance', array(
			'label'    => __( 'Behance URL', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );

		$wp_customize->add_setting( 'social_pinterest', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_pinterest', array(
			'label'    => __( 'Pinterest URL', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );

		$wp_customize->add_setting( 'social_instagram', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_instagram', array(
			'label'    => __( 'Instagram URL', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );

		$wp_customize->add_setting( 'social_twitter', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_twitter', array(
			'label'    => __( 'Twitter URL', 'custiom_wp_theme' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );
}
add_action( 'customize_register', 'custiom_wp_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function custiom_wp_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function custiom_wp_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function custiom_wp_theme_customize_preview_js() {
	wp_enqueue_script( 'custiom_wp_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'custiom_wp_theme_customize_preview_js' );
