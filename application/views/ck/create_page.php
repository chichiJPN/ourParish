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
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/ourparish/selectPage",
          dataType: "json",
          data: "page=" + p,
          success:
              function(data) {
                console.log("ok");
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
        <a href ="#" class = "navbar-brand">OurParish</a>
        <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
        </button>     
        <div class = "collapse navbar-collapse navHeaderCollapse">
          <ul class = "nav navbar-nav navbar-right">
            <li>
              <a>Logout</a>
            </li>

          </ul>
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
                  <form id="form_addpage" role="form">
                    <div class="form-group">
                      <label for="username" class = "user_view">Page Name:</label>
                      <input type="text" class="form-control1" name="pagename">
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
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
                    <table  cellpadding="4" style=" text-align: center;" "border:1"; bordercolor="#808080" id="show" bgcolor="#C0C0C0">
                      <?php
                        $aa='odd';
                        foreach($page as $row)
                        {                  
                      ?>
                      <tr class="<?php echo $aa;?>"><td width=200><?php echo $row->page_name;?></td>
                          <td width=100> <a href="">Delete</a></td>
                          <td width=100>  <a href="">Rename</a></td>
                      </tr>
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
        </div>
          
        <div style="left:2%; top:10%; position: relative;">
            <ul id="pageheader" class="nav nav-pills">
              <?php
                $start='active';
                foreach($page as $row)
                {                  
              ?>
              <script type="text/javascript">
                var a = document.createElement('li');
                a.setAttribute("class","<?php echo $start?>");
                var b = document.createElement("a");
                b.setAttribute("data-toggle", "tab");                

                b.onclick = ckshow("<?php echo $row->page_name;?>");
                b.appendChild(document.createTextNode("<?php echo $row->page_name;?>"));

                a.appendChild(b);
                document.getElementById("pageheader").appendChild(a);          
              </script>
              <?php
                  $start="";
                }
              ?>
            </ul>
        </div>

        <!--CKEditor-->
        <div id="displayCK" style="top:18%; left:2%; right:2%; position:absolute;">
          <form id="form_saveCK" role="form">
            <textarea class="ckeditor" id="editor1" name="data"> 
              <?php foreach($description as $row)
                    {
                      echo $row->description;
                      break;
                    }
              ?> </textarea> 
            <button type="submit" name="activepage" value="HOME" class="btn btn-default navbar-btn" >Save Changes</button>
          </form>
        </div>  
        
      </div>

	</body>
<script type="text/javascript">

  $("#form_addpage").submit(function(){
  var id_page = $("#form_addpage").serialize();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>index.php/ourparish/addPage",
    dataType: "json",
    data: id_page,
    success:
        function(data) {

          $("#pageheader").html('');
            <?php
                $start='active';
                foreach($page as $row)
                {                  
            ?>
                  var a = document.createElement('li');
                  a.setAttribute("class","<?php echo $start?>");
                  var b = document.createElement("a");
                  b.setAttribute("data-toggle", "tab");                

                  b.onclick = ckshow("<?php echo $row->page_name;?>");
                  b.appendChild(document.createTextNode("<?php echo $row->page_name;?>"));

                  a.appendChild(b);
                  document.getElementById("pageheader").appendChild(a);          
            <?php
                  $start="";
                }
            ?>
        },          
    error: function(data){
        
        }
  });
      return true;
  });


  $("#form_saveCK").submit(function(){
  alert('wa pa');
  });

</script>

</html>