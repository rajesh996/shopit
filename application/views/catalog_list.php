<?php

	if(empty($data["catalog"])) {
		echo "<div class='text-center'>No Products found!</div>";
	} else {

		echo '<div class="row" style="margin-top:20px;">';
		$base_url = $this->config->item("base_url");

			foreach($data["catalog"] as $key => $product) {
				$product_url	=	$base_url."catalog/view/".$product["product_id"];;
?>
				<div class="col-sm-offset-1 col-sm-5 w3-panel w3-border" style="background-color:#fff;border-radius: 5px;border: 2px solid #777474;margin-bottom:10px;">
					<a href="<?php echo $product_url; ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo $base_url."application/assets/images/".$product["image"]; ?>" width="100px" style="float: left;"/>
						<div style="padding:10px;display:inline-block;">
								<?php
									echo ucwords($product["name"])."<br/>";
								?>
							<?php
									echo "MRP: INR ".$product["price"];
									?>
						</div>
					</a>
				</div>
<?php
			}
		echo '</div>';
	}
?>

