<?php

class Helpers {

  public static function redirect($url) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Redirecting...</title>
</head>

<body><script>
  location = '<?=$url?>';
</script></body>

</html>
<?php
  }

  public static function noLoginRedirect($url) {
    if (!UserSession::isLoggedIn()) {
      self::redirect($url);
    }
  }

}