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
					if(in_array("settings", explode(",", $active_query_user["pages"]))){
						if($_POST){
							$url=p("url","");
							$title=p("title","mb_convert_case");
							$keywords=p("keywords","mb_convert_case");
							$description=p("description","mb_convert_case");
							$status=$_POST["status"];
							$theme=$_POST["theme"];
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$icon=upload_edit($_FILES["icon"]["tmp_name"],$_FILES["icon"]["name"],"icon_","site/",
												  message("warning","exclamation-triangle","Dikkat!","Başlık iconu fotoğrafı yüklenemedi."),
												  message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun başlık iconu ekleyiniz."),
												  $query_settings["icon"]);
								if($icon){
									$logo=upload_edit($_FILES["logo"]["tmp_name"],$_FILES["logo"]["name"],"logo_","site/",
													  message("warning","exclamation-triangle","Dikkat!","Site logosu yüklenemedi."),
													  message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun site logosu ekleyiniz."),
													  $query_settings["logo"]);
									if($logo){
										$admin_logo=upload_edit($_FILES["admin_logo"]["tmp_name"],$_FILES["admin_logo"]["name"],"admin_logo_","site/",
																message("warning","exclamation-triangle","Dikkat!","Admin panel logosu yüklenemedi."),
																message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun admin panel logosu ekleyiniz."),
																$query_settings["admin_logo"]);
										if($admin_logo){
											$login_background=upload_edit($_FILES["login_background"]["tmp_name"],$_FILES["login_background"]["name"],"login_background_","site/",
																		  message("warning","exclamation-triangle","Dikkat!","Üye giriş bölümü arkaplan fotoğrafı yüklenemedi."),
																		  message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun üye giriş bölümü arkaplan fotoğrafı ekleyiniz."),
																		  $query_settings["login_background"]);
											if($login_background){
												$datetime=date('Y-m-d');
												$query=mysqli_query($con, "UPDATE settings SET url='$url', title='$title', keywords='$keywords', description='$description', status='$status', theme='$theme',  icon='$icon', logo='$logo', admin_logo='$admin_logo', login_background='$login_background', datetime='$datetime', user_id='$active_user_id'");
												if($query){
													system_archives($con, "Site ayarları güncellendi", "Site Ayarları Güncellendi", $active_user_id);
													echo message("success","check","Başarılı","Site ayarları başarılı bir şekilde güncellendi");
													_header("site_settings");
												}else{
													echo message("warning","exclamation-triangle","Dikkat!","Güncelleme yapılamadı. Lütfen tekrar deneyiniz");
												}
											}
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
					<div class="card-header text-center"><h3 class="card-title float-none">Site ayarları</h3></div>
						<div class="mt-3 mr-3">
							<span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span><br />
							<span class="float-right">En son güncellenme zamanı : <?php echo _date($query_settings["datetime"]); ?></span><br />
							<span class="float-right">En son güncelleyen kişi : <?php echo $query_settings["user_name"]; ?></span>
						</div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">URL</label>
										<input type="text" class="form-control form-control-border border-width-2" name="url" placeholder="URL..." title="Site linkini giriniz" value="<?php if($_POST){ echo $url; }else{ echo $query_settings["url"]; } ?>" required>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">Başlık</label>
										<input type="text" class="form-control form-control-border border-width-2" name="title" placeholder="Başlık..." title="Site başlık ismini giriniz" value="<?php if($_POST){ echo $title; }else{ echo $query_settings["title"]; } ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="mandatory_field">Açıklama</label>
										<input type="text" class="form-control form-control-border border-width-2" name="description" placeholder="Açıklama..." title="Site açıklamasını giriniz" value="<?php if($_POST){ echo $description; }else{ echo $query_settings["description"]; } ?>" required>
									</div>
									<div class="form-group col-md-6">
										<label class="mandatory_field">Anahtar kelimeler</label>
										<span class="text-muted"> ( Lütfen her kelime arasına virgül koyunuz ve her virgülden sonra bir boşluk koyunuz )</span>
										<input type="text" class="form-control form-control-border border-width-2" name="keywords" placeholder="Anahtar kelimeler..." title="Site anahtar kelimelerini giriniz" value="<?php if($_POST){ echo $keywords; }else{ echo $query_settings["keywords"]; } ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Site durumu</label>
										<select class="form-control form-control-border border-width-2" name="status">
											<option value="0" <?php if($_POST){ if($status==0){ echo "selected"; } }else{ if($query_settings["status"]==0){ echo "selected"; } } ?> >Kapalı</option>
											<option value="1" <?php if($_POST){ if($status==1){ echo "selected"; } }else{ if($query_settings["status"]==1){ echo "selected"; } } ?> >Açık</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label>Site tema</label>
										<select class="form-control form-control-border border-width-2" name="theme">
											<option value="default" <?php if($_POST){ if($theme=="default"){ echo "selected"; } }else{ if($query_settings["theme"]=="default"){ echo "selected"; } } ?> >Default</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Başlık iconu</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
										<div class="input-group"><div class="custom-file"><input type="file" name="icon" title="Site başlık icon görseli ekleyiniz" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									</div>
									<div class="form-group col-md-6">
										<label>Logo</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
										<div class="input-group"><div class="custom-file"><input type="file" name="logo" title="Site logo görseli ekleyiniz" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Admin paneli logo</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
										<div class="input-group"><div class="custom-file"><input type="file" name="admin_logo" title="Site admin paneli logo görseli ekleyiniz" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
										<small class="text-muted">Genişlik : 128&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik : 128</small>
									</div>
									<div class="form-group col-md-6">
										<label>Üye giriş ve kayıt ol arkaplan</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
										<div class="input-group"><div class="custom-file"><input type="file" name="login_background" title="Site üye giriş arkaplanı resmi ekleyiniz" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
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
