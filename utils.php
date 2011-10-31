<?php
function show_back()
{
  $url = basename($_SERVER['PHP_SELF']);
  $logged_out_urls = array('index.php');
  if (in_array($url, $logged_out_urls)) {
    return false;
  }
  return true;
}

function show_logout()
{
  $url = basename($_SERVER['PHP_SELF']);
  $logged_out_urls = array('index.php', 'create.php');
  if (in_array($url, $logged_out_urls)) {
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