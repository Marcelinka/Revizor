<?php

add_action('wp_ajax_load_news', 'load_news'); // wp_ajax_request_name
add_action('wp_ajax_nopriv_load_news', 'load_news'); // wp_ajax_request_name

function load_news() {

    $page = $_POST['page'];

    // Create query
	$query = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 6,
		'paged'          => $page
	) );

	$total_pages = $query->max_num_pages;
    $html = '';

    // Query posts
	if ( $query->have_posts() ) :

		while ( $query->have_posts() ) : $query->the_post();

            $news_html = 
                '<article class="post">
                    <header class="entry-header"></header>
                    <div class="entry-content">
                        <div class="post__image">' . wp_get_attachment_image( get_post_thumbnail_id( get_field('id') ), 'slide_1080p' ) . '</div>
                        <p class="post__date">' . get_the_date('j F Y') . '</p>
                        <p class="archive-post__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>
                        <p class="archive-post__preview">' . get_field('post_preview') . '</p>
                    </div>
                </article>';

            $html .= $news_html;

		endwhile;

    endif;

    $response = array(
        'totalPages' => $total_pages,
        'newsHtml'  => $html
    );

    echo json_encode($response);

	wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция

}

?>