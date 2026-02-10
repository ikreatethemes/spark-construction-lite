<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	
	<?php sparkconstructionlite_themes_post_format_media(); ?>

	<div class="sparkconstructionlite-page-content-wrap">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spark-construction-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
