<?php

if( !function_exists('sparkconstructionlite_themes_contact_section')){

    function sparkconstructionlite_themes_contact_section() {

        $contact_options = get_theme_mod('sparkconstructionlite_contact_disable', 'enable');

        $contact_detail = get_theme_mod('sparkconstructionlite_show_contact_detail', 'enable');
        $contact_item = get_theme_mod('sparkconstructionlite_contact_detail_item', 'enable');

        if ( !empty( $contact_options ) && $contact_options == 'enable') {
            $team_class = array(
                'section',
                'contact-section'
            );
        ?>
            <section id="contact-section" class="<?php echo esc_attr(implode(' ', $team_class)) ?>">   
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">

                            <?php if(!empty( $contact_item ) && $contact_item == 'enable'){ do_action('sparkconstructionlite_themes_contact_info_section'); } ?>

                            <?php if(!empty( $contact_detail ) && $contact_detail == 'enable'){ ?>
                                <div class="contact-content">
                                    <div class="contact-google-map">
                                        <?php sparkconstructionlite_themes_contact_map(); ?>
                                    </div>
                                    <div class="contact-form">
                                        <?php 
                                            $contact_shortcode = get_theme_mod('sparkconstructionlite_contact_shortcode');
                                            $title = get_theme_mod('sparkconstructionlite_contact_title','Quick Get In Touch');
                                            if( !empty( $title ) ){ 
                                        ?>
                                            <h3 class="section-title"><?php echo esc_html( $title); ?></h3>
                                        <?php } ?>
                                        <?php echo do_shortcode($contact_shortcode); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
    }
}
add_action('sparkconstructionlite_themes_contact', 'sparkconstructionlite_themes_contact_section', 30);


if( !function_exists('sparkconstructionlite_themes_contact_map')){

    function sparkconstructionlite_themes_contact_map() {
            $latitude = get_theme_mod('sparkconstructionlite_latitude', 24.691943);
            $longitude = get_theme_mod('sparkconstructionlite_longitude', 78.403931);
            $mapaddress = get_theme_mod('sparkconstructionlite_contact_map_address');
        ?>
            <div id="google-map" data-latitude="<?php echo floatval($latitude); ?>" data-longitude="<?php echo floatval($longitude); ?>" data-mapaddress="<?php echo esc_html($mapaddress); ?>"></div>
        <?php
    }
}

/** Contact */
do_action('sparkconstructionlite_themes_contact');