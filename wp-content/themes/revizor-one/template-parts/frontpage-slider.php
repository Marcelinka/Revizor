<section class="slider-wrapper grey-border-bottom">

	<ul class="slider owl-carousel" id="frontpageSlider">
			
		<?php

			if( have_rows('slide') ):
			    while ( have_rows('slide') ) : the_row();
			        $images_tpl = array(
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