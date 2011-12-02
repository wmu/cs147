<?php
include('header.php');
?>

<script type="text/javascript">
$(document).ready(function(){
  $("#logForm").validate({
    rules: {
      <?php
        foreach ($global_activities as $act => $act_details) {
          foreach ($act_details['details'] as $det => $det_name) {
            $name = $act . '-' . $det;
            echo '"'.$name."\": {min: 1},\n";
          }
        }
      ?>
    }
  });
  $("#select-activity").change(selectChange);
  $(".x_button").click(removeLogField);
});
var globalActivities = <?= json_encode($global_activities); ?>;

function removeLogField() {
  var name = $(this).parent().attr("id");
  reselect(name);
  $(this).parent().remove();
}

function reselect(name) {
  var ind = $("#select-activity").children().index($("#select-activity option[value="+name+"]"));
  $("#select-activity-menu li[data-option-index="+ind+"]").removeClass("ui-disabled").removeAttr("aria-disabled");
}

function deselect(name) {
  var ind = $("#select-activity").children().index($("#select-activity option[value="+name+"]"));
  $("#select-activity-menu li[data-option-index="+ind+"]").addClass("ui-disabled").removeClass("ui-btn-hover-c").removeClass("ui-btn-active").attr("aria-disabled", true).attr("aria-selected", false);
}

function selectChange() {
  $(this).children("option:selected").each(function () {
    var name = $(this).val(); 
    var xButton = $("<a>").attr("href", "#").attr("data-role", "button").attr("data-icon", "delete").attr("data-iconpos", "notext").attr("data-inline", true).attr("class", "x_button").text("Delete").buttonMarkup();
    var title = $("<div>").addClass("title").append($("<b>").append(globalActivities[name]['name']));
    var fieldDiv = $("<div>").attr("id", name).append(xButton).append(title).append($("<br>"));
    deselect(name);
    $.each(globalActivities[name]['details'], function(det, detName) {
      var labelName = name + '-' + det;
      var label = $("<label>").attr("for", labelName).text(detName);
      var inputField = $("<input>").attr("type", "tel").attr("name", labelName).addClass("required").addClass("digits").addClass("log_input");
      fieldDiv.append(label).append(inputField);
      $(this).removeAttr("selected");
    });
    $("#log_form").append(fieldDiv.append($("<br>")));
  });
  $('.log_input').textinput();
  $(this).val("default");
  $(this).parent().find(".ui-btn-text").text("Add an activity...");
  $('select').selectmenu();
  $(".x_button").click(removeLogField);
}
</script>

<!--Please enter positive integer values for the following information:
<br><br>-->
<form action="log_ask.php" method="post" id="logForm">
<br>
<br>
<div id="log_form">
</div>
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
