<?php

	$add_product_url	=	$this->config->item("base_url").$this->config->item("Cont_catalog_add");

	$delete_url			=	$this->config->item("base_url").$this->config->item("Cont_catalog_delete");

	if(empty($data["catalog"])) {
?>
		<div class='text-center'>
			<p>No Data Found!</p>
			<p>
				<a href="<?php echo $add_product_url; ?>" class="btn btn-success btn-sm catalog-options">Add a product</a>
			</p>
		</div>
<?php
	} else {
?>
	<h2>Your Products</h2>
	<?php
		foreach($data["catalog"] as $product) {
	?>
	<ul class="list-group">
		<li class="list-group-item">
			<?php echo ucwords($product["name"]); ?>
			<a href="<?php echo $delete_url."/".$product["product_id"]; ?>" class="btn btn-outline-danger btn-sm pull-right delete-product" id="">Delete</a>
		</li>
	</ul>
<?php
		}
	}
?>