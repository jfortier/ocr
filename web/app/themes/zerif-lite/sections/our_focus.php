<section class="focus" id="focus">

<div class="container">

  <!-- SECTION HEADER -->

  <!-- <div class="section&#45;header"> -->

    <!-- SECTION TITLE -->

    <?php
    // global $wp_customize;
    //
    // $zerif_ourfocus_title = get_theme_mod('zerif_ourfocus_title',__('FEATURES','zerif-lite'));
    //
    // if( !empty($zerif_ourfocus_title) ):
    //   echo '<h2 class="dark-text">'.wp_kses_post( $zerif_ourfocus_title ).'</h2>';
    // elseif ( isset( $wp_customize ) ):
    //   echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
    // endif;
    //
    // $zerif_ourfocus_subtitle = get_theme_mod('zerif_ourfocus_subtitle',__('What makes this single-page WordPress theme unique.','zerif-lite'));
    //
    // if( !empty($zerif_ourfocus_subtitle) ):
    //   echo '<div class="section-legend">'.wp_kses_post( $zerif_ourfocus_subtitle ).'</div>';
    // elseif ( isset( $wp_customize ) ):
    //   echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
    // endif;

    ?>

  <!-- </div> -->

  <div class="row">

      <?php
      if ( is_active_sidebar( 'sidebar-ourfocus' ) ) :
        dynamic_sidebar( 'sidebar-ourfocus' );
      else:

        if ( file_exists( get_stylesheet_directory_uri().'/images/parallax.png' ) ):
          the_widget( 'zerif_ourfocus','title=PARALLAX EFFECT&text=Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.&link=#&image_uri='.get_stylesheet_directory_uri()."/images/parallax.png", array('before_widget' => '', 'after_widget' => '') );
        else:
          the_widget( 'zerif_ourfocus','title=PARALLAX EFFECT&text=Create memorable pages with smooth parallax effects that everyone loves. Also, use our lightweight content slider offering you smooth and great-looking animations.&link=#&image_uri='.get_template_directory_uri()."/images/parallax.png", array('before_widget' => '', 'after_widget' => '') );
        endif;

        if ( file_exists( get_stylesheet_directory_uri().'/images/woo.png' ) ):
          the_widget( 'zerif_ourfocus','title=WOOCOMMERCE&text=Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.&link=#&image_uri='.get_stylesheet_directory_uri()."/images/woo.png", array('before_widget' => '', 'after_widget' => '') );
        else:
          the_widget( 'zerif_ourfocus','title=WOOCOMMERCE&text=Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.&link=#&image_uri='.get_template_directory_uri()."/images/woo.png", array('before_widget' => '', 'after_widget' => '') );
        endif;

        if ( file_exists( get_stylesheet_directory_uri().'/images/ccc.png' ) ):
          the_widget( 'zerif_ourfocus','title=CUSTOM CONTENT BLOCKS&text=Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.&link=#&image_uri='.get_stylesheet_directory_uri()."/images/ccc.png", array('before_widget' => '', 'after_widget' => '') );
        else:
          the_widget( 'zerif_ourfocus','title=CUSTOM CONTENT BLOCKS&text=Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.&link=#&image_uri='.get_template_directory_uri()."/images/ccc.png", array('before_widget' => '', 'after_widget' => '') );
        endif;

        if ( file_exists( get_stylesheet_directory_uri().'/images/ti-logo.png' ) ):
          the_widget( 'zerif_ourfocus','title=GO PRO FOR MORE FEATURES&text=Get new content blocks: pricing table, Google Maps, and more. Change the sections order, display each block exactly where you need it, customize the blocks with whatever colors you wish.&link=#&image_uri='.get_stylesheet_directory_uri()."/images/ti-logo.png", array('before_widget' => '', 'after_widget' => '') );
        else:
          the_widget( 'zerif_ourfocus','title=GO PRO FOR MORE FEATURES&text=Get new content blocks: pricing table, Google Maps, and more. Change the sections order, display each block exactly where you need it, customize the blocks with whatever colors you wish.&link=#&image_uri='.get_template_directory_uri()."/images/ti-logo.png", array('before_widget' => '', 'after_widget' => '') );
        endif;

      endif;
      ?>

  </div>

</div> <!-- / END CONTAINER -->

</section>  <!-- / END FOCUS SECTION -->
