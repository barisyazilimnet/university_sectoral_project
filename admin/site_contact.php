<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Site ayarları</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					$contact=mysqli_fetch_array(mysqli_query($con,"SELECT site_contact.*,admin_users.user_name FROM site_contact INNER JOIN admin_users ON site_contact.user_id=admin_users.user_id"));
					if(in_array("settings", explode(",", $active_query_user["pages"]))){
						if($_POST){
							$phone_number=$_POST["phone_number"];
							$email=p("email","");
							$facebook=p("facebook","");
							$twitter=p("twitter","");
							$linkedin=p("linkedin","");
							$instagram=p("instagram","");
							$pinterest=p("pinterest","");
							$address=p("address","mb_convert_case");
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$datetime=date('Y-m-d');
								$query=mysqli_query($con, "UPDATE site_contact SET phone_number='$phone_number', email='$email', facebook='$facebook', twitter='$twitter', linkedin='$linkedin', instagram='$instagram', pinterest='$pinterest', address='$address', datetime='$datetime', user_id='$active_user_id'");
								if($query){
									system_archives($con, "İletişim bilgileri güncellendi", "İletişim Bilgileri Güncellendi", $active_user_id);
									echo message("success","check","Başarılı","İletişim bilgileri başarılı bir şekilde güncellendi");
									_header("site_contact");
								}else{
									echo message("warning","exclamation-triangle","Dikkat!","Güncelleme yapılamadı. Lütfen tekrar deneyiniz");
								}
							}else{
								$pass_result=0;
								echo message("warning","exclamation-triangle","Dikkat!","Şifrenizi yanlış girdiniz.");
							}
						}
					?>
					<div class="card card-info">
					<div class="card-header text-center"><h3 class="card-title float-none">Site iletişim bilgileri</h3></div>
						<div class="mt-3 mr-3">
							<span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span><br />
							<span class="float-right">En son güncellenme zamanı : <?php echo _date($contact["datetime"]); ?></span><br />
							<span class="float-right">En son güncelleyen kişi : <?php echo $contact["user_name"]; ?></span>
						</div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Telefon numarası</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fas fa-phone"></i></span></div>
											<input type="tel" class="form-control form-control-border border-width-2" name="phone_number" data-inputmask='"mask": "(999) 999-9999"' title="Site telefon numarasını giriniz" data-mask placeholder="Telefon numarası..." value="<?php if($_POST){ echo $phone_number; }else{ echo $contact["phone_number"]; } ?>" required>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">E-mail</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fas fa-envelope"></i></span></div>
											<input type="email" class="form-control form-control-border border-width-2" name="email" placeholder="E-mail..." title="Site email adresini giriniz" value="<?php if($_POST){ echo $email; }else{ echo $contact["email"]; } ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Facebook adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-facebook-f"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="facebook" placeholder="Facebook adresi..." title="Site facebook adresini giriniz" value="<?php if($_POST){ echo $facebook; }else{ echo $contact["facebook"]; } ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>İnstagram adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-instagram"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="instagram" placeholder="İnstagram adresi..." title="Site instagram adresini giriniz" value="<?php if($_POST){ echo $instagram; }else{ echo $contact["instagram"]; } ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Linkedin adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-linkedin-in"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="linkedin" placeholder="Linkedin adresi..." title="Site linkedin adresini giriniz" value="<?php if($_POST){ echo $linkedin; }else{ echo $contact["linkedin"]; } ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>Pinterest adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-pinterest"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="pinterest" placeholder="Pinterest adresi..." title="Site pinterest adresini giriniz" value="<?php if($_POST){ echo $pinterest; }else{ echo $contact["pinterest"]; } ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Twitter adresi</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text" style="border:none !important;"><i class="fab fa-twitter"></i></span></div>
											<input type="url" class="form-control form-control-border border-width-2" name="twitter" placeholder="Twitter adresi..." title="Site twitter adresini giriniz" value="<?php if($_POST){ echo $twitter; }else{ echo $contact["twitter"]; } ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>Adres</label>
										<input type="text" class="form-control form-control-border border-width-2" name="address" placeholder="Adres..." title="Adresinizi giriniz" value="<?php if($_POST){ echo $address; }else{ echo $contact["address"]; } ?>">
									</div>
								</div>
								<div class="form-group text-center">
									<label class="mandatory_field">Şifreniz</label><span class="text-muted"> ( İşlemi tamamlayabilmek için şifrenizi girmeniz gerekmektedir. )</span>
									<input type="password" class="form-control form-control-border border-width-2 <?php input_control($_POST, $pass_result); ?>" id="inputError" name="password" title="İşlemi tamamlayabilmek için kendi şifrenizi giriniz" minlength="8" placeholder="Şifreniz...">
								</div>
							</div>
							<div class="card-footer"><button type="submit" class="btn btn-info float-right">Güncelle</button></div>
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
