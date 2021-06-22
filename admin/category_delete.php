<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Kategoriler</h1>
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
						$id = $_GET["id"];
						$query=mysqli_fetch_array(mysqli_query($con,"SELECT name,background FROM categories WHERE category_id='$id'"));
						$query_delete =mysqli_query($con, "DELETE FROM categories WHERE category_id ='$id'");
						if($query_delete){
							if($query["background"]){
								unlink("../uploads/site/homepage/category/".$query["background"]);
							}
							system_archives($con, $query["name"]." kategorisi silindi", "Kategori Silindi", $active_user_id);
							echo message("success","check","Başarılı","Seçilen kategori başarıyla silinmiştir. Lütfen bekleyiniz");
							_header("category_transactions");
						}else{
							echo message("warning","exclamation-triangle","Dikkat!","Seçilen yetki silinememiştir.");
							_header("category_transactions");
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
