<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-12 text-center">
				<h1 class="m-0">Şefler</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php
				if (in_array("chef_transactions", explode(",", $active_query_user["pages"]))) {
					if (isset($_GET["page"])) {
						$page  = $_GET["page"];
					} else {
						$page = 1;
					}
					$limit = 10;
					$start_from = ($page - 1) * $limit;
					$query = mysqli_query($con, "SELECT * FROM chefs LIMIT $start_from, $limit");
					$query_number = mysqli_affected_rows($con);
					$query_number_records = mysqli_num_rows(mysqli_query($con, "SELECT * FROM chefs"));  //kayıt sayısı
					$total_pages = ceil($query_number_records / $limit);
					if ($page == 1) {
						$baslangic = 1;
						if ($limit > $query_number_records) {
							$end = $query_number_records;
						} else {
							$end = $limit;
						}
					} else {
						$baslangic = 1;
						for ($i = 1; $i < $page; $i++) {
							$baslangic += $limit;
						}
						if ($page == $total_pages) {
							if ($limit >= $query_number) {
								$end = $query_number_records;
							}
						} else {
							if ($limit > $query_number_records) {
								$end = $query_number_records;
							} else {
								$end = $page * $limit;
							}
						}
					}
				?>
					<div class="card card-info">
						<div class="card-header text-center">
							<h3 class="card-title float-none">Şef işlemleri</h3>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-center">
								<thead>
									<tr>
										<th>#</th>
										<th>Fotoğraf</th>
										<th>İsim soyisim</th>
										<th>Ünvan</th>
										<th>Sosyal medya hesapları</th>
										<th>İşlemler</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($chefs = mysqli_fetch_array($query)) {
										@$j++;
									?>
										<tr>
											<td><?php echo $j; ?></td>
											<td><a target="_blank" href="<?php echo URL; ?>uploads/chefs/<?php echo $chefs["chef_photo"]; ?>"><img src="<?php echo URL; ?>uploads/chefs/<?php echo $chefs["chef_photo"]; ?>" alt="Şef fotoğraf" width="50px" height="50px"></a></td>
											<td><?php echo $chefs["chef_name_surname"]; ?></td>
											<td><?php echo $chefs["chef_superscription"]; ?></td>
											<td>
												<a target="_blank" href="<?php echo $chefs['chef_facebook']; ?>" <?php if (empty($chefs["chef_facebook"])) {
																														echo "hidden";
																													} ?>><i class="fab fa-facebook-square"></i></a>&nbsp;
												<a target="_blank" href="<?php echo $chefs['chef_instagram']; ?>" <?php if (empty($chefs["chef_instagram"])) {
																														echo "hidden";
																													} ?>><i class="fab fa-instagram-square"></i></a>&nbsp;
												<a target="_blank" href="<?php echo $chefs['chef_twitter']; ?>" <?php if (empty($chefs["chef_twitter"])) {
																													echo "hidden";
																												} ?>><i class="fab fa-twitter-square"></i></a>&nbsp;
												<a target="_blank" href="<?php echo $chefs['chef_linkedin']; ?>" <?php if (empty($chefs["chef_linkedin"])) {
																														echo "hidden";
																													} ?>><i class="fab fa-linkedin"></i></a>&nbsp;
												<a target="_blank" href="<?php echo $chefs['chef_pinterest']; ?>" <?php if (empty($chefs["chef_pinterest"])) {
																														echo "hidden";
																													} ?>><i class="fab fa-pinterest-square"></i></a>
											</td>
											<td class="text-nowrap">
												<a href="administrator.php?do=chef_edit&id=<?php echo $chefs["chef_id"]; ?>"><button class="btn btn-info mr-3"><i class="far fa-edit"></i> Düzenle</button></a>
												<a onClick="return del();" href="administrator.php?do=chef_delete&id=<?php echo $chefs["chef_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i> Sil</button></a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<div class="col-md-12 text-center my-3">
								<?php echo '<span class="float-left mt-3">' . $baslangic . ' - ' . $end . ' / ' . $query_number_records . ' gösteriliyor</span>'; ?>
								<div class="btn-group">
									<?php if ($page != 1) {
										echo '<a type="button" class="btn btn-info" href="administrator.php?do=chef_transactions&page=1"><i class="fa fa-fast-backward"></i></a>';
									}
									for ($i = 1; $i <= $total_pages; $i++) {
										echo '<a type="button" class="btn btn-info" href="administrator.php?do=chef_transactions&page=' . $i . '">' . $i . '</a>';
									}
									if ($page != $total_pages) {
										echo '<a type="button" class="btn btn-info" href="administrator.php?do=chef_transactions&page=' . $total_pages . '"><i class="fa fa-fast-forward"></i></a>';
									}
									?>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				<?php
				} else {
					echo message("danger", "ban", "Dikkat!", "Buraya girmeye yetkiniz yoktur. Lütfen bekleyiniz ana sayfaya yönlendirliyorsunuz");
					_header("");
				}
				?>
			</div>
		</div>
	</div>
</div>