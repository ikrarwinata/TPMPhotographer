<section class="w3l-banner-slider-main inner-pagehny">
	<div class="breadcrumb-infhny">

		<div class="top-header-content">

			<header class="tophny-header">
				<div class="container-fluid">
					<div class="top-right-strip row">
						<!--/left-->
						<div class="top-hny-left-content col-lg-6 pl-lg-0">

						</div>
						<!--//left-->
						<!--/right-->
						<ul class="top-hnt-right-content col-lg-6">
							<?php if ($this->session->userdata("level") == NULL) : ?>
								<li class="button-log usernhy">
									<a class="btn-open" href="#" onclick="return false">
										<span class="fa fa-user" aria-hidden="true"></span>
									</a>
								</li>
							<?php elseif ($this->session->userdata("level") == "user") : ?>
								<?php $t = $this->db->where("username", $this->session->userdata("username"))->where("id_transaksi IS NULL", NULL, FALSE)->from("booking")->count_all_results(); ?>
								<li class="">
									<a class="btn-open" href="Home/cart">
										<span class="fa fa-shopping-cart" aria-hidden="true"></span>
										<?php if ($t >= 1) : ?>
											&nbsp; <span class="badge badge-warning"><small>1</small></span>
										<?php endif; ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
						<!--//right-->
						<div class="overlay-login text-left">
							<button type="button" class="overlay-close1">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
							<div class="wrap">
								<h5 class="text-center mb-4">Login</h5>
								<div class="login-bghny p-md-5 p-4 mx-auto mw-100">
									<!--/login-form-->
									<form action="Home/login" method="post">
										<div class="form-group">
											<p class="login-texthny mb-2">Username</p>
											<input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">

										</div>
										<div class="form-group">
											<p class="login-texthny mb-2">Password</p>
											<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="" required="">
										</div>
										<div class="form-check mb-2">
											<div class="userhny-check">
												<label class="check-remember container">
													<input type="checkbox" class="form-check"> <span class="checkmark"></span>
													<p class="privacy-policy">Remember me</p>
												</label>
												<div class="clearfix"></div>
											</div>
										</div>
										<button type="submit" class="submit-login btn mb-4">Login</button>

									</form>
									<!--//login-form-->
								</div>
								<!---->
							</div>
						</div>
					</div>
				</div>
				<!--/nav-->
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container-fluid serarc-fluid">
						<a class="navbar-brand" href="index.html">
							TPM <span class="lohny">P</span>hotography</a>
						<!-- if logo is image enable this   
                    <a class="navbar-brand" href="#index.html">
                      <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                    </a> -->
						<!--/search-right-->
						<div class="search-right">

							<!-- search popup -->

							<!-- /search popup -->
						</div>
						<!--//search-right-->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon fa fa-bars"> </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="home">Beranda</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="Home/help">Bantuan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="Home/about">Tentang</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="Home/gallery">Gallery</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="Home/product">Produk</a>
								</li>
								<?php if ($this->session->userdata("level") == "user") : ?>
									<li class="nav-item">
										<a class="nav-link" href="Home/profil">Profil Saya</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="Home/logout" title="<?php echo ($this->session->userdata('nama')) ?>">Logout</a>
									</li>
								<?php else : ?>
									<li class="nav-item">
										<a class="nav-link" href="Home/register">Daftar</a>
									</li>
								<?php endif; ?>
							</ul>

						</div>
					</div>
				</nav>
				<!--//nav-->
			</header>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center"><?php echo ($judul) ?></h2>
						<ol class="breadcrumb mb-0">
							<li><a href="home">Beranda</a>
								<span class="fa fa-angle-double-right"></span>
							</li>
							<li class="active"><?php echo $konten ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
</section>