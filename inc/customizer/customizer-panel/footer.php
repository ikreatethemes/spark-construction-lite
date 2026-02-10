<?php

$wp_customize->add_section('sparkconstructionlite_footer_section', array(
    'title'		  => esc_html__('Footer Settings','spark-construction-lite'),
    'priority'	  => 66,
));

$wp_customize->add_setting('sparkconstructionlite_footer_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => -1,
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_footer_nav', array(
    'type' => 'tab',
    'section' => 'sparkconstructionlite_footer_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Settings', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_footer_column',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-construction-lite'),
            'fields' => array(
            )
        ),
        array(
            'name' => esc_html__('Advanced', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_footer_bg_heading',
                'sparkconstructionlite_footer_bg_type',
                'sparkconstructionlite_footer_bg_color',
                'sparkconstructionlite_footer_background_image',
                'sparkconstructionlite_footer_bg_image',
                'sparkconstructionlite_footer_overlay_color',
                'sparkconstructionlite_footer_padding',
                'sparkconstructionlite_footer_bottom_seperator',
                'sparkconstructionlite_footer_seperator0',
                'sparkconstructionlite_footer_section_seperator',
                'sparkconstructionlite_footer_top_seperator',
                'sparkconstructionlite_footer_ts_color',
                'sparkconstructionlite_footer_ts_height',
            )
        )
    )
)));

$wp_customize->add_setting('sparkconstructionlite_footer_column', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_text',
    'default' => 'd-grid-column-3',
    'transport' => 'postMessage',
));
$imagepath =  get_template_directory_uri() . '/inc/customizer/images/';
$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_footer_column', array(
    'section' => 'sparkconstructionlite_footer_section',
    'label' => esc_html__('Choose Layout', 'spark-construction-lite'),
    'options' => array(
        'd-grid-column-1' => $imagepath . 'footer-style1.webp',
        'd-grid-column-2' => $imagepath . 'footer-style2.webp',
        'd-grid-column-3' => $imagepath . 'footer-style3.webp',
        'd-grid-column-4' => $imagepath . 'footer-style6.webp'
    )
)));

    $id = "footer";
    $wp_customize->add_setting("sparkconstructionlite_{$id}_bg_type", array(
        'default' => 'none',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("sparkconstructionlite_{$id}_bg_type", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Background Type', 'spark-construction-lite'),
        'choices' => array(
            'none'      => esc_html__('Default', 'spark-construction-lite'),
            'color-bg'  => esc_html__('Color Background', 'spark-construction-lite'),
            'image-bg' => esc_html__('Image Background', 'spark-construction-lite'),
        )
    ));

    $wp_customize->add_setting("sparkconstructionlite_{$id}_bg_color", array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_{$id}_bg_color", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'label' => esc_html__('Background Color', 'spark-construction-lite'),
    )));

    $wp_customize->add_setting("sparkconstructionlite_{$id}_bg_image_url", array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Background_Control($wp_customize, "sparkconstructionlite_{$id}_bg_image", array(
        'label' => esc_html__('Background Image', 'spark-construction-lite'),
        'section' => "sparkconstructionlite_{$id}_section",
        'settings' => array(
            'image_url' => "sparkconstructionlite_{$id}_bg_image_url",
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_footer_overlay_color', array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage',
        'default' => ''
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_footer_overlay_color", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'label' => esc_html__('Overlay Color', 'spark-construction-lite'),
    )));

    $wp_customize->add_setting(
        "sparkconstructionlite_{$id}_padding",
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_field_default_css_box'
        )
    );
    $wp_customize->add_control(
        new SparkConstructionLite_Themes_Custom_Control_Cssbox(
            $wp_customize,
            "sparkconstructionlite_{$id}_padding",
            array(
                'label'    => esc_html__( 'Padding', 'spark-construction-lite' ),
                'section' => "sparkconstructionlite_{$id}_section",
            ),
            array(),
            array()
        )
    );


    $wp_customize->add_setting("sparkconstructionlite_{$id}_seperator0", array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Separator_Control($wp_customize, "sparkconstructionlite_{$id}_seperator0", array(
        'section' => "sparkconstructionlite_{$id}_section",
    )));

    $wp_customize->add_setting("sparkconstructionlite_{$id}_section_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'no',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("sparkconstructionlite_{$id}_section_seperator", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Choose Separator', 'spark-construction-lite'),
        'choices' => array(
            'no' => esc_html__('Disable', 'spark-construction-lite'),
            'top' => esc_html__('Top Separator', 'spark-construction-lite'),
        )
    ));

    $wp_customize->add_setting("sparkconstructionlite_{$id}_top_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'curv-9',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("sparkconstructionlite_{$id}_top_seperator", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Top Separator', 'spark-construction-lite'),
        'choices' => sparkconstructionlite_themes_svg_seperator(),
    ));

    $wp_customize->add_setting("sparkconstructionlite_{$id}_ts_color", array(
        'default' => '',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_{$id}_ts_color", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'label' => esc_html__('Top Separator Color', 'spark-construction-lite'),
    )));

    $wp_customize->add_setting("sparkconstructionlite_{$id}_ts_height_desktop", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("sparkconstructionlite_{$id}_ts_height_tablet", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 40,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("sparkconstructionlite_{$id}_ts_height_mobile", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 20,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Range_Slider_Control($wp_customize, "sparkconstructionlite_{$id}_ts_height", array(
        'section' => "sparkconstructionlite_{$id}_section",
        'label' => esc_html__('Top Separator Height', 'spark-construction-lite'),
        'settings' => array(
            'desktop' => "sparkconstructionlite_{$id}_ts_height_desktop",
            'tablet' => "sparkconstructionlite_{$id}_ts_height_tablet",
            'mobile' => "sparkconstructionlite_{$id}_ts_height_mobile",
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 500,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting('sparkconstructionlite_pro_footer', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_footer', array(
        'section' => 'sparkconstructionlite_footer_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('Different footer styles', 'spark-construction-lite'),
            esc_html__('Enable/Disable Footer & Sub Footer', 'spark-construction-lite'),
            esc_html__('Set custom footer columns & width', 'spark-construction-lite'),
            esc_html__('Remove footer credit text', 'spark-construction-lite'),
            esc_html__('Change title & link, hover Color', 'spark-construction-lite'),
            esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
            esc_html__('More Than 35+ Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_footer_bg_video', array(
    'selector'        => '#footer-section',
    'container_inclusive'  => true,
    'render_callback' => function() {
        do_action( 'sparkconstructionlite_themes_top_footer_content' );
    }
) );

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_footer_section', array(
    'settings'        => [ 'sparkconstructionlite_footer_top_seperator', 'sparkconstructionlite_footer_section_seperator' ],
    'selector'        => '.footer-seprator',
    'container_inclusive'  => false,
    'render_callback' => function() {
        sparkconstructionlite_themes_add_footer_seperator();
    }
) );


