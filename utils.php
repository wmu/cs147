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
		'other' => array('name' => 'Other',
                          'details' => array('time' => 'Minutes',
							)
					),
    );

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
  $need_help_urls = array('leaderboard.php', 'activity.php', 'history.php', 'log.php');
  if (in_array($url, $need_help_urls)) {
    return "dialog_tutorial_".$url;
  }
  return false;
}

function show_logout()
{
  $url = basename($_SERVER['PHP_SELF']);
  $logged_out_urls = array('index.php', 'create.php');
  if (in_array($url, $logged_out_urls) || strpos($url, "dialog") === 0) {
    return false;
  }
  return true;
}

function get_hdr_title()
{
  $url = basename($_SERVER['PHP_SELF']);
  $url_to_title = array('index.php' => 'iWorkout',
                        'create.php' => 'Create Account',
                        'create_confirm.php' => 'Create Account',
						'leaderboard.php' => 'Leaderboard',
						'activity.php' => 'Friend Activity',
						'history.php' => 'Your History',
						'log.php' => 'Log Activity',
            'dialog_tutorial_leaderboard.php' => 'Leaderboard',
						'dialog_tutorial_activity.php' => 'Friend Activity',
						'dialog_tutorial_history.php' => 'Your History',
						'dialog_tutorial_log.php' => 'Log Activity',
						'log_ask.php' => 'Log Activity',
						'log_confirm.php' => 'Log Activity',
						'points.php' => 'Point System');
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
    return "ui-btn-active";
  }
}
?>