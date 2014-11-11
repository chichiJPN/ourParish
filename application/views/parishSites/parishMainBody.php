<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


	<header class="text-center">

		<div class = "main_container" >
			<div class = "design_bar">
				<div class = "collapse navbar-collapse navHeaderCollapse">
					<ul class = "nav navbar-nav navbar-left" id="navbarExternals">
						<?php
							if($pages)
							foreach($pages as $value)
							{ 
								foreach($value as $value2)
								{ 
									?>
										<li class = "active">
											<a  href ="<?php echo base_url(); ?>index.php/parish/index/<?php echo $parishKey.'/'.$value2; ?>"><?php echo $value2; ?></a>
										</li>
									<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
			<!--CONTENTS HERE <3-->
			<?php echo $code; ?>

			<div class = "bottom" style="background: url('<?php echo base_url(); ?>/html_attrib/parishStyles/images/block-2.jpg') no-repeat center center; ">
			</div>

			<div style="margin-left:730px; margin-left: 740px; float: left; position: relative; top: 0px;" >
				<a href="www.facebook.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconFb.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
				<a href="www.twitter.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
				<a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconBpim.png" width="50" height="50" margin-left:"8%" class="img-iconMedia"></a>
			</div>
		</div>

		<footer>
			<h5><center>Copyright &copy; 2014 OurParish.org</center></h5>
		</footer>
	</header>
      
	</body>
</html>

