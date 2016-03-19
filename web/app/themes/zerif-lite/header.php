<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
<![endif]-->

<?php

if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function zerif_old_render_title() {
?>
<title><?php wp_title( '-', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'zerif_old_render_title' );
endif;

wp_head(); ?>

</head>

<?php if(isset($_POST['scrollPosition'])): ?>

  <body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

  <body <?php body_class(); ?> >

<?php endif;

  global $wp_customize;

  /* Preloader */

  if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ):

    $zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');

    if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
      echo '<div class="preloader">';
        echo '<div class="status">&nbsp;</div>';
      echo '</div>';
    endif;

  endif; ?>


<div id="mobilebgfix">
  <div class="mobile-bg-fix-img-wrap">
    <div class="mobile-bg-fix-img"></div>
  </div>
  <div class="mobile-bg-fix-whole-site">


<header id="home" class="header">

  <div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

    <div class="navbar__header-container ocr__top-menu">
      <div class="container">

        <span class='locations'>
          Serving Niagara, Hamilton, Halton &amp; Surrounding Areas.
        </span>


        <!-- <div class='bbb'> -->
        <!--   <a title="Click for the Business Review of Ontario Concrete Raising -->
        <!--     Ltd, a Concrete Contractors in St Catharines ON" -->
        <!--     target="_blank" -->
        <!--     href="http://www.bbb.org/kitchener/business&#45;reviews/concrete&#45;contractors/ontario&#45;concrete&#45;raising&#45;ltd&#45;in&#45;st&#45;catharines&#45;on&#45;1241231#sealclick"><img -->
        <!--     alt="Click for the BBB Business Review of this Concrete Contractors in St Catharines ON"  -->
        <!--     style="border: 0; height: 85px;" -->
        <!--     src="http://seal&#45;mwco.bbb.org/seals/blue&#45;seal&#45;63&#45;134&#45;ontarioconcreteraisingltd&#45;1241231.png" -->
        <!--   /></a> -->
        <!-- </div> -->

        <?php wp_nav_menu( array('theme_location' => 'header_menu', 'container' => false, 'menu_class' => 'ocr__top-menu-items', 'fallback_cb'     => 'zerif_wp_page_menu')); ?>

      </div>
    </div>

    <div class="container">

      <div class="ocr__logo"><?php
        echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
        echo '<img src="'.get_stylesheet_directory_uri().'/images/ocr-logo.png" alt="'.esc_attr( get_bloginfo('title') ).'">';
        echo '</a>';
        ?>
      </div>

      <div class="navbar-header">

        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

        <span class="sr-only"><?php _e('Toggle navigation','zerif-lite'); ?></span>

        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

        </button>
      </div>

      <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation"   id="site-navigation">
        <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'zerif-lite' ); ?></a>
        <?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list', 'fallback_cb'     => 'zerif_wp_page_menu')); ?>
      </nav>

    </div>

  </div>
  <!-- / END TOP BAR -->
