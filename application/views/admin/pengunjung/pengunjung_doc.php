<!doctype html>
<html>
    <head>
        <title>Data Pengunjung Website TPM Photography</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Pengunjung </h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Ip</th>
		<th>Useragent</th>
		<th>Tanggal</th>
		
            </tr><?php
            foreach ($pengunjung_data as $pengunjung)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengunjung->ip ?></td>
		      <td><?php echo $pengunjung->useragent ?></td>
		      <td><?php echo date("d - m - Y", $pengunjung->timestamps) ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>