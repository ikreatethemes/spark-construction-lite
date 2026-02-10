<?php
   
$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_top_header', array(
    'title' =>	esc_html__('Top Header','spark-construction-lite'),
    'panel' => 'sparkconstructionlite_header_settings',
    'hiding_control' => 'sparkconstructionlite_top_header_enable'
)));
$wp_customize->add_setting('sparkconstructionlite_top_header_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_top_header_nav', array(
    'type' => 'tab',
    'section' => 'sparkconstructionlite_top_header',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_top_header_hide_show',
                'sparkconstructionlite_topheader_left',
                'sparkconstructionlite_topheader_right',
                'sparkconstructionlite_topheader_social_link',
                'sparkconstructionlite_top_header_quick_content',
                'sparkconstructionlite_topheader_free_hand',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_th_bg_color',
                'sparkconstructionlite_topheader_social_color_link'
            ),
        ),
        array(
            'name' => esc_html__("Advance", 'spark-construction-lite'),
            'fields' => array(
            )
        )
    ),
)));

$wp_customize->add_setting( 'sparkconstructionlite_top_header_hide_show',
    array(
        'default' => json_encode(array(
            'desktop' => 'show',
            'tablet' => 'show',
            'mobile' => 'hide'
        )),
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_field_responsive_buttonset',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Responsive_Buttonset( $wp_customize, 'sparkconstructionlite_top_header_hide_show',
        array(
            'choices'  => array(
                'show' => esc_html__( 'Show', 'spark-construction-lite' ),
                'hide' => esc_html__( 'Hide', 'spark-construction-lite' ),
            ),
            'label'    => esc_html__( 'Top Header', 'spark-construction-lite' ),
            'section' => 'sparkconstructionlite_top_header',
        )
    )
);
    
$wp_customize->add_setting('sparkconstructionlite_topheader_left', array(
    'default' => 'free_hand',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'        
));
$wp_customize->add_control('sparkconstructionlite_topheader_left', array(
    'label' => esc_html__('Left Side Top Header', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_top_header',
    'type' => 'select',
    'choices' => array(
        'none' => esc_html__('None', 'spark-construction-lite'),
        'quick_contact' => esc_html__('Quick Contact Information', 'spark-construction-lite'),
        'top_menu'  => esc_html__('Top Menu Nav', 'spark-construction-lite'),
        'free_hand'  => esc_html__('Free Hand', 'spark-construction-lite'),
    )
));

$wp_customize->add_setting('sparkconstructionlite_topheader_right', array(
    'default' => 'social_media',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'        
));
$wp_customize->add_control('sparkconstructionlite_topheader_right', array(
    'label' => esc_html__('Right Side Top Header', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_top_header',
    'type' => 'select',
    'choices' => array(
        'none' => esc_html__('None', 'spark-construction-lite'),
        'social_media'  => esc_html__('Social Media Links', 'spark-construction-lite'),
        'top_menu'  => esc_html__('Top Menu Nav', 'spark-construction-lite'),
    )
));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_topheader_right', array (
    'settings' => array( 
        'sparkconstructionlite_topheader_right',
        'sparkconstructionlite_topheader_left',
        'sparkconstructionlite_topheader_free_hand',
    ),
    'selector' => '#masthead',
    'fallback_refresh' => true,
    'render_callback' => function () {
        $layout = get_theme_mod('sparkconstructionlite_header_layout','layout_one');
        return get_template_part('header/header', str_replace("layout_","", $layout));
    }
));

$wp_customize->add_setting('sparkconstructionlite_topheader_social_link', array(
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new SparkConstructionLite_Info_Text($wp_customize, 'sparkconstructionlite_topheader_social_link', array(
    'label' => esc_html__('Social Links', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_top_header',
    'description' => sprintf(esc_html__('Add your %1$s here', 'spark-construction-lite'), '<a href="#" target="_blank">Social Links</a>')
)));

$wp_customize->add_setting('sparkconstructionlite_top_header_quick_content', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'fa-solid fa-headset',
            'label' => '',
            'val' => '+01-555-555-5555',
            'enable' => 'enable'
        ),
        array(
            'icon' => 'fa-regular fa-envelope-open',
            'label' => esc_html('eMail :','spark-construction-lite'),
            'val' => 'example@example.com',
            'enable' => 'enable'
        ),
        array(
            'icon' => 'fas fa-map-marker-alt',
            'label' => esc_html('Address :','spark-construction-lite'),
            'val' => '123 Main Street, Springfield, USA',
            'enable' => 'enable'
        )
    ))
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control($wp_customize, 'sparkconstructionlite_top_header_quick_content', array(
        'label' => esc_html__('Information', 'spark-construction-lite'),
        'section' => 'sparkconstructionlite_top_header',
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

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_top_header_quick_content', array (
    'settings' => array( 
        'sparkconstructionlite_top_header_quick_content' 
    ),
    'selector' => '.sparkconstructionlite-quick-info',
    'container_inclusive' => true,
    'fallback_refresh' => false,
    'render_callback' => function () {
        return sparkconstructionlite_themes_quick_contact();
    }
));

$wp_customize->add_setting('sparkconstructionlite_topheader_free_hand', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'default' => esc_html__('Need Any Help: +1-555-555-5555 or example@example.com', 'spark-construction-lite'),
    'transport' => 'postMessage'
));
$wp_customize->add_control('sparkconstructionlite_topheader_free_hand', array(
    'label' => esc_html__('Free hand', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_top_header',
    'type' => 'textarea'
));

$wp_customize->add_setting('sparkconstructionlite_th_bg_color', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 'sparkconstructionlite_th_bg_color', array(
    'label' => esc_html__('Background', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_top_header',
)));

$wp_customize->add_setting('sparkconstructionlite_topheader_social_color_link', array(
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new SparkConstructionLite_Info_Text($wp_customize, 'sparkconstructionlite_topheader_social_color_link', array(
    'label' => esc_html__('Social Colors', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_top_header',
    'description' => sprintf(esc_html__('Customize your %s here', 'spark-construction-lite'), '<a href="#" target="_blank">Social Colors</a>')
)));


$wp_customize->add_setting('sparkconstructionlite_pro_top_header', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_top_header', array(
    'section' => 'sparkconstructionlite_top_header',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('Advanced user friendly customizer', 'spark-construction-lite'),
        esc_html__('Toggle visibility in variant device', 'spark-construction-lite'),
        esc_html__('Background & gradient color', 'spark-construction-lite'),
        esc_html__('Change text and link color', 'spark-construction-lite'),
        esc_html__('Customize margin & padding', 'spark-construction-lite'),
    ),
    'priority' => 250,
)));