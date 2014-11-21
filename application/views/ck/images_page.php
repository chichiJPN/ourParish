<!DOCTYPE html>
<html>
	<head>
		<meta>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/jquery-1.11.0.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/imagesPage.js"></script>
		<script src="<?php echo base_url(); ?>/html_attrib/adminStyles/js/ajaxfileupload.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>html_attrib/ckStyles/assets/css/bootstrap.min.css"/>
		<link href = "<?php echo base_url(); ?>html_attrib/ckStyles/assets/css/styles.css" rel = "stylesheet">
		<link href = "<?php echo base_url(); ?>html_attrib/ckStyles/assets/css/modal.css" rel = "stylesheet">
	</head>

	<body class = "html">
    <!--Navbar-->
    <div class="navbar navbar-static-top navbar-default">
      <div class="container">
        <a href ="#" class = "navbar-brand"><?php echo $name_parish[0]->parish; ?></a>
        <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
        </button>     
        <div class = "collapse navbar-collapse navHeaderCollapse">
          <ul class = "nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo base_url(); ?>index.php/admin">Back to main</a>
            </li>
          </ul>
        </div>
       </div>
    </div>

	<div class = "main_container2">
        <br>
		<div id="header_container">
			<a style="right:7%; position:absolute;" href="<?php echo base_url(); ?>index.php/ck_ourparish/imageDirectoryPage"><button type="button" class="btn btn-default navbar-btn" >Back</button></a>
			<button data-toggle="modal" data-target="#addImageModal" style="left:2%; position:absolute;" type="button" class="btn btn-default navbar-btn" >Add Image</button>
		</div>
		<div id="theContainer">
<?php
				$x = 0;
				foreach ($list as $value) {					
					if($x % 4 == 0) {
						if($x > 0) {
							echo '</div>';
						}
						echo '<div class = "image_row_container2">';
					}
?>
					<div data-toggle="modal" data-target="#imageModal" class="image_container2" style="background-image:url('<?php echo base_url(); ?>html_attrib/parishStyles/images/parish_images/<?php echo $keyword[0]->keyword.'/'.$directoryName.'/'.$value; ?>');">						
						<div title="Delete this picture" class="delete"></div>
					</div>
<?php
					$x++;
				}
				echo '</div>';
?>
		</div>
	</div>
	
	<!-- Add Image Modal -->
	<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Add images</h4>
		  </div>
		  
		  <form id="addImagesForm" enctype="multipart/form-data">		  
			  <div class="modal-body">
				<p id="directoryName"><?php echo $directoryName; ?></p>
				<input type="file" id="imageUpload" name="imageUpload" size="20" />
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-default">Add Images</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
	
	<!-- Image Modal -->
	<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="width: 700px;">
		<div class="modal-content" style="width: 700px;">
		  <div class="modal-body">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<img id="imgTag">
		  </div>
		</div>
	  </div>
	</div>
 </body>
</html>