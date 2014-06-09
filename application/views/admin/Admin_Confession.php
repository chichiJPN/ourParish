<html>

<div><h4 style="margin-left:350px;">CONFESSION SCHEDULES</h4></div>

<div id="customTag" data-table_type="Confession" data-parish_id="<?php echo $parish_id; ?>"></div>

<div>
<table>
	<tr>
		<td>
			<a><h5 style="margin-left:250px;" data-toggle="modal" data-target="#addconfe">ADD SCHEDULES</h5></a>
		</td>
		<td>
			<a><h5 style="margin-left:100px;" data-toggle="modal" data-target="#updateconfe">UPDATE SCHEDULES</h5></a>
		</td>
	</tr>
</table>
</div>
<div>
      <?php
      	/*MO VIEW SA MGA SCHEDULES*/
      ?>
         <table class="tabledata" id="schedules_Confession">
         </table>
         </div>

<?php
/*ADD SCHEDULE PARA CONFESSION*/
?>

<div class="modal fade" id="addconfe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form id="addConfeSched_Form">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">ADD SCHEDULE</h4>
      </div>
    <div class="modal-body modal_background" style="margin-bottom:3px;">
<div>


<table>
	<tr>
		<td>
			<h4 style="margin-bottom:10px;" name="day">Select Day:</h4>
		</td>	
		<td>
			<div>
				<select class="form-control" name="day">
					<option value='01'>Sunday</option>
					<option value='02'>Monday</option>
					<option value='03'>Tuesday</option>
					<option value='04'>Wednesday</option>
					<option value='05'>Thursday</option>
					<option value='06'>Friday</option>
					<option value='07'>Saturday</option>
				</select>
			</div>	
		</td>
	</tr>
	
	<tr>
		<td>
			<h4 style="margin-bottom:10px;">Start Time:</h4>
		</td>
		<td>
		<div>
			<input type="time" name="time_start" class="form-control" style="width:150px;">
		</div>
		</td>

		<td>
			<h4 style="margin-bottom:10px; margin-left:10px;">End Time:</h4>
		</td>
		<td>
		<div>
			  <input type="time" name="time_end" class="form-control" style="width:150px;">
		</div>
		</td>
	</tr>
</table>
</div>
 	</div>
      <div class="modal-footer modal_bfooter">
        <button type="submit"  class="btn btn-primary">Add Schedule</button>
      </div>
    </div>
	</form>
  </div>
</div>	
</div>


<?php
/*UPDATE SCHEDULE PARA CONFESSION*/
?>

<div class="modal fade" id="updateconfe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">UPDATE SCHEDULE</h4>
      </div>
	<form id="updateConfeSched_Form">
    <div class="modal-body modalbody_update modal_background">
		<table id="update_Confession">
		</table>
 	</div>
 	
 	<div class="changesched" id="showsched"></div>
      
      <div class="modal-footer modal_bfooter">
        <button type="submit"  class="btn btn-primary">Update Schedule</button>
      </div>
	 </form>
    </div>
  </div>
</div>

</html>
