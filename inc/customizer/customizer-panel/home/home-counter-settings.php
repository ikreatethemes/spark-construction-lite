<?php

$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_counter_section', array(
    'title'		=> 	esc_html__('Counter Section','spark-construction-lite'),
    'panel'		=> 'sparkconstructionlite_frontpage_settings',
    'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_counter_section'),
    'hiding_control' => 'sparkconstructionlite_counter_disable'
)));

//ENABLE/DISABLE COUNTER SECTION
$wp_customize->add_setting('sparkconstructionlite_counter_disable', array(
	'default' => 'disable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_counter_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_counter_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_counter_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_counter_section_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_counter_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_counter_super_title',
                    'sparkconstructionlite_counter_title',
                    'sparkconstructionlite_counter_title_style_heading',
                    'sparkconstructionlite_counter_title_style',
                    'sparkconstructionlite_counter_title_align',
                    'sparkconstructionlite_counter',
                    'sparkconstructionlite_counter_style',
                    'sparkconstructionlite_counter_display_style',
                    'sparkconstructionlite_counter_icon_disable',
                    'sparkconstructionlite_counter_col',
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
                    'sparkconstructionlite_counter_bg_type',
                    'sparkconstructionlite_counter_bg_color',
                    'sparkconstructionlite_counter_bg_image',
                    'sparkconstructionlite_counter_overlay_color',
                    'sparkconstructionlite_counter_padding',
                	'sparkconstructionlite_counter_cs_seperator',
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_counter_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_counter_super_title', array(
        'label'	   => esc_html__('Super Title','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_counter_section',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_counter_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_counter_title', array(
        'label'	   => esc_html__('Title','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_counter_section',
        'type'	   => 'text',
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_counter_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_counter_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-construction-lite'),
                    'text-center' => esc_html__('Center', 'spark-construction-lite'),
                    'text-right' => esc_html__('Right', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_counter_section',
                'settings' => 'sparkconstructionlite_counter_title_align',
            )
        )
    );

    $wp_customize->add_setting('sparkconstructionlite_counter_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_counter_title_style_heading', array(
        'section' => 'sparkconstructionlite_counter_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_counter_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_counter_title_style', array(
        'section' => 'sparkconstructionlite_counter_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),			
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_counter', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',	
        'default' => json_encode(array(
            array(
                'counter_icon'  =>'',
                'counter_title'  =>'',
                'counter_number'  =>'',	          
                'counter_suffix' => ''
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 
        'sparkconstructionlite_counter', 
        array(
            'label' 	   => esc_html__('Counter Settings', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_counter_section',
            'settings' 	   => 'sparkconstructionlite_counter',
            'box_label' => esc_html__('Counter Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
             'limit' => 6,
        ),
        array(
            'counter_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'spark-construction-lite'),
                'default' => 'fa fa-cogs'
            ),
            'counter_title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'spark-construction-lite'),
                'default' => ''
            ),
            'counter_number' => array(
                'type' => 'number',
                'label' => esc_html__('Ending Number', 'spark-construction-lite'),
                'default' => ''
            ),
            'counter_suffix' => array(
                'type' => 'text',
                'label' => esc_html__('Suffix', 'spark-construction-lite'),
                'default' => ''
            ),
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_counter_style', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',     
        'default' => 'style2',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('sparkconstructionlite_counter_style', array(
        'label' => esc_html__('Select Layout', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_counter_section',
        'type' => 'select',
        'choices' => array(
            'style1' => esc_html__('Layout One' , 'spark-construction-lite'),
            'style2' => esc_html__('Layout Two' ,'spark-construction-lite'),
            'style3' => esc_html__('Layout Three' ,'spark-construction-lite'),
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_counter_display_style', array(
        'default' => 'above',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_counter_display_style',
            array(
                'choices'  => array(
                    'left' => esc_html__('Left', 'spark-construction-lite'),
                    'right' => esc_html__('Right', 'spark-construction-lite'),
                    'above' => esc_html__('Top', 'spark-construction-lite'),
                    'below' => esc_html__('Below', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Display Position', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_counter_section',
            )
        )
    );

    $wp_customize->add_setting('sparkconstructionlite_counter_icon_disable', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',     
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_counter_icon_disable', array(
        'label' => esc_html__('Counter Icon', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_counter_section',
        'switch_label' => array(
            'enable' => esc_html__('Enable', 'spark-construction-lite'),
            'disable' => esc_html__('Disable', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_counter_col', array(
        'sanitize_callback' => 'absint',
        'default' => 3,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_counter_col', array(
        'section' => 'sparkconstructionlite_counter_section',
        'label' => esc_html__('No of Column(s)', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 6,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_pro_counter', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_counter', array(
        'section' => 'sparkconstructionlite_counter_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Add Unlimited Counter Items', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Counter Items Settings', 'spark-construction-lite'),
            esc_html__('Counter Display Different Position', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_counter_section_refresh", array (
    'settings' => array(
        'sparkconstructionlite_counter_disable',
        'sparkconstructionlite_counter',
        'sparkconstructionlite_counter_style',
        'sparkconstructionlite_counter_col',
    ),
    'selector' => "#counter-section",
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-counter' );
    }
));