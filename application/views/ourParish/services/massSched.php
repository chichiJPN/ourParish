<!DOCTYPE html>
<html>
<head>
  <title>OurParish</title>
  <script src="<?php echo base_url(); ?>html_attrib/parishStyles/js/ajax.googleapis.jquery.min.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>html_attrib/parishStyles/js/helper.js"></script>
  <script>
    var a = new ParishSchedContainer();
    var b = new ParishSchedManager(a, 15);
$(document).ready(function(){
  $("#flip").click(function(){
		var base_url = $("#init").data('base_url');
		$.ajax({
			type: "POST",
			url: base_url + "index.php/p_functs/search_massSched",
			dataType: "json",
			data:  $("#mass_form").serialize(),
			success:
				  function(data) {
            document.getElementById("table_id_info").innerHTML = "";
            a.eraseAll();
            $.each( data, function( key, value )
            {
            a.push_back(
              new ParishSched(
                value.parish,
                value.street+' '+value.barangay+', '+value.towncity,
                value.day,
                value.time_start,
                value.language
              )
            );
            a.sort();

            });
            b.set(b.invokeMassSched);
          },
							
			error: function(data){
						console.log(data);
				  }
		});
    $("#panel").slideDown("slow");
  });
});
</script>
<style>

#flip
{
  
padding: 10px;
text-align:center;
background-color:#ffffff;
border:solid 1px #c3c3c3;
margin-right: 25px;
margin-left: 35px;
margin-bottom: 10px;
cursor: pointer;
border-radius: 4px;
box-shadow: inset 0px 10px 0px -18px #ffffff;
background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9) );
display: inline-block;
white-space: nowrap;
background-image: none;
-webkit-appearance: button;
-webkit-user-select: none;
}

#panel
{

text-align:center;
background-color:#f5f5f5;
border:solid 1px #c3c3c3;
padding:50px;
display:none;
margin-top: 65px;
min-height: 300px;
}

</style>
</head> 
<body>
  <div id="init" data-base_url="<?php echo base_url(); ?>"></div>
  <script type="text/javascript">
    var test = new MassSchedulerHelper();
    test.init();
  </script>
  <div class="panel-heading"><h4><span class="glyphicon glyphicon-search"></span> Search Mass Schedule</h4></div>		
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="post" id="mass_form">
      <div class="form-group1"> 
        <label class="col-sm-2 control-label">Parish</label>
        <div class= "col-sm-10">
          <select class="form-control1" name="parish" id= "dropdown-list">
            <option value="0">All</option>
			<?php
				foreach($parish as $value) 
				{
					?><option value="<?php echo $value->id_parish; ?>"><?php echo $value->parish; ?></option>
			<?php
				}			
			?>
          </select>
        </div>
      </div>
      <div class="form-group1"> 
        <label class="col-sm-2 control-label">Day</label>
        <div class= "col-sm-4">
          <select id="days" class="form-control1" name="day" ></select>
          <script type="text/javascript">test.listDays()</script>
        </div>
        <label class="col-sm-2 control-label">Time</label>
          <div class= "col-sm-4">
            <select id = "schedules" class="form-control1" name="time_start"></select>
            <script type="text/javascript">test.listSchedules();</script>
          </div>
      </div>
      <div class="form-group1"> 
        <label class="col-sm-5 control-label">Street</label>
        <div class= "col-sm-4">
          <select class="form-control1" name="street" >
			<option value="0">Any</option>
			<?php
				foreach($street as $value) 
				{
					?><option value="<?php echo $value->id_street; ?>"><?php echo $value->street; ?></option>
			<?php				
				}			
			?>
          </select>
        </div>
      </div> 
      <div class="form-group1">
      <label class="col-sm-5 control-label">Barangay</label>
        <div class= "col-sm-4">
          <select class="form-control1" name="barangay" >	  
			<option value="0">Any</option>
			<?php
				foreach($barangay as $value) 
				{
					?><option value="<?php echo $value->id_barangay; ?>"><?php echo $value->barangay; ?></option>
			<?php				
				}			
			?>
          </select>
        </div>
      </div>
      <div class="form-group1">
        <label class="col-sm-5 control-label">City/Town</label>
        <div class= "col-sm-4">
          <select class="form-control1" name="towncity" >
			<option value="0">Any</option>
			<?php
				foreach($towncity as $value) 
				{
					?><option value="<?php echo $value->id_towncity; ?>"><?php echo $value->towncity; ?></option>
			<?php				
				}			
			?>
          </select>
        </div>
      </div>
      <!--================================================ Radio Buttons Starts Here =======================================-->
      <div class="form-group1"> 
        <label class="col-sm-3 control-label">Language</label>
        <div id="languages" class="col-sm-3">
         <!--<script type="text/javascript">test.listLanguages()</script>-->
         <div id="temp" class="radio">
            <label>  
            <input type="radio" id="langButton" checked="true" name="mass-language" value="0">Any</label> 

         </div>     
        </div>
        <div id="languages" class="col-sm-3">
         <div id="temp" class="radio">
            <label> 
            <input type="radio" id="langButton" name="mass-language" value="1">English</label> 
     
         </div>     
        </div>
        <div id="languages" class="col-sm-3">
         <div id="temp" class="radio">
            <label> 
            <input type="radio" id="langButton" name="mass-language" value="2">Cebuano</label> 
           
         </div>     
        </div>
      </div>
	    <!--================================================ Radio Buttons Ends Here =======================================-->
	  </form>
       <div class="col-sm-offset-4 col-sm-4">
         <div id="flip">Search Schedules</div>
      </div>

   <div id="container"> 
  <div id="panel-body" style="margin-top: 100px;">
  <div id="panel"><h2 class="h2-line-3">Mass Schedules</h2>
          <div class="col-page-cont left-2">
            <div id="table_id_wrapper" class="dataTables_wrapper" role="grid">

      <table id="table_id" class="display dataTable" aria-describedby="table_id_info">
        <thead>
            <tr role="row">
              <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Parish: activate to sort column descending" style="width: 269px;">Parish</th>
              
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 192px;">Address</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Day: activate to sort column ascending" style="width: 97px;">Day</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Start Time: activate to sort column ascending" style="width: 101px;">Start Time</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Language: activate to sort column ascending" style="width: 101px;">Language</th></tr>
        </thead>
        
    <tbody role="alert" aria-live="polite" aria-relevant="all" id="table">
	
                </tbody>
              </table>
            <div class="dataTables_info" id="table_id_info">Showing 1 to 10 of 35 entries</div>
              <div class="dataTables_paginate paging_two_button" id="table_id_paginate">
                <!--<a class="paginate_disabled_previous" tabindex="0" role="button" id="table_id_previous" aria-controls="table_id">Previous</a>
                <a class="paginate_enabled_next" tabindex="0" role="button" id="table_id_next" aria-controls="table_id">Next</a>-->
                <a class="paginate_enabled_previous" tabindex="0" role="button" id="table_id_previous" aria-controls="table_id">Previous</a>
                <a class="paginate_enabled_next" tabindex="0" role="button" id="table_id_next" aria-controls="table_id">Next</a>
            </div>
      </div>
</div></div>


        
  </div>
  </div>    
  </div>


</body>
</html>