
<!-- //w3l-banner-slider-main -->
<section class="w3l-grids-hny-2">
	<!-- /content-6-section -->
	<div class="grids-hny-2-mian py-5">
		<div class="container py-lg-5">
				
			<a href="Home/product"><h3 class="hny-title mb-0 text-center">Pilihan <span>Paket</span></h3></a>
			<p class="mb-4 text-center">Pilihan paket dari kami</p>
			<div class="welcome-grids row mt-5">
				<?php foreach ($produk_data as $key => $value): ?>
					<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
								<a href="Home/product_detail/<?php echo $value->id ?>">
										<img src="<?php echo $value->gambar ?>" class="img-fluid" alt="" style="height: 150px; width: 150px"/>
								<div class="boxhny-content">
									<h6 class="title">Lihat
								</div>
							</a>
						</div>
						<h4><a href="Home/product_detail/<?php echo $value->id ?>"><?php echo $value->judul ?></a></h4>

					</div>
				<?php endforeach ?>
								
			</div>

		</div>
	</div>
</section>
<!-- //content-6-section -->

<section class="w3l-content-w-photo-6">
	<!-- /specification-6-->
  <?php foreach ($news as $key => $row): ?>
  	<div class="content-photo-6-mian py-5">
	 <div class="container py-lg-5">
			<div class="align-photo-6-inf-cols row">
				
				<div class="photo-6-inf-right col-lg-6">
						<?php echo $row->judul ?>
						<?php echo $row->konten ?>
				</div>
				<div class="photo-6-inf-left col-lg-6">
						<img src="<?php echo $row->gambar ?>" class="img-fluid" alt="">
				</div>
			</div>
		 </div>
	 </div>
  <?php endforeach ?>
 </section>
   <!-- //specification-6-->
     

<!-- //products-->
<section class="w3l-content-5">
	<!-- /content-6-section -->
	<div class="content-5-main">
		<div class="container">
			<div class="content-info-in row">
				<div class="content-gd col-md-6 offset-lg-3 text-center">
					<div style="color: white">
						<?php echo $this->db->where('namafield','judul_teks_depan')->get('perusahaan')->row()->nilai; ?>
					</div>
					<?php echo $this->db->where('namafield','isi_teks_depan')->get('perusahaan')->row()->nilai; ?>
				</div>

			</div>

		</div>
	</div>
</section>
<!-- //content-6-section -->
<section class="w3l-post-grids-6">
	<!-- /post-grids-->
	<div class="post-6-mian py-5">
		<div class="container py-lg-5">
				<a href="Home/gallery"><h3 class="hny-title text-center mb-0 "><span>Gallery</span></h3></a>
				<p class="mb-5 text-center">Pilihan photo dari kami</p>
			<div class="post-hny-grids row mt-5">
				<?php foreach ($gallery as $key => $value): ?>
					<div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
						<a href="<?php echo $value->gambar ?>" data-lightbox="example-set" data-title="Klik di tepi gambar untuk melihat gambar sebelum/selanjutnya">
							<figure>
								<img class="img-fluid" src="<?php echo $value->gambar ?>" alt="blog-image" style="height: 240px;width: 260px">
							</figure>
						</a>

						<div class="blog-thumbhny-caption">
							<ul class="blog-info-list">
								<li><a href="#admin"><small>By Admin</small></a></li>
								<li class="date-post">
									<?php $d = format_date(date("d-m-Y", $value->timestamps));echo get_day($d)." ".get_str_month(date('m'))." ".get_year($d); ?></li>
							</ul>
							<h4><a href="#" onclick="return false"><?php echo $value->judul ?></a></h4>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>
<!-- //post-grids-->