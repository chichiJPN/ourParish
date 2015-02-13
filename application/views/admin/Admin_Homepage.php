<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<html>
<head>    
	<link href = "<?php echo base_url(); ?>/html_attrib/adminStyles/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>/html_attrib/adminStyles/css/style.css" rel = "stylesheet">
    <script src="<?php echo base_url(); ?>html_attrib/jquery-1.11.1.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>/html_attrib/adminStyles/js/bootstrap.min.js"></script>
 	<script src="<?php echo base_url(); ?>/html_attrib/adminStyles/js/ajaxfileupload.js"></script>
    <script src="<?php echo base_url(); ?>/html_attrib/adminStyles/js/scripts.js"></script>    
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>



<body>

<div id="base_url" data-base_url="<?php echo base_url(); ?>"></div>
<div class="col-md-12">
	<div class="uppertable"></div>
</div>
<div class="col-md-12">
	<div class="tableadmin">
		<div class="col-md-12">
			<table class="tableheader">
				<tr>
					<td><h4><a data-toggle="modal" data-target="#addpar" data-backdrop="static">ADD PARISH</a></td>
					<td><h4><a data-toggle="modal" data-target="#editread" data-backdrop="static">EDIT READINGS</a></td>
					<td><h4><a href="<?php echo base_url(); ?>index.php/validate/logout" style="margin-left:200px;">LOG-OUT</a></td>
				</tr>
			</table>

			<div class="col-md-12">
				<div class="divborder"></div>
				<div><h4 style="margin-left: 40%">PARISH LIST</h4></div>
				<div class="divborder"></div>
				<div>
				  <table class="tablemanage">
					<tr>
					</tr> 
				  </table>
				</div>			   
				<div>
					<table class="tabledata" id="parish_table">			 
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>


<!--Add parish Modal-->

<div class="modal fade" id="addpar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel" style="font-color:gray;">ADD PARISH</h4>
      </div>
	  
    <form role="form" id="addParishForm">
		  <div class="modal-body">	  
			   <div class="form-group">
				    <label for="chname">Church's Name:</label>
				    <input type="chname" class="form-control" id="chname" name="chname" placeholder="">
				    <br>
					<label for="chname">Website Keyword:</label>
				    <input type="chname" class="form-control" id="chname" name="keyword" placeholder="">
		            
	       </div>
      </div>
	  <div class="modal-footer">
	   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   <input type="submit" class="btn btn-primary" value="Add Parish">
	  </div>  
    </form>
    </div>
  </div>
</div>	

<!--Edit Readings-->

<div class="modal fade" id="editread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">EDIT READINGS</h4>
      </div>
	  <div class="modal-body">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<select id="language" class="form-control">
					<option value="1">english</option>
					<option value="2">bisaya</option>
				</select>
				<br>
				<div id="calendar">
				</div>		
			</div>
			<div class="col-md-3"></div>
		</div>
		<br>
		<form id="form_readingUpdate">
			<label>Date of reading: </label>
			<label id="date_reading"></label>
			
			<textarea id="textarea_reading" name="data_reading" class="form-control" rows="10" cols="30">
			</textarea>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" value="Save Changes">
			</div>  
		</form>
	  </div>
    </div>
	
  </div>
</div>	



<!--End of add parish modal-->

<!-- Main schedule page -->
<div class="modal fade" id="managesched" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal_width">
    <div class="modal-content modal_background">
      
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">MANAGE SCHEDULE</h4>
      </div>
      
      <div class="modal-header">
         <table>
         <tr>
            <td><a id="getBapt"><h5>BAPTISM SCHEDULES</h5></a></td>
            <td><a id="getConfe"><h5 style="margin-left:60px;">CONFESSIONS SCHEDULES</h5></a></td>
            <td><a id="getConfi"><h5 style="margin-left:60px;">CONFIRMATIONS SCHEDULES</h5></a></td>
            <td><a id="getMass"><h5 style="margin-left:60px;">MASS SCHEDULES</h5></a></td>
         </tr>
         </table>
      </div>
        
      <div class="modal-body modal_managesched" id="modalbody">  
      </div>
      
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  

<!--Start of Edit Admin Modal -->

<div class="modal fade" id="prior" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">EDIT ADMIN</h4>
      </div>
	 <form>
		 <div class="modal-body modal_adminbody modal_background" style="margin-bottom:3px;">
			<div><h4 style="margin-left:180px;">ADMINISTRATORS</h4></div>
			 <div><h4><a data-toggle="modal" data-target="#addadmin">ADD ADMIN</a></h4></div>
			 <!--The Admin Table -->
			<div id="admin_table"></div> 
			<!--End of Admin Table -->
		 </div>
		 <div class="modal-footer modal_bfooter">
			<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
		 </div>
	 </form>
    </div>
  </div>
</div>  

<!--add admin modal -->

<div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">ADD ADMIN</h4>
      </div>
  <form id="adminAddForm">
  <div class="modal-body modal_bodyaddadmin modal_background" style="margin-bottom:3px;">
    

	<div id="adminAddForm_PID" value="" name="parish_id"></div>
    <div class="form-group">
    <label for="labelforuname">Username</label>
    <input type="text" class="form-control" id="uname" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
    <label for="labelforpass">Password</label>
    <input type="password" name="password" class="form-control" id="pass" placeholder="Enter Password">
    </div>
  

  
    </div>
      <div class="modal-footer modal_bfooter">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save Changes">
      </div>
	</form>
    </div>
  </div>
</div>  




<!-- Start of Edit Location modal-->

<div class="modal fade" id="desc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal_background">
      <div class="modal-header modal_bheader">
        <h4 class="modal-title" id="myModalLabel">EDIT INFORMATION</h4>
      </div>

	    <div id="editDesc_PID" value=""></div>
	    <div class="modal-body" style="margin-bottom:3px;">
	      <div><h4 style="margin-left:180px;">Profile Parish Picture</h4></div>
         
		 <!-- start of uploaddd picture-->
		 
		 
		    
         <div id="upload-area">
            <div id="preview">
              <img width="100px" height="100px" src="<?php echo base_url(); ?>html_attrib/parishStyles/images/parishcovers/default.jpg" id="thumb" data-id="" >
            </div>

             <label>Upload a Picture of the Parish</label>
			  <table>
				<tr>  
					<form id="uploadForm" enctype="multipart/form-data">     
						<td><input type="file" size="20" id="imageUpload" name="imageUpload"></td>
						<td>
						   
						   <button class="button" type="submit">Upload</button>
						</td>
					</form>
				</tr>
			  </table>
           
          </div>
		
		<!-- emd of uploadddd-->
      <form id="editDescForm">		
        <div><h4 style="margin-left:180px;">Locations</h4></div>
		<div class="form-group">
	      <label for="labelparishadd">Street</label>
			<input class="form-control" id="street" name="street" placeholder="">
		  
	    </div>
		<div class="form-group">
			<label for="labelforcity">Barangay</label>
			<select class="form-control" name="barangay" id="barangay"></select>
		</div>
		<div class="form-group">
		<label for="labelfortown">Town / City</label>
			<select class="form-control" name="town" id="towncity">
			</select> 		
		</div>
	<div class="form-group">
    <label for="labelfortnumber">Description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
    </div>
    <div class="form-group">
    <label for="labelfortnumber">Telephone/Cellphone #</label>
    <input type="text" class="form-control" id="tnumber" name="tnumber" placeholder="Enter Number">
    </div>
	    </div>
	    <div class="modal-footer modal_bfooter">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save Changes">
	    </div>
	  </form>
    </div>    
  </div>
</div>  

</body>
</html>

