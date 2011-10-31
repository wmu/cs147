<?php
include('header.php');
?>

Are you sure you want to log this activity?
<br><br>
<form action="log_confirm.php" method="post">
<input type="submit" value="log!" data-icon="check" data-theme="b">
</form>
<form action="log.php" method="post">
<input type="submit" value="cancel" data-icon="delete">
</form>

<?php include('footer.php'); ?>
