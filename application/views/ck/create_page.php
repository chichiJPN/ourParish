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

<script type="text/javascript">
    function ckshow(page)
    {
      return function()
      {
        var p = page;
		console.log('sending to controller '+ "page=" + p );
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/ck_ourparish/selectPage",
          dataType: "json",
          data: "page=" + p,
          success:
              function(data) {
                console.log(data);

                $("#editor1").html('');
                $.each( data, function( key, value ) { 
					CKEDITOR.instances.editor1.setData(value.description);
					$("#div_CK").html('');
					var a = document.createElement('input');
					a.setAttribute("type","hidden");
					//a.setAttribute("name","activepage");
					a.setAttribute("id","activePage");
					a.setAttribute("value",value.id_page);
					document.getElementById("div_CK").appendChild(a);
					document.getElementById("url").innerHTML = "<?php echo base_url(); ?>index.php/parish/index/<?php echo $keyword[0]->keyword; ?>/" + p.replace(/ /g, '%20');
					document.getElementById("makeHome").onclick = updateHome(p);
                });    
              },
                  
          error: function(data){
                console.log(data);
				 $("#editor1").html('');
              }
        });
        return false;
      }
    }

    function updateHome(page)
    {
      return function()
      {
        var p = page;
		console.log('sending to controller '+ "page=" + p +" <?php echo $keyword[0]->keyword; ?>");
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/ck_ourparish/updateUrl",
          dataType: "json",
          data: "page=" + p + "&keyword=<?php echo $keyword[0]->keyword; ?>",
          success:
              function(data) {
                alert(data);
  
              },
                  
          error: function(data){
                console.log(data);
              }
        });
      }
    }

    function deleteP(page)
    {
      return function()
      {
        var p = page;
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/ck_ourparish/deletePage",
          dataType: "json",
          data: "page="+ p,
          success:
              function(data) {
				alert('delete succesful');
                showHeader();
              },
                  
          error: function(data){
                console.log(data);
              }
        });
        return false;
      }
    }   

    function renameP(page)
    {
      return function()
      {
        var p = page;
        
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/ck_ourparish/renamePage",
          dataType: "json",
          data: "page=" + p,
          success:
              function(data) {
                             
                $("#rename").html('');
                $.each( data, function( key, value ) {    
                  var a = document.createElement("br");
                  var b = document.createElement("br");

                  var c = document.createElement("input")
                  c.setAttribute("type","text");
                  c.setAttribute("class","form-control2");
                  c.setAttribute("name","pagename");
                  c.setAttribute("value",p);

                  var f = document.createElement("input")
                  f.setAttribute("type","hidden");
                  f.setAttribute("name","id_page");
                  f.setAttribute("value",value.id_page);
                  f.appendChild(document.createTextNode(p));
                    
                  var d = document.createElement('button');
                  d.setAttribute("type","submit");
                  d.setAttribute("class","btn btn-primary");
                  d.appendChild(document.createTextNode("RENAME"));
                  

                  document.getElementById("rename").appendChild(a);
                  document.getElementById("rename").appendChild(b);
                  document.getElementById("rename").appendChild(f);
                  document.getElementById("rename").appendChild(c);
                  document.getElementById("rename").appendChild(d);
                });
              },
                  
          error: function(data){
                console.log(data);
              }
        });
        return false;
      }
    }    
</script>

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

        <!-- renameModal -->
          <div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:1100;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">RENAME</h4>
                </div>
                <div class="modal-body">
                 <!--FORM_ADD--> 
                  <form id="form_rename" role="form" >
                    <div id="rename" class="form-group">
                      <br><br>
                      <input type="text" class="form-control2" name="pagename">
                      <button type="submit" class="btn btn-primary">RENAME</button>
                    </div>
                  </form>
                 <!--END_FORM-->
                </div>
               </div>
            </div>
          </div>

        <!-- Modal -->
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:1100;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">ADD PAGE</h4>
                </div>
                <div class="modal-body">
                 <!--FORM_ADD--> 
                  <form id="form_addpage" role="form" >
                    <div class="form-group">
                      <label for="username" class = "user_view">Page Name:</label>
                      <input type="text" class="form-control1" name="pagename">
                    </div>
                    <button type="submit"  class="btn btn-primary">ADD</button>
                  </form>
                 <!--END_FORM-->
                </div>
                <div class="modal-footer"></div>
              </div>
            </div>
          </div>

        <!--Manage Modal-->
        <div class="modal fade" id="manageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">MANAGE PAGE</h4>
                </div>
                <div class="modal-body">
                  <div style="right:2%; position: absolute;">
                    <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#addModal">Add Page</button> 
                  </div> 
                    
                  <br><br><br><center>
                    <table  id="mp" cellpadding="4" style=" text-align: center;" "border:1"; bordercolor="#808080" id="show" bgcolor="#C0C0C0">
                      <?php
                        $aa='odd';
                        foreach($page as $row)
                        {                  
                      ?>

                      <script type="text/javascript">
                        var a = document.createElement('tr');
                        a.setAttribute("class","<?php echo $aa?>");
                        var b = document.createElement("td");
                        b.setAttribute("width", 200);                
                        b.appendChild(document.createTextNode("<?php echo $row->page_name;?>"));

                        var c = document.createElement('td');
                        c.setAttribute("width",100);
                        var d = document.createElement('a');
                        d.onclick = deleteP("<?php echo $row->page_name;?>");
                        d.appendChild(document.createTextNode("Delete"));
                        c.appendChild(d);

                        var e = document.createElement('td');
                        e.setAttribute("width",100);
                        var f = document.createElement('a');
                        f.setAttribute("data-toggle","modal");
                        f.setAttribute("data-target","#renameModal");
                        f.onclick = renameP("<?php echo $row->page_name;?>");
                        f.appendChild(document.createTextNode("Rename"));
                        e.appendChild(f);


                        a.appendChild(b);
                        a.appendChild(c);
                        a.appendChild(e);
                        document.getElementById("mp").appendChild(a);          
                      </script>

                      <?php
                          if($aa=="odd"){
                             $aa="even"; 
                          }else if($aa=="even"){
                             $aa="odd"; 
                          }
                        }
                      ?>
                    </table>
                    </center>   
                </div>
                <div class="modal-footer"></div>
              </div>
            </div>
          </div>
      <div class = "main_container">
        <br>


        <div style="right:2%; position: absolute;">
          <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#manageModal">Manage Page</button>
          <a href="<?php echo base_url(); ?>index.php/ck_ourparish/newsPage"><button type="button" class="btn btn-default navbar-btn" >Manage News</button></a>
          <a href="<?php echo base_url(); ?>index.php/ck_ourparish/imageDirectoryPage"><button type="button" class="btn btn-default navbar-btn" >Manage Images</button></a>

		</div>
          
        <div style="left:2%; top:10%; position: relative;">
            <ul id="pageheader" class="nav nav-pills">
              <?php
                //$start='active';
                foreach($page as $row)
                {                  
              ?>
              <script type="text/javascript">
                var a = document.createElement('li');
                a.setAttribute("class","");
                var b = document.createElement("a");
                b.setAttribute("data-toggle", "tab");                

                b.onclick = ckshow("<?php echo $row->page_name;?>");
                b.appendChild(document.createTextNode("<?php echo $row->page_name;?>"));

                a.appendChild(b);
                document.getElementById("pageheader").appendChild(a);          
              </script>
              <?php
                  //$start="";
                }
              ?>
            </ul>
        </div>

        <!--CKEditor-->
        <div style="top:18%; left:2%; right:2%; position:absolute;">
          <form id="form_saveCK" role="form">
            <textarea class="ckeditor" id="editor1" name="datavalue"> 
              
            </textarea> 
			
            <div id="div_CK"> 
            </div>
            <button type="submit" class="btn btn-default navbar-btn">Save Changes</button>
          </form>
		  <br>

		  <div style="text-align:center" >
			  <label>Url:</label>
			  <label id="url">No Page selected</label>
			  <br>
			  <button id="makeHome" class="btn btn-default navbar-btn">Make this url the home Page</button>
			  <br>
		  <div>
        </div>  
        
      </div>

	</body>

<script type="text/javascript">
  
	CKEDITOR.on('instanceReady', function(ev) {
		ev.editor.on('resize',function(reEvent){
			// console.log($('#cke_editor1').css('height','600px'));;
			var editorDefaultSize = 500;
			var containerDefaultSize = 900;
		
			var editor    = $('#cke_editor1');
			var container = $('.main_container');
			console.log(editor.height());
			if(editor.height() > editorDefaultSize){
				container.css('height', containerDefaultSize + (editor.height() - editorDefaultSize));
			}
			else container.css('height', containerDefaultSize);

			 // alert( 'The editor resized' );
		 });
	});
  
  $("#form_addpage").submit(function(){
  var id_page = $("#form_addpage").serialize();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>index.php/ck_ourparish/addPage",
    dataType: "json",
    data: id_page,
    success:
        function(data) {
		
          showHeader();
		  alert('add successful!');
        },          
    error: function(data){
        console.log(data);          
        }
  });
      return false;
  });


  function showHeader()
    {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/ck_ourparish/showHeader",
          dataType: "json",
          success:
            function(data) 
            {
              var active = "active";
              $("#pageheader").html('');
              $.each( data, function( key, value ) {    
                    
                    var a = document.createElement('li');
                    a.setAttribute("class",active);
                    var b = document.createElement("a");
                    b.setAttribute("data-toggle", "tab");                

                    b.onclick = ckshow(value.page_name);
                    b.appendChild(document.createTextNode(value.page_name));

                    a.appendChild(b);
                    document.getElementById("pageheader").appendChild(a);          
                    active="";
                });
              $('#addModal').modal('hide');
              $('#manageModal').modal('hide');
              $('#renameModal').modal('hide');
              
              $("#mp").html('');   
              var aa="odd";
              $.each( data, function( key, value ) {    

                  var a = document.createElement('tr');
                  a.setAttribute("class",aa);
                  var b = document.createElement("td");
                  b.setAttribute("width", 200);                
                  b.appendChild(document.createTextNode(value.page_name));

                  var c = document.createElement('td');
                  c.setAttribute("width",100);
                  var d = document.createElement('a');
                  d.onclick = deleteP(value.page_name);
                  d.appendChild(document.createTextNode("Delete"));
                  c.appendChild(d);

                  var e = document.createElement('td');
                  e.setAttribute("width",100);
                  var f = document.createElement('a');
                  f.setAttribute("data-toggle","modal");
                  f.setAttribute("data-target","#renameModal");
                  f.onclick = renameP(value.page_name);
                  f.appendChild(document.createTextNode("Rename"));
                  e.appendChild(f);

                  a.appendChild(b);
                  a.appendChild(c);
                  a.appendChild(e);
                  document.getElementById("mp").appendChild(a);
                
                  if(aa=="odd"){
                     aa="even"; 
                  }else if(aa=="even"){
                     aa="odd"; 
                  }
                
              });
            },
                      
          error: function(data){
                console.log(data);
              }
        });
        return true;
    }

  $("#form_saveCK").submit(function(){
  

  var instance = CKEDITOR.instances.editor1;
  instance.updateElement();
  console.log('value is '+ encodeURIComponent(instance.getData()));
  console.log('div ck is ' + $("#activePage").val());
  
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>index.php/ck_ourparish/updateDescription",
    dataType: "json",
    data: "datavalue="+encodeURIComponent(instance.getData())+"&activepage="+$("#activePage").val(),
	
    success:
        function(data) {
			alert(data);
        },          
    error: 
        function(data){
			console.log(data);
			alert(data);
			alert("fail");
		
        }
  });

      return false;
  });

  $("#form_rename").submit(function(){
  var id_page = $("#form_rename").serialize();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>index.php/ck_ourparish/updatePage",
    dataType: "json",
    data: id_page,
    success:
        function(data) {
		
          showHeader();
		  alert('rename successful');
        },          
    error: 
        function(data){
          console.log(data);          
        }
  });
      return false;
  });

</script>


</html>