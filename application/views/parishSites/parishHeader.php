<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>OurParish</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/images/favicon.ico" rel="shortcut icon" > 
		<link href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/style.css" rel="stylesheet" type="text/css"  />
		<link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/bootstrap.min.css" rel = "stylesheet">
		<link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/styles.css" rel = "stylesheet">
	</head>
	<body class = "html" >
  	  <div class="navbar navbar-static-top navbar-default">         
        <div class="container">   
   	      <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
   		       <span class = "icon-bar"></span>
         		<span class = "icon-bar"></span>
         		<span class = "icon-bar"></span>
         		<span class = "icon-bar"></span>
        	</button> 		
   	      <div class = "collapse navbar-collapse navHeaderCollapse">

   		    <ul class = "nav navbar-nav navbar-right">
   			    <li >
					<a  href ="<?php echo base_url(); ?>index.php/parish_site/home">HOME</a>
				</li>
				<li >
					<a href ="<?php echo base_url(); ?>index.php/parish_site/parishes">PARISHES</a>
				</li>
				<li>
					<a href ="<?php echo base_url(); ?>index.php/parish_site/services">SERVICES</a>
				</li>
				<li>
				<a href ="<?php echo base_url(); ?>index.php/parish_site/news">NEWS</a>
				</li>
				<li>
					<a href ="<?php echo base_url(); ?>index.php/parish_site/about">ABOUT</a>
				</li>
   	        </ul>
          </div>
          <div class="nav navbar-nav pull-right" style="padding-top: 12px;">
            <!-- Button trigger modal -->
  
          </div>
        </div>
      </div>
