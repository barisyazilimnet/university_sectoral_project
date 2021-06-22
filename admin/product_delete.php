<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-md-12 text-center">
		<h1 class="m-0">Ürünler</h1>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php if(in_array("product_transactions", explode(",", $active_query_user["pages"]))){
						$id = $_GET["id"];
						$query=mysqli_fetch_array(mysqli_query($con,"SELECT p_name,p_photo FROM products WHERE id='$id'"));
						$name = $query["p_name"];
						$query_delete =mysqli_query($con, "DELETE FROM products WHERE id ='$id'");
						if($query_delete){
							if($query["p_photo"]){
								unlink("../uploads/products/".$query["p_photo"]);
							}
							system_archives($con, "$name ürünü silindi", "Ürün Silindi", $active_user_id);
							echo message("success","check","Başarılı","Seçilen ürün başarıyla silinmiştir. Lütfen bekleyiniz");
							_header("product_transactions");
						}else{
							echo message("warning","exclamation-triangle","Dikkat!","Seçilen ürün silinememiştir.");
							_header("product_transactions");
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