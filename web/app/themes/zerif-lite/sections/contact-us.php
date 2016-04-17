<?php
	use JustForWeb\ContactForm;
	$contactForm = new ContactForm();

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
<section class="ocr__contact">
    <form role="form" method="POST" action="/contactHandler.php" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">
      <input type="hidden" name="scrollPosition">

      <div class="col-sm-12 zerif-rtl-contact-name text-left" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" name="name"
          placeholder="Your Name" required="required"
          value="<?php echo $contactForm->getField("name"); ?>" />
      </div>

      <div class="col-sm-12 zerif-rtl-contact-name text-left" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputEmail">Email</label>
        <input type="text" class="form-control" name="email" id="inputEmail"
          placeholder="Email" required="required"
          value="<?php echo $contactForm->getField("email"); ?>" />
      </div>

      <div class="col-sm-12 zerif-rtl-contact-name text-left" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputMessage">Message</label>
        <textarea class="form-control" name="message" id="inputMessage"
          placeholder="Message"><?php
            echo $contactForm->getField("message");
          ?></textarea>
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <div class="g-recaptcha zerif-g-recaptcha" data-sitekey="<?php
          echo esc_attr( getenv('RECAPTCHA_KEY') );
        ?>"></div>
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

  </section> <!-- / END CONTACT US SECTION-->
