<?php

namespace SparkConstructionLiteElements\Modules\Heading\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Heading extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-heading';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Heading Block', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_keywords() {
		return [ 'title', 'heading', 'block' ];
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
                'style', [
                    'label' => esc_html__('Title Layout Style', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1 (One)', 'spark-construction-lite'),
                        'style2' => esc_html__('Style 2 (Two)', 'spark-construction-lite'),
                        'style3' => esc_html__('Style 3 (Three)', 'spark-construction-lite'),
                    ],
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'super_title', [
                    'label' => esc_html__('Super Title', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Your Super Title Text', 'spark-construction-lite'),
                ]
            );

            $this->add_control(
                'title', [
                    'label' => esc_html__('Title', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Your Heading Text', 'spark-construction-lite'),
                ]
            );

            $this->add_control(
                'alignment', [
                    'label' => esc_html__('Alignment', 'spark-construction-lite'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'text-left' => [
                            'title' => esc_html__('Left', 'spark-construction-lite'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'text-center' => [
                            'title' => esc_html__('Center', 'spark-construction-lite'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'text-right' => [
                            'title' => esc_html__('Right', 'spark-construction-lite'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'text-center',
                    'toggle' => true,
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings', [
                'label' => esc_html__('Settings', 'spark-construction-lite'),
            ]
        );

            $this->add_control(
                'super_title_html_tag', [
                    'label' => esc_html__('Super Title HTML Tag', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'span',
                    'options' => [
                        'h1' => esc_html__('H1', 'spark-construction-lite'),
                        'h2' => esc_html__('H2', 'spark-construction-lite'),
                        'h3' => esc_html__('H3', 'spark-construction-lite'),
                        'h4' => esc_html__('H4', 'spark-construction-lite'),
                        'h5' => esc_html__('H5', 'spark-construction-lite'),
                        'h6' => esc_html__('H6', 'spark-construction-lite'),
                        'div' => esc_html__('div', 'spark-construction-lite'),
                        'span' => esc_html__('span', 'spark-construction-lite'),
                    ],
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'title_html_tag', [
                    'label' => esc_html__('Title HTML Tag', 'spark-construction-lite'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'h2',
                    'options' => [
                        'h1' => esc_html__('H1', 'spark-construction-lite'),
                        'h2' => esc_html__('H2', 'spark-construction-lite'),
                        'h3' => esc_html__('H3', 'spark-construction-lite'),
                        'h4' => esc_html__('H4', 'spark-construction-lite'),
                        'h5' => esc_html__('H5', 'spark-construction-lite'),
                        'h6' => esc_html__('H6', 'spark-construction-lite'),
                        'div' => esc_html__('div', 'spark-construction-lite'),
                        'span' => esc_html__('span', 'spark-construction-lite'),
                    ],
                    'label_block' => true,
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
                    '{{WRAPPER}} .section-title-wrapper .super-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .section-title-wrapper .super-title:before' => 'background-image: linear-gradient(to left, {{VALUE}}, transparent 130%)',
                    '{{WRAPPER}} .section-title-wrapper .super-title:after' => 'background-image: linear-gradient(to right, {{VALUE}}, transparent 130%)'
                ],
            ]
        );

        $this->add_control(
            'super_title_bg_color', [
                'label' => esc_html__('Background / Border Color', 'spark-construction-lite'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section-title-wrapper.style2 .super-title::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .section-title-wrapper.style2 .super-title' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .section-title-wrapper.style2 .section-title::before, {{WRAPPER}} .section-title-wrapper.text-left.style5, {{WRAPPER}} .section-title-wrapper.text-right.style5' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .section-title-wrapper.style2 .section-title::after' => 'background: radial-gradient(circle, rgba(247, 247, 247, 0) 0%, {{VALUE}} 10%, rgba(249, 249, 249, 0) 100%)',
                ],
                'condition' => [
                    'style' => ['style2']
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'super_title_typography',
                'label' => esc_html__('Typography', 'spark-construction-lite'),
                'selector' => '{{WRAPPER}} .section-title-wrapper .super-title',
            ]
        );

        $this->add_responsive_control(
            'super_title_margin', [
                'label' => esc_html__('Margin', 'spark-construction-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => 'vertical',
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-wrapper .super-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
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
                    '{{WRAPPER}} .section-title-wrapper .section-title' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'spark-construction-lite'),
                'selector' => '{{WRAPPER}} .section-title-wrapper .section-title',
            ]
        );

        $this->add_responsive_control(
            'title_margin', [
                'label' => esc_html__('Margin', 'spark-construction-lite'),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => 'vertical',
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-wrapper .section-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('heading_class', 'class', [
                'section-title-wrapper',
                $settings['style'],
                $settings['alignment']
            ]
        );
        ?>
        <div <?php echo $this->get_render_attribute_string('heading_class'); ?>>
            <div class="titlewrap">
                <?php if (!empty($settings['super_title'])) { ?>
                    <<?php echo $settings['super_title_html_tag']; ?> class="super-title">
                        <?php echo $settings['super_title']; ?>
                    </<?php echo esc_html($settings['super_title_html_tag']); ?>>
                <?php } ?>

                <?php if (!empty($settings['title'])) { ?>
                    <<?php echo $settings['title_html_tag']; ?> class="section-title">
                        <?php echo $settings['title']; ?>
                    </<?php echo esc_html($settings['title_html_tag']); ?>>
                <?php } ?>
            </div>
        </div>
        <?php
    }

}
