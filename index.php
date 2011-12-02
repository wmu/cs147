<?php
include('facebook_header.php');
include('sqlitedb.php');
?>
	
<?php
if ($user) {
	try{
		$first_login = "select count(points) from points where userid=".$user.";";
		$fl_result = $db->query($first_login);
		$is_first_login = $fl_result->fetch();
		//redirect if first login to tutorial
		if ($is_first_login[0] == 0){
			echo "<meta http-equiv='refresh' content='0;url=http://stanford.edu/~frankw2/cgi-bin/cs147/tutorial.php'>";
			exit;
		}
		else{
			echo "<meta http-equiv='refresh' content='0;url=http://stanford.edu/~frankw2/cgi-bin/cs147/log.php'>";
			exit;
		}
	}
	catch(PDOException $e){
		echo "Database cannot be accessed.";
	}
	//echo "<meta http-equiv='refresh' content='0;url=http://stanford.edu/~frankw2/cgi-bin/cs147/log.php'>";
	//exit;
	
}?>

    
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">

  <body>
	<?php include('header_index.php');?>
	<br/> <br/>
	  <center> 
	<p> Welcome to the iWorkout Application! </p>
	<br/>
	<fb:login-button></fb:login-button> </center>
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
