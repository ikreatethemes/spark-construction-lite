<div class="menu-modal header-mobile-menu cover-modal header-footer-group" data-modal-target-string=".menu-modal">
    <div class="menu-modal-inner modal-inner">
        <div class="menu-wrapper section-inner">
            <div class="menu-top">

                <button class="toggle close-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                    <span class="toggle-text"><?php esc_html_e( 'Close', 'spark-construction-lite' ); ?></span>
                    <i class="fas fa-times"></i>
                </button>

                <div class="sparkconstructionlite-menu-search-form widget_search">
                    <?php get_search_form(); ?>
                </div>

                <div class='sparkconstructionlite-menu-tab-wrap'>
                    <div class="sparkconstructionlite-menu-tabs sparkconstructionlite-tab-area">
                        <button class="sparkconstructionlite-tab-menu active">
                            <span><?php echo esc_html( 'Menu','spark-construction-lite' ) ?></span>
                        </button>
                        <button class="sparkconstructionlite-tab-item">
                            <span><?php echo esc_html( 'Contact','spark-construction-lite' ) ?></span>
                        </button>
                    </div>

                    <div class="custom-tab-content sparkconstructionlite-tab-content">
                        <div class="sparkconstructionlite-tab-menu-content tab-content">
                            <nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'spark-construction-lite' ); ?>" role="navigation">
                                <ul class="modal-menu">
                                    <?php
                                        if ( has_nav_menu( 'primary' ) ) {
                                            wp_nav_menu(
                                                array(
                                                    'container'      => '',
                                                    'items_wrap'     => '%3$s',
                                                    'show_toggles'   => true,
                                                    'theme_location' => 'primary',
                                                )
                                            );
                                        }
                                    ?>
                                </ul>
                            </nav>
                            <?php if( get_theme_mod('sparkconstructionlite_header_button_enable', 'enable') == 'enable' ){ ?>
                                <div class="sparkconstructionlite-menu-button menu-item-button">
                                    <?php sparkconstructionlite_themes_header_button(); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="sparkconstructionlite-tab-item-content tab-content hidden">
                            <?php do_action('sparkconstructionlite_themes_quick_contact_info_header'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>