<?php

$wp_customize->add_section('sparkconstructionlite_social_section', array(
    'title' => esc_html__('Social Media', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_header_settings',
    'priority' => 201,
));
$wp_customize->add_setting('sparkconstructionlite_social_section_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    
));

$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_social_section_nav', array(
    'type' => 'tab',
    'section' => 'sparkconstructionlite_social_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_topheader_social',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-construction-lite'),
            'fields' => array(
               'sparkconstructionlite_social_icon_color',
               'sparkconstructionlite_social_icon_bg_color',
               'sparkconstructionlite_social_icon_hover_color',
               'sparkconstructionlite_social_icon_hover_bg_color'
            ),
        ),
    ),
)));

$wp_customize->add_setting('sparkconstructionlite_topheader_social', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'fab fa-facebook',
            'link' => '#',
        ),
        array(
            'icon' => 'fa-brands fa-x-twitter',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-linkedin',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-pinterest',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-instagram',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-youtube',
            'link' => '#',
        )
    ))
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control($wp_customize, 'sparkconstructionlite_topheader_social', array(
        'label' => esc_html__('Social Links', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_social_section',
        'box_label' => esc_html__('Social Link', 'spark-construction-lite'),
        'add_label' => esc_html__('Add New', 'spark-construction-lite'),
        'limit' => 6,
    ), 
    array(
        'icon' => array(
            'type' => 'social-icon',
            'label' => esc_html__('Select Icon', 'spark-construction-lite'),
            'default' => 'icofont-facebook'
        ),
        'link' => array(
            'type' => 'url',
            'label' => esc_html__('Link', 'spark-construction-lite'),
            'default' => ''
        ),
    )
));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_topheader_social', array (
    'settings' => array( 'sparkconstructionlite_topheader_social' ),
    'selector' => '.top-bar-menu .sparkconstructionlite-socialicon',
    'container_inclusive' => true,
    'render_callback' => function () {
        return sparkconstructionlite_themes_topheader_social();
    }
));

$wp_customize->add_setting('sparkconstructionlite_social_icon_color', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'default' => '',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 'sparkconstructionlite_social_icon_color', array(
    'section' => 'sparkconstructionlite_social_section',
    'label' => esc_html__('Color', 'spark-construction-lite')
)));

$wp_customize->add_setting('sparkconstructionlite_social_icon_bg_color', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'default' => '',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 'sparkconstructionlite_social_icon_bg_color', array(
    'section' => 'sparkconstructionlite_social_section',
    'label' => esc_html__('Background Color', 'spark-construction-lite')
)));

$wp_customize->add_setting('sparkconstructionlite_social_icon_hover_color', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'default' => '',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 'sparkconstructionlite_social_icon_hover_color', array(
    'section' => 'sparkconstructionlite_social_section',
    'label' => esc_html__('Hover Color', 'spark-construction-lite')
)));

$wp_customize->add_setting('sparkconstructionlite_social_icon_hover_bg_color', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'default' => '',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 'sparkconstructionlite_social_icon_hover_bg_color', array(
    'section' => 'sparkconstructionlite_social_section',
    'label' => esc_html__('Hover Background Color', 'spark-construction-lite')
)));