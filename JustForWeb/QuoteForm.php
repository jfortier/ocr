<?php

namespace JustForWeb;

class QuoteForm
{
  private $method;

  private $requiredFields = array(
    'name' => "Missing name field.",
    'email' => "Missing email field.",
    'city' => "Missing city field.",
    'phone' => "Missing phone field.",
    'g-recaptcha-response-quote' => "Please verify that you are not robot."
  );

  private $outputFields = array(
    'name' => "Name:",
    'email' => "Email:",
    'city' => "City:",
    'callback' => "Callback Time:",
    'phone' => "Phone:",
    'how' => "How did you hear about us?",
    'types' => "Applicable Items:",
    'message' => "Message:"
  );

  public function __construct()
  {
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

  public function getField($field) {
    if (isset($_POST[$field])) {
      return $_POST[$field];
    }
    return "";
  }

  public function processForm()
  {
    if ($this->method == "POST") {

      $this->checkRequiredFields();
      $recaptcha = new GoogleRecaptcha();

      if ($recaptcha->verify($_POST['g-recaptcha-response-quote'])) {
      // if (true) {
        return $this->sendEmail();
      } else {
        throw new \Exception("Could not verify captcha, try again.");
      }

    }
    return false;
  }

  public function checkRequiredFields()
  {
    foreach ($this->requiredFields as $field=>$message) {
      if (empty($_POST[$field])) {
        throw new \Exception($message);
      }
    }
  }

  public function sendEmail()
  {
    $mail = $this->configureMailer();
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addCC($_POST['email'], $_POST['name']);

    $mail->Subject = 'Request a Quote From: ' . $_POST['name'];

    $message = '';

    foreach ($_POST as $key=>$content) {

      if (in_array($key, array_keys($this->outputFields)) ) {

        if (is_array($content)) {
          $content = implode(", ", $content);
        }

        $content = strip_tags($content);
        $content = htmlentities($content);
        $content = nl2br($content);

        $message .= "
          <strong>{$this->outputFields[$key]}</strong> <br />
          {$content} <br />
          <br />
        ";
      }
    }

    $mail->Body = $message;

    // $mail->Body    = "
    //   <strong>From:</strong> {$name} <{$email}>
    //   <br /><br />
    //   <strong>Message:</strong>
    //    <br />
    //   {$message}
    // ";
    $mail->AltBody = strip_tags($message);

    if(!$mail->send()) {
      throw new \Exception("Message could not be sent. " . $mail->ErrorInfo);
    } else {
      return true;
    }
  }

  public function configureMailer()
  {
    $mail = new \PHPMailer();

    // $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = getenv('EMAIL_SMTP');            // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = getenv('EMAIL_FROM');               // SMTP username
    $mail->Password = getenv('EMAIL_FROM_PASSWORD');      // SMTP password
    $mail->SMTPSecure = getenv('EMAIL_SMTP_SECURITY');    // Enable TLS encryption, `ssl` also accepted
    $mail->Port = getenv('EMAIL_SMTP_PORT');              // TCP port to connect to

    //From myself to myself (alter reply address)
    $mail->setFrom(getenv('EMAIL_FROM'), getenv('EMAIL_FROM_NAME'));
    $mail->addAddress(getenv('EMAIL_TO'), getenv('EMAIL_TO_NAME'));
    $mail->isHTML(true);                                  // Set email format to HTML

    return $mail;
  }
}
