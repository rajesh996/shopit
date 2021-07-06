<?php

	$user_form_action	=	$this->config->item("base_url")."user/save";
?>


<h4>Register</h4>
<p>Please Register to continue...</p><br>

<form action="<?php echo $user_form_action; ?>" method="POST" class="">

	<div class="form-group">
		<label for="" class="">Email</label>
		<input type="email" value="<?php echo set_value('email'); ?>" class="form-control" name="email" placeholder="email address">
	</div>

	<div class="form-group">
		<label for="password" class="">Password</label>
		<input type="password" class="form-control" name="password" placeholder="password">
	</div>

	<div class="form-group">
		<label for="confirm-password">Confirm Password</label>
		<input id="confirm-password" class="form-control" type="password" name="confirmpassword" placeholder="Re-enter paassword">
	</div>

	<div>
		<input type="submit" value="Register" class="btn btn-success" value="" name="send" />
	</div>

</form>