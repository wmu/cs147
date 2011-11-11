<?php
include('header.php');
?>

<script type="text/javascript">
$(document).ready(function(){
  $("#logForm").validate();
  $("#select-activity").change(selectChange);
});
var globalActivities = <?= json_encode($global_activities); ?>;

function deselect(name) {
  var ind = $("#select-activity").children().index($("#select-activity option[value="+name+"]"));
  $("#select-activity-menu li[data-option-index="+ind+"]").addClass("ui-disabled").removeClass("ui-btn-hover-c").removeClass("ui-btn-active").attr("aria-disabled", true).attr("aria-selected", false);
  //
  /*$("#select-activity-menu").children().each(function() {
    console.log(name);
    if (name == $(this).val()) {
      $(this).attr("disabled", "disabled");
    }
  });*/
}

function selectChange() {
  $(this).children("option:selected").each(function () {
    var name = $(this).val(); 
    var fieldDiv = $("<div>").attr("id", name).append($("<b>").append(globalActivities[name]['name'])).append($("<br>"));
    /*var select = $(this).parent();
    var selectClass = "."+select.attr("id")
    $(selectClass).empty();*/
    /*inputToActivity[inputToClass.indexOf(select.attr("id"))] = name;*/
    deselect(name);
    $.each(globalActivities[name]['details'], function(det, detName) {
      var labelName = name + '-' + det;
      var label = $("<label>").attr("for", labelName).text(detName);
      var inputField = $("<input>").attr("type", "tel").attr("name", labelName).attr("value", 0).addClass("required").addClass("digits");
      fieldDiv.append(label).append(inputField);
      $(this).removeAttr("selected");
    });
    $("#log_form").append(fieldDiv).append($("<br>"));
  });
  $('input').textinput();
  console.log($(this).val());
  $(this).val("default");
  $(this).parent().find(".ui-btn-text").text("Add an activity...");
  console.log($(this).val());
  $('select').selectmenu();
}
</script>

Please enter positive integer values for the following information:
<br>
<form action="log_ask.php" method="post" id="logForm">
<div data-role="fieldcontain">
<fieldset data-role="controlgroup" data-type="horizontal">
	<legend>Date:</legend>

    <label for="month">Month</label>
<select name="month" id="month">
	<?php
	$today = time();
	for ($i = 1; $i <= 12; ++$i) {
	  $month = mktime(0, 0, 0, $i);
	  $selected = ((date('m', $month) == date('m', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('m', $month) . '"' . $selected . '>' . date('M', $month) . "</option>\n";
	}
	?>
</select>

	<label for="day">Day</label>
<select name="day" id="day">
	<?php
	// this should be error checked.
	for ($i = 1; $i <= 31; ++$i) {
	  $day = mktime(0, 0, 0, 1, $i);
	  $selected = ((date('d', $day) == date('d', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('d', $day) . '"' . $selected . '>' . date('d', $day) . "</option>\n";
	}
	?>
</select>

<label for="year">Year</label>
<select name="year" id="year">
	<?php
	$today = time();
	for ($i = 2010; $i <= 2012; ++$i) {
	  $year = mktime(0, 0, 0, 1, 1, $i);
	  $selected = ((date('Y', $year) == date('Y', $today)) ? ' selected="selected"' : '');
	  echo '<option value="' . date('Y', $year) . '"' . $selected . '>' . date('Y', $year) . "</option>\n";
	}
	?>
</select>
</fieldset>
</div>
<div id="log_form">
</div>
<br>
<div id="select_activity_div">
<label for="select-activity" class="ui-hidden-accessible">Add activity</label>
<select name="select-activity" id="select-activity" data-native-menu="false">
  <option data-placeholder="true" id="option-select-activity-default" value="default">Add an activity...</option>
  <?php
    foreach ($global_activities as $act => $act_details) {
      echo '<option value="' .$act. '">' .$act_details['name']."</option>\n";
    }
  ?>
</select>
</div>
<br>
<input type="submit" value="Log!" data-icon="check" data-theme="b">
</form>


<?php include('footer.php'); ?>
