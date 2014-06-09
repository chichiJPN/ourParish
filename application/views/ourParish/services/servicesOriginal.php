<html>

<head>
    
    <title>OurParish</title>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>html_attrib/parishStyles/js/helper.js"></script>
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/style.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/slider1.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/timepicker.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/demo_table.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/smoothness.datepick.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/bootstrap-editable.css" rel = "stylesheet">
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>html_attrib/parishStyles/scripts.js"></script>
  

</head>
  
<body class="html">

  <div id="init"></div>
  <script type="text/javascript">
    var test = new ServiceSwitcher();
    test.init();
  </script>

  <style>
    .html 
          { 
    background: url(images/bckg1.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

      }
  </style>

  <!---Navigation bar---->  
  <div class="navbar navbar-static-top navbar-default"> 
    <div class="container">
      <a href ="#" class = "navbar-brand">OurParish</a>
      <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
        <span class = "icon-bar"></span>
      </button>     
      <div class = "collapse navbar-collapse navHeaderCollapse">
        <ul class = "nav navbar-nav navbar-right">
          <li>
            <a href ="home.php">HOME</a>
          </li>
          <li>
            <a href ="parishes.php">PARISHES</a>
          </li>
          <li  class = "active">
            <a href ="services.php">SERVICES</a>
          </li>
          <li>
            <a href ="news.php">NEWS</a>
          </li>
          <li>
            <a href ="about.php">ABOUT</a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#myModal">Login</a>
          </li>

        </ul>
     </div>
     <div class="nav navbar-nav pull-right" style="padding-top: 12px;">
     <!-- Button trigger modal -->
     </div>
    </div>
  </div>
<!-- Modal -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title" id="myModalLabel">ADMINISTRATOR</h4>
          </div>
          
          <div class="modal-body">
            <form role="form">
          
              <div class="form-group">
                  <label for="username" class = "user_view">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
          
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>    
              
                 <button type="submit" class="btn btn-primary">Log In</button>
            </form>
          </div>
          
          <div class="modal-footer" color="#000000"></div>
        </div>
      </div>
    </div>
   
      <!--==============LOGO===========-->
      <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">
        <div class="col-md-12" style="height: 170px; width: 100%;  
             background: url('images/header.png') no-repeat center center; background-size:35% 100%; position:relative; left:40 px;">
        </div>
    </a>

  <!--=========End of Logo=======-->

  <!--======================End of HEADER==========================-->
  <!--======================Body Content===========================--> 
  <div id="container_body2" class="text-center">
    <div class="block-2 pad-1"> 
     <nav class="navbar navbar-default" role="navigation">
     </nav>
      <div class="ic"></div>
        <div class="row block-bg"><h3 class="text-center" style="float:center">Services</h3></div>
        <div class="col-md-3">
          <div class="panel1 panel-default" style="border-color: #ddd;">
            <div class="panel-heading" style="padding:30px" >
              
            </div>
            <div class="panel-body">
              <ul id="services" class="nav nav-pills nav-stacked ">
              </ul>
              <script type="text/javascript">test.switch();</script>  
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel1 panel-default" class="text-center" style="border-color: #ddd;"> 
            <iframe id="myframe" src="services/readSched.html" height = "1190px" width = "100%" scrolling="no" frameBorder="0"></iframe>    
          </div>
        </div>
          <a href="www.facebook.com"> <img src="images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
    </div> 
  </div>
  <!--===========end of body content==================-->
  
  <!--=========== footer ===========-->
  <footer>
      <h5><center>Copyright &copy; 2014 OurParish.org</center></h5>
  </footer>
  <!--=========== end of footer ===========-->
  </section>
<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-editable.js"></script>

</body>
</html>