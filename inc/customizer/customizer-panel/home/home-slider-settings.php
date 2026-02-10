<?php   
  
$wp_customize->add_section('sparkconstructionlite_slider_section', array(
    'title'		=>	esc_html__('Home Slider','spark-construction-lite'),
    'priority'  => 15
));
$wp_customize->add_setting('sparkconstructionlite_slider_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new SparkConstructionLite_Custom_Control_Tab($wp_customize, 'sparkconstructionlite_slider_nav', array(
    'type' => 'tab',
    'section' => 'sparkconstructionlite_slider_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_banner_slider_section',
                'sparkconstructionlite_slider_height',
                'sparkconstructionlite_slider_type',
                'sparkconstructionlite_slider_advance_settings',
                'sparkconstructionlite_banner_sliders',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_banner_overlay_color',
                'sparkconstructionlite_caption_title_font_size',
                'sparkconstructionlite_slider_seperator0',
                'sparkconstructionlite_slider_section_seperator',
                'sparkconstructionlite_slider_bottom_seperator',
                'sparkconstructionlite_slider_bs_color',
                'sparkconstructionlite_slider_bs_height',
                'main_slider_controls'
            ),
        ),
        array(
            'name' => esc_html__('Caption', 'spark-construction-lite'),
            'fields' => array(
                'sparkconstructionlite_caption_width',
            )
        )
    ),
)));

$wp_customize->add_setting('sparkconstructionlite_banner_slider_section', array(
    'default' => 'enable',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',     
));
$wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_banner_slider_section', array(
    'label' => esc_html__('Enable', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_slider_section',
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-construction-lite'),
        'disable' => esc_html__('No', 'spark-construction-lite'),
    ),
)));

$wp_customize->add_setting('sparkconstructionlite_slider_height', array(
    'sanitize_callback' => 'absint',
    'default' => 650,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_slider_height', array(
    'section' => 'sparkconstructionlite_slider_section',
    'label' => esc_html__('Slider Height (px)', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' =>400,
        'max' => 900,
        'step' => 1
    )
)));


$wp_customize->add_setting('sparkconstructionlite_slider_type', array(
    'default' => 'default',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_select'
));
$wp_customize->add_control('sparkconstructionlite_slider_type', array(
    'section' => 'sparkconstructionlite_slider_section',
    'type' => 'radio',
    'label' => esc_html__('Select Type', 'spark-construction-lite'),
    'choices' => array(
        'default' => esc_html__('Default', 'spark-construction-lite'),
        'advance' => esc_html__('Advanced', 'spark-construction-lite'),
    )
));

$wp_customize->add_setting('sparkconstructionlite_banner_sliders', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
    'default' => json_encode(array(
        array(
            'subtitile'  => '',
            'slider_page' => '',
            'button_text' => '',
            'button_url' => '',
            'button_one_text' => '',
            'button_one_url' => '',
            'alignment' => 'center',
        )
    ))
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, 'sparkconstructionlite_banner_sliders', 
    array(
        'label' 	   => esc_html__('Default Slides Settings', 'spark-construction-lite'),
        'section' 	   => 'sparkconstructionlite_slider_section',
        'box_label' => esc_html__('Default Slide Options', 'spark-construction-lite'),
        'add_label' => esc_html__('Add New', 'spark-construction-lite'),
    ),
    array(
        'subtitile' => array(
            'type' => 'text',
            'label' => __("Super Title", 'spark-construction-lite'),
        ),
        'slider_page' => array(
            'type' => 'select',
            'label' => esc_html__('Select Page', 'spark-construction-lite'),
            'options' => $pages
        ),
        'button_wrapper_start' => array(
            'type' => 'wrapper-start',
            'label' => esc_html__('First Button Settings','spark-construction-lite'),
        ),
        'button_text' => array(
            'type' => 'text',
            'label' => esc_html__('Button Text', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_url' => array(
            'type' => 'url',
            'label' => esc_html__('Button Url', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_wrapper_end' => array(
            'type' => 'wrapper-end',
        ),
        'button_wrapper_start2' => array(
            'type' => 'wrapper-start',
            'label' => esc_html__('Second Button Settings','spark-construction-lite'),
        ),
        'button_one_text' => array(
            'type' => 'text',
            'label' => esc_html__('Button Text', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_one_url' => array(
            'type' => 'url',
            'label' => esc_html__('Button Url', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_wrapper_end2' => array(
            'type' => 'wrapper-end',
        ),
        'alignment' => array(
            'type' => 'select',
            'label' => esc_html__("Alignment", 'spark-construction-lite'),
            'default' => 'center',
            'options' => array(
                'start' => esc_html__('Left', 'spark-construction-lite'),
                'center' => esc_html__('Center', 'spark-construction-lite'),
                'end' => esc_html__('Right', 'spark-construction-lite')
            )
        ),
    )
));

$id = "slider";
$wp_customize->add_setting("sparkconstructionlite_{$id}_advance_settings", array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_repeater',		
    'default' => json_encode(array(
        array(
            'block_image'      => '',
            'block_subtitile'  => '',
            'block_title'      => '',
            'block_desc'       => '',
            'button_text'       => '',
            'button_url'        => '',
            'button_one_text'   => '',
            'button_one_url'    => '',
            'alignment'         => 'center',
        )
    ))
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Repeater_Control( $wp_customize, "sparkconstructionlite_{$id}_advance_settings", 
    array(
        'label' 	   => esc_html__('Advanced Slides Settings', 'spark-construction-lite'),
        'section' 	   => "sparkconstructionlite_{$id}_section",
        'box_label' => esc_html__('Advanced Slide Settings', 'spark-construction-lite'),
        'add_label' => esc_html__('Add New Slide', 'spark-construction-lite'),
    ),
    array(
        'block_image' => array(
            'type' => 'upload',
            'label' => __("Upload Image", 'spark-construction-lite'),
        ),
        'block_subtitile' => array(
            'type' => 'text',
            'label' => __("Super Title", 'spark-construction-lite'),
        ),
        'block_title' => array(
            'type' => 'text',
            'label' => __("Title", 'spark-construction-lite'),
        ),
        'block_desc' => array(
            'type' => 'textarea',
            'label' => __("Short Description", 'spark-construction-lite'),
        ),
        'button_wrapper_start' => array(
            'type' => 'wrapper-start',
            'label' => esc_html__('First Button Settings','spark-construction-lite'),
        ),
        'button_text' => array(
            'type' => 'text',
            'label' => esc_html__('First Button Text', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_url' => array(
            'type' => 'url',
            'label' => esc_html__('First Button Url', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_wrapper_end' => array(
            'type' => 'wrapper-end',
        ),
        'button_wrapper_start2' => array(
            'type' => 'wrapper-start',
            'label' => esc_html__('Second Button Settings','spark-construction-lite'),
        ),
        'button_one_text' => array(
            'type' => 'text',
            'label' => esc_html__('Second Button Text', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_one_url' => array(
            'type' => 'url',
            'label' => esc_html__('Second Button Url', 'spark-construction-lite'),
            'default' => ''
        ),
        'button_wrapper_end2' => array(
            'type' => 'wrapper-end',
        ),
        'alignment' => array(
            'type' => 'select',
            'label' => esc_html__("Alignment", 'spark-construction-lite'),
            'default' => 'center',
            'options' => array(
                'start' => esc_html__('Left', 'spark-construction-lite'),
                'center' => esc_html__('Center', 'spark-construction-lite'),
                'end' => esc_html__('Right', 'spark-construction-lite')
            )
        ),
    )
));

$wp_customize->add_setting('sparkconstructionlite_banner_overlay_color', array(
    'default' => 'rgba(0, 0, 0, 0.35)',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, 'sparkconstructionlite_banner_overlay_color', array(
    'label' => esc_html__('Background Overlay Color', 'spark-construction-lite'),
    'section' => 'sparkconstructionlite_slider_section'
)));

$wp_customize->add_setting('sparkconstructionlite_caption_title_font_size', array(
    'sanitize_callback' => 'absint',
    'default' => 45,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_caption_title_font_size', array(
    'section' => 'sparkconstructionlite_slider_section',
    'label' => esc_html__('Title Font Size', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' =>20,
        'max' => 80,
        'step' => 1
    )
)));

$wp_customize->add_setting('sparkconstructionlite_caption_width', array(
    'sanitize_callback' => 'absint',
    'default' => 70,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Range_Control($wp_customize, 'sparkconstructionlite_caption_width', array(
    'section' => 'sparkconstructionlite_slider_section',
    'label' => esc_html__('Caption Width (%)', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' =>50,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('main_slider_controls',
    array(
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_field_background',
        'transport' => 'postMessage',
        'default'           => json_encode(array(
            'navtype'       => 'both',
            'navstyle'      => 'arrowstyle',
            'dotstyle'      => 'dotstyle',
            'loop'          => 1,
            'autoplay'      => 1,
            'easing'        => 'fadeOut',
            'drag'          => 1,
            'speed'         => 500,
            'pause'         => 5000
        )),
    )
);
$wp_customize->add_control(new SparkConstructionLite_Themes_Custom_Control_Group( $wp_customize, 'main_slider_controls',
        array(
            'label'    => esc_html__( 'Slider Controls', 'spark-construction-lite' ),
            'section'  => 'sparkconstructionlite_slider_section',
        ),
        array(
            'navtype'      => array(
                'type'  => 'select',
                'label' => esc_html__( 'Navigation', 'spark-construction-lite' ),
                'options' => array(
                    'both' => esc_html__("Arrows and Dots", 'spark-construction-lite'),
                    'arrows' => esc_html__("Arrows", 'spark-construction-lite'),
                    'dots' => esc_html__("Dots", 'spark-construction-lite'),
                    'none' => esc_html__("None", 'spark-construction-lite'),
                )
            ),
            'navstyle'      => array(
                'type'  => 'select',
                'label' => esc_html__( 'Nav Style', 'spark-construction-lite' ),
                'options' => array(
                    'imagestyle' => esc_html__("Images", 'spark-construction-lite'),
                    'arrowstyle' => esc_html__("Arrows", 'spark-construction-lite'),
                )
            ),
            'dotstyle'      => array(
                'type'  => 'select',
                'label' => esc_html__( 'Dots Style', 'spark-construction-lite' ),
                'options' => array(
                    'numberstyle' => esc_html__("Number", 'spark-construction-lite'),
                    'dotstyle' => esc_html__("Dots", 'spark-construction-lite'),
                )
            ),
            'loop'      => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Loop', 'spark-construction-lite' ),
            ),
            'autoplay' => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Auto Play', 'spark-construction-lite' ),
            ),
            'drag' => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Drag', 'spark-construction-lite' ),
            ),
            'easing'      => array(
                'type'  => 'select',
                'label' => esc_html__( 'Easing', 'spark-construction-lite' ),
                'options' => array(
                    'fadeOut' => __("fadeOut", 'spark-construction-lite'),
                    'fadeIn' => __("fadeIn", 'spark-construction-lite'),
                    'slide' => __("Slide", 'spark-construction-lite'),
                )
            ),
            'speed'      => array(
                'type'  => 'number',
                'label' => esc_html__( 'Transition Speed (ms)', 'spark-construction-lite' ),
            ),
            'pause'      => array(
                'type'  => 'number',
                'label' => esc_html__( 'Autoplay Speed', 'spark-construction-lite' ),
            )
        )
    )
);


$wp_customize->add_setting("sparkconstructionlite_slider_seperator0", array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Separator_Control($wp_customize, "sparkconstructionlite_slider_seperator0", array(
    'section' => "sparkconstructionlite_slider_section",
)));

$wp_customize->add_setting("sparkconstructionlite_slider_section_seperator", array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'no',
));
$wp_customize->add_control("sparkconstructionlite_slider_section_seperator", array(
    'section' => "sparkconstructionlite_slider_section",
    'type' => 'select',
    'label' => esc_html__('Select Separator', 'spark-construction-lite'),
    'choices' => array(
        'no' => esc_html__('Disable', 'spark-construction-lite'),
        'bottom' => esc_html__('Bottom Separator', 'spark-construction-lite'),
    )
));

$wp_customize->add_setting("sparkconstructionlite_slider_bottom_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'curv-8',
    'transport' => 'postMessage'
));
$wp_customize->add_control("sparkconstructionlite_slider_bottom_seperator", array(
    'section' => "sparkconstructionlite_slider_section",
    'type' => 'select',
    'label' => esc_html__('Bottom Separator', 'spark-construction-lite'),
    'choices' => sparkconstructionlite_themes_svg_seperator(),
));

$wp_customize->add_setting("sparkconstructionlite_slider_bs_color", array(
    'default' => '',
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Alpha_Color_Control($wp_customize, "sparkconstructionlite_slider_bs_color", array(
    'section' => "sparkconstructionlite_slider_section",
    'label' => esc_html__('Bottom Separator Color', 'spark-construction-lite'),
)));


$wp_customize->add_setting("sparkconstructionlite_slider_bs_height", array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
    'default' => 60,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("sparkconstructionlite_slider_bs_height_tablet", array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
    'default' => 40,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("sparkconstructionlite_slider_bs_height_mobile", array(
    'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_number_blank',
    'default' => 20,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new SparkConstructionLite_Range_Slider_Control($wp_customize, "sparkconstructionlite_slider_bs_height", array(
    'section' => "sparkconstructionlite_slider_section",
    'transport' => 'postMessage',
    'label' => esc_html__('Bottom Separator Height', 'spark-construction-lite'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 400,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => "sparkconstructionlite_slider_bs_height",
        'tablet' => "sparkconstructionlite_slider_bs_height_tablet",
        'mobile' => "sparkconstructionlite_slider_bs_height_mobile",
    )
)));


$wp_customize->add_setting('sparkconstructionlite_pro_slider', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
));
$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_slider', array(
    'section' => 'sparkconstructionlite_slider_section',
    'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
    'choices' => array(
        esc_html__('Add Unlimited slider Items', 'spark-construction-lite'),
        esc_html__('Advanced Level of Customization', 'spark-construction-lite'),
        esc_html__('Select Different Slider Types Video, Single Banner & Revolution', 'spark-construction-lite'),
        esc_html__('Get Options to Enter Revolution Slider Shortcode', 'spark-construction-lite'),
        esc_html__('Get Change SuperTitle, Title, Description & Button Color', 'spark-construction-lite'),
        esc_html__('Caption Background Color Options', 'spark-construction-lite'),
        esc_html__('Caption Text Alignment Options', 'spark-construction-lite'),
        esc_html__('Customize Margin & Padding', 'spark-construction-lite'),
        esc_html__('Adjust Slider Height & Font Size', 'spark-construction-lite'),
        esc_html__('Option to configure slider pause and duration', 'spark-construction-lite'),
    ),
    'priority' => 250,
)));

$wp_customize->selective_refresh->add_partial( 'sparkconstructionlite_slider_refresh', array (
    'settings' => array(
        'sparkconstructionlite_banner_slider_section',
        'sparkconstructionlite_slider_type',
        'sparkconstructionlite_banner_sliders',
        'sparkconstructionlite_slider_advance_settings',
        'main_slider_controls',
        'sparkconstructionlite_slider_section_seperator',
        'sparkconstructionlite_slider_bottom_seperator'
    ),
    'selector' => '.sparkconstructionlite-banner-wrapper',
    'fallback_refresh' => true,
	'container_inclusive' => true,
    'render_callback' => function () {
        if( get_theme_mod( 'sparkconstructionlite_banner_slider_section' ) === 'enable' ) {
            return do_action('sparkconstructionlite_themes_slider_type');
        }
    }
));