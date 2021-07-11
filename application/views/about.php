<section class="w3l-wecome-content-6">
	<!-- /content-6-section -->
	  <div class="ab-content-6-mian py-5">
			 <div class="container py-lg-5">
					<div class="welcome-grids row">
							<div class="col-lg-6 mb-lg-0 mb-5">
									<h3 class="hny-title">
											TPM <span>P</span>hotography</h3>
								<p class="my-4"><?php echo $this->db->where('namafield','tentang')->get('perusahaan')->row()->nilai; ?></p>
								<div class="read">
									<a href="Home/product" class="read-more btn">Lihat Pilihan Paket</a>
								</div>
							</div>
							<div class="col-lg-6 welcome-image">
								<img src="files/misc/about.jpg" class="img-fluid" alt="" />
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
						<p><?php echo $this->db->where('namafield','alamat_perusahaan')->get('perusahaan')->row()->nilai; ?></p>
					</div>
					<div class="col-md-6 w3-icon-grid1">
						<a href="#">
							<span class="fa fa-mobile" aria-hidden="true"></span>
							<h3>Phone</h3>
							<div class="clearfix"></div>
						</a>
						<p><?php echo $this->db->where('namafield','telepon')->get('perusahaan')->row()->nilai; ?></p>
					</div>
					<div class="col-md-6 w3-icon-grid1">
						<a href="#">
							<span class="fa fa-whatsapp" aria-hidden="true"></span>
							<h3>Whatsapp</h3>
							<div class="clearfix"></div>
						</a>
						<p><?php echo $this->db->where('namafield','whatsapp1')->get('perusahaan')->row()->nilai; ?></p>
					</div>
					<div class="col-md-6 w3-icon-grid1">
						<a href="#">
							<span class="fa fa-whatsapp" aria-hidden="true"></span>
							<h3>Whatsapp</h3>
							<div class="clearfix"></div>
						</a>
						<p><?php echo $this->db->where('namafield','whatsapp2')->get('perusahaan')->row()->nilai; ?></p>
					</div>
										
					
				</div>
		</div>
	</div>
</section>