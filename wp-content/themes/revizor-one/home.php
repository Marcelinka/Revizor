<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package revizor.one
 */

global $wp_query;
$total_pages = $wp_query->max_num_pages;


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main archive-page">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->

		<?php if($total_pages > 1) {
		?>
			<div class="archive-button-wrapper"><button id="archive-button" class="btn archive__more-button" data-total-pages="<?= $total_pages; ?>" data-current-page="1">Ещё новости</button></div>
		<?php } ?>
	</div><!-- #primary -->

<?php
get_footer();