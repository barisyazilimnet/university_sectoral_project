
<?php 
    $homepage_settings = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM homepage_settings"));
    $our_story = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM our_story"));
?>
<div class="rev_slider_wrapper">
    <div id="rev_slider_2" class="rev_slider" data-version="5.4.5">
        <ul>
            <li data-transition="">
                <img src="<?php echo URL; ?>uploads/site/homepage/<?php echo $homepage_settings["slider_background"]; ?>" class="rev-slidebg" alt="#">
                <div class="tp-caption tp-resizeme caption-2" data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-x="left" data-y="middle" data-fontsize="['137', '127', '137', '127', '127']" data-voffset="['21', '23', '24', '21', '21']" data-hoffset="['251', '111', '111', '81', '31']" data-lineheight="inherit" data-color="#fff">
                    <?php echo $homepage_settings["slider_header"]; ?>
                </div>
                <div class="tp-caption tp-resizeme caption-3" data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-x="left" data-y="middle" data-fontsize="['48', '44', '48', '48', '48']" data-voffset="['119', '114', '115', '119', '119']" data-hoffset="['326', '176', '176', '156', '106']" data-lineheight="inherit" data-color="#999">
                    <?php echo $homepage_settings["slider_bottom_header"]; ?>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="cate-box">
    <div class="container-fluid">
        <div class="row">
            <?php
            $category = mysqli_query($con, "SELECT * FROM categories WHERE homepage_visibility='1' LIMIT 4");
            while ($categories = mysqli_fetch_array($category)) {
            ?>
                <div class="col-md-6 col-xl-3">
                    <a href="#" class="cate-box-item">
                        <img src="<?php echo URL; ?>uploads/site/homepage/category/<?php echo $categories["background"]; ?>" alt="">
                        <div class="inner fixed text-nowrap">
                            <?php echo $categories["name"]; ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<section class="section-primary pt-150 our-story pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 px-lg-0 order-2 order-lg-1">
                <div class="our-story-primary style-2 fixed">
                    <div class="interior">
                        <div class="heading">
                            <h2><?php echo $our_story["header"]; ?></h2>
                            <img src="<?php echo THEME_URL; ?>img/our_story_underline.png" alt="" class="border-place">
                        </div>
                        <div class="body">
                            <p><?php echo $our_story["description"]; ?></p>
                            <div class="end">
                                <div class="name">
                                    <h6>
                                        <a href="#">Barış KURT</a>
                                    </h6>
                                    <span>Restaurant Sahibi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-lg-0 order-1 order-lg-2">
                <div class="image-bg" style="background: url(<?php echo URL; ?>uploads/site/homepage/<?php echo $our_story["photo"]; ?>) center center;">
                    <img src="<?php echo URL; ?>uploads/site/homepage/<?php echo $our_story["photo"]; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SPECIALITIES -->
<section class="section-primary special-slider pb-0">
    <div class="container-fluid">
        <div class="section-header">
            <h2 class="text-white">Günün spesiyalleri</h2>
            <span>~ Lezzetli yiyecekler ~</span>
        </div>
        <!-- OWL-CAROUSEL -->
        <div class="owl-carousel owl-theme style" id="special-carousel">
            <?php
            $products_query = mysqli_query($con, "SELECT * FROM products");
            while ($products = mysqli_fetch_array($products_query)) {
            ?>
                <div class="item mx-1">
                    <div class="special-item item-box">
                        <a href="#" class="thumb">
                            <img src="<?php echo URL; ?>uploads/products/<?php echo $products["p_photo"]; ?>" alt="">
                        </a>
                        <div class="item-info">
                            <h5>
                                <a href="#"><?php echo $products["p_name"]; ?></a>
                            </h5>
                            <span class="price">
                                <span>₺</span><?php echo $products["p_price"]; ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- OUR FOOD MENU -->
<section class="our-menu bg-none section-primary pt-133 pb-101">
    <div class="container">
        <div class="section-header">
            <h2 class="text-white">Menü</h2>
            <span>~ Neler sunduğumuzu görün ~</span>
        </div>
        <div id="tabs">
            <div class="row menu-navigation color-e5e5e5 mb-53">
                <div class="fix-col mx-auto">
                    <ul>
                        <?php
                        $category_query = mysqli_query($con, "SELECT * FROM categories");
                        while ($categories = mysqli_fetch_array($category_query)) {
                        ?>
                            <li class="">
                                <a href="#<?php echo str_replace(" ", "_", turkish_converter($categories["name"])); ?>">
                                    <img src="<?php echo URL; ?>uploads/category/<?php echo $categories["logo"]; ?>" alt="">
                                    <span><?php echo $categories["name"]; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php
            $category_query = mysqli_query($con, "SELECT category_id,name FROM categories");
            while ($categories = mysqli_fetch_array($category_query)) {
                $category_id = $categories["category_id"];
            ?>
                <div id="<?php echo str_replace(" ", "_", turkish_converter($categories["name"])); ?>">
                    <div class="row justify-content-center justify-content-xl-between">
                        <?php
                        $porduct_query = mysqli_query($con, "SELECT * FROM products WHERE category_id=$category_id");
                        while ($products = mysqli_fetch_array($porduct_query)) {
                        ?>
                            <div class="col-md-11 col-lg-10 col-xl-6 menu-holder left fixed">
                                <a href="#" class="menu-thumb">
                                    <img src="<?php echo URL; ?>uploads/products/<?php echo $products["menu_photo"]; ?>" alt="">
                                </a>
                                <div class="menu-item">
                                    <h5 class="color-fff">
                                        <a href="#"><?php echo $products["p_name"]; ?></a>
                                        <span class="dots"></span>
                                        <span class="price"><span>₺</span><?php echo $products["p_price"]; ?></span>
                                    </h5>
                                    <ul>
                                        <li><a href="#"><?php echo $categories["name"]; ?></a></li>
                                    </ul>
                                    <button product_id="<?php echo $products["id"]; ?>" class="btn btn-secondary add-to-cart">Sepete Ekle</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- GALLERY GRID-->
<section class="gallery">
    <div class="container-fluid">
        <div class="section-header">
            <h2 class="text-white">Fotoğraf Galerisi</h2>
            <span>~ Bizim Restaurantımız ~</span>
        </div>
        <div class="gallery-grid has-gutter lightgallery">
            <?php
            $gallery_query = mysqli_query($con, "SELECT * FROM gallery ORDER BY id DESC");
            while ($gallery = mysqli_fetch_array($gallery_query)) {
            ?>
                <div class="gallery-item" data-src="<?php echo URL; ?>uploads/gallery/<?php echo $gallery["photo"]; ?>">
                    <a href="#" class="thumb">
                        <img src="<?php echo URL; ?>uploads/gallery/<?php echo $gallery["photo"]; ?>" alt="">
                        <i class="fas fa-arrows-alt "></i>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- OUR TALENTED CHEF -->
<section class="section-primary our-chef-slider">
    <div class="container">
        <div class="section-header">
            <h2 class="text-white">Yetenekli Şeflerimiz</h2>
            <span>~ Tecrübe & Coşku ~</span>
        </div>
        <!-- OWL-CAROUSEL -->
        <div class="owl-carousel owl-theme style" id="our-chef-carousel">
            <?php
            $chefs_query = mysqli_query($con, "SELECT * FROM chefs");
            while ($chefs_fetch_array = mysqli_fetch_array($chefs_query)) {
            ?>
                <div class="item">
                    <div class="our-chef-item">
                        <img src="<?php echo URL; ?>uploads/chefs/<?php echo $chefs_fetch_array["chef_photo"]; ?>" alt="">
                        <div class="info">
                            <div class="inner">
                                <h6 class="text-white"><?php echo $chefs_fetch_array["chef_name_surname"]; ?></h6>
                                <span><?php echo $chefs_fetch_array["chef_superscription"]; ?></span>
                                <div class="social" <?php if (empty($chefs_fetch_array["chef_facebook"]) and empty($chefs_fetch_array["chef_instagram"]) and empty($chefs_fetch_array["chef_twitter"]) and empty($chefs_fetch_array["chef_linkedin"]) and empty($chefs_fetch_array["chef_pinterest"])) {
                                                        echo "hidden";
                                                    } ?>>
                                    <a target="_blank" href="<?php echo $chefs_fetch_array['chef_twitter']; ?>" <?php if (empty($chefs_fetch_array["chef_twitter"])) {
                                                                                                                    echo "hidden";
                                                                                                                } ?>>
                                        <i class="zmdi zmdi-twitter"></i>
                                    </a>
                                    <a target="_blank" href="<?php echo $chefs_fetch_array['chef_facebook']; ?>" <?php if (empty($chefs_fetch_array["chef_facebook"])) {
                                                                                                                        echo "hidden";
                                                                                                                    } ?>>
                                        <i class="zmdi zmdi-facebook-box"></i>
                                    </a>
                                    <a target="_blank" href="<?php echo $chefs_fetch_array['chef_linkedin']; ?>" <?php if (empty($chefs_fetch_array["chef_linkedin"])) {
                                                                                                                        echo "hidden";
                                                                                                                    } ?>>
                                        <i class="zmdi zmdi-linkedin"></i>
                                    </a>
                                    <a target="_blank" href="<?php echo $chefs_fetch_array['chef_instagram']; ?>" <?php if (empty($chefs_fetch_array["chef_instagram"])) {
                                                                                                                        echo "hidden";
                                                                                                                    } ?>>
                                        <i class="zmdi zmdi-instagram"></i>
                                    </a>
                                    <a target="_blank" href="<?php echo $chefs_fetch_array['chef_pinterest']; ?>" <?php if (empty($chefs_fetch_array["chef_pinterest"])) {
                                                                                                                        echo "hidden";
                                                                                                                    } ?>>
                                        <i class="zmdi zmdi-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- FORM -->
<section class="section-primary section-form pb-120">
    <?php
    if ($_POST) {
        $reservation_people = $_POST["reservation_people"];
        $reservation_date = $_POST["reservation_date"];
        $reservation_time = $_POST["reservation_time"];
        $reservation_name = p("reservation_name", "mb_convert_case");
        $reservation_phone_number = p("reservation_phone_number", "");
        $reservation_email = p("reservation_email", "");
        $query = mysqli_query($con, "INSERT INTO reservation SET reservation_people='$reservation_people', reservation_date='$reservation_date', reservation_time='$reservation_time', reservation_name='$reservation_name', reservation_phone_number='$reservation_phone_number', reservation_email='$reservation_email'");
        if ($query) {
            echo "başarıyla eklendi";
        }
    }
    ?>
    <div class="container">
        <div class="section-header">
            <h2 class="text-white">Bir Masa Rezervasyonu</h2>
        </div>
        <form method="post">
            <div class="form-inner">
                <div class="form-col">
                    <div class="select">
                        <div class="form-holder">
                            <div class="form-control">1 kişi</div>
                            <span class="lnr lnr-chevron-down"></span>
                        </div>
                        <ul class="dropdown" name="reservation_people">
                            <li data-value="1">1 kişi</li>
                            <li data-value="2">2 kişi</li>
                            <li data-value="3">3 kişi</li>
                            <li data-value="4">4 kişi</li>
                            <li data-value="5">5 kişi</li>
                            <li data-value="6">6 kişi</li>
                            <li data-value="7">7 kişi</li>
                            <li data-value="8">8 kişi</li>
                            <li data-value="9">9 kişi</li>
                            <li data-value="10">10 kişi</li>
                        </ul>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-holder">
                        <input name="reservation_date" type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd - mm - yyyy" placeholder="Rezervasyon tarihi">
                        <span class="lnr lnr-calendar-full big"></span>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-holder">
                        <input name="reservation_time" type="text" class="form-control time-picker" placeholder="Rezervasyon saati">
                        <span class="lnr lnr-clock big"></span>
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-holder">
                        <input name="reservation_name" type="text" class="form-control" placeholder="Rezervasyon ismi">
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-holder">
                        <input name="reservation_phone_number" type="tel" class="form-control" placeholder="Telefon numarası">
                    </div>
                </div>
                <div class="form-col">
                    <div class="form-holder">
                        <input name="reservation_email" type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="btn-holder">
                <button class="au-btn round has-bd bd-999 au-btn--hover">Oluştur</button>
            </div>
        </form>
    </div>
</section>