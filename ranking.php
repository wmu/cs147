<?php
include('header.php');
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
			echo "<div class=\"user_pic\">\n";
			$user_info = $facebook->api('/'.$leaders["userid"]);
			$user_name = "User ".$leaders["userid"];
			if ($user_info != false){
				$user_name= $user_info["name"];
			}
			if ($user == $leaders["userid"])
				$user_name = "<b>You</b>";
			if ($user_info != false){
				$picture_url = 'http://graph.facebook.com/'.$leaders["userid"].'/picture';
				echo "<img src =".$picture_url.' />';
			}
			echo "\n</div>\n";
			echo "<div class=\"user_name\">\n";
			echo $user_name;
			echo "\n</div>\n";
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