<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>TPM Photography - Administrator</title>
	<base href="<?php echo base_url() ?>">

	<!-- Fontfaces CSS-->
	<link href="assets/css/font-face.css" rel="stylesheet" media="all">
	<link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<link rel="stylesheet" href="assets/css/chosen.min.css" />
	<!-- Main CSS-->
	<link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
	<div class="">

		<!-- PAGE CONTAINER-->
		<div class="">

			<!-- MAIN CONTENT-->
			<div class="">
				<div class="section__content section__content--p30">
					<div class="container-fluid" style="
-ms-transform: rotate(90deg);
   -webkit-transform: rotate(90deg);
   transform: rotate(90deg);margin-top: 150px;">

						<div class="row mt-5">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-1">Statistik Booking</h2>
								</div>
							</div>
						</div>
						<div class="row m-t-25">
							<div class="col-sm-12 col-lg-12 m-t-25">
								<div class="overview-item" style='background: rgb(210,255,255);
background: linear-gradient(0deg, rgba(210,255,255,1) 0%, rgba(222,246,255,1) 40%, rgba(140,236,255,1) 100%);background: rgb(210,255,255);
background: -moz-linear-gradient(0deg, rgba(210,255,255,0.7259278711484594) 0%, rgba(222,246,255,0.49343487394957986) 40%, rgba(140,236,255,0.4430147058823529) 100%);
background: -webkit-linear-gradient(0deg, rgba(210,255,255,0.7259278711484594) 0%, rgba(222,246,255,0.49343487394957986) 40%, rgba(140,236,255,0.4430147058823529) 100%);
background: linear-gradient(0deg, rgba(210,255,255,0.7259278711484594) 0%, rgba(222,246,255,0.49343487394957986) 40%, rgba(140,236,255,0.4430147058823529) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #d2ffff",endColorstr="#8cecff" ,GradientType=1);'>
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-calendar-note"></i>
											</div>
											<div class="text">
												<h2 style="color: black !important"><?php echo $totalbooking ?></h2>
												<span style="color: black !important">Tahun Ini (<?php echo (date("Y")) ?>)</span>
											</div>
										</div>
										<div class="overview-chart" style="height: 600px !important;">
											<canvas id="widgetChart4"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div id="chartvalue2" style="display: none;">
							<?php foreach ($booking as $key => $value) : ?>
								<?php echo $value->c . "," ?>
							<?php endforeach ?>
							<?php for ($i = count($booking); $i <= 12; $i++) {
								echo "0,";
							} ?>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		</div>

	</div>

	<!-- Jquery JS-->
	<script src="assets/vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- assets/Vendor JS       -->
	<script src="assets/vendor/slick/slick.min.js">
	</script>
	<script src="assets/vendor/wow/wow.min.js"></script>
	<script src="assets/vendor/animsition/animsition.min.js"></script>
	<script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="assets/vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
	<script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="assets/vendor/select2/select2.min.js">
	</script>

	<script src="assets/ckeditor4/ckeditor.js"></script>

	<script src="assets/js/chosen.jquery.min.js"></script>
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>


	<!-- Main JS-->
	<script src="assets/js/stts.js"></script>
	<script>
		$(window).ready(() => {
			var intp = setInterval(() => {
				window.print();
				clearInterval(intp);
			}, 1300);

			var intp2 = setInterval(() => {
				window.close();
				clearInterval(intp2);
			}, 2600);
		})
	</script>
</body>

</html>
<!-- end document-->