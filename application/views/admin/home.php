                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview pengunjung</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-12 col-lg-12">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $totalpengunjung ?></h2>
                                                <span>Tahun Ini</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Statistik Booking</h2>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12 col-lg-12 m-t-25">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-calendar-note"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $totalbooking ?></h2>
                                                    <span>Tahun Ini</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart4"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="chartvalue" style="display: none;">
                            <?php foreach ($pengunjung as $key => $value) : ?>
                                <?php echo $value->c . "," ?>
                            <?php endforeach ?>
                            <?php for ($i = count($pengunjung); $i <= 12; $i++) {
                                echo "0,";
                            } ?>
                        </div>
                        <div id="chartvalue2" style="display: none;">
                            <?php foreach ($booking as $key => $value) : ?>
                                <?php echo $value->c . "," ?>
                            <?php endforeach ?>
                            <?php for ($i = count($booking); $i <= 12; $i++) {
                                echo "0,";
                            } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="well well-lg text-info">
                                    Selamat datang <?php echo $this->session->userdata('nama') ?>
                                </div>
                            </div>
                        </div>