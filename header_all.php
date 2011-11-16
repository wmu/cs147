<?php
include('utils.php');
include('facebook_header.php');
?>

<?php
   if ($user == 0){
	    echo "<meta http-equiv='refresh' content='0;url=http://stanford.edu/~frankw2/cgi-bin/cs147/index.php'>";
	    exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>iWorkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" />
<link rel="stylesheet" type="text/css" href="themes/KHo147.min.css">
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="utils.js"></script>
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="jquery.mobile-1.0rc2.js"></script>
<script src="jquery.validate.js"></script>

</head>
<body>
<div data-role="page">
  <div data-role="header">
    <?php
	  if ($help_url = get_help_url()) {
		echo '<a href="'.$help_url.'" data-rel="dialog" data-icon="info" data-iconpos="notext" class="ui-btn-left"></a>';
	  }
	?>
    <h1><?php echo get_hdr_title(); ?></h1>
	<?php
	  if (show_logout()) {
		echo '<a href='.$facebook->getLogoutUrl().' data-icon="logout" data-iconpos="notext" class="ui-btn-right"></a>';
	  }
	?>
   
  </div><!-- /header -->
<div data-role="content">