<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<header class="text-center">
		<div class = "main_container padding">
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
			
			<div id="externalFooter">
				<div id="externalImages">
					<a href="www.facebook.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconFb.png" width="50" height="50" class="img-iconMedia"></a>
					<a href="www.twitter.com"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconTwitter.png" width="50" height="50" class="img-iconMedia"></a>
					<a href="betterphilippines.org"> <img src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/iconBpim.png" width="50" height="50"  class="img-iconMedia"></a>
				</div>
			</div>
		</div>

		
	</header>
      
	</body>
	
</html>

