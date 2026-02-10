<?php

$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_team_section', array(
    'title'		=> 	esc_html__('Team Section','spark-construction-lite'),
    'panel'		=> 'sparkconstructionlite_frontpage_settings',
    'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_team_section'),
    'hiding_control' => 'sparkconstructionlite_team_disable'
)));

//ENABLE/DISABLE TEAM MEMBER SECTION
$wp_customize->add_setting('sparkconstructionlite_team_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_team_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_team_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_team_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_team_section_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_team_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_team_section',
                    'sparkconstructionlite_team_super_title',
                    'sparkconstructionlite_team_title',
                    'sparkconstructionlite_team_title_style_heading',
                    'sparkconstructionlite_team_title_style',
                    'sparkconstructionlite_team_title_align',
                    'sparkconstructionlite_team_type_heading',
                    'sparkconstructionlite_team_type',
                    'sparkconstructionlite_team',
                    'sparkconstructionlite_team_advance',
                    'sparkconstructionlite_team_style',
                    'sparkconstructionlite_team_block_height',
                    'sparkconstructionlite_team_display_style',
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
                    'sparkconstructionlite_team_bg_type',
                    'sparkconstructionlite_team_bg_color',
                    'sparkconstructionlite_team_bg_image',
                    'sparkconstructionlite_team_overlay_color',
                    'sparkconstructionlite_team_padding',
                    'sparkconstructionlite_team_cs_seperator',
                ),
            ),
        ),
    )));

    $wp_customize->add_setting( 'sparkconstructionlite_team_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			
    ) );
    $wp_customize->add_control( 'sparkconstructionlite_team_super_title', array(
        'label'    => esc_html__( 'Super Title', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_team_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting( 'sparkconstructionlite_team_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			
    ) );
    $wp_customize->add_control( 'sparkconstructionlite_team_title', array(
        'label'    => esc_html__( 'Title', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_team_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_team_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_team_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-construction-lite'),
                    'text-center' => esc_html__('Center', 'spark-construction-lite'),
                    'text-right' => esc_html__('Right', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_team_section',
            )
        )
    );
  
    $wp_customize->add_setting('sparkconstructionlite_team_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_team_title_style_heading', array(
        'section' => 'sparkconstructionlite_team_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_team_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_team_title_style', array(
        'section' => 'sparkconstructionlite_team_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),			
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_team_type_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_team_type_heading', array(
        'section' => 'sparkconstructionlite_team_section',
        'label' => esc_html__('Select Type', 'spark-construction-lite')
    )));
    
    $wp_customize->add_setting('sparkconstructionlite_team_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'
    ));
    $wp_customize->add_control('sparkconstructionlite_team_type', array(
        'section' => 'sparkconstructionlite_team_section',
        'type' => 'radio',
        'choices' => array(
            'default' => esc_html__('Default', 'spark-construction-lite'),
            'advance' => esc_html__('Advanced', 'spark-construction-lite')
        )
    ));
  
    $wp_customize->add_setting('sparkconstructionlite_team', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',	
        'default' => json_encode(array(
            array(
                'team_page'   => '',
                'teamimage'   => '',
                'designation' =>'',
                'facebook'    =>'',
                'twitter'     =>'',
                'linkedin'    =>'',
                'instagram'   => '',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 'sparkconstructionlite_team', array(
            'label' 	   => esc_html__('Default Team Settings', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_team_section',
            'settings' 	   => 'sparkconstructionlite_team',
            'box_label' => esc_html__('Team Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 6,
        ),
        array(
            'team_page' => array(
                'type'    => 'select',
                'label'   => esc_html__('Select Page', 'spark-construction-lite'),
                'options' => $pages
            ),
            'teamimage' => array(
                'type' => 'upload',
                'label' => esc_html__("Upload Image (Only Work Style 2)", 'spark-construction-lite'),
            ),
            'designation' => array(
                'type'    => 'text',
                'label'   => esc_html__('Designation', 'spark-construction-lite'),
                'default' => ''
            ),
            'facebook'  => array(
                'type'   => 'url',
                'label'  => esc_html__('Facebook Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'twitter' 	=> array(
                'type'    => 'url',
                'label'   => esc_html__('Twitter Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'linkedin'   => array(
                'type'    => 'url',
                'label'   => esc_html__('Linkedin Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'instagram' => array(
                'type'    => 'url',
                'label'   => esc_html__('Instagram Link', 'spark-construction-lite'),
                'default' => ''
            )
        )
    ));
   
    $wp_customize->add_setting('sparkconstructionlite_team_advance', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',	
        'default' => json_encode(array(
            array(
                'team_image'     => '',
                'teamimage'   => '',
                'team_title'     => '',
                'team_designation' =>'',
                'team_desc'      => '',
                'team_url'       => '',
                'facebook'       =>'',
                'twitter'        =>'',
                'linkedin'       =>'',
                'instagram'      => '',
                'alignment'      => 'center',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 'sparkconstructionlite_team_advance', array(
            'label' 	   => esc_html__('Advance Team Settings', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_team_section',
            'settings' 	   => 'sparkconstructionlite_team_advance',
            'box_label' => esc_html__('Team Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 6,
        ),
        array(
            'team_image' => array(
                'type' => 'upload',
                'label' => esc_html__("Upload Image", 'spark-construction-lite'),
            ),
            'teamimage' => array(
                'type' => 'upload',
                'label' => esc_html__("Upload Image (Only Work Style 2)", 'spark-construction-lite'),
            ),
            'team_title' => array(
                'type' => 'text',
                'label' => esc_html__("Title", 'spark-construction-lite'),
            ),
            'team_designation' => array(
                'type'    => 'text',
                'label'   => esc_html__('Designation', 'spark-construction-lite'),
                'default' => ''
            ),
            'team_desc' => array(
                'type' => 'textarea',
                'label' => esc_html__("Short Description", 'spark-construction-lite'),
            ),
            'team_url' => array(
                'type' => 'url',
                'label' => esc_html__('Details Url', 'spark-construction-lite'),
                'default' => ''
            ),
            'facebook'  => array(
                'type'   => 'url',
                'label'  => esc_html__('Facebook Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'twitter' 	=> array(
                'type'    => 'url',
                'label'   => esc_html__('Twitter Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'linkedin'   => array(
                'type'    => 'url',
                'label'   => esc_html__('Linkedin Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'instagram' => array(
                'type'    => 'url',
                'label'   => esc_html__('Instagram Link', 'spark-construction-lite'),
                'default' => ''
            ),
            'alignment' => array(
                'type' => 'select',
                'default' => 'center',
                'label' => esc_html__('Alignment', 'spark-construction-lite'),
                'options' => array(
                    'start' => esc_html__('Left', 'spark-construction-lite'),
                    'center' => esc_html__('Center', 'spark-construction-lite'),
                    'end' => esc_html__('Right', 'spark-construction-lite')
                )
            ),
        )
    ));
   
    $wp_customize->add_setting('sparkconstructionlite_team_style', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options',
        'default' => 'style2',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_team_style', array(
        'section' => 'sparkconstructionlite_team_section',
        'label' => esc_html__('Choose Style', 'spark-construction-lite'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/team-style1.webp',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/team-style3.webp',
            'style3' => get_template_directory_uri() . '/inc/customizer/images/team-style5.webp',
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_team_block_height', array(
        'sanitize_callback' => 'absint',
        'default' => 470,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_team_block_height', array(
        'section' => 'sparkconstructionlite_team_section',
        'label' => esc_html__('Team Block Height (PX)', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 300,
            'max' => 900,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_team_display_style', array(
        'default' => 'grid',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_team_display_style', array(
        'section' => 'sparkconstructionlite_team_section',
        'type'    => 'select',
        'label' => esc_html__('Display Style', 'spark-construction-lite'),
        'choices' => array(
            'grid' => esc_html__('Grid','spark-construction-lite'),
            'slide' => esc_html__('Slide','spark-construction-lite'),			
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_pro_team', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_team', array(
        'section' => 'sparkconstructionlite_team_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(6+) Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Add Unlimited Team Items', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Team Items Settings', 'spark-construction-lite'),
            esc_html__('More Icon Settings ( Background Color/Color/Border Color/Border Width & Padding )', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_team_options_refresh", array (
    'settings' => array(
        'sparkconstructionlite_team_disable',
        'sparkconstructionlite_team_type',
        'sparkconstructionlite_team',
        'sparkconstructionlite_team_advance',
        'sparkconstructionlite_team_style',
        'sparkconstructionlite_team_display_style',
    ),
    'selector' => "#team-section",
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-team' );
    }
));