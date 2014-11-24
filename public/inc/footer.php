    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src="<?php echo 'js/main.js?' . filemtime('js/main.js'); ?>"></script><?php

    if ($environment === 'dev') {
      echo '
          <script type=\'text/javascript\' id="__bs_script__">//<![CDATA[
          document.write("<script async src=\'//HOST:3000/browser-sync/browser-sync-client.1.7.1.js\'><\/script>".replace(/HOST/g, location.hostname).replace(/PORT/g, location.port));
          //]]></script>
      ';
    } ?>

  </body>
</html>