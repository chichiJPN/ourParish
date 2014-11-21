
$(document).ready(function(){


  function filterChildren(children) {
	var count = 0;
	var holder = [];
	for(var i = 0; i < children.length; i++) {
		if(children[i].nodeType != 3) {
			holder[count] = children[i];
			count++;
		}
	}	
	return holder;
  }

  function createImageContainer(image_url) {
	var div_img = document.createElement("div");
	div_img.className = "image_container2";			
	div_img.style.background = "url('"+image_url +"')";			
	
	var deleteBtn = document.createElement("div");
	deleteBtn.title = "Delete this picture";
	deleteBtn.className = "delete";
	deleteBtn.addEventListener("click", function(e){ deleteButton(e,deleteBtn) });
	
	div_img.appendChild(deleteBtn);
	div_img.setAttribute("data-toggle", "modal");
	div_img.setAttribute("data-target", "#imageModal");
	
	div_img.addEventListener("click", function(){ imageModal(div_img) });
	
	return div_img;
  }
  
  function addNewImageRow(image_url) {
  
	var div_imageRow = document.createElement("div");
	div_imageRow.className = "image_row_container2";
							
	div_imageRow.appendChild(createImageContainer(image_url));
	
	document.getElementById("theContainer").appendChild(div_imageRow);

  }
  
  function addToRow(last_row, image_url) {
	last_row.appendChild(createImageContainer(image_url));
  }
  
  $(".image_container2").click(function() { imageModal(this); });
  
  function imageModal(img) {
	var style = img.currentStyle || window.getComputedStyle(img, false),
	bi = style.backgroundImage.slice(4, -1);
	
	var foo = document.getElementById("imgTag");
	foo.src = bi;				  
  }
  
  $(".delete").click( function(e) { deleteButton(e, this); });
  
  function deleteButton(e, theThis) {
	e.stopPropagation();
	
	if(confirm("Are you sure you want to delete this Image?")) {
		var img = theThis.parentNode,
		style = img.currentStyle || window.getComputedStyle(img, false),
		bi = style.backgroundImage.slice(4, -1);			
		$.ajax({
			type: "POST",
			url: "../../ck_ourparish/deleteImage",
			dataType: "json",
			data: "imageURL="+bi,

			success:
				function(data) {
					alert(data);
					img.remove();
				},          
			error: 
				function(data){
					alert("Delete fail.");
				}
		});
	}		  
  }
  

  $("#addImagesForm").submit(function() {
	$.ajaxFileUpload({
		url             : '../../ck_ourparish/addImage', 
		secureuri       : false,
		fileElementId   : 'imageUpload',
		dataType        : 'json',
		data            : {
			'directoryName' : document.getElementById("directoryName").innerHTML
		},
		success : function (data)
		{
			if(data.boolean == false) {
				alert('Image size must be less than 2MB and must have an extension of gif or jpg or png');
			} else if(data.boolean == true){
				
				alert('add successful');
				console.log(data.data.file_name);
				
				var children = document.getElementById("theContainer").childNodes;
				var filteredChildren = [], holder2 = [];
				var image_url = "../../../html_attrib/parishStyles/images/parish_images/"+data.keyword+"/"+data.directoryName+"/"+ data.data.file_name; // to edit
				
				if(children.length > 0 ) {
					
					filteredChildren = filterChildren(children);
					var last_row = filteredChildren[filteredChildren.length - 1];				
					holder2 = filterChildren(last_row.childNodes);
					
					if(holder2.length >= 4) {
						if(children.length >= 6) {
				
							var containerDefaultSize = 1100;
							var lengthInc = 250;
							var container = $('.main_container2');				
							container.css('height', containerDefaultSize + ((children.length - 5) * lengthInc));				
						}
						
						addNewImageRow(image_url);
						
					} else {
						addToRow(last_row, image_url);
					}
					
				} else {
					addNewImageRow(image_url);
				}	
				
			} else {
				alert('an error has occurred');
			}
		}
	});
	
	return false;			
  });
});