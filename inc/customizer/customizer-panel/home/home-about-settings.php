<?php
/**
 * About Us Section 
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_aboutus_section', array(
	'title'		=>	esc_html__('About Us Section','spark-construction-lite'),
	'panel'		=> 'sparkconstructionlite_frontpage_settings',
	'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_aboutus_section'),
	'hiding_control' => 'sparkconstructionlite_aboutus_disable'
)));

//ENABLE/DISABLE ABOUT US SECTION
$wp_customize->add_setting('sparkconstructionlite_aboutus_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_aboutus_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_aboutus_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('sparkconstructionlite_about_nav', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_about_nav', array(
	'type' => 'tab',
	'section' => 'sparkconstructionlite_aboutus_section',
	'priority' => 1,
	'buttons' => array(
		array(
			'name' => esc_html__('Content', 'spark-construction-lite'),
			'fields' => array(
				'sparkconstructionlite_aboutus_layout_design',
				'sparkconstructionlite_aboutus_super_title',
				'sparkconstructionlite_about',
				'sparkconstructionlite_about_image',
				'sparkconstructionlite_about_video_link',
				'sparkconstructionlite_progressbar_heading',
				'sparkconstructionlite_progress',
				'sparkconstructionlite_progressbar_item',
				'sparkconstructionlite_aboutus_button_text',
				'sparkconstructionlite_about_readmore_link',
				'sparkconstructionlite_more_about_us',
				'sparkconstructionlite_aboutus_content_length',
				'sparkconstructionlite_aboutus_profile_name',
				'sparkconstructionlite_aboutus_profile_role',
				'sparkconstructionlite_aboutus_profile_image',
				'sparkconstructionlite_aboutus_signature',
			),
			'active' => true,
		),
		array(
			'name' => esc_html__('Style', 'spark-construction-lite'),
			'fields' => array(
				
			),
		),
		array(
			'name' => esc_html__('Advanced', 'spark-construction-lite'),
			'fields' => array(
				'sparkconstructionlite_aboutus_bg_type',
				'sparkconstructionlite_aboutus_bg_color',
				'sparkconstructionlite_aboutus_bg_image',
				'sparkconstructionlite_aboutus_overlay_color',
				'sparkconstructionlite_aboutus_padding',
				'sparkconstructionlite_aboutus_cs_seperator',
			),
		),
	),
)));

	$wp_customize->add_setting( 'sparkconstructionlite_aboutus_super_title', array(
		'sanitize_callback' => 'sanitize_text_field', 	 
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('sparkconstructionlite_aboutus_super_title', array(
		'label'		=> esc_html__( 'Super Title', 'spark-construction-lite' ),
		'section'	=> 'sparkconstructionlite_aboutus_section',
		'type'      => 'text',
	));

	$wp_customize->add_setting( 'sparkconstructionlite_about', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'absint'			
	) );
	$wp_customize->add_control( 'sparkconstructionlite_about', array(
		'label'    => esc_html__( 'Select Page ', 'spark-construction-lite' ),
		'section'  => 'sparkconstructionlite_aboutus_section',
		'type'     => 'dropdown-pages'
	));
	
	$wp_customize->add_setting('sparkconstructionlite_about_image', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw'		
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sparkconstructionlite_about_image', array(
		'label'	   => esc_html__('Upload Feature Image','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_aboutus_section',
	)));

	$wp_customize->add_setting( 'sparkconstructionlite_aboutus_button_text', array(
		'default'           => esc_html__( 'More About Us','spark-construction-lite' ),
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'			
	) );
	$wp_customize->add_control( 'sparkconstructionlite_aboutus_button_text', array(
		'label'    => esc_html__( 'Button Text', 'spark-construction-lite' ),
		'section'  => 'sparkconstructionlite_aboutus_section',
		'type'     => 'text',
	));

	$wp_customize->add_setting('sparkconstructionlite_about_readmore_link', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw'		
	));
	$wp_customize->add_control('sparkconstructionlite_about_readmore_link', array(
		'label'	   => esc_html__('Read More Link','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_aboutus_section',
		'type'	   => 'url',
	));

	$wp_customize->add_setting('sparkconstructionlite_about_video_link', array(
		'transport' => 'postMessage',
		'sanitize_callback'	=> 'esc_url_raw'		
	));
	$wp_customize->add_control('sparkconstructionlite_about_video_link', array(
		'label'	   => esc_html__('Youtube Video Link','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_aboutus_section',
		'type'	   => 'url',
	));

	$wp_customize->add_setting('sparkconstructionlite_aboutus_layout_design', array(
		'default' => 'layouttwo',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options'
	));
	$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_aboutus_layout_design', array(
		'section' => 'sparkconstructionlite_aboutus_section',
		'label' => esc_html__('Select Layout', 'spark-construction-lite'),
		'options' => array(
			'layoutone' => get_template_directory_uri() . '/inc/customizer/images/cover-image-left.webp',
			'layouttwo' => get_template_directory_uri() . '/inc/customizer/images/cover-image-right.webp',
			'layoutthree' => get_template_directory_uri() . '/inc/customizer/images/cover-image-center.webp',
		)
	)));

	/** Progress Bar */
	$wp_customize->add_setting('sparkconstructionlite_progressbar_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_progressbar_heading', array(
        'section' => 'sparkconstructionlite_aboutus_section',
        'label' => esc_html__('Progress Bar Settings', 'spark-construction-lite')
    )));

	$wp_customize->add_setting('sparkconstructionlite_progress', array(
		'default' => 'disable',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',     
	));
	$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_progress', array(
		'label' => esc_html__('Progress Bar', 'spark-construction-lite'),
		'section' => 'sparkconstructionlite_aboutus_section',
		'switch_label' => array(
			'enable' => esc_html__('Show', 'spark-construction-lite'),
			'disable' => esc_html__('Hide', 'spark-construction-lite'),
		),
	)));

	$wp_customize->add_setting('sparkconstructionlite_progressbar_item', array(
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
		'transport' => 'postMessage',
		'default' => json_encode(array(
			array(
				'progressbar_title'  =>'',
				'progressbar_number'  =>'',
				'progressbar_color'  =>'',       
			)
		))
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control($wp_customize, 'sparkconstructionlite_progressbar_item', 
		array(
			'label' 	   => esc_html__('Progress Bar Item', 'spark-construction-lite'),
			'section' 	   => 'sparkconstructionlite_aboutus_section',
			'box_label' => esc_html__('Progress Item', 'spark-construction-lite'),
			'add_label' => esc_html__('Add New', 'spark-construction-lite'),
			'limit' => 3,
		),
		array(
			'progressbar_title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'spark-construction-lite'),
				'default' => ''
			),
			'progressbar_number' => array(
				'type' => 'number',
				'label' => esc_html__('Number(%)', 'spark-construction-lite'),
				'default' => ''
			),
			'progressbar_color' => array(
				'type' => 'colorpicker',
				'label' => esc_html__('Background Color', 'spark-construction-lite'),
				'default' => ''
			),
		)
	));

	$wp_customize->add_setting('sparkconstructionlite_more_about_us', array(
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
		'transport' => 'postMessage',
		'default' => json_encode(array(
			array(
				'aboutus_icon' => '',
				'aboutus_title'  =>'',
				'aboutus_desc'  =>''          
			)
		))
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control($wp_customize, 'sparkconstructionlite_more_about_us', 
		array(
			'label' 	   => esc_html__('More About Us Item', 'spark-construction-lite'),
			'section' 	   => 'sparkconstructionlite_aboutus_section',
			'box_label' => esc_html__('About Item', 'spark-construction-lite'),
			'add_label' => esc_html__('Add New', 'spark-construction-lite'),
			'limit' => 4,
		),
		array(
			'aboutus_icon' => array(
				'type' => 'icon',
				'label' => esc_html__('Icon', 'spark-construction-lite'),
				'default' => ''
			),
			'aboutus_title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'spark-construction-lite'),
				'default' => ''
			),
			'aboutus_desc' => array(
				'type' => 'text',
				'label' => esc_html__('Description', 'spark-construction-lite'),
				'default' => ''
			)
		)
	));





	$wp_customize->add_setting( 'sparkconstructionlite_aboutus_profile_image', array(
		'sanitize_callback' => 'sanitize_text_field', 	 
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sparkconstructionlite_aboutus_profile_image', array(
		'label'	   => esc_html__('Upload Profile Image','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_aboutus_section',
	)));

	$wp_customize->add_setting( 'sparkconstructionlite_aboutus_profile_name', array(
		'sanitize_callback' => 'sanitize_text_field', 	 
		'transport' => 'postMessage'
	));
	$wp_customize->add_control('sparkconstructionlite_aboutus_profile_name', array(
		'label'		=> esc_html__( 'Profile Name', 'spark-construction-lite' ),
		'section'	=> 'sparkconstructionlite_aboutus_section',
		'type'      => 'text',
		'priority' => 10
	));
	
	$wp_customize->add_setting( 'sparkconstructionlite_aboutus_profile_role', array(
		'sanitize_callback' => 'sanitize_text_field', 	
		'transport' => 'postMessage'
	));
	$wp_customize->add_control('sparkconstructionlite_aboutus_profile_role', array(
		'label'		=> esc_html__( 'Designation', 'spark-construction-lite' ),
		'section'	=> 'sparkconstructionlite_aboutus_section',
		'type'      => 'text',
		'priority' => 10
	));

	$wp_customize->add_setting('sparkconstructionlite_aboutus_signature', array(
		'transport' => 'postMessage',
		'priority' => 10,
		'sanitize_callback'	=> 'esc_url_raw'		
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sparkconstructionlite_aboutus_signature', array(
		'label'	   => esc_html__('Signature Image','spark-construction-lite'),
		'section'  => 'sparkconstructionlite_aboutus_section',
	)));

	$wp_customize->add_setting('sparkconstructionlite_pro_aboutus', array(
		'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_aboutus', array(
		'section' => 'sparkconstructionlite_aboutus_section',
		'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
		'choices' => array(
			esc_html__('More Settings and Layouts', 'spark-construction-lite'),
			esc_html__('Text Alignment Options', 'spark-construction-lite'),
			esc_html__('Progress Bar Layout & Settings', 'spark-construction-lite'),
			esc_html__('Achievement Layout & Settings', 'spark-construction-lite'),
			esc_html__('Video Link & button settings', 'spark-construction-lite'),
			esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
		),
		'priority' => 250,
	)));

	$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_aboutus_settings", array (
		'settings' => array( 
			'sparkconstructionlite_aboutus_disable',
			'sparkconstructionlite_about',
			'sparkconstructionlite_about_image',
			'sparkconstructionlite_about_readmore_link',
			'sparkconstructionlite_about_video_link',
			'sparkconstructionlite_progress',
			'sparkconstructionlite_progressbar_item',
			'sparkconstructionlite_aboutus_super_title',
			'sparkconstructionlite_more_about_us',
			'sparkconstructionlite_aboutus_profile_image',
			'sparkconstructionlite_aboutus_profile_name',
			'sparkconstructionlite_aboutus_profile_role',
			'sparkconstructionlite_aboutus_signature',
		),
		'selector' => "#aboutus-section",
		'fallback_refresh' => true,
		'container_inclusive' => true,
		'render_callback' => function () {
			return get_template_part( 'section/section-aboutus' );
		}
	));