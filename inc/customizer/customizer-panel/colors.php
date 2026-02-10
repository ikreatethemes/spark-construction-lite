<?php
$wp_customize->get_section( 'colors' )->title = esc_html__('Colors Settings', 'spark-construction-lite');
$wp_customize->get_section( 'colors' )->priority = 4;

$wp_customize->add_setting('sparkconstructionlite_primary_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control('sparkconstructionlite_primary_color', array(
    'type' => 'color',
    'label' => esc_html__('Primary Color', 'spark-construction-lite'),
    'section' => 'colors',
));

$wp_customize->add_setting('content_widget_background', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "content_widget_background", array(
    'section' => "colors",
    'label' => esc_html__('Widget Background', 'spark-construction-lite')
)));


$wp_customize->add_setting('sparkconstructionlite_pro_advance_color', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_advance_color', array(
    'section' => 'colors',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('H1 To H6 Color Options', 'spark-construction-lite'),
        esc_html__('Link Color', 'spark-construction-lite'),
        esc_html__('Link Hover Color', 'spark-construction-lite'),
        esc_html__('More Color Options', 'spark-construction-lite'),
    ),
    'priority' => 251,
)));