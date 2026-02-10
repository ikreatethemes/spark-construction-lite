<?php

$alignment = get_theme_mod('sparkconstructionlite_blog_single_alignment', 'text-left');

$single_post_top_elements = get_theme_mod('sparkconstructionlite_single_post_top_elements', array('title', 'post_meta', 'content'));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('singlearticle ' .$alignment); ?>>
	<?php

		sparkconstructionlite_themes_post_format_media();

		foreach ($single_post_top_elements as $element) {

			$template_function_name = "sparkconstructionlite_themes_single_{$element}";

			$template_function_name();
		}

	?>
</article><!-- #post-<?php the_ID(); ?> -->