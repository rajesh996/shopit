<?php

	$user_form_action	=	$this->config->item("base_url")."user/auth";
?>


<h4>Login</h4>
<p>Please login to continue...</p><br>

<form action="<?php echo $user_form_action; ?>" method="POST" class="">

	<div class="form-group">
		<label for="">Email Id</label>
		<input type="email" value="<?php echo set_value('email') ?>" class="form-control"
		 name="email" placeholder="email"><br><br>
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" value="" class="form-control" name="password" placeholder="password"><br><br>
	</div>

	<div><input type="submit" class="btn btn-success" value="Login" value="" name="send" /></div>


</form>