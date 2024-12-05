<?php
/**
* Header File for theme
*
* Displays all of the <head> section, header and top navigation areas
*
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if (get_theme_option('branding-favicon') == "") { ?>
	<link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<?php } else { ?>
	<link rel="Shortcut Icon" href="<?php echo get_theme_option('branding-favicon'); ?>" type="image/x-icon" />
	<?php } ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>"> 

	<?php 
	//Show Theme Options Header Scripts here
	echo trim(stripslashes(get_theme_option('header-script'))); 
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class('custom'); ?>>

<div id="outerwrap" class="outside">

	<header class="main-header " role="banner">
	
		<div class="wrap">
		
		<button id="mobile-menu-btn">
			<?php _e('Menu', 'thesportsbook'); ?>
		</button>
		
		<nav id="mobile-menu">  
				<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'mobilenav','menu_id'=> 'mobilenav')); ?>
		</nav><!--End of Mobile Navbar-->

			<div class="header-logo">
			
			<?php if (get_theme_option('header-logo') != ""): ?>
			<a title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>">
			<img alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_option('header-logo'); ?>" /></a>
			<?php else: ?>
			<h3><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h3>

			<?php endif;?>
			</div><!--.header-logo-->

			<?php if ( is_active_sidebar( 'headertop-widgets' ) ) : ?>
				<div class="headerwidgets">
				
					<?php dynamic_sidebar('headertop-widgets'); ?>
				
				</div><!--.Widgets Heading-->
			<?php endif; ?>

			<nav class="navbar" role="navigation" id="navigation">
			
			<!--Check to see if Search has been enabled or not -->
			<?php if (!get_theme_option('header-search-disable')) { ?>
			<div class="searchgo">
				<form class="topsearchform" method="get" action="<?php bloginfo('url'); ?>">
		  <input placeholder="<?php _e('Search', 'thesportsbook'); ?>..." class="topsearchinput" value=""   type="text" name="s" />
		  <input name="submit" type="submit" class="topsearchsubmit" value="" />
				</form>
			</div>
			<?php } ?>

			<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'nav','menu_id'=> 'nav','fallback_cb' => 'fly_default_menu','link_before'     => '<span>','link_after'  => '</span>',) ); ?>

			<div class="clearboth"></div>

			</nav><!--Nav--> 

		<div class="clearboth"></div>
		
		</div><!--wrap--> 
		 
	</header><!--.main-header-->