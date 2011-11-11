<?php
include('header.php');
?>

Are you sure you want to log this activity?
<br><br>
<?php
echo $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year']. "<br><br>\n";
?>
<?php
foreach ($global_activities as $act => $act_details) {
	$echo_str = '<b>' . $act_details['name'] . "</b><br>\n";
  $show = true;
	foreach ($act_details['details'] as $det => $det_name) {
	  $name = $act . '-' . $det;
	  $num = $_POST[$name] ? $_POST[$name] : 0;
    $echo_str .= '<b>' .$det_name. ':</b> '.$num."<br>\n";
    if ($num == 0) {
	    $show = false;
    }
	}
	if ($show) {
    $echo_str .= "<br><br>\n";
    echo $echo_str;
  }
}
?>
<form action="log_confirm.php" method="post">
<?php
echo '<input type="hidden" name="month" value="' .$_POST['month'] . "\"/>\n";
echo '<input type="hidden" name="day" value="' .$_POST['day'] . "\"/>\n";
echo '<input type="hidden" name="year" value="' .$_POST['year'] . "\"/>\n";
foreach ($global_activities as $act => $act_details) {
	foreach ($act_details['details'] as $det => $det_name) {
	  $name = $act . '-' . $det;
	  $num = $_POST[$name] ? $_POST[$name] : 0;
	  echo '<input type="hidden" name="' .$name. '" value="' . $num . "\"/>\n";
	}
}
?>
<input type="submit" value="Log!" data-icon="check" data-theme="b">
</form>
<a href="#" data-rel="back" data-role="button" data-icon="delete">Cancel</a>

<?php include('footer.php'); ?>
