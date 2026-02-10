<?php

if (! function_exists( 'sparkconstructionlite_themes_recentwork_default' ) ):

    function sparkconstructionlite_themes_recentwork_default() {

        $portfolio_options = get_theme_mod('sparkconstructionlite_portfolio_disable','enable');
        if( !empty( $portfolio_options ) && $portfolio_options == 'enable' ){

            $service_class = array(
                'section',
                'recentwork-section',
            );
        ?>
            <section id="recentwork-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>">
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">
                            <?php 
                                $titlestyle = get_theme_mod('sparkconstructionlite_recentwork_title_align', 'text-center');
                                $super_title = get_theme_mod('sparkconstructionlite_recentwork_super_title');
                                $title = get_theme_mod('sparkconstructionlite_recentwork_title');
                                $designstyle = get_theme_mod('sparkconstructionlite_recentwork_title_style','style1');

                                sparkconstructionlite_themes_section_title( $super_title, $title, $titlestyle, $designstyle ); 

                                sparkconstructionlite_themes_recentwork_advance_sections();
                            ?>
                        </div>
                    </div>
                </div>
            </section>
    <?php } }
endif;
add_action('sparkconstructionlite_themes_action_recentwork', 'sparkconstructionlite_themes_recentwork_default', 55);


/****
 * Advance Portfolio 
 */
if( !function_exists('sparkconstructionlite_themes_recentwork_advance_sections')){

    function sparkconstructionlite_themes_recentwork_advance_sections(){ 

        $display_layout = get_theme_mod('sparkconstructionlite_gallery_display_layout','style6');
        $block_space = get_theme_mod('sparkconstructionlite_recentwork_block_space',1);

        $gallery_area = get_theme_mod('sparkconstructionlite_recentwork_gallery');
        if($gallery_area){
            $gallery_area_items = json_decode($gallery_area);
        ?> 
            <div class="sparkconstructionlite-gallery-block-wrap">
                <?php 
                    $tab_align = get_theme_mod('sparkconstructionlite_gallery_tab_align', 'center');
                    $tab_wrap_class = array("sparkconstructionlite-gallery-item-wrap", $tab_align);
                    $default_text = get_theme_mod('sparkconstructionlite_gallery_default_text');
                ?>
                <div class="<?php echo esc_attr(implode(' ', $tab_wrap_class)); ?>">
                    <div class="sparkconstructionlite-gallery-name-wrap" data-active="*">
                        <?php if( !empty( $default_text ) ){ ?>
                            <div class="sparkconstructionlite-gallery-item-name default-item-name active" data-filter="*">
                                <?php echo esc_html( $default_text ); ?>
                            </div>
                        <?php } ?>
                        <?php 
                            foreach ($gallery_area_items as $gallery_area_item) {
                            $category_slug = sanitize_title_with_dashes($gallery_area_item->title); 
                            if( !empty( $gallery_area_item->title ) ){
                        ?>
                            <div class="sparkconstructionlite-gallery-item-name" data-filter=".<?php echo esc_attr($category_slug); ?>">
                                <?php echo esc_html(($gallery_area_item->title)); ?>
                            </div>
                        <?php } } ?>
                    </div>
                </div>
                <div class="sparkconstructionlite-gallery-content-wrap <?php echo esc_attr( $display_layout ); ?>" data-gutter="<?php echo intval( $block_space ); ?>">
                    <div class="sparkconstructionlite-gallery-content">
                        <?php 
                            foreach ($gallery_area_items as $gallery_area_item) {
                                
                                $category_slug = sanitize_title_with_dashes($gallery_area_item->title);

                                $gallerys = explode(',', $gallery_area_item->gallery) ;

                                foreach($gallerys as $gallery){

                                $gallery_image_large = wp_get_attachment_image_src($gallery,'full');
                                $gallery_title = get_the_title($gallery);
                                $gallery_caption = wp_get_attachment_caption($gallery);

                                if($gallery_image_large) {
                            ?>
                                <div class="sparkconstructionlite-gallery-content-item <?php echo esc_attr( $category_slug ); ?>">
                                    <div class="sparkconstructionlite-gallery-wrap">
                                        <div class="sparkconstructionlite-gallery-name" style="background-image: url(<?php echo esc_url( $gallery_image_large[0] ) ?>);">
                                            <?php 
                                                $caption = get_theme_mod('sparkconstructionlite_gallery_caption_disable', 'enable');
                                                if( !empty( $caption ) && $caption == 'enable' ){
                                            ?>
                                                <div class="sparkconstructionlite-gallery-caption">
                                                    <?php if( !empty( $gallery_title ) ){ ?>
                                                        <h4><?php echo esc_html( $gallery_title ); ?></h4>
                                                    <?php } ?>
                                                    <?php if( !empty( $gallery_caption ) ){ ?>
                                                        <p><?php echo esc_html( $gallery_caption ); ?></p>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                            <?php 
                                                $zoom_icon = get_theme_mod('sparkconstructionlite_gallery_zoom_icon_disable', 'enable');
                                                if( !empty( $zoom_icon ) && $zoom_icon == 'enable' ){
                                            ?>
                                                <a class="sparkconstructionlite-gallery-image-large" href="<?php echo esc_url( $gallery_image_large[0] ) ?>" rel="portfolio[work]">
                                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } } } ?>
                    </div>
                </div>
            </div>
        <?php } 
    }
}

do_action('sparkconstructionlite_themes_action_recentwork');