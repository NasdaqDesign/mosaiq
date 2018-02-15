<?php
	$productFieldId = 3;
	
	foreach ( has_meta($post->ID) as $entry ) {
		switch ($entry["meta_key"]) {
			case "your_name":
				$submittersName = $entry;
				break;
			case "customer_company":
				$customerCompany = $entry;
				break;
			case "customer_name":
				$customerName = $entry;
				break;
			case "customer_agrees":
				$customerAgrees = $entry;
				break;
			case "_gform-entry-id":
				$entry_id = $entry["meta_value"];
				break;
			case "product_id":
				$product = $entry;
				break;
		}
	}
?>

<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="content">Quote</label>
				<textarea id="content" name="content" rows="5"><?php echo $post->post_content; ?></textarea>
			</div>
			
			<div class="form-group">
				<label>Customer's Name</label>
				<input type="hidden" name="meta[<?=$customerName["meta_id"];?>][key]" id="meta-<?=$customerName["meta_id"];?>-key" value="<?=$customerName["meta_key"];?>"/>
				<input type="text" name="meta[<?=$customerName["meta_id"];?>][value]" id="meta-<?=$customerName["meta_id"];?>-value" value="<?=$customerName["meta_value"];?>"/>
			</div>
			
			<div class="form-group">
				<label>Customer's Company</label>
				<input type="hidden" name="meta[<?=$customerCompany["meta_id"];?>][key]" id="meta-<?=$customerCompany["meta_id"];?>-key" value="<?=$customerCompany["meta_key"];?>"/>
				<input type="text" name="meta[<?=$customerCompany["meta_id"];?>][value]" id="meta-<?=$customerCompany["meta_id"];?>-value" value="<?=$customerCompany["meta_value"];?>"/>
			</div>
			
			<div class="form-group">
				<label>Your Name</label>
				<input type="hidden" name="meta[<?=$submittersName["meta_id"];?>][key]" id="meta-<?=$submittersName["meta_id"];?>-key" value="<?=$submittersName["meta_key"];?>"/>
				<input type="text" name="meta[<?=$submittersName["meta_id"];?>][value]" id="meta-<?=$submittersName["meta_id"];?>-value" value="<?=$submittersName["meta_value"];?>"/>
			</div>
			
			<div class="form-group">
				<label>Do we have permission to use this quote?</label>
				<input type="hidden" name="meta[<?=$customerAgrees["meta_id"];?>][key]" id="meta-<?=$customerAgrees["meta_id"];?>-key" value="<?=$customerAgrees["meta_key"];?>">
				<label><input type="checkbox" name="meta[<?=$customerAgrees["meta_id"];?>][value]" id="meta-<?=$customerAgrees["meta_id"];?>-value" value="Customer Agrees"<?php if($customerAgrees["meta_value"] === "Customer Agrees") echo " checked";?>> Customer Agrees</label>
			</div>
			
			<div class="form-group">
				<label for="meta-<?=$product["meta_id"];?>-value">Product</label>
				<input type="hidden" name="meta[<?=$product["meta_id"];?>][key]" id="meta-<?=$product["meta_id"];?>-key" value="<?=$product["meta_key"];?>"/>
				<select name="meta[<?=$product["meta_id"];?>][value]" id="meta-<?=$product["meta_id"];?>-value">
					<option value="" selected="selected" class="gf_placeholder">Select a Post</option>
					<?php
						$availProducts = get_posts( 'post_type=product&post_status=publish' );
						$choices = array();

						foreach ( $availProducts as $availProduct ) {
							$isSelected = "";
							if($product["meta_value"] == $availProduct->ID) {
								$isSelected = " selected";
							}
							echo '<option value="' . $availProduct->ID .  '"' . $isSelected . '>' . $availProduct->post_title . '</option>';
						}
					?>
				</select>
			</div>
		</div>
	</div>
</div>
