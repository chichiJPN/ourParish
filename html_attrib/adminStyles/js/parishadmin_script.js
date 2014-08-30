$(document).ready(function(){
	var base_url;
  $(window).load(function() {
	base_url = $("#base_url").data('base_url');
	loadLocations();
  });
  
  $("#editNews10").submit(function(){
	alert('asf');
	console.log('asdfsd');
	return false;
  });
  
  $("#editDescForm").submit(function() {

	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/editLocation",
		dataType: "json",
		data:  $(this).serialize(),
		success:
			  function(data) {
					console.log(data);					
			  },
						
		error: function(data){
					console.log(data);
			  }
	});
	
	return false;  
  });
  
  $("#uploadForm").submit(function(e){

	e.preventDefault();
	$.ajaxFileUpload({
		url             : base_url + 'index.php/parishadmin/updateCover', 
		secureuri       : false,
		fileElementId   :'imageUpload',
		dataType        : 'json',
		data            : {
			'imageID'     : $("#thumb").data('id')
		},
		success : function (data)
		{
			editLocation();
			console.log(data);
		}
	});
  
	return false;
  });
	
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
  
   $("#editDetails").click(function(){
     $("#editDesc_PID").attr('value', $(this).data('id'));
	 editLocation();
   });
   
   
  function editLocation() {
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/getParDetails",
		dataType: "json",
		success:
			  function(data) {
					document.getElementById("thumb").src= base_url + "html_attrib/parishStyles/images/parishcovers/"+data.details[0].filename+'.'+data.details[0].ext;					
					$("#thumb").data('id',data.details[0].image);
					document.getElementById('street').value = data.details[0].street;
					document.getElementById('barangay').value = data.details[0].barangay;
					document.getElementById('towncity').value = data.details[0].towncity;
					document.getElementById('description').value = data.details[0].description;
					document.getElementById('tnumber').value = data.details[0].tnumber;
					console.log('street ' +data.details[0].street);
					console.log('barnagay ' +data.details[0].barangay);
					console.log('towncity ' +data.details[0].towncity);
					console.log('image id is ' + data.details[0].image);
					console.log(data.details[0].tnumber);
					
				},
						
		error: function(data){
					console.log(data);
			  }
	});
  }
  

  $("#editSchedules").click(function(){
     var parish_id = $(this).data('id');	
	 $('#getBapt').data('id',parish_id);
	 $('#getConfe').data('id',parish_id);
	 $('#getConfi').data('id',parish_id);
	 $('#getMass').data('id',parish_id);
 	 getSchedules(parish_id, 'Baptism');
	});


  
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
		console.log($(this).serialize() + "&parish_id=" + parish_id);
		$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/insert" + table,
		dataType: "json",
		data: $(this).serialize(),
		success:
			  function(data) {
					console.log(data);
					getSchedules(parish_id, table);
				},
						
		error: function(data){
					console.log(data);
			  }
		});
		return false;
	}
  
  function updateSched() {
		var table =  $("#customTag").data('table_type');
		var parish_id = $("#customTag").data('parish_id');
		var sched_id =  $("#update_ID").data('sched_id');
		//console.log($(this).serialize() + "&parish_id=" + parish_id + "&sched_id=" + sched_id);
		$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/update" + table,
		dataType: "json",
		data: $(this).serialize() + "&sched_id=" + sched_id,
		success:
			  function(data) {
					console.log(data);
					getSchedules(parish_id, table, sched_id);
				},
						
		error: function(data){
					console.log(data);
			  }
		});
		return false;
  }
  
   function getSchedules(parish_id, type, toHighlight) {

		$.ajax({
			type: "POST",
			url: base_url + "index.php/parishadmin/schedules" + type,
			dataType: "json",
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
	
	console.log("parish_id=" + parish_id + "&sched_id=" + $(this).attr('value'));
	
	$.ajax({
		type: "POST",
		url: base_url + "index.php/parishadmin/delete" + sched,
		dataType: "json",
		data: "sched_id=" + $(this).attr('value'),
		success:
			  function(data) {
			  
					console.log(data);
					getSchedules(parish_id, sched);
				},
						
		error: function(data){
					console.log(data);
			  }
	});
  }
});

 
