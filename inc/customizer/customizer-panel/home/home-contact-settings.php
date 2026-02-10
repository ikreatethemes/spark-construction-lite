<?php

$wp_customize->add_section(new SparkConstructionLite_Toggle_Section($wp_customize, 'sparkconstructionlite_contact_section', array(
    'title' => esc_html__('Contact Section', 'spark-construction-lite'),
    'panel' => 'sparkconstructionlite_frontpage_settings',
    'priority' => sparkconstructionlite_themes_get_section_position('sparkconstructionlite_contact_section'),
    'hiding_control' => 'sparkconstructionlite_contact_disable'
)));

//ENABLE/DISABLE CONTACT US SECTION
$wp_customize->add_setting('sparkconstructionlite_contact_disable', array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',
    'transport' => 'postMessage',
    'default' => 'enable'
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_contact_disable', array(
    'section' => 'sparkconstructionlite_contact_section',
    'label' => esc_html__('Enable', 'spark-construction-lite'),
    'switch_label' => array(
        'enable' => esc_html__('Enable', 'spark-construction-lite'),
        'disable' => esc_html__('Disable', 'spark-construction-lite'),
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

    $wp_customize->add_setting('sparkconstructionlite_contact_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_contact_nav', array(
        'type' => 'tab',
        'section' => 'sparkconstructionlite_contact_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-construction-lite'),
                'fields' => array(
                    'sparkconstructionlite_google_map_heading',
                    'sparkconstructionlite_latitude',
                    'sparkconstructionlite_longitude',
                    'sparkconstructionlite_contact_map_address',
                    'sparkconstructionlite_contact_detail',
                    'sparkconstructionlite_contact_details_heading',
                    'sparkconstructionlite_show_contact_detail',
                    'sparkconstructionlite_contact_title', 
                    'sparkconstructionlite_contact_shortcode',
                    'sparkconstructionlite_contact_details_heading_right',
                    'sparkconstructionlite_contact_detail_item',
                    'sparkconstructionlite_contact_details'
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
                    'sparkconstructionlite_contact_bg_type',
                    'sparkconstructionlite_contact_bg_color',
                    'sparkconstructionlite_contact_bg_image',
                    'sparkconstructionlite_contact_overlay_color',
                    'sparkconstructionlite_contact_padding',
                    'sparkconstructionlite_contact_cs_seperator'
                ),
            ),
            array(
                'name' => esc_html__('Hidden', 'spark-construction-lite'),
                'class' => 'customizer-hidden',
                'fields' => array(
                    'sparkconstructionlite_contact_super_title_color',
                ),
            ),
        ),
    )));


    $wp_customize->add_setting('sparkconstructionlite_contact_details_heading_right', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_contact_details_heading_right', array(
        'section' => 'sparkconstructionlite_contact_section',
        'label' => esc_html__('Contact Information Details', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_contact_detail_item', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'enable',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_contact_detail_item', array(
        'section' => 'sparkconstructionlite_contact_section',
        'label' => esc_html__('Contact Detail', 'spark-construction-lite'),
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_contact_details', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',
        'default' => json_encode(array(
            array(
                'icon' => '',
                'label' => '',
                'description' => '',
            )
        ))
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control($wp_customize, 'sparkconstructionlite_contact_details', array(
            'label' => esc_html__('Contact Info Items', 'spark-construction-lite'),
            'section' => 'sparkconstructionlite_contact_section',
            'box_label' => esc_html__('Contact Info Item', 'spark-construction-lite'),
            'add_label' => esc_html__('Add New', 'spark-construction-lite'),
            'limit' => 3,
        ), 
        array(
            'icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'spark-construction-lite'),
                'default' => ''
            ),
            'label' => array(
                'type' => 'text',
                'label' => esc_html__('Label', 'spark-construction-lite'),
                'default' => ''
            ),
            'description' => array(
                'type' => 'text',
                'label' => esc_html__('Content', 'spark-construction-lite'),
                'default' => ''
            )
        )
    ));


    $wp_customize->add_setting('sparkconstructionlite_show_contact_detail', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'enable',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_show_contact_detail', array(
        'section' => 'sparkconstructionlite_contact_section',
        'label' => esc_html__('Map & Contact Details', 'spark-construction-lite'),
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-construction-lite'),
            'disable' => esc_html__('No', 'spark-construction-lite'),
        ),
    )));

    $wp_customize->add_setting('sparkconstructionlite_google_map_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_google_map_heading', array(
        'section' => 'sparkconstructionlite_contact_section',
        'label' => esc_html__('Google Map', 'spark-construction-lite'),
        'description' => sprintf(esc_html__('Get the Longitude and Latitude value of the location from %s', 'spark-construction-lite'), '<a target="_blank" href="https://www.latlong.net/">here</a>')
    )));

    $wp_customize->add_setting('sparkconstructionlite_latitude', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '24.691943',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_latitude', array(
        'section' => 'sparkconstructionlite_contact_section',
        'type' => 'text',
        'label' => esc_html__('Latitude', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_longitude', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '78.403931',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_longitude', array(
        'section' => 'sparkconstructionlite_contact_section',
        'type' => 'text',
        'label' => esc_html__('Longitude', 'spark-construction-lite')
    ));
    
    $wp_customize->add_setting('sparkconstructionlite_contact_map_address', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_contact_map_address', array(
        'section' => 'sparkconstructionlite_contact_section',
        'type' => 'text',
        'label' => esc_html__('Map Address', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_contact_details_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new SparkConstructionLite_Customize_Heading($wp_customize, 'sparkconstructionlite_contact_details_heading', array(
        'section' => 'sparkconstructionlite_contact_section',
        'label' => esc_html__('Contact Details', 'spark-construction-lite')
    )));

    $wp_customize->add_setting('sparkconstructionlite_contact_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => esc_html__('Quick Get In Touch', 'spark-construction-lite'),
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_contact_title', array(
        'section' => 'sparkconstructionlite_contact_section',
        'type' => 'text',
        'label' => esc_html__('Title', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_contact_shortcode', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('sparkconstructionlite_contact_shortcode', array(
        'section' => 'sparkconstructionlite_contact_section',
        'type' => 'text',
        'label' => esc_html__('Contact Form Shortcode', 'spark-construction-lite'),
        'description' => sprintf(esc_html__('Install %s plugin to get the shortcode', 'spark-construction-lite'), '<a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a>')
    ));


    $wp_customize->add_setting('sparkconstructionlite_pro_contact', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_contact', array(
        'section' => 'sparkconstructionlite_contact_section',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('Different Layout & Settings', 'spark-construction-lite'),
            esc_html__('(5+) Different Section Title Style', 'spark-construction-lite'),
            esc_html__('Advanced Contact Items Settings', 'spark-construction-lite'),
            esc_html__('Title, sub title & text color options', 'spark-construction-lite'),
			esc_html__('4+ Different Background Options( Color/Video/Gradient/Image ) ', 'spark-construction-lite'),
			esc_html__('More Than 35+ Top & Bottom Separator Shape Illustrator with Color & Height Option', 'spark-construction-lite'),
        ),
        'priority' => 250,
    )));


$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_contact_refresh', array (
    'settings' => array( 
        'sparkconstructionlite_contact_disable',
        'sparkconstructionlite_latitude',
        'sparkconstructionlite_longitude',
        'sparkconstructionlite_contact_map_address',
        'sparkconstructionlite_contact_details',
        'sparkconstructionlite_contact_detail_item',
        'sparkconstructionlite_show_contact_detail',
        'sparkconstructionlite_contact_shortcode',
    ),
    'selector' => '#contact-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-contact' );
    }
));