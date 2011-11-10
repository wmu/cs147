<?php
include('facebook_header.php');
?>

<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <body>
    <?php if ($user_profile) {
	echo "<meta http-equiv='refresh' content='0;url=http://stanford.edu/~frankw2/cgi-bin/cs147/log.php'>";
	exit;
    } else {
	include('header_index.php');?>
	<br/> <br/>
	  <center> 
	<p> Welcome to the iWorkout Application! </p>
	<br/>
	<fb:login-button></fb:login-button> </center>
    <?php } ?>
    <div id="fb-root"></div>
    <script>               
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook->getAppID() ?>', 
          cookie: true, 
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
  </body>
</html>
