<?php

namespace SparkConstructionLiteElements\Modules\HighlightBlock\Widgets;

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

class HighlightBlock extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-highlight-block';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Highlight Service Block', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_keywords() {
		return [ 'Highlight', 'Service', 'block' ];
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

            $this->add_control(
                'layout', [
                    'label' => esc_html__('Layout', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'spark-construction-lite'),
                        'style3' => esc_html__('Style 2', 'spark-construction-lite'),
                    ],
                ]
            );

            $this->add_control(
                'custom_height', [
                    'label' => esc_html__('Custom Image Height', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                ]
            );

            $this->add_responsive_control(
                'image_height', [
                    'label' => esc_html__('Image Height', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 200,
                            'max' => 650,
                            'step' => 10
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 375,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-item img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'custom_height' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'icon', [
                    'label' => esc_html__('Icon', 'spark-construction-lite'),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fab fa-artstation',
                        'library' => 'solid',
                    ],
                ]
            );

            $this->add_control(
                'image',[
                    'label' => esc_html__( 'Choose Image', 'spark-construction-lite' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),[
                    'name' => 'graphic_image', // Actually its `image_size`
                    'default' => 'full',
                    'exclude' => ['custom'],
                    'condition' => [
                        'image[id]!' => '',
                    ],
                ]
            );

            $this->add_control(
                'title', [
                    'label' => esc_html__('Title', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__('Enter your title here', 'spark-construction-lite'),
                    'default' => esc_html__('Highlight Service Title', 'spark-construction-lite')
                ]
            );

            $this->add_control(
                'content', [
                    'label' => esc_html__('Content', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => esc_html__('Type your description here', 'spark-construction-lite'),
                    'default' => esc_html__('End your search here! Unlock Our Premium Themes to launch your website. All themes are user-friendly and fully customizable.', 'spark-construction-lite'),
                ]
            );

            $this->add_control(
                'link_text', [
                    'label' => esc_html__('Button Text', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => esc_html__('Enter the button text here', 'spark-construction-lite'),
                    'default' => esc_html__('Read More', 'spark-construction-lite')
                ]
            );

            $this->add_control(
                'link', [
                    'label' => esc_html__('Button Link', 'spark-construction-lite'),
                    'type' => Controls_Manager::URL,
                    'placeholder' => esc_html__('Enter URL', 'spark-construction-lite'),
                    'show_external' => true,
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                ]
            );

            $this->add_control(
                'link_icon',[
                    'label' => esc_html__( 'Link Icon', 'spark-construction-lite' ),
                    'type' => Controls_Manager::ICONS,
                    'skin' => 'inline',
                    'label_block' => false,
                    'default' => [
                        'library' => '',
                        'value' => '',
                    ],
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
                        'link[url]!' => '',
                        'link_text!' => '',
                    ],
                ]
            );

            $this->add_control(
                'title_html_tag', [
                    'label' => esc_html__('Title HTML Tag', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => 'h3',
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

        //(style)
        $this->start_controls_section(
            'general_styles', [
                'label' => esc_html__('General', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'front_view_bg_color', [
                    'label' => esc_html__('Overlay Background Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'condition' => ['layout' => ['style1', 'style3']],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area.style1 .sparkconstructionlite-highlight-item .sparkconstructionlite-top-content-wrap, {{WRAPPER}} .sparkconstructionlite-highlight-area.style3 .sparkconstructionlite-highlight-item::after' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'back_view_bg_color', [
                    'label' => esc_html__('Back View Overlay Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'condition' => ['layout' => ['style1', 'style3']],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area.style1 .sparkconstructionlite-highlight-item .sparkconstructionlite-bottom-content-wrap, {{WRAPPER}} .sparkconstructionlite-highlight-area.style3 .sparkconstructionlite-highlight-item .sparkconstructionlite-top-content-wrap, {{WRAPPER}} .sparkconstructionlite-highlight-area.style3 .sparkconstructionlite-highlight-item .sparkconstructionlite-bottom-content-wrap' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_responsive_control(
                'text_align',[
                    'label' => esc_html__( 'Alignment', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'center',
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
                        '{{WRAPPER}} .sparkconstructionlite-top-content-wrap, {{WRAPPER}} .sparkconstructionlite-bottom-content-wrap' => 'text-align: {{VALUE}}; align-items: {{VALUE}};'
                    ],
                ]
            );

            $this->add_responsive_control(
                'item_space',[
                    'label' => esc_html__( 'Content Spacing', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 16,
                        'unit' => 'px',
                    ],
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
                        '{{WRAPPER}} .sparkconstructionlite-top-content-wrap' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styles', [
                'label' => esc_html__('Icon', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'icon_bg_color', [
                    'label' => esc_html__('Background Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'condition' => ['layout' => ['style1']],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-icon-box' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'icon_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-icon-box i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-icon-box svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'icon_size',[
                    'label' => esc_html__( 'Icon Size', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 150,
                            'step' => 1,
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
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-icon-box' => 'font-size:{{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}}; width:{{SIZE}}{{UNIT}};'
                    ],
                ]
            );

            $this->add_responsive_control(
                'icon_padding',[
                    'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'condition' => ['layout' => ['style1']],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'icon_radius',[
                    'label' => esc_html__( 'Radius', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ '%', 'px', 'em', 'rem', 'vw', 'custom' ],
                    'condition' => ['layout' => ['style1']],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} / {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_styles', [
                'label' => esc_html__('Title', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'title_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-title' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-title a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'title_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-title',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Stroke::get_type(),[
                    'name' => 'text_stroke',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-title',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),[
                    'name' => 'title_shadow',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-title',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'excerpt_styles', [
                'label' => esc_html__('Content', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'excerpt_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-excerpt' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'excerpt_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-highlight-area .sparkconstructionlite-highlight-excerpt',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'content_button',[
				'label' => esc_html__( 'Button (Read More)', 'spark-construction-lite' ),
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
                        '{{WRAPPER}} .sparkconstructionlite-button' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                        'button_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .sparkconstructionlite-button, {{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-noborder .sparkconstructionlite-link-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),[
                            'name' => 'button_background',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'button_border_color',
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button',
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
                        'button_hover_text_color',[
                            'label' => esc_html__( 'Text Color', 'spark-construction-lite' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .sparkconstructionlite-button:hover, {{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-noborder:hover .sparkconstructionlite-link-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),[
                            'name' => 'button_hover_background',
                            'types' => [ 'classic', 'gradient' ],
                            'exclude' => [ 'image' ],
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button.sparkconstructionlite-button-noborder::before',
                            'fields_options' => [
                                'background' => [
                                    'default' => 'classic',
                                ],
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),[
                            'name' => 'button_hover_border_color',
                            'selector' => '{{WRAPPER}} .sparkconstructionlite-button:hover',
                            'default' => 'none',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

		$this->end_controls_section();

    }

    /** Render Layout */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $layout = $settings['layout'];

        $wrapper_tag = 'div';
        $button_tag = 'a';
        $this->add_link_attributes( "link", $settings['link'] );
        $this->add_link_attributes( "button", $settings['link'] );

        $image_id = $settings['image']['id'];
        $custom_height_class = $settings['custom_height'] == 'yes' ? 'sparkconstructionlite-custom-height' : '';

        $this->add_render_attribute('wrapper', 'class', [
                'sparkconstructionlite-highlight-area',
                $layout,
                $custom_height_class
            ]
        );
        $this->add_render_attribute( 'title', 'class', ['sparkconstructionlite-highlight-title'] );
        $this->add_render_attribute( 'description', 'class', ['sparkconstructionlite-highlight-excerpt'] );
        $this->add_render_attribute( 'button_wrap', 'class', ['sparkconstructionlite-button-wrap'] );
        $this->add_render_attribute( 'button', 'class', ['sparkconstructionlite-button','sparkconstructionlite-button-noborder'] );
        ?>
        <div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
            <div class="sparkconstructionlite-highlight-item">
                <?php
                    $image_url = Group_Control_Image_Size::get_attachment_image_src($image_id, 'graphic_image', $settings);
                    if (!$image_url) {
                        $image_url = Utils::get_placeholder_image_src();
                    }
                ?>
                <div class="highlight-image">
                    <?php Group_Control_Image_Size::print_attachment_image_html( $settings, 'image' ); ?>
                </div>
                <div class="bottom-content">
                    <?php if( !empty( $layout ) && $layout != 'style4' ){ ?>
                        <div class="sparkconstructionlite-top-content-wrap">
                            <?php if (!empty( $settings['icon']['value'] ) ) : ?>
                                <div class="sparkconstructionlite-icon-box elementor-icon">
                                    <?php Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <<?php echo $settings['title_html_tag']; ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
                                <<?php Utils::print_validated_html_tag( $button_tag ); ?> <?php $this->print_render_attribute_string( "link" ); ?>>
                                    <?php echo esc_html($settings['title']); ?>
                                </<?php Utils::print_unescaped_internal_string( $button_tag ); ?>>
                            </<?php echo $settings['title_html_tag']; ?>>

                            <?php if( !empty( $layout ) && $layout != 'style3' ){ ?>
                                <div <?php $this->print_render_attribute_string( 'description' ); ?>>
                                    <?php echo wp_kses_post( $settings['content'] ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="sparkconstructionlite-bottom-content-wrap">
                        <<?php echo $settings['title_html_tag']; ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
                            <<?php Utils::print_validated_html_tag( $button_tag ); ?> <?php $this->print_render_attribute_string( "link" ); ?>>
                                <?php echo esc_html($settings['title']); ?>
                            </<?php Utils::print_unescaped_internal_string( $button_tag ); ?>>
                        </<?php echo $settings['title_html_tag']; ?>>
                        
                        <?php if ( ! empty( $settings['content'] ) ){ ?>
                            <div <?php $this->print_render_attribute_string( 'description' ); ?>>
                                <?php echo wp_kses_post( $settings['content'] ); ?>
                            </div>
                        <?php } ?>

                        <?php if ( !empty( $settings['link_text'] ) ||  !empty($settings['link'] )) { ?>
                            <div <?php $this->print_render_attribute_string( 'button_wrap' ); ?>>
                                <<?php Utils::print_validated_html_tag( $button_tag ); ?> <?php $this->print_render_attribute_string( "button" ); ?>>
                                    <?php echo esc_html($settings['link_text']); ?>
                                    <span class="sparkconstructionlite-link-icon elementor-icon">
                                        <?php 
                                            if (!empty($settings['link_icon']['value'])) {
                                                Icons_Manager::render_icon($settings['link_icon'], ['aria-hidden' => 'true']);
                                            } else {
                                                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="default-icon"><path d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z"/></svg>';
                                            }
                                        ?>
                                    </span>
                                </<?php Utils::print_unescaped_internal_string( $button_tag ); ?>>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}
