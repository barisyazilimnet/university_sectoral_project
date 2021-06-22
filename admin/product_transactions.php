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
				<?php 
					if(in_array("product_transactions", explode(",", $active_query_user["pages"]))){ 
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
							$limit=10;
							$start_from = ($page-1) * $limit;
							$query = mysqli_query($con, "SELECT products.*, categories.name FROM products JOIN categories ON products.category_id=categories.category_id LIMIT $start_from, $limit");
							$query_number = mysqli_affected_rows($con);
							$query_number_records = mysqli_num_rows(mysqli_query($con, "SELECT products.*, categories.name FROM products JOIN categories ON products.category_id=categories.category_id"));  //kayıt sayısı
							$total_pages = ceil($query_number_records / $limit);
							if($page==1){
								$baslangic=1;
								if($limit>$query_number_records){
									$end=$query_number_records;
								}else{
									$end=$limit;
								}
							}else{
								$baslangic=1;
								for($i=1; $i<$page; $i++){
									$baslangic+=$limit;
								}
								if($page==$total_pages){
									if($limit>=$query_number){
										$end=$query_number_records;
									}
								}else{
									if($limit>$query_number_records){
										$end=$query_number_records;
									}else{
										$end=$page*$limit;
									}
								}
							}
						?>
						<div class="card card-info">
							<div class="card-header text-center"><h3 class="card-title float-none">Ürün işlemleri</h3></div>
							<div class="card-body table-responsive p-0">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th>#</th>
											<th>Kategori adı</th>
											<th>Ürün adı</th>
											<th>Fiyatı</th>
											<th>Fotografı</th>
											<th>Tarih</th>
											<th>İşlemler</th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($products=mysqli_fetch_array($query)){
													@$j++;
													?>
													<tr>
														<td><?php echo $j; ?></td>
														<td><?php echo $products["name"]; ?></td>
														<td><?php echo $products["p_name"]; ?></td>
														<td><?php echo $products["p_price"]; ?></td>
														<td><a href="<?php echo URL; ?>uploads/products/<?php echo $products["p_photo"]; ?>" target="_blank"><img src="<?php echo URL; ?>uploads/products/<?php echo $products["p_photo"]; ?>" alt="<?php echo $products["p_photo"]; ?>" width="50px" height="50px" style="border-radius: 50% 50%;"></a></td>
														<td><?php echo _date($products["p_datetime"],true); ?></td>
														<td class="text-nowrap">
															<a href="administrator.php?do=product_edit&id=<?php echo $products["id"]; ?>"><button class="btn btn-info mr-3"><i class="far fa-edit"></i>  Düzenle</button></a>
															<a onClick="return del();" href="administrator.php?do=product_delete&id=<?php echo $products["id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i> Sil</button></a>
														</td>
													</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="col-md-12 text-center my-3">
									<?php echo'<span class="float-left mt-3">'.$baslangic.' - '.$end.' / '.$query_number_records.' gösteriliyor</span>'; ?>
									<div class="btn-group">
										<?php   if($page!=1){
													echo'<a type="button" class="btn btn-info" href="administrator.php?do=product_transactions&page=1"><i class="fa fa-fast-backward"></i></a>';
												}
												for ($i=1; $i<=$total_pages; $i++){
													echo'<a type="button" class="btn btn-info" href="administrator.php?do=product_transactions&page='.$i.'">'.$i.'</a>';
												}
												if($page!=$total_pages){
													echo'<a type="button" class="btn btn-info" href="administrator.php?do=product_transactions&page='.$total_pages.'"><i class="fa fa-fast-forward"></i></a>';
												}
										?>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
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
