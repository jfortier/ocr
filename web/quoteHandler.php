<?php

use JustForWeb\QuoteForm;

// WordPress view bootstrapper
define('WP_USE_THEMES', false);
require(__DIR__ . '/wp/wp-blog-header.php');

$quoteForm = new QuoteForm();

try{
  $quoteForm->processForm();
} catch (\Exception $error) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

header('Location: ' . "/thank-you");

