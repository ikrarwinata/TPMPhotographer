<section class="w3l-wecome-content-6">
	<!-- /content-6-section -->
	<div class="ab-content-6-mian py-5">
		<div class="container py-lg-5">
			<div class="welcome-grids row">
				<div class="col-lg-6 mb-lg-0 mb-5">
					<h2 class="hny-title">1. Pendaftaran Akun</h2>
					<p class="my-4">
						Anda diharuskan memiliki akun untuk melakukan booking. Anda dapat mendaftar akun baru di halaman <a href="Home/register">Daftar</a>. Isikan data diri dan kontak anda dengan benar agar dapat kami hubungi untuk informasi selanjutnya.
					</p>
					<p class="my-4">
						Jika anda sudah memiliki akun, silahkan login dari tombol di <a href="" class="btn-open" onclick="return false"><strong>sudut kanan atas <i class="fa fa-user-circle"></i></strong></a>
					</p>
				</div>
				<div class="col-lg-6 welcome-image">
					<img src="assets/info/1.png" class="img-fluid" alt="" />
				</div>

			</div>

		</div>
	</div>
	<div class="ab-content-6-mian py-5">
		<div class="container py-lg-5">
			<div class="welcome-grids row">
				<div class="col-lg-6 welcome-image">
					<img src="assets/info/2.png" class="img-fluid" alt="" />
				</div>
				<div class="col-lg-6 mb-lg-0 mb-5">
					<h2 class="hny-title">2. Melakukan Booking</h2>
					<p class="my-4">
						Pastikan anda sudah login menggunakan akun anda.
					</p>
					<p class="my-4">
						Pilih produk yang ingin anda booking dari halaman <a href="Home/product">Produk</a>, kemudian pilih <button type="button" class="btn btn-md btn-warning">Booking Sekarang</button>, tentukan tanggal dan waktu anda.
					</p>
				</div>
			</div>

		</div>
	</div>
	<div class="ab-content-6-mian py-5">
		<div class="container py-lg-5">
			<div class="welcome-grids row">
				<div class="col-lg-6 mb-lg-0 mb-5">
					<h2 class="hny-title">3. Tunggu Konfirmasi</h2>
					<p class="my-4">
						Data pesanan anda akan tampil di menu keranjang anda. Hanya pesanan yang <strong>Belum dibayar</strong>, <strong>Belum dikonfirmasi</strong>, dan Pesanan yang <strong>Belum selesai</strong> yang akan ditampilkan.
					</p>
					<?php
					$wa = NULL;
					$wa1 = $this->db->where('namafield', 'whatsapp1')->get('perusahaan')->row();
					$wa2 = $this->db->where('namafield', 'whatsapp2')->get('perusahaan')->row();
					if (isset($wa2->nilai) && $wa2->nilai != NULL) {
						$wa = $wa2->nilai;
					} else if (isset($wa1->nilai) && $wa1->nilai != NULL) {
						$wa = $wa1->nilai;
					}
					if ($wa != NULL) :
						if (substr($wa, 0, 1) == "0") {
							$wa = "62" . substr($wa, 1);
						} else if (substr($wa, 0, 1) == "+") {
							$wa = substr($wa, 1);
						};
						$wa = str_replace(" ", "", $wa);
						$wa = str_replace("-", "", $wa);
					endif;
					?>
					<p class="my-4">
						Tim kami akan memproses dan menghubungi anda dari kontak yang telah anda daftarkan. Jika terdapat masalah anda dapat menghubungi tim Kami melalui <a href="https://api.whatsapp.com/send?phone=<?php echo ($wa) ?>&text=<?php echo (urlencode('Hai TPM Photography, apakah saya bisa melakukan booking ?')) ?>&source=&data=">
							Whatsapp
						</a>
					</p>
				</div>
				<div class="col-lg-6 welcome-image">
					<img src="assets/info/3.png" class="img-fluid" alt="" />
				</div>

			</div>

		</div>
	</div>
</section>
<!-- //content-6-section -->

<section class="w3l-services-6">
	<!-- /content-6-section -->
	<div class="services-grids-6 py-5">
		<div class="container py-lg-5">
			<div class="row w3-icon-grid-gap1">
				<div class="col-md-6 w3-icon-grid1">
					<a href="#">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
						<h3>Alamat</h3>
						<div class="clearfix"></div>
					</a>
					<p><?php echo $this->db->where('namafield', 'alamat_perusahaan')->get('perusahaan')->row()->nilai; ?></p>
				</div>
				<div class="col-md-6 w3-icon-grid1">
					<a href="#">
						<span class="fa fa-mobile" aria-hidden="true"></span>
						<h3>Phone</h3>
						<div class="clearfix"></div>
					</a>
					<p><?php echo $this->db->where('namafield', 'telepon')->get('perusahaan')->row()->nilai; ?></p>
				</div>
				<div class="col-md-6 w3-icon-grid1">
					<a href="#">
						<span class="fa fa-whatsapp" aria-hidden="true"></span>
						<h3>Whatsapp</h3>
						<div class="clearfix"></div>
					</a>
					<p><?php echo $this->db->where('namafield', 'whatsapp1')->get('perusahaan')->row()->nilai; ?></p>
				</div>
				<div class="col-md-6 w3-icon-grid1">
					<a href="#">
						<span class="fa fa-whatsapp" aria-hidden="true"></span>
						<h3>Whatsapp</h3>
						<div class="clearfix"></div>
					</a>
					<p><?php echo $this->db->where('namafield', 'whatsapp2')->get('perusahaan')->row()->nilai; ?></p>
				</div>


			</div>
		</div>
	</div>
</section>