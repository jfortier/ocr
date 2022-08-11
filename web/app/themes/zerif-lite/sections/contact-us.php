<?php
	use JustForWeb\ContactForm;
	$contactForm = new ContactForm();

  if ( isset($_POST['action']) && $_POST['action'] == 'validate_contact') {
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
  }
  ?>
<section class="ocr__contact">
    <?php //the #contact is the better scroll position even though it looks wrong here ?>
    <form role="form" method="POST" action="/contact-us" class="contact-form" id="contact-form">

      <input type="hidden" id="g-recaptcha-response-contact" name="g-recaptcha-response-contact">
      <input type="hidden" name="action" value="validate_contact">

      <input type="hidden" name="scrollPosition">

      <div class="col-sm-12 zerif-rtl-contact-name text-left" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" name="fullname"
          placeholder="Your Name" required="required"
          value="<?php echo $contactForm->getField("fullname"); ?>" />
      </div>

      <div class="col-sm-12 zerif-rtl-contact-name text-left" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputEmail">Email</label>
        <input type="text" class="form-control" name="contact-email" id="inputEmail"
          placeholder="Email" required="required"
          value="<?php echo $contactForm->getField("contact-email"); ?>" />
      </div>

      <div class="col-sm-12 zerif-rtl-contact-name text-left" data-scrollreveal="enter left after 0s over 1s">
        <label for="inputMessage">Message</label>
        <textarea class="form-control" name="message" id="inputMessage"
          placeholder="Message"><?php
            echo $contactForm->getField("message");
          ?></textarea>
      </div>

      <?php $zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label',__('Send Message','zerif-lite')); ?>
      <button class="g-recaptcha btn btn-primary custom-button red-btn"
        type="submit"
        id="submit-contact-form"
        data-sitekey="<?php echo getenv('RECAPTCHA_KEY'); ?>"
        data-callback='onSubmitContact'
        data-scrollreveal="enter left after 0s over 1s">
          <?php echo $zerif_contactus_button_label; ?>
      </button>

      <script src="https://www.google.com/recaptcha/api.js?render=<?php echo getenv('RECAPTCHA_KEY'); ?>"></script>
      <script type="text/javascript">
          function onSubmitContact(token){
            grecaptcha.ready(function() {
              // do request for recaptcha token
              // response is promise with passed token
              grecaptcha.execute('<?php echo getenv('RECAPTCHA_KEY'); ?>', {action:'submit'}).then(function(token) {
                // add token value to form
                document.getElementById('g-recaptcha-response-contact').value = token;
                document.getElementById('contact-form').submit();
              })
            })
          }
      </script>
    </form>

  </section> <!-- / END CONTACT US SECTION-->
