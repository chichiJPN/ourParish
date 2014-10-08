<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
  <div id="init" data-base_url="<?php echo base_url(); ?>"></div>
  <script type="text/javascript">
    var test = new ViewSwitcher();
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
 <header class = "text-center">
 <!--==============LOGO===========-->
      <a>
       
      </a>
 <!--=========End of Logo=======-->      
 <!--======================Body Content===========================-->

<div class = "main_container">
  
    <div class = "design_bar">
         <h1> 
     <img src = "<?php echo base_url();?>/html_attrib/parishStyles/images/header.png" style = "position:relative; top:-19px;">
     OurParish.org
     </h1>
    </div>
      <div class="ic"></div>
        <div>
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
						</form>   
          </ul>
        </div>                 
                <div class="row block-bg">
                  <h3 class="text-center" style="float:center; margin-top: 35px; padding-bottom:15px">Parishes</h3>
                </div>           
  <div class="col-lg-6">
		<form id="searchForm">
			<div class="input-group">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button">Search</button>
					</span>
					<input id="keyword" type="text" class="form-control" style="margin-left:275px; margin-bottom: 20px">
			</div><!-- /input-group -->
		</form>
  </div><!-- /.col-lg-6 -->
 
               <!--==========================Calling the page of the iframes=========================================-->           
          <iframe id="myframe" src="<?php echo base_url(); ?>index.php/parish_site/thumbnails/" height="1000" width="1000" scrolling="no"  frameBorder="0" onload='javascript:test.initIframeSize(this);'></iframe>
                <!--============================End=========================================================-->
          
     
              
           <div style="margin-left: 825px; float: left; position: relative; top: 20px;" >
          <a href="http://facebook.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="http://twitter.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
               <a href="http://betterphilippines.org"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
          </div>
    </div>
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
    <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/bootstrap.min.js"></script>
</body>
</html>

