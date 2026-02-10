<?php

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			$sparkconstructionlite_comment_count = get_comments_number();
			if ( '1' === $sparkconstructionlite_comment_count ) {
				printf(
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'spark-construction-lite' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( 
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $sparkconstructionlite_comment_count, 'comments title', 'spark-construction-lite' ) ),
					number_format_i18n( $sparkconstructionlite_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3>
		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol>
		<?php
			the_comments_navigation();
			if ( ! comments_open() ) :
		?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'spark-construction-lite' ); ?></p>
			<?php
		endif;
	endif; 
	comment_form();
	?>
</div>