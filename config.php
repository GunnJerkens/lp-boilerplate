<?php
/**
*
* Basic configuration for lp-boilerplate. Currently sets environment && hostname.
*
**/

/**
* Defaults:
*
* Overwrite these default options below by calling the matching variable before the header include and
* defining it on your page template (e.g., $default_title => $title) to override the defaults on a per
* page basis, otherwise leave alone.
*
**/

$default_title = 'lp-boilerplate';
$default_description = 'A simple boilerplate with some cool things.';
$google_tag_manager = 'GTM-XXXXXX';

/**
* Environments:
*
* Fill out each set of environments along with fully qualified URLs for hassle free switching. Just add
* the env_local or env_staging empy file outside the public root.
*
**/

if ( file_exists( dirname( __FILE__ ) . '/env_local' ) ) {

  // Local Environment
  $environment = 'dev';
  $hostname = 'http://example.dev';

} elseif ( file_exists( dirname( __FILE__ ) . '/env_staging' ) ) {

  // Staging Environment
  $environment = 'staging';
  $hostname = 'http://dev.example.com';

} else {

  // Production Environment
  $environment = 'production';
  $hostname = 'http://example.com';
}

/**
*
* No need to modify further unless you are planning to commit back changes to the boilerplate.
*
**/

function theTitle() {
  global $title, $default_title;
  if ($title) {
    return $title;
  } else {
    return $default_title;
  }
}

function theDescription() {
  global $description, $default_description;
  if ($description) {
    return $description;
  } else {
    return $default_description;
  }
}

function gtmHead() {
  global $environment, $google_tag_manager;
  if($environment === 'production') {
    $analytics = "
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','$google_tag_manager');</script>
      <!-- End Google Tag Manager -->
    ";
    return $analytics;
  }
}

function gtmBody() {
  global $environment, $google_tag_manager;
  if($environment === 'production') {
    $analytics = '
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id='.$google_tag_manager.'"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    ';
    return $analytics;
  }
}
?>
