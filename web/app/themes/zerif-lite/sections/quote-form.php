<?php
	// use JustForWeb\ContactForm;
	use JustForWeb\QuoteForm;
	$quoteForm = new QuoteForm();
?>

<section class="contact-us" id="contact">
  <div class="container">

    <!-- SECTION HEADER -->
    <div class="section-header">
      <h2 class="white-text">Request a Quote</h2>
    </div>

    <?php
      if ( isset($_POST['action']) && $_POST['action'] == 'validate_quote') {
        try{
          if ($quoteForm->processForm()) {
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

    <!-- / END SECTION HEADER -->

    <?php //the #contact is the better scroll position even though it looks wrong here ?>
    <form id="quote-form" role="form" method="POST" action="/#contact"
       class="contact-form"
    >

      <input type="hidden" id="g-recaptcha-response-quote" name="g-recaptcha-response-quote">
      <input type="hidden" name="action" value="validate_quote">


      <input type="hidden" name="scrollPosition">

      <input type="hidden" name="submitted" id="submitted" value="true" />

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <label for="name" class="screen-reader-text"><?php _e( 'Your Name', 'zerif-lite' ); ?></label>
        <input required="required" type="text" name="fullname" id="fullname" placeholder="<?php _e('Your Name','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['fullname'])) echo esc_attr($_POST['fullname']);?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
        <label for="email" class="screen-reader-text"><?php _e( 'Your Email', 'zerif-lite' ); ?></label>
        <input required="required" type="email" name="contact-email" id="contact-email" placeholder="<?php _e('Your Email','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['email'])) echo is_email($_POST['contact-email']) ? $_POST['contact-email'] : ""; ?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
        <label for="city" class="screen-reader-text"><?php _e( 'City', 'zerif-lite' ); ?></label>
        <input required="required" type="text" name="city" id="city" placeholder="<?php _e('City','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['city'])) echo esc_attr($_POST['city']); ?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">
        <label for="callback" class="screen-reader-text"><?php _e( 'Preferred Callback Time', 'zerif-lite' ); ?></label>
        <input type="text" name="callback" id="callback" placeholder="<?php _e('Preferred Callback Time','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['callback'])) echo esc_attr($_POST['callback']);?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
        <label for="phone" class="screen-reader-text"><?php _e( 'Phone Number', 'zerif-lite' ); ?></label>
        <input required="required" type="tel" name="phone" id="phone" placeholder="<?php _e('Phone','zerif-lite'); ?>" class="form-control input-box" value="<?php if(isset($_POST['phone'])) echo esc_attr($_POST['phone']);?>">
      </div>

      <div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
        <label for="subject" class="screen-reader-text"><?php _e( 'How Did You Hear About Us?', 'zerif-lite' ); ?></label>
        <select class="form-control input-box select-box" name="how" id="how">
          <option value="">How Did You Hear About Us?</option>

          <option value="Advertisement">Advertisement</option>
          <option value="Internet Search">Internet Search</option>
          <option value="Phone Book">Phone Book</option>
          <option value="Referral">Referral</option>
        </select>
      </div>

      <div class="container-fluid" data-scrollreveal="enter right after 0s over 1s" >

        <div class="contact__checkboxes row">

          <h4>Select all that apply</h4>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Sidewalk"> Sidewalk
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Patio"> Patio
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Pool Deck"> Pool Deck
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Driveway"> Driveway
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Garage Floor"> Garage Floor
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Steps &amp; Stoops"> Steps &amp; Stoops
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Basement Floor">Basement Floor
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Ramp"> Ramp
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Void Filling / Stabilization"> Void Filling / Stabilization
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Factory &amp; Warehouse Floors"> Factory &amp; Warehouse Floors
            </label>
          </div>

          <div class="col-xs-12 col-sm-6 col-lg-4">
            <label class="checkbox-inline">
              <input type="checkbox" name="types[]" value="Other"> Other
            </label>
          </div>

        </div>
      </div>

      <div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">
        <label for="message" class="screen-reader-text"><?php _e( 'Your Message', 'zerif-lite' ); ?></label>
        <textarea name="message" id="message" class="form-control textarea-box"
          placeholder="<?php _e('Your Message','zerif-lite'); ?>"><?php
          if(isset($_POST['message'])) { echo esc_html($_POST['message']); }
          ?></textarea>
      </div>

      <button
        id="submit-quote-form"
        class="g-recaptcha btn btn-primary custom-button red-btn"
        type="submit"
        data-scrollreveal="enter left after 0s over 1s"
        data-sitekey="<?php echo getenv('RECAPTCHA_KEY'); ?>"
        data-callback='onSubmitQuote'
      >Send Request</button>

      <script src="https://www.google.com/recaptcha/api.js?render=<?php echo getenv('RECAPTCHA_KEY'); ?>"></script>
      <script type="text/javascript">
          function onSubmitQuote(token){
            // e.preventDefault();

            grecaptcha.ready(function() {
              // do request for recaptcha token
              // response is promise with passed token
              grecaptcha.execute('<?php echo getenv('RECAPTCHA_KEY'); ?>', {action:'submit'}).then(function(token) {
                // add token value to form
                document.getElementById('g-recaptcha-response-quote').value = token;
                document.getElementById('quote-form').submit();
              })
            })
          }
      </script>

    </form>
  <!-- / END CONTACT FORM-->
</div> <!-- / END CONTAINER -->

</section> <!-- / END CONTACT US SECTION-->
