<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Anasayfa ayarları</h1>
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
						$homepage_settings=mysqli_fetch_array(mysqli_query($con,"SELECT slider_header,slider_bottom_header,slider_background FROM homepage_settings"));
						if($_POST){
							$slider_header=p("slider_header","case_converter");
							$slider_bottom_header=p("slider_bottom_header","case_converter");
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$slider_background=upload_edit($_FILES["slider_background"]["tmp_name"],$_FILES["slider_background"]["name"],"slider_background_","site/homepage/",
												  message("warning","exclamation-triangle","Dikkat!","Arkaplan fotoğrafı yüklenemedi."),
												  message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun arkaplan fotoğrafı ekleyiniz."),
												  $homepage_settings["slider_background"]);
								if($slider_background){
									$query=mysqli_query($con, "UPDATE homepage_settings SET slider_header='$slider_header', slider_bottom_header='$slider_bottom_header', slider_background='$slider_background'");
									if($query){
										system_archives($con, "Anasayfa slider ayarları güncellendi", "Anasayfa Ayarları Güncellendi", $active_user_id);
										echo message("success","check","Başarılı","Anasayfa slider ayarları başarılı bir şekilde güncellendi");
										_header("slider_settings");
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
						<div class="card-header text-center"><h3 class="card-title float-none">Slider ayarları</h3></div>
						<div class="mt-3 mr-3">
							<span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span><br />
						</div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label class="mandatory_field">Başlık</label>
									<input type="text" class="form-control form-control-border border-width-2" name="slider_header" placeholder="Başlık..." title="Başlık yazınız" value="<?php if($_POST){ echo $slider_header; }else{ echo $homepage_settings["slider_header"]; } ?>" required>
								</div>
								<div class="form-group">
									<label class="mandatory_field">Alt başlık</label>
									<input type="text" class="form-control form-control-border border-width-2" name="slider_bottom_header" placeholder="Alt başlık..." title="Alt başlık yazınız" value="<?php if($_POST){ echo $slider_bottom_header; }else{ echo $homepage_settings["slider_bottom_header"]; } ?>" required>
								</div>
								<div class="form-group">
									<label>Arkaplan fotoğrafı</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="slider_background" title="Arkaplan görseli ekleyiniz" class="custom-file-input">
											<label class="custom-file-label">Dosya seçin...</label>
										</div>
									</div>
									<small class="text-muted">Genişlik&nbsp;: 1620&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik&nbsp;: 625</small>
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
