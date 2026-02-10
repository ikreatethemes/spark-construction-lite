<?php
$wp_customize->add_section('sparkconstructionlite_titlebar_section', array(
    'title' => esc_html__('Breadcrumb Setting', 'spark-construction-lite'),
    'priority' => 60,
    'description' => esc_html__('This setting will apply in all posts, pages, archive and search page', 'spark-construction-lite'),
    'hiding_control' => 'sparkconstructionlite_breadcrumb_option'
));

$wp_customize->add_setting('sparkconstructionlite_breadcrumb_option', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',
    'transport' => 'postMessage',
    'default' => 'enable'
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_breadcrumb_option', array(
    'section' => 'sparkconstructionlite_titlebar_section',
    'label' => esc_html__('Breadcrumb', 'spark-construction-lite'),
    'switch_label' => array(
        'enable' => esc_html__('Enable', 'spark-construction-lite'),
        'disable' => esc_html__('Disable', 'spark-construction-lite')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('sparkconstructionlite_enable_breadcrumbs_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_enable_breadcrumbs_nav', array(
    'type' => 'tab',
    'section' => 'sparkconstructionlite_titlebar_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_show_title',
                'sparkconstructionlite_breadcrumb',
                'sparkconstructionlite_titlebar_title_align'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_titlebar_cs_heading',
                'sparkconstructionlite_titlebar_title_color',
                'sparkconstructionlite_titlebar_text_color',
                'sparkconstructionlite_titlebar_link_color',
                'sparkconstructionlite_titlebar_link_hover_color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_titlebar_bg_type',
                'sparkconstructionlite_titlebar_bg_color',
                'sparkconstructionlite_titlebar_bg_image',
                'sparkconstructionlite_titlebar_overlay_color',
                'sparkconstructionlite_titlebar_padding',
                'sparkconstructionlite_titlebar_section_seperator',
                'sparkconstructionlite_titlebar_bottom_seperator',
                'sparkconstructionlite_titlebar_bs_color',
                'sparkconstructionlite_titlebar_bs_height_desktop',
                
            ),
        ),
        array(
            'name' => esc_html__('Hidden', 'spark-construction-lite'),
            'class' => 'customizer-hidden',
            'fields' => array(
                'sparkconstructionlite_titlebar_super_title_color',
                'sparkconstructionlite_titlebar_radius',
                'sparkconstructionlite_titlebar_cs_seperator',
                'sparkconstructionlite_titlebar_seperator0',
                'sparkconstructionlite_titlebar_seperator1',
                'sparkconstructionlite_titlebar_top_seperator',
                'sparkconstructionlite_titlebar_ts_color',
                'sparkconstructionlite_titlebar_ts_height',
            ),
        ),
    ),
)));

$wp_customize->add_setting('sparkconstructionlite_show_title', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_checkbox',
    'transport' => 'postMessage',
    'default' => true
));
$wp_customize->add_control(new SparkConstructionLite_Checkbox_Control($wp_customize, 'sparkconstructionlite_show_title', array(
    'section' => 'sparkconstructionlite_titlebar_section',
    'label' => esc_html__('Page Title', 'spark-construction-lite')
)));


$wp_customize->add_setting('sparkconstructionlite_breadcrumb', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_checkbox',
    'transport' => 'postMessage',
    'default' => true
));
$wp_customize->add_control(new SparkConstructionLite_Checkbox_Control($wp_customize, 'sparkconstructionlite_breadcrumb', array(
    'section' => 'sparkconstructionlite_titlebar_section',
    'label' => esc_html__('Menu', 'spark-construction-lite'),
)));

$wp_customize->add_setting( 'sparkconstructionlite_titlebar_title_align', array(
    'default'           => 'text-left',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
    'transport'         => 'postMessage',
));
$wp_customize->add_control( new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize,'sparkconstructionlite_titlebar_title_align',
    array(
        'choices'  => array(
            'text-left' => esc_html__('Left', 'spark-construction-lite'),
            'text-right' => esc_html__('Right', 'spark-construction-lite'),
            'text-center' => esc_html__('Center', 'spark-construction-lite'),
        ),
        'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
        'section'  => 'sparkconstructionlite_titlebar_section',
    ))
);


$wp_customize->add_setting("sparkconstructionlite_titlebar_section_seperator", array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'bottom',
));
$wp_customize->add_control("sparkconstructionlite_titlebar_section_seperator", array(
    'section' => "sparkconstructionlite_titlebar_section",
    'type' => 'select',
    'label' => esc_html__('Select Separator', 'spark-construction-lite'),
    'choices' => array(
        'no' => esc_html__('Disable', 'spark-construction-lite'),
        'bottom' => esc_html__('Bottom Separator', 'spark-construction-lite'),
    ),
    'priority' => 95
));

$wp_customize->add_setting("sparkconstructionlite_titlebar_bottom_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'curv-9',
    'transport' => 'postMessage'
));
$wp_customize->add_control("sparkconstructionlite_titlebar_bottom_seperator", array(
    'section' => "sparkconstructionlite_titlebar_section",
    'type' => 'select',
    'label' => esc_html__('Bottom Separator', 'spark-construction-lite'),
    'choices' => sparkconstructionlite_themes_svg_seperator(),
    'priority' => 105
));

$wp_customize->add_setting("sparkconstructionlite_titlebar_bs_color", array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_titlebar_bs_color", array(
    'section' => "sparkconstructionlite_titlebar_section",
    'label' => esc_html__('Bottom Separator Color', 'spark-construction-lite'),
    'priority' => 110
)));

$wp_customize->add_setting("sparkconstructionlite_titlebar_bs_height_desktop", array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
    'default' => 40,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("sparkconstructionlite_titlebar_bs_height_tablet", array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
    'default' => 30,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("sparkconstructionlite_titlebar_bs_height_mobile", array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
    'default' => 20,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Range_Slider_Control($wp_customize, "sparkconstructionlite_titlebar_bs_height_desktop", array(
    'section' => "sparkconstructionlite_titlebar_section",
    'transport' => 'postMessage',
    'label' => esc_html__('Bottom Separator Height', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 400,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => "sparkconstructionlite_titlebar_bs_height_desktop",
        'tablet' => "sparkconstructionlite_titlebar_bs_height_tablet",
        'mobile' => "sparkconstructionlite_titlebar_bs_height_mobile",
    ),
    'priority' => 120
)));


$wp_customize->add_setting('sparkconstructionlite_pro_breadcrumb', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_breadcrumb', array(
    'section' => 'sparkconstructionlite_titlebar_section',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('Text Alignment Option', 'spark-construction-lite'),
        esc_html__('Change Title & Menu link Color', 'spark-construction-lite'),
        esc_html__('4+ Different Background Option ( Color/ Video/ Gradient/ Image ) ', 'spark-construction-lite'),
        esc_html__('More Than 35+ Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
    ),
    'priority' => 250,
)));


$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_breadcrumbs_settings', array (
    'settings' => array( 
        'sparkconstructionlite_breadcrumb_option', 
        'sparkconstructionlite_titlebar_section_seperator', 
        'sparkconstructionlite_titlebar_bottom_seperator',
    ),
    'selector' => '.breadcrumb-section',
    'container_inclusive' => true,
    'render_callback' => function() {
        sparkconstructionlite_themes_breadcrumbs();
    }
));