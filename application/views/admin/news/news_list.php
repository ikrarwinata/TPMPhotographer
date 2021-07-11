        <h2 style="margin-top:0px">Informasi</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/News/create'),'Tambah Baru', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/News/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Nnews'); ?>" class="btn btn-default">Reset</a>
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
            		<th>Gambar</th>
            		<th>Kategori</th>
            		<th></th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($news_data as $news)
				{
					?>
					<tr>
        			<td width="80px"><?php echo ++$start ?></td>
        			<td><?php echo $news->judul ?></td>
        			<td><img src="<?php echo $news->gambar ?>" style="width: auto; height: 110px"></td>
        			<td><?php echo $news->kategori ?></td>
        			<td style="text-align:center" width="200px">
                        <a href="admin/News/read/<?php echo $news->id ?>" title="Detail"><i class="fa fa-eye text-success"></i></a>&nbsp;
                        <a href="admin/News/update/<?php echo $news->id ?>" title="Edit"><i class="fa fa-edit text-primary"></i></a>&nbsp;
                        <a href="admin/News/delete/<?php echo $news->id ?>" title="Delete" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash text-danger"></i></a>
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
                <strong>Total Record : <?php echo $total_rows ?></strong>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>