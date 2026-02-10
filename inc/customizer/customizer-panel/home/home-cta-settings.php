<?php
/**
 * Call To Action Section
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_calltoaction_section', array(
	'title'		=> 	esc_html__('Call To Action Section','spark-construction-lite'),
	'panel'		=> 'sparkconstructionlite_frontpage_settings',
	'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_calltoaction_section'),
	'hiding_control' => 'sparkconstructionlite_cta_disable'
)));

//ENABLE/DISABLE CALL TO ACTION SECTION
$wp_customize->add_setting('sparkconstructionlite_cta_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_cta_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_calltoaction_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

	$wp_customize->add_setting('sparkconstructionlite_calltoaction_section_nav', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_calltoaction_section_nav', array(
		'type' => 'tab',
		'section' => 'sparkconstructionlite_calltoaction_section',
		'priority' => 1,
		'buttons' => array(
			array(
				'name' => esc_html__('Content', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_cta_style',
					'sparkconstructionlite_cta_width',
					'sparkconstructionlite_cta_layout',
					'sparkconstructionlite_cta_alignment',
					'sparkconstructionlite_calltoaction_image',
					'sparkconstructionlite_calltoaction_icon',
					'sparkconstructionlite_call_to_action_title',
					'sparkconstructionlite_call_to_action_subtitle',
					'sparkconstructionlite_call_to_action_button',
					'sparkconstructionlite_call_to_action_link',
					'sparkconstructionlite_call_to_action_button_one',
					'sparkconstructionlite_call_to_action_link_one',
					'sparkconstructionlite_calltoaction_height',
				),
				'active' => true,
			),
			array(
				'name' => esc_html__('Style', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_cta_title_font_size',
					'sparkconstructionlite_cta_desc_font_size',
					'sparkconstructionlite_calltoaction_cs_heading',
					'sparkconstructionlite_calltoaction_box_bg_color',
					'sparkconstructionlite_calltoaction_title_color',
					'sparkconstructionlite_calltoaction_text_color',
				)
			),
			array(
				'name' => esc_html__('Advanced', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_calltoaction_bg_type',
					'sparkconstructionlite_calltoaction_bg_color',
					'sparkconstructionlite_calltoaction_bg_image',
					'sparkconstructionlite_calltoaction_overlay_color',
					'sparkconstructionlite_calltoaction_padding',
					'sparkconstructionlite_calltoaction_margin',
					'sparkconstructionlite_calltoaction_radius',
					'sparkconstructionlite_calltoaction_cs_seperator',
				),
			),
		),
	)));

	$wp_customize->add_setting('sparkconstructionlite_cta_style', array(
		'default' => 'cover',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'       
	));
	$wp_customize->add_control('sparkconstructionlite_cta_style', array(
		'label' => esc_html__('Layout', 'spark-construction-lite'),
		'section' => 'sparkconstructionlite_calltoaction_section',
		'type' => 'select',
		'choices' => array(
			'classic' => esc_html__('Classic' , 'spark-construction-lite'),
			'cover' => esc_html__('Cover' ,'spark-construction-lite'),
		)
	));

	$wp_customize->add_setting('sparkconstructionlite_cta_width', array(
		'default' => 'container',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'       
	));
	$wp_customize->add_control('sparkconstructionlite_cta_width', array(
		'label' => esc_html__('Width', 'spark-construction-lite'),
		'section' => 'sparkconstructionlite_calltoaction_section',
		'type' => 'select',
		'choices' => array(
			'container' => esc_html__('Container' ,'spark-construction-lite'),
			'full' => esc_html__('Full' , 'spark-construction-lite'),
		)
	));

	$wp_customize->add_setting('sparkconstructionlite_calltoaction_image', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw',
		'default' => get_template_directory_uri() . '/assets/images/bg.jpg',	
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sparkconstructionlite_calltoaction_image', array(
		'label'	   => esc_html__('Background Image','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section'
	)));

	$wp_customize->add_setting('sparkconstructionlite_cta_layout', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
		'default' => 'cta-above'
	));
	$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_cta_layout', array(
		'section' => 'sparkconstructionlite_calltoaction_section',
		'label' => esc_html__('Select Layout', 'spark-construction-lite'),
		'options' => array(
			'cta-above' => get_template_directory_uri() . '/inc/customizer/images/cta-image-top.webp',
			'cta-left' => get_template_directory_uri() . '/inc/customizer/images/cta-image-left.webp',
			'cta-right' => get_template_directory_uri() . '/inc/customizer/images/cta-image-right.webp',
			'cta-below' => get_template_directory_uri() . '/inc/customizer/images/cta-image-bottom.webp',
		)
	)));

	$wp_customize->add_setting('sparkconstructionlite_calltoaction_height', array(
		'sanitize_callback' => 'absint',
		'default' => 450,
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_calltoaction_height', array(
		'section' => 'sparkconstructionlite_calltoaction_section',
		'label' => esc_html__('Call To Action Height (px)', 'spark-construction-lite'),
		'input_attrs' => array(
			'min' => 300,
			'max' => 900,
			'step' => 1
		)
	)));

	$wp_customize->add_setting( 'sparkconstructionlite_cta_alignment', array(
		'default'           => 'center',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_cta_alignment', array(
		'choices'  => array(
			'start' => esc_html__('Left', 'spark-construction-lite'),
			'center' => esc_html__('Center', 'spark-construction-lite'),
			'end' => esc_html__('Right', 'spark-construction-lite'),
		),
		'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
		'section'  => 'sparkconstructionlite_calltoaction_section',
	)));

	$wp_customize->add_setting('sparkconstructionlite_calltoaction_icon', array(
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
		'default' => 'fa-solid fa-headset',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new SparkConstructionLite_Fontawesome_Icon_Chooser($wp_customize, 'sparkconstructionlite_calltoaction_icon', array(
		'section' => 'sparkconstructionlite_calltoaction_section',
		'label' => esc_html__('Icon', 'spark-construction-lite')
	)));

	$wp_customize->add_setting('sparkconstructionlite_call_to_action_title', array(
		'transport' => 'postMessage',
		'default' => esc_html__('Welcome to our Construction WordPress Themes!', 'spark-construction-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'		
	));
	$wp_customize->add_control('sparkconstructionlite_call_to_action_title', array(
		'label'	   => esc_html__('Title','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section',
		'type'	   => 'text',
	));

	$wp_customize->add_setting('sparkconstructionlite_call_to_action_subtitle', array(
		'transport' => 'postMessage',
		'default' => esc_html__('Try our premium themes risk-free. If you are not 100% satisfied with the features and performance of our premium themes, we will credit your original payment method without any question.', 'spark-construction-lite'),
		'sanitize_callback'	=> 'sparkconstructionlite_themes_sanitize_text'		
	));
	$wp_customize->add_control('sparkconstructionlite_call_to_action_subtitle', array(
		'label'	   => esc_html__('Description','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section',
		'type'	   => 'textarea',
	));
	
	$wp_customize->add_setting('sparkconstructionlite_call_to_action_button', array(
		'transport' => 'postMessage',
		'default' => esc_html__('WordPress Themes', 'spark-construction-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'		
	));
	$wp_customize->add_control('sparkconstructionlite_call_to_action_button', array(
		'label'	   => esc_html__('Button One Text','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section',
		'type'	   => 'text',
	));
	$wp_customize->add_setting('sparkconstructionlite_call_to_action_link', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw'		
	));
	$wp_customize->add_control('sparkconstructionlite_call_to_action_link', array(
		'label'	   => esc_html__('Button One Link','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section',
		'type'	   => 'url',
	));

	$wp_customize->add_setting('sparkconstructionlite_call_to_action_button_one', array(
		'transport' => 'postMessage',
		'default' => esc_html__('Buy Now', 'spark-construction-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'		
	));
	$wp_customize->add_control('sparkconstructionlite_call_to_action_button_one', array(
		'label'	   => esc_html__('Button Two Text','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section',
		'type'	   => 'text',
	));
	$wp_customize->add_setting('sparkconstructionlite_call_to_action_link_one', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw'		
	));
	$wp_customize->add_control('sparkconstructionlite_call_to_action_link_one', array(
		'label'	   => esc_html__('Button Two Link','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_calltoaction_section',
		'type'	   => 'url',
	));


	$wp_customize->add_setting("sparkconstructionlite_cta_title_font_size", array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
		'default' => 28
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, "sparkconstructionlite_cta_title_font_size", array(
		'section' => "sparkconstructionlite_calltoaction_section",
		'label' => esc_html__('Title Font Size', 'spark-construction-lite'),
		'input_attrs' => array(
			'min' => 10,
			'max' => 200,
			'step' => 1,
		)
	)));
	$wp_customize->add_setting("sparkconstructionlite_cta_desc_font_size", array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
		'default' => 18,
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, "sparkconstructionlite_cta_desc_font_size", array(
		'section' => "sparkconstructionlite_calltoaction_section",
		'label' => esc_html__('Description Font Size', 'spark-construction-lite'),
		'input_attrs' => array(
			'min' => 10,
			'max' => 200,
			'step' => 1,
		)
	)));

	$wp_customize->add_setting("sparkconstructionlite_calltoaction_box_bg_color", array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_calltoaction_box_bg_color", array(
        'section' => "sparkconstructionlite_calltoaction_section",
        'label' => esc_html__('Background Color', 'spark-construction-lite'),
        'priority' => 54
    )));

	$wp_customize->add_setting('sparkconstructionlite_pro_calltoaction', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_calltoaction', array(
        'section' => 'sparkconstructionlite_calltoaction_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(5+) Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_calltoaction_refresh", array (
	'settings' => array(
		'sparkconstructionlite_cta_disable',
		'sparkconstructionlite_cta_width',
		'sparkconstructionlite_calltoaction_image',
		'sparkconstructionlite_calltoaction_icon',
	),
	'selector' => "#calltoaction-section",
	'fallback_refresh' => true,
	'container_inclusive' => true,
	'render_callback' => function () {
		return get_template_part( 'section/section-calltoaction' );
	}
));