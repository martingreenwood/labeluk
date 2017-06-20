<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labeluk
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<body <?php body_class($pagename); ?>>

	<div id="page" class="site">

		<header id="masthead" class="site-header" role="banner">

			<div class="top">

				<div class="container">

					<div class="site-branding span3">
						<?php if ( function_exists( 'the_custom_logo' ) ): ?>
							<?php the_custom_logo(); ?>
						<?php else: ?>
							<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
					</div>

					<div class="menu span9">

						<button class="menu-toggle">
							<?php esc_html_e( 'Menu', 'labeluk' ); ?>
						</button>

						<ul>
							<li><?php get_search_form( ); ?></li>
							<li><a href="<?php the_field( 'facebook', 'options' ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="<?php the_field( 'twitter', 'options' ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="<?php the_field( 'instagram', 'options' ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="<?php the_field( 'linkedin', 'options' ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="<?php the_field( 'youtube', 'options' ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						</ul>

					</div>

				</div>

			</div>

			<div class="bottom">

				<div class="container">

					<div class="manu span12">
						<nav id="site-navigation" class="main-navigation">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								) );
							?>
						</nav>
					</div>

				</div>

			</div>

		</div>

		</header>

		<div id="content" class="site-content">
