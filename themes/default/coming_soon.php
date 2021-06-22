<!DOCTYPE html>
<?php 
	$contact=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM site_contact"));
	$coming_soon=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM coming_soon"));
	$slider_photos=explode(",",$coming_soon["slider_photos"])
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
	    <link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/bootstrap/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/owl-carousel/css/owl.carousel.min.css">
	    <link rel="stylesheet" href="<?php echo THEME_URL; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
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
		<header>
			<nav class="navbar-desktop">
				<div class="left"><a href="<?php echo URL; ?>" class="logo"><img src="<?php echo URL; ?>uploads/site/<?php echo $query_settings["logo"]; ?>" alt="Logo"></a></div>
				<div class="right"><div class="action"><span class="lnr lnr-menu menu-sidebar-icon"></span></div></div>
			</nav>
			<nav class="navbar-mobile"><div class="container"><div class="heading"><a href="<?php echo URL; ?>" class="logo"><img src="<?php echo URL; ?>uploads/site/<?php echo $query_settings["logo"]; ?>" alt="Logo"></a></div></div></nav>
			<div class="menu-sidebar">
				<div class="close-btn"><span class="lnr lnr-cross" id="close-icon"></span></div>
				<a href="<?php echo URL; ?>" class="logo"><img src="<?php echo URL; ?>uploads/site/<?php echo $query_settings["logo"]; ?>" alt="Logo"></a><br />
				<div class="owl-carousel owl-theme image-slider style-1" id="image-carousel">
				    <div class="item">
						<a target="_blank" href="<?php echo URL; ?>uploads/site/coming_soon/<?php echo $slider_photos[0]; ?>">
							<img src='<?php echo URL; ?>uploads/site/coming_soon/<?php echo $slider_photos[0]; ?>' alt="Resim 1">
						</a>
					</div>
				    <div class="item">
						<a target="_blank" href="<?php echo URL; ?>uploads/site/coming_soon/<?php echo $slider_photos[1]; ?>">
							<img src='<?php echo URL; ?>uploads/site/coming_soon/<?php echo $slider_photos[1]; ?>' alt="Resim 2">
						</a>
					</div>
				    <div class="item">
						<a target="_blank" href="<?php echo URL; ?>uploads/site/coming_soon/<?php echo $slider_photos[2]; ?>">
							<img src='<?php echo URL; ?>uploads/site/coming_soon/<?php echo $slider_photos[2]; ?>' alt="Resim 3">
						</a>
					</div>
				</div>
				<div class="contact-part">
					<div class="contact-line"><span class="lnr lnr-home"></span><span><?php echo $contact["address"]; ?></span></div>
					<div class="contact-line"><a href="tel:<?php echo $contact["phone_number"]; ?>"><span class="lnr lnr-phone-handset"></span><span><?php echo $contact["phone_number"]; ?></span></a></div>
					<div class="contact-line"><a href="mailto:<?php echo $contact["email"]; ?>"><span class="lnr lnr-envelope"></span><span><?php echo $contact["email"]; ?></span></a></div>
				</div>
				<div class="social">
					<a target="_blank" href="<?php echo $contact["twitter"]; ?>" <?php if(empty($contact["twitter"])){ echo "hidden"; } ?>><i class="zmdi zmdi-twitter"></i></a>
					<a target="_blank" href="<?php echo $contact["facebook"]; ?>" <?php if(empty($contact["facebook"])){ echo "hidden"; } ?>><i class="zmdi zmdi-facebook-box"></i></a>
					<a target="_blank" href="<?php echo $contact["linkedin"]; ?>" <?php if(empty($contact["linkedin"])){ echo "hidden"; } ?>><i class="zmdi zmdi-linkedin"></i></a>
					<a target="_blank" href="<?php echo $contact["instagram"]; ?>" <?php if(empty($contact["instagram"])){ echo "hidden"; } ?>><i class="zmdi zmdi-instagram"></i></a>
					<a target="_blank" href="<?php echo $contact["pinterest"]; ?>" <?php if(empty($contact["pinterest"])){ echo "hidden"; } ?>><i class="zmdi zmdi-pinterest"></i></a>
				</div>
			</div>
		</header>
		<main>
			<section class="coming-soon set-bg" data-image-src="<?php echo URL; ?>uploads/site/coming_soon/<?php echo $coming_soon["background"]; ?>">
				<div class="inner">
					<h1><?php echo $coming_soon["header"]; ?></h1>
					<div id="count-down-time" class="time text-white" data-countdown="<?php echo $coming_soon["time"]; ?>"></div>
					<p style="color:white; font-size: 20px; font-weight: bolder;"><?php echo $coming_soon["description"]; ?></p>
				</div>
			</section>
		</main>
		<script src="<?php echo THEME_URL; ?>js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo THEME_URL; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script>
		<script src="<?php echo THEME_URL; ?>vendor/hcmobilenav/hc-mobile-nav.min.js"></script>
        <script src="<?php echo THEME_URL; ?>js/jquery.countdown.min.js"></script>
		<script src="<?php echo THEME_URL; ?>js/main.min.js"></script>
	</body>
</html>