
        <h2 style="margin-top:0px">Kategori Produk</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal">
                    Tambah Kategori
                </button>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Kategori_produk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Kategori_produk'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
			<table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
				<thead>
				<tr>
					<th>No</th>
                    <th>Kategori</th>
            		<th>Jumlah Produk</th>
            		<th></th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($kategori_produk_data as $kategori_produk)
				{
					?>
					<tr>
            			<td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $kategori_produk->kategori ?></td>
            			<td><a href="admin/Produk/by_kategori/<?php echo $kategori_produk->id ?>"><?php echo $kategori_produk->c ?>&nbsp;Produk</a></td>
            			<td style="text-align:center" width="200px">
                            <a href="admin/Kategori_produk/delete/<?php echo $kategori_produk->id ?>" onclick="return confirm('Anda yakin ingin menghapus kategori ini ?')" title="Hapus"><i class="fa fa-trash text-danger"></i></a>
            			</td>
            		</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
        <div class="row">
            <div class="col-md-6">
                Total Kategori : <?php echo $total_rows ?>
	       </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>