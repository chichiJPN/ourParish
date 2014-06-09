<html>
<head>
      <title>OurParish</title>
      <meta name ="viewport" content = "width=device-width, initial-scale = 1.0">
      <link href = "css/bootstrap_2.css" rel = "stylesheet">
      <link href = "css/styles.css" rel = "stylesheet">
      <link rel="stylesheet" type="text/css" href="css/aboutStyle.css" media="screen"></style>
      <!--=======Note: duha ka Javascript ako gitawag :**======-->
      <script language="javascript" type="text/javascript" src="scripts.js"></script>
      <script language="javascript" type="text/javascript" src="scriptsList.js"></script>

</head>

<body class="html">

<!--Backgroound-->
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
              <a class ="center" href ="home.php">HOME</a>
            </li>
            <li>
              <a href ="parishes.php">PARISHES</a>
            </li>
            <li>
              <a href ="services.php">SERVICES</a>
            </li>
            <li>
              <a href ="news.php">NEWS</a>
            </li>
            <li class = "active">
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

   
 <!-----End of Navigation Bar and Modal-------->

  <!--======================End of HEADER==========================-->

     <!--==============LOGO===========-->
  <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">
        <div class="col-md-12" style="height: 170px; width: 100%;  
             background: url('images/header.png') no-repeat center center; background-size:35% 100%; position:relative; left:40 px; ">
        </div>
    </a>
  <!--=========End of Logo=======-->      

  <!--======================Body Content===========================-->
  
    <div class="main_container">
        <div class="ic"></div>
          <div class="block-2 pad-all">
        <nav class="navbar navbar-default" role="navigation">
          <ul class="nav navbar-nav nav-justified menu">
            

       
        </nav>
            
        <div class="row block-bg">
          <h3 class="text-center" style="float:center">About Us</h3>
        </div>   

      
              <div class="row">
                <div class="col-md-8">
                  <h2 class="h3-line">About Us</h2>
                  <p class="text-indent text-justify">
                          Myparish.org is a community initiative by the <strong>Better Philippines Inititative Movement (BPIM)</strong>.
                  We cover the latest news, religious activities and schedules from our different partner parishes.
                          Myparish.org makes these information easily available and accessible, fit for the modern world.
                  </p>

                  <p class="text-indent text-justify">
                      As we continue to build on this project, we are focused on improving our scope for the whole community. Should you want for your local parish to partner with us, please let us know! 
                                          Feel free to contact us wherever you prefer- Facebook, Twitter, or support@myparish.org
                  </p>
                </div>

                <div class="col-md-4">
                    <div class="center-block">
                        <img class="img-thumbnail center-block" src="http://myparish.betterphilippines.org/assets/images/myparish_logo_small.png">
                    </div>
                </div>
              </div>

          <a href="www.facebook.com"> <img src="images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
          </div>
        </div>
      </section>


      

            <!--=========== footer ===========-->
                <footer>
                    <h5>Copyright &copy; 2014 MyParish.org</h5>
                </footer>
            <!--=========== end of footer ===========-->

            
<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

