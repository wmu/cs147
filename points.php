<?php
include('header.php');
?>

<p><br><br>
<div id="points_exp">
  <div class="cat">
    Weight Based Exercises:
  </div>
  <div class="exp">
    POINTS = REPS * WEIGHT
  </div>
  
  <div class="cat">
    Running:
  </div>
  <div class="exp">
    POINTS = MILES * MINUTES
  </div>
  
  <div class="cat">
    Sit-ups and Push-ups:
  </div>
  <div class="exp">
    POINTS = NUMBER
  </div>
  
  <div class="cat">
    Time Based:
  </div>
  <div class="exp">
    POINTS = MINUTES * 5
  </div>
</div>
</p>
<br><br>
<form action="log.php" method="post">
<input type="submit" value="back" data-icon="back">
</form>

<?php include('footer_nonavbar.php'); ?>
