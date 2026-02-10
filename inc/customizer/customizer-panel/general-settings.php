<?php

$wp_customize->add_panel('sparkconstructionlite_general_settings_panel', array(
    'title' => esc_html__('General Settings', 'spark-construction-lite'),
    'priority' => 2
));

$wp_customize->add_section('sparkconstructionlite_container_section', array(
    'title' => esc_html__('Container', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_general_settings_panel'
));

$wp_customize->get_control('background_color')->section = 'colors';
$wp_customize->get_control('background_image')->section = 'sparkconstructionlite_container_section';
$wp_customize->get_control('background_preset')->section = 'sparkconstructionlite_container_section';
$wp_customize->get_control('background_position')->section = 'sparkconstructionlite_container_section';
$wp_customize->get_control('background_size')->section = 'sparkconstructionlite_container_section';
$wp_customize->get_control('background_repeat')->section = 'sparkconstructionlite_container_section';
$wp_customize->get_control('background_attachment')->section = 'sparkconstructionlite_container_section';

$wp_customize->get_control('background_image')->priority = 20;
$wp_customize->get_control('background_preset')->priority = 20;
$wp_customize->get_control('background_position')->priority = 20;
$wp_customize->get_control('background_size')->priority = 20;
$wp_customize->get_control('background_repeat')->priority = 20;
$wp_customize->get_control('background_attachment')->priority = 20;

$wp_customize->add_setting('sparkconstructionlite_container_width', array(
    'sanitize_callback' => 'absint',
    'default' => 1280,
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_container_width', array(
    'section' => 'sparkconstructionlite_container_section',
    'label' => esc_html__('Container Width (px)', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' => 1024,
        'max' => 1420,
        'step' => 1
    )
)));

$wp_customize->add_setting('sparkconstructionlite_sidebar_width', array(
    'sanitize_callback' => 'absint',
    'default' => 360,
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_sidebar_width', array(
    'section' => 'sparkconstructionlite_container_section',
    'label' => esc_html__('Sidebar Width (px)', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' => 300,
        'max' => 380,
        'step' => 1
    )
)));

$wp_customize->add_section('sparkconstructionlite_backtotop_section', array(
    'title' => esc_html__('Scroll to Top', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_general_settings_panel'
));

$wp_customize->add_setting('sparkconstructionlite_backtotop', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'default' => true,
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_backtotop', array(
    'section' => 'sparkconstructionlite_backtotop_section',
    'label' => esc_html__('Enable', 'spark-construction-lite'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-construction-lite'),
        'disable' => esc_html__('No', 'spark-construction-lite'),
    ),
)));


$wp_customize->add_setting('sparkconstructionlite_pro_upgrade_text', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_upgrade_text', array(
    'section' => 'sparkconstructionlite_backtotop_section',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('Change differents icon', 'spark-construction-lite'),
        esc_html__('Adjust up arrow position ( Left corner or Right corner )', 'spark-construction-lite'),
        esc_html__('Change background & font color', 'spark-construction-lite')
    ),
    'priority' => 250,
)));