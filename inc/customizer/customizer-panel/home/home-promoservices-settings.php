<?php
/**
 * Promo (Feautes Services) Section
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_promoservice_section', array(
    'title' => esc_html__('Feature Services Section', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_frontpage_settings',
    'priority' => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_promoservice_section'),
    'hiding_control' => 'sparkconstructionlite_promoservice_disable'
)));

//ENABLE/DISABLE FEATURES SERVIVE SECTION
$wp_customize->add_setting('sparkconstructionlite_promoservice_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_promoservice_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_promoservice_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_promoservice_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_promoservice_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_promoservice_super_title',
                    'sparkconstructionlite_promoservice_title',
                    'sparkconstructionlite_promoservice_title_align',
                    'sparkconstructionlite_promoservice_title_style',
                    'sparkconstructionlite_promoservice_style',
                    'sparkconstructionlite_promoservice_type_heading',
                    'sparkconstructionlite_promoservice_show_image',
                    'sparkconstructionlite_promoservice_show_icon',
                    'sparkconstructionlite_promoservice',
                    'sparkconstructionlite_promo_service_icon',
                    'sparkconstructionlite_promoservice_type',
                    'sparkconstructionlite_promoservice_advance_settings'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_promoservice_icon_style',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_promoservice_bg_type',
                    'sparkconstructionlite_promoservice_bg_color',
                    'sparkconstructionlite_promoservice_bg_image',
                    'sparkconstructionlite_promoservice_overlay_color',
                    'sparkconstructionlite_promoservice_padding',
                    'sparkconstructionlite_promoservice_cs_seperator',
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_super_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('sparkconstructionlite_promoservice_super_title', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'type' => 'text',
        'label' => esc_html__('Super Title', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_promoservice_title', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'type' => 'text',
        'label' => esc_html__('Title', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Buttonset($wp_customize,'sparkconstructionlite_promoservice_title_align',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-construction-lite'),
                'text-right' => esc_html__('Right', 'spark-construction-lite'),
                'text-center' => esc_html__('Center', 'spark-construction-lite'),
            ),
            'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
            'section'  => 'sparkconstructionlite_promoservice_section',
            'settings' => 'sparkconstructionlite_promoservice_title_align',
        ))
    );

    $wp_customize->add_setting('sparkconstructionlite_promoservice_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_promoservice_title_style', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'label'    => esc_html__( 'Section Title Style', 'spark-construction-lite' ),
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),			
        )
    ));


    $wp_customize->add_setting('sparkconstructionlite_promoservice_type_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_promoservice_type_heading', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'label' => esc_html__('Select Feature Services Type', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'
    ));
    $wp_customize->add_control('sparkconstructionlite_promoservice_type', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'type' => 'radio',
        'choices' => array(
            'default' => esc_html__('Default', 'spark-construction-lite'),
            'advance' => esc_html__('Advanced', 'spark-construction-lite')
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_promoservice', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
        'default' => json_encode(array(
            array(
                'service_page' => '',
                'service_icon' =>'fa-solid fa-bezier-curve',
                'bg_color' => '',
                'color' => '',
                'alignment' => 'center',

            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 
        'sparkconstructionlite_promoservice', 
        array(
            'label' 	   => esc_html__('Default Services Settings', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_promoservice_section',
            'settings' 	   => 'sparkconstructionlite_promoservice',
            'box_label' => esc_html__('Service', 'spark-construction-lite'),
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
                'label' => esc_html__('Choose Icon', 'spark-construction-lite'),
                'default' => 'fa-solid fa-bezier-curve'
            ),
            'bg_color' => array(
                'type'  => 'colorpicker',
                'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
            ),
            'color' => array(
                'type'  => 'colorpicker',
                'label' => esc_html__( 'Color', 'spark-construction-lite' ),
            ),
            'alignment' => array(
                'type' => 'select',
                'label' => esc_html__("Alignment", 'spark-construction-lite'),
                'default' => 'center',
                'options' => array(
                    'start' => esc_html__('Left', 'spark-construction-lite'),
                    'center' => esc_html__('Center', 'spark-construction-lite'),
                    'end' => esc_html__('Right', 'spark-construction-lite')
                )
            )
            
        )
    ));


    $id = "promoservice";
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
                'block_bg_color'   => '',
                'block_color'      => '',
                'block_alignment'  => 'center',
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
                'label' => __("Title", 'spark-construction-lite'),
            ),
            'block_desc' => array(
                'type' => 'textarea',
                'label' => __("Short Description", 'spark-construction-lite'),
            ),
            'button_text' => array(
                'type' => 'text',
                'label' => esc_html__('Button Text', 'spark-construction-lite'),
                'default' => ''
            ),
            'button_url' => array(
                'type' => 'url',
                'label' => esc_html__('Button Url', 'spark-construction-lite'),
                'default' => ''
            ),
            'block_bg_color' => array(
                'type'  => 'colorpicker',
                'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
            ),
            'block_color' => array(
                'type'  => 'colorpicker',
                'label' => esc_html__( 'Color', 'spark-construction-lite' ),
            ),
            'block_alignment' => array(
                'type' => 'select',
                'label' => esc_html__("Alignment", 'spark-construction-lite'),
                'default' => 'center',
                'options' => array(
                    'start' => esc_html__('Left', 'spark-construction-lite'),
                    'center' => esc_html__('Center', 'spark-construction-lite'),
                    'end' => esc_html__('Right', 'spark-construction-lite')
                )
            ),
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_style', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_promoservice_style', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'label' => esc_html__('Choose Layout', 'spark-construction-lite'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/fsc1.webp',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/fsc2.webp',
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_promo_service_icon', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 0,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_promo_service_icon', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'label' => esc_html__('Margin Top', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => -120,
            'max' => 120,
            'step' => 1,
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_show_image', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',     
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_promoservice_show_image', array(
        'label' => esc_html__('Display Image', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_promoservice_show_icon', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',     
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_promoservice_show_icon', array(
        'label' => esc_html__('Display Icon', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        )
    )));
    
    $wp_customize->add_setting('sparkconstructionlite_promoservice_icon_style',
        array(
            'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_field_background',
            'transport'     => 'postMessage',
            'default'       => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'borderwidth' => '',
                'bordercolor' => '',
                'iconsize' => '',
            )),
        )
    );
    $wp_customize->add_control( new SparkConstructionLite_Themes_Custom_Control_Group( $wp_customize, 'sparkconstructionlite_promoservice_icon_style',
        array(
            'label'    => esc_html__( 'Item Icon Settings', 'spark-construction-lite' ),
            'section'  => 'sparkconstructionlite_promoservice_section',
            'priority' => 100,
        ),
        array(
            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
            ),
            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'spark-construction-lite' ),
            ),
            'borderwidth' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Border Width', 'spark-construction-lite' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'spark-construction-lite' ),
            ),
            'iconsize' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Font Size', 'spark-construction-lite' ),
            ),
        ))
    );

    $wp_customize->add_setting('sparkconstructionlite_pro_promoservice', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_promoservice', array(
        'section' => 'sparkconstructionlite_promoservice_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(4+) Different Layout & Settings', 'spark-construction-lite'),
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

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_promoservice_refresh', array (
    'settings' => array( 
        'sparkconstructionlite_promoservice_disable',
        'sparkconstructionlite_promoservice',
        'sparkconstructionlite_promoservice_style',
        'sparkconstructionlite_promoservice_show_image',
        'sparkconstructionlite_promoservice_type',
        'sparkconstructionlite_promoservice_advance_settings',
     ),
    'selector' => '#promoservice-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'promoservice' );
    }
));