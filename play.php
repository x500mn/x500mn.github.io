<?php
include('session.php');
?>
<html>
  <head>
  <style type="text/css">
    *,body,html {
      margin: 0;
      padding: 0;
    }
    iframe {
      margin: 0;
      padding: 0;
      border: 0;
    }
    </style>
  </head>
  <body>
<iframe src="<?php echo $urlweb; ?>/playgame/<?php echo $_GET['slug']; ?>/<?php echo $_GET['gameid']; ?>" name="iframe_a" height="100%" width="100%" title="Iframe Example"></iframe>
  </body>
</html>