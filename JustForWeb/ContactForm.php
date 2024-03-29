<?php

namespace JustForWeb;

class ContactForm
{
  private $method;

  private $requiredFields = array(
    'fullname' => "Missing name field.",
    'contact-email' => "Missing email field.",
    'g-recaptcha-response-contact' => "Please verify that you are not robot."
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

      if ($recaptcha->verify($_POST['g-recaptcha-response-contact'])) {
        return $this->sendEmail($_POST['contact-email'], $_POST['fullname'], $_POST['message']);
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

    public function sendEmail($email, $name, $message)
  {
    $mail = $this->configureMailer();
    $mail->addReplyTo($email, $name);

    $mail->Subject = 'Contact Request From: ' . $name;
    $mail->Body    = "
      <strong>From:</strong> {$name} <{$email}> 
      <br /><br />
      <strong>Message:</strong>
       <br />
      {$message}
    ";
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
