<?php
/**
 * The header for template-home.php
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gateway' ); ?></a>

<header id="masthead" class="site-header" role="banner">

   <div class="home-header-bg clearfix">

    <div>
      <nav class="top-bar" data-topbar data-options="mobile_show_parent_link: true">
        <div class="header-logo"></div>
        <section class="top-bar-section">
              <?php 
                $defaults = array(
                      'theme_location' =>  'primary',
                      'container'      =>  false,
                      'menu_class'     =>  'right',
                      'depth'          =>  5,
                      'fallback_cb'    =>  'gateway_demo_header_nav', // located at 'inc/template-tags.php'
                      'items_wrap'     =>  '<ul id="%1$s" class="%2$s">%3$s</ul>',
                      'walker'         =>  new gateway_foundation_walker()
                );

                wp_nav_menu( $defaults )
;              ?>
        </section>

      <section class="top-bar-section right">
      <ul class="menu-top-menu">
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a href="/nhadat/ban">Đăng tin miễn phí</a></li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-110"><a href="/nhadat/ban">Đăng kí</a></li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-112"><a href="/nhadat/wp-login.php">Đăng nhập</a></li>
      </ul>
      </section>
      </nav>
    
    <hr/>

    </div><!-- .stick -->

  </header><!-- .row #masthead -->

  <div id="content" class="site-content">
