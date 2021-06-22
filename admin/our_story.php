<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Bizim hikayemiz</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php
					if(in_array("our_story", explode(",", $active_query_user["pages"]))){
                        $our_story=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM our_story"));
                        if($_POST){
                            $header=p("header","mb_convert_case");
                            $description=p("description","");
                            $password=p("password","pass");
                            if($password == $active_query_user["password"]){
                                $photo=upload_add($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],"our_story_photo_","site/homepage/",
                                                    message("warning","exclamation-triangle","Dikkat!","Fotoğraf yüklenemedi."),
                                                    message("warning","exclamation-triangle","Dikkat!","Lütfen belirtilen uzantılara ( png, jpeg, jpg ) uygun fotoğraf ekleyiniz."),
                                                    "");
                                if($photo){
                                    $query=mysqli_query($con, "UPDATE our_story SET header='$header', description='$description', photo='$photo'");
                                    if($query){
                                        system_archives($con, "Bizim hikayemiz bölümü başarıyla güncellendi", "Anasayfa Güncellendi", $active_user_id);
                                        echo message("success","check","Başarılı","Bizim hikayemiz bölümü bir şekilde güncellendi");
                                        _header("our_story");
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
                        <div class="card-header text-center"><h3 class="card-title float-none">Bizim hikayemiz bölümü</h3></div>
                        <div class="mt-3 mr-3"><span class="float-right">Zorunlu olarak doldurulması gereken alanlar kırmızıyla işaretlenmiştir.</span></div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="mandatory_field">Başlık</label>
                                    <input type="text" class="form-control form-control-border border-width-2" name="header" title="Başlık giriniz" value="<?php if($_POST){ echo $header; }else{ echo $our_story["header"]; } ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="mandatory_field">Açıklama</label>
                                    <textarea name="description" class="form-control" rows="10" title="Açıklama giriniz" required><?php if($_POST){ echo $description; }else{ echo $our_story["description"]; } ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Fotoğraf</label><span class="text-muted"> ( Kabul edilen uzantılar : jpg - png - jpeg )</span>
                                    <div class="input-group"><div class="custom-file"><input type="file" name="photo" class="custom-file-input"><label class="custom-file-label">Dosya seçin...</label></div></div>
                                    <small class="text-muted">Genişlik :&nbsp;&nbsp;585&nbsp;&nbsp;X&nbsp;&nbsp;Yükseklik :&nbsp;&nbsp;405</small>
                                </div>
                                <div class="form-group text-center">
                                    <label class="mandatory_field">Şifreniz</label><span class="text-muted"> ( İşlemi tamamlayabilmek için şifrenizi girmeniz gerekmektedir. )</span>
                                    <input type="password" class="form-control form-control-border border-width-2 <?php input_control($_POST, $pass_result); ?>" id="inputError" name="password" minlength="8" title="İşlemi tamamlayabilmek için kendi şifrenizi giriniz" placeholder="Şifreniz...">
                                </div>
                            </div>
                            <div class="card-footer"><button type="submit" class="btn btn-info float-right">Güncelle</button></div>
                        </form>
                    </div>
                </div>
                <div>
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