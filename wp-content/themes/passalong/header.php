<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage MVP
 * @since 1.0
 * @version 1.0
 */
$logo = get_field('logo', 'options');
$logoInverted = get_field('logo_inverted', 'options');
$menu = wp_get_nav_menu_items('Main');

$halved = array_chunk($menu, ceil(count($menu)/2));

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php wp_head(); ?>
	<link rel="dns-prefetch" href="https://use.typekit.net" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="https://use.typekit.net/yqf8bdv.css">
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<script defer src="https://use.fontawesome.com/50bc9976d1.js"></script>
	<script>
		el = document.documentElement;
		if (el.classList)
			el.classList.add('not-active');
		else
			el.className += ' ' + 'not-active';
	</script>


</head>
<body>
	<?php if (is_front_page() == true) :?>
	<nav class="Header Header--home">
	<?php else :?>
	<nav class="Header">
	<?php endif; ?>
		<div class="Container">
			<div class="grid">
				<div class="grid__col grid__col--1-of-4 u-aL Header-logo">
					<a href="#section-0">
						<img class="Header-logo-normal" src="<?php echo $logo ?>">
						<img class="Header-logo-inverted" src="<?php echo $logoInverted ?>">
					</a>
				</div>
				<div class="grid__col grid__col--3-of-4 u-aR">
					<div class="Header-hamburger">
						<i class="Header-bars"></i>
					</div>
				</div>
			</div>
			
			
		</div>
		<section class="SubHeader">
			<div class="Container Container--overflow">
				<div class="grid">
					<div class="grid__col grid__col--1-of-3">
						<span class="Tagline">The Leader in Differentiated Instruction</span>
					</div>
					
				</div>
			</div>
		</section>
		<section class="Header-nav">
			<div class="Container Container--overflow">
				<div class="grid">
					<div class="grid__col grid__col--2-of-2">
						<?php
							$index = 0;
							foreach($halved[0] as $item) {
								$index++;
							?>
								<a class="h2" href="<?php echo $item->url ?>"><?php echo $item->post_title ?></a>
							<?php
							}
						?>
					<?php
							
							foreach($halved[1] as $item) {
								$index++;
							?>
								<a class="h2" href="<?php echo $item->url ?>"><?php echo $item->post_title ?></a>
							<?php
							}
						?>
					</div>
				</div>
			</div>
		</section>
	</nav>
	
	<div class="Main">
		
