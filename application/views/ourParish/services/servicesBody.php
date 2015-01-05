<html>
<head>
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

</head>
<body>  
  <div id="init" data-base_url="<?php echo base_url(); ?>"></div>
  <script type="text/javascript">
    var test = new ServiceSwitcher();
    test.init();
  </script>
<!--==============LOGO===========-->
      <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">
       
    </a>

  <!--=========End of Logo=======-->
   <!--======================Body Content===========================--> 
 <div class= "main_container">

  <div class = "design_bar">  
         <h1> 
     <img src = "<?php echo base_url();?>/html_attrib/parishStyles/images/header.png" style = "position:relative; top:-19px;">
     OurParish.org
     </h1>
    </div>
      <div class="ic"></div>
        <div class="row block-bg"><h3 class="text-center" style="float:center; margin-top: 40px">Services</h3></div>
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
        <!-- =============================================== MAJOR IFRAME STARTS HERE ===============================================-->
        <div class="col-md-9">
          <div class="panel1 panel-default" class="text-center" style="border-color: #ddd;"> 
			     <iframe id="myframe" src="<?php echo base_url(); ?>index.php/parish_site/sched/<?php if($info != false) echo $info; else echo 'read'; ?>" height = "500px" width = "100%" scrolling="no" frameBorder="0"></iframe>
            <script type="text/javascript">test.hook1();</script> 
          </div>
        </div>
        <!-- =============================================== MAJOR IFRAME ENDS HERE ===============================================-->
         <div style=" margin-left: 825px; float: left; position: relative; top: 20px;" >
          <a href="www.facebook.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
          </div>
        </div>
        


  <!--===========end of body content==================-->
  
  <!--=========== footer ===========-->
  <footer>
      <h5><center>Copyright &copy; 2014 OurParish.org</center></h5>
  </footer>
  <!--=========== end of footer ===========-->
  </section>
<!-- Latest compiled and minified JavaScript ASD-->
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/bootstrap-editable.js"></script>

</body>
</html>