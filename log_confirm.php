<?php
include('header.php');
include('sqlitedb.php');
?>

Saved!
<br><br>
(Update points here)
<br><br>
<?php
echo $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year']. "<br><br>\n";
?>
<?php
$date = date("Y-m-d H:i");

try{
	$i = 0;
	$id = 2;
	foreach ($global_activities as $act => $act_details) {
		echo '<b>' . $act_details['name'] . "</b><br>\n";
		$query = "insert into activity values ($id,'$date',".$i.",";
		$total = 0;
		foreach ($act_details['details'] as $det => $det_name) {
			$name = $act . '-' . $det;
			echo '<b>' .$det_name. ":</b> ";
			$num = $_POST[$name] ? $_POST[$name] : 0;
			echo $num."<br>\n";
			if ($num == 0 || strcmp($query,"null") == 0)
				$query = "null";
			else
				$query .= $num.",";
			$total++;
		}
		if (strcmp($query,"null") != 0){
			if ($total < 2)
				$query.="0,0);";
			else
				$query.="0);";
		}
		echo "<br><br>\n";
		$i++;
		if (strcmp($query,"null") != 0){
			$insertintodatabase = $db->query($query);
		}
	}
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
