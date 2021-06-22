<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Üyeler</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php if(in_array("chef_transactions", explode(",", $active_query_user["pages"]))){
						$id = $_GET["id"];
						$query=mysqli_fetch_array(mysqli_query($con,"SELECT chef_name_surname,chef_photo FROM chefs WHERE chef_id='$id'"));
						$name = $query["chef_name_surname"];
						$query_delete =mysqli_query($con, "DELETE FROM chefs WHERE chef_id ='$id'");
						if($query_delete){
							if($query["chef_photo"]){
								unlink("../uploads/chefs/".$query["chef_photo"]);
							}
							system_archives($con, "$name isimli şef silindi", "Şef Silindi", $active_user_id);
							echo message("success","check","Başarılı","Seçilen şef başarıyla silinmiştir. Lütfen bekleyiniz");
							_header("chef_transactions");
						}else{
							echo message("warning","exclamation-triangle","Dikkat!","Seçilen şef silinememiştir.");
							_header("chef_transactions");
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