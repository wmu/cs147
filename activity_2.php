<?php
include('header.php');
include('sqlitedb.php');
?>
<br/>
<div id="recent_activity">
<?php
function get_points_and_text ($item, $fb) {
  $type = $item["type"];
  $str = "";
  $pts = get_points($type,$item["entry1"],$item["entry2"]);
  $user_info = $fb->api('/'.$item["userid"]);
  $user_name = "User ".$item["userid"];
  if ($user_info != false){
    $user_name= $user_info["name"];
  }
  if ($user == $item["userid"])
    $user_name = "You";
  //type 0 is bench 
  switch ($type) {
    case 'bench':
      $str = $user_name." benched ".$item["entry1"]." reps of ".$item["entry2"]." pounds.";
      break;
    case 'biceps':
      $str = $user_name." did ".$item["entry1"]." reps of ".$item["entry2"]." pounds for biceps.";
      break;
    case 'pushups':
      $str = $user_name." did ".$item["entry1"]." pushups.";
      break;
    case 'running':
      $str = $user_name." ran ".$item["entry1"]." miles in ".$item["entry2"]." minutes.";
    case 'situps':
      $str = $user_name." did ".$item["entry1"]." sit-ups.";
      break;
    default:
      $str = $user_name." spent ".$item["entry1"]." minutes doing other activity in the gym.";
  }
  $str .= "<br/>".$item["time"]."<br/><br/>";
  return array($str, $pts);
}

$your_points_query = "select points from points where userid=".$user;
$points_result = $db->query($your_points_query);
$user_points = $points_result->fetch();
echo "<center> Your Points: ".$user_points[0]." </center> <br/> <br/>";
	//total number of recent activities that need to be displayed
	$total_number_displayed = 10;
	try{
		$query = "select * from activity order by time desc;";
		$result = $db->query($query);
		
		for ($i = 0; $i < $total_number_displayed; $i++){
			$item = $result->fetch();
			if ($item != null){
        list($str, $pts) = get_points_and_text($item, $facebook);
        echo "<div class=\"ui-grid-a\">\n";
        echo "<div class=\"ui-block-a\">\n";
        echo "<div class=\"points\">\n";
        echo "+".$pts;
        echo "</div></div>";
        echo "<div class=\"ui-block-b\">\n";
				echo $str;
        echo "</div></div>\n";
			}
		}
	}
	catch(PDOException $e){
		echo "<p>Unable to get recent activity.</p>";
	}
?>	
</div>

<?php include('footer.php'); ?>
