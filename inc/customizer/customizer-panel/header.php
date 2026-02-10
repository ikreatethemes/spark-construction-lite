<?php
    $wp_customize->remove_control('header_image');
   
	$wp_customize->add_section('sparkconstructionlite_header', array(
		'title'		=>	esc_html__('Header Layout','spark-construction-lite'),
		'panel'		=> 'sparkconstructionlite_header_settings',
	));
    $wp_customize->add_setting('sparkconstructionlite_header_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => -1,
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_header_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_header',
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_header_layout',
                    'sparkconstructionlite_menu_sidebar',
                    'sparkconstructionlite_enable_search',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-construction-lite'),
                'fields' => array(
                ),
            ),
            array(
                'name' => esc_html__('Menu Style', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_header_full_nav_bg_color',
                    'sparkconstructionlite_menu_seperator',
                    'sparkconstructionlite_menu_item_color',
                    'sparkconstructionlite_menu_item_link_color',
                    'sparkconstructionlite_menu_bg_color',
                    'sparkconstructionlite_submenu_seperator',
                    'sparkconstructionlite_submenu_bg_color',
                    'sparkconstructionlite_submenu_item_color',
                    'sparkconstructionlite_submenu_item_link_color',
                    'sparkconstructionlite_submenu_item_bg_color',
                )
            )
        ),
    )));
		
    $wp_customize->add_setting('sparkconstructionlite_header_layout', array(
        'default' => 'layout_one',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'       
    ));
    $wp_customize->add_control('sparkconstructionlite_header_layout', array(
        'label' => esc_html__('Header Layout', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_header',
        'type' => 'select',
        'choices' => array(
            'layout_one' => esc_html__('Layout One' , 'spark-construction-lite'),
            'layout_two' => esc_html__('Layout Two' ,'spark-construction-lite'),
            'layout_three' => esc_html__('Layout Three (Transparent)' ,'spark-construction-lite'),
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_enable_search', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',    
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_enable_search', array(
        'label' => esc_html__('Header Search', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_header',
        'switch_label' => array(
            'enable' => esc_html__('Enable', 'spark-construction-lite'),
            'disable' => esc_html__('Disable', 'spark-construction-lite'),
        ),
    )));


    /** Menu Style */
    $wp_customize->add_setting("sparkconstructionlite_header_full_nav_bg_color", array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage',
        'default' => ''
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 
        "sparkconstructionlite_header_full_nav_bg_color", 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('Full Menu Background', 'spark-construction-lite')
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_menu_seperator', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Separator_Control( $wp_customize, 
        'sparkconstructionlite_menu_seperator', array(
        'section' => 'sparkconstructionlite_header'
    )));
    
    $wp_customize->add_setting('sparkconstructionlite_menu_item_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_menu_item_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('Menu Link Color', 'spark-construction-lite')
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_menu_item_link_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_menu_item_link_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('Menu Link Color - Hover', 'spark-construction-lite')
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_menu_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_menu_bg_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('Background Color - Hover', 'spark-construction-lite')
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_submenu_seperator', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Separator_Control( $wp_customize, 
        'sparkconstructionlite_submenu_seperator', array(
        'section' => 'sparkconstructionlite_header'
    )));

    $wp_customize->add_setting('sparkconstructionlite_submenu_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_submenu_bg_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('Submenu Background Color', 'spark-construction-lite')
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_submenu_item_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_submenu_item_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('SubMenu Link Color', 'spark-construction-lite')
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_submenu_item_link_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_submenu_item_link_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('SubMenu Link Color - Hover', 'spark-construction-lite')
        )
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_submenu_item_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control( $wp_customize, 
        'sparkconstructionlite_submenu_item_bg_color', 
        array(
            'section' => 'sparkconstructionlite_header',
            'label' => esc_html__('SubMenu Item BG Color - Hover', 'spark-construction-lite')
        )
    ));

    $wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_header_layout', array (
        'settings' => array( 
            'sparkconstructionlite_enable_search',
            'sparkconstructionlite_header_bg_type',
        ),
        'selector' => '#masthead',
        'container_inclusive' => true,
        'render_callback' => function () {
            $layout = get_theme_mod('sparkconstructionlite_header_layout','layout_one');
            return get_template_part('header/header', str_replace("layout_","", $layout));
        }
    ));


$wp_customize->add_setting('sparkconstructionlite_pro_main_header', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_main_header', array(
    'section' => 'sparkconstructionlite_header',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('Six(6) different header layouts', 'spark-construction-lite'),
        esc_html__('Advanced user friendly customizer', 'spark-construction-lite'),
        esc_html__('Select background options ( color / gradient / image )', 'spark-construction-lite'),
        esc_html__('Show/Hide sticky menu', 'spark-construction-lite'),
        esc_html__('Change title & info color', 'spark-construction-lite'),
        esc_html__('Change Menu Wrapper color', 'spark-construction-lite'),
        esc_html__('Change Menu Hover/Active Color', 'spark-construction-lite'),
        esc_html__('Seven(7) Menu Hover Styles', 'spark-construction-lite'),
    ),
    'priority' => 250,
)));