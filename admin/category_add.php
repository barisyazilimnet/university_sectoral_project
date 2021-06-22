<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Kategori ekleme</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					if(in_array("category_transactions", explode(",", $active_query_user["pages"]))){
						if($_POST){
							$name=p("name","mb_convert_case");
							$homepage_visibility=$_POST["homepage_visibility"];
							$category_order=0;
							$password=p("password","pass");
							if($homepage_visibility){
								$category_order=$_POST["category_order"];
								$background=upload_add($_FILES["background"]["tmp_name"],$_FILES["background"]["name"],str_replace(" ","_",$_POST["name"])."_background_","site/homepage/category/",
														message("warning","exclamation-triangle","Dikkat!","Arkaplan fotoğrafı yüklenemedi."),
														message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun arkaplan fotoğrafı ekleyiniz."),"");
							}
							if($password == $active_query_user["password"]){
								$logo=upload_add($_FILES["logo"]["tmp_name"],$_FILES["logo"]["name"],str_replace(" ","_",$_POST["name"])."_logo_","site/category/",
														message("warning","exclamation-triangle","Dikkat!","Kategori logosu yüklenemedi."),
														message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun logo ekleyiniz."),"");
								if($logo){
									if(@$background or $homepage_visibility==0){
										@$query=mysqli_query($con, "INSERT INTO categories SET name='$name', homepage_visibility='$homepage_visibility', background='$background', logo='$logo', category_order='$category_order', user_id='$active_user_id'");
										if($query){
											system_archives($con, "$name isimli kategori eklendi", "Kategori Eklendi", $active_user_id);
											echo message("success","check","Başarılı","$name isimli kategori eklendi");
											_header("category_transactions");
										}else{
											echo message("warning","exclamation-triangle","Dikkat!","Kategori eklenemedi");
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
						<div class="card-header text-center"><h3 class="card-title float-none">Kategori ekleme</h3></div>
						<div class="mt-3 mr-3">
							<span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span>
						</div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label class="mandatory_field">Kategori adı</label>
									<input type="text" class="form-control form-control-border border-width-2" name="name" placeholder="Kategori adı..." title="Kategori adı giriniz" value="<?php if($_POST){ echo $name; } ?>" required>
								</div>
								<div class="form-group">
									<label class="mandatory_field">Anasayfada gözüksün mü</label><br />
									<input type="radio" name="homepage_visibility" value="1" onChange="visibility1();" <?php if($_POST){ if($homepage_visibility){ echo "checked"; } } ?>>&nbsp;&nbsp;Evet
									<input class="ml-2" type="radio" name="homepage_visibility" value="0" onChange="visibility2();" <?php if($_POST){ if($homepage_visibility==0){ echo "checked"; } }else{ echo "checked"; } ?>>&nbsp;&nbsp;Hayır
								</div>
								<div class="form-group homepage_visibility" style="<?php if($_POST){ if($homepage_visibility==1){ echo 'display: block;'; }else{ echo 'display: none;'; } }else{ echo 'display: none;'; } ?>" >
									<label class="mandatory_field">Arkaplan fotoğrafı</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="background" title="Arkaplan resmi ekleyiniz" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label>
										</div>
									</div>
									<small class="text-muted">Genişlik :&nbsp;&nbsp;570&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;388</small>
								</div>
								<div class="form-group homepage_visibility" style="<?php if($_POST){ if($homepage_visibility==1){ echo 'display: block;'; }else{ echo 'display: none;'; } }else{ echo 'display: none;'; } ?>" >
									<label class="mandatory_field">Anasayfadaki sırası</label>
									<select class="form-control" name="category_order">
										<option value="1" <?php if($_POST){ if($category_order==1){ echo "selected"; } } ?>>1</option>
										<option value="2" <?php if($_POST){ if($category_order==2){ echo "selected"; } } ?>>2</option>
										<option value="3" <?php if($_POST){ if($category_order==3){ echo "selected"; } } ?>>3</option>
										<option value="4" <?php if($_POST){ if($category_order==4){ echo "selected"; } } ?>>4</option>
									</select>
								</div>
								<div class="form-group">
									<label class="mandatory_field">Logo</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="logo" title="Logo ekleyiniz" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label>
										</div>
									</div>
									<small class="text-muted">Genişlik :&nbsp;&nbsp;24&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;24</small>
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