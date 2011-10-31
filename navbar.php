<div data-role="footer" data-id="myfooter" data-position="fixed" style="top: 0px;" role="contentinfo" class="ui-footer ui-bar-a ui-footer-fixed fade ui-fixed-inline" >		
  <div data-role="navbar">
    <ul>
<?php
$tabs = array("leaderboard.php" => "&#10112;",
			  "activity.php" => "&#9638;",
			  "history.php" => "&#9719;",
			  "log.php" => "&#9998");
foreach ($tabs as $url => $text) {
  echo '<li><a href="'.$url.'" class="'.get_navbar_class($url).'">'.$text.'</a></li>';
}
?>
    </ul>
  </div><!-- /navbar -->
</div><!-- /footer -->