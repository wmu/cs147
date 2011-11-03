<?php
include('header.php');
?>

Please enter positive integer values for the following information:
<br><br>
<form action="log_ask.php" method="post">
<div data-role="fieldcontain">
<fieldset data-role="controlgroup" data-type="horizontal">
	<legend>Date:</legend>

    <label for="month">Month</label>
<select name="month" id="month">
	<?php
	$today = time();
	for ($i = 1; $i <= 12; ++$i) {
	  $month = mktime(0, 0, 0, $i);
	  $selected = ((date('m', $month) == date('m', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('m', $month) . '"' . $selected . '>' . date('M', $month) . "</option>\n";
	}
	?>
</select>

	<label for="day">Day</label>
<select name="day" id="day">
	<?php
	// this should be error checked.
	for ($i = 1; $i <= 31; ++$i) {
	  $day = mktime(0, 0, 0, 1, $i);
	  $selected = ((date('d', $day) == date('d', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('d', $day) . '"' . $selected . '>' . date('d', $day) . "</option>\n";
	}
	?>
</select>

<label for="year">Year</label>
<select name="year" id="year">
	<?php
	$today = time();
	for ($i = 2010; $i <= 2012; ++$i) {
	  $year = mktime(0, 0, 0, 1, 1, $i);
	  $selected = ((date('Y', $year) == date('Y', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('Y', $year) . '"' . $selected . '>' . date('Y', $year) . "</option>\n";
	}
	?>
</select>
</fieldset>
</div>
<div id="log_form">
<?php
foreach ($global_activities as $act => $act_details) {
	echo '<b>' . $act_details['name'] . "</b><br><br>\n";
	echo "<div data-role=\"fieldcontain\">\n";
	foreach ($act_details['details'] as $det => $det_name) {
	  $name = $act . '-' . $det;
	  echo '<label for="' .$name. '">' .$det_name. ":</label>\n"
	  . '<input type="number" name="'.$name."\" value=\"0\" />\n";
	}
	echo "</div>\n";
}
?>
</div>
<input type="submit" value="log!" data-icon="check">
</form>

<?php include('footer.php'); ?>
