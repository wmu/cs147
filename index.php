<?php
include('header_all.php');
?>

<div id="home_all">
<form action="log.php" method="post">
<div data-role="fieldcontain" class="ui-hide-label">
	<label for="username">Username:</label>
	<input type="text" name="username" id="username" value="" placeholder="username"/>
</div>
<div data-role="fieldcontain" class="ui-hide-label">
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" value="" placeholder="password"/>
</div>
<input type="submit" value="go!">
</form> 
<br><br>
<a href="create.php">create account</a>
</div>


<?php include('footer_nonavbar.php'); ?>