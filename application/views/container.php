<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TPM Photography</title>
  <base href="<?php echo (base_url()) ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/lightbox.min.css">
  <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <style type="text/css">
    .float {
      position: fixed;
      display: block;
      width: 60px;
      height: 60px;
      bottom: 15px;
      right: 80px;
      background-image: url("assets/images/wa.png");
      background-size: cover;
      background-repeat: no-repeat;
      background-color: #fff;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 2px 2px 3px #999;
      z-index: 1;
    }

    .my-float {
      margin-top: 22px;
    }

    code ul {
      margin-left: 23px;
    }
  </style>
</head>

<body>
  <!--w3l-banner-slider-main-->
  <?php
  if ($konten == 'home') {
    $this->load->view('_partials/header');
  } else {
    $this->load->view('_partials/header2');
  }
  ?>
  <?php
  $wa = NULL;
  $wa1 = $this->db->where('namafield', 'whatsapp1')->get('perusahaan')->row();
  $wa2 = $this->db->where('namafield', 'whatsapp2')->get('perusahaan')->row();
  if (isset($wa2->nilai) && $wa2->nilai != NULL) {
    $wa = $wa2->nilai;
  } else if (isset($wa1->nilai) && $wa1->nilai != NULL) {
    $wa = $wa1->nilai;
  }
  if ($wa != NULL) :
    if (substr($wa, 0, 1) == "0") {
      $wa = "62" . substr($wa, 1);
    } else if (substr($wa, 0, 1) == "+") {
      $wa = substr($wa, 1);
    };
    $wa = str_replace(" ", "", $wa);
    $wa = str_replace("-", "", $wa);
  ?>
    <a class="float" href="https://api.whatsapp.com/send?phone=<?php echo ($wa) ?>&text=<?php echo (urlencode('Hai TPM Photography, apakah saya bisa melakukan booking ?')) ?>&source=&data=">
      <i class="my-float"></i>
    </a>
  <?php endif; ?>
  <!-- //w3l-banner-slider-main -->

  <?php $this->load->view($konten) ?>

  <?php $this->load->view('_partials/footer') ?>

</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/vendor/moment/moment.min.js"></script>
<script src="assets/vendor/inputmask/jquery.inputmask.min.js"></script>
<script src="assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

<script>
  function validate_register() {
    var p1 = $("#password").val(),
      p2 = $("#password2").val();

    if (p1 != p2) {
      alert("Konfirmasi password tidak cocok !");
      $("#password2").focus();
      return false;
    };

    return true;
  };

  if ($('#reservationdatetime').length >= 1) {
    $('#reservationdatetime').datetimepicker({
      format: 'D-M-yyyy HH:mm',
      icons: {
        time: 'fa fa-clock'
      }
    });
  }
</script>

<script src="assets/js/lightbox.js"></script>


<!-- imagezoom -->
<script src="assets/js/imagezoom.js"></script>
<!-- //imagezoom -->

<!-- FlexSlider -->
<script src="assets/js/jquery.flexslider.js"></script>
<script>
  // Can also be used with $(document).ready()
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails"
    });
  });
</script>
<!-- //FlexSlider-->
<!--/login-->
<script>
  $(document).ready(function() {
    $(".button-log a").click(function() {
      $(".overlay-login").fadeToggle(200);
      $(this).toggleClass('btn-open').toggleClass('btn-close');
    });
  });
  $('.overlay-close1').on('click', function() {
    $(".overlay-login").fadeToggle(200);
    $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
    open = false;
  });
</script>
<!--//login-->
<script>
  // optional
  if ($('#customerhnyCarousel').length >= 1) {
    $('#customerhnyCarousel').carousel({
      interval: 5000
    });
  }
</script>
<!-- cart-js -->
<script src="assets/js/minicart.js"></script>
<script>
  transmitv.render();

  transmitv.cart.on('transmitv_checkout', function(evt) {
    var items, len, i;

    if (this.subtotal() > 0) {
      items = this.items();

      for (i = 0, len = items.length; i < len; i++) {}
    }
  });
</script>
<!-- //cart-js -->
<!--pop-up-box-->
<script src="assets/js/jquery.magnific-popup.js"></script>
<!--//pop-up-box-->
<script>
  $(document).ready(function() {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

  });
</script>
<!--//search-bar-->
<!-- disable body scroll which navbar is in active -->

<script>
  $(function() {
    $('.navbar-toggler').click(function() {
      $('body').toggleClass('noscroll');
    });

    $(".btn-bayar").click(function() {
      var t = $(this).closest("tr");
      $("#" + t.attr("data-id")).toggleClass("d-none");
    });
  });
</script>
<!-- disable body scroll which navbar is in active -->
<script src="assets/js/bootstrap.min.js"></script>