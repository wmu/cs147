<?php
include('header.php');
?>

Logging activity goes here.
<br><br>
<form action="log_ask.php" method="post">
<div data-role="fieldcontain">
<fieldset data-role="controlgroup" data-type="horizontal">
	<legend>Date:</legend>

    <label for="select-choice-month">Month</label>
<select name="select-choice-month" id="select-choice-month">
	<?php
	$today = time();
	for ($i = 1; $i <= 12; ++$i) {
	  $month = mktime(0, 0, 0, $i);
	  $selected = ((date('m', $month) == date('m', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('m', $month) . '"' . $selected . '>' . date('M', $month) . "</option>\n";
	}
	?>
</select>

	<label for="select-choice-day">Day</label>
<select name="select-choice-day" id="select-choice-day">
	<?php
	// this should be error checked.
	for ($i = 1; $i <= 31; ++$i) {
	  $day = mktime(0, 0, 0, 1, $i);
	  $selected = ((date('d', $day) == date('d', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('d', $day) . '"' . $selected . '>' . date('d', $day) . "</option>\n";
	}
	?>
</select>

<label for="select-choice-year">Year</label>
<select name="select-choice-year" id="select-choice-year">
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
<div data-role="fieldcontain">
   <label for="slider">Bench:</label>
   <input type="range" name="slider" id="slider" value="0" min="0" max="100" step="1"  />
</div>
<div data-role="fieldcontain">
    <label for="slider">Biceps:</label>
    <input type="range" name="slider" id="slider" value="0" min="0" max="100" step="1"  />
</div>
<div data-role="fieldcontain">
    <label for="slider">Push-ups:</label>
    <input type="range" name="slider" id="slider" value="0" min="0" max="100" step="1"  />
</div>
<div data-role="fieldcontain">
    <label for="slider">Running:</label>
    <input type="range" name="slider" id="slider" value="0" min="0" max="20" step="0.1" />
</div>	
<div data-role="fieldcontain">
   <label for="slider">Sit-ups:</label>
   <input type="range" name="slider" id="slider" value="0" min="0" max="100" step="1"  />
</div>	
<input type="submit" value="log!" data-icon="check">
</form>

<?php include('footer.php'); ?>
