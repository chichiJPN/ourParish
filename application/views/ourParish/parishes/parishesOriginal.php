<html>
<head>
       <title>OurParish</title>
  <script language="javascript" type="text/javascript" src="js/helper.js"></script>
  <!--=======Note: duha ka Javascript ako gitawag :**======-->
  <script language="javascript" type="text/javascript" src="scriptsList.js"></script>

</head>

<body class="html">
  <div id="init"></div>
  <script type="text/javascript">
    var test = new ViewSwitcher();
    test.init();
  </script>

<!--Backgroound-->
  <style>
    .html 
    {
     background: url(../images/bckg1.jpg) no-repeat center center fixed; 
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
            <li class = "active">
              <a href ="parishes.php">PARISHES</a>
            </li>
            <li>
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
     <header class = "text-center">
 <!-----End of Navigation Bar and Modal-------->
 <!--======================End of HEADER==========================-->
 <!--==============LOGO===========-->
      <a>
        <div class="col-md-12" style="height: 170px; width: 100%; background: url('images/header.png') no-repeat center center; background-size:35% 100%; position:relative; left:0px;">
        </div>
      </a>
 <!--=========End of Logo=======-->      
 <!--======================Body Content===========================-->

    <div class = "main_container">
      <div class="block-2 pad-1">
        <nav class="navbar navbar-default" role="navigation">
          <ul class="nav navbar-nav nav-justified menu">
            <form class="form-inline" role="form">
              <div class="form-group"></form>
                
                   <!-- Single button(DropDown)-->   
                <li>
                    <button type="button" class="btn btn-default-view dropdown-toggle" data-toggle="dropdown">
                      Type of View <span class="caret"></span>
                    </button>
                      <ul id="views" class="dropdown-menu" role="menu"></ul>
                      <script type="text/javascript">test.setView();</script>
                </li>
                        <li> <label class="sr-only" for="search">Search</label></li>
                        <li><input type="search" class="form-control" id="Ronnie Gwapo" placeholder="Search"></li>
                             
                        <li> <button type="submit" style="border: 0; background: transparent"></li>
                        <li><a href="www.facebook.com"> <img src="images/but.png" width="16" height="16"></a></li>

                        
          </ul>

         <!--icon image-->
       
        </nav>

                               
                <div class="row block-bg">
                  <h3 class="text-center" style="float:center">Parishes</h3>
                </div>
           
               <!--==========================Calling the page of the iframes=========================================-->           
          <iframe id="myframe" src="thumbnails.php" height="1000" width="1000" scrolling="no"  frameBorder="0"></iframe>            
                <!--============================End=========================================================-->
          
      </div>
              <div class="icon_container"> 
            <a href="www.facebook.com"> <img src="images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
              </div>
    </div>

            <!--=========== footer ===========-->
                <footer>
                    <h5>Copyright &copy; 2014 OurParish.org</h5>
                </footer>
            <!--=========== end of footer ===========-->

</header>
            
<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

