<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - Helpdesk </title>



<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
[endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" style="background:#0d2854; color:white;">Log in</div>
				<div class="panel-body"style="background:#0d2854; color:white;">
					<form action="<?php echo base_url();?>login/login_akses" method="post">
						
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required>
							</div>
							
							<button type="submit" class="btn btn-primary" style="color:white;">Login</button>
						
					</form>
				</div>
			</div>

			<?php echo $this->session->flashdata("msg");?>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	
</body>

</html>
