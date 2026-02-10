<?php

function sparkconstructionlite_themes_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control('header_textcolor')->section = "title_tagline";
	
	$wp_customize->get_section( 'static_front_page' )->title 	= esc_html__('Enable (Home) Front Page', 'spark-construction-lite');
	$wp_customize->get_section( 'static_front_page' )->priority = 12;

	
	$wp_customize->register_control_type('SparkConstructionLite_Custom_Control_Tab');
	$wp_customize->register_control_type('SparkConstructionLite_Background_Control');
    $wp_customize->register_control_type('SparkConstructionLite_Range_Slider_Control');
    $wp_customize->register_control_type('SparkConstructionLite_Sortable_Control');
    $wp_customize->register_control_type('SparkConstructionLite_Custom_Control_Buttonset');
	$wp_customize->register_section_type('SparkConstructionLite_Toggle_Section');
	$wp_customize->register_section_type('SparkConstructionLite_Themes_Upgrade_Section');

	// Register custom section types.
	$wp_customize->register_section_type( 'SparkConstructionLite_Themes_Customize_Section' );
	$wp_customize->add_section(
		new SparkConstructionLite_Themes_Customize_Section(
			$wp_customize,
			'sparkconstructionlite-info',
			array(
				// 'title' => esc_html__('35% Off Use Coupon Code : NEW2023 Validity : DEC 26 - JAN 10', 'spark-construction-lite'),
				'pro_text' => esc_html__( 'Upgrade To Pro','spark-construction-lite' ),
				'pro_url'  => apply_filters('sparkconstructionlite-link', esc_url('https://ikreatethemes.com/wordpress-theme/construction-wordpress-theme/') ),
				'priority'  => -1,
			)
		)
	);
	
    require get_template_directory() . '/inc/customizer/customizer-panel/social-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/quick-info.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/footer.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/colors.php';
	
	$wp_customize->add_setting('sparkconstructionlite_enable_frontpage', array(
        'default' => 'disable',
        'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_switch',  
    ));
    $wp_customize->add_control(new SparkConstructionLite_Switch_Control($wp_customize, 'sparkconstructionlite_enable_frontpage', array(
        'label' => esc_html__('Enable FrontPage', 'spark-construction-lite'),
        'settings' => 'sparkconstructionlite_enable_frontpage',
		'description' => sprintf(esc_html__('Overwrites the homepage displays setting and shows the frontpage for Customizer %s', 'spark-construction-lite'), '<a href="javascript:wp.customize.panel(\'sparkconstructionlite_frontpage_settings\').focus()">' . esc_html__('Front Page Sections', 'spark-construction-lite') . '</a>') . '<br/><br/>' . esc_html__('Do not enable this option if you want to use Elementor in home page.', 'spark-construction-lite'),
        'section' => 'static_front_page',
        'switch_label' => array(
            'enable' => esc_html__('On', 'spark-construction-lite'),
            'disable' => esc_html__('Off', 'spark-construction-lite'),
        ),
    )));
    
    
	$pages = array();
	$pages_obj = get_pages();
	$pages[''] = esc_html__('Select Page', 'spark-construction-lite');
	foreach ($pages_obj as $page) {
	    $pages[$page->ID] = $page->post_title;
	}
	$blog_cat = sparkconstructionlite_themes_post_category();
	
	$wp_customize->add_panel('sparkconstructionlite_header_settings', array(
		'title'		=>	esc_html__('Header Settings','spark-construction-lite'),
		'priority'	=>	10,
	));

	$wp_customize->get_section( 'title_tagline' )->panel = 'sparkconstructionlite_header_settings';


	$wp_customize->add_setting('sparkconstructionlite_pro_title_tagline', array(
		'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_title_tagline', array(
		'section' => 'title_tagline',
		'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
		'choices' => array(
			esc_html__('Title, Tagline & Logo Alignment', 'spark-construction-lite'),
			esc_html__('Title, Tagline Color Options', 'spark-construction-lite')
		),
		'priority' => 250,
	)));


	/** Page Sidebar */
	$wp_customize->add_section('sparkconstructionlite_sidebar', array(
		'title'		=>	esc_html__('Page Sidebar Settings','spark-construction-lite'),
		'panel'		=> 'sparkconstructionlite_general_settings_panel',
	));

	$wp_customize->add_setting('sparkconstructionlite_page_sidebar', array(
		'default' => 'no',
		'sanitize_callback' => 'sparkconstructionlite_themes_sanitize_options'
	));
	$wp_customize->add_control(new SparkConstructionLite_Selector($wp_customize, 'sparkconstructionlite_page_sidebar', array(
		'section' => 'sparkconstructionlite_sidebar',
		'label' => esc_html__('Page Layout Setting', 'spark-construction-lite'),
		'options' => array(
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
		)
	)));

	/** Upgrade Pro Version */
	$wp_customize->add_setting('sparkconstructionlite_pro_upgrade_sidebar_sticky', array(
		'sanitize_callback' => 'sparkconstructionlite_sanitize_text'
	));
	$wp_customize->add_control(new SparkConstructionLite_Themes_Upgrade_Text($wp_customize, 'sparkconstructionlite_pro_upgrade_sidebar_sticky', array(
		'section' => 'sparkconstructionlite_sidebar',
		'label' => esc_html__('For More Settings,', 'spark-construction-lite'),
		'choices' => array(
			esc_html__('Sticky widget sidebar options', 'spark-construction-lite'),
		),
		'priority' => 250,
	)));
	
	require get_template_directory() . '/inc/customizer/customizer-panel/general-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/top-header.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/header.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/header-cta.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/blog.php';
	
	$wp_customize->add_panel('sparkconstructionlite_frontpage_settings', array(
		'title'		=>	esc_html__('Home Section','spark-construction-lite'),
		'priority'	=>	35,
		'description' => esc_html__('Drag and Drop to Reorder', 'spark-construction-lite'). '<img class="sparkconstructionlite_light-drag-spinner" src="'.admin_url('/images/spinner.gif').'">',
	));

	require get_template_directory() . '/inc/customizer/customizer-panel/home/common-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-slider-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-about-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-promoservices-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-cta-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-services-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-counter-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-video-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-recentwork-settings.php';
	//require get_template_directory() . '/inc/customizer/customizer-panel/home/home-howitworks-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-testimonial-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-team-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-client-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-blog-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-customa-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/home-contact-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/breadcrumb.php';	

	/****** Upgrade Pro in Front Page Section */
	$wp_customize->add_section(new SparkConstructionLite_Themes_Upgrade_Section($wp_customize, 'sparkconstructionlite-frontpage-notice', array(
		'title' => sprintf(esc_html__('Important! Home Page Sections are not enabled. Enable it %1shere%2s.', 'spark-construction-lite'), '<a href="javascript:wp.customize.section( \'static_front_page\' ).focus()">', '</a>'),
		'priority' => -1,
		'class' => 'ikthemes-enable-front',
		'panel' => 'sparkconstructionlite_frontpage_settings',
	)));

	$wp_customize->add_section(new SparkConstructionLite_Themes_Upgrade_Section($wp_customize, 'sparkconstructionlite_frontpage_upgrade_pro_section', array(
		'title' => esc_html__('More Sections on Premium', 'spark-construction-lite'),
		'panel' => 'sparkconstructionlite_frontpage_settings',
		'priority' => 500,
		'class' => 'ikthemes-upgrade-boxed',
		'options' => array(
			esc_html__('- All above section with more styles and customization options', 'spark-construction-lite'),
			esc_html__('- Multiple Services Layouts', 'spark-construction-lite'),
			esc_html__('- News and Events Section', 'spark-construction-lite'),
			esc_html__('- Free Hand Text (HTML)', 'spark-construction-lite'),
			esc_html__('- Highlight Section', 'spark-construction-lite'),
			esc_html__('- How It Works Section', 'spark-construction-lite'),
			esc_html__('- Portfolio Section', 'spark-construction-lite'),
			esc_html__('- WooCommerce Section', 'spark-construction-lite'),
			esc_html__('- Pricing Table Section', 'spark-construction-lite'),
			esc_html__('- Tab Section', 'spark-construction-lite'),
			esc_html__('- Custom Section B', 'spark-construction-lite'),
			esc_html__('- 40+ Elementor Widgets', 'spark-construction-lite'),
			esc_html__('- Advanced Typography Settings', 'spark-construction-lite'),
			esc_html__('----------------------------------------------- Many More Sections ---------', 'spark-construction-lite'),
			esc_html__('All the above sections can be created with Elementor block page builder or customizer whichever you prefer.', 'spark-construction-lite'),
		),
		'upgrade_text' => esc_html__('Upgrade to Pro', 'spark-construction-lite'),
		'upgrade_url' => apply_filters('sparkconstructionlite-link', esc_url('https://ikreatethemes.com/wordpress-theme/construction-wordpress-theme/') ),
	)));
}
add_action( 'customize_register', 'sparkconstructionlite_themes_customize_register' );


add_action( 'customize_controls_print_scripts', 'sparkconstructionlite_themes_customizer_dynamic_script', 30 );
function sparkconstructionlite_themes_customizer_dynamic_script(){ ?>
	<script type="text/javascript">
		jQuery( function( $ ) {
			wp.customize.panel( 'sparkconstructionlite_frontpage_settings', function( section ) {
				section.expanded.bind( function( isExpanded ) {
					if ( isExpanded ) {
						wp.customize.previewer.previewUrl.set( '<?php echo esc_js( home_url('/') ); ?>' );
					}
				} );
			} );
		} );
	</script>

	<?php
}


function sparkconstructionlite_themes_customize_partial_blogname() {
	bloginfo( 'name' );
}

function sparkconstructionlite_themes_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.1.0
 *
 */
function sparkconstructionlite_themes_customize_preview_js() {

	wp_enqueue_script( 'sparkconstructionlite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sparkconstructionlite_themes_customize_preview_js' );



 if ( ! function_exists( 'sparkconstructionlite_themes_customize_scripts' ) ){

	function sparkconstructionlite_themes_customize_scripts() {
		wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/inc/customizer/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), true);
		$color_picker_strings = array(
			'clear' => __('Clear', 'spark-construction-lite'),
			'clearAriaLabel' => __('Clear color', 'spark-construction-lite'),
			'defaultString' => __('Default', 'spark-construction-lite'),
			'defaultAriaLabel' => __('Select default color', 'spark-construction-lite'),
			'pick' => __('Select Color', 'spark-construction-lite'),
			'defaultLabel' => __('Color value', 'spark-construction-lite'),
		);
		wp_localize_script('wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings);
		wp_enqueue_script('sparkconstructionlite-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-admin.js', array('jquery', 'customize-controls'), true);
		wp_enqueue_script('sparkconstructionlite-customizer-script', get_template_directory_uri() . '/inc/customizer/js/customizer-controls.js', array('jquery', 'wp-color-picker', 'jquery-ui-datepicker'), true);
		wp_enqueue_style('sparkconstructionlite-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-controls.css', array('wp-color-picker'));
	}
}
add_action('customize_controls_enqueue_scripts', 'sparkconstructionlite_themes_customize_scripts');

require get_template_directory() . '/inc/customizer/customizer-control-class.php';
require get_template_directory() . '/inc/customizer/customizer-sanitization.php';


function sparkconstructionlite_themes_sections_reorder() {
    if (isset($_POST['sections'])) {
        set_theme_mod('sparkconstructionlite_frontpage_sections', $_POST['sections']);
    }
    wp_die();
}
add_action('wp_ajax_sparkconstructionlite_sections_reorder', 'sparkconstructionlite_themes_sections_reorder');

function sparkconstructionlite_themes_get_section_position($key) {
    $sections = sparkconstructionlite_themes_homepage_section();
    $position = array_search($key, $sections);
    $return = ( $position + 1 ) * 15;
    return $return;
}

if( !function_exists('sparkconstructionlite_themes_homepage_section') ){
	function sparkconstructionlite_themes_homepage_section(){
		$defaults = apply_filters('sparkconstructionlite_homepage_sections',
			array(
				'sparkconstructionlite_aboutus_section',
				'sparkconstructionlite_promoservice_section',
				'sparkconstructionlite_calltoaction_section',
				'sparkconstructionlite_service_section',
				'sparkconstructionlite_counter_section',
				'sparkconstructionlite_video_calltoaction_section',
				'sparkconstructionlite_recentwork_section',
				'sparkconstructionlite_testimonial_section',
				'sparkconstructionlite_team_section',
				'sparkconstructionlite_client_section',
				'sparkconstructionlite_blog_section',
				'sparkconstructionlite_customa_section',
				'sparkconstructionlite_contact_section',
			)
		);
		$sections = get_theme_mod('sparkconstructionlite_frontpage_sections', $defaults);
        return $sections;
	}
}