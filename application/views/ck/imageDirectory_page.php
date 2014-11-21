<!DOCTYPE html>
<html>
	<head>
		<meta>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/jquery-1.11.0.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/imagesDirectory.js"></script>
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
			<a style="right:7%; position:absolute;" href="<?php echo base_url(); ?>index.php/ck_ourparish/showpage"><button type="button" class="btn btn-default navbar-btn" >Back</button></a>
			<button data-toggle="modal" data-target="#addDirectoryModal" style="left:2%; position:absolute;" type="button" class="btn btn-default navbar-btn" >Add Directory</button>
		</div>
		<div id="image_theContainer">
		</div>
	</div>
	
	<!-- Add Image Modal -->
	<div class="modal fade" id="addDirectoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Add a folder</h4>
		  </div>
		  <form id="addDirectoryForm">
		  
			  <div class="modal-body">
				<input required style="margin-left:33% !important;" name="folderName" placeholder="Folder Name">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-default">Add Directory</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
	
	<!-- Rename Modal -->
	<div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Rename the Folder</h4>
		  </div>
		  <form id="renameDirectoryForm">
		  
			  <div class="modal-body">
				<p id="id_folderName" title="Old Folder Name"></p>
				<input required style="margin-left:33% !important;" name="newFolderName" placeholder="New Folder Name Here">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-default">Rename</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>	
 </body>
</html>