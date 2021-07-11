<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>News List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Konten</th>
		<th>Gambar</th>
		<th>Kategori</th>
		
            </tr><?php
            foreach ($news_data as $news)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $news->judul ?></td>
		      <td><?php echo $news->konten ?></td>
		      <td><?php echo $news->gambar ?></td>
		      <td><?php echo $news->kategori ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>