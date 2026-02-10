<?php

namespace SparkConstructionLiteElements\Modules\TestimonialBlock\Widgets;

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

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TestimonialBlock extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-testimonial-block';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Testimonial Block', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_keywords() {
		return [ 'testimonial', 'block', 'client', 'review', 'feedback' ];
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
            'section_content', [
                'label' => esc_html__('Content', 'spark-construction-lite'),
            ]
        );

            $this->add_control(
                'layout', [
                    'label' => esc_html__('Testimonial Style', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'label_block' => true,
                    'options' => [
                        'style1' => esc_html__('Style 1', 'spark-construction-lite'),
                        'style2' => esc_html__('Style 2', 'spark-construction-lite'),
                        'style6' => esc_html__('Style 3', 'spark-construction-lite'),
                    ],
                ]
            );

            $this->add_responsive_control(
                'imageheight', [
                    'label' => esc_html__('Image Height', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 320,
                            'max' => 750,
                            'step' => 10
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => '400',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style6 .sparkconstructionlite-testimonial-top-content img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'layout!' => ['style1','style2'],
                    ],
                ]
            );

            $this->add_control(
                'image', [
                    'label' => esc_html__('Choose Image', 'spark-construction-lite'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
                    'name' => 'thumb',
                    'exclude' => ['custom'],
                    'include' => [],
                    'default' => 'full',
                    'condition' => [
                        'image[id]!' => '',
                    ],
                ]
            );

            $this->add_control(
                'name', [
                    'label' => esc_html__('Name', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Alina Lora', 'spark-construction-lite'),
                ]
            );

            $this->add_control(
                'designation', [
                    'label' => esc_html__('Designation', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Support Engineer', 'spark-construction-lite'),
                ]
            );

            $this->add_control(
                'content', [
                    'label' => esc_html__('Testimonial', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 6,
                    'default' => esc_html__('End your search here! Unlock Our Premium Themes to launch your website. All themes are user-friendly and fully customizable.', 'spark-construction-lite'),
                ]
            );

            $this->add_control(
                'rating_star',[
                    'label' => esc_html__( 'Display Rating Star', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'spark-construction-lite' ),
                    'label_off' => esc_html__( 'Hide', 'spark-construction-lite' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'rating', [
                    'label' => esc_html__('Number of Star', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['star'],
                    'range' => [
                        'star' => [
                            'min' => 1,
                            'max' => 5,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'unit' => 'star',
                        'size' => 5,
                    ],
                    'condition' => [
                        'rating_star' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'quote',[
                    'label' => esc_html__( 'Display Quote Icon', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'spark-construction-lite' ),
                    'label_off' => esc_html__( 'Hide', 'spark-construction-lite' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => ['layout' => ['style2']],
                ]
            );

            $this->add_control(
                'quote_icon',[
                    'label' => esc_html__( 'Icon', 'spark-construction-lite' ),
                    'type' => Controls_Manager::ICONS,
                    'skin' => 'inline',
                    'default' => [
                        'value' => 'fas fa-quote-left',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'quote' => 'yes',
                        'layout' => ['style2']
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings', [
                'label' => esc_html__('Settings', 'spark-construction-lite'),
            ]
        );

        $this->add_control(
            'title_html_tag', [
                'label' => esc_html__('Title HTML Tag', 'spark-construction-lite'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h3',
                'label_block' => true,
                'options' => [
                    'h1' => esc_html__('H1', 'spark-construction-lite'),
                    'h2' => esc_html__('H2', 'spark-construction-lite'),
                    'h3' => esc_html__('H3', 'spark-construction-lite'),
                    'h4' => esc_html__('H4', 'spark-construction-lite'),
                    'h5' => esc_html__('H5', 'spark-construction-lite'),
                    'h6' => esc_html__('H6', 'spark-construction-lite'),
                    'div' => esc_html__('div', 'spark-construction-lite'),
                    'span' => esc_html__('span', 'spark-construction-lite'),
                    'p' => esc_html__('p', 'spark-construction-lite')
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'general_style', [
                'label' => esc_html__('General Styles', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'bg_color', [
                    'label' => esc_html__('Backgrond Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style6 .sparkconstructionlite-testimonial-buttom-content' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),[
                    'name' => 'bg_border',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper',
                    'default' => 'none',
                ]
            );

            $this->add_responsive_control(
                'layout_position',[
                    'label' => esc_html__( 'Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'above',
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'above' => [
                            'title' => esc_html__( 'Above', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                        'below' => [
                            'title' => esc_html__( 'Below', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'selectors_dictionary' => [
                        'above' => 'flex-direction: column;',
                        'below' => 'flex-direction: column-reverse;',
                        'left' => 'flex-direction: row;',
                        'right' => 'flex-direction: row-reverse;',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper' => '{{VALUE}}',
                    ],
                    'condition' => [
                        'layout' => ['style1'],
                    ]
                ]
            );

            $this->add_control(
                'layout2_position',[
                    'label' => esc_html__( 'Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'above',
                    'options' => [
                        'above' => [
                            'title' => esc_html__( 'Above', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'below' => [
                            'title' => esc_html__( 'Below', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'render_type' => 'template',
                    'prefix_class' => 'sparkconstructionlite-testimonial-layout-',
                    'condition' => [
                        'layout' => ['style2'],
                    ]
                ]
            );

            $this->add_responsive_control(
                'content_vertical_alignment',[
                    'label' => esc_html__( 'Vertical Alignment', 'spark-construction-lite' ),
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
                    //'default' => 'middle',
                    'toggle' => false,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1' => 'align-items:{{VALUE}};',
                    ],
                    'selectors_dictionary' => [
                        'top' => 'flex-start',
                        'middle' => 'center',
                        'bottom' => 'flex-end',
                    ],
                    'conditions' => [
                        'relation' => 'and',
                        'terms' => [
                            [
                                'name' => 'layout',
                                'operator' => '==',
                                'value' => 'style1',
                            ],
                            [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'name' => 'layout_position',
                                        'operator' => '==',
                                        'value' => 'left',
                                    ],
                                    [
                                        'name' => 'layout_position',
                                        'operator' => '==',
                                        'value' => 'right',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            );

            $this->add_responsive_control(
                'text_align',[
                    'label' => esc_html__( 'Alignment', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    //'default' => 'center',
                    'options' => [
                        'start' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'spark-construction-lite' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'end' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper, {{WRAPPER}} .sparkconstructionlite-testimonial-buttom-content' => 'align-items: {{VALUE}}; text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'item_space',[
                    'label' => esc_html__( 'Content Spacing', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'max' => 100,
                        ],
                        'em' => [
                            'min' => 0,
                            'max' => 10,
                        ],
                        'rem' => [
                            'min' => 0,
                            'max' => 10,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-buttom-content' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'padding', [
                    'label' => esc_html__('Padding', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style2,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style6 .sparkconstructionlite-testimonial-buttom-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'radius', [
                    'label' => esc_html__('Radius', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),[
                    'name' => 'box_shadow',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper',
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(

            'name_style', [
                'label' => esc_html__('Name', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'name_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-title' => 'color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'name_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-title',
                ]
            );

            $this->add_responsive_control(
                'name_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Stroke::get_type(),[
                    'name' => 'text_stroke',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-title',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),[
                    'name' => 'title_shadow',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-title',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'designation_style', [
                'label' => esc_html__('Designation', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'designation_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-designation' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'designation_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-designation',
                ]
            );

            $this->add_responsive_control(
                'designation_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-designation' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Stroke::get_type(),[
                    'name' => 'designation_stroke',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-designation',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style', [
                'label' => esc_html__('Content', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'content_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-description' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'content_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-description',
                ]
            );

            $this->add_responsive_control(
                'content_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-description' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'rating_style', [
                'label' => esc_html__('Rating Star', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'rating_size', [
                    'label' => esc_html__('Rating Icon Size', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 300,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 18,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-rating i' => 'font-size: {{SIZE}}{{UNIT}};'
                    ],
                ]
            );

            $this->add_control(
                'rating_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-rating i' => 'color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'image_style', [
                'label' => esc_html__('Image', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => ['style1','style2'],
                ]
            ]
        );

            $this->add_responsive_control(
                'image_width', [
                    'label' => esc_html__( 'Width', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        '%' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                        'px' => [
                            'min' => 1,
                            'max' => 800,
                        ],
                        'vw' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1 .sparkconstructionlite-testimonial-img img,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style2 .sparkconstructionlite-testimonial-img img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'image_height', [
                    'label' => esc_html__( 'Height', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
                    'range' => [
                        '%' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                        'px' => [
                            'min' => 1,
                            'max' => 800,
                        ],
                        'vw' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1 .sparkconstructionlite-testimonial-img img,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style2 .sparkconstructionlite-testimonial-img img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),[
                    'name' => 'image_border',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1 .sparkconstructionlite-testimonial-img img,
                    {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style2 .sparkconstructionlite-testimonial-img img',
                    'default' => 'none',
                ]
            );

            $this->add_responsive_control(
                'image_padding', [
                    'label' => esc_html__('Padding', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1 .sparkconstructionlite-testimonial-img img,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style2 .sparkconstructionlite-testimonial-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'image_radius', [
                    'label' => esc_html__('Radius', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style1 .sparkconstructionlite-testimonial-img img,
                        {{WRAPPER}} .sparkconstructionlite-testimonial-wrapper.style2 .sparkconstructionlite-testimonial-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'quoteicon', [
                'label' => esc_html__('Quote Icon', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout!' => ['style1', 'style6'],
                ]
            ]
        );

            $this->add_responsive_control(
                'icon_size', [
                    'label' => esc_html__('Icon Size', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 300,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 35,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-quote-icon .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};'
                    ],
                ]
            );

            $this->add_responsive_control(
                'icon_rotate',[
                    'label' => esc_html__( 'Rotate', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'deg', 'grad', 'rad', 'turn', 'custom' ],
                    'default' => [
                        'unit' => 'deg',
                    ],
                    'tablet_default' => [
                        'unit' => 'deg',
                    ],
                    'mobile_default' => [
                        'unit' => 'deg',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-quote-icon .elementor-icon' => 'transform: rotate({{SIZE}}{{UNIT}});',
                    ],
                ]
            );

            $this->add_control(
                'quote_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-quote-icon .elementor-icon' => 'color: {{VALUE}}; fill: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $wrapper_tag = 'div';
        $title_tag = Utils::validate_html_tag( $settings['title_html_tag'] );

        $this->add_render_attribute('wrapper', 'class', [
                'sparkconstructionlite-testimonial-wrapper',
                $settings['layout'],
            ]
        );

        $this->add_render_attribute( 'top_content', 'class', ['sparkconstructionlite-testimonial-top-content'] );
        $this->add_render_attribute( 'buttom_content', 'class', ['sparkconstructionlite-testimonial-buttom-content'] );
        $this->add_render_attribute( 'image_wrap', 'class', ['sparkconstructionlite-testimonial-img'] );
        $this->add_render_attribute( 'title', 'class', ['sparkconstructionlite-testimonial-title'] );
        $this->add_render_attribute( 'designation', 'class', ['sparkconstructionlite-testimonial-designation'] );
        $this->add_render_attribute( 'description', 'class', ['sparkconstructionlite-testimonial-description'] );
        $this->add_render_attribute( 'rating', 'class', ['sparkconstructionlite-testimonial-rating'] );

        ?>

        <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
            <?php if( !empty( $settings['layout'] ) &&  $settings['layout'] =='style2' ): ?>
                <div <?php $this->print_render_attribute_string( 'top_content' ); ?>>
                    <?php if ( ! empty( $settings['content'] ) ) : ?>
                        <div <?php $this->print_render_attribute_string( 'description' ); ?>>
                            <?php $this->print_unescaped_setting( 'content' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div <?php $this->print_render_attribute_string( 'buttom_content' ); ?>>
                    <div class="sparkconstructionlite-testimonial-box-wrap">
                        <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'image_wrap' ); ?>>
                            <?php Group_Control_Image_Size::print_attachment_image_html($settings, 'thumb', 'image'); ?>
                        </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>
                        <div class="sparkconstructionlite-testimonial-title-wrap">
                            <?php if ( ! empty( $settings['name'] ) ) : ?>
                                <<?php Utils::print_validated_html_tag( $title_tag ); ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
                                    <?php $this->print_unescaped_setting( 'name' ); ?>
                                </<?php Utils::print_validated_html_tag( $title_tag ); ?>>
                            <?php endif; ?>
                            <?php if ( ! empty( $settings['designation'] ) ) : ?>
                                <div <?php $this->print_render_attribute_string( 'designation' ); ?>>
                                    <?php $this->print_unescaped_setting( 'designation' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if( !empty( $settings['quote'] ) && $settings['quote'] = 'yes' ){ ?>
                            <div class="ikthemes-quote-icon">
                                <div class="elementor-icon">
                                    <?php Icons_Manager::render_icon($settings['quote_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if( !empty( $settings['rating_star'] ) && $settings['rating_star'] = 'yes' ): ?>
                        <div <?php $this->print_render_attribute_string( 'rating' ); ?>>
                            <?php foreach( range( 1, intval( $settings['rating']['size'] )) as $index ): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'top_content' ); ?>>
                    <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'image_wrap' ); ?>>
                        <?php Group_Control_Image_Size::print_attachment_image_html($settings, 'thumb', 'image'); ?>
                    </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>
                </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>

                <div <?php $this->print_render_attribute_string( 'buttom_content' ); ?>>
                    
                    <?php if( $settings['layout'] &&  $settings['layout'] =='style6'){ if( !empty( $settings['quote'] ) && $settings['quote'] = 'yes' ){ ?>
                        <div class="ikthemes-quote-icon">
                            <div class="elementor-icon">
                                <?php Icons_Manager::render_icon($settings['quote_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                        </div>
                    <?php } } ?>
                    
                    <div class="sparkconstructionlite-testimonial-title-wrap">
                        <?php if ( ! empty( $settings['name'] ) ) : ?>
                            <<?php Utils::print_validated_html_tag( $title_tag ); ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
                                <?php $this->print_unescaped_setting( 'name' ); ?>
                            </<?php Utils::print_validated_html_tag( $title_tag ); ?>>
                        <?php endif; ?>

                        <?php if ( ! empty( $settings['designation'] ) ) : ?>
                            <div <?php $this->print_render_attribute_string( 'designation' ); ?>>
                                <?php $this->print_unescaped_setting( 'designation' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( ! empty( $settings['content'] ) ) : ?>
                        <div <?php $this->print_render_attribute_string( 'description' ); ?>>
                            <?php $this->print_unescaped_setting( 'content' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if( !empty( $settings['rating_star'] ) && $settings['rating_star'] = 'yes' ): ?>
                        <div <?php $this->print_render_attribute_string( 'rating' ); ?>>
                            <?php foreach( range( 1, intval( $settings['rating']['size'] )) as $index ): ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>

        <?php
    }

}
