<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
  <div id="init" data-base_url="<?php echo base_url(); ?>"></div>
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

    <!--==============LOGO===========-->
      <header class="text-center">
    <!-- Myparish Logo -->
    <a href="">

       

    </a>

  <!--=========End of Logo=======-->

  <!--======================End of HEADER==========================-->
  <!--======================Body Content===========================--> 
  
    <div class="block-2 pad-1">
     <div class = "design_bar">
         <h1> 
     <img src = "<?php echo base_url();?>/html_attrib/parishStyles/images/header.png" style = "position:relative; top:-19px;">
     OurParish.org
     </h1>
    </div>

      <div class="ic"></div>
          <div class="row block-bg">
              <h3 class="text-center" style="float:center; margin-top: 40px">News and Events</h3></div>
            <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-heading"><h4>Date</h4></div>
                  <div class="panel-body">
                    <ul id ="months" class="nav nav-pills nav-stacked "></ul>
                       <script type="text/javascript">test.getMonths();</script>
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
                          <!-- height = 420 -->
                            <iframe id="myframe" src="<?php echo base_url(); ?>index.php/parish_site/months/january" width="660" frameBorder="0"></iframe>
                            <script>test.hook()</script>
                          </div>
                            <hr/>
                    </div>
                </div>
            </div>
           
            <div style="margin-left: 700px; float: left; position: relative; top: 15px;" >
          <a href="www.facebook.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="www.twitter.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
          </div>
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
    <script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/bootstrap.min.js"></script>
</body>
</html>