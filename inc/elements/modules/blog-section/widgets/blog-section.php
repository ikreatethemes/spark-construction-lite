<?php

namespace SparkConstructionLiteElements\Modules\BlogSection\Widgets;

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

class BlogSection extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-blog-section';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Blog Section', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_keywords() {
		return [ 'blog', 'artical', 'post' ];
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
                    'label' => esc_html__('Layout', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'spark-construction-lite'),
                        'style2' => esc_html__('Style 2', 'spark-construction-lite'),
                    ],
                ]
            );

            $this->add_responsive_control(
                'column_count', [
                    'label' => esc_html__('Number of Column', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'step' => 1,
                            'max' => 6,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 3,
                    ],
                    'tablet_default' => [
                        'unit' => 'px',
                        'size' => 2,
                    ],
                    'mobile_default' => [
                        'unit' => 'px',
                        'size' => 1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-wrap' => 'grid-template-columns: repeat({{SIZE}}, 1fr);',
                    ]
                ]
                
            );

            $this->add_responsive_control(
                'blog_gap', [
                    'label' => esc_html__('Block Gap', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['rem','px','%'],
                    'range' => [
                        'rem' => [
                            'min' => 0,
                            'max' => 10,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'unit' => 'rem',
                        'size' => 1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-wrap' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'post_count', [
                    'label' => esc_html__('Display Number of Posts', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 20,
                        ],
                    ],
                    'default' => [
                        'size' => 6,
                        'unit' => 'px',
                    ]
                ]
            );

            $this->add_control(
                'excerpt_length', [
                    'label' => esc_html__('Excerpt Length (In Character)', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['s'],
                    'range' => [
                        's' => [
                            'min' => 0,
                            'step' => 1,
                            'max' => 1000,
                        ],
                    ],
                    'default' => [
                        'size' => 20,
                        'unit' => 's',
                    ],
                    'condition' => ['layout' => ['style1']],
                ]
            );

            $this->add_control(
                'exclude_cats', [
                    'label' => esc_html__('Exclude Category', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => $this->get_category()
                ]
            );

            $this->add_control(
                'display_date', [
                    'label' => esc_html__('Display Post Meta Date', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'display_author', [
                    'label' => esc_html__('Display Post Author', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'display_comment_count', [
                    'label' => esc_html__('Display Comment Count', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'display_reading_time', [
                    'label' => esc_html__('Post Reading Time', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'readmore_text', [
                    'label' => esc_html__('Read More (Button Text)', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Read More', 'spark-construction-lite'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'readmore_icon',[
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
                        'readmore_text!' => '',
                    ],
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

            $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
                    'name' => 'thumb',
                    'exclude' => ['custom'],
                    'include' => [],
                    'default' => 'full',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'genral_style', [
                'label' => esc_html__('General Style', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'blog_post_position', [
                    'label' => esc_html__( 'Image Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'before' => [
                            'title' => esc_html__( 'Before', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'after' => [
                            'title' => esc_html__( 'After', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                        'start' => [
                            'title' => esc_html__( 'Start', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'end' => [
                            'title' => esc_html__( 'End', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'selectors_dictionary' => [
                        'before' => 'flex-direction: column;',
                        'after' => 'flex-direction: column-reverse;',
                        'start' => 'flex-direction: row;',
                        'end' => 'flex-direction: row-reverse;',
                    ],
                    'prefix_class' => 'sparkconstructionlite-blog-layout-',
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-item' => '{{VALUE}}',
                    ],
                    'condition' => ['layout' => ['style1']],
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
                    'default' => 'middle',
                    'toggle' => false,
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-box-content' => 'justify-content:{{VALUE}};',
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
                                        'name' => 'blog_post_position',
                                        'operator' => '==',
                                        'value' => 'start',
                                    ],
                                    [
                                        'name' => 'blog_post_position',
                                        'operator' => '==',
                                        'value' => 'end',
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
                        '{{WRAPPER}} .ikthemes-box-content' => 'text-align: {{VALUE}};',
                        '{{WRAPPER}} .ikthemes-entry-meta' => 'justify-content: {{VALUE}};',
                        '{{WRAPPER}} .ikthemes-blog-wrap.style2 .ikthemes-box-content' => 'align-items: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_image_height', [
                    'label' => esc_html__('Image Height', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 200,
                            'max' => 1250,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 350,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-post-thumbnail' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'blog_image_width', [
                    'label' => esc_html__('Image Width(%)', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['%'],
                    'range' => [
                        '%' => [
                            'min' => 30,
                            'max' => 50,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-post-thumbnail' => 'max-width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .ikthemes-blog-post-thumbnail' => 'min-width: {{SIZE}}{{UNIT}};',
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
                                        'name' => 'blog_post_position',
                                        'operator' => '==',
                                        'value' => 'start',
                                    ],
                                    [
                                        'name' => 'blog_post_position',
                                        'operator' => '==',
                                        'value' => 'end',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'genral_bg_color', [
                    'label' => esc_html__('Background Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .style1 .ikthemes-blog-item' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .ikthemes-blog-wrap.style2 .ikthemes-box-content' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'genral_padding', [
                    'label' => esc_html__('Padding', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'genral_radius', [
                    'label' => esc_html__('Radius', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),[
                    'name' => 'genral_shadow',
                    'selector' => '{{WRAPPER}} .ikthemes-blog-item',
                    'condition' => ['layout' => ['style1']],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style', [
                'label' => esc_html__('Title', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'title_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .ikthemes-blog-title',
                ]
            );

            $this->add_responsive_control(
                'title_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Stroke::get_type(),[
                    'name' => 'text_stroke',
                    'selector' => '{{WRAPPER}} .ikthemes-blog-title',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),[
                    'name' => 'title_shadow',
                    'selector' => '{{WRAPPER}} .ikthemes-blog-title',
                ]
            );

            $this->start_controls_tabs( 'title_style_tabs' );

                $this->start_controls_tab(
                    'title_normal_tab', [
                        'label' => esc_html__('Normal', 'spark-construction-lite'),
                    ]
                );

                    $this->add_control(
                        'title_color', [
                            'label' => esc_html__('Color', 'spark-construction-lite'),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ikthemes-blog-title a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'title_hover_tab', [
                        'label' => esc_html__('Hover', 'spark-construction-lite'),
                    ]
                );

                    $this->add_control(
                        'title_hover_color', [
                            'label' => esc_html__('Hover Color', 'spark-construction-lite'),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ikthemes-blog-title a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'content_style', [
                'label' => esc_html__('Content', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['layout' => ['style1']]
            ]
        );

            $this->add_control(
                'content_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-desc' => 'color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'content_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .ikthemes-blog-desc',
                ]
            );

            $this->add_control(
                'content_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-blog-desc' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_meta_style', [
                'label' => esc_html__('Post Metas (Author, Comment)', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs('post_meta_style_tabs' );

                $this->start_controls_tab(
                    'post_meta_normal_tab', [
                        'label' => esc_html__('Normal', 'spark-construction-lite'),
                    ]
                );

                    $this->add_control(
                        'post_meta_color', [
                            'label' => esc_html__('Color', 'spark-construction-lite'),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ikthemes-entry-meta, {{WRAPPER}} .ikthemes-entry-meta a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'post_meta_hover_tab', [
                        'label' => esc_html__('Hover', 'spark-construction-lite'),
                    ]
                );

                    $this->add_control(
                        'post_meta_hover_color', [
                            'label' => esc_html__('Hover Color', 'spark-construction-lite'),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ikthemes-entry-meta a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_group_control(
                Group_Control_Border::get_type(),[
                    'name' => 'post_meta_border',
                    'selector' => '{{WRAPPER}} .ikthemes-entry-meta .avatar',
                    'label' => esc_html__('Author Avatar', 'spark-construction-lite'),
                    'default' => 'none',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'post_meta_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .ikthemes-entry-meta',
                ]
            );

            $this->add_responsive_control(
                'post_meta_margin', [
                    'label' => esc_html__('Margin', 'spark-construction-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'allowed_dimensions' => 'vertical',
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-entry-meta' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'item_space',[
                    'label' => esc_html__( 'Spacing', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 8,
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
                        '{{WRAPPER}} .ikthemes-entry-meta' => 'gap: 0 {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'date_style', [
                'label' => esc_html__('Post Date', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['layout' => ['style1']]
            ]
        );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'date_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .ikthemes-article-date',
                ]
            );

            $this->add_control(
                'date_bg', [
                    'label' => esc_html__('Background Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-article-date' => 'background-color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_control(
                'date_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-article-date' => 'color: {{VALUE}}',
                    ],
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

        $wrapper_tag = 'div';
        $this->add_render_attribute('wrapper', 'class', [
                'ikthemes-blog-wrap',
                $settings['layout'],
            ]
        );
       
        ?>
        <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
            <?php
                if ($settings['layout'] == 'style1') {
                    
                    $this->get_blog_style1();

                } elseif ($settings['layout'] == 'style2') {

                    $this->get_blog_style2();

                }
            ?>
        </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>
        <?php
    }

    protected function get_blog_style1() {

        $settings = $this->get_settings_for_display();

        $excerpt_count = $settings['excerpt_length']['size'];

        $args = array(
            'posts_per_page' => $settings['post_count']['size'],
            'category__not_in' => $settings['exclude_cats'],
            'ignore_sticky_posts' => 1,
        );

        $query = new \WP_Query($args);

        if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('ikthemes-blog-item article'); ?>>
                <div class="ikthemes-blog-post-thumbnail">
                    <a class="ikthemes-post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                        <?php
                            echo $this->get_image_html(get_post_thumbnail_id());
                        ?>
                        <?php if( !empty( $settings['display_date'] ) && $settings['display_date'] == 'yes' ) { ?>
                            <span class="ikthemes-article-date"><?php echo get_the_date( "d M Y" ); ?></span>
                        <?php } ?>
                    </a>
                </div>
                <div class="ikthemes-box-content">
                    <<?php echo $settings['title_html_tag']; ?> class="ikthemes-blog-title">
                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </<?php echo $settings['title_html_tag']; ?>>
                    <?php 
                        if ( 'post' === get_post_type() ){ 
                            $this-> sparkconstructionlite_themes_post_meta();
                        }  
                    ?>
                    <div class="ikthemes-blog-desc">
                        <?php echo wp_trim_words( get_the_content(), $excerpt_count ); ?>
                    </div>
                    <?php $this->get_readmore_link(); ?>
                </div>
            </article>

        <?php } } wp_reset_postdata();
    }

    protected function get_blog_style2() {

        $settings = $this->get_settings_for_display();

        $args = array(
            'posts_per_page' => $settings['post_count']['size'],
            'category__not_in' => $settings['exclude_cats'],
            'ignore_sticky_posts' => 1,
        );

        $query = new \WP_Query($args);

        if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('ikthemes-blog-item article'); ?>>
                
                <div class="ikthemes-blog-post-thumbnail">
                    <a class="ikthemes-post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                        <?php
                            echo $this->get_image_html(get_post_thumbnail_id());
                        ?>
                    </a>

                    <div class="ikthemes-box-content">
                    
                        <<?php echo $settings['title_html_tag']; ?> class="ikthemes-blog-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </<?php echo $settings['title_html_tag']; ?>>
                        
                        <?php 
                            if ( 'post' === get_post_type() ){ 
                                $this-> sparkconstructionlite_themes_post_meta();
                            }  
                        ?>

                        <?php $this->get_readmore_link(); ?>

                    </div>
                </div>

            </article>

        <?php } } wp_reset_postdata();
    }

    protected function get_image_html($image_id) {

        $settings = $this->get_settings_for_display();

        $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src($image_id, 'thumb', $settings);
        
        if (!$image_url) {
            $image_url = \Elementor\Utils::get_placeholder_image_src();
        }

        $alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); 

        return '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt) . '" />';
    }

    protected function sparkconstructionlite_themes_post_meta() { 

        $settings = $this->get_settings_for_display();

        ?>
        <div class="ikthemes-entry-meta">
            <?php 
                if( !empty( $settings['display_author'] ) && $settings['display_author'] == 'yes' ) { sparkconstructionlite_themes_posted_by(); }
                if( !empty( $settings['display_date'] ) && $settings['display_date'] == 'yes' ) { sparkconstructionlite_themes_posted_on(); }
                if( !empty( $settings['display_reading_time'] ) && $settings['display_reading_time'] == 'yes' ) { echo sparkconstructionlite_themes_estimated_reading_time(); }
                
            ?>
        </div>
        <?php
    }

    protected function get_readmore_link() {

        $settings = $this->get_settings_for_display();

        if (!empty($settings['readmore_text'])) { ?>

            <div class="sparkconstructionlite-button-wrap">
                <a class="sparkconstructionlite-button sparkconstructionlite-button-noborder" href="<?php the_permalink(); ?>">
                    <?php echo esc_html($settings['readmore_text']); ?>
                    <span class="sparkconstructionlite-link-icon elementor-icon">
                        <?php 
                            if (!empty($settings['readmore_icon']['value'])) {
                                Icons_Manager::render_icon($settings['readmore_icon'], ['aria-hidden' => 'true']);
                            } else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="default-icon"><path d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z"/></svg>';
                            }
                        ?>
                    </span>
                </a>
            </div>

            <?php
        }
    }

    protected function get_category() {

        $categories = get_categories(array('hide_empty' => 0));

        $cat = array();

        foreach ($categories as $category) {

            $cat[$category->term_id] = $category->cat_name;
        }
        return $cat;
    }

}
