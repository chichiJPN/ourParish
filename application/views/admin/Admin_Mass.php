<html>

<?php
/*MAIN PAGE PARA SA SCHEDULE*/
?>

<div><h4 style="margin-left:350px;">MASS SCHEDULES</h4></div>
<div id="customTag" data-table_type="Mass" data-parish_id="<?php echo $parish_id; ?>"></div>

<div>
<table>
	<tr>
		<td>
			<a><h5 style="margin-left:250px;" data-toggle="modal" data-target="#addmass">ADD SCHEDULES</h5></a>
		</td>
		<td>
			<a><h5 style="margin-left:100px;" data-toggle="modal" data-target="#updatemass">UPDATE SCHEDULES</h5></a>
		</td>
	</tr>
</table>
</div>
<div>
      <?php
      	/*MO VIEW SA MGA SCHEDULES*/
      ?>
         <table class="tabledata" id="schedules_Mass">
         </table>
         </div>

<?php
/*ADD SCHEDULE PARA MASS*/
?>

<div class="modal fade" id="addmass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="addMassSched_Form">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">ADD SCHEDULE</h4>
      </div>
    <div class="modal-body modal_background" style="margin-bottom:3px;">
	<div>
		<table>
			<form>
			<tr>
				<td>
					<h4 style="margin-bottom:10px;">Select Day:</h4>
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

			<tr>
				<td>
					<h4 style="margin-bottom:10px; margin-left:10px;">Language:</h4>
				</td>
				<td>
				<div>
					<select class="form-control" name="language">
							<option value='01'>English</option>
							<option value='02'>Tagalog</option>
							<option value='03'>Cebuano</option>
					</select>	
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

<?php
/*UPDATE SCHEDULE PARA MASS*/
?>

<div class="modal fade" id="updatemass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">UPDATE SCHEDULE</h4>
      </div>
    <div class="modal-body modalbody_update modal_background">
		<table id="update_Mass">
		</table>
 	</div>
 	<form id="updateMassSched_Form">
 	<div class="changesched" id="showsched"></div>
      
      <div class="modal-footer modal_bfooter">
        <button type="submit"  class="btn btn-primary">Update Schedule</button>
      </div>
	</form>  
    </div>
  </div>
</div>

</html>