<?php
/**
 * Custom A Section
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_customa_section', array(
    'title' => esc_html__('Custom Section A', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_frontpage_settings',
    'priority' => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_customa_section'),
    'hiding_control' => 'sparkconstructionlite_customa_disable'
)));

//ENABLE/DISABLE CUSTOM A SECTION
$wp_customize->add_setting('sparkconstructionlite_customa_disable', array(
	'default' => 'disable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_customa_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_customa_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_customa_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_customa_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_customa_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_customa_title_heading',
                    'sparkconstructionlite_customa_super_title',
                    'sparkconstructionlite_customa_title',
                    'sparkconstructionlite_customa_title_align',
                    'sparkconstructionlite_customa_title_style',
                    'sparkconstructionlite_customa_title_style_heading',
                    'sparkconstructionlite_customa_page_settings'
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
                    'sparkconstructionlite_customa_bg_type',
                    'sparkconstructionlite_customa_bg_color',
                    'sparkconstructionlite_customa_bg_image',
                    'sparkconstructionlite_customa_overlay_color',
                    'sparkconstructionlite_customa_padding',
                    'sparkconstructionlite_customa_cs_seperator',
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_customa_super_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('sparkconstructionlite_customa_super_title', array(
        'section' => 'sparkconstructionlite_customa_section',
        'type' => 'text',
        'label' => esc_html__('Super Title', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_customa_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_customa_title', array(
        'section' => 'sparkconstructionlite_customa_section',
        'type' => 'text',
        'label' => esc_html__('Title', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_customa_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Buttonset($wp_customize,'sparkconstructionlite_customa_title_align',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-construction-lite'),
                'text-right' => esc_html__('Right', 'spark-construction-lite'),
                'text-center' => esc_html__('Center', 'spark-construction-lite'),
            ),
            'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
            'section'  => 'sparkconstructionlite_customa_section',
            'settings' => 'sparkconstructionlite_customa_title_align',
        ))
    );


    $wp_customize->add_setting('sparkconstructionlite_customa_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_customa_title_style_heading', array(
        'section' => 'sparkconstructionlite_customa_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_customa_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_customa_title_style', array(
        'section' => 'sparkconstructionlite_customa_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),			
        )
    ));

   
    $wp_customize->add_setting('sparkconstructionlite_customa_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_customa_title_heading', array(
        'section' => 'sparkconstructionlite_customa_section',
        'label' => esc_html__('Select Section Custom Page', 'spark-construction-lite')
    )));

    $id = "customa";
    $wp_customize->add_setting("sparkconstructionlite_{$id}_page_settings", array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint',		
    ));
    $wp_customize->add_control( "sparkconstructionlite_{$id}_page_settings", array(
        'type'     => 'dropdown-pages',
        'section' 	=> "sparkconstructionlite_{$id}_section",
        'description' => esc_html__('Create a custom layout with the selected page using patterns or elementor.', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_pro_customa', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_customa', array(
        'section' => 'sparkconstructionlite_customa_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_customa_refresh', array (
    'settings' => array( 
        'sparkconstructionlite_customa_disable',
        'sparkconstructionlite_customa_page_settings',
     ),
    'selector' => '#customa-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'customa' );
    }
));