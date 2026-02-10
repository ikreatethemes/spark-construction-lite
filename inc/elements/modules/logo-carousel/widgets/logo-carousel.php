<?php

namespace SparkConstructionLiteElements\Modules\LogoCarousel\Widgets;

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

class LogoCarousel extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'SparkConstructionLite-logo-carousel';
    }

    /** Widget Title */
    public function get_title() {
        return esc_html__('Logo Carousel', 'spark-construction-lite');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_keywords() {
		return [ 'logo', 'client', 'brand' ];
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
                    'default' => 'style1',
                    'label_block' => true,
                    'options' => [
                        'style1' => esc_html__('Logo Slider', 'spark-construction-lite'),
                        'style2' => esc_html__('Logo List', 'spark-construction-lite'),
                    ],
                ]
            );

            $repeater = new Repeater();

            $repeater->add_control(
                'title', [
                    'label' => esc_html__('Logo Title', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => 'Title'
                ]
            );

            $repeater->add_control(
                'image', [
                    'label' => esc_html__('Logo Image', 'spark-construction-lite'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_control(
                'logo_link', [
                    'label' => esc_html__('Logo Link', 'spark-construction-lite'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'link_new_tab', [
                    'label' => esc_html__('Target New Tab', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'slides',[
                    'label' => esc_html__( 'Brand Logo', 'spark-construction-lite' ),
                    'type' => Controls_Manager::REPEATER,
                    'show_label' => true,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'image' => Utils::get_placeholder_image_src(),
                            'title' => esc_html__( 'Your Logo One', 'spark-construction-lite' ),
                            'logo_link' => '#',
                            'link_new_tab' => 'yes',
                        ],
                        [
                            'image' => Utils::get_placeholder_image_src(),
                            'title' => esc_html__( 'Your Logo Two', 'spark-construction-lite' ),
                            'logo_link' => '#',
                            'link_new_tab' => 'yes',
                        ],
                        [
                            'image' => Utils::get_placeholder_image_src(),
                            'title' => esc_html__( 'Your Logo Three', 'spark-construction-lite' ),
                            'logo_link' => '#',
                            'link_new_tab' => 'yes',
                        ],
                        [
                            'image' => Utils::get_placeholder_image_src(),
                            'title' => esc_html__( 'Your Logo Four', 'spark-construction-lite' ),
                            'logo_link' => '#',
                            'link_new_tab' => 'yes',
                        ],
                        [
                            'image' => Utils::get_placeholder_image_src(),
                            'title' => esc_html__( 'Your Logo Five', 'spark-construction-lite' ),
                            'logo_link' => '#',
                            'link_new_tab' => 'yes',
                        ],
                        [
                            'image' => Utils::get_placeholder_image_src(),
                            'title' => esc_html__( 'Your Logo Six', 'spark-construction-lite' ),
                            'logo_link' => '#',
                            'link_new_tab' => 'yes',
                        ]
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'carousel_settings', [
                'label' => esc_html__('Carousel Settings', 'spark-construction-lite'),
                'condition' => ['layout' => ['style1']],
            ]
        );

            $this->add_control(
                'slides_to_show', [
                    'label' => esc_html__('Slides To Show', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 10,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 4,
                    ],
                ]
            );

            $this->add_control(
                'slides_margin', [
                    'label' => esc_html__('Spacing', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => 5,
                            'max' => 100,
                            'step' => 5,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 40,
                    ],
                ]
            );

            $this->add_control(
                'autoplay', [
                    'label' => esc_html__('Autoplay', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'pause_on_hover', [
                    'label' => esc_html__('Pause on Hover', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'autoplay' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'infinite', [
                    'label' => esc_html__('Infinite Loop', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'autoplay_speed', [
                    'label' => esc_html__('Autoplay Speed (in Seconds)', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['s'],
                    'range' => [
                        's' => [
                            'min' => 1,
                            'max' => 15,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'size' => 5,
                        'unit' => 's',
                    ],
                    'condition' => [
                        'autoplay' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'speed', [
                    'label' => esc_html__('Animation Speed', 'spark-construction-lite'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 500,
                ]
            );

            $this->add_control(
                'dots', [
                    'label' => esc_html__('Navigation Dots', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'spark-construction-lite'),
                    'label_off' => esc_html__('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'nav', [
                    'label' => esc_html__('Arrows', 'spark-construction-lite'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __('Yes', 'spark-construction-lite'),
                    'label_off' => __('No', 'spark-construction-lite'),
                    'return_value' => 'yes',
                    'default' => 'on',
                ]
            );

        $this->end_controls_section();



        $this->start_controls_section(
            'items_settings', [
                'label' => esc_html__('Settings', 'spark-construction-lite'),
                'condition' => ['layout' => ['style2']],
            ]
        );

            $this->add_responsive_control(
                'items', [
                    'label' => esc_html__('Display Item', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 8,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 4,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-logo-list' => 'grid-template-columns: repeat({{SIZE}}, 1fr)',
                    ],
                ]
            );

            $this->add_responsive_control(
                'items_column_gaps', [
                    'label' => esc_html__('Gap', 'spark-construction-lite'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'rem', 'em', '%', 'px', 'custom' ],
                    'range' => [
                        'rem' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1
                        ],
                    ],
                    'default' => [
                        'unit' => 'rem',
                        'size' => 2,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-logo-list' => 'gap: {{SIZE}}{{UNIT}};',
                    ]
                ]
            );

        $this->end_controls_section();


        $this->start_controls_section(
            'dot_style', [
                'label' => esc_html__('Naviagation Dot Style', 'spark-construction-lite'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'dot_tabs' );

                $this->start_controls_tab(
                    'dot_style_normal_tab', [
                        'label' => esc_html__('Normal', 'spark-construction-lite'),
                    ]
                );

                    $this->add_control(
                        'dot_color', [
                            'label' => esc_html__('Color', 'spark-construction-lite'),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ikthemes-logo-carousel .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'dot_style_active_tab', [
                        'label' => esc_html__('Hover', 'spark-construction-lite'),
                    ]
                );

                    $this->add_control(
                        'dot_color_hover', [
                            'label' => esc_html__('Color (Hover)', 'spark-construction-lite'),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ikthemes-logo-carousel .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Hover Effects Design
		$this->start_controls_section(
			'hover_effects',[
				'label' => esc_html__( 'Image Hover Effects', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
            	'transformation',[
            		'label' => esc_html__( 'Hover Animation', 'spark-construction-lite' ),
            		'type' => Controls_Manager::SELECT,
                    'label_block' => true,
            		'options' => [
            			'' => 'None',
            			'zoom-in' => 'Zoom In',
            			'zoom-out' => 'Zoom Out',
            			'move-left' => 'Move Left',
            			'move-right' => 'Move Right',
            			'move-up' => 'Move Up',
            			'move-down' => 'Move Down',
            		],
            		'default' => 'zoom-in',
            	]
            );

            $this->add_control(
                'effect_duration',[
                    'label' => esc_html__( 'Transition Duration', 'spark-construction-lite' ) . ' (ms)',
                    'type' => Controls_Manager::SLIDER,
                    'render_type' => 'template',
                    'default' => [
                        'size' => 1500,
                    ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 3000,
                            'step' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ikthemes-logo-img' => 'transition-duration: {{SIZE}}ms',
                    ],
                    'separator' => 'before',
                ]
            );

	    $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {
        
        $settings = $this->get_settings_for_display();
        
        if( !empty( $settings['layout'] ) && $settings['layout'] == 'style1' ){
            $params = array(
                'items' => (int) $settings['slides_to_show']['size'],
                'margin' => (int) $settings['slides_margin']['size'],
                'autoplay' => $settings['autoplay'] == 'yes' ? true : false,
                'pause_on_hover' => $settings['pause_on_hover'] == 'yes' ? true : false,
                'loop' => $settings['infinite'] == 'yes' ? true : false,
                'speed' => (int) $settings['speed'],
                'nav' => $settings['nav'] == 'yes' ? true : false,
                'dots' => $settings['dots'] == 'yes' ? true : false,
            );
            
            if($settings['autoplay'] == 'yes'){
                $params['pause'] = (int) $settings['autoplay_speed']['size'] * 1000;
            }
            $params = json_encode($params);

        ?>
            <div class="ikthemes-logo-carousel owl-carousel carouseldots" data-params='<?php echo $params; ?>'>
                <?php 
                    foreach ($settings['slides'] as $item) {
                    $target = $item['link_new_tab'] == 'yes' ? '_blank' : '_self';
                ?>
                    <div class="ikthemes-logo-area sparkconstructionlite-bg-transform sparkconstructionlite-bg-transform-<?php echo esc_attr( $settings['transformation'] ); ?>">
                        <?php if (!empty($item['image'])) { ?>
                            <a href="<?php echo esc_url($item['logo_link']) ?>" target="<?php echo esc_attr($target) ?>">
                                <div class="ikthemes-logo-img sparkconstructionlite-bg">
                                    <?php Group_Control_Image_Size::print_attachment_image_html( $item, 'image' ); ?>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php }else{ ?>
            <div class="ikthemes-logo-list">
                <?php 
                    foreach ($settings['slides'] as $item) {
                    $target = $item['link_new_tab'] == 'yes' ? '_blank' : '_self';
                ?>
                    <div class="ikthemes-logo-area sparkconstructionlite-bg-transform sparkconstructionlite-bg-transform-<?php echo esc_attr( $settings['transformation'] ); ?>">
                        <?php if (!empty($item['image'])) { ?>
                            <a href="<?php echo esc_url( $item['logo_link'] ) ?>" target="<?php echo esc_attr($target) ?>">
                                <div class="ikthemes-logo-img sparkconstructionlite-bg">
                                    <?php Group_Control_Image_Size::print_attachment_image_html( $item, 'image' ); ?>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php }
    }

}
