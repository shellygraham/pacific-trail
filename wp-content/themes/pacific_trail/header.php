<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Harmonic Northwest Underscores Base Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ) ?>/images/pacifictrail-mark-36x36.png">

	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory')?>/images/pacifictrail-192x192.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory')?>/images/pacifictrail-76x76.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory')?>/images/pacifictrail-120x120.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory')?>/images/pacifictrail-152x152.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory')?>/images/pacifictrail-180x180.png" />
	<link rel="icon" sizes="192x192" href="<?php bloginfo('template_directory')?>/images/pacifictrail-192x192.png" />
	<link rel="icon" sizes="128x128" href="<?php bloginfo('template_directory')?>/images/pacifictrail-128x128.png" />

	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php the_title() ?>" />
	<meta property="og:image" content="<?php bloginfo('template_directory')?>/images/pacifictrail-512x512.png" />
	<meta property="og:url" content="<?php the_permalink() ?>" />
	<meta property="og:site_name" content="Pacific Trail" />
	<!--<meta property="og:description" content=""/>-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Modal -->
<div class="modal">
  <div class="modal-fade-screen">
    <div class="modal-inner">
      <img class="logo" src="<?php bloginfo('template_directory')?>/images/pacifictrail-text-white.png" width="327" height="73" alt="Pacific Trail logo" />
      <div class="modal-close"></div>
      <?php the_field('contact_modal_form', 'options'); ?>
    </div>
  </div>
</div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'base_s' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<!-- Heading Items -->
		<a class="brand" href="<?php bloginfo('url')?>">
			<span class="name"><?php bloginfo('name')?></span>
			<span class="menu"></span>
			
			<img class="big-logo" src="<?php bloginfo('template_directory')?>/images/pacifictrail-text-white.png" alt="Pacific Trail logo" />
	      	<img class="small-logo" src="<?php bloginfo('template_directory')?>/images/pacifictrail-mark-white.png" alt="mountain" />

	      	<!-- alt header swap -->
	      	<!-- <img class="big-logo" src="<?php bloginfo('template_directory')?>/images/pacifictrail.png" alt="Pacific Trail" />
	      	<img class="small-logo" src="<?php bloginfo('template_directory')?>/images/pacifictrail-text-white.png" alt="Pacific Trail" /> -->
		</a>

	    <!-- Main Nav -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		<!-- Mobile Nav -->
		<?php 
			$home_class = 'menu-item';
			if ( is_front_page() ) {
				$home_class .= ' current-menu-item';
			}
		?>
		<nav id="mobile-navigation" class="mobile-navigation">
			<ul>
				<li class="menu-item contact"><a href="#">Contact</a></li>
				<li class="<?php echo $home_class ?>"><a href="<?php bloginfo('url') ?>">Home</a></li>
				<?php
					wp_nav_menu(array(
						'container' => false,
						'items_wrap' => '%3$s',
						'theme_location' => 'primary'
					));
				?>
			</ul>
		</nav>

		<div id="contact-btn" class="contact-btn">Contact</div>

	</header>

	<?php if ( ( $post->post_type == 'product' ) && ( !is_archive() ) ) : ?>
		<div class="site-content">
	<?php endif ?>