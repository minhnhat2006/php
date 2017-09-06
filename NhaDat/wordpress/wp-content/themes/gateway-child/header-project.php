<?php
/**
 * The header for template-property-for-rent.php
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
  <link rel='stylesheet' id='lt-google-webfont-css'  href='//fonts.googleapis.com/css?family=Raleway%3A400%2C300&#038;ver=2.6.0' type='text/css' media='all' />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

<header id="masthead" class="site-header" role="banner">

   <div class="post-header-bg clearfix">

      <div class="header-top">
        <div class="row">
          <div class="large-6 medium-12 columns float-right">
                <ul class="menu user-menu">
                  <li class="login"><a href="#" class="modal-link" data-modal="login-modal">LOGIN / REGISTER</a></li>
                </ul>   
                <ul class="menu social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>         
                <i class="fa fa-search"></i> 
          </div>
        </div>
      </div>

      <nav class="top-bar" data-topbar data-options="mobile_show_parent_link: true">
        <div class="row header-main">
          <div class="branding" style="height: 100px;">
            <a href="#">
              <img alt="logo" src="http://rever.vn/public/images/logo-black.svg"/>
            </a>
          </div>

          <div class="top-bar-section">
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

              wp_nav_menu( $defaults ); ?>
          </div>
        </div>
      </nav>
    </div>

  </header><!-- .row #masthead -->

  <div id="content" class="site-content">
