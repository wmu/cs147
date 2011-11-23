<?php
include('header.php');
include('sqlitedb.php');
?>

<?
//should get actual user id at some point
$userid = $user;
foreach ($global_activities as $act => $act_details) {
  $head = "";
	$head .= '<div data-role="collapsible">';
	$head .= '<h3>' .$act_details['name']. '</h3>';
	$tab_classes = array('a','b','c','d');
	$tab_ind = count($act_details['details'])-1;
	if ($tab_ind < 0) $tab_ind = 0;
	$tab_class = 'ui-grid-' . $tab_classes[$tab_ind];
	$head .= '<div class="'.$tab_class."\">\n";
	$num_entries = 5;
	$num = 0;
	$head .= '<div class="ui-block-'.$tab_classes[$num]."\">\n";
	$head .= '<b>Date</b>';
	$head .= "\n</div>\n";
	$num++;
	foreach ($act_details['details'] as $det => $det_name) {
	  $head .= '<div class="ui-block-'.$tab_classes[$num]."\">\n";
	  $head .= '<b>' .$det_name. "</b> ";
	  $head .= "\n</div>\n";
	  $num++;
	}
	try{
    $show = false;
		$query = "select * from activity where type='".$act."' and userid=".$userid." order by time desc;";
		$result = $db->query($query);
    $disp = "";
		for ($i = 0; $i < $num_entries; ++$i) {
			$items=$result->fetch();
			if ($items){
        $show = true;
				$num = 0;
				$disp .= '<div class="ui-block-'.$tab_classes[$num]."\">\n";
				$disp .= date("n/j", $items["time"]);
				$disp .= "\n</div>\n";
				$num++;
				$entry_num = 0;
				foreach ($act_details['details'] as $det => $det_name) {
				  $disp .= '<div class="ui-block-'.$tab_classes[$num]."\">\n";
				  if ($entry_num == 0)
            $disp .= $items["entry1"];
				  else
            $disp .= $items["entry2"];
          $disp .= "\n</div>\n";
				  $num++;
				  $entry_num++;
				}
			}
		}
    if ($show) {
      echo $head . $disp . "</div>\n</div>\n";
    }
	}
	catch(PDOException $e){
		echo "Unable to get history from database. <br/>";	
	}
}
?>

<?php
/*
	$testquery = "select * from History;";
	try{
		$result = $db->query($testquery);
		$items = $result->fetch();	
		echo "<p> time: ".$items["time"]."</p>";
	}
	catch(PDOException $e){
		echo "<p> Unable to get History. </p>";
	}
*/
?>

<?php include('footer.php'); ?>
