<html>
<head>
    
   <title>OurParish</title>
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/helper.js"></script>


</head>
  
<body class="html">
  <div id="init" data-base_url="http://localhost/parishsite/"></div>
  <script type="text/javascript">
    var test = new MonthSwitcher();
    test.init();
  </script>

<!--Backgroound-->
  <style>
    .html 
          { 
    background: url(<?php echo base_url(); ?>html_attrib/parishStyles/images/bckg1.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

      }
  </style>
  <!--End ofBackgroound-->


  <!--===============================START OF HEADER===============================-->
  
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
          <li>
            <a href ="services.php">SERVICES</a>
          </li>
          <li class = "active">
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
   
  <!-----End of Navigation Bar-------->

    <!--==============LOGO===========-->
      <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">
        <div class="col-md-12" style="height: 170px; width: 100%;  
             background: url('<?php echo base_url(); ?>html_attrib/parishStyles/images/header.png') no-repeat center center; background-size:35% 100%; position:relative; left:40 px;">
        </div>
    </a>

  <!--=========End of Logo=======-->

  <!--======================End of HEADER==========================-->
  <!--======================Body Content===========================--> 
  
    <div class="block-2 pad-1">
      <nav class="navbar navbar-default" role="navigation">
        <ul class="nav navbar-nav nav-justified menu">
        </ul>
        <!--Image Icon-->
        
      </nav>  

      <div class="ic"></div>
          <div class="row block-bg">
              <h3 class="text-center" style="float:center">News and Events</h3></div>
            <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-heading"><h4>Date</h4></div>
                  <div class="panel-body">
                    <ul id ="months" class="nav nav-pills nav-stacked "></ul>
                       <script type="text/javascript">
							test.getMonths();
					   </script>
                  </div>
              </div>
            </div>
            
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Latest News</h4></div>
                    <div class="panel-body">
                                                    <h4><a href="#">Welcome to OurParish</a><br/>
                                <small>Date Here!</small>
                            </h4>
                            
                          <div id= "container_body3">
                          <hr>
                            <iframe id="myframe" src="<?php echo base_url(); ?>/index.php/parish_site/months/january" height="420" width="660"  frameBorder="0"></iframe>
                         
                          </div>
                            <hr/>
                    </div>
                </div>
            </div>
           
            <a href="www.facebook.com"> <img src="<?php echo base_url(); ?>html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="<?php echo base_url(); ?>html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
    </div>

            <!--===========end of body content==================-->
            
            <!--=========== footer ===========-->
                <footer>
                    <h5><center>Copyright &copy; 2014 Our Parish.org</center></h5>
                </footer>
                <!--=========== end of footer ===========-->
  </header>
  <!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/bootstrap.min.js"></script>
</body>
</html>