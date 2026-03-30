<?php

$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_blog_section', array(
    'title'		=> 	esc_html__('Blog Section','spark-construction-lite'),
    'panel'		=> 'sparkconstructionlite_frontpage_settings',
    'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_blog_section'),
    'hiding_control' => 'sparkconstructionlite_blog_disable'
)));

//ENABLE/DISABLE BLOG SECTION
$wp_customize->add_setting('sparkconstructionlite_blog_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_blog_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_blog_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_blog_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_blog_section_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_blog_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_blog_super_title',
                    'sparkconstructionlite_blog_title',
                    'sparkconstructionlite_blog_title_align',
                    'sparkconstructionlite_blog_title_style_heading',
                    'sparkconstructionlite_blog_title_style',
                    'sparkconstructionlite_home_blog_alignment',
                    'sparkconstructionlite_blog_display_style',
                    'sparkconstructionlite_posts_num',
                    'sparkconstructionlite_blog_categories',
                    'sparkconstructionlite_home_post_author_options',
                    'sparkconstructionlite_home_post_date_options',
                    'sparkconstructionlite_home_post_reading_time',
                    'sparkconstructionlite_blog_excerpt_length',
                    'sparkconstructionlite_blog_home_btn',
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
                    'sparkconstructionlite_blog_bg_type',
                    'sparkconstructionlite_blog_bg_color',
                    'sparkconstructionlite_blog_bg_image',
                    'sparkconstructionlite_blog_overlay_color',
                    'sparkconstructionlite_blog_padding',
                    'sparkconstructionlite_blog_cs_seperator',
                ),
            ),
        ),
    )));
    
    $wp_customize->add_setting('sparkconstructionlite_blog_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_blog_super_title', array(
        'label'	   => esc_html__('Super Title','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_blog_section',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_blog_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_blog_title', array(
        'label'	   => esc_html__('Title','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_blog_section',
        'type'	   => 'text',
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_blog_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_blog_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-construction-lite'),
                    'text-center' => esc_html__('Center', 'spark-construction-lite'),
                    'text-right' => esc_html__('Right', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_blog_section',
                'settings' => 'sparkconstructionlite_blog_title_align',
            )
        )
    );

    $wp_customize->add_setting('sparkconstructionlite_blog_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_blog_title_style_heading', array(
        'section' => 'sparkconstructionlite_blog_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_blog_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_blog_title_style', array(
        'section' => 'sparkconstructionlite_blog_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),		
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_blog_categories', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',    
    ));
    $wp_customize->add_control(new SparkConstructionLite_Multiple_Check_Control($wp_customize, 'sparkconstructionlite_blog_categories', array(
        'section'  => 'sparkconstructionlite_blog_section',
        'choices'  => $blog_cat,
        'label' => esc_html__('Select Categories', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_home_blog_alignment',array(
        'default' => 'text-center',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Buttonset($wp_customize,'sparkconstructionlite_home_blog_alignment', array(
        'choices'  => array(
            'text-left' => esc_html__('Left', 'spark-construction-lite'),
            'text-center' => esc_html__('Center', 'spark-construction-lite'),
            'text-right' => esc_html__('Right', 'spark-construction-lite'),
        ),
        'label'    => esc_html__( 'Content Alignment', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_blog_section',
    )));

    $wp_customize->add_setting('sparkconstructionlite_blog_display_style', array(
        'default' => 'grid',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_blog_display_style', array(
        'section' => 'sparkconstructionlite_blog_section',
        'type'    => 'select',
        'label' => esc_html__('Display Style', 'spark-construction-lite'),
        'choices' => array(
            'grid' => esc_html__('Grid','spark-construction-lite'),
            'slide' => esc_html__('Slide','spark-construction-lite'),			
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_posts_num', array(
        'sanitize_callback' => 'absint',
        'default' => 6,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_posts_num', array(
        'section' => 'sparkconstructionlite_blog_section',
        'label' => esc_html__('Display Number of Item', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 12,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_home_post_date_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',     
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_home_post_date_options', array(
        'label' => esc_html__('Post Date', 'spark-construction-lite'),
        'settings' => 'sparkconstructionlite_home_post_date_options',
        'section' => 'sparkconstructionlite_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_home_post_author_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_home_post_author_options', array(
        'label' => esc_html__('Author', 'spark-construction-lite'),
        'settings' => 'sparkconstructionlite_home_post_author_options',
        'section' => 'sparkconstructionlite_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_home_post_reading_time', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_home_post_reading_time', array(
        'label' => esc_html__('Reading Time', 'spark-construction-lite'),
        'settings' => 'sparkconstructionlite_home_post_reading_time',
        'section' => 'sparkconstructionlite_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting( 'sparkconstructionlite_blog_excerpt_length', array(
        'default'    => 20,
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_blog_excerpt_length', array(
        'section' => 'sparkconstructionlite_blog_section',
        'label' => esc_html__('Excerpt Length (words number)', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 5
        )
    )));

    $wp_customize->add_setting( 'sparkconstructionlite_blog_home_btn', array(
        'transport' => 'postMessage',
        'default'  => esc_html__( 'Read More','spark-construction-lite' ),
        'sanitize_callback' => 'sanitize_text_field',		
    ));
    $wp_customize->add_control('sparkconstructionlite_blog_home_btn', array(
        'label' => esc_html__( 'Button Text', 'spark-construction-lite' ),
        'section' => 'sparkconstructionlite_blog_section',
        'type'  => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_pro_blog', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_blog', array(
        'section' => 'sparkconstructionlite_blog_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(3+) Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Configure Column & Space(Gap)', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Control Excerpt Character', 'spark-construction-lite'),
            esc_html__('On/Off Date, Author & Comment', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_home_blog_section_refresh", array (
    'settings' => array( 
        'sparkconstructionlite_blog_disable',
        'sparkconstructionlite_blog_display_style',
        'sparkconstructionlite_blog_categories',
        'sparkconstructionlite_posts_num',	
        'sparkconstructionlite_blog_excerpt_length',
    ),
    'selector' => "#blog-section",
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-blog' );
    }
));