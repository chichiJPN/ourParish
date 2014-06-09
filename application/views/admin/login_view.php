<html>
	<head>
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body>
		<h1>World's Best Login Page!!</h2>
		<form id="login_form">
			Username: <input type="text" name="username">
			<br>
			Password: <input type="text" name="password">
			<br>
			<input type="submit" value="Submit">
		</form>		
	</body>
</html>

<script>
$(document).ready(function(){
	$("#login_form").submit(function() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>/index.php/admin/verifyUser",
			dataType: "json",
			data:  $(this).serialize() ,
			success:
				  function(data) {
						if(data == 'success') {
							window.location.assign("<?php echo base_url(); ?>index.php/admin/homePage");
						} else {
							console.log(data);
						}
					},
							
			error: function(data) {
						console.log('error');
						console.log(data);
				  }
		});
		return false;
	});
});

</script>