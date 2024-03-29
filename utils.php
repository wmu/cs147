<?php
$global_activities =
	array('bench' => array('name' => 'Bench',
							'details' => array('reps' => 'Reps',
								 'weight' => 'Weight',
							)
						),
		 'biceps' => array('name' => 'Biceps',
                           'details' => array('reps' => 'Reps',
								'weight' => 'Weight',
							)
					),
		'pushups' => array('name' => 'Push-ups',
                           'details' => array('num' => 'Number',
							)
					),
		'running' => array('name' => 'Running',
                           'details' => array('miles' => 'Miles',
								'time' => 'Minutes',
							)
					),
		'situps' => array('name' => 'Sit-ups',
                          'details' => array('num' => 'Number',
							)
					),
		'other' => array('name' => 'Other Activity',
                          'details' => array('time' => 'Minutes',
							)
					),
    );

$popups = array('dialog_tutorial_ranking.php', 'dialog_tutorial_activity.php', 'dialog_tutorial_history.php', 'dialog_tutorial_log.php','points.php');
    
function get_points($act_type, $first_value, $second_value)
{
  if (strcmp($act_type,'situps') == 0 || strcmp($act_type,'pushups') == 0)
    return $first_value;
  else if (strcmp($act_type,'other') == 0)
    return $first_value*5;
  else if (strcmp($act_type, 'running') == 0)
    return $first_value*$second_value;
  else
    return $first_value*$second_value;
}
function show_back()
{
  $url = basename($_SERVER['PHP_SELF']);
  $logged_out_urls = array('index.php');
  if (in_array($url, $logged_out_urls) || strpos($url, "dialog") === 0) {
    return false;
  }
  return true;
}

function get_help_url()
{
  $url = basename($_SERVER['PHP_SELF']);
  $need_help_urls = array('ranking.php', 'activity.php', 'history.php', 'log.php');
  if (in_array($url, $need_help_urls)) {
    return "dialog_tutorial_".$url;
  }
  return false;
}

function show_logout()
{
  $url = basename($_SERVER['PHP_SELF']);
  $logged_out_urls = array('index.php', 'create.php');
  global $popups;
  if (in_array($url, $logged_out_urls) || in_array($url, $popups)) {
    return false;
  }
  return true;
}

function is_tutorial()
{
  $url = basename($_SERVER['PHP_SELF']);
  global $popups;
  if (in_array($url, $popups)) {
    return true;
  }
  return false;
}

function get_hdr_title()
{
  $url = basename($_SERVER['PHP_SELF']);
  $url_to_title = array('index.php' => 'iWorkout',
                        'create.php' => 'Create Account',
                        'create_confirm.php' => 'Create Account',
						'ranking.php' => 'Ranking',
						'activity.php' => 'Friend Activity',
						'history.php' => 'Your History',
						'log.php' => 'Log Activity',
            'dialog_tutorial_ranking.php' => 'Ranking',
						'dialog_tutorial_activity.php' => 'Friend Activity',
						'dialog_tutorial_history.php' => 'Your History',
						'dialog_tutorial_log.php' => 'Log Activity',
						'log_ask.php' => 'Log Activity',
						'log_confirm.php' => 'Log Activity',
						'points.php' => 'Points');
  if (array_key_exists($url, $url_to_title)) {
    return $url_to_title[$url];
  }
  return 'iWorkout';
}

function get_navbar_class($url)
{
  $curr = basename($_SERVER['PHP_SELF']);
  $new = basename($url);
  if ($curr == $new) {
    return "d";
  }
  return "a";
}

function display_time($time) {
  $now = time();
  $diff = $now - $time;
  //echo $time. " " .$now. " " . ($diff)."<br>";
  if ($diff < 60) {
    $secs = round($diff);
    return $secs . " second".(($secs>1)?"s":""). " ago";
  } else if ($diff < 60*60) {
    $mins = round($diff / 60);
    return $mins . " minute".(($mins>1)?"s":""). " ago";
  } else if ($diff < 60*60*24) {
    $hrs = round($diff / (60*60));
    return $hrs . " hour".(($hrs>1)?"s":""). " ago";
  } else if ($diff < 60*60*24*30) {
    $days = round($diff / (60*60*24));
    return $days . " day".(($days>1)?"s":""). " ago";
  } else if ($diff < 60*60*24*30*12) {
    $months = round($diff / (60*60*24*30));
    return $months . " month".(($months>1)?"s":""). " ago";
  } else {
    $yrs = round($diff / (60*60*24*30*12));
    return $yrs . " year".(($yrs>1)?"s":""). " ago";
  }
}
?>