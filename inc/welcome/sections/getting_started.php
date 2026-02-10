<div class="welcome-getting-started">
    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Manual Setup', 'spark-construction-lite'); ?></h3>
        <div class="free-pro-demos livepreview">
            <a class="button button-primary" href="https://ikreatethemes.com/wordpress-theme/construction-wordpress-theme/" target="_blank"><span class="dashicons dashicons-visibility"></span><?php echo esc_html__('Live Preview', 'spark-construction-lite'); ?></a>      
            <div class="documentation">
                <a href="<?php echo esc_url('https://docs.ikreatethemes.com/docs/spark-construction-lite/'); ?>" target="_blank" ><?php echo esc_html__('Text Documentation', 'spark-construction-lite'); ?></a> |
                <a href="<?php echo esc_url('https://docs.ikreatethemes.com/docs/spark-construction-lite/'); ?>" target="_blank" ><?php echo esc_html__('Video Documentation', 'spark-construction-lite'); ?></a>
            </div>
        </div>
        <p><?php echo esc_html__('You can set up the home page sections either from Customizer Panel or from Elementor Pagebuilder', 'spark-construction-lite'); ?></p>
        <p><strong><?php echo esc_html__('FROM CUSTOMIZER', 'spark-construction-lite'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Go to Appearance &gt; Customize', 'spark-construction-lite'); ?></li>
            <li><?php echo esc_html__('Click on ', 'spark-construction-lite'); ?><strong>"<a href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=static_front_page')); ?>"><?php echo esc_html__('Enable Front Page', 'spark-construction-lite'); ?></a>"</strong> <?php echo esc_html__('and turn on the option for "Enable FrontPage" Setting.', 'spark-construction-lite'); ?></li>
            <li><?php echo sprintf( esc_html__('Now go back to %s and set up the FrontPage Section', 'spark-construction-lite'), '<a href="'.esc_url(admin_url('customize.php?autofocus[panel]=sparkconstructionlite_frontpage_settings')).'">' . esc_html__('Home Sections', 'spark-construction-lite') . '</a>'); ?></li>
        </ol>
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'spark-construction-lite'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Firstly install and activate "Elementor Website Builder" plugin from', 'spark-construction-lite'); ?> <a href="<?php echo esc_url(admin_url('themes.php?page=tgmpa-install-plugins')); ?>"><?php echo esc_html__('Recommended Plugin page.', 'spark-construction-lite'); ?></a></li>
            <li><?php echo esc_html__('Create a new page and edit with Elementor. Drag and drop the elements in the Elementor to create your own design.', 'spark-construction-lite'); ?></li>
            <li><?php echo esc_html__('Now go to Appearance &gt; Customize &gt; Homepage Settings and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'spark-construction-lite'); ?></li>
        </ol>
        <p><strong><?php echo esc_html__('For detailed documentation, please visit', 'spark-construction-lite'); ?> <a href="<?php echo esc_url('https://docs.ikreatethemes.com/docs/spark-construction-lite/'); ?>" target="_blank"><?php echo esc_html__('Documentation Page.', 'spark-construction-lite'); ?></a></strong></p>
    </div>
    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'spark-construction-lite'); ?></h3>
        <div class="free-pro-demos livepreview">
            <?php echo $this->sparkconstructionlite_setup_content(); ?>
        </div>
        <div class="welcome-demo-import-text">
            <p><?php echo sprintf(esc_html__('Click on the above button to install and activate the Demo Importer plugin. For more detailed documentation on how the demo importer works, click %s.', 'spark-construction-lite'), '<a href="https://docs.ikreatethemes.com/docs/spark-construction-lite/" target="_blank">' . esc_html__('here', 'spark-construction-lite') . '</a>'); ?></p>
        </div>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'spark-construction-lite'), esc_html($this->theme_name)); ?>">
        </div>
    </div>
</div>