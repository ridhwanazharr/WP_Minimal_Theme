<?php
/**
 * rawingtheme_minimal Theme Customizer
 *
 * @package rawingtheme_minimal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rawingtheme_minimal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'rawingtheme_minimal_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'rawingtheme_minimal_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section( 'contact_social_section', array(
			'title'    => __( 'Contact & Social Info', 'rawingtheme_minimal' ),
			'priority' => 30,
		) );

		// Contact Info
		$wp_customize->add_setting( 'contact_phone', array( 'default' => '' ) );
		$wp_customize->add_control( 'contact_phone', array(
			'label'    => __( 'Phone Number', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( 'contact_email', array( 'default' => '' ) );
		$wp_customize->add_control( 'contact_email', array(
			'label'    => __( 'Email Address', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( 'contact_address', array( 'default' => '' ) );
		$wp_customize->add_control( 'contact_address', array(
			'label'    => __( 'Address', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'text',
		) );

		// Social Links
		$wp_customize->add_setting( 'social_behance', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_behance', array(
			'label'    => __( 'Behance URL', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );

		$wp_customize->add_setting( 'social_pinterest', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_pinterest', array(
			'label'    => __( 'Pinterest URL', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );

		$wp_customize->add_setting( 'social_instagram', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_instagram', array(
			'label'    => __( 'Instagram URL', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );

		$wp_customize->add_setting( 'social_twitter', array( 'default' => '' ) );
		$wp_customize->add_control( 'social_twitter', array(
			'label'    => __( 'Twitter URL', 'rawingtheme_minimal' ),
			'section'  => 'contact_social_section',
			'type'     => 'url',
		) );
}
add_action( 'customize_register', 'rawingtheme_minimal_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rawingtheme_minimal_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rawingtheme_minimal_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rawingtheme_minimal_customize_preview_js() {
	wp_enqueue_script( 'rawingtheme_minimal-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'rawingtheme_minimal_customize_preview_js' );
