<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package revizor.one
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<div class="grey-border-bottom header-wrapper">
		<header id="masthead" class="site-header container">
			<div class="site-branding">
				<a href="/"><div class="header__logo">
					<?= file_get_contents( get_template_directory_uri().'/img/svg/logo.svg' ) ?>
				</div></a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		
			<button class="btn header__button back-call">Обратный звонок</button>
			<button class="hidden hidden_phones header__menu-button" id="header__menu-button"><?= file_get_contents( get_template_directory_uri().'/img/svg/menu_icon.svg' ) ?></button>

		</header><!-- #masthead -->
	</div>
	<div class="hidden hidden_phones header__mobile-menu-wrapper header__mobile-menu-wrapper_hidden" id="mobile-menu">
		<div class="header__modal-overlay"></div>
		<div class="header__mobile-menu">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
			<button class="btn header__mobile-button back-call">Обратный звонок</button>
		</div>
	</div>
	
	<div id="content" class="site-content">
