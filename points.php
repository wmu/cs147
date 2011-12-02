<?php
include('header.php');
?>

<h1>Points explanation</h1>
<p>
Weight Based Exercises: POINTS = (REPS * WEIGHT) <br/> 
Running: POINTS = MILES*TIME <br/>
Situps and Pushups: POINTS = NUMBER <br/>
Time Based: POINTS = TIME * 5 <br/>
(e.g. 30 min workout = 150 pts) <br/>
</p>
<br><br>
<form action="log_confirm.php" method="post">
<input type="submit" value="back" data-icon="back">
</form>

<?php include('footer.php'); ?>
