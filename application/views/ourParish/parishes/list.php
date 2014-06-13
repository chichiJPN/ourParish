<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
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
    var a = new ParishDataContainer();
	<?php 
		foreach($information as $value) 
		{
			?>a.push_back(
			new ParishData(
				"<?php echo $value->filename.'.'.$value->ext; ?>" ,
				"<?php echo $value->parish; ?>" ,
				"<?php echo $value->barangay.', '.$value->street.' '.$value->towncity.' city'; ?>" ,
				"<?php echo 'The Best Description Ever!' ?>",
				"<?php echo 'Parish Page'?>",
				"<? echo base_url(); ?>index.php"
					
			  )
			);
	<?php
		}
	?>
	a.sort();
    var test = new ListManager(a, 5);
    test.init();
  </script>      
          
  <div id="parish_display" class="container"></div>
          
  <ul id="pages"class="pagination"></ul>
   <script type="text/javascript">test.view("<?php echo base_url(); ?>");</script>    
      
<!-- Latest compiled and minified JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/html_attrib/parishStyles/js/bootstrap.min.js"></script>
</body>
</html>

