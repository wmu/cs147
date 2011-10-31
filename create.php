<?php
include('header_all.php');
?>

<div id="home_all">
<form action="create_confirm.php" method="post">
<div data-role="fieldcontain" class="ui-hide-label">
	<label for="username">Username:</label>
	<input type="text" name="username" id="username" value="" placeholder="username"/>
</div>
<div data-role="fieldcontain" class="ui-hide-label">
	<label for="email">E-mail:</label>
	<input type="text" name="email" id="email" value="" placeholder="email"/>
</div>
<div data-role="fieldcontain" class="ui-hide-label">
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" value="" placeholder="password"/>
</div>
<div data-role="fieldcontain" class="ui-hide-label">
	<label for="password_confirm">Confirm Password:</label>
	<input type="password" name="password_confirm" id="password_confirm" value="" placeholder="confirm password"/>
</div>
<input type="submit" value="go!">
</div>
</form> 
</div>


<?php include('footer_nonavbar.php'); ?>