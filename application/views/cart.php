<div class="row">
	<div class="col-lg-12 col-12 col-md-12">
		<section class="w3l-ecommerce-main">
			<!-- /products-->
			<div class="ecom-contenthny py-12">
				<div class="container py-lg-12">
					<h3 class="hny-title mb-0 text-center">Keranjang <span>Saya</span></h3>
					<p class="text-center">Silahkan lakukan pembayaran uang muka untuk paket yang anda booking</p>

					<?php if (count($data_cart_belum_bayar) >= 1) : ?>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h3><i class="fa fa-shopping-cart"></i>&nbsp;Belum Dibayar</h3>
							</div>
						</div>

						<hr>

						<div class="table-responsive">
							<table class="table table-hover" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Paket</th>
										<th>Jadwal</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Status</th>
										<th></th>
									</tr>
									<?php $c = 1;
									$t = 0; ?>
									<?php foreach ($data_cart_belum_bayar as $key => $value) : ?>
										<tr>
											<td><?php echo ($c++) ?></td>
											<td><?php echo ($value->judul) ?></td>
											<td><?php echo (date("d M Y H:i", $value->tanggal)) ?></td>
											<td class="text-center">Rp. <?php echo (format_number($value->harga));
																		$t += $value->harga; ?></td>
											<td class="text-center"><?php echo ($value->status) ?></td>
											<td><a href="Home/cart_remove/<?php echo ($value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin membatalkan pesanan ini ?')"><i class="fa fa-trash"></i></a></td>
										</tr>
									<?php endforeach; ?>
								</thead>
								<tfoot>
									<tr>
										<th colspan="4" class="text-center">Total</th>
										<th class="text-center">Rp. <?php echo (format_number($t)) ?></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">

							</div>
						</div>
					<?php else : ?>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h3><i class="fa fa-shopping-cart"></i>&nbsp;Tidak ada pesanan di keranjang anda</h3>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</section>
		<!-- //products-->
		<hr>
	</div>
</div>