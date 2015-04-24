    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?php echo 'js/main.js?' . filemtime('js/main.js'); ?>"></script><?php

    if ($environment === 'dev') {
      echo '
        <script type=\'text/javascript\' id="__bs_script__">//<![CDATA[
            document.write("<script async src=\'http://HOST:3000/browser-sync/browser-sync-client.2.6.4.js\'><\/script>".replace("HOST", location.hostname));
        //]]></script>
      ';
    } ?>

  </body>
</html>