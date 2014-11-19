<!DOCTYPE html>
<html>
	<head>
		<meta>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/jquery-1.11.0.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>html_attrib/ckStyles/assets/js/bootstrap.min.js"></script>
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
	
	<script type="text/javascript">
		$(document).ready(function(){
		  $(window).load(function() {
			loadDirectories();
		  });
		  
		  function loadDirectories() {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/ck_ourparish/loadDirectories",
				dataType: "json",
				data:  $(this).serialize(),
				success:
					  function(data) {
						document.getElementById("image_theContainer").innerHTML = "";
						
						var div_imageRow;
						for(val in data.directory) {
							{
								if(val % 4  == 0) {
									if(val > 0) {
										document.getElementById("image_theContainer").appendChild(div_imageRow);
									}
									div_imageRow = document.createElement("div");
									div_imageRow.className = "image_row_container";
								}
								// var a = document.createElement('a');
								// a.setAttribute("href", "<?php echo base_url(); ?>index.php/ck_ourparish/imagesPage/"+data.directory[val]);
								
								var div_img = document.createElement("div");
								div_img.className = "image_container";
								div_img.setAttribute("href", "<?php echo base_url(); ?>index.php/ck_ourparish/imagesPage/"+data.directory[val])
								
								// div_img.onclick = function () { folderClicked(data.directory[val]); };
								
								var div_top = document.createElement("div");
								div_top.className = "top";
								div_top.style.background = "url('<?php echo base_url(); ?>html_attrib/parishStyles/images/parish_images/folderImage.png') no-repeat center";
								div_top.onclick = goToURL;
								
								var div_delete = document.createElement("div");
								div_delete.title = "Delete this Directory";
								div_delete.className="delete";
								div_delete.onclick = deleteDirectory;
								div_top.appendChild(div_delete);

								var div_rename = document.createElement("div");
								div_rename.title = "Rename this Directory";
								div_rename.className="rename";
								div_rename.onclick = rename;
								// div_rename.dataset.toggle= "modal";
								// div_rename.dataset.target= "renameModal";
								
								div_top.appendChild(div_rename);
						
								
								var div_bottom = document.createElement("div");
								div_bottom.className = "bottom";
								
								var p = document.createElement("p");
								p.textContent = data.directory[val];

								div_bottom.appendChild(p);
								
								div_img.appendChild(div_top);
								div_img.appendChild(div_bottom);
								
								// a.appendChild(div_img);
								// div_img.addEventListener('click', function(){
									// folderClicked(p);
								// });

								div_imageRow.appendChild(div_img);
							}
						}
						
						document.getElementById("image_theContainer").appendChild(div_imageRow);
							

					  },
								
				error: function(data){
							alert('an error has occurred');
					  }
			});
		  }
		  
		  function goToURL() {
			window.open(this.parentNode.getAttribute("href"));
		  }
		  
		  function rename(e) {
			e.stopPropagation();
			$('#renameModal').modal('show'); 
			var value = this.parentNode.parentNode.childNodes[1].childNodes[0].innerHTML;
			var element = document.getElementById("id_folderName");
			
			element.innerHTML = value;
			element.value = value;
			
			// console.log('rename clicked!');
			// rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
			
		  }
		  
		  function deleteDirectory(e) {
			e.stopPropagation();
			console.log(this.parentNode.parentNode.childNodes[1].childNodes[0].innerHTML);
			if(confirm("Are you sure you want to delete this directory?")) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>index.php/ck_ourparish/removeDirectory",
					dataType: "json",
					data:  "folderName="+ this.parentNode.parentNode.childNodes[1].childNodes[0].innerHTML,
					success:
						  function(data) {
								loadDirectories();
								alert(data);
						  },
									
					error: function(data){
							console.log(data);
								alert('an error has occurred');
						  }
				});
			
			}
		  }
		  
		  
		  $("#addDirectoryForm").submit(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/ck_ourparish/addDirectory",
				dataType: "json",
				data:  $(this).serialize(),
				success:
					  function(data) {
							loadDirectories();
							alert(data);
					  },
								
				error: function(data){
						
						alert('an error has occurred');
					  }
			});
			return false;			
		  });
		  
		  $("#renameDirectoryForm").submit(function() {
			// console.log($(this).serialize() + "&oldFolderName=" + document.getElementById("id_folderName").value);
			
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/ck_ourparish/renameDirectory",
				dataType: "json",
				data:  $(this).serialize() + "&oldFolderName=" + document.getElementById("id_folderName").value,
				success:
					  function(data) {
							alert(data);
							loadDirectories();
					  },
								
				error: function(data){
						console.log(data);
						alert('an error has occurred');
					  }
			});
			
			return false;			
		  });
		  

		});		  

	</script>
	
 </body>
</html>