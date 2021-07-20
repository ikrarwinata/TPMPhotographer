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
										<tr data-id="<?php echo ($value->id) ?>">
											<td><?php echo ($c++) ?></td>
											<td><?php echo ($value->judul) ?></td>
											<td><?php echo (date("d M Y H:i", $value->tanggal)) ?></td>
											<td class="text-center">Rp. <?php echo (format_number($value->harga));
																		$t += $value->harga; ?></td>
											<td class="text-center"><?php echo ($value->status) ?></td>
											<td>
												<?php if (isset($value->DP) && ($value->DP > 0) && isset($value->bukti_pembayaran)) : ?>
													<a href="<?php echo (base_url($value->bukti_pembayaran)) ?>" class="btn btn-success btn-sm">Lihat Bukti Pembayaran</a>
												<?php else : ?>
													<button class="btn btn-warning btn-sm btn-bayar">Bayar</button>
												<?php endif; ?>
												<a href="Home/cart_remove/<?php echo ($value->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin membatalkan pesanan ini ?')"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
										<tr id="<?php echo ($value->id) ?>" class="d-none">
											<td colspan="6">
												<div class="row">
													<?php echo (form_open_multipart('Home/bayar/' . urlencode($value->id), 'class="form-inline" style="width:100%"')) ?>
													<div class="col-3 col-lg-3 text-center">
														Lakukan transfer uang muka <br>
														ke Rek <strong>BCA</strong>:
														894612387321010
													</div>
													<div class="col-4 col-lg-4 text-center">
														<input type="number" min="0" name="n" class="form-control" value="" placeholder="Masukan nilai transfer (misal: 20000)" required>
													</div>
													<div class="col-3 col-lg-3 text-center">
														<input type="file" name="b" class="form-control" title="Bukti Pembayaran" required>
													</div>
													<div class="col-2 col-lg-2 text-center">
														<button class="btn btn-success btn-sm form-control">Simpan</button>
													</div>
													</form>
												</div>
												<hr>
											</td>
										</tr>
									<?php endforeach; ?>
								</thead>
								<tfoot>
									<tr>
										<th colspan="3" class="text-center">Total</th>
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