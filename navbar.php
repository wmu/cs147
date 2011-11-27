      <style>	
		.nav-glyphish-example .ui-btn .ui-btn-inner { padding-top: 40px !important; }
		.nav-glyphish-example .ui-btn .ui-icon { height: 30px!important; box-shadow: none!important; -moz-box-shadow: none!important; -webkit-box-shadow: none!important; -webkit-border-radius: 0 !important; border-radius: 0 !important; }
<?php
$tabs = array("leaderboard.php" => "leaderboard",
			  "activity.php" => "activity",
			  "history.php" => "history",
			  "log.php" => "log");
foreach($tabs as $url => $text){
  echo '#'.$text.' .ui-icon { background: url(images/'.$text.'.png) 50% 50% no-repeat; }';
}
?>
      </style>
<div data-role="footer" data-id="myfooter" data-position="fixed" style="top: 0px;" role="contentinfo" class="nav-glyphish-example" >		
  <div data-role="navbar" class="nav-glyphish-example">
    <ul>

      <?php
foreach ($tabs as $url => $text) {
  echo '<li><a href="'.$url.'" id="'.$text.'" class="'.get_navbar_class($url).'" data-icon="custom"></a>' .ucfirst($text) .'</li>';
}
?>
    </ul>
  </div><!-- /navbar -->
</div><!-- /footer -->