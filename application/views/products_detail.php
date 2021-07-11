<div class="row">
	<div class="col-lg-12 col-12 col-md-12">
		<!-- //video-6-->
		<section class="w3l-ecommerce-main">
			<!-- /products-->
			<div class="ecom-contenthny py-5">
				<div class="container py-lg-5">
					<h3 class="hny-title mb-0 text-center">Detail <span>Paket Produk</span></h3>
				</div>
			</div>
		</section>
		<!-- //products-->
	</div>

	<div class="col-lg-5 col-5 col-md-5">
		<div class="ecom-contenthny py-5">
			<div class="container py-lg-5">
				<div class="ecom-products-grids row " style="background-color: #ebedf0;border-radius: 18px; margin-left: 8px">
					<div class="flexslider">
						<ul class="slides">
							<?php foreach ($gambar_data as $key => $value) : ?>
								<li data-thumb="<?php echo $value->gambar ?>">
									<div class="thumb-image">
										<img src="<?php echo $value->gambar ?>" data-imagezoom="true" class="img-responsive" alt="">
									</div>
								</li>
							<?php endforeach ?>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-7 col-7 col-md-7">
		<!-- //video-6-->
		<section class="w3l-ecommerce-main">
			<!-- /products-->
			<div class="ecom-contenthny py-5">
				<div class="container py-lg-5">
					<!-- /row-->
					<div class="ecom-products-grids row">
						<h3 style="margin:auto !important;"><strong><?php echo $produk_data->judul ?></strong></h3>
					</div>
					<div class="card">
						<div class="card-body" style="background-color: #ebe8e8;height: 45px;">
							<p style="margin-bottom: 0px !important;color:#dc143c;font-size: 24px;margin-top: -15px;"><strong>Rp <?php echo format_number($produk_data->harga) ?></strong></p>
						</div>
					</div>
					<table>
						<tr>
							<th style="width: 100px;height: 80px;"><strong>Kategori</strong></th>
							<td><a href="Home/kategori/<?php echo $kategori->id ?>"><i class="fa fa-hand-o-right"></i>&nbsp;<?php echo $produk_data->kategori ?></a></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><code><?php echo $produk_data->deskripsi ?></code></td>
						</tr>
					</table>
					<?php if ($this->session->userdata("level") == "user") : ?>
						<div class="ecom-products-grids row mt-5">
							<button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#modalBooking" style="margin: auto !important;"><i class="fa fa-shopping-cart"></i>&nbsp;Booking Sekarang</button>
						</div>
					<?php endif; ?>
					<!-- //row-->
				</div>
			</div>
		</section>
		<!-- //products-->
	</div>
</div>
<div class="modal fade" id="modalBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalBookingTitle">Selesaikan Pesanan Anda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="Home/booking" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 text-right" style="padding-top: 5px;">
								<label for="nama">Nama Paket :</label>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								<input type="hidden" name="id" value="<?php echo ($produk_data->id) ?>">
								<input type="text" name="nama" class="form-control" disabled value="<?php echo ($produk_data->judul) ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 text-right" style="padding-top: 5px;">
								<label for="tanggal">Tanggal & Jam :</label>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								<div class="input-group date" id="reservationdatetime" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="tanggal" />
									<div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-book"></i>&nbsp;Booking</button>
				</div>
			</form>
		</div>
	</div>
</div>