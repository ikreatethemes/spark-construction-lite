<?php
/**
 * Typography Section
*/
function sparkconstructionlite_customize_register_for_typography( $wp_customize ) {
   
    // Add the body typography section.
    $wp_customize->add_section('typography_settings', array(
        'priority' => 5,
        'title' => esc_html__('Typography Settings', 'spark-construction-lite')
    ));

    $wp_customize->add_setting('sparkconstructionlite_body_font_family', array(
        'default' => 'Sora',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('sparkconstructionlite_body_font_family', array(
        'label' => esc_html__('Body Font Family', 'spark-construction-lite'),
        'section' => 'typography_settings',
        'type' => 'select',
        'choices' => array(
            'Poppins'    => esc_html__("Poppins", 'spark-construction-lite'),
            'Roboto'     => esc_html__("Roboto", 'spark-construction-lite'),
            'Sora'     => esc_html__("Sora", 'spark-construction-lite'),
            'Raleway'    => esc_html__("Raleway", 'spark-construction-lite'),
            'Marcellus'     => esc_html__("Marcellus", 'spark-construction-lite'),
            'Montserrat' => esc_html__("Montserrat", 'spark-construction-lite'),
            'Arizonia'   => esc_html__("Arizonia", 'spark-construction-lite'),
            ''           => esc_html__("More in pro", 'spark-construction-lite'),
        )
    ));

    $wp_customize->add_setting('sparkconstructionlite_heading_font_family', array(
        'default' => 'Marcellus',
        'sanitize_callback' => 'sanitize_text_field',
        
    ));
    $wp_customize->add_control('sparkconstructionlite_heading_font_family', array(
        'label' => esc_html__('Heading (h1 to h6)', 'spark-construction-lite'),
        'section' => 'typography_settings',
        'type' => 'select',
        'choices' => array(
            'Poppins'    => esc_html__("Poppins", 'spark-construction-lite'),
            'Roboto'     => esc_html__("Roboto", 'spark-construction-lite'),
            'Sora'     => esc_html__("Sora", 'spark-construction-lite'),
            'Raleway'    => esc_html__("Raleway", 'spark-construction-lite'),
            'Marcellus'     => esc_html__("Marcellus", 'spark-construction-lite'),
            'Montserrat' => esc_html__("Montserrat", 'spark-construction-lite'),
            'Arizonia'   => esc_html__("Arizonia", 'spark-construction-lite'),
            '' => esc_html__("More in pro", 'spark-construction-lite'),
        )
    ));


    $wp_customize->add_setting('sparkconstructionlite_pro_typography', array(
        'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
    ));
    $wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_typography', array(
        'section' => 'typography_settings',
        'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
        'choices' => array(
            esc_html__('250+ Google Fonts Family', 'spark-construction-lite'),
            esc_html__('Configure H1, H2, H3, H4, H5, H6 individually or all at once', 'spark-construction-lite'),
            esc_html__('Seperate Typography Settings for Menu, Title( H1/H2/H3/H4/H5/H6 ), Page Title, Block Title, Widget Title and others', 'spark-construction-lite'),
            esc_html__('More Advanced Typography Options like font weight, text transform, text decoration, font size, line height, letter spacing', 'spark-construction-lite'),
        ),
        'priority' => 251,
    )));
}
add_action( 'customize_register', 'sparkconstructionlite_customize_register_for_typography' );