<?php 

namespace SparkConstructionLiteElements\Modules\AdvanceGallery\Widgets;

// Elementor Classes
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Repeater;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class AdvanceGallery extends Widget_Base {

	/** Widget Name */
	public function get_name() {
		return 'SparkConstructionLite-advance-gallery';
	}

	/** Widget Title */
	public function get_title() {
		return esc_html__( 'Advance Gallery', 'spark-construction-lite' );
	}

	public function get_script_depends() {
		return [ 'imagesloaded' ];
	}

	/** Icon */
	public function get_icon() {
		return 'eicon-gallery-justified';
	}

	public function get_keywords() {
		return [ 'gallery', 'advance', 'block' ];
	}

	/** Category */
    public function get_categories() {
        return ['SparkConstructionLite-elements'];
    }

	protected function register_controls() {

		$this->start_controls_section( 'settings', [ 'label' => esc_html__( 'Content', 'spark-construction-lite' ) ] );

			$this->add_control(
				'gallery_type',[
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__( 'Type', 'spark-construction-lite' ),
					'default' => 'multiple',
					'label_block' => true,
					'options' => [
						'single' => esc_html__( 'Single', 'spark-construction-lite' ),
						'multiple' => esc_html__( 'Multiple', 'spark-construction-lite' ),
					],
				]
			);

			$this->add_control(
				'gallery',[
					'type' => Controls_Manager::GALLERY,
					'condition' => [
						'gallery_type' => 'single',
					],
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'gallery_title',[
					'type' => Controls_Manager::TEXT,
					'label' => esc_html__( 'Title', 'spark-construction-lite' ),
					'default' => esc_html__( 'New Gallery', 'spark-construction-lite' ),
				]
			);

			$repeater->add_control(
				'multiple_gallery',[
					'type' => Controls_Manager::GALLERY,
				]
			);

			$this->add_control(
				'galleries',[
					'type' => Controls_Manager::REPEATER,
					'label' => esc_html__( 'Galleries', 'spark-construction-lite' ),
					'fields' => $repeater->get_controls(),
					'title_field' => '{{{ gallery_title }}}',
					'default' => [
						[
							'gallery_title' => esc_html__( 'New Gallery', 'spark-construction-lite' ),
						],
					],
					'condition' => [
						'gallery_type' => 'multiple',
					],
				]
			);

			$this->add_control(
				'show_all_galleries_label',[
					'type' => Controls_Manager::TEXT,
					'label' => esc_html__( '"All" Filter Label', 'spark-construction-lite' ),
					'default' => '',
					'label_block' => true,
					'condition' => [
						'gallery_type' => 'multiple',
					],
				]
			);

			$this->add_control(
				'order_by',[
					'type' => Controls_Manager::SELECT,
					'label_block' => true,
					'label' => esc_html__( 'Order By', 'spark-construction-lite' ),
					'options' => [
						'' => esc_html__( 'Default', 'spark-construction-lite' ),
						'random' => esc_html__( 'Random', 'spark-construction-lite' ),
					],
					'default' => '',
					'separator' => 'before',
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'gallery_layout',[
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__( 'Display Layout', 'spark-construction-lite' ),
					'default' => 'style3',
					'label_block' => true,
					'options' => [
						'style1' => esc_html__( 'Style One', 'spark-construction-lite' ),
						'style2' => esc_html__( 'Style Two', 'spark-construction-lite' ),
						'style3' => esc_html__( 'Style Three', 'spark-construction-lite' ),
						'style6' => esc_html__( 'Style Four', 'spark-construction-lite' ),
					],
					'separator' => 'before',
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'gap',[
					'label' => esc_html__( 'Spacing', 'spark-construction-lite' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 3,
						],
					],
					'default' => [
						'size' => 1,
					],
					'separator' => 'before',
				],
			);

			$this->add_control(
				'overlay_background',[
					'label' => esc_html__( 'Overlay Background', 'spark-construction-lite' ),
					'type' => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'separator' => 'before',
				]
			);

			$this->add_control(
				'lightbox',[
					'type' => Controls_Manager::SWITCHER,
					'label' => esc_html__( 'Zoom Lightbox', 'spark-construction-lite' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'separator' => 'before',
				]
			);

		$this->end_controls_section(); 


		$this->start_controls_section(
			'tabs_style',[
				'label' => esc_html__( 'Tabs Filter', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'gallery_type' => 'multiple',
				],
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),[
					'name' => 'tab_typography',
					'selector' => '{{WRAPPER}} .sparkconstructionlite-gallery-item-name',
				]
			);

			$this->add_group_control(
				Group_Control_Text_Stroke::get_type(),[
					'name' => 'tab_text_stroke',
					'selector' => "{{WRAPPER}} .sparkconstructionlite-gallery-item-name",
				]
			);

			$this->add_responsive_control(
				'tab_alignment',[
					'label' => esc_html__( 'Tab Alignment', 'spark-construction-lite' ),
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
					'default' => 'center',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-gallery-name-wrap' => 'justify-content: {{VALUE}};'
					],
				]
			);

			$this->add_responsive_control(
                'tabs_padding',[
                    'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-gallery-item-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

			$this->add_responsive_control(
                'tabs_radius',[
                    'label' => esc_html__( 'Radius', 'spark-construction-lite' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .sparkconstructionlite-gallery-item-name' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
			'overlay_style',[
				'label' => esc_html__( 'Overlay', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'overlay_background' => 'yes',
				],
			]
		);

			$this->start_controls_tabs( 'overlay_background_tabs' );

				$this->start_controls_tab(
					'overlay_normal',[
						'label' => esc_html__( 'Normal', 'spark-construction-lite' ),
					]
				);

					$this->add_group_control(
						Group_Control_Background::get_type(),[
							'name' => 'overlay_background',
							'types' => [ 'classic', 'gradient' ],
							'exclude' => [ 'image' ],
							'selector' => '{{WRAPPER}} .sparkconstructionlite-gallery-name:after',
							'fields_options' => [
								'background' => [
									'default' => 'classic',
								],
								'color' => [
									'default' => 'rgba(0,0,0,0.1)',
								],
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'overlay_hover',[
						'label' => esc_html__( 'Hover', 'spark-construction-lite' ),
					]
				);

					$this->add_group_control(
						Group_Control_Background::get_type(),[
							'name' => 'overlay_background_hover',
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .sparkconstructionlite-gallery-caption',
							'exclude' => [ 'image' ],
							'fields_options' => [
								'background' => [
									'default' => 'classic',
								],
								'color' => [
									'default' => '',
								],
							],
						]
					);

				$this->end_controls_tab(); 

			$this->end_controls_tabs();

			$this->add_responsive_control(
				'content_alignment',[
					'label' => esc_html__( 'Alignment', 'spark-construction-lite' ),
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
					'separator' => 'before',
					'default' => 'left',
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-gallery-caption' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'content_vertical_position',[
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
					'default' => 'bottom',
					'selectors_dictionary' => [
						'top' => 'flex-start',
						'middle' => 'center',
						'bottom' => 'flex-end',
					],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-gallery-caption' => 'justify-content: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',[
					'label' => esc_html__( 'Padding', 'spark-construction-lite' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
					'default' => [
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .sparkconstructionlite-gallery-caption' => 'padding: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'heading_title',[
					'label' => esc_html__( 'Title', 'spark-construction-lite' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_control(
					'title_color',[
						'label' => esc_html__( 'Color', 'spark-construction-lite' ),
						'type' => Controls_Manager::COLOR,
						'separator' => 'before',
						'selectors' => [
							'{{WRAPPER}} .sparkconstructionlite-gallery-caption h4' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),[
						'name' => 'title_typography',
						'selector' => '{{WRAPPER}} .sparkconstructionlite-gallery-caption h4',
					]
				);

				$this->add_control(
					'title_spacing',[
						'label' => esc_html__( 'Spacing', 'spark-construction-lite' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'selectors' => [
							'{{WRAPPER}} .sparkconstructionlite-gallery-caption h4' => 'margin-bottom: {{SIZE}}{{UNIT}}',
						],
					]
				);

			$this->add_control(
				'heading_description',[
					'label' => esc_html__( 'Description', 'spark-construction-lite' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

				$this->add_control(
					'description_color',[
						'label' => esc_html__( 'Color', 'spark-construction-lite' ),
						'type' => Controls_Manager::COLOR,
						'separator' => 'before',
						'selectors' => [
							'{{WRAPPER}} .sparkconstructionlite-gallery-caption' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),[
						'name' => 'description_typography',
						'selector' => '{{WRAPPER}} .sparkconstructionlite-gallery-caption',
					]
				);

		$this->end_controls_section(); 

		$this->start_controls_section(
			'zoom_icon_style',[
				'label' => esc_html__( 'Zoom Lightbox', 'spark-construction-lite' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'lightbox' => 'yes',
				],
			]
		);
			$this->add_control(
				'zoom_bg_color',[
					'label' => esc_html__( 'Background Color', 'spark-construction-lite' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} a.sparkconstructionlite-gallery-image-large' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'zoom_color',[
					'label' => esc_html__( 'Color', 'spark-construction-lite' ),
					'type' => Controls_Manager::COLOR,
					'separator' => 'before',
					'selectors' => [
						'{{WRAPPER}} a.sparkconstructionlite-gallery-image-large' => 'color: {{VALUE}}',
					],
				]
			);
		$this->end_controls_section();
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$id = $this->get_id();

		$is_multiple = 'multiple' === $settings['gallery_type'] && ! empty( $settings['galleries'] );

		$is_single = 'single' === $settings['gallery_type'] && ! empty( $settings['gallery'] );

		$galleries = [];
		if ( $is_multiple ) {
			$galleries = $settings['galleries'];
		}elseif ( $is_single ) {
			$galleries[0] = $settings['gallery'];
		}

		$this->add_render_attribute( 'gallery_container', 'class', 'sparkconstructionlite-gallery-block-wrap' ); ?>

		<div <?php $this->print_render_attribute_string( 'gallery_container' ); ?>>

			<?php
				/** Gallery Tab */
				$this->get_advance_gallery_tab();

				$layout = $settings['gallery_layout'];
				$gap = $settings['gap']['size'] . $settings['gap']['unit'];
			?>
			<div class="sparkconstructionlite-gallery-content-wrap <?php echo esc_attr( $layout ); ?>" data-gutter="<?php echo intval( $gap ); ?>">
				<div class="sparkconstructionlite-gallery-content">
					<?php
						foreach ( $galleries as $unique_index => $item ){
							if ( $is_multiple ) {
								$galleries[ $unique_index ] = $item['multiple_gallery'];
								$gallery_title = sanitize_title_with_dashes($item['gallery_title']);
							}elseif ( $is_single ) {
								$gallery_title = '';
							}

							$gallery_items = [];
							foreach ( $galleries[ $unique_index ] as $gallery_index => $gallery ) {
								foreach ( $gallery as $index => $item ) {
									if ( in_array( $item, array_keys( $gallery_items ), true ) ) {
										$gallery_items[$item][] = $gallery_index;
									} else {
										$gallery_items[$item] = [ $gallery_index ];
									}
								}
							}
							
							if ( 'random' === $settings['order_by'] ) {
								$shuffled_items = [];
								$keys = array_keys( $gallery_items );
								shuffle( $keys );
								foreach ( $keys as $key ) {
									$shuffled_items[ $key ] = $gallery_items[ $key ];
								}
								$gallery_items = $shuffled_items;
							}

							foreach ( $gallery_items as $id => $tags ){

								$image_src = wp_get_attachment_image_src( $id, 'full' );
				
								if ( ! $image_src ) {
									continue;
								}

								$attachment = get_post( $id );
					?>
						<div class="sparkconstructionlite-gallery-content-item <?php echo esc_attr( $gallery_title ); ?>">
							<div class="sparkconstructionlite-gallery-wrap">
								<div class="sparkconstructionlite-gallery-name" style="background-image: url(<?php echo esc_url( $image_src['0'] ) ?>);"></div>
								<?php if( !empty( $settings['overlay_background'] ) && $settings['overlay_background'] == 'yes' ){ ?>
									<div class="sparkconstructionlite-gallery-caption">
										<?php if( !empty( $attachment->post_title ) ){ ?>
											<h4><?php echo esc_html( $attachment->post_title ); ?></h4>
										<?php } ?>
										<?php if( !empty( $attachment->post_excerpt ) ){ ?>
											<p><?php echo esc_html( $attachment->post_excerpt ); ?></p>
										<?php } ?>
									</div>
								<?php } ?>
								<?php if( !empty( $settings['lightbox'] ) && $settings['lightbox'] == 'yes' ){ ?>
									<a class="sparkconstructionlite-gallery-image-large" href="<?php echo esc_url( $image_src[0] ) ?>" rel="portfolio[work]">
										<i class="fa-solid fa-magnifying-glass-plus"></i>
									</a>
								<?php  } ?>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>

	<?php } 


	protected function get_advance_gallery_tab() {

			$settings = $this->get_settings_for_display();

			$this->add_render_attribute('tab_wrap_class',[
				'class' => [
					'sparkconstructionlite-gallery-item-wrap'
				]
			] );
		?>
			<div <?php $this->print_render_attribute_string( 'tab_wrap_class' ); ?>>
				<div class="sparkconstructionlite-gallery-name-wrap" data-active="*">
					<?php if ( !empty($settings['show_all_galleries_label']) ) { ?>
						<div class="sparkconstructionlite-gallery-item-name default-item-name active" data-filter="*">
							<?php $this->print_unescaped_setting( 'show_all_galleries_label' ); ?>
						</div>
					<?php } ?>
					<?php 
						if( !empty( $settings['galleries'] ) ):
						foreach ( $settings['galleries'] as $index => $gallery ) :
							$gallery_title = sanitize_title_with_dashes($gallery['gallery_title']);
						?>
							<div class="sparkconstructionlite-gallery-item-name" data-filter=".<?php echo esc_attr( $gallery_title ); ?>">
								<?php $this->print_unescaped_setting( 'gallery_title', 'galleries', $index ); ?>
							</div>
					<?php endforeach; endif; ?>
				</div>
			</div>
		<?php 
    }

}