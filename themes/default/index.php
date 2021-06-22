<!DOCTYPE html>
<?php
$site_contact = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM site_contact"));
@$page = $_GET["page"];
?>
<html lang="tr-TR">

<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $query_settings["description"]; ?>">
	<meta name="keywords" content="<?php echo $query_settings["keywords"]; ?>">
	<meta name="author" content="Barış KURT">
	<title><?php echo $query_settings["title"]; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>fonts/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>fonts/font-awesome-5/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/lightgallery/css/lightgallery.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>css/animate.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/date-picker/datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>vendor/revolution-slider/css/layers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>vendor/revolution-slider/css/navigation.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>vendor/revolution-slider/css/settings.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/hcmobilenav/demo.min.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/jquery-timepicker-master/jquery.timepicker.min.css">
	<link rel="shortcut icon" href="<?php echo URL; ?>uploads/site/<?php echo $query_settings["icon"]; ?>">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>css/style.min.css" />
</head>

<body class="preload">
	<div class="images-preloader">
		<div id="preloader" class="rectangle-bounce">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="page-wrapper">
		<header>
			<nav class="navbar-mobile">
				<div class="container">
					<div class="heading">
						<div class="left">
							<a href="#" class="navbar-mobile__toggler">
								<span></span>
								<span></span>
								<span></span>
							</a>
						</div>
						<a href="index.php" class="logo"><img src="<?php echo URL; ?>uploads/site/<?php echo $query_settings["logo"]; ?>" alt="Royate"></a>
						<div class="right">
							<div class="action">
								<div class="notify">
									<img src="<?php echo THEME_URL; ?>img/mobile_shopping_cart.png" />
									<span class="notify-amount">0</span>
									<div id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
										<div class="widget_shopping_cart_content">
											<ul class="woocommerce-mini-cart cart_list product_list_widget ">
												<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
													<a href="#" class="remove remove_from_cart_button" aria-label="Remove this item">
														<span class="lnr lnr-cross-circle"></span>
													</a>
													<a href="#" class="image-holder">
														<img src="images/widget-cart-thumb-1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
														<span class="product-name">Best Brownies</span>
													</a>
													<span class="quantity">
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>18
														</span>
														x1
													</span>
												</li>
												<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
													<a href="#" class="remove remove_from_cart_button" aria-label="Remove this item">
														<span class="lnr lnr-cross-circle"></span>
													</a>
													<a href="#" class="image-holder">
														<img src="images/widget-cart-thumb-2.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
														<span class="product-name">Angela's Awesome</span>
													</a>
													<span class="quantity">
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>28
														</span>
														x3
													</span>
												</li>
											</ul>
											<p class="woocommerce-mini-cart__total total">
												<strong>Subtotal:</strong>
												<span class="woocommerce-Price-amount amount">
													<span class="woocommerce-Price-currencySymbol">$</span>102
												</span>
											</p>
											<p class="woocommerce-mini-cart__total total">
												<strong>Total:</strong>
												<span class="woocommerce-Price-amount amount color-cdaa7c">
													<span class="woocommerce-Price-currencySymbol">$</span>102
												</span>
											</p>
											<p class="woocommerce-mini-cart__buttons buttons">
												<a href="#" class="button wc-forward view-cart">View cart</a>
												<a href="#" class="button checkout wc-forward">Checkout</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<nav id="main-nav">
					<ul>
						<li class="<?php if ($page == "" or $page == "index.php") {
										echo "current";
									} ?>"><a href="index.php">Anasayfa</a></li>
						<li class=""><a href="#">Menü</a></li>
						<li class=""><a href="#">Rezervasyon</a></li>
						<li class=""><a href="#">Şeflerimizle tanışın</a></li>
						<li class="<?php echo ($page == "cart")? "current":""; ?>"><a href="index.php?page=cart">Sepet</a></li>
						<li class=""><a href="#">Projelerimiz</a></li>
						<li class=""><a href="#">Galeri</a></li>
						<li class=""><a href="#">Hakkımızda</a></li>
						<li class=""><a href="#">Blog</a></li>
						<li class=""><a href="#">İletişim</a></li>
					</ul>
				</nav>
			</nav>
			<nav class="navbar-desktop aside">
				<a href="index.php" class="logo"><img src="<?php echo URL; ?>uploads/site/<?php echo $query_settings["logo"]; ?>" alt="Royate"></a>
				<ul id="menu-accordion">
					<li class="<?php if ($page == "" or $page == "index.php") {
									echo "current";
								} ?>"><a href="index.php">Anasayfa</a></li>
					<li class=""><a href="#">Menü</a></li>
					<li class=""><a href="#">Rezervasyon</a></li>
					<li class="<?php echo ($page == "cart")? "current":""; ?>"><a href="index.php?page=cart">Sepet</a></li>
					<li class="has-children">
						<a href="#" data-toggle="collapse" data-target="#collapseOne" id="headingOne">Blogumuz</a>
						<ul id="collapseOne" class="collapse" data-parent="#menu-accordion">
							<li>
								<a href="index.html">Blog</a>
							</li>
							<li class="">
								<a href="index-2.html">Şeflerimizle tanışın</a>
							</li>
							<li>
								<a href="index-3.html">Projelerimiz</a>
							</li>
							<li>
								<a href="index-4.html">Galeri</a>
							</li>
							<li>
								<a href="index-5.html">Hakkımızda</a>
							</li>
						</ul>
					</li>
					<li class=""><a href="#">İletişim</a></li>
				</ul>
				<div class="social">
					<a target="_blank" href="<?php echo $site_contact["twitter"]; ?>" <?php if (empty($site_contact["twitter"])) {
																							echo "hidden";
																						} ?>><i class="zmdi zmdi-twitter"></i></a>
					<a target="_blank" href="<?php echo $site_contact["facebook"]; ?>" <?php if (empty($site_contact["facebook"])) {
																							echo "hidden";
																						} ?>><i class="zmdi zmdi-facebook-box"></i></a>
					<a target="_blank" href="<?php echo $site_contact["linkedin"]; ?>" <?php if (empty($site_contact["linkedin"])) {
																							echo "hidden";
																						} ?>><i class="zmdi zmdi-linkedin"></i></a>
					<a target="_blank" href="<?php echo $site_contact["instagram"]; ?>" <?php if (empty($site_contact["instagram"])) {
																							echo "hidden";
																						} ?>><i class="zmdi zmdi-instagram"></i></a>
					<a target="_blank" href="<?php echo $site_contact["pinterest"]; ?>" <?php if (empty($site_contact["pinterest"])) {
																							echo "hidden";
																						} ?>><i class="zmdi zmdi-pinterest"></i></a>
				</div>
			</nav>
		</header>
		<main>
		<?php theme_content($con); ?> 
		</main>
	</div>
	<div class="click-to-top">
		<span class="lnr lnr-arrow-up"></span>
	</div>
	<script src="<?php echo THEME_URL; ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.actions.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.carousel.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.kenburn.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.layeranimation.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.migration.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.navigation.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.parallax.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.slideanims.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/revolution-slider/js/revolution.extension.video.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script>
	<script src="<?php echo THEME_URL; ?>js/sweetalert.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/hcmobilenav/hc-mobile-nav.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/lightgallery/js/jquery.mousewheel.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/lightgallery/js/lightgallery-all.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/date-picker/datepicker.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/date-picker/datepicker.en.min.js"></script>
	<script src="<?php echo THEME_URL; ?>vendor/jquery-timepicker-master/jquery.timepicker.min.js"></script>
	<script src="<?php echo THEME_URL; ?>js/wow.min.js"></script>
	<script src="<?php echo THEME_URL; ?>js/main.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".add-to-cart").click(function() {
				var url = "http://localhost/sp/themes/default/cart_transactions.php";
				var data = {
					transactions: "Add",
					product_id: $(this).attr("product_id")
				};
				$.post(url, data, function(answer) {
					alert("Ürünüz sepete eklenmiştir");
				});
			});
			$(".delete-to-cart").click(function() {
				var url = "http://localhost/sp/themes/default/cart_transactions.php";
				var data = {
					transactions: "Delete",
					product_id: $(this).attr("product_id")
				};
				$.post(url, data, function(answer) {
					//alert("Ürününüz silinmiştir.");
					window.location.reload();
				});
			});
		});
	</script>
</body>

</html>