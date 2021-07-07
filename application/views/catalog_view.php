<?php

	$images_url		=	$this->config->item("assets_folder")."/images/";

	if(empty($data["product_details"])) {
		echo "No data found for the product id!";
	} else {
		$product	=	$data["product_details"][0];
?>

		<div class="row" style="margin:15px;">
			<div class="col-sm-4 col-sm-offset-1">
				<img src="<?php echo $images_url.$product["image"]; ?>" alt="Product Image" srcset="" width=500 height=300>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<h3><strong><?php echo strtoupper($product["name"]); ?></strong></h3>
				<p><strong>MRP &#8377; <span style="font-size:20px;"><?php echo $product["price"]; ?></span></strong><br/>
				<small class="text-light">Includes all taxes</small>
				</p>
			</div>
		</div>

		<div class="row" style="margin:25px;">
			<div class="col-sm-5 col-sm-offset-3 text-center">
				<h5><strong>ADDITIONAL INFORMATION & CARE</strong></h5>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4">
				<h5><strong>Product Description</strong></h5>
				<p class="additional-info"><?php echo $product["description"]; ?></p>
			</div>

			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-6">
						<p>Country of Origin</p>
					</div>
					<div class="col-sm-6">
						<p class="additional-info">
							<?php echo $product["country"]; ?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p>Contents</p>
					</div>
					<div class="col-sm-6">
						<p class="additional-info">
							<?php echo $product["contents"]; ?>
						</p>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
			</div>
		</div>
<?php
	}
?>


