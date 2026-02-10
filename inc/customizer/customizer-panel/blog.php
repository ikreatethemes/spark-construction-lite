<?php

$wp_customize->add_section('sparkconstructionlite_blog_template', array(
    'title'		  => esc_html__('Blog / Single Post Settings','spark-construction-lite'),
    'priority'	  => 65,
));

    $wp_customize->add_setting('sparkconstructionlite_blog_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => -1,
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_blog_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_blog_template',
        'buttons' => array(
            array(
                'name' => esc_html__('Blog List', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_blogtemplate_postcat',
                    'sparkconstructionlite_blog_template_sidebar',
                    'sparkconstructionlite_post_heading',
                    'sparkconstructionlite_post_column',
                    'sparkconstructionlite_blog_post_space',
                    'sparkconstructionlite_blogtemplate_btn',
                    'sparkconstructionlite_post_excerpt_length',
                    'sparkconstructionlite_post_date_options',
                    'sparkconstructionlite_post_comments_options',
                    'sparkconstructionlite_post_author_options',
                    'sparkconstructionlite_post_reading_time',
                    'sparkconstructionlite_blog_alignment'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Single Blog', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_blog_single_template_sidebar',
                    'sparkconstructionlite_blog_single_alignment',
                    'sparkconstructionlite_single_blog_title',
                    'sparkconstructionlite_single_post_top_elements',
                    'sparkconstructionlite_single_post_bottom_elements'
                )
            )
        )
    )));

	$wp_customize->add_setting('sparkconstructionlite_blog_template_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options',
	));
	$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_blog_template_sidebar', array(
		'section' => 'sparkconstructionlite_blog_template',
        'label' => esc_html__('Blog Page Sidebar', 'spark-construction-lite'),
		'options' => array(
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
		)
	)));

    $wp_customize->add_setting('sparkconstructionlite_post_column', array(
        'sanitize_callback' => 'absint',
        'default' => 2,
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_post_column', array(
        'section' => 'sparkconstructionlite_blog_template',
        'label' => esc_html__('No of Column(s)', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 4,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_blog_post_space', array(
        'sanitize_callback' => 'absint',
        'default' => 1,
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_blog_post_space', array(
        'section' => 'sparkconstructionlite_blog_template',
        'label' => esc_html__('Block Space (rem)', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 4,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting( 'sparkconstructionlite_blog_alignment', array(
        'default'           => 'text-center',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Buttonset($wp_customize,'sparkconstructionlite_blog_alignment',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-construction-lite'),
                'text-right' => esc_html__('Right', 'spark-construction-lite'),
                'text-center' => esc_html__('Center', 'spark-construction-lite'),
            ),
            'label'    => esc_html__( 'Alignment', 'spark-construction-lite' ),
            'section'  => 'sparkconstructionlite_blog_template',
            'settings' => 'sparkconstructionlite_blog_alignment',
        )
    ));

    $wp_customize->add_setting( 'sparkconstructionlite_blogtemplate_btn', array(
        'default'           => esc_html__( 'Read More','spark-construction-lite' ),
        'sanitize_callback' => 'sanitize_text_field',		
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('sparkconstructionlite_blogtemplate_btn', array(
        'label'		  => esc_html__( 'Button Text', 'spark-construction-lite' ),
        'section'	  => 'sparkconstructionlite_blog_template',
        'type' 		  => 'text',
    ));
    
    $wp_customize->add_setting( 'sparkconstructionlite_post_excerpt_length', array(
        'default'    => 20,
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_post_excerpt_length', array(
        'section' => 'sparkconstructionlite_blog_template',
        'label' => esc_html__('Excerpt Length (words number)', 'spark-construction-lite'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
            'step' => 5
        )
    )));
    
    $wp_customize->add_setting('sparkconstructionlite_post_date_options', array(
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_post_date_options', array(
        'label' => esc_html__('Post Meta Date', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_blog_template',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));
   
    $wp_customize->add_setting('sparkconstructionlite_post_comments_options', array(
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_post_comments_options', array(
        'label' => esc_html__('Post Comments', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_blog_template',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));
   
    $wp_customize->add_setting('sparkconstructionlite_post_author_options', array(
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_post_author_options', array(
        'label' => esc_html__('Post Meta Author', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_blog_template',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_post_reading_time', array(
        'default' => 'enable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_post_reading_time', array(
        'label' => esc_html__('Reading Time', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_blog_template',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

	$wp_customize->add_setting('sparkconstructionlite_blog_single_template_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options'
	));
	$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_blog_single_template_sidebar', array(
		'section' => 'sparkconstructionlite_blog_template',
        'label' => esc_html__('Blog Single Post', 'spark-construction-lite'),
		'options' => array(
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
		)
	)));


    $wp_customize->add_setting('sparkconstructionlite_blog_single_alignment',
        array(
            'default'           => 'text-left',
            'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Buttonset($wp_customize,'sparkconstructionlite_blog_single_alignment',
         array(
            'label'    => esc_html__( 'Main Content Alignment', 'spark-construction-lite' ),
            'section'  => 'sparkconstructionlite_blog_template',
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-construction-lite'),
                'text-right' => esc_html__('Right', 'spark-construction-lite'),
                'text-center' => esc_html__('Center', 'spark-construction-lite'),
            )
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_single_post_top_elements', array(
        'default' => array('title', 'post_meta', 'content'),
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_multi_choices',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control(new SparkConstructionLite_Sortable_Control($wp_customize, 'sparkconstructionlite_single_post_top_elements', array(
        'label' => esc_html__('Main Content Display & Order', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_blog_template',
        'settings' => 'sparkconstructionlite_single_post_top_elements',
        'choices' => array(
            'title' => esc_html__('Title', 'spark-construction-lite'),
            'post_meta' => esc_html__('Post Meta', 'spark-construction-lite'),
            'content' => esc_html__('Content', 'spark-construction-lite'),
        )
    )));
    

    $wp_customize->add_setting('sparkconstructionlite_single_post_bottom_elements', array(
        'default' => array('pagination', 'comment', 'related_posts'),
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_multi_choices',
    ));
    
    $wp_customize->add_control(new SparkConstructionLite_Sortable_Control($wp_customize, 'sparkconstructionlite_single_post_bottom_elements', array(
        'label' => esc_html__('Other Content Display & Order', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_blog_template',
        'settings' => 'sparkconstructionlite_single_post_bottom_elements',
        'choices' => array(
            'pagination' => esc_html__('Prev/Next Navigation', 'spark-construction-lite'),
            'comment' => esc_html__('Comment', 'spark-construction-lite'),
            'related_posts' => esc_html__('Related Posts', 'spark-construction-lite')
        )
    )));

    $wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_single_post_top_elements', array(
    'selector'        => '.singlearticle',
    'container_inclusive'  => false,
    'render_callback' => function() {
        get_template_part( 'template-parts/content', 'single' ); 
    }
) );