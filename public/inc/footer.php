    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="<?php echo 'js/main.js?' . filemtime('js/main.js'); ?>"></script><?php

    if ($environment === 'dev') {
      echo '
        <script type=\'text/javascript\' id="__bs_script__">//<![CDATA[
          document.write("<script async src=\'http://HOST:3000/browser-sync/browser-sync-client.2.9.11.js\'><\/script>".replace("HOST", location.hostname));
        //]]></script>
      ';
    } ?>

  </body>
</html>
