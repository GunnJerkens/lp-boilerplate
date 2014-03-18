<?php include_once('../config.php'); ?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width" initial-scale="1.0" maximum-scale="1.0" user-scalable="no" /><?php 
    if ($environment === 'production') { echo '<meta name="robots" content="index, follow">'; } 
    else { echo '<meta name="robots" content="noindex, nofollow">'; } ?>
    <title><?php echo theTitle(); ?></title>
    <meta name="description" content="<?php echo theDescription(); ?>">
    <link rel="stylesheet" href="style/screen.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script type='text/javascript' src='js/modernizr.min.js'></script>
    <script type='text/javascript' src='js/respond.min.js'></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </head>
  <body>
