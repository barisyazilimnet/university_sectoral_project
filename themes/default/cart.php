<div class="section-primary shop-cart" style="height: 945px;">
	<div class="container">
		<?php
		// echo "<pre>";
		// print_r($_SESSION["shopping_cart"]);
		// echo "</pre>";
		if (!isset($_SESSION["shopping_cart"])) {
			echo message("warning", "exclamation-triangle", "Dikkat!", "Sepetinizde ürün bulunmamaktadır.");
		} else {
		?>
			<div class="woocommerce">
				<form action="#" class="woocommerce-cart-form">
					<table class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table">
						<thead>
							<tr>
								<th class="product-remove">&nbsp;</th>
								<th class="product-thumbnail">&nbsp;</th>
								<th class="product-name">Ürün Adı</th>
								<th class="product-price">Ürün Fiyatı</th>
								<th class="product-quantity">Adet</th>
								<th class="product-subtotal">Toplam fiyati</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($_SESSION["shopping_cart"]["products"] as $products) { ?>
							<tr class="woocommerce-cart-form__cart-item cart_item">
								<td class="product-remove">
									<a product_id="<?php echo $products->id; ?>" class="remove delete-to-cart" aria-label="Remove this item">
										<span class="lnr lnr-cross-circle"></span>
									</a>
								</td>

								<td class="product-thumbnail">
									<a href="">
										<img src="<?php echo URL; ?>uploads/products/<?php echo $products->p_photo; ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" />
									</a>
								</td>

								<td class="product-name" data-title="Product">
									<a href="shop-single.html"><?php echo $products->p_name ?></a>
								</td>

								<td class="product-price" data-title="Price">
									<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₺</span><?php echo $products->p_price ?></span>
								</td>
								<td class="product-quantity" data-title="Quantity">
									<div class="quantity">
										<input type="number" class="input-text qty text input-quantity" step="1" min="0" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="<?php echo $products->quantity; ?>" title="Qty" size="4">
										<div class="icon">
											<a href="#" class="number-button plus">+</a>
											<a href="#" class="number-button minus">-</a>
										</div>
									</div>
								</td>
								<td class="product-subtotal" data-title="Total">
									<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₺</span><?php echo $products->p_price*=$products->quantity; ?></span>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<div class="bottom float-right">
						<button class="au-btn go-shopping round has-bg au-btn--hover" onclick="alert('Alışveriş tamamlanmıştır.');">Alışverişi tamamla</button>
					</div>
				</form>
			</div>
		<?php } ?>
	</div>
</div>