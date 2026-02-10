<?php

namespace SparkConstructionLiteElements\Modules\ProgressBar\Widgets;

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

class ProgressBar extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-progress-bar';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Progress Bar Block ', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_keywords() {
		return [ 'progress', 'bar', 'design' ];
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
            'progressbar', [
                'label' => esc_html__('Progress Bars', 'spark-construction-lite'),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'progressbar_title', [
                    'label' => esc_html__('Title', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Web Designer', 'spark-construction-lite'),
                ]
            );

            $repeater->add_control(
                'title_html_tag', [
                    'label' => esc_html__('Title HTML Tag', 'spark-construction-lite'),
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
                        'p' => esc_html__('p', 'spark-construction-lite')
                    ],
                ]
            );

            $repeater->add_control(
                'progressbar_percentage',[
                    'label' => esc_html__( 'Percentage', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => '90',
                        'unit' => '%',
                    ],
                ]
            );

            $repeater->add_control(
                'display_percentage',[
                    'label' => esc_html__( 'Display Percentage', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'spark-construction-lite' ),
                    'label_off' => esc_html__( 'Hide', 'spark-construction-lite' ),
                    'return_value' => 'show',
                    'default' => 'show',
                ]
            );

            $repeater->add_control(
                'progress_item_color',[
                    'label' => esc_html__( 'Color', 'spark-construction-lite' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .sparkconstructionlite-progress-bar-length' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'progressbar_block', [
                    'label' => esc_html__('Progress Bars Items', 'spark-construction-lite'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'progressbar_title' => esc_html__('Web Designer', 'spark-construction-lite'),
                            'progressbar_percentage' => 80,
                            'display_percentage'    => 'show',
                            'progress_item_color' => '#000000'
                        ],
                        [
                            'progressbar_title' => esc_html__('WordPress', 'spark-construction-lite'),
                            'progressbar_percentage' => 90,
                            'display_percentage'    => 'show',
                            'progress_item_color' => '#07F4D2'
                        ],
                        [
                            'progressbar_title' => esc_html__('HTML Design', 'spark-construction-lite'),
                            'progressbar_percentage' => 55,
                            'display_percentage'    => 'show',
                            'progress_item_color' => '#4E9D06'
                        ],
                        [
                            'progressbar_title' => esc_html__('Planning', 'spark-construction-lite'),
                            'progressbar_percentage' => 97,
                            'display_percentage'    => 'show',
                            'progress_item_color' => '#8224e3'
                        ],
                    ],
                    'title_field' => '{{{ progressbar_title }}}',
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'progressbar_settings', [
                'label' => esc_html__('Settings', 'spark-construction-lite'),
            ]
        );

            $this->add_responsive_control(
                'progressbar_spacing', [
                    'label' => esc_html__('Space Progress Bar Item', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        'rem' => [
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'rem',
                        'size' => '',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-bar-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'progressbar_spacing_content', [
                    'label' => esc_html__('Space Content', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => '5',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-item' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

        $this->start_controls_section(
			'section_progress_style',[
				'label' => esc_html__( 'Progress Bar', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'progress_color',[
                    'label' => esc_html__( 'Color', 'spark-construction-lite' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-bar-length' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'progress_bg_color',[
                    'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-bar' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'progress_height',[
                    'label' => esc_html__( 'Height', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'progress_border_radius',[
                    'label' => esc_html__( 'Border Radius', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-bar' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'inner_text_heading',[
                    'label' => esc_html__( 'Percentage Text', 'spark-construction-lite' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progress_inline_color',[
                    'label' => esc_html__( 'Color', 'spark-construction-lite' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-bar-length span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),[
                    'name' => 'progress_inner_typography',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-progress-bar-length span',
                    'exclude' => [
                        'line_height',
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
                'progress_title_color', [
                    'label' => esc_html__('Color', 'spark-construction-lite'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-progress-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'progress_title_typography',
                    'label' => esc_html__('Typography', 'spark-construction-lite'),
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-progress-title',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Stroke::get_type(),[
                    'name' => 'progress_title_stroke',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-progress-title',
                ]
            );

            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),[
                    'name' => 'progress_title_shadow',
                    'selector' => '{{WRAPPER}} .sparkconstructionlite-progress-title',
                ]
            );

        $this->end_controls_section();

    }

    /** Render Layout */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $progressbars = $settings['progressbar_block'];

        $wrapper_tag = 'div';

        

        $this->add_render_attribute('wrapper', 'class', [
                'sparkconstructionlite-progress-bar-wrapper',
            ]
        );
        $this->add_render_attribute( 'title', 'class', ['sparkconstructionlite-progress-title'] );

        ?>
        <<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
            <?php 
                foreach ($progressbars as $key => $progressbar) { 
                    
                    $title_tag = Utils::validate_html_tag( $progressbar['title_html_tag'] );
            ?>
                <div class="sparkconstructionlite-progress-item elementor-repeater-item-<?php echo esc_attr( $progressbar['_id'] ); ?>">
                    <?php if ( ! empty( $progressbar['progressbar_title'] ) ) : ?>
                        <<?php Utils::print_validated_html_tag( $title_tag ); ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
                            <?php echo esc_html( $progressbar['progressbar_title'] ); ?>
                        </<?php Utils::print_validated_html_tag( $title_tag ); ?>>
                    <?php endif; ?>

                    <div class="sparkconstructionlite-progress-bar" data-width="<?php echo absint( $progressbar['progressbar_percentage']['size'] ); ?>">
                        <div class="sparkconstructionlite-progress-bar-length">
                            <?php if( !empty( $progressbar['display_percentage'] && $progressbar['display_percentage'] == 'show' ) ){ ?>
                                <span><?php echo absint( $progressbar['progressbar_percentage']['size'] ) . "%"; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>
        <?php
    }

}