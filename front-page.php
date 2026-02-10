<?php 

get_header();

do_action( 'sparkconstructionlite_themes_enable_front_page' );

$enable_front_page = get_theme_mod( 'sparkconstructionlite_enable_frontpage', 'disable' );

if ( $enable_front_page === 'enable' || $enable_front_page === true ) {
    $sparkconstructionlite_home_sections = sparkconstructionlite_themes_homepage_section();
    
    if ( is_array( $sparkconstructionlite_home_sections ) && ! empty( $sparkconstructionlite_home_sections ) ) {
        foreach ( $sparkconstructionlite_home_sections as $sparkconstructionlite_homepage_section ) {
            $sparkconstructionlite_homepage_section = str_replace( 'sparkconstructionlite_', '', $sparkconstructionlite_homepage_section );
            $sparkconstructionlite_homepage_section = str_replace( '_section', '', $sparkconstructionlite_homepage_section );
            
            get_template_part( 'section/section', $sparkconstructionlite_homepage_section );
        }
    }
}

get_footer();