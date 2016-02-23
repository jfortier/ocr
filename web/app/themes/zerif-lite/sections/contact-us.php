<section class="contact-us" id="contact">

  <div class="container">

    <!-- SECTION HEADER -->
    <div class="section-header">
      <h2 class="white-text">Request a Quote</h2>
    </div>

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

    <!-- / END SECTION HEADER -->

    <form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

      <input type="hidden" name="scrollPosition">

      <input type="hidden" name="submitted" id="submitted" value="true" />

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <label for="name" class="screen-reader-text"><?php _e( 'Your Name', 'zerif-lite' ); ?></label>
        <input required="required" type="text" name="name" id="name" placeholder="<?php _e('Your Name','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['name'])) echo esc_attr($_POST['name']);?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
        <label for="email" class="screen-reader-text"><?php _e( 'Your Email', 'zerif-lite' ); ?></label>
        <input required="required" type="email" name="email" id="email" placeholder="<?php _e('Your Email','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['email'])) echo is_email($_POST['email']) ? $_POST['email'] : ""; ?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
        <label for="subject" class="screen-reader-text"><?php _e( 'Subject', 'zerif-lite' ); ?></label>
        <input required="required" type="text" name="subject" id="subject" placeholder="<?php _e('Subject','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['subject'])) echo esc_attr($_POST['subject']);?>">
      </div>

      <div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">
        <label for="message" class="screen-reader-text"><?php _e( 'Your Message', 'zerif-lite' ); ?></label>
        <textarea name="message" id="message" class="form-control textarea-box" placeholder="<?php _e('Your Message','zerif-lite'); ?>"><?php if(isset($_POST['message'])) { echo esc_html($_POST['message']); } ?></textarea>
      </div>

      <?php
        echo '<button class="btn btn-primary custom-button red-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">Send Request</button>';

        echo '<div class="g-recaptcha zerif-g-recaptcha" data-sitekey="' . esc_attr( getenv('RECAPTCHA_KEY') ) . '"></div>';
      ?>

    </form>
  </div>

  <!-- / END CONTACT FORM-->
</div> <!-- / END CONTAINER -->

</section> <!-- / END CONTACT US SECTION-->
