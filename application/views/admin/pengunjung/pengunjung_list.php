


        <!-- DATA TABLE-->
            <section class="p-t-20">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Pengunjung Website</h3>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-4 text-center">
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="col-md-1 text-right">
                                </div>
                                <div class="col-md-3 text-right">
                                    <form action="<?php echo site_url('admin/Pengunjung/index'); ?>" class="form-inline" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                            <span class="input-group-btn">
                                                <?php 
                                                    if ($q <> '')
                                                    {
                                                        ?>
                                                        <a href="<?php echo site_url('admin/Pengunjung'); ?>" class="btn btn-default">Reset</a>
                                                        <?php
                                                    }
                                                ?>
                                              <button class="btn btn-primary" type="submit">Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--sm">
                                        <div class="dropdown">
                                          <button class="btn au-btn-filter dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-filter-list"></i>Filter
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="admin/Pengunjung/this_month">Bulan ini</a>
                                            <a class="dropdown-item" href="admin/Pengunjung/this_year">Tahun ini</a>
                                            <a class="dropdown-item" href="admin/Pengunjung/index">Semua</a>
                                          </div>
                                        </div>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Export
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="admin/Pengunjung/excel">Excel File</a>
                                            <a class="dropdown-item" href="admin/Pengunjung/word">Word File</a>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>IP</th>
                                            <th>User Agent</th>
                                            <th>Tanggal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengunjung_data as $key => $value): ?>
                                        <tr class="tr-shadow">
                                            <td><?php echo $value->ip ?></td>
                                            <td>
                                                <span class="block-email"><?php echo $value->useragent ?></span>
                                            </td>
                                            <td><?php echo date('d - m - Y', $value->timestamps); ?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="admin/Pengunjung/delete/<?php echo $value->id ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Anda yakin ingin menghapus data ini ?')">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                            
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Total : <?php echo $total_rows ?></a>
                   </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
                