<?php

$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_service_section', array(
    'title'		=>	esc_html__('Services Section','spark-construction-lite'),
    'panel'		=> 'sparkconstructionlite_frontpage_settings',
    'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_service_section'),
    'hiding_control' => 'sparkconstructionlite_service_disable'
)));

    //ENABLE/DISABLE SERVICE SECTION
    $wp_customize->add_setting('sparkconstructionlite_service_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_service_disable', array(
        'label' => esc_html__('Section', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_service_section',
        'switch_label' => array(
            'enable' => esc_html__('Enable', 'spark-construction-lite'),
            'disable' => esc_html__('Disable', 'spark-construction-lite'),
        ),
        'class' => 'switch-section',
        'priority' => -1,
    )));
    
    $wp_customize->add_setting('sparkconstructionlite_service_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_service_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_service_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_service_super_title',
                    'sparkconstructionlite_service_title',
                    'sparkconstructionlite_service_title_style_heading',
                    'sparkconstructionlite_service_title_style',
                    'sparkconstructionlite_service_title_align',
                    'sparkconstructionlite_service',
                    'sparkconstructionlite_service_bg_url',
                    'sparkconstructionlite_service_layout',
                    'sparkconstructionlite_service_button',
                    'sparkconstructionlite_service_type',
                    'sparkconstructionlite_service_advance_settings'
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
                    'sparkconstructionlite_service_bg_type',
                    'sparkconstructionlite_service_bg_color',
                    'sparkconstructionlite_service_bg_image',
                    'sparkconstructionlite_service_overlay_color',
                    'sparkconstructionlite_service_padding',
                    'sparkconstructionlite_service_cs_seperator',
                ),
            ),
        ),
    )));
    
    $wp_customize->add_setting( 'sparkconstructionlite_service_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			
    ) );
    $wp_customize->add_control( 'sparkconstructionlite_service_super_title', array(
        'label'    => esc_html__( 'Super Title', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_service_section',
        'type'     => 'text',
    ));


    $wp_customize->add_setting( 'sparkconstructionlite_service_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			
    ) );
    $wp_customize->add_control( 'sparkconstructionlite_service_title', array(
        'label'    => esc_html__( 'Title', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_service_section',
        'type'     => 'text',
    ));
   
    $wp_customize->add_setting('sparkconstructionlite_service_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control( new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_service_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-construction-lite'),
                    'text-center' => esc_html__('Center', 'spark-construction-lite'),
                    'text-right' => esc_html__('Right', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_service_section',
                'settings' => 'sparkconstructionlite_service_title_align',
            )
        )
    );

   
    $wp_customize->add_setting('sparkconstructionlite_service_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_service_title_style_heading', array(
        'section' => 'sparkconstructionlite_service_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_service_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_service_title_style', array(
        'section' => 'sparkconstructionlite_service_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),			
        )
    ));


    $wp_customize->add_setting('sparkconstructionlite_service_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'
    ));
    $wp_customize->add_control('sparkconstructionlite_service_type', array(
        'section' => 'sparkconstructionlite_service_section',
        'type' => 'radio',
        'label' => esc_html__('Select Type', 'spark-construction-lite'),
        'choices' => array(
            'default' => esc_html__('Default', 'spark-construction-lite'),
            'advance' => esc_html__('Advanced', 'spark-construction-lite')
        )
    ));

    
    $wp_customize->add_setting('sparkconstructionlite_service', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
        'default' => json_encode(array(
            array(
                'service_page' => '',
                'service_icon' =>'fa-solid fa-bezier-curve',
                'button_text' => '',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize,'sparkconstructionlite_service', 
        array(
            'label' 	   => esc_html__('Default Services Settings', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_service_section',
            'settings' 	   => 'sparkconstructionlite_service',
            'box_label' => esc_html__('Service Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 6,
        ),
        array(
            'service_page' => array(
                'type' => 'select',
                'label' => esc_html__('Select Page', 'spark-construction-lite'),
                'options' => $pages
            ),
            'service_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'spark-construction-lite')
            ),
            'button_text' => array(
                'type' => 'text',
                'label' => esc_html__('Button Text', 'spark-construction-lite'),
                'default' => ''
            ),
        )
    ));

   
    $id = "service";
    $wp_customize->add_setting("sparkconstructionlite_{$id}_advance_settings", array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
        'default' => json_encode(array(
            array(
                'block_image'      => '',
                'block_icon'       => 'fa-solid fa-bezier-curve',
                'block_title'      => '',
                'block_desc'       => '',
                'button_text'      => '',
                'button_url'       => '',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, "sparkconstructionlite_{$id}_advance_settings", 
        array(
            'label' 	   => esc_html__('Advance Services Settings', 'spark-construction-lite'),
            'section' 	   => "sparkconstructionlite_{$id}_section",
            'settings' 	   => "sparkconstructionlite_{$id}_advance_settings",
            'box_label' => esc_html__('Service Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 6,
        ),
        array(
            'block_image' => array(
                'type' => 'upload',
                'label' => __("Upload Image", 'spark-construction-lite'),
            ),
            'block_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'spark-construction-lite'),
                'default' => 'fa-solid fa-bezier-curve'
            ),
            'block_title' => array(
                'type' => 'text',
                'label' => esc_html__("Title", 'spark-construction-lite'),
            ),
            'block_desc' => array(
                'type' => 'textarea',
                'label' => esc_html__("Short Description", 'spark-construction-lite'),
            ),
            'button_text' => array(
                'type' => 'text',
                'label' => esc_html__('Button Text', 'spark-construction-lite'),
                'default' => ''
            ),
            'button_url' => array(
                'type' => 'url',
                'label' => esc_html__('Button URL', 'spark-construction-lite'),
                'default' => ''
            ),
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_service_layout', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_service_layout', array(
        'section' => 'sparkconstructionlite_service_section',
        'label' => esc_html__('Layout Settings', 'spark-construction-lite'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/service1.webp',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/service2.webp',
        )
    )));

   
    $wp_customize->add_setting('sparkconstructionlite_service_bg_url', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'sparkconstructionlite_service_bg_url', array(
        'label'	   => esc_html__('Feature Image','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_service_section',
        'height'=>800, // cropper Height
        'width'=>420, // Cropper Width
        'flex_width'=>true, //Flexible Width
        'flex_height'=>true, // Flexible Heiht
    )));

    $wp_customize->add_setting('sparkconstructionlite_pro_service', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_service', array(
        'section' => 'sparkconstructionlite_service_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Add Unlimited Service Items', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Services Items Settings', 'spark-construction-lite'),
            esc_html__('More Icon Settings ( Background Color/Color/Border Color/Border Width & Padding )', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_service_settings', array(
    'settings' => array( 
        'sparkconstructionlite_service_disable', 
        'sparkconstructionlite_service',
        'sparkconstructionlite_service_type',
        'sparkconstructionlite_service_bg_url',
        'sparkconstructionlite_service_advance_settings',
        'sparkconstructionlite_service_layout',
    ),
    'selector' => '#service-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'service' );
    }
));