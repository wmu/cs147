<?php
include('header.php');
?>

<?php
$num_leaders = 10;
echo "<div class=\"ui-grid-b\" id=\"leaderboard\">\n";
for ($i=0; $i<$num_leaders; ++$i) {
	echo "<div class=\"ui-block-a\">\n";
	echo '<span class="place_num">'.($i+1).'</span>';
	echo "\n</div>\n";
	echo "<div class=\"ui-block-b\">\n";
	echo 'Bob';
	echo "\n</div>\n";
	echo "<div class=\"ui-block-c\">\n";
	echo '100';
	echo "\n</div>\n";
}
echo "\n</div>\n";
?>

<?php include('footer.php'); ?>