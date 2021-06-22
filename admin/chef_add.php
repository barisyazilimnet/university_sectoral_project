<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Şef ekle</h1>
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
						if($_POST){
							$name=p("name","mb_convert_case");
							$surname=p("surname","case_converter");
							$name_surname=$name." ".$surname;
							$superscription=p("superscription","mb_convert_case");
							$facebook=p("facebook","");
							$twitter=p("twitter","");
							$linkedin=p("linkedin","");
							$instagram=p("instagram","");
							$pinterest=p("pinterest","");
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$photo=upload_add($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],str_replace(" ","_",$name_surname)."_photo_","chefs/",
													message("warning","exclamation-triangle","Dikkat!","Fotoğraf yüklenemedi."),
													message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun fotoğraf ekleyiniz."),"");
								if($photo){
									$query=mysqli_query($con, "INSERT INTO chefs SET chef_photo='$photo', chef_name_surname='$name_surname', chef_superscription='$superscription', chef_facebook='$facebook', chef_twitter='$twitter', chef_linkedin='$linkedin', chef_instagram='$instagram', chef_pinterest='$pinterest'");
									echo mysqli_error($con);
									if($query){
										system_archives($con, "$name_surname şef eklendi", "Şef Eklendi", $active_user_id);
										echo message("success","check","Başarılı","Şef başarılı bir şekilde eklendi");
										_header("chef_transactions");
									}else{
										echo message("warning","exclamation-triangle","Dikkat!","Şef eklenemedi. Lütfen tekrar deneyiniz");
									}
								}
							}else{
								$pass_result=0;
								echo message("warning","exclamation-triangle","Dikkat!","Şifrenizi yanlış girdiniz.");
							}
						}
					?>
					<div class="card card-info">
						<div class="card-header text-center"><h3 class="card-title float-none">Yeni şef ekleme</h3></div>
						<div class="mt-3 mr-3"><span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span></div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
							<div class="row">
								<div class="form-group col-6">
									<label class="mandatory_field">Adı</label>
									<input type="text" class="form-control form-control-border border-width-2" name="name" placeholder="Şef adı..." title="Şefin adını giriniz" value="<?php if($_POST){ echo $name; } ?>" required>
								</div>
								<div class="form-group col-6">
									<label class="mandatory_field">Soyadı</label>
									<input type="text" class="form-control form-control-border border-width-2" name="surname" placeholder="Şef soyadı..." title="Şefin soyadını giriniz" value="<?php if($_POST){ echo $surname; } ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-6">
									<label class="mandatory_field">Ünvan</label>
									<input type="text" class="form-control form-control-border border-width-2" name="superscription" placeholder="Ünvan..." title="Şefin ünvanını giriniz" value="<?php if($_POST){ echo $superscription; } ?>" required>
								</div>
								<div class="form-group col-6">
									<label>Facebook adresi</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-facebook-f"></i></span></div>
										<input type="url" class="form-control form-control-border border-width-2" name="facebook" placeholder="Facebook adresi..." title="Facebook adresini giriniz" value="<?php if($_POST){ echo $facebook; } ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-6">
									<label>İnstagram adresi</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-instagram"></i></span></div>
										<input type="url" class="form-control form-control-border border-width-2" name="instagram" placeholder="İnstagram adresi..." title="İnstagram adresini giriniz" value="<?php if($_POST){ echo $instagram; } ?>">
									</div>
								</div>
								<div class="form-group col-6">
									<label>Linkedin adresi</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-linkedin-in"></i></span></div>
										<input type="url" class="form-control form-control-border border-width-2" name="linkedin" placeholder="Linkedin adresi..." title="Linkedin adresini giriniz" value="<?php if($_POST){ echo $linkedin; } ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-6">
									<label>Pinterest adresi</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-pinterest"></i></span></div>
										<input type="url" class="form-control form-control-border border-width-2" name="pinterest" placeholder="Pinterest adresi..." title="Pinterest adresini giriniz" value="<?php if($_POST){ echo $pinterest; } ?>">
									</div>
								</div>
								<div class="form-group col-6">
									<label>Twitter adresi</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-twitter"></i></span></div>
										<input type="url" class="form-control form-control-border border-width-2" name="twitter" placeholder="Twitter adresi..." title="Twitter adresini giriniz" value="<?php if($_POST){ echo $twitter; } ?>">
									</div>
								</div>
							</div>
								<div class="form-group">
									<label class="mandatory_field">Fotoğraf</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group"><div class="custom-file"><input type="file" name="photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									<small class="text-muted">Genişlik :&nbsp;&nbsp;570&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;739</small>
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
