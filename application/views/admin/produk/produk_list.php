        <h2 style="margin-top:0px">Paket Produk</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/Produk/create'),'Tambah', 'class="btn btn-primary"'); ?>&nbsp;
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Produk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Produk'); ?>" class="btn btn-default">Reset</a>
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
            		<th>Judul</th>
            		<th>Harga</th>
            		<th>Deskripsi</th>
            		<th>Gambar</th>
            		<th></th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($produk_data as $produk)
				{
					?>
					<tr>
            			<td width="80px"><?php echo ++$start ?></td>
            			<td><?php echo $produk->judul ?></td>
            			<td>Rp.<?php echo number_format($produk->harga, 0) ?></td>
            			<td><code><?php echo substr($produk->deskripsi,0,45).(strlen($produk->deskripsi)>45?"...":NULL) ?></code></td>
            			<td><img src="<?php echo $produk->gambar ?>" style="max-height: 150px; max-width: 150px;"></td>
            			<td style="text-align:center" width="200px">
                            <a href="admin/Produk/read/<?php echo $produk->id ?>" title="Detail"><i class="fa fa-eye text-success"></i></a>&nbsp;
                            <a href="admin/Produk/update/<?php echo $produk->id ?>" title="Edit"><i class="fa fa-edit text-primary"></i></a>&nbsp;
                            <a href="admin/Produk/delete/<?php echo $produk->id ?>" title="Delete" onclick="return confirm('Anda yakin ingin menghapus paket ini ?')"><i class="fa fa-trash text-danger"></i></a>
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
                Total Record : <?php echo $total_rows ?>                
        	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>