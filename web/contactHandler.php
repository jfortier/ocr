<?php

use JustForWeb\ContactForm;

// WordPress view bootstrapper
define('WP_USE_THEMES', false);
require(__DIR__ . '/wp/wp-blog-header.php');

$contactForm = new ContactForm();

try{
  $contactForm->processForm();
} catch (\Exception $error) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

header('Location: ' . "/contact-thank-you");

