    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src="<?php echo 'js/main.js?' . filemtime('js/main.js'); ?>"></script><?php

    if ($environment === 'dev') {
      echo '<script async src="'.$hostname.':3000/browser-sync-client.1.3.0.js"></script>';
    } ?>

  </body>
</html>