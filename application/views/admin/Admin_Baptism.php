<html>

<!-- MAIN PAGE PARA SA SCHEDULE -->
<div><h4 style="margin-left:350px;">BAPTISM SCHEDULES</h4></div>

<div id="customTag" data-table_type="Baptism" data-parish_id="<?php echo $parish_id; ?>"></div>
<div>
<table>
	<tr>
		<td>
			<a><h5 style="margin-left:250px;" data-toggle="modal" data-target="#addbap" data-id="<?php echo $parish_id; ?>">ADD SCHEDULES</h5></a>
		</td>
		<td>
			<a><h5 style="margin-left:100px;" data-toggle="modal" data-target="#updatebap" data-id="<?php echo $parish_id; ?>">UPDATE SCHEDULES</h5></a>
		</td>
	</tr>
</table>
</div>
		<!-- MO VIEW SA MGA SCHEDULES -->
		<div>
         <table class="tabledata" id="schedules_Baptism">
         </table>
		</div>

<!-- ADD SCHEDULE PARA BAPTISM -->

<div class="modal fade" id="addbap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form id="addBaptSched_Form">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">ADD SCHEDULE</h4>
      </div>
      <div class="modal-body modal_background" style="margin-bottom:3px;">
	  <div>
			
	    <table>
	
			<tr>
				<td>
					<h4 style="margin-bottom:10px;">Select Day:</h4>
				</td>	
				<td>
					<div>
						<select class="form-control" name="day">
							<option value='1'>Sunday</option>
							<option value='2'>Monday</option>
							<option value='3'>Tuesday</option>
							<option value='4'>Wednesday</option>
							<option value='5'>Thursday</option>
							<option value='6'>Friday</option>
							<option value='7'>Saturday</option>
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
        <button type="submit" class="btn btn-primary">Add Schedule</button>
      </div>
    </div>
	</form>
  </div>
</div>	

<!-- end of baptism add schedule-->

<!-- UPDATE SCHEDULE PARA BAPTISM -->

<div class="modal fade" id="updatebap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">UPDATE SCHEDULE</h4>
      </div>
    <div class="modal-body modalbody_update modal_background">
		<table id="update_Baptism">
		</table>
 	</div>
 	<form id="updateBaptSched_Form">
		<div class="changesched" id="showsched"></div>
      
      <div class="modal-footer modal_bfooter">
        <input type="submit"  class="btn btn-primary" value="Update Schedule">
      </div>
	</form>
    </div>
  </div>
</div>

<!-- end of baptism update schedule-->

</html>								

