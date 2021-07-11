<h2 style="margin-top:0px">Data Pesanan Pelanggan</h2>
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
        <form action="<?php echo site_url('admin/Booking/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('admin/Booking'); ?>" class="btn btn-default">Reset</a>
                    <?php
                    }
                    ?>
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Id Produk</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>HP</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody><?php
                foreach ($booking_data as $booking) {
                ?>
                <tr>
                    <td width="40px" class="text-center"><?php echo ++$start ?></td>
                    <td><a href="admin/Produk/read/<?php echo ($booking->id_produk) ?>" class="btn btn-sm btn-success"><?php echo $booking->judul ?></a></td>
                    <td><a href="admin/Users/read/<?php echo ($booking->nik) ?>" class="btn btn-sm btn-success"><?php echo $booking->nama ?></a></td>
                    <td><?php echo date("d M Y H:i", $booking->tanggal) ?></td>
                    <td><?php echo $booking->hp ?></td>
                    <td class="text-center">
                        <?php if ($booking->status == "Sedang diproses") : ?>
                            <a href="admin/Booking/accept/<?php echo ($booking->id) ?>" class="btn btn-sm btn-warning" title="Belum dikonfirmasi" onclick="return confirm('Anda yakin akan menerima pesanan ini ?')"><i class="fa fa-minus"></i></a>
                        <?php else : ?>
                            <button type="button" class="btn btn-sm btn-primary" title="Telah dikonfirmasi"><i class="fa fa-check"></i></button>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center" width="100px">
                        <a href="admin/Booking/read/<?php echo ($booking->id) ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="admin/Booking/delete/<?php echo ($booking->id) ?>" class="btn btn-sm btn-danger" onclick="javasciprt: return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash"></i></a>
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
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a> &nbsp;
        <?php echo anchor(site_url('admin/Booking/excel'), 'Laporan Excel', 'class="btn btn-primary"'); ?> &nbsp;
        <?php echo anchor(site_url('admin/Booking/statistik'), 'Laporan Statistik', 'class="btn btn-primary" target="_blank"'); ?>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>