<?php get_header();

if ( get_option( 'show_on_front' ) == 'page' ) {

    include( get_page_template() );

}else {

  get_template_part( 'sections/pirate-form-post');

  $zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');

  if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):

    get_template_part( 'sections/big_title' );

  endif;

?>
</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

<div class="row">
  <div id="covid-announcement">
    <h2 class="title">COVID-19 Update</h2>
    <p>
      April 3, 2020: According to the government of Ontario’s updated list of essential businesses we have been deemed essential under section 20 (Maintenance & property repair - ie. trip hazard liability removal). We are still operational this spring serving the residential, commercial and municipal industries. Although we are pleased to continue serving the community, we will be taking proper distancing and cleanliness precautions with all of our staff and customers. We will be implementing contactless quoting, our crews will not exceed 2 persons on a single job site and we will not be entering the homes of our customers. Our concrete raising service is primarily conducted outdoors with the exception of basement floors. For the foreseeable future we will not be performing work on any basement floor.  Please feel free to contact us with any questions or concerns. We wish everyone the best in this unsettling time. 
    </p>
  </div>
</div><div class='clear'></div>

<?php

  /* OUR FOCUS SECTION */

  $zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

  if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):

    get_template_part( 'sections/our_focus' );

  endif;

  /* ABOUT US */

  $zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

  if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):

    get_template_part( 'sections/about_us' );

  endif;

  /* OUR TEAM */

  $zerif_ourteam_show = get_theme_mod('zerif_ourteam_show');

  if( isset($zerif_ourteam_show) && $zerif_ourteam_show != 1 ):

    get_template_part( 'sections/our_team' );

  endif;


  /* RIBBON WITH BOTTOM BUTTON */

  get_template_part( 'sections/ribbon_with_bottom_button' );


  /* TESTIMONIALS */

  $zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

  if( isset($zerif_testimonials_show) && $zerif_testimonials_show != 1 ):

    get_template_part( 'sections/testimonials' );

  endif;

  /* RIBBON WITH RIGHT SIDE BUTTON */

  get_template_part( 'sections/ribbon_with_right_button' );

  /* LATEST NEWS */
  $zerif_latestnews_show = get_theme_mod('zerif_latestnews_show');

  if( isset($zerif_latestnews_show) && $zerif_latestnews_show != 1 ):

    get_template_part( 'sections/latest_news' );

  endif;

	/* CONTACT US */
	get_template_part( 'sections/quote-form' );
	// get_template_part( 'sections/contact-us' );
	// get_template_part( 'sections/pirate-contact-us' );


}
get_footer(); ?>
