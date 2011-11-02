<?php
include('header.php');
?>

Saved!
<br><br>
(Update points here)
<br><br>
<?php
echo $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year']. "<br><br>\n";
?>
<?php
foreach ($global_activities as $act => $act_details) {
	echo '<b>' . $act_details['name'] . "</b><br>\n";
	foreach ($act_details['details'] as $det => $det_name) {
	  $name = $act . '-' . $det;
	  echo '<b>' .$det_name. ":</b> ";
	  $num = $_POST[$name] ? $_POST[$name] : 0;
	  echo $num."<br>\n";
	}
	echo "<br><br>\n";
}
?>
<a href="points.php">(?)</a>
<br><br>

<form action="log.php" method="post">
<input type="submit" value="back" data-icon="back">
</form>

<?php include('footer.php'); ?>
