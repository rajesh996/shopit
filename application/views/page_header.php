<?php

	if(isset($data["is_logged_in"])) {
		$is_logged_in	=	$data["is_logged_in"];
	} else {
		$is_logged_in	=	!empty($this->session->userdata('ci_session')) ? TRUE : FALSE;
	}

	$base_url		=	$this->config->item("base_url");

	$register_url	=	$base_url.$this->config->item("Cont_register");
	$login_url		=	$base_url.$this->config->item("Cont_login");
	$logout_url		=	$base_url.$this->config->item("Cont_logout");

	// $is_logged_in = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ShopIt</title>

	<!-- <link rel="stylesheet" type="text/css" media="screen" href="https://bootswatch.com/4/flatly/bootstrap.min.css" />
	<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function() {
			// alert("Welcome");
		});
	</script>
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo $base_url; ?>">SHOPIT</a>
			</div>
			<ul class="nav navbar-nav pull-right">
				<?php
					if(!empty($is_logged_in)) {
						$session_data	=	$this->session->userdata('ci_session');
						$user_email		=	$session_data["email"];
				?>
					<li>
						<a href="#"><?php echo $user_email; ?></a>
					</li>
					<li class="align-middle" style="">
						<a href="<?php echo $logout_url; ?>" class="btn btn-danger btn-sm">Logout</a>
					</li>
				<?php
					} else {
				?>
					<li><a href="<?php echo $register_url; ?>">Sign Up</a></li>
					<li><a href="<?php echo $login_url; ?>">Sign In</a></li>
				<?php
					}
				?>
			</ul>
		</div>
	</nav>