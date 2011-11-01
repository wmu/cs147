<?php
include('header.php');
include('sqlitedb.php');
?>

Test History

<?php
	$testquery = "select * from History;";
	try{
		$result = $db->query($testquery);
		$items = $result->fetch();	
		echo "<p> time: ".$items["time"]."</p>";
	}
	catch(PDOException $e){
		echo "<p> Unable to get History. </p>";
	}
?>

<?php include('footer.php'); ?>
