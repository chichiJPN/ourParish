<?php

?>
<html>
<head>
    <link href = "css/bootstrap.css" rel = "stylesheet">
    <link href = "css/style.css" rel = "stylesheet">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>



<body>

<div class="div_header visible-xs visible-sm visible-md visible-lg"><font class="fontstyle">OurParish</font></div>
<div class="div_admin visible-xs visible-sm visible-md visible-lg"><font class="fontstyle_sec">ADMINISTRATOR PAGE</font></div>
<div class="container_body  visible-xs visible-sm visible-md visible-lg">
<select class="form-control form-control_first">
  <option>MASS SCHEDULES</option>
  <option>BAPTISM SCHEDULES</option>
  <option>CONFESSION SCHEDULES</option>
  <option>CONFIRMATION SCHEDULES</option>
</select>
<button type="button" class="btn btn-default button_add  visible-xs visible-sm visible-md visible-lg" data-toggle="modal" data-target="#myModal">Add</button>
<button type="button" class="btn btn-default button_delete  visible-xs visible-sm visible-md visible-lg">Delete</button>
<button type="button" class="btn btn-default button_update  visible-xs visible-sm visible-md visible-lg">Update</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">ADDING ITEMS</h4>
      </div>
      <div class="modal-body">
       <form role="form">
  <div class="form-group">
    <label for="chName">Church's Name</label>
    <input type="name" class="form-control" id="chName" placeholder="Enter name">
  </div>
 <div>
  <label for="lang">Language</label>
 <select class="form-control">
  <option>English</option>
  <option>Tagalog</option>
  <option>Cebuano</option>
</select>
</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>