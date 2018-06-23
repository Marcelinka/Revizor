<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package revizor.one
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_singular() ) :
				echo '<div class="post__image">' . wp_get_attachment_image( get_post_thumbnail_id( get_field('id') ), 'slide_1080p' ) . '</div>';
				echo '<div class="post__content">';
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'revizor-one' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
				echo '</div>';

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'revizor-one' ),
					'after'  => '</div>',
				) );
			else :
				echo '<div class="post__image">' . wp_get_attachment_image( get_post_thumbnail_id( get_field('id') ), 'slide_1080p' ) . '</div>';
				the_date('j F Y', '<p class="post__date">', '</p>');
				the_title( '<p class="archive-post__title">', '</p>' );
				echo '<p class="archive-post__preview">' . get_field('post_preview') . '</p>';
				echo '<a class="archive-post__link" href="' . get_permalink() . '">Подробнее</a>';
			endif;
		?>
	</div><!-- .entry-content -->
	
	<?php if ( is_singular() ) { ?>
	<a class="btn post__button" onclick="window.history.back()">Вернуться</a>
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
