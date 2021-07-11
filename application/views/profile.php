<div class="row">
	<div class="col-lg-12 col-12 col-md-12">
		<section class="w3l-ecommerce-main">
			<!-- /products-->
			<div class="ecom-contenthny py-12">
				<div class="container py-lg-12">
					<h3 class="hny-title mb-0 text-center">Profile</h3>

					<form action="<?php echo (base_url('Home/profile_action')) ?>" method="POST" onsubmit="return validate_register()">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="nik">Nomor Tanda Pengenal :</label> <br> <small class="text-danger"><?php echo $this->session->flashdata('register_id') <> '' ? $this->session->flashdata('register_id') : ''; ?></small>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									<input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Tanda Pengenal (Misal KTP / Kartu Pelajar)" value="<?php echo ($id) ?>" disabled required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="nama">Nama Lengkap :</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap anda" value="<?php echo ($nama) ?>" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="tempat_lahir">Tempat & Tanggal Lahir :</label>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo ($tempat_lahir) ?>" required>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo ($tanggal_lahir) ?>" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="tempat_lahir">Jenis Kelamin :</label>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
									<input type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="Pria" <?php echo ($jenis_kelamin == "Pria" ? 'checked' : NULL) ?> required>&nbsp;<label for="jenis_kelamin_pria">Pria</label>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
									<input type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="Wanita" <?php echo ($jenis_kelamin == "Wanita" ? 'checked' : NULL) ?> required>&nbsp;<label for="jenis_kelamin_wanita">Wanita</label>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5" style="padding-top: 5px;">
									<input type="tel" class="form-control" name="hp" id="hp" placeholder="Nomor HP yang dapat dihubungi" value="<?php echo ($hp) ?>" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="alamat">Alamat :</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									<textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat anda" value="<?php echo ($alamat) ?>" required><?php echo ($alamat) ?></textarea>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="alamat">Username :</label> <br> <small class="text-danger"><?php echo $this->session->flashdata('register_username') <> '' ? $this->session->flashdata('register_username') : ''; ?></small>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									<input type="text" class="form-control" name="username" id="username" placeholder="Username baru" value="<?php echo ($username) ?>" disabled required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right" style="padding-top: 5px;">
									<label for="tempat_lahir">Password baru:</label>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<input type="password" class="form-control" name="password" id="password" placeholder="Password baru" value="<?php echo ($password) ?>">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi password baru" value="<?php echo ($password) ?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 text-right">
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 text-right">
									<button type="submit" class="btn btn-md btn-success">Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- //products-->
		<hr>
	</div>
</div>