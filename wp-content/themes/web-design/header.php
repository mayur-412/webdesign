<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web_design
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<!--  header-section start -->

<header class="container">
	<div class="row">
		<div class="mobile-menu">
				<a href="#menu">
					<img src="<?php echo get_template_directory_uri(); ?>/images/menu-bar.png" alt="">
					<img src="<?php echo get_template_directory_uri(); ?>/images/cross.png" alt="">
				</a>
			</div>
		<div class="d-flex">
			<div class="logo">
				<?php
				$logo = get_field('header_logo', 'option');
				?>
			<a href="#" title="logo"><img src="<?php echo $logo['url']; ?>" alt="Logo"></a>
		</div>
		<nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
		</nav>
		<div class="media-link">
			<ul>
				<li><a href="#" title="facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
				<li><a href="#" title="twitter"><i class="fa-brands fa-twitter"></i></a></li>
				<li><a href="#" title="behance"><i class="fa-brands fa-behance"></i></a></li>
				<li><a href="#" title="pinterest"><i class="fa-brands fa-pinterest-p"></i></a></li>
				<li><a href="#" title="dribbble"><i class="fa-brands fa-dribbble"></i></a></li>
			</ul>
		</div>
		</div>
	</div>
</header>

<div class="mobile-opened">
		<nav id="menu">
			<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'menu-open',
								'container'      => false,
							)
						);
			        ?>
		</nav>
	</div>


<!--  header-section end -->
