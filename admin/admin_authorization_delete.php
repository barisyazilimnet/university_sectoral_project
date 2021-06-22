<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Yetkiler</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php 
					if(in_array("admin_authorization", explode(",", $active_query_user["pages"]))){
						if($_GET["id"]!=1){
							$query=mysqli_num_rows(mysqli_query($con,"SELECT * FROM user_authorization"));
							$id = $_GET["id"];
							$name = $_GET["name"];
							$query_delete =mysqli_query($con, "DELETE FROM user_authorization WHERE authorization_id ='$id'");
							if($query_delete){
								if($id==$query){
									mysqli_query($con,"UPDATE admin_users SET authorization_id=$id-1 WHERE authorization_id='$id'");
								}else if($id<$query){
									mysqli_query($con,"UPDATE user_authorization SET authorization_id=authorization_id-1 WHERE authorization_id > $id");
									mysqli_query($con,"UPDATE admin_users SET authorization_id=authorization_id-1 WHERE authorization_id = $query");
								}
								system_archives($con, "$id id li $name yetkisi silindi", "Yetki Silindi", $active_user_id);
								echo message("success","check","Başarılı","Seçilen yetki başarıyla silinmiştir. Lütfen bekleyiniz");
								_header("admin_authorization");
							}else{
								echo message("warning","exclamation-triangle","Dikkat!","Seçilen yetki silinememiştir.");
								_header("admin_authorization");
							}
						}else{
							echo message("danger","ban","Dikkat!","Bu yetki silinemez. Lütfen bekleyiniz yetki işlemleri sayfasına yönlendirliyorsunuz");
							_header("admin_authorization");
						}
					}else{
						echo message("danger","ban","Dikkat!","Buraya girmeye yetkiniz yoktur. Lütfen bekleyiniz ana sayfaya yönlendirliyorsunuz");
						_header("");
					}
				?>
			</div>
		</div>
	</div>
</div>
