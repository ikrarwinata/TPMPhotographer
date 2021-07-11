<section class="w3l-banner-slider-main">
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

						<a href="#search" title="search"><span class="fa fa-search mr-2" aria-hidden="true"></span>
							<span class="search-text"></span></a>
						<!-- search popup -->
						<div id="search" class="pop-overlay">
							<div class="popup">

								<form action="#" method="post" class="search-box">
									<input type="search" placeholder="Kata Kunci" name="search" required="required" autofocus="">
									<button type="submit" class="btn">Cari</button>
								</form>

							</div>
							<a class="close" href="#">×</a>
						</div>
						<!-- /search popup -->
					</div>
					<!--//search-right-->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa fa-bars"> </span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
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
		<div class="bannerhny-content">

			<!--/banner-slider-->
			<div class="content-baner-inf">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="container">
								<div class="carousel-caption">
									<h3>Prewedding <br>Packages</h3>
									<a href="Home/kategori/2" class="shop-button btn">
										Detail
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item2">
							<div class="container">
								<div class="carousel-caption">
									<h3>Group/Personal
										<br>Photo
									</h3>
									<a href="Home/kategori/1" class="shop-button btn">
										Detail
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item3">
							<div class="container">
								<div class="carousel-caption">
									<h3>Aqiqah</h3>
									<a href="Home/kategori/1" class="shop-button btn">
										Detail
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item4">
							<div class="container">
								<div class="carousel-caption">
									<h3>Wedding <br>Packages</h3>
									<a href="Home/kategori/3" class="shop-button btn">
										Detail
									</a>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<!--//banner-slider-->
			<!--//banner-slider-->
			<div class="right-banner">
				<div class="right-1">

				</div>
			</div>

		</div>

</section>