$(document).ready(function(){
  $(window).load(function() {
	loadDirectories();
  });
  
  function loadDirectories() {
	$.ajax({
		type: "POST",
		url: "../ck_ourparish/loadDirectories",
		dataType: "json",
		data:  $(this).serialize(),
		success:
			  function(data) {
				document.getElementById("image_theContainer").innerHTML = "";
				
				var div_imageRow;
				var count = 0;

				for(val in data.directory) {
					
					if(val % 4  == 0) {
						count++;
						if(val > 0) {							
							document.getElementById("image_theContainer").appendChild(div_imageRow);
						}
						div_imageRow = document.createElement("div");
						div_imageRow.className = "image_row_container";
					}

					var div_img = document.createElement("div");
					div_img.className = "image_container";
					div_img.setAttribute("href", "../ck_ourparish/imagesPage/"+data.directory[val])
					
					var div_top = document.createElement("div");
					div_top.className = "top";
					div_top.style.background = "url('../../html_attrib/parishStyles/images/parish_images/folderImage.png') no-repeat center";
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

					div_top.appendChild(div_rename);
			
					
					var div_bottom = document.createElement("div");
					div_bottom.className = "bottom";
					
					var p = document.createElement("p");
					p.textContent = data.directory[val];

					div_bottom.appendChild(p);
					
					div_img.appendChild(div_top);
					div_img.appendChild(div_bottom);
					
					div_imageRow.appendChild(div_img);
				
				}
				
				if(count >= 4) {
					count = count - 3;
					var container = $(".main_container2");
					var lengthInc = 300;
					var containerDefaultSize = 1100;
					container.css('height', containerDefaultSize + (lengthInc * count));				
			
				}
				
				document.getElementById("image_theContainer").appendChild(div_imageRow);
				

			  },
						
		error: function(data){
					alert('an error has occurred');
			  }
	});
  }
  
  function goToURL() {
	window.location.replace(this.parentNode.getAttribute("href"));
  }
  
  function rename(e) {
	e.stopPropagation();
	$('#renameModal').modal('show'); 
	var value = this.parentNode.parentNode.childNodes[1].childNodes[0].innerHTML;
	var element = document.getElementById("id_folderName");
	
	element.innerHTML = value;
	element.value = value;
	
  }
  
  function deleteDirectory(e) {
	e.stopPropagation();
	console.log(this.parentNode.parentNode.childNodes[1].childNodes[0].innerHTML);
	if(confirm("Are you sure you want to delete this directory?")) {
		$.ajax({
			type: "POST",
			url: "../ck_ourparish/removeDirectory",
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
		url: "../ck_ourparish/addDirectory",
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
	$.ajax({
		type: "POST",
		url: "../ck_ourparish/renameDirectory",
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