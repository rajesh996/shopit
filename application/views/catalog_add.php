<?php

	$action	=	$this->config->item("base_url").$this->config->item("Cont_catalog_save");
?>

	<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="" for="">Product Name</label>
			<input class="form-control" type="text" name="name" id="name" value="<?php echo set_value('name'); ?>">
		</div>

		<div class="form-group">
			<label for="">Description</label>
			<textarea class="form-control" type="textarea" rows="5" name="description" id="description"><?php echo set_value('description'); ?></textarea>
		</div>

		<div class="form-group">
			<label for="">Country of Origin</label>
			<input class="form-control" type="text" name="country" id="country" value="<?php echo set_value('country'); ?>">
		</div>

		<div class="form-group">
			<label for="">Contents</label>
			<input class="form-control" type="text" name="contents" id="contents" value="<?php echo set_value('contents'); ?>">
		</div>

		<div class="form-group">
			<label for="">Price</label>
			<input class="form-control" type="number" name="price" id="price" min="1" value="<?php echo set_value('price'); ?>">
		</div>

		<div class="form-group">
			<label for="">Image</label>
			<input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" />
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-success" value="Save" value="" name="save" />
		</div>

	</form>