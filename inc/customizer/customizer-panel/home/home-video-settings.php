<?php
/**
 * Video Call To Action Section
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_video_calltoaction_section', array(
	'title'		=> 	esc_html__('Video Call To Action Section','spark-construction-lite'),
	'panel'		=> 'sparkconstructionlite_frontpage_settings',
	'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_video_calltoaction_section'),
	'hiding_control' => 'sparkconstructionlite_videcta_disable'
)));

//ENABLE/DISABLE VIDEO CALL TO ACTION SECTION
$wp_customize->add_setting('sparkconstructionlite_videcta_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_videcta_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_video_calltoaction_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

	$wp_customize->add_setting('sparkconstructionlite_video_calltoaction_section_nav', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control( new SparkConstructionLite_Custom_Control_Tab( $wp_customize, 'sparkconstructionlite_video_calltoaction_section_nav', array(
		'type' => 'tab',
		'section' => 'sparkconstructionlite_video_calltoaction_section',
		'priority' => 1,
		'buttons' => array(
			array(
				'name' => esc_html__('Content', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_video_cta_layout',
					'sparkconstructionlite_video_button_url',
					'sparkconstructionlite_video_calltoaction_video_bg',
					'sparkconstructionlite_appointment_contact_title',
					'sparkconstructionlite_appointment_shortcode',
					'sparkconstructionlite_video_calltoaction_height',
				),
				'active' => true,
			),
			array(
				'name' => esc_html__('Style', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_video_calltoaction_box_bg_color'
				),
			),
			array(
				'name' => esc_html__('Advanced', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_video_calltoaction_bg_type',
					'sparkconstructionlite_video_calltoaction_bg_color',
					'sparkconstructionlite_video_calltoaction_bg_image',
					'sparkconstructionlite_video_calltoaction_overlay_color',
					'sparkconstructionlite_video_calltoaction_padding',
					'sparkconstructionlite_video_calltoaction_cs_seperator',
				),
			)
		)
	)));

	$wp_customize->add_setting('sparkconstructionlite_video_cta_layout', array(
        'default' => 'video-cta-top',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_video_cta_layout',
            array(
                'choices'  => array(
                    'video-cta-left' => esc_html__('Left', 'spark-construction-lite'),
                    'video-cta-right' => esc_html__('Right', 'spark-construction-lite'),
                    'video-cta-top' => esc_html__('Top', 'spark-construction-lite'),
                    'video-cta-below' => esc_html__('Below', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Display Position', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_video_calltoaction_section',
            )
        )
    );

	$wp_customize->add_setting('sparkconstructionlite_video_button_url', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw',
		'default' => 'https://www.youtube.com/watch?v=1IaZy0sDLu0',		
	));
	$wp_customize->add_control('sparkconstructionlite_video_button_url', array(
		'label'	   => esc_html__('Youtube Video URL','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_video_calltoaction_section',
		'type'	   => 'url'
	));

	$wp_customize->add_setting( 'sparkconstructionlite_video_calltoaction_video_bg', array(
		'sanitize_callback' => 'esc_url_raw', 	 	
		'transport' => 'postMessage',
		'default' => get_template_directory_uri() . '/assets/images/bg.jpg',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sparkconstructionlite_video_calltoaction_video_bg', array(
		'label'	   => esc_html__('Video Background Image','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_video_calltoaction_section',
	)));

	$wp_customize->add_setting('sparkconstructionlite_appointment_contact_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => esc_html__('Get in Touch Quickly', 'spark-construction-lite'),
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_appointment_contact_title', array(
        'section' => 'sparkconstructionlite_video_calltoaction_section',
        'type' => 'text',
        'label' => esc_html__('Contact Title', 'spark-construction-lite')
    ));
	
	$wp_customize->add_setting('sparkconstructionlite_appointment_shortcode', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field'		
	));
	$wp_customize->add_control('sparkconstructionlite_appointment_shortcode', array(
		'label'	   => esc_html__('Shortcode','spark-construction-lite'),
		'description' => sprintf(esc_html__('Install %s plugin to get the shortcode or you can use any shortcode', 'spark-construction-lite'), '<a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a>'),
		'section'  => 'sparkconstructionlite_video_calltoaction_section',
		'type'	   => 'text',
	));

	$wp_customize->add_setting('sparkconstructionlite_video_calltoaction_height', array(
		'sanitize_callback' => 'absint',
		'default' => 450,
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_video_calltoaction_height', array(
		'section' => 'sparkconstructionlite_video_calltoaction_section',
		'label' => esc_html__('Video Call To Action Height (px)', 'spark-construction-lite'),
		'input_attrs' => array(
			'min' => 300,
			'max' => 900,
			'step' => 1
		)
	)));

	$wp_customize->add_setting("sparkconstructionlite_video_calltoaction_box_bg_color", array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_video_calltoaction_box_bg_color", array(
        'section' => "sparkconstructionlite_video_calltoaction_section",
        'label' => esc_html__('Background Color', 'spark-construction-lite'),
        'priority' => 54
    )));

	$wp_customize->add_setting('sparkconstructionlite_pro_video_calltoaction', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_video_calltoaction', array(
        'section' => 'sparkconstructionlite_video_calltoaction_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Services Items Settings', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_video_cta_refresh", array (
	'settings' => array(
		'sparkconstructionlite_videcta_disable',
		'sparkconstructionlite_video_cta_layout',
		'sparkconstructionlite_video_button_url',
		'sparkconstructionlite_video_calltoaction_video_bg',
		'sparkconstructionlite_appointment_contact_title',
		'sparkconstructionlite_appointment_shortcode',
	),
	'selector' => "#video_calltoaction-section",
	'fallback_refresh' => true,
	'container_inclusive' => true,
	'render_callback' => function () {
		return get_template_part( 'section/section-video_calltoaction' );
	}
));