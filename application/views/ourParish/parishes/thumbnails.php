<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <html>
<head>
      <meta name ="viewport" content = "width=device-width, initial-scale = 1.0">
      <link href = "<?php echo base_url(); ?>/html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>
</head>

<body>
<!--<body id="thumbnail_body"> -->
        <!--=======================START OF BODY CONTENT============================-->

         <!--======================Note: If you add a parish/thumbnail, you must change the code.===========================-->

  <!----thumbnail 1---->
  <div class="row">
	<?php
		$count = 0;
		if($information)
		foreach($information as $value)
		{
			?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img style="display:block;height: 110px; width: 180px;" src="<?php echo base_url(); ?>/html_attrib/parishStyles/images/parishcovers/<?php echo $value->filename.'.'.$value->ext; ?>">
					<div class="caption">
						<a data-toggle="modal" data-target="#myModal<?php echo $count;?>"><h4 class="text-center"><?php echo $value->parish; ?></h4></a>
						<p class="text-center"><?php echo $value->barangay.', '.$value->street.' '.$value->towncity.' city'; ?></p>
					</div>
				</div>  
			</div>


		  <!-- Modal1 -->
		  <div class="modal fade" id="myModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title" id="myModalLabel">The <?php echo $value->parish; ?></h4>
				</div>
				
				<div class="modal-body">
				  <div class="form-group">
					 <div style="background-: url(<?php echo base_url(); ?>/html_attrib/parishStyles/images/parishcovers/<?php echo $value->filename.'.'.$value->ext; ?>);"></div>
					  <p class="text-center"><?php echo $value->description; ?></p>

					  <a href="<?php if($value->url == NULL) echo base_url().'index.php/parish/index/pageNotFound/pageNotFound'; else echo $value->url; ?>" target="window"><?php echo 'more at '.$value->parish; ?></a>
				  </div>
					<div class="form-group"></div>
				</div>
				
				<div class="modal-footer"></div>
			  </div>
			</div>
		  </div>
		  <!--End of Modal-->
			
			<?php
			$count++;
		}		
	?>
</div>
<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/bootstrap.min.js"></script>
</body>
</html>