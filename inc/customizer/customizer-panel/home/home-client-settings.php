<?php

$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_client_section', array(
    'title'		=> 	esc_html__('Clients Section','spark-construction-lite'),
    'panel'		=> 'sparkconstructionlite_frontpage_settings',
    'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_client_section'),
    'hiding_control' => 'sparkconstructionlite_client_disable'
)));

//ENABLE/DISABLE CLINET/LOGO SECTION
$wp_customize->add_setting('sparkconstructionlite_client_disable', array(
	'default' => 'disable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_client_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_client_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_client_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_client_section_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_client_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_client_super_title',
                    'sparkconstructionlite_client_title',
                    'sparkconstructionlite_client_title_style_heading',
                    'sparkconstructionlite_client_title_style',
                    'sparkconstructionlite_client_title_align',
                    'sparkconstructionlite_client',
                    'sparkconstructionlite_logo_style',
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
                    'sparkconstructionlite_client_bg_type',
                    'sparkconstructionlite_client_bg_color',
                    'sparkconstructionlite_client_bg_image',
                    'sparkconstructionlite_client_overlay_color',
                    'sparkconstructionlite_client_padding',
                    'sparkconstructionlite_client_cs_seperator',
                ),
            ),
        ),
    )));
    

    $wp_customize->add_setting( 'sparkconstructionlite_client_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			
    ) );
    $wp_customize->add_control( 'sparkconstructionlite_client_super_title', array(
        'label'    => esc_html__( 'Super Title', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_client_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting( 'sparkconstructionlite_client_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			
    ) );
    $wp_customize->add_control( 'sparkconstructionlite_client_title', array(
        'label'    => esc_html__( 'Title', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_client_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_client_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset(
            $wp_customize,
            'sparkconstructionlite_client_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-construction-lite'),
                    'text-center' => esc_html__('Center', 'spark-construction-lite'),
                    'text-right' => esc_html__('Right', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_client_section',
                'settings' => 'sparkconstructionlite_client_title_align',
            )
        )
    );

    $wp_customize->add_setting('sparkconstructionlite_client_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_client_title_style_heading', array(
        'section' => 'sparkconstructionlite_client_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_client_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_client_title_style', array(
        'section' => 'sparkconstructionlite_client_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),			
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_client', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
        'default' => json_encode(array(
            array(
                'client_image' => '',
                'client_link'  => '',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 
        'sparkconstructionlite_client',
        array(
            'label' 	   => esc_html__('Client Logos', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_client_section',
            'settings' 	   => 'sparkconstructionlite_client',
            'box_label' => esc_html__('Logo', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
        ),
        array(
            'client_image' => array(
                'type' => 'upload',
                'label' => esc_html__('Upload Logo', 'spark-construction-lite'),
            ),
            'client_link' => array(
                'type'      => 'text',
                'label'     => esc_html__( 'Link', 'spark-construction-lite' ),
                'default'   => ''
            ), 
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_logo_style', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_logo_style', array(
        'section' => 'sparkconstructionlite_client_section',
        'label' => esc_html__('Choose Style', 'spark-construction-lite'),
        'class' => 'one-second-width',
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/logo-style1.webp',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/logo-style2.webp',
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_pro_client', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_client', array(
        'section' => 'sparkconstructionlite_client_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Add Unlimited Logo Items', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Logo Items Settings', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_client_refresh", array (
    'settings' => array( 
        'sparkconstructionlite_client_disable',
        'sparkconstructionlite_client',
        'sparkconstructionlite_logo_style',
    ),
    'selector' => "#client-section",
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-client' );
    }
));