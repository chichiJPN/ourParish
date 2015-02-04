$(document).ready(function(){
	var base_url;
  $(window).load(function() {
	base_url = $("#base_url").data('base_url');
    loadParishData();
	loadLocations();
	updateCalendar();
  });
  

  
  $("#editDescForm").submit(function() {
	var parish_id = $("#editDesc_PID").attr('value');	
	console.log($(this).serialize() + '&parish_id=' + parish_id);
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/editLocation",
		dataType: "json",
		data:  $(this).serialize() + '&parish_id=' + parish_id ,
		success:
			  function(data) {
					alert(data);
			  },
						
		error: function(data){
					console.log(data);
					alert('An error has occured. Please try again.');
			  }
	});
	
	return false;  
  });
  
  $("#uploadForm").submit(function(e){
	console.log('parish id passed is ' + $("#editDesc_PID").attr('value'));
	
	console.log('image id passed is ' + $("#thumb").attr('data-id'));
	e.preventDefault();
	$.ajaxFileUpload({
		url             : base_url + 'index.php/parishadmin/updateCover', 
		secureuri       : false,
		fileElementId   :'imageUpload',
		dataType        : 'json',
		data            : {
			'imageID'     : $("#thumb").data('id'),
			'parish_id'   : $("#editDesc_PID").attr('value')
		},
		success : function (data)
		{
			editLocation();
			alert(data);
		}
	});
  
	return false;
  });

  $("#addParishForm").submit(function(){

	$.ajax({
		type: "POST",
		url: base_url + "index.php/generaladmin/addParish",
		dataType: "json",
		data:  $(this).serialize() ,
		success:
			  function(data) {
					alert(data);
					loadParishData();
				},
						
		error: function(data){
					alert('An error has occurred.');
					console.log(data);
			  }
	});
	
	return false;
  });
	
  function loadParishData() {
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/getParishes",
		dataType: "json",
		success:
			  function(data) {
			  	$("#parish_table").html('');
				
				$.each( data, function( key, value ) {					
					var tableRow = $('<tr></tr>').attr('class','row');
					
					var parishName = $('<td></td>').attr('class','left tdparish');
					parishName.append($('<font></font>').text(value.parish).attr('class','fontparish'));
					
					var admin = $('<td></td>');
					admin.append($('<a></a>').text('Admin').attr("data-toggle", "modal").attr("data-backdrop","static").attr("data-target", "#prior").attr("data-id",value.id_parish).on( "click", getAdmin));

					var description = $('<td></td>');
					description.append($('<a></a>').text('Edit').css('margin-left','5px').attr("data-toggle", "modal").attr("data-backdrop","static").attr("data-target", "#desc").attr("data-id",value.id_parish).on("click", descValue));

					var schedule = $('<td></td>');
					schedule.append($('<a></a>').text('Schedule').css('margin-left','5px').attr("data-toggle", "modal").attr("data-backdrop","static").attr("data-target", "#managesched").attr("data-id",value.id_parish).on( "click", setID));

					var deletes = $('<td></td>').attr('class','right');
					deletes.append($('<a></a>').text('Delete').css('margin-left','5px').attr("data-id",value.id_parish).on( "click" , deleteParish));
					

					tableRow.append(parishName);
					tableRow.append(admin);
					tableRow.append(description);
					tableRow.append(schedule);
					tableRow.append(deletes);


                	$("#parish_table").append(tableRow);
					$(function() {
						var tr = $('#parish_table').find('tr');
						tr.bind('click', function(event) {
						var values = '';
						tr.removeClass('row-highlight');
						var tds = $(this).addClass('row-highlight').find('td');	
						});
					});
				});			  
			  },
			
		error: function(data){
			$("#parish_table").html("An error has occurred");
			console.log(data);
		}
	
	});
  }
  
  function deleteParish() {
	if(confirm('Are you sure you want to delete?')) {
		var parish_id = $(this).data('id');
		
		$.ajax({
			type: "POST",
			url: base_url + "index.php/generaladmin/deleteParish",
			dataType: "json",
			data:  'id_parish=' + parish_id,
			success:
				  function(data) {
						loadParishData();
						alert(data);					
					},
							
			error: function(data){
						console.log(data);
				  }
		});
	}
  }
  
  function loadLocations() {
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/getLocations",
		dataType: "json",
		success:
			  function(data) {
					
				$.each( data.barangay, function( key, value ) {
					$("<option />", {value: value.id_barangay, text: value.barangay}).appendTo($("#barangay"));			
				});
				
				$.each( data.street, function( key, value ) {
					$("<option />", {value: value.id_street, text: value.street}).appendTo($("#street"));			
				});
				
				$.each( data.towncity, function( key, value ) {
					$("<option />", {value: value.id_towncity, text: value.towncity}).appendTo($("#towncity"));			
				});
			  },
						
		error: function(data){
					console.log(data);
			  }
	});
  }
  
  function descValue() {
    $("#editDesc_PID").attr('value', $(this).data('id'));
	editLocation();
  }

  function editLocation() {
  
	var parish_id = $("#editDesc_PID").attr('value');
	console.log(parish_id);
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/getParDetails",
		dataType: "json",
		data: "parish_id=" + parish_id,
		success:
			  function(data) {
					
					document.getElementById("thumb").src= base_url + "html_attrib/parishStyles/images/parishcovers/"+data.details[0].filename+'.'+data.details[0].ext;
					$("#thumb").data('id',data.details[0].image);
					document.getElementById('street').value = data.details[0].street;
					document.getElementById('barangay').value = data.details[0].barangay;
					document.getElementById('towncity').value = data.details[0].towncity;
					document.getElementById('description').value = data.details[0].description;
					document.getElementById('tnumber').value = data.details[0].tnumber;
					
					
				},
						
		error: function(data){
					console.log(data);
			  }
	});
  }

  $("#adminAddForm").submit(function(){
	var parish_id = $("#adminAddForm_PID").attr('value');
	$.ajax({
		type: "POST",
		url: base_url + "index.php/generaladmin/addAdmin",
		dataType: "json",
		data:  $(this).serialize() +'&id_parish=' + parish_id,
		success:
			  function(data) {
					getAdmin2(parish_id);
					alert(data);
				},
						
		error: function(data){
					console.log(data);
			  }
	});
	
	return false;
  });
  
  function getAdmin() {
	var parish_id = $(this).data('id');
	$("#adminAddForm_PID").attr("value",parish_id);
	getAdmin2(parish_id);
  }
  
  function getAdmin2(parish_id) {
  	$.ajax({
		type: "POST",
		url: base_url + "index.php/generaladmin/getAdmin",
		dataType: "json",
		data: "parish_id=" + parish_id,
		success:
			  function(data) {
				$("#admin_table").html('');
				
					$.each( data, function( key, value ) {
									
						var tableRow = $('<tr></tr>');
						
						var adminName = $('<td></td>');					
						$("<font />", { text: value.username, value: parish_id, id: 'adminparish_id' }).css("margin-left","30px").appendTo(adminName);							
						
						var dButton = $('<td></td>');						
						$("<a />", { text: "delete", value: value.id_user, name: 'id_user' }).css("margin-left","190px").on( "click", deleteAdmin).appendTo(dButton);

						tableRow.append(adminName);
						tableRow.append(dButton);
						$("#admin_table").append(tableRow);

					});
				},
						
		error: function(data){
			  }
	});
  
  }
  
  function deleteAdmin() {
	var adminparish_id = $("#adminparish_id").attr('value');
	$.ajax({
	type: "POST",
	url: base_url + "index.php/generaladmin/deleteAdmin",
	dataType: "json",
	data: "admin_id=" + $(this).attr('value'),
	success:
		  function(data) {
				getAdmin2(adminparish_id);
				alert(data);
			},
					
	error: function(data){
				console.log(data);
		  }
	});
	return false;
  }
  
  function setID() {
    var parish_id = $(this).data('id');	
	$('#getBapt').data('id',parish_id);
	$('#getConfe').data('id',parish_id);
	$('#getConfi').data('id',parish_id);
	$('#getMass').data('id',parish_id);
	getSchedules(parish_id, 'Baptism');
  }
  
  $("#getBapt").click(function(){
	var parish_id = $(this).data('id');
	$("#modalbody").load(base_url + "index.php/admin/baptism/"+ parish_id, function() {
		getSchedules(parish_id, 'Baptism');
		$("#addBaptSched_Form").on("submit", addSched);
		$("#updateBaptSched_Form").on("submit", updateSched);	

	});
  });
  
  $("#getConfe").click(function(){
	var parish_id = $(this).data('id');
    $("#modalbody").load(base_url + "index.php/admin/confession/"+ parish_id, function() {
		getSchedules(parish_id,'Confession')
		$("#addConfeSched_Form").on("submit", addSched);
		$("#updateConfeSched_Form").on("submit", updateSched);	
	});
  });
  
  $("#getConfi").click(function(){
  	var parish_id = $(this).data('id');
    $("#modalbody").load(base_url + "index.php/admin/confirmation/"+ parish_id, function() {
		getSchedules(parish_id,'Confirmation')
		$("#addConfiSched_Form").on("submit", addSched);
		$("#updateConfiSched_Form").on("submit", updateSched);		
	});
  });
  
  $("#getMass").click(function(){
  	var parish_id = $(this).data('id');
    $("#modalbody").load(base_url + "index.php/admin/mass/"+ parish_id, function() {
		getSchedules(parish_id,'Mass')
		$("#addMassSched_Form").on("submit", addSched);
		$("#updateMassSched_Form").on("submit", updateSched);			
	});
  });
  
  function showUpdate() {
	$("#showsched").load(base_url + "index.php/admin/updateForm/"+ $(this).attr('value'));  
  }
  
  function showUpdateL() {
	$("#showsched").load(base_url + "index.php/admin/updateFormL/"+ $(this).attr('value'));  
  }

  function addSched() {
		var table =  $("#customTag").data('table_type');
		var parish_id = $("#customTag").data('parish_id');
		// console.log($(this).serialize() + "&parish_id=" + parish_id);
		$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/insert" + table,
		dataType: "json",
		data: $(this).serialize() + "&parish_id=" + parish_id,
		success:
			  function(data) {
					getSchedules(parish_id, table);
					alert(data);
				},
						
		error: function(data){
					console.log(data);
					alert('An error has occurred.');
			  }
		});
		return false;
	}
  
  function updateSched() {
		var table =  $("#customTag").data('table_type');
		var parish_id = $("#customTag").data('parish_id');
		var sched_id =  $("#update_ID").data('sched_id');
		// console.log($(this).serialize() + "&parish_id=" + parish_id + "&sched_id=" + sched_id);
		$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/update" + table,
		dataType: "json",
		data: $(this).serialize() + "&parish_id=" + parish_id + "&sched_id=" + sched_id,
		success:
			  function(data) {
					getSchedules(parish_id, table, sched_id);
					alert(data);
				},
						
		error: function(data){
					console.log(data);
			  }
		});
		return false;
  }
  
   function getSchedules(parish_id, type, toHighlight) {
		//toHighlight = typeof toHighlight !== 'undefined' ? toHighlight : 0;
		//console.log(toHighlight);
		$.ajax({
			type: "POST",
			url: base_url + "index.php/parishadmin/schedules" + type,
			dataType: "json",
			data: "parish_id=" + parish_id,
			success:
				  function(data) {
						$("#schedules_" + type).html('');
						$.each( data, function( key, value ) {
							var tableRow = $('<tr></tr>');
						
							var schedule = $('<td></td>');
							
							var sched_id;
							var language = '';

							switch(type)
							{
								case 'Baptism': sched_id = value.id_baptism_schedule; break;
								case 'Confession': sched_id = value.id_confession_schedule; break;
								case 'Confirmation': sched_id = value.id_confirmation_schedule; break;
								case 'Mass': 
									language = ' ' + value.language;
									sched_id = value.id_mass_schedule;
									break;
							}
														
							$("<font />", { text: value.day + '    ' + value.time_start + ' - ' + value.time_end + language}).css("margin-left","250px").appendTo(schedule);							
							
							var dButton = $('<td></td>');	

							
							$("<a />", { text: 'Delete',id: "changesched", value : sched_id, name: 'id_user'}).css("margin-left","20px").on( "click", deleteSched).appendTo(dButton);							
							
							tableRow.append(schedule);
							tableRow.append(dButton);
							$("#schedules_" + type).append(tableRow);
						});
						
						$("#update_" + type).html('');
						$.each( data, function( key, value ) {

							var tableRow = $('<tr></tr>');					
							var schedule = $('<td></td>');
					
							var sched_id;
							var language = '';													
							var massSched = false;

							switch(type)
							{
								case 'Baptism': sched_id = value.id_baptism_schedule; break;
								case 'Confession': sched_id = value.id_confession_schedule; break;
								case 'Confirmation': sched_id = value.id_confirmation_schedule; break;
								case 'Mass':
									language = ' ' + value.language;
									sched_id = value.id_mass_schedule;
									massSched = true;
									break;
							}
							
							$("<font />", { text: value.day + '    ' + value.time_start + ' - ' + value.time_end + language}).css("font-size", "14px").appendTo(schedule);							

							var dButton = $('<td></td>');

							
							
							if(massSched == true) {
								
								$("<a />", { text: 'Change Schedule',id: "changesched", value : sched_id, name: 'id_user'}).css("margin-left","150px").on( "click", showUpdateL).appendTo(dButton);														
							} else {
								$("<a />", { text: 'Change Schedule',id: "changesched", value : sched_id, name: 'id_user'}).css("margin-left","150px").on( "click", showUpdate).appendTo(dButton);														
							}
																					
							tableRow.append(schedule);
							tableRow.append(dButton);
							$("#update_" + type).append(tableRow);

							
							$(function() {
								var tr = $("#update_" + type).find('tr');
								tr.bind('click', function(event) {
									var values = '';
									tr.removeClass('row-highlight');
									var tds = $(this).addClass('row-highlight').find('td');						
								});
								
	
							});
						});
					},
							
			error: function(data){
					console.log(data);
				  }
		});
  }
  
  function deleteSched() {
	var sched =  $("#customTag").data('table_type');
	var parish_id = $("#customTag").data('parish_id');
	
	// console.log("parish_id=" + parish_id + "&sched_id=" + $(this).attr('value'));
	
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/delete" + sched,
		dataType: "json",
		data: "parish_id=" + parish_id + "&sched_id=" + $(this).attr('value'),
		success:
			  function(data) {
			  
					alert(data);
					getSchedules(parish_id, sched);
				},
						
		error: function(data){
					console.log(data);
			  }
	});
  }

// Calendar Functions for readings
	
	function updateCalendar() {
		var today = new Date();
		var month = today.getMonth()+1; //January is 0!
		var year = today.getFullYear();
		loadCalendar(year, month);		
	}  

   function loadCalendar(year, month) {
	
		$.ajax({
			type:"POST",
			url: "generaladmin/readingsCalendar/"+year + '/' + month,
			dataType: "json",
			success:
				  function(data) {
					// console.log(data.content);
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
				console.log(data);
				$("#calendar").html('error loading calendar');

			}	
		});  
	}	
	
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
		// console.log('cellData=' + a.attr('value') + '&language=' + $("#language").val());
		$.ajax({
			type:"POST",
			url: "generaladmin/getReading",
			data:  'cellData=' + a.attr('value') + '&language=' + $("#language").val(),
			dataType: "json",
			success:
				function(data) {
					console.log(data);
					$("#textarea_reading").val(data.data);
					$("#textarea_reading").text(data.data);
					$("#date_reading").val(data.date);
					$("#date_reading").text(data.date);
					// $("#date").text((new Date(data[0].date)).toString().substring(3,15));
					// $("#date").val(data[0].date);
					// $("#url").text("<?php echo base_url(); ?>index.php/parish/news/<?php echo $keyword[0]->keyword; ?>/" + data[0].date + "/" + data[0].title);
				},
				
			error: 
				function(data){
					console.log(data);
					alert('error loading reading');
				}
		});		
	 }
	 
	 $("#form_readingUpdate").submit(function() {
		
		console.log('date=' +$('#date_reading').text()+ '&data_reading=' +$('#textarea_reading').val());
		$.ajax({
			type:"POST",
			url: "generaladmin/updateReading",
			data:  'date=' +$('#date_reading').text()+ '&data_reading=' +$('#textarea_reading').val()+ '&language=' +$('#language').val(),
			dataType: "json",
			success:
				function(data) {
					// console.log(data);
					alert(data.message);
				},
				
			error: 
				function(data){
					// console.log(data);
					alert('error saving data');
				}
		});
		return false;
	 });
	 

  
});

 
