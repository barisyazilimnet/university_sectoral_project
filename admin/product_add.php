<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Ürün ekle</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					if(in_array("product_transactions", explode(",", $active_query_user["pages"]))){
						if($_POST){
							$name=p("name","mb_convert_case");
							$category_id=$_POST["category_id"];
							$price=$_POST["price"];
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$photo=upload_add($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],str_replace(" ","_",$_POST["name"])."_photo_","products/",
													message("warning","exclamation-triangle","Dikkat!","Fotoğraf yüklenemedi."),
													message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun fotoğraf ekleyiniz."),"");
								if($photo){
									$menu_photo=upload_add($_FILES["menu_photo"]["tmp_name"],$_FILES["menu_photo"]["name"],str_replace(" ","_",$_POST["name"])."_menu_photo_","products/",
													message("warning","exclamation-triangle","Dikkat!","Menü fotoğrafı yüklenemedi."),
													message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun menü fotoğrafı ekleyiniz."),"");
									if($menu_photo){
										$query=mysqli_query($con, "INSERT INTO products SET category_id='$category_id', p_name='$name', p_price='$price', p_photo='$photo', menu_photo='$menu_photo'");
										if($query){
											system_archives($con, "$name ürünü eklendi", "Ürün Eklendi", $active_user_id);
											echo message("success","check","Başarılı","Ürün başarılı bir şekilde eklendi");
											_header("product_transactions");
										}else{
											echo message("warning","exclamation-triangle","Dikkat!","Ürün eklenemedi. Lütfen tekrar deneyiniz");
										}
									}
								}
							}else{
								$pass_result=0;
								echo message("warning","exclamation-triangle","Dikkat!","Şifrenizi yanlış girdiniz.");
							}
						}
					?>
					<div class="card card-info">
						<div class="card-header text-center"><h3 class="card-title float-none">Yeni ürün ekleme</h3></div>
						<div class="mt-3 mr-3"><span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span></div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label class="mandatory_field">Ürün kategorisi</label>
									<select class="form-control form-control-border border-width-2" name="category_id">
										<?php 
											$category_query=mysqli_query($con, "SELECT * FROM categories");
											while($categories=mysqli_fetch_array($category_query)){ 
										?>
												<option value="<?php echo $categories["category_id"]; ?>" <?php if($_POST){ if($category_id==$categories["category_id"]){ echo "selected"; } } ?> ><?php echo $categories["name"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label class="mandatory_field">Ürün adı</label>
									<input type="text" class="form-control form-control-border border-width-2" name="name" placeholder="Ürün adı..." title="Ürün adını giriniz" value="<?php if($_POST){ echo $name; } ?>" required>
								</div>
								<div class="form-group">
									<label class="mandatory_field">Ürün fiyatı</label>
									<input type="text" class="form-control form-control-border border-width-2" name="price" placeholder="Ürün fiyatı..." title="Ürün fiyatı giriniz" value="<?php if($_POST){ echo $price; } ?>" required>
								</div>
								<div class="form-group">
									<label>Ürün fotoğrafı</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group"><div class="custom-file"><input type="file" name="photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									<small class="text-muted">Genişlik :&nbsp;&nbsp;227&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;226</small>
								</div>
								<div class="form-group">
									<label>Menü fotoğrafı</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group"><div class="custom-file"><input type="file" name="menu_photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									<small class="text-muted">Genişlik :&nbsp;&nbsp;84&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;84</small>
								</div>
								<div class="form-group text-center">
									<label class="mandatory_field">Şifreniz</label><span class="text-muted"> ( İşlemi tamamlayabilmek için şifrenizi girmeniz gerekmektedir. )</span>
									<input type="password" class="form-control form-control-border border-width-2 <?php input_control($_POST, $pass_result); ?>" id="inputError" name="password" title="İşlemi tamamlayabilmek için kendi şifrenizi giriniz" minlength="8" placeholder="Şifreniz...">
								</div>
							</div>
							<div class="card-footer"><button type="submit" class="btn btn-info float-right">Ekle</button></div>
						</form>
					</div>
				<?php
					}else{
						echo message("danger","ban","Dikkat!","Buraya girmeye yetkiniz yoktur. Lütfen bekleyiniz ana sayfaya yönlendirliyorsunuz");
						_header("");
					}
				?>
			</div>
		</div>
	</div>
</div>
