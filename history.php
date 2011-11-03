<?php
include('header.php');
include('sqlitedb.php');
?>

<?
//should get actual user id at some point
$userid = 2;
foreach ($global_activities as $act => $act_details) {
	echo '<div data-role="collapsible">';
	echo '<h3>' .$act_details['name']. '</h3>';
	$tab_classes = array('a','b','c','d');
	$tab_ind = count($act_details['details'])-1;
	if ($tab_ind < 0) $tab_ind = 0;
	$tab_class = 'ui-grid-' . $tab_classes[$tab_ind];
	echo '<div class="'.$tab_class."\">\n";
	$num_entries = 5;
	$num = 0;
	echo '<div class="ui-block-'.$tab_classes[$num]."\">\n";
	echo '<b>Date</b>';
	echo "\n</div>\n";
	$num++;
	foreach ($act_details['details'] as $det => $det_name) {
	  echo '<div class="ui-block-'.$tab_classes[$num]."\">\n";
	  echo '<b>' .$det_name. "</b> ";
	  echo "\n</div>\n";
	  $num++;
	}
	try{
		$query = "select * from activity where type='".$act."' and userid=".$userid." order by time desc;";
		$result = $db->query($query);
		for ($i = 0; $i < $num_entries; ++$i) {
			$items=$result->fetch();
			if (items != null){
				$num = 0;
				echo '<div class="ui-block-'.$tab_classes[$num]."\">\n";
				echo $items["time"];
				echo "\n</div>\n";
				$num++;
				$entry_num = 0;
				foreach ($act_details['details'] as $det => $det_name) {
				  echo '<div class="ui-block-'.$tab_classes[$num]."\">\n";
				  if ($entry_num == 0)
					echo $items["entry1"];
				  else
					echo $items["entry2"];
				  echo "\n</div>\n";
				  $num++;
				  $entry_num++;
				}
			}
		}
	}
	catch(PDOException $e){
		echo "Unable to get history from database. <br/>";	
	}
	echo "</div>\n</div>\n";
}
?>

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
