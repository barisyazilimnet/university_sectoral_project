<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Üye ekle</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					if(in_array("user_transactions", explode(",", $active_query_user["pages"]))){
						if($_POST){
							$name=p("name","mb_convert_case");
							$surname=p("surname","case_converter");
							$name_surname=$name." ".$surname;
							$user_name=p("user_name","");
							$birthday=$_POST["birthday"];
							$email=p("email","");
							$phone_number=$_POST["phone_number"];
							$gender=$_POST["gender"];
							$status=$_POST["status"];
							$password=p("password","pass");
							$user_password=p("user_password","pass");
							$turkish_characters=array("ğ", "Ğ", "ç", "Ç", "ş", "Ş", "ü", "Ü", "ö", "Ö", "ı", "İ");
							foreach($turkish_characters as $value){
								$turkish=strstr($user_name, $value);
							}
							if($password == $active_query_user["password"]){
								if($turkish==False){
									$user_name_control = mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE user_name = '$user_name'"));
									if ($user_name_control == 0){
										$email_control= mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email='$email'"));
										if ($email_control == 0){
											$photo=upload_add($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],$user_name."_photo_","profile_photos/users/",
															  message("warning","exclamation-triangle","Dikkat!","Profil fotoğrafı yüklenemedi."),
															  message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun profil fotoğrafı ekleyiniz."),
															  $gender);
											if($photo){
												$query=mysqli_query($con, "INSERT INTO users SET name_surname='$name_surname', user_name='$user_name', birthday='$birthday', email='$email', phone_number='$phone_number', gender='$gender', photo='$photo', password='$user_password', status='$status'");
												if($query){
													system_archives($con, "$user_name üyesi eklendi", "Üye Eklendi", $active_user_id);
													echo message("success","check","Başarılı","Üye başarılı bir şekilde eklendi");
													_header("user_transactions");
												}else{
													echo message("warning","exclamation-triangle","Dikkat!","Üye eklenemedi. Lütfen tekrar deneyiniz");
												}
											}
										}else{
											echo message("warning","exclamation-triangle","Dikkat!","$email e-posta adresini kullanan başka bir üyeniz mevcut. Lütfen başka bir e-posta adresi ile tekrar deneyiniz.");
										}
									}else{
										echo message("warning","exclamation-triangle","Dikkat!","$user_name kullanıcı adını kullanan başka bir üyeniz mevcut. Lütfen başka bir kullanıcı adı ile tekrar deneyiniz.");
									}
								}else{
									echo message("warning","exclamation-triangle","Dikkat!","Lütfen kullanıcı adında türkçe karakterler kullanmayınız (  ğ,  Ğ,  ç,  Ç,  ş,  Ş,  ü,  Ü,  ö,  Ö,  ı,  İ  )");
								}
							}else{
								$pass_result=0;
								echo message("warning","exclamation-triangle","Dikkat!","Şifrenizi yanlış girdiniz.");
							}
						}
					?>
					<div class="card card-info">
						<div class="card-header text-center"><h3 class="card-title float-none">Yeni üye ekleme</h3></div>
						<div class="mt-3 mr-3"><span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span></div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Adı</label>
										<input type="text" class="form-control form-control-border border-width-2" name="name" placeholder="Üye adı..." title="Üye adını giriniz" value="<?php if($_POST){ echo $name; } ?>" required>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">Soyadı</label>
										<input type="text" class="form-control form-control-border border-width-2" name="surname" placeholder="Üye soyadı..." title="Üye soyadını giriniz" value="<?php if($_POST){ echo $surname; } ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Kullanıcı adı</label>
										<input type="text" class="form-control form-control-border border-width-2 <?php if($_POST){ if($turkish or $user_name_control){ echo 'is-invalid'; } } ?>" id="inputError" name="user_name" placeholder="Kullanıcı adı..." title="Kullanıcı adını giriniz" value="<?php if($_POST){ echo $user_name; } ?>" required>
										<small class="text-muted">Lütfen türkçe karakter kullanmayınız (  ğ - Ğ - ç - Ç - ş - Ş - ü - Ü - ö - Ö - ı - İ  )</small>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">Doğum tarihi</label>
										<input type="date" class="form-control form-control-border border-width-2" name="birthday" placeholder="Doğum tarihi..." title="Doğum tarihini seçiniz" value="<?php if($_POST){ echo $birthday; } ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Telefon numarası</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fas fa-phone"></i></span></div>
											<input type="tel" class="form-control form-control-border border-width-2" name="phone_number" title="Telefon numarasını giriniz" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Telefon numarası..." value="<?php if($_POST){ echo $phone_number; } ?>" required>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">E-mail adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fas fa-envelope"></i></span></div>
											<input type="email" class="form-control form-control-border border-width-2 <?php if($_POST){ if($email_control){ echo 'is-invalid'; } } ?>" id="inputError" name="email" placeholder="E-mail adresi..." title="E-mail adresini giriniz" value="<?php if($_POST){ echo $email; } ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Cinsiyet</label>
										<select class="form-control form-control-border border-width-2" name="gender">
											<option value="0" <?php if($_POST){ if($gender==0){ echo "selected"; } } ?> >Bayan</option>
											<option value="1" <?php if($_POST){ if($gender==1){ echo "selected"; } } ?> >Bay</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">Durum</label>
										<select class="form-control form-control-border border-width-2" name="status">
											<option value="0" <?php if($_POST){ if($status==0){ echo "selected"; } } ?> >Onaylı değil</option>
											<option value="1" <?php if($_POST){ if($status==1){ echo "selected"; } } ?> >Onaylı</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Profil fotoğrafı</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
										<div class="input-group"><div class="custom-file"><input type="file" name="photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									</div>
									<div class="form-group col-md-6">
										<label>Şifre</label>
										<input type="text" class="form-control form-control-border border-width-2" name="user_password" title="Şifre" value="<?php echo password(8); ?>" readonly>
									</div>
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
