
        <h2 style="margin-top:0px">Detail Informasi</h2>
        <table class="table">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Konten</td><td><?php echo $content; ?></td></tr>
	    <tr><td>Gambar</td><td><img src="<?php echo $gambar; ?>" style="max-height: 350px;max-width: 350px"></td></tr>
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td></td><td><button class="btn btn-default btn-primary" onclick="window.history.go(-1)">Kembali</button></td></tr>
	</table>