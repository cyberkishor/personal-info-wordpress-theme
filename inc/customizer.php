<?php
/**
 * Personal Info by SpiderWpThemes Theme Customizer
 *
 * @package Personal_Info_by_SpiderBuzz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function perosnal_info_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
                $wp_customize->selective_refresh->add_partial( 'blogname', array(
                    'selector'        => '.site-title a',
                    'render_callback' => 'sanitize_text_field',
                ) );
                $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                    'selector'        => '.site-description',
                    'render_callback' => 'sanitize_text_field',
				) );
				$wp_customize->selective_refresh->add_partial( 'header_textcolor', array(
                    'selector'        => '.site-title a',
                    'render_callback' => 'sanitize_text_field',
				) );
	}
}
add_action( 'customize_register', 'perosnal_info_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function perosnal_info_customize_preview_js() {
	wp_enqueue_script( 'perosnal_info_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'perosnal_info_customize_preview_js' );

//add the customizer 
function personal_info_customize( $wp_customize ) {
			//add the social links section
			$wp_customize->add_section('social',array(
				'title'		=>esc_html__('Social Links','personal-info'),
				'description'=>esc_html__('Enter the all Social Links here','personal-info'),
				'priority'	=>30,		
			));

			//add the facebook links
			$wp_customize->add_setting('facebook_url',array(
				'default'	=> '',
				'sanitize_callback' => 'esc_url_raw'
				
			));
			$wp_customize->add_control('facebook_url',array(
				'label'		=> esc_html__('Facebook URL','personal-info'),
				'section'	=>'social',
				'priority'	=> 30,
				'type'		=> 'url'
			));
			//Add the Twitter links
			$wp_customize->add_setting('twitter_url',array(
				'default'	=>'',
				'sanitize_callback' => 'esc_url_raw'
			));
			$wp_customize->add_control('twitter_url',array(
				'label'		=> esc_html__('Twitter URL','personal-info'),
				'section'	=> 'social',
				'priority'	=>	31,
				'type'		=>'url'
			));

			//add the linkedin link
			$wp_customize->add_setting('linkedin_url',array(
				'default'	=>'',
				'sanitize_callback' => 'esc_url_raw'
			));
			$wp_customize->add_control('linkedin_url',array(
				'label'		=> esc_html__('Linkedin URL','personal-info'),
				'section'	=> 'social',
				'priority'	=>	32,
				'type'		=>	'url'
			));

			//add the google-plus link
			$wp_customize->add_setting('google_plus_url',array(
				'default'	=>'',
				'sanitize_callback' => 'esc_url_raw'
			));
			$wp_customize->add_control('google_plus_url',array(
				'label'		=> esc_html__('Google Plus URL','personal-info'),
				'section'	=> 'social',
				'priority'	=>	33,
				'type'		=>	'url'
			));

			//add the WordPress link
			$wp_customize->add_setting('wordpress_url',array(
				'default'	=>'',
				'sanitize_callback' => 'esc_url_raw'
			));
			$wp_customize->add_control('wordpress_url',array(
				'label'		=> esc_html__('WordPress URL','personal-info'),
				'section'	=> 'social',
				'priority'	=>	34,
				'type'		=>	'url'
			));

		#############################################################################3
		#					Custom Info section
		#############################################################################
			//add the custom_info  section
			$wp_customize->add_section('custom_info',array(
				'title'		=>esc_html__('Personal Info','personal-info'),
				'description'=>esc_html__('Custom Personal Info Section','personal-info'),
				'priority'	=>35,		
			));

			//Add the Phone Number 
			$wp_customize->add_setting('phone_no',array(
				'default'	=>	'',
				'transport'   => 'refresh',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
			));
			$wp_customize->add_control('phone_no',array(
				'label'		=> esc_html__('Phone No.','personal-info'),
				'section'	=> 'custom_info',
				'priority'	=> 36,
				'type'		=>	'text',
				
			));

			//Add the email address 
			$wp_customize->add_setting('email_add',array(
				'default'	=>	'',
				'transport'   => 'refresh',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
			));
			$wp_customize->add_control('email_add',array(
				'label'		=> esc_html__('Email Address','personal-info'),
				'section'	=> 'custom_info',
				'priority'	=> 37,
				'type'		=>	'email',
				
			));

			

			//Add the Address 
			$wp_customize->add_setting('address',array(
				'default'	=>'',
				'transport'   => 'refresh',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
				
			));
			$wp_customize->add_control('address',array(
				'label'		=> esc_html__('Address','personal-info'),
				'section'	=> 'custom_info',
				'priority'	=>	38,
				'type'		=>	'text',
			));

		}
add_action( 'customize_register', 'personal_info_customize' );


function perosnal_info_sanitize_email( $email, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$email = sanitize_email( $email );
	
	// If $email is a valid email, return it; otherwise, return the default.
	return ( ! null( $email ) ? $email : $setting->default );
}