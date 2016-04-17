<?php
/**
 * The template for displaying all pages.
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

  <div class="container">

  <?php
      echo '<div class="content-left-wrap col-md-12">';
    ?>

    <div id="primary" class="content-area">

      <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post();

            get_template_part( 'content', 'page' );

            dynamic_sidebar( 'sidebar-more-testimonials' );


            if ( comments_open() || '0' != get_comments_number() ) :

              comments_template();

            endif;

          endwhile;
        ?>

      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- .container -->

<?php get_footer(); ?>
