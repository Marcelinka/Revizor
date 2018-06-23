<?php

get_header(); ?>

	<div>

		<section class="slider-wrapper grey-border-bottom">
			<ul class="slider owl-carousel" id="frontpageSlider">
			
			<?php

			if( have_rows('slide') ):
			    while ( have_rows('slide') ) : the_row();
			        $images_tpl = array (
			        	'800'  => 'slide_Phones',
			        	'1440' => 'slide_720p',
			        	'1920' => 'slide_1080p',
			        	'2560' => 'slide_Retina',
			        	'4000' => 'slide_4K'
			        );

					?>

					<li class="slider-item">
						<div class="slider-content-wrapper container">
							<div class="slider__text">
								<h2 class="slider__title"><?= get_sub_field('slide_title') ?></h2>
								<a class="slider__link btn" href="<?= get_permalink( get_sub_field('slide_href')->ID ) ?>">Подробнее</a>
							</div>
							<div class="slider__image-wrapper">
								<?= makeImgHtml( get_sub_field('slide_image'), $images_tpl, 'slider__image' ) ?>
							</div>
							<a class="hidden hidden_phones slider__phone-btn btn" href="<?= get_permalink( get_sub_field('slide_href')->ID ) ?>">Подробнее</a>
						</div>
					</li>

			        <?php

			    endwhile;
			endif;

			?>

			</ul>

			<div id="frontpageSliderControls" class="slides-controls">
				<?php 
					$slider = get_field('slide');
					function countNavWidth( $slider, $dotWidth, $navMargin ) {
						$number_of_slides = count( $slider );
						$width = $number_of_slides * $dot_width + ( $dot_width * ( $number_of_slides - 1) ) + $navMargin * 2;
						return $width;
					}
					$nav_width = countNavWidth( $slider, 11, 100 );
				?>
				<div class="slides-controls__dots"></div>
				<div class="slides-controls__nav" style="width: <?= $nav_width . 'px;' ?> "></div>
			</div>

		</section>
		
		<div id="services">
			<div class="grey-border-bottom">
				<section class="services title-in-top container">
					<h1 class="services__title">услуги</h1>

					<?php

					$query = new WP_Query( array(
		                'post_type' => 'services',
		                'posts_per_page' => 3
		            ) );

					$service_number = 1;

		            foreach($query->posts as $key => $value) {
		            	$id = $value->ID;
		            	$img_tpl = array (
		            		'800'  => 'service_Phones',
				        	'1440' => 'service_720p',
				        	'1920' => 'service_1080p',
				        	'2560' => 'service_Retina',
				        	'4000' => 'service_4K'
		            	);
		            	$image = makeImgHtml( get_field('service_image', $id), $img_tpl, 'all-image' );
		            	$title = $value->post_title;
		            	?>
						
						<div class="service">
							<div class="service__image-wrapper">
								<?= $image ?>
							</div>
							<div class="service__number"><?= $service_number ?></div>
							<div class="service__description">
								<h2><?= $title ?></h2>
								<p class="service__text"><?= get_field('service_description', $id) ?></p>
								<ul class="service__feature-list">

				       			<?php foreach( get_field('service_features', $id) as $key => $value ) { 
				       				$feature = $value['service_feature_title'];
				       				?>
									<li class="service__elem-list">
										<button data-photo="<?= $image ?>" data-title="<?= $title ?>" data-subtitle="<?= $feature ?>" data-descr="<?= $value['service_feature_description'] ?>" class="service__feature inform-modal-button">
											<div><?= $feature ?></div>
										</button></li>
				       			<?php } ?>
						
								</ul>
								<button class="btn service__button back-call">Оставить заявку</button>

								<?php if(count($query->posts) != $service_number) { ?>

								<div class="service__line"></div>
								
								<?php } ?>

							</div>
						</div>

		       			<?php

		       			$service_number++;
		            }

					?>
				</section>
			</div>
		</div>

		<div class="about-wrapper grey-border-bottom">
			<section class="about title-in-top container" id="about">
				<h1 class="about__title">о нас</h1>
				<div class="about__image"><?= file_get_contents( get_template_directory_uri().'/img/svg/lightning.svg' ) ?></div>
				<div class="about__text"><?= get_field('about') ?></div>
			</section>
		</div>

		<div class="grey-border-bottom">
			<section class="revizor title-in-top container" id="stuff">
				<h1 class="revizor__title">ревизор</h1>
				<div class="revizor__information-wrapper">
					<div class="revizor__specialist-wrapper">
						<?php  

						$imgTpl = array (
							'800' => 'about_Phones',
							'1920' => 'about_1080p',
							'4000' => 'about_4K'
						);

						?>
						<div class="revizor__photo"><?= makeImgHtml( get_field('revizor_photo'), $imgTpl, 'all-image' ) ?></div>
						<div class="revizor__information">
							<p class="revizor__name"><?= get_field('revizor_name') ?></p>
							<p class="revizor__position"><?= get_field('revizor_position') ?></p>
							<div class="revizor__description"><?= get_field('revizor_description') ?></div>
						</div>
					</div>
					<div class="revizor__gallery-wrapper">
						<?php 

						$imgTpl = array (
							'1920' => 'document_1080p',
							'4000' => 'document_4K'
						);
						foreach( get_field('revizor_documents') as $key => $value ) {
							$image = makeImgHtml( $value['revizor_document_photo'], $imgTpl, 'all-image' );

							?>
						
							<div class="revizor__document">
								<button data-photo="<?= $image ?>" data-title="Сертификаты" data-subtitle="<?= $value['revizor_document_name'] ?>" data-descr="<?= $value['revizor_document_description'] ?>" class="revizor__document-button inform-modal-button">
								<div class="revizor__document-img-wrapper"></div>
								<?= $image ?>
								</button>
							</div>

						<?php } ?>
					</div>
				</div>
			</section>
		</div>

		<?php
			// новости
			get_template_part( 'template-parts/frontpage', 'news' );
		?>
		
	</div>

<?php
get_footer();