<?php

$wp_customize->add_section('sparkconstructionlite_header_button_section', array(
    'title' => esc_html__('Header Button', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_header_settings'
));

$wp_customize->add_setting('sparkconstructionlite_header_button_enable', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'default' => 'enable',
    'transport' => 'postMessage',
    'priority' => -1,
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_header_button_enable', array(
    'section' => 'sparkconstructionlite_header_button_section',
    'label' => esc_html__('Enable', 'spark-construction-lite'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-construction-lite'),
        'disable' => esc_html__('No', 'spark-construction-lite')
    ),
    'class' => 'switch-section'
)));


$wp_customize->add_setting('sparkconstructionlite_header_button_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => -1,
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_header_button_nav', array(
    'type' => 'tab',
    'section' => 'sparkconstructionlite_header_button_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_button_style',
                'sparkconstructionlite_hb_icon',
                'sparkconstructionlite_hb_title',
                'sparkconstructionlite_hb_text',
                'sparkconstructionlite_hb_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_header_button_bg_color',
                'sparkconstructionlite_header_button_color'
            ),
        )
    ),
)));


$wp_customize->add_setting('sparkconstructionlite_button_style', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'default' => 'disable',
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_button_style', array(
    'section' => 'sparkconstructionlite_header_button_section',
    'label' => esc_html__('Button Style', 'spark-construction-lite'),
    'switch_label' => array(
        'enable' => esc_html__('Style 1', 'spark-construction-lite'),
        'disable' => esc_html__('Style 2', 'spark-construction-lite')
    ),
    'class' => 'button-style'
)));

$wp_customize->add_setting('sparkconstructionlite_hb_icon', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'default' => 'fa-solid fa-headset',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Fontawesome_Icon_Chooser($wp_customize, 'sparkconstructionlite_hb_icon', array(
    'section' => 'sparkconstructionlite_header_button_section',
    'label' => esc_html__('Icon', 'spark-construction-lite')
)));


$wp_customize->add_setting('sparkconstructionlite_hb_title', array(
    'default' => esc_html__('Book Now', 'spark-construction-lite'),
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'transport' => 'postMessage'
));
$wp_customize->add_control('sparkconstructionlite_hb_title', array(
    'section' => 'sparkconstructionlite_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'spark-construction-lite')
));

$wp_customize->add_setting('sparkconstructionlite_hb_text', array(
    'default' => '(5593)-236-8009',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'transport' => 'postMessage'
));
$wp_customize->add_control('sparkconstructionlite_hb_text', array(
    'section' => 'sparkconstructionlite_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Text', 'spark-construction-lite')
));

$wp_customize->add_setting('sparkconstructionlite_hb_link', array(
    'default' => '#',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'transport' => 'postMessage'
));
$wp_customize->add_control('sparkconstructionlite_hb_link', array(
    'section' => 'sparkconstructionlite_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Link', 'spark-construction-lite')
));


$wp_customize->add_setting('sparkconstructionlite_header_button_bg_color', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_header_button_bg_color", array(
    'section' => "sparkconstructionlite_header_button_section",
    'label' => esc_html__('Background', 'spark-construction-lite')
)));

$wp_customize->add_setting('sparkconstructionlite_header_button_color', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_header_button_color", array(
    'section' => "sparkconstructionlite_header_button_section",
    'label' => esc_html__('Color', 'spark-construction-lite')
)));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_header_button_refresh', array (
    'settings' => array( 
        'sparkconstructionlite_header_button_enable',
        'sparkconstructionlite_button_style',
        'sparkconstructionlite_hb_icon',
     ),
     'selector' => '#masthead',
     'container_inclusive' => true,
     'render_callback' => function () {
         $layout = get_theme_mod('sparkconstructionlite_header_layout','layout_one');
         return get_template_part('header/header', str_replace("layout_","", $layout));
     }
));