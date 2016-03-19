<?php
	// use JustForWeb\ContactForm;
	use JustForWeb\QuoteForm;

	// $contactForm = new ContactForm();
	$contactForm = new QuoteForm();
?>

<section class="contact-us" id="contact">
  <div class="container">
    <!-- SECTION HEADER -->
    <div class="section-header">
      <?php
        global $wp_customize;

        $zerif_contactus_title = get_theme_mod('zerif_contactus_title',__('Get in touch','zerif-lite'));
        if ( !empty($zerif_contactus_title) ):
          echo '<h2 class="white-text">'.wp_kses_post( $zerif_contactus_title ).'</h2>';
        elseif ( isset( $wp_customize ) ):
          echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
        endif;

        $zerif_contactus_subtitle = get_theme_mod('zerif_contactus_subtitle');
        if(isset($zerif_contactus_subtitle) && $zerif_contactus_subtitle != ""):
          echo '<div class="white-text section-legend">'.wp_kses_post( $zerif_contactus_subtitle ).'</div>';
        elseif ( isset( $wp_customize ) ):
          echo '<h6 class="white-text section-legend zerif_hidden_if_not_customizer">'.$zerif_contactus_subtitle.'</h6>';
        endif;
      ?>
    </div>

    <?php
      try{
        if ($contactForm->processForm()) {
          print("
            <div class=\"alert alert-success\" role=\"alert\">
              Message succesfully sent.
            </div>
          ");
        }

      } catch (\Exception $error) {
        printf("
          <div class=\"alert alert-danger\" role=\"alert\">
            <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Error:</span>
            %s
          </div>", $error->getMessage()
        );
      }
    ?>

    <form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">
      <input type="hidden" name="scrollPosition">

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" name="name"
          placeholder="Your Name" required="required"
          value="<?php echo $contactForm->getField("name"); ?>" />
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputEmail">Email</label>
        <input type="text" class="form-control" name="email" id="inputEmail"
          placeholder="Email" required="required"
          value="<?php echo $contactForm->getField("email"); ?>" />
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputMessage">Message</label>
        <textarea class="form-control" name="message" id="inputMessage"
          placeholder="Message"><?php
            echo $contactForm->getField("message");
          ?></textarea>
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <div class="g-recaptcha" id="inputSpam"
          data-sitekey="6Lef1hYTAAAAAGtbweS2SZrD9v2HdiD4COyLBucN">
        </div>
      </div>

      <?php
        $zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label',__('Send Message','zerif-lite'));
        if( !empty($zerif_contactus_button_label) ):
          echo '<button class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">'.$zerif_contactus_button_label.'</button>';
        elseif ( isset( $wp_customize ) ):
          echo '<button class="btn btn-primary custom-button red-btn zerif_hidden_if_not_customizer" type="submit" data-scrollreveal="enter left after 0s over 1s"></button>';
        endif;
        ?>
    </form>

      </div> <!-- / END CONTAINER -->

    </section> <!-- / END CONTACT US SECTION-->
    <?php
  endif;
