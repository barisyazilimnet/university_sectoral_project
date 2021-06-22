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
				<?php 
					if(in_array("admin_user_transactions", explode(",", $active_query_user["pages"]))){ 
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }
							$limit=10;
							$start_from = ($page-1) * $limit+1;
							$query = mysqli_query($con, "SELECT admin_users.*, user_authorization.name, user_authorization.authorization_color FROM admin_users LEFT JOIN user_authorization ON admin_users.authorization_id=user_authorization.authorization_id LIMIT $start_from, $limit");
							$query_number = mysqli_affected_rows($con);
							$query_number_records = mysqli_num_rows(mysqli_query($con, "SELECT * FROM admin_users LEFT JOIN user_authorization ON admin_users.authorization_id=user_authorization.authorization_id"))-1;  //kayıt sayısı
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
							<div class="card-header text-center"><h3 class="card-title float-none">Üye işlemleri</h3></div>
							<div class="card-body table-responsive p-0">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th>#</th>
											<th>İsim soyisim</th>
											<th>Kullanıcı adı</th>
											<th>Email</th>
											<th>Telefon numarası</th>
											<th>Durum</th>
											<th>Yetki</th>
											<th>Kayıt tarih</th>
											<th>İşlemler</th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($admin_users=mysqli_fetch_array($query)){
												if($admin_users["user_id"]!=1){
													@$j++;
													?>
													<tr>
														<td><?php echo $j+$start_from-1; ?></td>
														<td><?php echo $admin_users["name_surname"]; ?></td>
														<td><?php echo $admin_users["user_name"]; ?></td>
														<td><?php echo $admin_users["email"]; ?></td>
														<td><?php echo $admin_users["phone_number"]; ?></td>
														<td>
															<?php 
																if($admin_users["status"]){
																	echo"<span class='badge badge-pill badge-success'>Onaylı</span>";
																}else{
																	echo"<span class='badge badge-pill badge-danger'>Onaylı değil</span>";
																} 
															?>
														</td>
														<td>
															<?php
																if($admin_users["authorization_id"]){
																	$authorization_name=$admin_users["name"];
																	$authorization_color=$admin_users["authorization_color"];
																	echo "<span class='badge badge-pill badge-$authorization_color'>$authorization_name</span>";
																}else{
																	echo "Kullanıcıya herhangi <br /> bir yetki verilmemiştir.";
																}
															?>
														</td>
														<td><?php echo _date($admin_users["registration_date"],true); ?></td>
														<td class=" text-nowrap">
															<?php if($admin_users["user_id"]==$active_user_id){ ?>
																<a href="administrator.php?do=profile"><button class="btn btn-info mr-3"><i class="fas fa-user-alt"></i>  &nbsp;&nbsp;Profilim</button></a>
															<?php }else{ ?>
																<a href="administrator.php?do=admin_user_edit&id=<?php echo $admin_users["user_id"]; ?>"><button class="btn btn-info mr-3"><i class="far fa-edit"></i>  Düzenle</button></a>
																<a onClick="return del();" href="administrator.php?do=admin_user_delete&id=<?php echo $admin_users["user_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i> Sil</button></a>
															<?php } ?>
														</td>
													</tr>
										<?php } } ?>
									</tbody>
								</table>
								<div class="col-md-12 text-center my-3">
									<?php echo'<span class="float-left mt-3">'.$baslangic.' - '.$end.' / '.$query_number_records.' gösteriliyor</span>'; ?>
									<div class="btn-group">
										<?php   if($page!=1){
													echo'<a type="button" class="btn btn-info" href="administrator.php?do=admin_user_transactions&page=1"><i class="fa fa-fast-backward"></i></a>';
												}
												for ($i=1; $i<=$total_pages; $i++){
													echo'<a type="button" class="btn btn-info" href="administrator.php?do=admin_user_transactions&page='.$i.'">'.$i.'</a>';
												}
												if($page!=$total_pages){
													echo'<a type="button" class="btn btn-info" href="administrator.php?do=admin_user_transactions&page='.$total_pages.'"><i class="fa fa-fast-forward"></i></a>';
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
