<?php
include('header.php');
include('sqlitedb.php')
?>

<?php
$num_leaders = 10;
echo "<div class=\"ui-grid-b\" id=\"leaderboard\">\n";
try{
	$query = "select * from points order by points desc;";
	$result = $db->query($query);
	for ($i=0; $i<$num_leaders; ++$i) {
		$leaders = $result->fetch();
		if ($leaders != null){
			echo "<div class=\"ui-block-a\">\n";
			echo '<span class="place_num">'.($i+1).'</span>';
			echo "\n</div>\n";
			echo "<div class=\"ui-block-b\">\n";
			echo "User ".$leaders["userid"];
			echo "\n</div>\n";
			echo "<div class=\"ui-block-c\">\n";
			echo $leaders["points"];
			echo "\n</div>\n";
		}
	}
}
catch(PDOException $e){
	echo "Unable to get leaderboard from database. <br/>";
}
echo "\n</div>\n";
?>

<?php include('footer.php'); ?>