<section class="news title-in-top container" id="news">
	<h1 class="news__title">новости</h1>
	
	<div class="news-wrapper">
		
		<?php 

		$query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 3
        ) );
		if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post(); 

		?>
		
		<a class="news__href" href="<?= the_permalink() ?>">
			<article class="news__post">
				<div class="news__column news__post-title"><?= the_title() ?></div>
				<div class="news__column news__date"><?= the_time('j F Y') ?></div>
				<div class="news__column news__preview"><?= get_field('post_preview') ?></div>
			</article>
		</a>

      	<?php endwhile; endif; ?>

      	<a class="news__button btn" href="<?= get_post_type_archive_link( 'post' ) ?>">Все новости</a>
	</div>
</section>