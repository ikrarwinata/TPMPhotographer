<div class="row">
	<div class="col-lg-2 col-2 col-md-2">
		<div class="ecom-contenthny py-5">
			<div class="container py-lg-5" style="background-color: #ebedf0;border-radius: 18px;">
				<p>Kategori</p>
				<ul style="list-style: none">
					<a href="Home/product"><li><small>Tampilkan Semua</small></li></a>
					<hr>
					<?php foreach ($kategori_data as $key => $value): ?>
					<a href="Home/kategori/<?php echo $value->id ?>"><li><small><?php echo $value->kategori ?></small></li></a>
					<hr>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-10 col-10 col-md-10">
		<!-- //video-6-->
		<section class="w3l-ecommerce-main">
			<!-- /products-->
			<div class="ecom-contenthny py-5">
				<div class="container py-lg-5">
					<h3 class="hny-title mb-0 text-center">Paket <span>Produk</span></h3>
					<p class="text-center">Menampilkan <?php echo $q==NULL?"semua paket produk":$q; ?></p>
					<p class="text-center"><?php echo (isset($kategori)?$kategori:NULL) ?></p>
					<!-- /row-->
					<div class="ecom-products-grids row mt-lg-5 mt-3">
						<?php foreach ($produk_data as $key => $row): ?>
							<div class="col-lg-3 col-6 product-incfhny mt-4">
								<div class="product-grid2 transmitv">
									<div class="product-image2">
										<a href="Home/product_detail/<?php echo $row->id ?>">
											<img class="pic-1 img-fluid" src="<?php echo $row->gambar ?>" style="height: 260px; width: 250px">
											<img class="pic-2 img-fluid" src="<?php echo $row->gambar ?>" style="height: 260px; width: 250px">
										</a>
										<ul class="social">
												<li><a href="Home/product_detail/<?php echo $row->id ?>" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>
										</ul>
									</div>
									<div class="product-content">
										<h3 class="title"><a href="Home/product_detail/<?php echo $row->id ?>"><?php echo $row->judul ?> </a></h3>
										<span class="price">Rp.<?php echo number_format($row->harga,0) ?></span>
									</div>
								</div>
							</div>
						<?php endforeach ?>						
						
					</div>
					<!-- //row-->
				</div>
			</div>
		</section>
		<!-- //products-->

		<div class="row">
            <div class="col-md-6">
                Produk Tersedia : <?php echo $total_rows ?>
        	</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <hr>
	</div>
</div>
		