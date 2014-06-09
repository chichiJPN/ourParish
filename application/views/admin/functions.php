<?php
include 'Header.php';
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "css/bootstrap.css" rel = "stylesheet">
    <link href = "css/style.css" rel = "stylesheet">
</head>



<body>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<div class="body_login">
  <div class="col-md-12">
      <div class="upperform"></div>
      <div class="div_login">
        <div class="col-md-12">
          <form role="form">
            <div class="form-group form-group_username">
              <label for="Username">USERNAME</label>
              <input type="name" class="form-control" id="Username" placeholder="Username">
            </div>
            <div class="form-group form-group_password">
              <label for="Password">PASSWORD</label>
              <input type="password" class="form-control" id="Password" placeholder="Password">
            </div>
            <div>
            <button type="button" class="btn btn-default button_login">Login</button>
              <a type="" class="btn btn-default button_register" data-toggle="modal" data-target="#reg">Register</a>
            </div>
            </form>  
        </div>
      </div>

  </div>
</div>

<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">REGISTRATION</h4>
      </div>
      <div class="modal-body">
  <form role="form">
  <div class="form-group">
    <label for="uname">Username:</label>
    <input type="name" class="form-control" id="uname" name="uname" placeholder="">
  </div>
  <div class="form-group">
    <label for="pass">Password:</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="">
  </div>
   <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="name" class="form-control" id="pass" placeholder="">
  </div>
</div>
</form>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




</body>
</html>