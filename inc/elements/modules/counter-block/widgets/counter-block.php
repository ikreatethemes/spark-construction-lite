<?php

namespace SparkConstructionLiteElements\Modules\CounterBlock\Widgets;

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

class CounterBlock extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-counter-block';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Counter Block', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-counter';
    }

	public function get_keywords() {
		return [ 'counter', 'block', 'count' ];
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
			'section_counter',[
				'label' => esc_html__( 'Content', 'spark-construction-lite' ),
			]
		);

			$this->add_control(
				'layout', [
					'label' => esc_html__('Counter Layout', 'spark-construction-lite'),
					'type' => Controls_Manager::SELECT,
					'default' => 'style1',
					'label_block' => true,
					'options' => [
						'style1' => esc_html__('Style 1', 'spark-construction-lite'),
						'style2' => esc_html__('Style 2', 'spark-construction-lite'),
						'style3' => esc_html__('Style 3', 'spark-construction-lite'),
						'style4' => esc_html__('Style 4', 'spark-construction-lite'),
					],
				]
			);

			$this->add_control(
				'counter_icon', [
					'type' => Controls_Manager::ICONS,
					'separator' => 'after',
					'default' => [
						'value' => 'fas fa-street-view',
						'library' => 'solid',
					],
				]
			);

			$this->add_control(
				'starting_number',[
					'label' => esc_html__( 'Starting Number', 'spark-construction-lite' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 0,
				]
			);

			$this->add_control(
				'ending_number',[
					'label' => esc_html__( 'Ending Number', 'spark-construction-lite' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 4575,
				]
			);

			$this->add_control(
				'prefix', [
					'label' => esc_html__( 'Number Prefix', 'spark-construction-lite' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'ai' => [
						'active' => false,
					],
				]
			);

			$this->add_control(
				'suffix', [
					'label' => esc_html__( 'Number Suffix', 'spark-construction-lite' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'ai' => [
						'active' => false,
					],
				]
			);

			$this->add_control(
				'duration', [
					'label' => esc_html__( 'Animation Duration', 'spark-construction-lite' ) . ' (ms)',
					'type' => Controls_Manager::NUMBER,
					'default' => 2000,
					'min' => 100,
					'step' => 100,
				]
			);

			$this->add_control(
				'thousand_separator_char', [
					'label' => esc_html__( 'Separator', 'spark-construction-lite' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'' => 'Default',
						'.' => 'Dot',
						' ' => 'Space',
						'_' => 'Underline',
						"'" => 'Apostrophe',
					],
				]
			);

			$this->add_control(
				'title', [
					'label' => esc_html__( 'Title', 'spark-construction-lite' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'separator' => 'before',
					'default' => esc_html__( 'Cool Themes', 'spark-construction-lite' ),
				]
			);

			$this->add_control(
				'title_html_tag', [
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
					'default' => 'h3',
					'condition' => [
						'title!' => '',
					],
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_counter_style', [
				'label' => esc_html__( 'General Style', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'counter_bg_color', [
					'label' => esc_html__('Background Color', 'spark-construction-lite'),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper' => 'background-color: {{VALUE}}',
					]
				]
			);

			$this->add_responsive_control(
                'counter_position',[
                    'label' => esc_html__( 'Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'above',
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
						'above' => [
                            'title' => esc_html__( 'Above', 'spark-construction-lite' ),
                            'icon' => 'eicon-v-align-top',
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
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper' => '{{VALUE}}',
					],
					//'prefix_class' => 'sparkconstructionlite-counter-layout-',
					'condition' => [
						'layout' => ['style1','style2','style3']
					],
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
                        '{{WRAPPER}} .sparkconstructionlite-counter-wrapper' => 'align-items:{{VALUE}};',
                    ],
                    'selectors_dictionary' => [
                        'top' => 'flex-start',
                        'middle' => 'center',
                        'bottom' => 'flex-end',
                    ],
                    'condition' => [
                    	'counter_position' => ['left','right'],
						'layout' => ['style1','style2']
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
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper, {{WRAPPER}} .sparkconstructionlite-counter-wrapper.style6' => 'justify-content:{{VALUE}};',
                        '{{WRAPPER}} .sparkconstructionlite-content-wrap' => 'align-items: {{VALUE}}; text-align: {{VALUE}};',
                    ],
					'condition' => [
                    	'counter_position' => ['left','right'],
						'layout' => ['style1','style2']
                    ],
                ]
            );

			$this->add_responsive_control(
                'textalign',[
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
                        '{{WRAPPER}} .sparkconstructionlite-counter-wrapper' => 'align-items: {{VALUE}}; text-align: {{VALUE}};',
                    ],
					'condition' => [
                    	'counter_position' => ['above','below'],
						'layout' => ['style1','style2']
                    ],
                ]
            );

			$this->add_responsive_control(
                'counter_position_six',[
                    'label' => esc_html__( 'Position', 'spark-construction-lite' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'left',
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'spark-construction-lite' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
					'selectors_dictionary' => [
						'left' => 'flex-direction: row;',
						'right' => 'flex-direction: row-reverse;',
					],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style4' => '{{VALUE}}',
					],
					'condition' => [
						'layout' => ['style4']
					],
                ]
            );

			$this->add_responsive_control(
                'textalignsix',[
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
                        '{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style4, {{WRAPPER}} .sparkconstructionlite-counter-wrapper.style5' => 'justify-content: {{VALUE}};',
                    ],
					'condition' => [
						'layout' => ['style4']
                    ],
                ]
            );
	
			$this->add_responsive_control(
				'counter_gap', [
					'label' => esc_html__( 'Content Spacing', 'spark-construction-lite' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper, {{WRAPPER}} .sparkconstructionlite-counter-wrapper.style6' => 'gap: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),[
					'name' => 'counter_box_shadow',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-counter-wrapper',
				]
			);

			$this->add_responsive_control(
				'counter_padding', [
					'label' => esc_html__('Padding', 'spark-construction-lite'),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'counter_radius', [
					'label' => esc_html__('Radius', 'spark-construction-lite'),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'layout' => ['style1','style4']
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),[
					'name' => 'counter_border',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-counter-wrapper',
					'default' => 'none',
					'condition' => [
						'layout' => ['style1','style4']
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),[
					'name' => 'counter_border3',
					'selector' => '{{WRAPPER}} .counter-shape',
					'default' => 'none',
					'condition' => [
						'layout' => ['style3']
					],
				]
			);

			$this->add_control(
                'border_width',[
                    'label' => esc_html__( 'Border Width', 'spark-construction-lite' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        'px' => [
                            'max' => 20,
                        ],
                        'em' => [
                            'max' => 2,
                        ],
                        'rem' => [
                            'max' => 2,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2:before,
						{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2:after,
						{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2>span:before,
						{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2>span:after' => 'border-width: {{SIZE}}{{UNIT}};',
                    ],
					'condition' => [
						'layout' => ['style2']
					],
                ]
            );

			$this->add_control(
				'border_color', [
					'label' => esc_html__('Border Color', 'spark-construction-lite'),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2:before,
						{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2:after,
						{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2>span:before,
						{{WRAPPER}} .sparkconstructionlite-counter-wrapper.style2>span:after' => 'border-color: {{VALUE}};',
                    ],
					'condition' => [
						'layout' => ['style2']
					],
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_counter_icon_style', [
				'label' => esc_html__( 'Icon', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
			$this->add_responsive_control(
				'icon_size', [
					'label' => esc_html__( 'Icon Size', 'spark-construction-lite' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem', 'custom' ],
					'range' => [
						'px' => [
							'min' => 20,
							'max' => 200,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-icon-wrap .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					]
				]
			);
		
			$this->add_control(
				'icon_bg_color', [
					'label' => esc_html__('Background Color', 'spark-construction-lite'),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-icon-wrap' => 'background-color: {{VALUE}}',
					]
				]
			);
			
			$this->add_control(
				'icon_color', [
					'label' => esc_html__('Color', 'spark-construction-lite'),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-icon-wrap .elementor-icon' => 'color: {{VALUE}}; fill: {{VALUE}}',
					]
				]
			);
			
			$this->add_responsive_control(
				'icon_padding', [
					'label' => esc_html__('Padding', 'spark-construction-lite'),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-icon-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_responsive_control(
				'icon_radius', [
					'label' => esc_html__('Radius', 'spark-construction-lite'),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-icon-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),[
					'name' => 'icon_box_shadow',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-icon-wrap',
				]
			);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_number', [
				'label' => esc_html__( 'Number', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'number_color', [
					'label' => esc_html__( 'Color', 'spark-construction-lite' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-content-wrap' => 'color: {{VALUE}};'
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(), [
					'name' => 'typography_number',
					'label' => esc_html__('Typography', 'spark-construction-lite'),
					'selector' => '{{WRAPPER}} .sparkconstructionlite-content-wrap',
				]
			);

			$this->add_responsive_control(
				'number_margin', [
					'label' => esc_html__('Margin', 'spark-construction-lite'),
					'type' => Controls_Manager::DIMENSIONS,
					'allowed_dimensions' => 'vertical',
					'size_units' => ['px', '%', 'em'],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-number-wrap' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Text_Stroke::get_type(), [
					'name' => 'number_stroke',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-counter-number-wrap',
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_title', [
				'label' => esc_html__( 'Title', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color', [
					'label' => esc_html__( 'Color', 'spark-construction-lite' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-counter-title' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(), [
					'name' => 'typography_title',
					'label' => esc_html__('Typography', 'spark-construction-lite'),
					'selector' => '{{WRAPPER}} .sparkconstructionlite-counter-title',
				]
			);

			$this->add_group_control(
				Group_Control_Text_Stroke::get_type(), [
					'name' => 'title_stroke',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-counter-title',
				]
			);
	
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(), [
					'name' => 'title_shadow',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-counter-title',
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
				'sparkconstructionlite-counter-wrapper',
				$settings['layout'],
			]
		);

		$this->add_render_attribute( 'icon', 'class', ['sparkconstructionlite-icon-wrap'] );
		$this->add_render_attribute( 'title', 'class', ['sparkconstructionlite-counter-title'] );
		$this->add_render_attribute(
			'counter',[
				'class' => 'ikthemes-counter-number',
				'data-durations' => $settings['duration'],
				'data-tovalue' => $settings['ending_number'],
				'data-fromvalue' => $settings['starting_number'],
				'data-delimiters' => empty( $settings['thousand_separator_char'] ) ? ',' : $settings['thousand_separator_char'],
			]
		);

		?>
		<<?php Utils::print_validated_html_tag( $wrapper_tag ); ?> <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
			<?php if( !empty( $settings['layout'] ) && $settings['layout'] == 'style4' ){ ?>
				<div class="sparkconstructionlite-content-wrap">
					<?php if ( ! empty( $settings['counter_icon'] ) && ! empty( $settings['counter_icon']['value'] ) ) : ?>
						<div <?php $this->print_render_attribute_string( 'icon' ); ?>>
							<div class="elementor-icon">
								<?php Icons_Manager::render_icon( $settings['counter_icon'], ['aria-hidden' => 'true'] ); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( isset( $settings['ending_number'] ) ) : ?>
						<div class="sparkconstructionlite-counter-number-wrap">
							<?php if( !empty( $settings['prefix'] ) ){ ?>
								<span class="sparkconstructionlite-counter-number-prefix">
									<?php echo esc_html( $settings['prefix'] ); ?>
								</span>
							<?php } ?>
							<span <?php $this->print_render_attribute_string( 'counter' ); ?>>
								<?php echo esc_html( $settings['ending_number'] ); ?>
							</span>
							<?php if( !empty( $settings['suffix'] ) ){ ?>
								<span class="sparkconstructionlite-counter-number-suffix">
									<?php echo esc_html( $settings['suffix'] ); ?>
								</span>
							<?php } ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $settings['title'] ) ) : ?>
					<<?php Utils::print_validated_html_tag( $title_tag ); ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
						<?php $this->print_unescaped_setting( 'title' ); ?>
					</<?php Utils::print_validated_html_tag( $title_tag ); ?>>
				<?php endif; ?>
			<?php }else{ ?>
				<?php if( !empty( $settings['layout'] ) && $settings['layout'] == 'style3' ){ ?>
					<div class="counter-shape"><span></span></div>
				<?php } ?>
				<?php if ( ! empty( $settings['counter_icon'] ) && ! empty( $settings['counter_icon']['value'] ) ) : ?>
					<div <?php $this->print_render_attribute_string( 'icon' ); ?>>
						<div class="elementor-icon">
							<?php Icons_Manager::render_icon( $settings['counter_icon'], ['aria-hidden' => 'true'] ); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="sparkconstructionlite-content-wrap">
					<?php if ( isset( $settings['ending_number'] ) ) : ?>
						<div class="sparkconstructionlite-counter-number-wrap">
							<?php if( !empty( $settings['prefix'] ) ){ ?>
								<span class="sparkconstructionlite-counter-number-prefix">
									<?php echo esc_html( $settings['prefix'] ); ?>
								</span>
							<?php } ?>
							<span <?php $this->print_render_attribute_string( 'counter' ); ?>>
								<?php echo esc_html( $settings['ending_number'] ); ?>
							</span>
							<?php if( !empty( $settings['suffix'] ) ){ ?>
								<span class="sparkconstructionlite-counter-number-suffix">
									<?php echo esc_html( $settings['suffix'] ); ?>
								</span>
							<?php } ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $settings['title'] ) ) : ?>
						<<?php Utils::print_validated_html_tag( $title_tag ); ?> <?php $this->print_render_attribute_string( 'title' ); ?>>
							<?php $this->print_unescaped_setting( 'title' ); ?>
						</<?php Utils::print_validated_html_tag( $title_tag ); ?>>
					<?php endif; ?>
				</div>
				<?php if( !empty( $settings['layout'] ) && $settings['layout'] == 'style2' ){ ?><span></span><?php } ?>
			<?php } ?>
		</<?php Utils::print_validated_html_tag( $wrapper_tag ); ?>>
		<?php
	}
}
