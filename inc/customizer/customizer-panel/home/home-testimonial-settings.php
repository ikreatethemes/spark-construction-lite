<?php
/**
 * Testimonial Section
*/
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_testimonial_section', array(
    'title'		=> 	esc_html__('Testimonials Section','spark-construction-lite'),
    'panel'		=> 'sparkconstructionlite_frontpage_settings',
    'priority'  => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_testimonial_section'),
    'hiding_control' => 'sparkconstructionlite_testimonial_disable'
)));

//ENABLE/DISABLE TESTIMONIAL SECTION
$wp_customize->add_setting('sparkconstructionlite_testimonial_disable', array(
	'default' => 'enable',
	'transport' => 'postMessage',
	'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_testimonial_disable', array(
	'label' => esc_html__('Section', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_testimonial_section',
	'switch_label' => array(
		'enable' => esc_html__('Enable', 'spark-construction-lite'),
		'disable' => esc_html__('Disable', 'spark-construction-lite'),
	),
	'class' => 'switch-section',
    'priority' => -1,
)));
    
    $wp_customize->add_setting('sparkconstructionlite_testimonial_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_testimonial_section_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_testimonial_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_testimonial_title',
                    'sparkconstructionlite_testimonial_super_title',
                    'sparkconstructionlite_testimonial_title_style_heading',
                    'sparkconstructionlite_testimonial_title_style',
                    'sparkconstructionlite_testimonial_title_align',
                    'sparkconstructionlite_testimonial_type_heading',
                    'sparkconstructionlite_testimonial_type',
                    'sparkconstructionlite_testimonial_page',
                    'sparkconstructionlite_testimonial_advance_settings',
                    'sparkconstructionlite_testimonial_review_link',
                    'sparkconstructionlite_testimonial_layout',
                    'sparkconstructionlite_testimonial_display_style',
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
                    'sparkconstructionlite_testimonial_bg_type',
                    'sparkconstructionlite_testimonial_bg_color',
                    'sparkconstructionlite_testimonial_bg_image',
                    'sparkconstructionlite_testimonial_overlay_color',
                    'sparkconstructionlite_testimonial_padding',
                    'sparkconstructionlite_testimonial_cs_seperator',
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_testimonial_super_title', array(
        'label'	   => esc_html__('Super Title','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_testimonial_section',
        'type'	   => 'text',
    ));
   
    $wp_customize->add_setting('sparkconstructionlite_testimonial_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_testimonial_title', array(
        'label'	   => esc_html__('Title','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_testimonial_section',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new SparkConstructionLite_Custom_Control_Buttonset( $wp_customize, 'sparkconstructionlite_testimonial_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-construction-lite'),
                    'text-center' => esc_html__('Center', 'spark-construction-lite'),
                    'text-right' => esc_html__('Right', 'spark-construction-lite'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
                'section'  => 'sparkconstructionlite_testimonial_section',
            )
        )
    );
   
    $wp_customize->add_setting('sparkconstructionlite_testimonial_title_style_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_testimonial_title_style_heading', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'label' => esc_html__('Section Title Style', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_title_style', array(
        'default' => 'style1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_testimonial_title_style', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'type'    => 'select',
        'choices' => array(
            'style1' => esc_html__('Style 1','spark-construction-lite'),
            'style2' => esc_html__('Style 2','spark-construction-lite'),			
            'style3' => esc_html__('Style 3','spark-construction-lite'),		
        )
    ));

   
    $wp_customize->add_setting('sparkconstructionlite_testimonial_type_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_testimonial_type_heading', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'label' => esc_html__('Select Type', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'
    ));
    $wp_customize->add_control('sparkconstructionlite_testimonial_type', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'type' => 'radio',
        'choices' => array(
            'default' => esc_html__('Default', 'spark-construction-lite'),
            'advance' => esc_html__('Advanced', 'spark-construction-lite')
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_page', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
        'default' => json_encode(array(
            array(
                'testimonial_page' => '',
                'designation'   =>'',
                'rating'    => ''
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 'sparkconstructionlite_testimonial_page', 
        array(
            'label' 	   => esc_html__('Default Testimonial Settings', 'spark-construction-lite'),
            'section' 	   => 'sparkconstructionlite_testimonial_section',
            'settings' 	   => "sparkconstructionlite_testimonial_page",
            'box_label' => esc_html__('Testimonial Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 6,
        ),
        array(
            'testimonial_page' => array(
                'type' => 'select',
                'label' => esc_html__('Select Page', 'spark-construction-lite'),
                'options' => $pages
            ),
            'designation' => array(
                'type' => 'text',
                'label' => esc_html__('Designation', 'spark-construction-lite'),
                'default' => ''
            ),
            'rating' => array(
                'type' => 'number',
                'label' => esc_html__('Rating', 'spark-construction-lite'),
                'default' => '5'
            )
        )
    ));

    $wp_customize->add_setting("sparkconstructionlite_testimonial_advance_settings", array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
        'default' => json_encode(array(
            array(
                'block_image'      => '',
                'block_title'      => '',
                'block_designation' => '',
                'block_text'    => '',
                'block_rating'     => '',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, "sparkconstructionlite_testimonial_advance_settings", 
        array(
            'label' 	   => esc_html__('Advance Testimonial Settings', 'spark-construction-lite'),
            'section' 	   => "sparkconstructionlite_testimonial_section",
            'settings' 	   => "sparkconstructionlite_testimonial_advance_settings",
            'box_label' => esc_html__('Testimonial Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 6,
        ),
        array(
            'block_image' => array(
                'type' => 'upload',
                'label' => __("Upload Image", 'spark-construction-lite'),
            ),
            'block_title' => array(
                'type' => 'text',
                'label' => __("Title", 'spark-construction-lite'),
            ),
            'block_designation' => array(
                'type' => 'text',
                'label' => __("Designation", 'spark-construction-lite'),
            ),
            'block_text' => array(
                'type' => 'textarea',
                'label' => __("Text", 'spark-construction-lite'),
            ),
            'block_rating' => array(
                'type' => 'number',
                'label' => esc_html__('Rating', 'spark-construction-lite'),
                'default' => ''
            )
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_layout', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_testimonial_layout', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'label' => esc_html__('Select Layout', 'spark-construction-lite'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/testimonial-1.webp',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/testimonial-2.webp',
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_display_style', array(
        'default' => 'slide',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'         
    ));
    $wp_customize->add_control('sparkconstructionlite_testimonial_display_style', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'type'    => 'select',
        'label' => esc_html__('Display Style', 'spark-construction-lite'),
        'choices' => array(
            'grid' => esc_html__('Grid','spark-construction-lite'),
            'slide' => esc_html__('Slide','spark-construction-lite'),			
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_testimonial_review_link', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		
    ));
    $wp_customize->add_control('sparkconstructionlite_testimonial_review_link', array(
        'label'	   => esc_html__('All Review Link','spark-construction-lite'),
        'section'  => 'sparkconstructionlite_testimonial_section',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('sparkconstructionlite_pro_testimonial', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_testimonial', array(
        'section' => 'sparkconstructionlite_testimonial_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('(4+) Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('Add Unlimited Testimonial Items', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));
    
$wp_customize->selective_refresh->add_partial( "sparkconstructionlite_testimonial_refresh", array (
    'settings' => array( 
        'sparkconstructionlite_testimonial_disable',
        'sparkconstructionlite_testimonial_type',
        'sparkconstructionlite_testimonial_layout',
        'sparkconstructionlite_testimonial_display_style',
        'sparkconstructionlite_testimonial_page',
        'sparkconstructionlite_testimonial_advance_settings',
        'sparkconstructionlite_testimonial_review_link',
    ),
    'selector' => "#testimonial-section",
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-testimonial' );
    }
));