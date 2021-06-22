<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Chef işlemleri</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php
					if(in_array("chef_transactions", explode(",", $active_query_user["pages"]))){
						$id=$_GET["id"];
						$chefs=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM chefs"));
						$name_surname=explode(" ",$chefs["chef_name_surname"]); // veritabanından gelen adı ve soyadını parçalara ayırır ve dizi şeklimnde degişkene atar
						$surname=array_reverse($name_surname)[0]; //diziyi ters çevirir ve ilk elemanını degişkene atar
						array_pop($name_surname); //dizinin son elemanını siler
						$name=implode(" ",$name_surname); //dizideki kalan elemanları aralarında boşluk olucak şekilde birleştirerek degişkene atar
						if($_POST){
							$name=p("name","mb_convert_case");
							$surname=p("surname","case_converter");
							$name_surname=$name." ".$surname;
							$facebook=p("facebook","");
							$twitter=p("twitter","");
							$linkedin=p("linkedin","");
							$instagram=p("instagram","");
							$pinterest=p("pinterest","");
							$superscription=p("superscription","");
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$photo=upload_edit($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],$name_surname."_photo_","chefs/",
													message("warning","exclamation-triangle","Dikkat!","Fotoğraf yüklenemedi."),
													message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun fotoğraf ekleyiniz."),
													$chefs["chef_photo"]);
								if($photo){
									$query=mysqli_query($con, "UPDATE chefs SET chef_name_surname='$name_surname', chef_facebook='$facebook', chef_twitter='$twitter', chef_linkedin='$linkedin', chef_instagram='$instagram', chef_pinterest='$pinterest', chef_photo='$photo', chef_superscription='$superscription' WHERE chef_id='$id'");
									if($query){
										system_archives($con, "$name_surname isimli şef başarıyla güncellendi", "Şef Güncellendi", $active_user_id);
										echo message("success","check","Başarılı","Şef başarılı bir şekilde güncellendi");
										_header("chef_transactions");
									}else{
										echo message("warning","exclamation-triangle","Dikkat!","Güncelleme yapılamadı. Lütfen tekrar deneyiniz");
									}
								}
							}else{
								$pass_result=0;
								echo message("warning","exclamation-triangle","Dikkat!","Şifrenizi yanlış girdiniz.");
							}
						}
					?>
					<div class="card card-info">
						<div class="card-header text-center"><h3 class="card-title float-none">Bilgileri Güncelle</h3></div>
						<div class="mt-3 mr-3"><span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span></div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Adı</label>
										<input type="text" class="form-control form-control-border border-width-2" name="name" placeholder="Adı..." title="Üye adını giriniz" value="<?php if($_POST){ echo $name; }else{ echo $name; } ?>" required>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">Soyadı</label>
										<input type="text" class="form-control form-control-border border-width-2" name="surname" placeholder="Soyadı..." title="Üye soyadınızı giriniz" value="<?php if($_POST){ echo $surname; }else{ echo $surname; } ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Facebook adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-facebook-f"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="facebook" placeholder="Facebook adresi..." title="Üye facebook adresini giriniz" value="<?php if($_POST){ echo $facebook; }else{ echo $chefs["chef_facebook"]; } ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>İnstagram adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-instagram"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="instagram" placeholder="İnstagram adresi..." title="Üye instagram adresini giriniz" value="<?php if($_POST){ echo $instagram; }else{ echo $chefs["chef_instagram"]; } ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Linkedin adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-linkedin-in"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="linkedin" placeholder="Linkedin adresi..." title="Üye linkedin adresini giriniz" value="<?php if($_POST){ echo $linkedin; }else{ echo $chefs["chef_linkedin"]; } ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>Pinterest adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-pinterest"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="pinterest" placeholder="Pinterest adresi..." title="Üye pinterest adresini giriniz" value="<?php if($_POST){ echo $pinterest; }else{ echo $chefs["chef_pinterest"]; } ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Twitter adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-twitter"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="twitter" placeholder="Twitter adresi..." title="Üye twitter adresini giriniz" value="<?php if($_POST){ echo $twitter; }else{ echo $chefs["chef_twitter"]; } ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>Fotoğraf</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
										<div class="input-group"><div class="custom-file"><input type="file" name="photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									</div>
								</div>
								<div class="form-group">
										<label class="mandatory_field">Ünvan</label>
										<input type="text" class="form-control form-control-border border-width-2" name="superscription" placeholder="Ünvan..." title="Şef ünvanını giriniz" value="<?php if($_POST){ echo $superscription; }else{ echo $chefs["chef_superscription"]; } ?>" required>
								</div>	
								<div class="form-group text-center">
									<label class="mandatory_field">Şifreniz</label><span class="text-muted"> ( İşlemi tamamlayabilmek için şifrenizi girmeniz gerekmektedir. )</span>
									<input type="password" class="form-control form-control-border border-width-2 <?php input_control($_POST, $pass_result); ?>" id="inputError" name="password" minlength="8" title="İşlemi tamamlayabilmek için kendi şifrenizi giriniz" placeholder="Şifreniz...">
								</div>
							</div>
							<div class="card-footer"><button type="submit" class="btn btn-info float-right">Güncelle</button></div>
						</form>
					</div>
				<?php
				}else{
					echo message("danger","ban","Dikkat!","Buraya girmeye yetkiniz yoktur. Lütfen bekleyiniz anasayfaya yönlendirliyorsunuz");
					_header("");
				}
			?>
			</div>
		</div>
	</div>
</div>