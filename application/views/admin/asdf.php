<?php
//include 'Header.php';
?>

<html>
<head>
    <link href = "<?php echo base_url();?>/html_attrib/adminStyles/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo base_url();?>/html_attrib/adminStyles/css/style.css" rel = "stylesheet">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url();?>/html_attrib/adminStyles/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>


<div id="asdf">
<p></p>
</div>
<script>
	var table = $('<table></table>').css("border",2);
	var firstRow = $('<tr></tr>');
	firstRow.append($('<td></td>').text('Date'));
	firstRow.append($('<td></td>').text('Description'));
	firstRow.append($('<td></td>').text('Language'));
	table.append(firstRow);
	$("#asdf").html(table);
</script>

<body>

<div class="col-md-12">
	<div class="uppertable"></div>
</div>
<div class="col-md-12">
	<div class="tableadmin">
		<div class="col-md-12">
			<table class="tableheader">
			<tr>
				<th><h4><a data-toggle="modal" data-target="#addpar">ADD PARISH</a></th>
			</tr>
			<tr>
				<td class="divborder"></td>
			</tr>
			</table>

			<div class="col-md-12">
				<div><h4 style="margin-left: 40%">PARISH LIST</h4></div>
				<div class="divborder"></div>
        <div>
          <table class="tablemanage">
            <tr>
              <div class="inviborder"></div>
            </tr> 
            <tr>
              <td><a>Manage Administrator</a></td>
              <td><a style="margin-left:10px;">Description</a></td>
              <td><a style="margin-left:10px;" data-toggle="modal" data-target="#managesched">Manage Schedule</a></td>
              <td><a style="margin-left:10px;">Delete</a></td>
            </tr>
          </table>
        </div>
			</div>	
		</div>
	</div>
</div>

<div class="modal fade" id="addpar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">ADD PARISH</h4>
      </div>
      <div class="modal-body">
  <form role="form">
  <div class="form-group">
    <label for="chname">Church's Name:</label>
    <input type="chname" class="form-control" id="chname" name="chndame" placeholder="">
  </div>
</div>
</form>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary">Add Parish</button>
      </div>
    </div>
  </div>
</div>	

<div class="modal fade" id="managesched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal_width">
    <div class="modal-content modal_width">
      <div class="modal-header modal_width">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title modal_width" id="myModalLabel">MANAGE SCHEDULE</h4>
      </div>
      <div class="modal-header modal_width">
         <table>
         <tr>
            <td><a id="getBapt"><h5>BAPTISM SCHEDULES</h5></a></td>
            <td><a id="getConfe"><h5 style="margin-left:60px;">CONFESSIONS SCHEDULES</h5></a></td>
            <td><a id="getConfi"><h5 style="margin-left:60px;">CONFIRMATIONS SCHEDULES</h5></a></td>
            <td><a id="getMass"><h5 style="margin-left:60px;">MASS SCHEDULES</h5></a></td>
         </tr>
         </table>
      </div>
        
        <div class="modal-body modal_managesched modal_width">  
            <div id="modalbody"></div>
        </div>
      
      <div class="modal-footer modal_width">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  

<script>
$(document).ready(function(){
  $("#getBapt").click(function(){
    $("#modalbody").load("index.php/admin/baptism/");
  });
  
  $("#getConfe").click(function(){
    $("#modalbody").load("index.php/admin/confession/");
  });

  $("#getConfi").click(function(){
    $("#modalbody").load("index.php/admin/confirmation");
  });
  
  $("#getMass").click(function(){
    $("#modalbody").load("index.php/admin/mass");
  });
});
</script>

</body>
</html>