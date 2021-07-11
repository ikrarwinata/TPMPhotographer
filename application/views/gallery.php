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