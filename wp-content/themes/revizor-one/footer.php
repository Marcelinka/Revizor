<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package revizor.one
 */

?>

	</div><!-- #content -->
	
	<div class="footer-wrapper">
		<footer class="footer title-in-top container" id="contacts">
			<h1 class="footer__title">контакты</h1>
			<div class="footer__image-fix">
				<div class="about__image"><?= file_get_contents( get_template_directory_uri().'/img/svg/lightning-white.svg' ) ?></div>
				<div class="footer__information">
					<a href="/"><div class="footer__logo">
						<?= file_get_contents( get_template_directory_uri().'/img/svg/logo.svg' ) ?>
					</div></a>
					<p class="footer__address"><?= the_field('company_address', 'options') ?></p>
					<p class="footer__text">
						<?= the_field('company_phone', 'options') ?> <br>
						<?= the_field('company_email', 'options') ?>
					</p>
					<button class="btn footer__button back-call">Обратный звонок</button>
				</div>
			</div>
		</footer>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<div class="back-call-modal hidden" id="back-call-modal">
	<div class="back-call-modal__overlay"></div>
	<div class="back-call-modal__content">
		<div class="back-call-modal__wrapper">
			<button class="back-call-modal__button" id="back-call-close"><?= file_get_contents( get_template_directory_uri().'/img/svg/delete.svg' ) ?></button>
			<h2>Обратная связь</h2>
			<?php echo do_shortcode('[contact-form-7 id="105" title="Back call"]'); ?>
		</div>
	</div>
</div>

<div class="inf-modal hidden" id="inf-modal">
	<div class="inf-modal__overlay"></div>
	<div class="inf-modal__wrapper">
		<div class="inf-modal__body">
			<button class="inf-modal__close back-call-modal__button hidden hidden_phones"><?= file_get_contents( get_template_directory_uri().'/img/svg/delete.svg' ) ?></button>
			<div class="inf-modal__image">
				<img class="all-image" src="http://revizor-site/wp-content/uploads/2018/02/company-460x439.png" srcset="http://revizor-site/wp-content/uploads/2018/02/company-220x210.png 800w, http://revizor-site/wp-content/uploads/2018/02/company-345x329.png 1440w, http://revizor-site/wp-content/uploads/2018/02/company-460x439.png 1920w, http://revizor-site/wp-content/uploads/2018/02/company-615x587.png 2560w, http://revizor-site/wp-content/uploads/2018/02/company.png 4000w" sizes="100vw">
			</div>
			<div class="inf-modal__content">
				<h2 class="inf-modal__title">Компания "под ключ"</h2>
				<p class="inf-modal__subtitle">Регистрация</p>
				<p class="inf-modal__description">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
				<button class="btn inf-modal__button inf-modal__close">Ок, ясно</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>
