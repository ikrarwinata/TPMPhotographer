  <section class="w3l-footer-22">
      <!-- footer-22 -->
      <div class="footer-hny py-5">
          <div class="container py-lg-5">
              <div class="text-txt row">
                  <div class="left-side col-lg-4">
                      <h3><a class="logo-footer" href="index.html">
                            TPM <span class="lohny">P</span>hotography</a></h3>
                      <!-- if logo is image enable this   
                                    <a class="navbar-brand" href="#index.html">
                                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                    </a> -->
                      <p>We specialize photo in Prewedding, Family, Graduation, Photobooth, Children, Baby Newborn, Maternity, and Schools of Photography.</p>
                      <ul class="social-footerhny mt-lg-5 mt-4">
                          <?php 
                          $fb = isset($this->db->where('namafield','facebook')->get('perusahaan')->row()->nilai)?$this->db->where('namafield','facebook')->get('perusahaan')->row()->nilai:NULL;
                          $tw = isset($this->db->where('namafield','twitter')->get('perusahaan')->row()->nilai)?$this->db->where('namafield','facebook')->get('perusahaan')->row()->nilai:NULL;
                          $ig = isset($this->db->where('namafield','instagram')->get('perusahaan')->row()->nilai)?$this->db->where('namafield','facebook')->get('perusahaan')->row()->nilai:NULL;
                           ?>
                           <?php if ($fb!=NULL): ?>
                             <li><a class="facebook" href="<?php echo $fb ?>"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                           <?php endif ?>
                          <?php if ($tw!=Null): ?>
                            <li><a class="twitter" href="<?php echo $tw ?>"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                          <?php endif ?>
                          <?php if ($ig!=NULL): ?>
                            <li><a class="instagram" href="<?php echo $ig ?>"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>
                          <?php endif ?>
                      </ul>
                  </div>

                  <div class="right-side col-lg-8 pl-lg-5">
                      <h4>Hubungi kami untuk kritik dan saran anda</h4>
                      <div class="sub-columns">
                          <div class="sub-one-left">
                              <h6>Links</h6>
                              <div class="footer-hny-ul">
                                  <ul>
                                      <li><a href="Home">Beranda</a></li>
                                      <li><a href="Home/About">Tentang</a></li>
                                      <li><a href="Home/Gallery">Gallery</a></li>
                                      <li><a href="Home/Product">Produk</a></li>
                                  </ul>
                                  <ul>
                                  <?php 
                                  $wa = NULL;
                                  $wa1 = $this->db->where('namafield', 'whatsapp1')->get('perusahaan')->row();
                                  $wa2 = $this->db->where('namafield', 'whatsapp2')->get('perusahaan')->row();
                                  ?>
                                    <li><a href=""><i class="fa fa-whatsapp"></i> <?php echo (isset($wa1->nilai)? $wa1->nilai:NULL); ?></a></li>
                                    <li><a href=""><i class="fa fa-whatsapp"></i> <?php echo (isset($wa2->nilai) ? $wa2->nilai : NULL); ?></a></li>
                                  </ul>
                              </div>

                          </div>
                          <div class="sub-two-right">
                              <h6>TPM Photography</h6>
                              <p class="mb-5"><?php echo $this->db->where('namafield','alamat_perusahaan')->get('perusahaan')->row()->nilai; ?></p>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="below-section row">
                  <div class="columns col-lg-6">
                      <ul class="jst-link">
                          <li><a href="#">Privacy Policy </a> </li>
                          <li><a href="#">Term of Service</a></li>
                          <li><a href="contact.html">Customer Care</a> </li>
                      </ul>
                  </div>
                  <div class="columns col-lg-6 text-lg-right">
                      <p>© 2020 TPM Photography. All rights reserved. Design by <a href="https://w3layouts.com/" target="_blank">
                              W3Layouts</a>
                      </p>
                  </div>
                  <button onclick="topFunction()" id="movetop" title="Go to top">
                      <span class="fa fa-angle-double-up"></span>
                  </button>
              </div>
          </div>
      </div>
      <!-- //titels-5 -->
      <!-- move top -->

      <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
              scrollFunction()
          };

          function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  document.getElementById("movetop").style.display = "block";
              } else {
                  document.getElementById("movetop").style.display = "none";
              }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
          }
      </script>
      <!-- /move top -->
  </section>
