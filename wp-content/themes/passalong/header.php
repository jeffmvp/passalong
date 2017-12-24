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
	<link href="https://fonts.googleapis.com/css?family=Amaranth:400,400i,700,700i|Arimo:400,400i,700,700i" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/50bc9976d1.js"></script>



</head>
<body>
	<nav class="Header">
		<div class="Container">
			<div class="grid">
				<div class="grid__col grid__col--1-of-4 u-aL Header-logo">
					<a href="/">
						<img class="Header-logo" src="<?php echo $logo ?>">
					</a>
				</div>
				<div class="grid__col grid__col--3-of-4 u-aR">
					<div class="Header-hamburger">
						<i class="Header-bars"></i>
					</div>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="Main">
		
