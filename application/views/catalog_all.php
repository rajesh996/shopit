<?php

	if(!empty($data["catalog_data"])) {
		echo "No catalog data found";
	} else {
	}

	$add_product_url	=	$this->config->item("base_url").$this->config->item("Cont_catalog_add");
	$catalog_manage_url	=	$this->config->item("base_url").$this->config->item("Cont_catalog_manage");

	if(!empty($data["is_logged_in"])) {
?>

	<div class="row">
		<div class="col-sm-8">
		</div>
		<div class="col-sm-4">
			<a href="<?php echo $catalog_manage_url; ?>" class="btn btn-primary btn-sm pull-right catalog-options">Manage Products</a>
			<a href="<?php echo $add_product_url; ?>" class="btn btn-success btn-sm pull-right catalog-options">+ Add Product</a>
		</div>
	</div>
<?php } ?>

<div id="result"></div>