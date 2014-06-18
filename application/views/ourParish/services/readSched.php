<!DOCTYPE html>
<html>
<head>
    <title>OurParish</title>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" ></script>
    <meta name ="viewport" content = "width=device-width, initial-scale = 1.0">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/bootstrap.css" rel = "stylesheet">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>html_attrib/parishStyles/css/newStyle.css" media="screen"></style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>
	<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/helper.js"></script>

</head>
<body>
<div id="base_url" data-base_url="<?php echo base_url(); ?>"></div>
<div class="panel-heading"><h4><span class="glyphicon glyphicon-book"></span> Reading of the Day</h4></div>
<div class="panel-body">
	<div class="row1">

				<div class="form-horizontal"  role="form" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Language</label>
						<div class="col-sm-3" style="float: left;">
							
							<select class="form-control" id="read_language" onchange="asdf();" >
								<option value="1">English</option>
 								<option value="2">Cebuano</option>
 							</select>
 						</div>
 					</div>
 				</div>	
	</div>

<div class="panel2 panel-default" style="border-color: #ddd;">
	<div class="panel-heading1"><h4>First Reading</h4></div>
	<iframe id="onframe panel1" src="<?php echo base_url(); ?>index.php/parish_site/firstReading/1" height = "490px" width = "100%"  frameBorder="0"></iframe>
</div>

<div class="panel2 panel-default" style="border-color: #ddd; margin-top: 20px;">
	<div class="panel-heading1"><h4>Psalm</h4></div>
		<iframe id="onframe panel2" src="<?php echo base_url(); ?>index.php/parish_site/psalms/1" height = "375px" width = "100%"  frameBorder="0"></iframe>    
</div>	
</div>


</body>
</html>