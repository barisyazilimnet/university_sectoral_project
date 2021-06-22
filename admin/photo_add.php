<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Fotoğraf ekle</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					if(in_array("gallery_transactions", explode(",", $active_query_user["pages"]))){
						if($_POST){
							$password=p("password","pass");
							if($password == $active_query_user["password"]){
								$photo=upload_add($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],"photo_","gallery/",
													message("warning","exclamation-triangle","Dikkat!","Fotoğraf yüklenemedi."),
													message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun fotoğraf ekleyiniz."),"");
								if($photo){
									$query=mysqli_query($con, "INSERT INTO gallery SET photo='$photo', user_id='$active_user_id'");
									if($query){
										system_archives($con, "Fotoğraf eklendi", "Fotoğraf Eklendi", $active_user_id);
										echo message("success","check","Başarılı","Fotoğraf başarılı bir şekilde eklendi");
										_header("gallery_transactions");
									}else{
										echo message("warning","exclamation-triangle","Dikkat!","Fotoğraf eklenemedi. Lütfen tekrar deneyiniz");
									}
								}
							}else{
								$pass_result=0;
								echo message("warning","exclamation-triangle","Dikkat!","Şifrenizi yanlış girdiniz.");
							}
						}
					?>
					<div class="card card-info">
						<div class="card-header text-center"><h3 class="card-title float-none">Yeni fotoğraf ekleme</h3></div>
						<div class="mt-3 mr-3"><span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span></div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label class="mandatory_field">Fotoğraf</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group"><div class="custom-file"><input type="file" name="photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
									<small class="text-muted">Genişlik :&nbsp;&nbsp;570&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;450</small>
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
						message("danger","ban","Dikkat!","Buraya girmeye yetkiniz yoktur. Lütfen bekleyiniz ana sayfaya yönlendirliyorsunuz");
						_header("");
					}
				?>
			</div>
		</div>
	</div>
</div>
