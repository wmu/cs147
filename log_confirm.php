<?php
include('header.php');
include('sqlitedb.php');
?>

Saved!
<br><br>

<?php
$finalstring = $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year']. "<br><br>\n";
//need to eventually change id to actual user id
try{
	$date = date("Y-m-d H:i");
	$id = 2;
	$total_points = 0;
	foreach ($global_activities as $act => $act_details) {
		$finalstring.= '<b>' . $act_details['name'] . "</b><br>\n";
		$query = "insert into activity values ($id,'$date','$act',";
		$total = 0;
		$value1 = 0;
		$value2 = 0;
		foreach ($act_details['details'] as $det => $det_name) {
			$name = $act . '-' . $det;
			$finalstring.=  '<b>' .$det_name. ":</b> ";
			$num = $_POST[$name] ? $_POST[$name] : 0;
			$finalstring.= $num."<br>\n";
			if ($num == 0 || strcmp($query,"null") == 0)
				$query = "null";
			else
				$query .= $num.",";
			if ($total == 0)
				$value1 = $num;
			else
				$value2 = $num;	
			$total++;
		}
		if (strcmp($query,"null") != 0){
			if ($total < 2){
				//activities with one entry are situps, pushups and other gym time
				if (strcmp($act,'situps') == 0 || strcmp($act,'pushups') == 0)
					$total_points += 10*$value1;
				else
					$total_points += 50*$value1;
				$query.="0,0);";
			}
			//only running has a different factor (15). the other exercises are just direct multiplication of value1 and value2
			else{
				//if running then different factor
				if (strcmp($act,'running') == 0)
					$total_points += $value1*$value2*15;
				else
					$total_points += $value1*$value2;
				
				$query.="0);";
			}
		}
		$finalstring.=  "<br><br>\n";
		if (strcmp($query,"null") != 0){
			$insertintodatabase = $db->query($query);
		}
	}
	$points_exist = "select count(points) from points where userid=".$id.";";
	$pe_result = $db->query($points_exist);
	$id_does_exist = $pe_result->fetch();
	if ($id_does_exist[0] == 0){
		$insert_user_query = "insert into points values($id,0);";
		$db->query($insert_user_query);
	}
	$points_query = "select * from points where userid=".$id.";";
	$points_result = $db->query($points_query);
	$current_points = $points_result->fetch();
	$final_points = $total_points + $current_points["points"];
	$update_query = "update points set points=".$final_points." where userid=".$id.";";
	$db->query($update_query);
	echo "You have earned ".$total_points." points from your workout. <br/> <br/>";
	echo "Your new point total is ".$final_points."<br/>";
	echo $finalstring;
	
}
catch(PDOException $e){
	echo "Cannot log information into the database.";
}

?>
<a href="points.php">(?)</a>
<br><br>

<form action="log.php" method="post">
<input type="submit" value="back" data-icon="back">
</form>

<?php include('footer.php'); ?>
