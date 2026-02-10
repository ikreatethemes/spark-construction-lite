<?php

namespace SparkConstructionLiteElements\Modules\SliderBlock\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SliderBlock extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-slider';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Sliders Block', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_keywords() {
		return [ 'slides', 'carousel', 'image', 'title', 'slider' ];
	}

	public function get_script_depends() {
		return [ 'imagesloaded' ];
	}

    /** Category */
    public function get_categories() {
        return ['SparkConstructionLite-elements'];
    }

    /** Controls */
    protected function register_controls() {

		$this->start_controls_section(
            'content_section', [
                'label' => esc_html__('Content', 'spark-construction-lite'),
            ]
        );

		    $repeater = new Repeater();

            $repeater->start_controls_tabs( 'slides_repeater' );

                $repeater->start_controls_tab(
                    'content',[
                        'label' => esc_html__( 'Content', 'spark-construction-lite' ),
                    ]
                );

                    $repeater->add_control(
                        'background_image',[
                            'label' => esc_html__( 'Background Image', 'spark-construction-lite' ),
                            'type' => Controls_Manager::MEDIA,
                            'default' => [
                                'url' => Utils::get_placeholder_image_src(),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slide-bg' => 'background-image: url({{URL}})',
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'super_title', [
                            'label' => esc_html__('Super Title', 'spark-construction-lite'),
                            'type' => Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => esc_html__('Super Slider Title', 'spark-construction-lite')
                        ]
                    );

                    $repeater->add_control(
                        'slider_title', [
                            'label' => esc_html__('Title', 'spark-construction-lite'),
                            'type' => Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => esc_html__('Your Slider Title Text', 'spark-construction-lite')
                        ]
                    );

                    $repeater->add_control(
                        'slider_description', [
                            'label' => esc_html__('Short Description', 'spark-construction-lite'),
                            'type' => Controls_Manager::TEXTAREA,
                            'rows' => 5,
                            'placeholder' => esc_html__('Enter Slider Short Description', 'spark-construction-lite'),
                            'default' => esc_html__('End your search here! Unlock Our Premium Themes to launch your website. Our all themes are user-friendly and fully customizable, friendly Customer Support and regular updates.', 'spark-construction-lite'),
                        ]
                    );

                    $repeater->add_control(
                        'slider_button_text',[
                            'label' => esc_html__( 'First Button Text', 'spark-construction-lite' ),
                            'type' => Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => esc_html__( 'WordPress Themes', 'spark-construction-lite' ),
                        ]
                    );

                    $repeater->add_control(
                        'slider_button_link', [
                            'label' => esc_html__('First Button Url', 'spark-construction-lite'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => esc_html__('Enter Button URL', 'spark-construction-lite'),
                            'show_external' => true,
                            'default' => [
                                'url' => '#',
                                'is_external' => false,
                                'nofollow' => false,
                            ],
                            'condition' => [
                                'slider_button_text!' => '',
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'first_link_icon',[
                            'label' => esc_html__( 'Link Icon', 'spark-construction-lite' ),
                            'type' => Controls_Manager::ICONS,
                            'skin' => 'inline',
                            'default' => [
                                'library' => 'fa-solid',
                                'value' => 'fas fa-long-arrow-alt-right',
                            ],
                            'label_block' => false,
                            'skin_settings' => [
                                'inline' => [
                                    'none' => [
                                        'label' => 'Default',
                                        'icon' => '',
                                    ],
                                    'icon' => [
                                        'icon' => 'eicon-long-arrow-right',
                                    ],
                                ],
                            ],
                            'recommended' => [
                                'fa-regular' => [
                                    'arrow-alt-circle-right',
                                ],
                                'fa-solid' => [
                                    'angle-double-right',
                                    'angle-right',
                                    'arrow-alt-circle-right',
                                    'arrow-circle-right',
                                    'arrow-right',
                                    'caret-right',
                                    'chevron-circle-right',
                                    'chevron-right',
                                    'long-arrow-alt-right',
                                ],
                            ],
                            'condition' => [
                                'slider_button_link[url]!' => '',
                                'slider_button_text!' => '',
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'slider_button_one_text',[
                            'label' => esc_html__( 'Second Button Text', 'spark-construction-lite' ),
                            'type' => Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => esc_html__( 'Contact Us', 'spark-construction-lite' ),
                        ]
                    );

                    $repeater->add_control(
                        'slider_button_one_link', [
                            'label' => esc_html__('Second Button Url', 'spark-construction-lite'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => esc_html__('Enter Button URL', 'spark-construction-lite'),
                            'show_external' => true,
                            'default' => [
                                'url' => '#',
                                'is_external' => false,
                                'nofollow' => false,
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'second_link_icon',[
                            'label' => esc_html__( 'Link Icon', 'spark-construction-lite' ),
                            'type' => Controls_Manager::ICONS,
                            'skin' => 'inline',
                            'default' => [
                                'library' => 'fa-solid',
                                'value' => 'fas fa-long-arrow-alt-right',
                            ],
                            'label_block' => false,
                            'skin_settings' => [
                                'inline' => [
                                    'none' => [
                                        'label' => 'Default',
                                        'icon' => '',
                                    ],
                                    'icon' => [
                                        'icon' => 'eicon-long-arrow-right',
                                    ],
                                ],
                            ],
                            'recommended' => [
                                'fa-regular' => [
                                    'arrow-alt-circle-right',
                                ],
                                'fa-solid' => [
                                    'angle-double-right',
                                    'angle-right',
                                    'arrow-alt-circle-right',
                                    'arrow-circle-right',
                                    'arrow-right',
                                    'caret-right',
                                    'chevron-circle-right',
                                    'chevron-right',
                                    'long-arrow-alt-right',
                                ],
                            ],
                            'condition' => [
                                'slider_button_one_link[url]!' => '',
                                'slider_button_one_text!' => '',
                            ],
                        ]
                    );

                $repeater->end_controls_tab();

                $repeater->start_controls_tab(
                    'background',[
                        'label' => esc_html__( 'Background', 'spark-construction-lite' ),
                    ]
                );

                    $repeater->add_control(
                        'background_color',[
                            'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#02020273',
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slide-bg' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'background_size',[
                            'label' => esc_html__( 'Image Size', 'spark-construction-lite' ),
                            'type' => Controls_Manager::SELECT,
                            'default' => 'cover',
                            'options' => [
                                'cover' => _x( 'Cover', 'Background Control', 'spark-construction-lite' ),
                                'contain' => _x( 'Contain', 'Background Control', 'spark-construction-lite' ),
                                'auto' => _x( 'Auto', 'Background Control', 'spark-construction-lite' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slide-bg' => 'background-size: {{VALUE}}',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'background_image[url]',
                                        'operator' => '!=',
                                        'value' => '',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'background_overlay',[
                            'label' => esc_html__( 'Background Overlay', 'spark-construction-lite' ),
                            'type' => Controls_Manager::SWITCHER,
                            'default' => 'yes',
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'background_image[url]',
                                        'operator' => '!=',
                                        'value' => '',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'background_overlay_color',[
                            'label' => esc_html__( 'Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => 'rgba(0,0,0,0.4)',
                            'conditions' => [
                                'relation' => 'and',
                                'terms' => [
                                    [
                                        'name' => 'background_image[url]',
                                        'operator' => '!=',
                                        'value' => '',
                                    ],
                                    [
                                        'name' => 'background_overlay',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-bg-overlay' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'background_overlay_blend_mode',[
                            'label' => esc_html__( 'Blend Mode', 'spark-construction-lite' ),
                            'type' => Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'Normal', 'spark-construction-lite' ),
                                'multiply' => 'Multiply',
                                'screen' => 'Screen',
                                'overlay' => 'Overlay',
                                'darken' => 'Darken',
                                'lighten' => 'Lighten',
                                'color-dodge' => 'Color Dodge',
                                'color-burn' => 'Color Burn',
                                'soft-light' => 'Soft Light',
                                'difference' => 'Differency',
                                'exclusion' => 'Exclusive',
                                'plus-darker' => 'Plus Darker',
                                'plus-lighter' => 'Plus Lighter',
                                'hue' => 'Hue',
                                'saturation' => 'Saturation',
                                'color' => 'Color',
                                'exclusion' => 'Exclusion',
                                'luminosity' => 'Luminosity',
                            ],
                            'conditions' => [
                                'relation' => 'and',
                                'terms' => [
                                    [
                                        'name' => 'background_image[url]',
                                        'operator' => '!=',
                                        'value' => '',
                                    ],
                                    [
                                        'name' => 'background_overlay',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-bg-overlay' => 'mix-blend-mode: {{VALUE}}',
                            ],
                        ]
                    );

                $repeater->end_controls_tab();

                $repeater->start_controls_tab(
                    'style',[
                        'label' => esc_html__( 'Style', 'spark-construction-lite' ),
                    ]
                );

                    $repeater->add_control(
                        'custom_style',[
                            'label' => esc_html__( 'Custom', 'spark-construction-lite' ),
                            'type' => Controls_Manager::SWITCHER,
                            'description' => esc_html__( 'Set custom style that will only affect this specific slide.', 'spark-construction-lite' ),
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(), [
                            'name' => 'current_bg_color',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-caption',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );
        
                    $repeater->add_responsive_control(
                        'current_padding',[
                            'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );
        
                    $repeater->add_responsive_control(
                        'current_radius',[
                            'label' => esc_html__( 'Radius', 'spark-construction-lite' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-caption' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_responsive_control(
                        'horizontal_position',[
                            'label' => esc_html__( 'Horizontal Position', 'spark-construction-lite' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                                    'icon' => 'eicon-h-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                                    'icon' => 'eicon-h-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner' => 'justify-content:{{VALUE}}',
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-button-wrapper' => 'justify-content: {{VALUE}}',
                            ],
                            'selectors_dictionary' => [
                                'start' => 'flex-start',
                                'center' => 'center',
                                'end' => 'flex-end',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_responsive_control(
                        'vertical_position',[
                            'label' => esc_html__( 'Vertical Position', 'spark-construction-lite' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'top' => [
                                    'title' => esc_html__( 'Top', 'spark-construction-lite' ),
                                    'icon' => 'eicon-v-align-top',
                                ],
                                'middle' => [
                                    'title' => esc_html__( 'Middle', 'spark-construction-lite' ),
                                    'icon' => 'eicon-v-align-middle',
                                ],
                                'bottom' => [
                                    'title' => esc_html__( 'Bottom', 'spark-construction-lite' ),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner' => 'align-items: {{VALUE}}',
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-button-wrapper' => 'align-items: {{VALUE}}',
                            ],
                            'selectors_dictionary' => [
                                'top' => 'flex-start',
                                'middle' => 'center',
                                'bottom' => 'flex-end',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_responsive_control(
                        'text_align',[
                            'label' => esc_html__( 'Text Align', 'spark-construction-lite' ),
                            'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner' => 'text-align: {{VALUE}}',
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-button-wrapper' => 'text-align: {{VALUE}}',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'content_color',[
                            'label' => esc_html__( 'Content Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner .sparkconstructionlite-slider-super-title, 
                                {{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner .sparkconstructionlite-slider-title,
                                {{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner .sparkconstructionlite-slider-description' => 'color: {{VALUE}}',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Text_Shadow::get_type(),[
                            'name' => 'repeater_text_shadow',
                            'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-slider-inner',
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'custom_style',
                                        'value' => 'yes',
                                    ],
                                ],
                            ],
                        ]
                    );

                $repeater->end_controls_tab();

            $repeater->end_controls_tabs();

            $this->add_control(
                'slider_block',[
                    'label' => esc_html__( 'Slides', 'spark-construction-lite' ),
                    'type' => Controls_Manager::REPEATER,
                    'show_label' => true,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'background_image' => Utils::get_placeholder_image_src(),
                            'super_title' => esc_html__( 'Super Title One 1', 'spark-construction-lite' ),
                            'slider_title' => esc_html__( 'Slide 1 Heading Title', 'spark-construction-lite' ),
                            'slider_description' => esc_html__( 'End your search here! Unlock Our Premium Themes to launch your website. Our all themes are user-friendly and fully customizable, friendly Customer Support and regular updates.', 'spark-construction-lite' ),
                            'slider_button_text' => esc_html__( 'WordPress Themes', 'spark-construction-lite' ),
                            'slider_button_link' => '#',
                            'slider_button_one_text' => esc_html__( 'Contact Us', 'spark-construction-lite' ),
                            'slider_button_one_link' => '#',
                            
                        ],
                        [
                            'background_image' => Utils::get_placeholder_image_src(),
                            'super_title' => esc_html__( 'Super Title Two 2', 'spark-construction-lite' ),
                            'slider_title' => esc_html__( 'Slide 2 Heading Title', 'spark-construction-lite' ),
                            'slider_description' => esc_html__( 'End your search here! Unlock Our Premium Themes to launch your website. Our all themes are user-friendly and fully customizable, friendly Customer Support and regular updates.', 'spark-construction-lite' ),
                            'slider_button_text' => esc_html__( 'WordPress Themes', 'spark-construction-lite' ),
                            'slider_button_link' => '#',
                            'slider_button_one_text' => esc_html__( 'Contact Us', 'spark-construction-lite' ),
                            'slider_button_one_link' => '#',
                            
                        ],
                    ],
                    'title_field' => '{{{ slider_title }}}',
                ]
            );

            $this->add_responsive_control(
                'slides_height',[
                    'label' => esc_html__( 'Height', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 100,
                            'max' => 1000,
                        ],
                        'em' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                        'rem' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                        'vh' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'size' => 650,
                    ],
                    'tablet_default' => [
                        'size' => 600,
                    ],
                    'mobile_default' => [
                        'size' => 480,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'slider_padding',[
                    'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'slides_super_title_tag',[
                    'label' => esc_html__( 'Super Title HTML Tag', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'div' => 'div',
                        'span' => 'span',
                        'p' => 'p',
                    ],
                    'default' => 'h4',
                ]
            );

            $this->add_control(
                'slides_title_tag',[
                    'label' => esc_html__( 'Title HTML Tag', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'div' => 'div',
                        'span' => 'span',
                        'p' => 'p',
                    ],
                    'default' => 'h2',
                ]
            );

            $this->add_control(
                'slides_description_tag',[
                    'label' => esc_html__( 'Description HTML Tag', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'div' => 'div',
                        'span' => 'span',
                        'p' => 'p',
                    ],
                    'default' => 'div',
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_options',[
				'label' => esc_html__( 'Slider Options', 'spark-construction-lite' ),
				'type' => Controls_Manager::SECTION,
			]
		);

            $this->add_control(
            	'navigation',[
            		'label' => esc_html__( 'Navigation', 'spark-construction-lite' ),
            		'type' => Controls_Manager::SELECT,
            		'default' => 'both',
            		'options' => [
            			'both' => esc_html__( 'Arrows and Dots', 'spark-construction-lite' ),
            			'arrows' => esc_html__( 'Arrows', 'spark-construction-lite' ),
            			'dots' => esc_html__( 'Dots', 'spark-construction-lite' ),
            			'none' => esc_html__( 'None', 'spark-construction-lite' ),
            		],
            	]
            );

            $this->add_control(
            	'dots_style_type',[
            		'label' => esc_html__( 'Dots Style', 'spark-construction-lite' ),
            		'type' => Controls_Manager::SELECT,
            		'default' => 'dots_type',
            		'options' => [
            			'dots_type' => esc_html__( 'Dots', 'spark-construction-lite' ),
            			'number_type' => esc_html__( 'Number', 'spark-construction-lite' ),
            		],
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'name' => 'navigation',
                                'value' => 'both',
                            ],
                            [
                                'name' => 'navigation',
                                'value' => 'dots',
                            ],
                        ],
                    ],
            	]
            );

            $this->add_control(
                'dots_type_position',[
                    'label' => esc_html__( 'Dots Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'prefix_class' => 'sparkconstructionlite-dots-position-',
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'name' => 'navigation',
                                'value' => 'both',
                            ],
                            [
                                'name' => 'navigation',
                                'value' => 'dots',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
            	'nav_style_type',[
            		'label' => esc_html__( 'Nav Style', 'spark-construction-lite' ),
            		'type' => Controls_Manager::SELECT,
            		'default' => 'nav_arrow',
            		'options' => [
            			'nav_image' => esc_html__( 'Images', 'spark-construction-lite' ),
            			'nav_arrow' => esc_html__( 'Arrows', 'spark-construction-lite' ),
            		],
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'name' => 'navigation',
                                'value' => 'both',
                            ],
                            [
                                'name' => 'navigation',
                                'value' => 'arrows',
                            ],
                        ],
                    ],
            	]
            );

            $this->add_control(
                'nav_type_position',[
                    'label' => esc_html__( 'Nav Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'start' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'end' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}}.sparkconstructionlite-dots-position-left .nav_image .owl-nav, {{WRAPPER}}.sparkconstructionlite-dots-position-right .nav_image .owl-nav' => 'justify-content:{{VALUE}}',
                        '{{WRAPPER}}.sparkconstructionlite-dots-position-left .nav_arrow .owl-nav, {{WRAPPER}}.sparkconstructionlite-dots-position-right .nav_arrow .owl-nav' => 'justify-content:{{VALUE}}',
                    ],
                    'selectors_dictionary' => [
                        'start' => 'flex-start',
                        'center' => 'center',
                        'end' => 'flex-end',
                    ],
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'name' => 'dots_type_position',
                                'value' => 'left',
                            ],
                            [
                                'name' => 'dots_type_position',
                                'value' => 'right',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'autoplay',[
                    'label' => esc_html__( 'Autoplay', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'frontend_available' => true,
                ]
            );

            $this->add_control(
                'pause_on_hover',[
                    'label' => esc_html__( 'Pause on Hover', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'render_type' => 'none',
                    'frontend_available' => true,
                    'condition' => [
                        'autoplay!' => '',
                    ],
                ]
            );

            $this->add_control(
                'pause_on_interaction',[
                    'label' => esc_html__( 'Pause on Interaction', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'render_type' => 'none',
                    'frontend_available' => true,
                    'condition' => [
                        'autoplay!' => '',
                    ],
                ]
            );

            $this->add_control(
                'autoplay_speed',[
                    'label' => esc_html__( 'Autoplay Speed', 'spark-construction-lite' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 5000,
                    'condition' => [
                        'autoplay' => 'yes',
                    ],
                    'frontend_available' => true,
                ]
            );

            $this->add_control(
                'infinite',[
                    'label' => esc_html__( 'Infinite Loop', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'frontend_available' => true,
                ]
            );

            $this->add_control(
                'transition',[
                    'label' => esc_html__( 'Transition', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'slide',
                    'options' => [
                        'slide' => esc_html__( 'Slide', 'spark-construction-lite' ),
                        'fade' => esc_html__( 'Fade', 'spark-construction-lite' ),
                    ],
                    'frontend_available' => true,
                ]
            );

            $this->add_control(
                'transition_speed',[
                    'label' => esc_html__( 'Transition Speed', 'spark-construction-lite' ) . ' (ms)',
                    'type' => Controls_Manager::NUMBER,
                    'default' => 500,
                    'frontend_available' => true,
                ]
            );

            $this->add_control(
                'entrance_animation',[
                    'label' => esc_html__( 'Caption Animation', 'spark-construction-lite' ),
                    'type' => \Elementor\Controls_Manager::ANIMATION,
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-slider-caption',
                    'render_type' => 'template',
                    'default' => 'fadeInUp',
                ]
            );

            $this->add_control(
            	'sequenced_animation',[
            		'label' => esc_html__( 'Sequenced Animation', 'spark-construction-lite' ),
            		'type' => Controls_Manager::SWITCHER,
                    'prefix_class' => 'sparkconstructionlite-sequenced-animation',
            		'default' => 'yes',
            		'condition' => [
            			'entrance_animation!' => '',
            		],
            	]
            );

            $this->add_control(
            	'content_animation_duration',[
            		'label' => esc_html__( 'Animation Duration', 'spark-construction-lite' ) . ' (ms)',
            		'type' => Controls_Manager::SLIDER,
            		'render_type' => 'template',
            		'default' => [
            			'size' => 300,
            		],
            		'range' => [
            			'px' => [
            				'min' => 0,
            				'max' => 2000,
            				'step' => 100,
            			],
            		],
            		'selectors' => [
            			'{{WRAPPER}}.sparkconstructionlite-sequenced-animationyes .sparkconstructionlite-slider-super-title' => 'animation-delay: {{SIZE}}ms',
                        '{{WRAPPER}}.sparkconstructionlite-sequenced-animationyes .sparkconstructionlite-slider-title:nth-child(2)' => 'animation-delay: calc({{SIZE}}ms * 2 )',
                        '{{WRAPPER}}.sparkconstructionlite-sequenced-animationyes .sparkconstructionlite-slider-description:nth-child(3)' => 'animation-delay: calc({{SIZE}}ms * 3 )',
                        '{{WRAPPER}}.sparkconstructionlite-sequenced-animationyes .sparkconstructionlite-button-wrapper:nth-child(4)' => 'animation-delay: calc({{SIZE}}ms * 4 )',
            		],
            		'condition' => [
            			'sequenced_animation!' => '',
            		],
            	]
            );


		$this->end_controls_section();

        $this->start_controls_section(
			'section_style_slides',[
				'label' => esc_html__( 'Slides Caption', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
                'content_max_width',[
                    'label' => esc_html__( 'Content Width', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        'px' => [
                            'max' => 1000,
                        ],
                        'em' => [
                            'max' => 100,
                        ],
                        'rem' => [
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'size' => 75,
                        'unit' => '%',
                    ],
                    'tablet_default' => [
                        'size' => 100,
                        'unit' => '%',
                    ],
                    'mobile_default' => [
                        'size' => 100,
                        'unit' => '%',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-caption' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(), [
                    'name' => 'slides_bg_color',
                    'types' => [ 'classic', 'gradient' ],
                    'exclude' => [ 'image' ],
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-slider-caption',
                    'fields_options' => [
                        'background' => [
                            'default' => 'classic',
                        ],
                    ],
                ]
            );

            $this->add_responsive_control(
                'slides_padding',[
                    'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'slides_radius',[
                    'label' => esc_html__( 'Radius', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-caption' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'slides_horizontal_position',[
                    'label' => esc_html__( 'Horizontal Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'start' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'end' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-inner' => 'justify-content:{{VALUE}}',
                        '{{WRAPPER}} .sparkconstructionlite-button-wrapper' => 'justify-content: {{VALUE}}',
                    ],
                    'selectors_dictionary' => [
                        'start' => 'flex-start',
                        'center' => 'center',
                        'end' => 'flex-end',
                    ]
                ]
            );

            $this->add_responsive_control(
                'slides_vertical_position',[
                    'label' => esc_html__( 'Vertical Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'middle' => [
                            'title' => esc_html__( 'Middle', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-middle',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-inner' => 'align-items: {{VALUE}}',
                        '{{WRAPPER}} .sparkconstructionlite-button-wrapper' => 'align-items: {{VALUE}}',
                    ],
                    'selectors_dictionary' => [
                        'top' => 'flex-start',
                        'middle' => 'center',
                        'bottom' => 'flex-end',
                    ]
                ]
            );

            $this->add_responsive_control(
                'slides_text_align',[
                    'label' => esc_html__( 'Text Align', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-inner' => 'text-align: {{VALUE}}',
                        '{{WRAPPER}} .sparkconstructionlite-button-wrapper' => 'text-align: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),[
                    'name' => 'slides_text_shadow',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-slider-inner',
                ]
            );

		$this->end_controls_section();

        $this->start_controls_section(
            'super_title_style', [
                'label' => esc_html__('Super Title', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'super_title_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-super-title' => 'color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'super_title_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-slider-super-title',
                ]
            );

            $this->add_responsive_control(
                'super_title_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-super-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'title_style', [
                'label' => esc_html__('Title', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'title_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-title' => 'color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'title_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-slider-title',
                ]
            );

            $this->add_responsive_control(
                'title_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'caption_description_style', [
                'label' => esc_html__('Short Description', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'caption_description_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-description' => 'color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'caption_description_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-slider-description',
                ]
            );

            $this->add_control(
                'sub_title_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-slider-description' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',[
				'label' => esc_html__( 'Button', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_group_control(
                Group_Control_Typography::get_type(),[
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-button',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),[
                    'name' => 'button_text_shadow',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-button',
                ]
            );

            $this->add_responsive_control(
                'button_padding',[
                    'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_border_radius',[
                    'label' => esc_html__( 'Border Radius', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'max' => 100,
                        ],
                        'em' => [
                            'max' => 10,
                        ],
                        'rem' => [
                            'max' => 10,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-button, {{WRAPPER}} .sparkconstructionlite-button::before' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'heading_primary_button',[
                    'type' => Controls_Manager::HEADING,
                    'label' => esc_html__( 'Primary Button', 'spark-construction-lite' ),
                    'separator' => 'before',
                ]
            );

            $this->start_controls_tabs( 'primary_button_tabs' );

                $this->start_controls_tab(
                    'normal',[
                        'label' => esc_html__( 'Normal', 'spark-construction-lite' ),
                    ]
                );

                    $this->add_control(
                        'primary_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary, {{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary .sparkconstructionlite-link-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),[
                            'name' => 'primary_background',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'primary_border_color',
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary',
                            'default' => 'none',
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'hover',[
                        'label' => esc_html__( 'Hover', 'spark-construction-lite' ),
                    ]
                );

                    $this->add_control(
                        'primary_hover_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary:hover, {{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary:hover .sparkconstructionlite-link-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),[
                            'name' => 'primary_hover_background',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary::before',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'primary_hover_border_color',
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-primary:hover',
                            'default' => 'none',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();


            $this->add_control(
                'heading_secondary_button',[
                    'type' => Controls_Manager::HEADING,
                    'label' => esc_html__( 'Secondary Button', 'spark-construction-lite' ),
                    'separator' => 'before',
                ]
            );

            $this->start_controls_tabs( 'secondary_button_tabs' );

                $this->start_controls_tab(
                    'secondary_normal',[
                        'label' => esc_html__( 'Normal', 'spark-construction-lite' ),
                    ]
                );

                    $this->add_control(
                        'secondary_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .sparkconstructionlite-button.style-white, {{WRAPPER}} .sparkconstructionlite-button.style-white .sparkconstructionlite-link-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),[
                            'name' => 'secondary_background',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.style-white',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'secondary_border_color',
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.style-white',
                            'default' => 'none',
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'secondary_hover',[
                        'label' => esc_html__( 'Hover', 'spark-construction-lite' ),
                    ]
                );

                    $this->add_control(
                        'secondary_hover_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .sparkconstructionlite-button.style-white:hover, {{WRAPPER}} .sparkconstructionlite-button.style-white:hover .sparkconstructionlite-link-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),[
                            'name' => 'secondary_hover_background',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.style-white::before',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'secondary_hover_border_color',
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.style-white:hover',
                            'default' => 'none',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_navigation',[
				'label' => esc_html__( 'Navigation', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'dots', 'both' ],
				],
			]
		);

            $this->add_control(
                'heading_style_arrows',[
                    'label' => esc_html__( 'Arrows / Image', 'spark-construction-lite' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'navigation' => [ 'arrows', 'both' ],
                    ],
                ]
            );

            $this->add_responsive_control(
                'arrows_width',[
                    'label' => esc_html__( 'Width', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 25,
                            'max' => 150,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav button[class*="owl-"]' => 'width: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'arrows_height',[
                    'label' => esc_html__( 'Height', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 25,
                            'max' => 150,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav button[class*="owl-"]' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'arrows_size',[
                    'label' => esc_html__( 'Size', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 15,
                            'max' => 150,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .nav_arrow .owl-nav button.owl-next::before, {{WRAPPER}} .nav_arrow .owl-nav button.owl-prev::before' => 'font-size: {{SIZE}}{{UNIT}}',
                    ],
                    'condition' => [
                        'nav_style_type' => 'nav_arrow',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),[
                    'name' => 'arrows_border_border',
                    'selector' => '{{WRAPPER}} .owl-nav button[class*="owl-"]',
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'arrows_bg_color',[
                    'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .owl-nav button[class*="owl-"]' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'arrows_color',[
                    'label' => esc_html__( 'Color', 'spark-construction-lite' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'condition' => [
                        'nav_style_type' => 'nav_arrow',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .nav_arrow .owl-nav button[class*="owl-"]' => 'color: {{VALUE}};'
                    ],
                ]
            );


            $this->add_control(
                'heading_style_dots',[
                    'label' => esc_html__( 'Pagination', 'spark-construction-lite' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'navigation' => [ 'dots', 'both' ],
                    ],
                ]
            );

            $this->add_responsive_control(
                'dots_width',[
                    'label' => esc_html__( 'Width', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 2,
                            'max' => 150,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'dots_height',[
                    'label' => esc_html__( 'Height', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 2,
                            'max' => 150,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'dots_size',[
                    'label' => esc_html__( 'Size', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 15,
                            'max' => 150,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .number_type .owl-dots .owl-dot' => 'font-size: {{SIZE}}{{UNIT}}',
                    ],
                    'condition' => [
                        'dots_style_type' => 'number_type',
                    ],
                ]
            );

            $this->add_control(
                'dots_border_radius',[
                    'label' => esc_html__( 'Border Radius', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'max' => 200,
                        ],
                        'em' => [
                            'max' => 20,
                        ],
                        'rem' => [
                            'max' => 20,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-dots .owl-dot' => 'border-radius: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->start_controls_tabs( 'dots_button_tabs' );

                $this->start_controls_tab(
                    'dots_normal',[
                        'label' => esc_html__( 'Normal', 'spark-construction-lite' ),
                    ]
                );

                    $this->add_control(
                        'dots_bg_color',[
                            'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_control(
                        'dots_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .owl-dots .owl-dot' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'dots_border_border',
                            'selector' => '{{WRAPPER}} .owl-dots .owl-dot',
                            'separator' => 'before',
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'dots_active',[
                        'label' => esc_html__( 'Active', 'spark-construction-lite' ),
                    ]
                );

                    $this->add_control(
                        'dots_active_bg_color',[
                            'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_control(
                        'dots_active_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .owl-dots .owl-dot.active' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'dots_active_border_border',
                            'selector' => '{{WRAPPER}} .owl-dots .owl-dot.active',
                            'separator' => 'before',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

		$this->end_controls_section();
	}

    protected function render() {
        
		$settings = $this->get_settings_for_display();

       // echo $settings['entrance_animation'];

        $params = array(
            'autoplay'  => $settings['autoplay'] == 'yes' ? true : false,
            'loop'      => $settings['infinite'] == 'yes' ? true : false,
            'easing'    => $settings['transition'],
            'mouseDrag' => $settings['pause_on_hover'] == 'yes' ? true : false,
            'pause'     => $settings['autoplay_speed'],
            'speed'     => $settings['transition_speed'],
            'nav'       => $settings['navigation'],
            'dots_type' => $settings['dots_style_type'],
            'animation' => $settings['entrance_animation'],
        );
        $params = json_encode($params);

        if ( empty( $settings['slider_block'] ) ) {
			return;
		}

        $wrapper_tag = 'div';
        $button_tag = 'a';
        $super_title_tag = Utils::validate_html_tag( $settings['slides_super_title_tag'] );
		$title_tag = Utils::validate_html_tag( $settings['slides_title_tag'] );
		$description_tag = Utils::validate_html_tag( $settings['slides_description_tag'] );

        $this->add_render_attribute('wrapper', 'class', ['sparkconstructionlite-sliders', 'sparkconstructionlite-slider-wrapper', 'owl-carousel', $settings['nav_style_type'], $settings['dots_style_type'] ] );

        $this->add_render_attribute( 'super', 'class', ['sparkconstructionlite-slider-super-title'] );

        $this->add_render_attribute( 'title', 'class', ['sparkconstructionlite-slider-title'] );

		$this->add_render_attribute( 'description', 'class', ['sparkconstructionlite-slider-description'] );

        $this->add_render_attribute( 'buttonwrapper', 'class', ['sparkconstructionlite-button-wrapper'] );

        ?>

        <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'wrapper' ); ?> data-params=<?php echo $params; ?>>
            
            <?php foreach ( $settings['slider_block'] as $index => $slide ) {  $slide_html = ''; ?>

                <div class="elementor-repeater-item-<?php echo esc_attr( $slide['_id'] ); ?> sparkconstructionlite-slider">
                    <?php
                        $bg_image_url = isset($slide['background_image']['url']) && !empty($slide['background_image']['url']) ? $slide['background_image']['url'] : Utils::get_placeholder_image_src();
                        if ( 'yes' === $slide['background_overlay'] ) {
                            $slide_html = '<div class="sparkconstructionlite-slider-bg-overlay"></div>';
                        }
                        echo $slide_html = '<div class="sparkconstructionlite-slide-bg sparkconstructionlite-ken-burns sparkconstructionlite-ken-burns--in" data-img-url="'.esc_url( $bg_image_url ).'" role="img"></div>'. $slide_html;            
                    ?>
                    <div class="sparkconstructionlite-slider-inner">
                        <div class="sparkconstructionlite-slider-caption">
                            <?php if ( ! empty( $slide['super_title'] ) ) : ?>
                                <<?php Utils::print_validated_html_tag( $super_title_tag ); ?> <?php $this->print_render_attribute_string( 'super' ); ?>>
                                    <?php echo esc_html($slide['super_title']); ?>
                                </<?php Utils::print_validated_html_tag( $super_title_tag ); ?>>
                            <?php endif; ?>

                            <?php if ( ! empty( $slide['slider_title'] ) ) : ?>
                                <<?php Utils::print_validated_html_tag( $title_tag ); ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
                                    <?php echo esc_html($slide['slider_title']); ?>
                                </<?php Utils::print_validated_html_tag( $title_tag ); ?>>
                            <?php endif; ?>

                            <?php if ( ! empty( $slide['slider_description'] ) ) : ?>
                                <<?php Utils::print_validated_html_tag( $description_tag ); ?> <?php $this->print_render_attribute_string( 'description' ); ?>>
                                    <?php echo esc_html($slide['slider_description']); ?>
                                </<?php Utils::print_validated_html_tag( $description_tag ); ?>>
                            <?php endif; ?>

                            <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'buttonwrapper' ); ?>>
                                <?php
                                    if ( ! empty( $slide['slider_button_link']['url'] ) ) {
                                        $this->add_link_attributes( "link_{$index}", $slide['slider_button_link'] );
                                        $this->add_render_attribute( "link_{$index}", 'class', ['sparkconstructionlite-button','sparkconstructionlite-button-primary'] );
                                ?>
                                    <<?php Utils::print_validated_html_tag( $button_tag ); ?> <?php $this->print_render_attribute_string( "link_{$index}" ); ?>>
                                        <?php echo esc_html($slide['slider_button_text']); ?>
                                        <span class="sparkconstructionlite-link-icon elementor-icon">
                                            <?php Icons_Manager::render_icon($slide['first_link_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    </<?php Utils::print_unescaped_internal_string( $button_tag ); ?>>

                                <?php } ?>

                                <?php
                                    if ( ! empty( $slide['slider_button_one_link']['url'] ) ) {
                                        $this->add_link_attributes( "link_one_{$index}", $slide['slider_button_one_link'] );
                                        $this->add_render_attribute( "link_one_{$index}", 'class', ['sparkconstructionlite-button','style-white'] );
                                ?>
                                    <<?php Utils::print_validated_html_tag( $button_tag ); ?> <?php $this->print_render_attribute_string( "link_one_{$index}" ); ?>>
                                        <?php echo esc_html($slide['slider_button_one_text']); ?>
                                        <span class="sparkconstructionlite-link-icon elementor-icon">
                                            <?php Icons_Manager::render_icon($slide['second_link_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    </<?php Utils::print_unescaped_internal_string( $button_tag ); ?>>

                                <?php } ?>
                            </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>

		<?php
	}

}
