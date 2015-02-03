<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Myparish Logo -->
	<header class="text-center">
		<div class = "main_container" >
			<div class = "design_bar">
				<h1> 
				<img src = "<?php echo base_url();?>/html_attrib/parishStyles/images/header.png" style = "position:relative; top:-19px;">
				OurParish.org
				</h1>
			</div>
			
			<div class="slider" style = "position:relative; top:-20px;" >
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
			<h2 class = "introduction_header" style = "text-align:left;" >OurParish.org</h2>
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

			<div id="demo" class="yui3-skin-sam yui3-g" style="width: 240px; position: relative; top:-340px; left: 645px"> <!-- You need this skin class -->
				<div id="leftcolumn" class="yui3-u">
					<!-- Container for the calendar -->
					<div id="mycalendar"></div>
				</div>
			</div>

			<div class ="block-3">
				<p class = "parishes">Parishes</p>
				<div id="ca-container" class="ca-container">
					<div class="ca-wrapper">
						<?php
						if($information)
						foreach($information as $info) 
						{
							foreach($info as $value) 
							{				
						?>	
							<!-- The carousel thing-->
								<div class="ca-item">
									<div class="ca-item-main">
										<div class="ca-icon" style="background-size: 220px 155px; background-image:url(<?php echo base_url(); ?>html_attrib/parishStyles/images/parishcovers/<?php echo $value->filename; ?>.<?php echo $value->ext; ?>);"></div>
										<a href="#" class="ca-more">more...</a>
									</div>
									<div class="ca-content-wrapper">
										<div class="ca-content">
											<a href="#" class="ca-close">close</a>
											<div class="ca-content-text">
												<p><?php echo $value->parish; ?></p>
												<p><?php echo $value->description; ?></p>
											</div>
										</div>
									</div>
								</div>
						<?php
							}
						}
						?>
						<!--end of transformation -->
					</div>
				</div>
			</div>

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
	
	<div id="calendarBtn" data-toggle="modal" data-target="#myModal">
	</div>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Reading of the day</h4>
		  </div>
		  <div class="modal-body">
			<pre id="textt">
			</pre>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
	  
		</div>
	  </div>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/ajax.googleapis.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/jquery.easing.1.3.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/jquery.contentcarousel.js"></script>
	<script type="text/javascript">
	$('#ca-container').contentcarousel();

	$(document).ready(function(){

	YUI().use('calendar', 'datatype-date', 'cssbutton',  function(Y) {

		var calendar = new Y.Calendar({
		contentBox: "#mycalendar",
		Height: '200px',
		width:'240px',
		showPrevMonth: true,
		showNextMonth: true,
		date: new Date()}).render();

		var dtdate = Y.DataType.Date;

		// Listen to calendar's selectionChange event.
			calendar.on("selectionChange", function (ev) {

				var newDate = ev.newSelection[0];
				
				$.ajax({
					type:"POST",
					url: "<?php echo base_url(); ?>index.php/p_functs/getReading",
					data:  "date=" + dtdate.format(newDate),
					success:
						function(data) {
							
							console.log(data);
							// data = data.replace(/\\n/g,'\n').replace(/\\t/g,'\t');
							
							document.getElementById('textt').innerHTML = data;
							// console.log(data);
							// $("#textt").text(data);
							$("#calendarBtn").click();
						},
						
					error: 
						function(data){
							console.log(data);
							alert('An error has occurred.');
						}
				});
				
				// console.log($("#claire").text());
				//Y.one("#selecteddate").setHTML(dtdate.format(newDate));    
			});
		});

	});

	</script>
 
</body>
</html>