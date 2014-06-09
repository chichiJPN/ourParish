<html>
<head>
  <title>OurParish</title>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" ></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/scriptsList.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/helper.js"></script>

</head>

<body> 
  <div id="init" data-base_url="<?php echo base_url(); ?>"></div>
  <script type="text/javascript">
    var test = new ListSwitcher();
    test.init();
  </script>      
          
  <iframe id="myframe" src="<?php echo base_url(); ?>index.php/parish_site/listOne" height="1000" width="1000" scrolling="no" frameBorder="0"></iframe>     
    <ul id="pages"class="pagination"></ul>
     <script type="text/javascript">test.view();</script>    
        
     </div> 

        <!--=========== footer ===========-->
                <footer>
                    <h5>Copyright &copy; 2014 MyParish.org</h5>
                </footer>
                <!--=========== end of footer ===========-->

            
<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/bootstrap.min.js"></script>
</body>
</html>

