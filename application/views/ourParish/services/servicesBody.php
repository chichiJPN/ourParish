  <div id="init" data-base_url="<?php echo base_url(); ?>"></div>
  <script type="text/javascript">
    var test = new ServiceSwitcher();
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
  
<!--==============LOGO===========-->
      <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">
        <div class="col-md-12" style="height: 170px; width: 100%;  
             background: url('<?php echo base_url(); ?>html_attrib/parishStyles/images/header.png') no-repeat center center; background-size:35% 100%; position:relative; left:40 px;">
        </div>
    </a>

  <!--=========End of Logo=======-->
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
            <iframe id="myframe" src="<?php echo base_url(); ?>index.php/parish_site/sched/read" height = "1190px" width = "100%" scrolling="no" frameBorder="0"></iframe>    
          </div>
        </div>
          <a href="www.facebook.com"> <img src="<?php echo base_url(); ?>html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="<?php echo base_url(); ?>html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
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
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/bootstrap-editable.js"></script>

</body>
</html>