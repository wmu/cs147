<?php
include('header.php');
?>

<h1>Points explanation</h1>
<p>
    For each weight based workout, Total Points = Reps X Weight.
    For time based workouts, Total Points = 10 * Time (in minutes).
</p>
<br><br>
<form action="log_confirm.php" method="post">
<input type="submit" value="back" data-icon="back">
</form>

<?php include('footer.php'); ?>
