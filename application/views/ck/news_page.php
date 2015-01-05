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


  <body class = html>
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
        <a style="right:7%; position:absolute;" href="<?php echo base_url(); ?>index.php/ck_ourparish/showpage"><button type="button" class="btn btn-default navbar-btn" >Back</button></a>
        <button data-toggle="modal" data-target="#myModal" style="left:2%; position:absolute;" type="button" class="btn btn-default navbar-btn" >Add event Date</button>
        <button id="dltNewsBtn" style="left:18%; position:absolute;" type="button" class="btn btn-default navbar-btn" >Delete Date</button>
		
		<div id="calendar" style="top:50px; left:2%; right:2%; position:absolute;">
		</div>

        <!--CKEditor-->
		<div class="container center">
			<input type="text" name="title" class="form-control" style="top:7%;" placeholder="Title" title="Title of News" id="title">
			<br>
			<br>
			<br>
			<p name="date" style="left:35% !important; position:absolute; width:200px;" title="Date news occurred" id="date">Please click a date on Calendar</p>
		</div>
		
        <div style="top:420px; left:2%; right:2%; position:absolute;">

			<form id="form_saveCK" role="form">
				
				<textarea class="ckeditor" id="editor1" name="datavalue ">               
				</textarea>
				
				<button type="submit" class="btn btn-default navbar-btn">Save Changes</button>
			</form>
		    <br>

			<div style="text-align:center" >
			  <label>Url:</label>
			  <label id="url">No event date selected</label>
			  <br>	
			</div>
		</div>
	</div>
	
	<!-- Add news Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Add an event date to calendar</h4>
		  </div>
		  <form id="addNewsForm">
			  <div class="modal-body">
				<input required type="date" style="margin-left:33% !important;"  name="modalDate">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="addNewsBtn" type="submit" class="btn btn-default">Add event Date</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
 </body>

<script type="text/javascript">

  $(document).ready(function(){
	  $(window).load(function() {
		updateCalendar();		
	  });
	  
	  function updateCalendar() {
   	    var today = new Date();
		var month = today.getMonth()+1; //January is 0!
		var year = today.getFullYear();
		loadCalendar(year, month);		
	  }
	  
	  $("#addNewsForm").submit(function() {
		
		$.ajax({
			type:"POST",
			url: "../parishadmin/addNewsDate",
			data:  $(this).serialize(),
			dataType: "json",
			success:
				function(data) {
					alert(data);
					updateCalendar();
				},
				
			error: 
				function(data){
					console.log(data);
					alert('An error has occurred.');
				}
		});
		return false;
	  });
	  
	  $("#dltNewsBtn").click(function() {
		if($("#date").val() == '') {
			alert("Please select a date first");
		}
		else if(confirm("Are you sure you want to delete news on " + $("#date").val() + "?")){
			
			$.ajax({
				type:"POST",
				url: "../parishadmin/deleteNews",
				data:  "date=" + $("#date").val() + "&title=" + $("#title").val(),
				dataType: "json",
				success:
					function(data) {
						alert(data);
						$("#title").val('');
						CKEDITOR.instances.editor1.setData('');					
						$("#date").text('Please click an event date on Calendar');
						$("#date").val('');
						$("#url").text('No event date Selected');
						
						updateCalendar();
						
					},
					
				error: 
					function(data){
						console.log(data);
						alert('An error has occurred.');
					}
			});
		}
	  });
		
		CKEDITOR.on('instanceReady', function(ev) {
			ev.editor.on('resize',function(reEvent){
				// console.log($('#cke_editor1').css('height','600px'));;
				var editorDefaultSize = 530;
				var containerDefaultSize = 1100;
			
				var editor    = $('#cke_editor1');
				var container = $('.main_container2');
				
				if(editor.height() > editorDefaultSize){
					container.css('height', containerDefaultSize + (editor.height() - editorDefaultSize));
				}
				else container.css('height', containerDefaultSize);

				 // alert( 'The editor resized' );
			 });
		});

	  function nextCalendar() {
		var nextdate = $("#nextCalendar").data('nextdate').split("/");
		loadCalendar(nextdate[0],nextdate[1]);	
	  }
	  
	  function prvCalendar() {
		var nextdate = $("#prvCalendar").data('nextdate').split("/");
		loadCalendar(nextdate[0],nextdate[1]);	
	  }
	  
	  function cellClicked(a) {
		//a.parent().css("background-color", "red");
		//console.log(a.attr('value')); // jQuery's .attr() method, same but more verbose
		console.log(a.attr('value'));
		$.ajax({
			type:"POST",
			url: "../parishadmin/getCalendarCellData",
			data:  'cellData=' + a.attr('value'),
			dataType: "json",
			success:
				function(data) {
					if(data[0].title == null) {
						$("#title").val("");
					} else { 
						$("#title").val((data[0].title).replace(/%20/g,' '));
					}
					CKEDITOR.instances.editor1.setData(data[0].content);
					
					$("#date").text((new Date(data[0].date)).toString().substring(3,15));
					$("#date").val(data[0].date);
					$("#url").text("<?php echo base_url(); ?>index.php/parish/news/<?php echo $keyword[0]->keyword; ?>/" + data[0].date + "/" + data[0].title);
				},
				
			error: 
				function(data){
					alert('error loading news data');
				}
		});
		
	 }
	 
   function loadCalendar(year, month) {
	
	$.ajax({
		type:"POST",
		url: "../parishadmin/PadminCalendar/"+year + '/' + month,
		dataType: "json",
		success:
			  function(data) {
				
			  	$("#calendar").html($(data.calendar).css("margin", "0 auto"));
				
				$("#nextCalendar").click(function() {
					nextCalendar();
				});
				
				$("#prvCalendar").click(function() {
					prvCalendar();
				});
				
				$(".calendarCell").on('click', function() {
					cellClicked($(this));
					// cellClicked();
				});
			  },
			
		error: function(data){
			$("#calendar").html('error loading calendar');

		}	
	});  
  }
  
  });
	// i will change
  $("#form_saveCK").submit(function(){
  

  var instance = CKEDITOR.instances.editor1;
  instance.updateElement();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>index.php/ck_ourparish/updateNews",
    dataType: "json",
    data: "datavalue="+escape(instance.getData())+"&title="+$("#title").val()+"&date="+$("#date").val(),
	
    success:
        function(data) {
			alert(data);
			$("#url").text("<?php echo base_url(); ?>index.php/parish/news/<?php echo $keyword[0]->keyword; ?>/" + $("#date").val() + "/" + $("#title").val().replace(/ /g,'%20'));
        },
    error: 
        function(data){
			console.log(data);
			alert("An error has occurred.");		
        }
  });

      return false;
  });

</script>


</html>