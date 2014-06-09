<!DOCTYPE html>
<html>
<head>
    <title>OurParish</title>
    <meta name ="viewport" content = "width=device-width, initial-scale = 1.0">
    <link href = "<?php echo base_url(); ?>html_attrib/parishStyles/services/servbootstrap.css" rel = "stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>html_attrib/parishStyles/services/servnewStyle.css" media="screen"></style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>html_attrib/parishStyles/services/servparishStyle.css" media="screen"></style>
</head>
<body>
<div class="panel-heading"><h4><span class="glyphicon glyphicon-book"></span> Reading of the Day</h4></div>
<div class="panel-body">
	<div class="row">
	
				<div class="form-horizontal"  role="form" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Language</label>
						<div class="col-sm-3" style="float: left;">
							<select class="form-control">
								<option value"English">English</option>
 								<option value"Cebuano">Cebuano</option>
 							</select>
 						</div>
 					</div>
 				</div>	

				
	</div>

<div class="panel2 panel-default" style="border-color: #ddd;">
	<div class="panel-heading1"><h4>First Reading</h4></div>
	<iframe id="onframe" src="<?php echo base_url(); ?>index.php/parish_site/firstReading" height = "490px" width = "100%"  frameBorder="0"></iframe>
</div>

<div class="panel2 panel-default" style="border-color: #ddd; margin-top: 20px;">
	<div class="panel-heading1"><h4>Psalm</h4></div>
		<iframe id="onframe" src="<?php echo base_url(); ?>index.php/parish_site/psalms" height = "375px" width = "100%"  frameBorder="0"></iframe>    
</div>	
</div>


</body>
</html>