
        <h2 style="margin-top:0px">Akun Administrator</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/Users_admin/create'),'Tambah akun', 'class="btn btn-primary"'); ?>
                <?php echo anchor(site_url('admin/Users_admin/excel'), 'Export ke Excel', 'class="btn btn-secondary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/Users_admin/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/Users_admin'); ?>" class="btn btn-default">Reset</a>
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
            		<th>Username</th>
            		<th>Nama</th>
            		<th>Tempat/Tanggal lahir</th>
            		<th></th>
				</tr>
				</thead>
				<tbody><?php
				foreach ($users_data as $users)
				{
					?>
					<tr>
            			<td width="80px"><?php echo ++$start ?></td>
            			<td><?php echo $users->username ?></td>
            			<td><?php echo $users->nama ?></td>
            			<td><?php echo $users->tempatlahir.", ".$users->tanggallahir ?></td>
            			<td style="text-align:center" width="200px">
                            <a href="admin/Users_admin/read/<?php echo $users->id ?>"><i class="fa fa-eye text-success" title="Detail"></i></a>&nbsp;
                            <a href="admin/Users_admin/update/<?php echo $users->id ?>"><i class="fa fa-edit text-primary" title="Edit"></i></a>&nbsp;
                            <a href="admin/Users_admin/delete/<?php echo $users->id ?>"><i class="fa fa-trash text-danger" title="Delete" onclick="return confirm('Anda yakin ingin menghapus akun ini ?')"></i></a>
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
                Total Akun : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>