<?php
/**
 * Gallery Section
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_recentwork_section', array(
	'title'		=> 	esc_html__('Gallery Section','spark-construction-lite'),
	'panel'		=> 'sparkconstructionlite_frontpage_settings',
	'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_recentwork_section'),
	'hiding_control' => 'sparkconstructionlite_portfolio_disable'
)));

//ENABLE/DISABLE GALLERY SECTION
$wp_customize->add_setting('sparkconstructionlite_portfolio_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_portfolio_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_recentwork_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

	$wp_customize->add_setting('sparkconstructionlite_recentwork_nav', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_recentwork_nav', array(
		'type' => 'tab',
		'section' => 'sparkconstructionlite_recentwork_section',
		'priority' => 1,
		'buttons' => array(
			array(
				'name' => esc_html__('Content', 'spark-construction-lite'),
				'fields' => array(
					'sparkconstructionlite_recentwork_title_align',
					'sparkconstructionlite_recentwork_super_title',
					'sparkconstructionlite_recentwork_title',
					'sparkconstructionlite_recentwork_title_style_heading',
					'sparkconstructionlite_recentwork_title_style',
					'sparkconstructionlite_recentwork_gallery',
					'sparkconstructionlite_gallery_default_text',
					'sparkconstructionlite_gallery_tab_align',
					'sparkconstructionlite_gallery_display_layout',
					'sparkconstructionlite_gallery_caption_disable',
					'sparkconstructionlite_gallery_zoom_icon_disable',
					'sparkconstructionlite_recentwork_block_space',
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
					'sparkconstructionlite_recentwork_bg_type',
					'sparkconstructionlite_recentwork_bg_color',
					'sparkconstructionlite_recentwork_bg_image',
					'sparkconstructionlite_recentwork_overlay_color',
					'sparkconstructionlite_recentwork_padding',
					'sparkconstructionlite_recentwork_cs_seperator',
				),
			),
		),
	)));

		
	$wp_customize->add_setting( 'sparkconstructionlite_recentwork_super_title', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field', 	 
	));
	$wp_customize->add_control('sparkconstructionlite_recentwork_super_title', array(
		'label'		=> esc_html__( 'Super Title', 'spark-construction-lite' ),
		'section'	=> 'sparkconstructionlite_recentwork_section',
		'type'      => 'text'
	));
	
	$wp_customize->add_setting( 'sparkconstructionlite_recentwork_title', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field', 	 
	));
	$wp_customize->add_control('sparkconstructionlite_recentwork_title', array(
		'label'		=> esc_html__( 'Title', 'spark-construction-lite' ),
		'section'	=> 'sparkconstructionlite_recentwork_section',
		'type'      => 'text'
	));
	
	$wp_customize->add_setting('sparkconstructionlite_recentwork_title_align', array(
		'default' => 'text-center',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_recentwork_title_align',
		array(
			'choices'  => array(
				'text-left' => esc_html__('Left', 'spark-construction-lite'),
				'text-right' => esc_html__('Right', 'spark-construction-lite'),
				'text-center' => esc_html__('Center', 'spark-construction-lite'),
			),
			'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
			'section'  => 'sparkconstructionlite_recentwork_section',
			'settings' => 'sparkconstructionlite_recentwork_title_align',
		)
	));

	$wp_customize->add_setting('sparkconstructionlite_recentwork_title_style_heading', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_recentwork_title_style_heading', array(
		'section' => 'sparkconstructionlite_recentwork_section',
		'label' => esc_html__('Section Title Style', 'spark-construction-lite')
	)));


	$wp_customize->add_setting('sparkconstructionlite_recentwork_title_style', array(
		'default' => 'style1',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
	));
	$wp_customize->add_control('sparkconstructionlite_recentwork_title_style', array(
		'section' => 'sparkconstructionlite_recentwork_section',
		'type'    => 'select',
		'choices' => array(
			'style1' => esc_html__('Style 1','spark-construction-lite'),
			'style2' => esc_html__('Style 2','spark-construction-lite'),			
			'style3' => esc_html__('Style 3','spark-construction-lite'),			
		)
	));

	/** Advance */
	$wp_customize->add_setting('sparkconstructionlite_recentwork_gallery', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		//done
		'default' => json_encode(array(
			array(
				'title'      => '',
				'gallery'    => '',
			)
		))
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize,'sparkconstructionlite_recentwork_gallery', 
		array(
			'label' 	   => esc_html__('Advance Gallery Image', 'spark-construction-lite'),
			'section' 	   => 'sparkconstructionlite_recentwork_section',
			'settings' 	   => 'sparkconstructionlite_recentwork_gallery',
			'box_label' => esc_html__('Gallery Item', 'spark-construction-lite'),
			'add_label' => esc_html__('Add New', 'spark-construction-lite'),
			'limit' => 5,
		),
		array(
			'title' => array(
				'type' => 'text',
				'label' => __("Title", 'spark-construction-lite'),
			),
			'gallery' => array(
				'type' => 'gallery',
				'label' => __("Upload Image", 'spark-construction-lite'),
			),
		)
	));

	$wp_customize->add_setting( 'sparkconstructionlite_gallery_default_text', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field', 
		'default' => '',	 
	));
	$wp_customize->add_control('sparkconstructionlite_gallery_default_text', array(
		'label'		=> esc_html__( 'Default Text', 'spark-construction-lite' ),
		'section'	=> 'sparkconstructionlite_recentwork_section',
		'type'      => 'text'
	));

	$wp_customize->add_setting('sparkconstructionlite_gallery_tab_align', array(
		'default' => 'center',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control( new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_gallery_tab_align',
		array(
			'choices'  => array(
				'start' => esc_html__('Left', 'spark-construction-lite'),
				'center' => esc_html__('Center', 'spark-construction-lite'),
				'end' => esc_html__('Right', 'spark-construction-lite'),
			),
			'label'    => esc_html__( 'Tab Alignment', 'spark-construction-lite' ),
			'section'  => 'sparkconstructionlite_recentwork_section',
		)
	));

	$wp_customize->add_setting('sparkconstructionlite_gallery_display_layout', 
		array( 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'style6',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_gallery_display_layout', array(
		'section' => 'sparkconstructionlite_recentwork_section',
		'label' => esc_html__('Gallery Display Layout', 'spark-construction-lite'),
		'options' => array(
			'style1' => get_template_directory_uri() . '/inc/customizer/images/gallery-style1.webp',
			'style2' => get_template_directory_uri() . '/inc/customizer/images/gallery-style2.webp',
			'style3' => get_template_directory_uri() . '/inc/customizer/images/gallery-style3.webp',
			'style6' => get_template_directory_uri() . '/inc/customizer/images/gallery-style6.webp',
		)
	)));

	$wp_customize->add_setting('sparkconstructionlite_gallery_caption_disable', array(
		'default' => 'enable',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
	));
	$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_gallery_caption_disable', array(
		'label' => esc_html__('Gallery Caption', 'spark-construction-lite'),
		'section' => 'sparkconstructionlite_recentwork_section',
		'switch_label' => array(
			'enable' => esc_html__('Enable', 'spark-construction-lite'),
			'disable' => esc_html__('Disable', 'spark-construction-lite'),
		)
	)));

	$wp_customize->add_setting('sparkconstructionlite_gallery_zoom_icon_disable', array(
		'default' => 'enable',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
	));
	$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_gallery_zoom_icon_disable', array(
		'label' => esc_html__('Zoom Button', 'spark-construction-lite'),
		'section' => 'sparkconstructionlite_recentwork_section',
		'switch_label' => array(
			'enable' => esc_html__('Enable', 'spark-construction-lite'),
			'disable' => esc_html__('Disable', 'spark-construction-lite'),
		)
	)));

	$wp_customize->add_setting('sparkconstructionlite_recentwork_block_space', array(
		'sanitize_callback' => 'absint',
		'default' => 1,
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_recentwork_block_space', array(
		'section' => 'sparkconstructionlite_recentwork_section',
		'label' => esc_html__('Block Space', 'spark-construction-lite'),
		'input_attrs' => array(
			'min' => 0,
			'max' => 3,
			'step' => 1,
		)
	)));

	$wp_customize->add_setting('sparkconstructionlite_pro_recentwork', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_recentwork', array(
        'section' => 'sparkconstructionlite_recentwork_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(4+) Different Layout ( Tabs Included )', 'spark-construction-lite'),
            esc_html__('Add Unlimited Gallery Items', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Gallery Layout & Settings', 'spark-construction-lite'),
            esc_html__('Able to specify Gallery Description', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('(4+) Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));
	
$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_portfolio_section_refresh", array (
	'settings' => array( 
		'sparkconstructionlite_portfolio_disable',
		'sparkconstructionlite_gallery_default_text',
		'sparkconstructionlite_recentwork_gallery',
		'sparkconstructionlite_gallery_display_layout',
		'sparkconstructionlite_recentwork_block_space',
	),
	'selector' => "#recentwork-section",
	'fallback_refresh' => true,
	'container_inclusive' => true,
	'render_callback' => function () {
		return get_template_part( 'section/section-recentwork' );
	}
));