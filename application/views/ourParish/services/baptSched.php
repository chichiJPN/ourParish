<!DOCTYPE html>
<html>
<head>
   <title>OurParish</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>html_attrib/parishStyles/js/helper.js"></script>
  <script>
  var a = new ParishSchedContainer();
  var b = new ParishSchedManager(a, 15);
$(document).ready(function(){
  $("#flip").click(function(){
  
	var base_url = $("#init").data('base_url');
	console.log($("#bapt_form").serialize());
	$.ajax({
		type: "POST",
		url: base_url + "index.php/p_functs/search_baptSched",
		dataType: "json",
		data:  $("#bapt_form").serialize(),
		success:
			  function(data) {
					console.log(data);
					document.getElementById("table_id_info").innerHTML = "";
					a.eraseAll();
					$.each( data, function( key, value )
					{
						a.push_back(
							new ParishSched(
								value.parish,
								value.street+' '+value.barangay+', '+value.towncity,
								value.day,
								value.time_start
							)
						);
						a.sort();
						
					});
					b.set();
					b.displayList();
			  },
						
		error: function(data) { console.log(data); }
	});
  
    $("#panel").slideDown("slow"); console.log("text");

  });
});
	

</script>
<style> 

#flip
{
padding:10px;
text-align:center;
background-color:#e5e5e5;
border:solid 1px #c3c3c3;
margin-right: 25px;
margin-left: 35px;
 margin-bottom: 10px;
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
    var test = new Helper();
    test.init();
  </script>
  <div class="panel-heading">
    <h4><span class="glyphicon glyphicon-search"></span> Search Baptism Schedule</h4>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="post" id="bapt_form">
      <div class="form-group"> 
        <label class="col-sm-2 control-label">Parish</label>
        <div class= "col-sm-10">
          <select class="form-control" name="parish_id">
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
    </form>
      <div class="col-sm-offset-4 col-sm-4">
         <div id="flip">Search Schedules</div>
      </div>
   <div id="container"> 
  <div id="panel-body" style="margin-top: 150px;">
  <div id="panel"><h2 class="h2-line-3">Baptism Schedules</h2>
          <div class="col-page-cont left-2">
            <div id="table_id_wrapper" class="dataTables_wrapper" role="grid">
			
			<!-- The Parish Table-->
			<table id="table_id" class="display dataTable" aria-describedby="table_id_info">
				<thead>
				<tr role="row">
					<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Parish: activate to sort column descending" style="width: 269px;">Parish</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 192px;">Address</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Day: activate to sort column ascending" style="width: 97px;">Day</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Start Time: activate to sort column ascending" style="width: 101px;">Start Time</th>
				</thead>

				<tbody role="alert" aria-live="polite" aria-relevant="all" id="table">
				</tbody>
			</table>
			<!-- Parish Table end-->
            <div class="dataTables_info" id="table_id_info"></div>
              <div class="dataTables_paginate paging_two_button" id="table_id_paginate">
                <!--<a class="paginate_disabled_previous" tabindex="0" role="button" id="table_id_previous" aria-controls="table_id">Previous</a>
                <a class="paginate_enabled_next" tabindex="0" role="button" id="table_id_next" aria-controls="table_id">Next</a>-->
                <a class="" tabindex="0" role="button" id="table_id_previous" aria-controls="table_id">Previous</a>
                <a class="" tabindex="0" role="button" id="table_id_next" aria-controls="table_id">Next</a>
            </div>
      </div>
</div>
</div>
  </div>
  </div>   
   
  </div>   
</body>
</html>