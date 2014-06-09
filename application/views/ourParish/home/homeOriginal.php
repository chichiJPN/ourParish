<!DOCTYPE html>
<html>
	<head>
		<title>OurParish</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Circular Content Carousel with jQuery" />
		<meta name="keywords" content="jquery, conent slider, content carousel, circular, expanding, sliding, css3" />
		<meta name="author" content="Codrops" />
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/images/favicon.ico" rel="shortcut icon" > 
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/demo.css" rel="stylesheet" type="text/css"  />
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/style.css" rel="stylesheet" type="text/css"  />
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/jquery.jscrollpane.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">
		<link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/bootstrap.min.css" rel = "stylesheet">
		
		<link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/slider.css" rel = "stylesheet">
		<link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/modal.css" rel = "stylesheet">
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/datepicker.css" rel="stylesheet"  type="text/css" />
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/coin-slider-styles.css" rel="stylesheet"  type="text/css" />
		<script src="http://code.jquery.com/jquery-latest.min.js" ype="text/javascript" ></script>
		<script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/coin-slider.js" type="text/javascript"></script>
		<link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/styles.css" rel = "stylesheet">
	</head>

<body class = "html" >

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
   			<li class = "active">
   				<a  href ="home.php">HOME</a>
   			</li>
   			<li >
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
	    <label for="username" class = "user_view">USERNAME:</label>
	    <input type="text" class="form-control1" id="username" placeholder="Username">
	    </div>
	    <div class="form-group">
	    <label for="exampleInputPassword1">PASSWORD:</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  	</div>
	  	<button type="submit" class="btn btn-primary">Log In</button>
  	 	</form>
  	  </div>
  	  <div class="modal-footer">
  	  </div>
  	  </div>
  	  </div>
  		</div>
      <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">
        <div class="col-md-12" style="height: 170px; width: 100%;  
             background: url('<?php echo base_url(); ?>/html_attrib/parishStyles/images/header.png') no-repeat center center; background-size:35% 100%; position:relative; left:40 px;">
        </div>
    </a>

    
      <div class = "main_container" >
      <div class = "design_bar">
      </div>
      <div class="slider">
    
      <a href="#" target="_blank">
        <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/pic1.jpg" alt="" />   
      </a>
      
      <a href="#" target="_blank">
        <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/pic2.jpg" alt="" />
      </a>
      
      <a href="#" target="_blank">
        <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/pic3.jpg" alt="" />
      </a>
      
    </div>

    <script>
      $('.slider').coinslider();
    </script>
<h2 class = "introduction_header" >OurParish.org</h2>
<div class = "introduction_container" >

<img src = "<?php echo base_url(); ?>/html_attrib/parishStyles/images/header_small.png" style = "float:left; position:relative; top:10px; ">
<p class="text-justify text-indent">
                        OurParish.org is a community initiative by the <strong style = "color: #7d8992;">Better Philippines Inititative Movement (BPIM)</strong>.
                        We cover the latest news, religious activities and schedules from our different partner parishes.
                        Are you looking for mass schedules near your community? Myparish.org does that for you!
                        Myparish.org makes these information easily available and accessible, fit for the modern world.
                    </p>

                    <p class="text-justify text-second-indent">
                        As we continue to build on this project, we are focused on improving our scope for the whole community. 
                        Should you want for your local parish to partner with us, please let us know!
                        Feel free to contact us wherever you prefer- Facebook, Twitter, or support@ourparish.org
                    </p>

 
</div> 
<div class ="block-3">
<p class = "parishes"  >Parishes</p>
<div id="ca-container" class="ca-container">
<div class="ca-wrapper">
<div class="ca-item ca-item-1">
<div class="ca-item-main">
<div class="ca-icon"></div>
                <a href="#" class="ca-more">more...</a>
</div>
<div class="ca-content-wrapper">
<div class="ca-content">

<a href="#" class="ca-close">close</a>
<div class="ca-content-text">
<p>Data</p>
</div>
<ul>
</ul>
</div>
</div>
</div>
        <div class="ca-item ca-item-2">
        <div class="ca-item-main">
        <div class="ca-icon"></div>
        <a href="#" class="ca-more">more...</a>
        </div>
        <div class="ca-content-wrapper">
        <div class="ca-content">
        <a href="#" class="ca-close">close</a>
        <div class="ca-content-text">
        <p>Data</p>
        </div>
        </div>
        </div>
        </div>
              <div class="ca-item ca-item-3">
              <div class="ca-item-main">
              <div class="ca-icon"></div>
              <a href="#" class="ca-more">more...</a>
              </div>
              <div class="ca-content-wrapper">
              <div class="ca-content">
              <a href="#" class="ca-close">close</a>
              <div class="ca-content-text">
              <p>Data</p>
              </div>
              </div>
              </div>
              </div>
                     <div class="ca-item ca-item-4">
                     <div class="ca-item-main">
                     <div class="ca-icon"></div>
                     <a href="#" class="ca-more">more...</a>
                     </div>
                     <div class="ca-content-wrapper">
                     <div class="ca-content">
                     <a href="#" class="ca-close">close</a>
                     <div class="ca-content-text">
                     <p>Data</p>
                     </div>
                     </div>
                     </div>
                     </div>
                           <div class="ca-item ca-item-5">
                           <div class="ca-item-main">
                           <div class="ca-icon"></div>
                           <a href="#" class="ca-more">more...</a>
                           </div>
                           <div class="ca-content-wrapper">
                           <div class="ca-content">
                           <a href="#" class="ca-close">close</a>
                           <div class="ca-content-text">
                           <p>Data</p>
                           </div>
                           </div>
                           </div>
                           </div>
                                  <div class="ca-item ca-item-6">
                                  <div class="ca-item-main">
                                  <div class="ca-icon"></div>
                                  <a href="#" class="ca-more">more...</a>
                                  </div>
                                  <div class="ca-content-wrapper">
                                  <div class="ca-content">  
                                  <a href="#" class="ca-close">close</a>
                                  <div class="ca-content-text">
                                  <p>Data</p>
                                  </div>
                                  </div>
                                  </div>
                                  </div>   
</div>
</div>
</div>


<div class = "bottom" style="background: url('images/block-2.jpg') no-repeat center center; ">
</div>

            <div class = "icon_container">
              <a href="www.facebook.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
            </div>
</div>

                <footer>
                    <h5><center>Copyright &copy; 2014 OurParish.org</center></h5>
                </footer>
  </header>
      

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/jquery.easing.1.3.js"></script>
      <!-- the jScrollPane script -->
      <script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/jquery.mousewheel.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/jquery.contentcarousel.js"></script>
      <script type="text/javascript">
      $('#ca-container').contentcarousel();
      </script>
      <script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/bootstrap.min.js"></script>
 
</body>

</html>