<?php
include('header.php');
include('sqlitedb.php');
?>
<br/>
<?php
	//total number of recent activities that need to be displayed
	$total_number_displayed = 10;
	try{
		$query = "select * from activity order by time desc;";
		$result = $db->query($query);
		
		for ($i = 0; $i < $total_number_displayed; $i++){
			$item = $result->fetch();
			if ($item != null){
				$type = $item["type"];
				$user_info = $facebook->api('/'.$item["userid"]);
				$user_name = "User ".$item["userid"];
				if ($user_info != false){
					$user_name= $user_info["name"];
				}
				if ($user == $item["userid"])
					$user_name = "You";
				//type 0 is bench 
				if (strcmp('bench',$type) == 0){
					//add name for user later
					echo $user_name." benched ".$item["entry1"]." reps of ".$item["entry2"]." pounds.";
					echo "<br/>".$item["time"];
					echo "<br/> <br/>";
				}
				else if (strcmp('biceps',$type) == 0){
					echo $user_name." did ".$item["entry1"]." reps of ".$item["entry2"]." pounds for biceps.";
					echo "<br/>".$item["time"];
					echo "<br/> <br/>";
				}
				else if (strcmp('pushups',$type) == 0){
					echo $user_name." did ".$item["entry1"]." pushups.";
					echo "<br/>".$item["time"];
					echo "<br/> <br/>";
				}
				else if (strcmp('running',$type) == 0){
					echo $user_name." ran ".$item["entry1"]." miles in ".$item["entry2"]." minutes.";
					echo "<br/>".$item["time"];
					echo "<br/> <br/>";
				}
				else if (strcmp('situps',$type) == 0){
					echo $user_name." did ".$item["entry1"]." sit-ups.";
					echo "<br/>".$item["time"];
					echo "<br/> <br/>";
				}
				else{
					echo $user_name." spent ".$item["entry1"]." minutes doing other activity in the gym.";
					echo "<br/>".$item["time"];
					echo "<br/> <br/>";
				}
			}
		}
	}
	catch(PDOException $e){
		echo "<p>Unable to get recent activity.</p>";
	}
?>	

<?php include('footer.php'); ?>
