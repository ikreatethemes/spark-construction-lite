<?php

$wp_customize->add_section('sparkconstructionlite_quick_info', array(
    'title' => esc_html__('Quick Information', 'spark-construction-lite'),
	'panel' => 'sparkconstructionlite_header_settings',
	'priority' => 200
));

$wp_customize->add_setting('sparkconstructionlite_quick_nav', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
	'priority' => -1,
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_quick_nav', array(
	'type' => 'tab',
	'section' => 'sparkconstructionlite_quick_info',
	'buttons' => array(
		array(
			'name' => esc_html__('Settings', 'spark-construction-lite'),
			'fields' => array(
				'sparkconstructionlite_quick_content',
			),
			'active' => true,
		),
		array(
			'name' => esc_html__('Style', 'spark-construction-lite'),
			'fields' => array(
			)
		)
	)
)));

$wp_customize->add_setting('sparkconstructionlite_quick_content', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',
	'default' => json_encode(array(
		array(
			'icon' => 'fa-regular fa-envelope-open',
			'label' => esc_html('Quick Questions? Email Us','spark-construction-lite'),
			'val' => 'example@example.com',
			'enable' => 'enable'
		),
		array(
			'icon' => 'fa-solid fa-headset',
			'label' => esc_html('Talk to an Expert (Aradia)','spark-construction-lite'),
			'val' => '(555)-555-5555',
			'enable' => 'enable'
		),
		array(
			'icon' => 'fas fa-map-marker-alt',
			'label' => esc_html('Office Address','spark-construction-lite'),
			'val' => '123 Main Street, Springfield, USA',
			'enable' => 'enable'
		)
	))
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control($wp_customize, 'sparkconstructionlite_quick_content', array(
		'label' => esc_html__('Information', 'spark-construction-lite'),
		'section' => 'sparkconstructionlite_quick_info',
		'box_label' => esc_html__('Information Item', 'spark-construction-lite'),
		'add_label' => esc_html__('Add New', 'spark-construction-lite'),
		'sortable'	=> 'enable',
		'limit' => 3,
	), 
	array(
		'icon' => array(
			'type' => 'icon',
			'label' => esc_html__('Icon', 'spark-construction-lite'),
			'default' => ''
		),
		'label' => array(
			'type' => 'text',
			'label' => esc_html__('Label', 'spark-construction-lite'),
			'default' => ''
		),
		'val' => array(
			'type' => 'text',
			'label' => esc_html__('Value', 'spark-construction-lite'),
			'default' => ''
		),			
		'enable' => array(
			'type' => 'switch',
			'label' => esc_html__('Enable', 'spark-construction-lite'),
			'switch' => array(
				'enable' => esc_html__('Yes', 'spark-construction-lite'),
				'disable' => esc_html__('No', 'spark-construction-lite')
			),
			'default' => 'enable'
		)
	)
));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_quick_content', array (
	'settings' => array( 
		'sparkconstructionlite_quick_content' 
	),
	'selector' => '.sparkconstructionlite-quick-contact',
	'container_inclusive' => true,
	'fallback_refresh' => false,
	'render_callback' => function () {
		return sparkconstructionlite_themes_quick_contact_info_header();
	}
));


$wp_customize->add_setting('sparkconstructionlite_pro_quick_info', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_quick_info', array(
    'section' => 'sparkconstructionlite_quick_info',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('Advanced Customization ( Icon, Label/Title & Link )', 'spark-construction-lite'),
        esc_html__('Change Title, Text & Icon Color', 'spark-construction-lite'),
    ),
    'priority' => 250,
)));