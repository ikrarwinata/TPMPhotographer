<!doctype html>
<html>

<head>
    <title>5H0UT5</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>
    <h2 style="margin-top:0px">Pembayaran List</h2>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <?php echo anchor(site_url('pembayaran/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-1 text-right">
        </div>
        <div class="col-md-3 text-right">
            <form action="<?php echo site_url('pembayaran/index'); ?>" class="form-inline" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                    <span class="input-group-btn">
                        <?php
                        if ($q <> '') {
                        ?>
                            <a href="<?php echo site_url('pembayaran'); ?>" class="btn btn-default">Reset</a>
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
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Rekening</th>
                    <th>Nilai Transfer</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php
                    foreach ($pembayaran_data as $pembayaran) {
                    ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $pembayaran->tanggal ?></td>
                        <td><?php echo $pembayaran->rekening ?></td>
                        <td><?php echo $pembayaran->nilai_transfer ?></td>
                        <td><?php echo $pembayaran->foto ?></td>
                        <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('pembayaran/read/' . $pembayaran->id), 'Read');
                            echo ' | ';
                            echo anchor(site_url('pembayaran/update/' . $pembayaran->id), 'Update');
                            echo ' | ';
                            echo anchor(site_url('pembayaran/delete/' . $pembayaran->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                            ?>
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
            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            <?php echo anchor(site_url('pembayaran/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('pembayaran/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-6 text-right">
            <?php echo $pagination ?>
        </div>
    </div>
</body>

</html>