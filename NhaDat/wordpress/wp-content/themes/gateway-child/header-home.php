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
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a href="ban">Đăng tin miễn phí</a></li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-110"><a href="wp-login.php?action=register" class="simplemodal-register">Đăng kí</a></li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-112"><a href="wp-login.php" class="simplemodal-login">Đăng nhập</a></li>
      </ul>
      </section>
      </nav>
    
    <hr/>

    </div><!-- .stick -->

    <div class="site-branding">

      <?php $header_logo = get_theme_mod( 'header_logo' ); if ( ! $header_logo ) { ?>

        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

        <h2><?php bloginfo( 'description' ); ?></h2>

      <?php } else { ?>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo esc_url( $header_logo ); ?>" alt=""></a>

      <?php } ?>

    </div><!-- .site-branding -->

    <div class="hero-widgets-wrap">

      <div class="row">

        <div class="large-8 large-centered columns">
          
          <?php if ( is_active_sidebar( 'home-hero' ) ) { ?>

            <?php dynamic_sidebar( 'home-hero' ); ?>

          <?php } ?>

        </div><!-- .large-8 -->

      </div><!-- .row -->

    </div><!-- .hero-widgets-wrap -->

  </div><!-- .header-bg -->

  </header><!-- .row #masthead -->

  <div id="content" class="site-content">
