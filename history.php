<?php
include('header.php');
include('sqlitedb.php');
?>

<?
foreach ($global_activities as $act => $act_details) {
	echo '<div data-role="collapsible">';
	echo '<h3>' .$act_details['name']. '</h3>';
	foreach ($act_details['details'] as $det => $det_name) {
	  /*$name = $act . '-' . $det;
	  echo '<b>' .$det_name. ":</b> ";
	  $num = $_POST[$name] ? $_POST[$name] : 0;
	  echo $num."<br>\n";*/
	  echo "HISTORY GOES HERE ";
	}
	echo "</div>\n";
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
