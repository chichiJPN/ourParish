<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<html>
		<head>
		<script src="<?php echo base_url(); ?>html_attrib/jquery-1.11.1.min.js" type="text/javascript" ></script>
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/html_attrib/adminStyles/css/login_css.css" media="screen"></style>
	</head>
	<body>

	<section class="container">
    	<div class="login">

		<h1 style="margin-left:130px">Login</h1>
			<table width="510" border="0" align="center">

				<?php echo form_open('validate/verifyUser'); ?>

					<tr>Username: <input  type="text" name="username"></tr>
					<br>
					<tr>Password: <input type="password" name="password" style="margin-left:8px"></tr>
					<br>
					<input type="submit" value="Submit">
						<br>
				</form>
				<tr><?php echo validation_errors(); ?></tr>
			</table>
		</div>
	</section>
			
			
			
	</body>
</html>
