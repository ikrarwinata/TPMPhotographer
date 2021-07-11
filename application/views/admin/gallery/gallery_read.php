
        <h2 style="margin-top:0px">Gallery Read</h2>
        <hr>
        <table class="table">
    	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
    	    <tr><td>Tanggal Posting</td><td><?php echo date("d - m -Y", $timestamps); ?></td></tr>
    	    <tr><td>Gambar</td><td><img src="<?php echo $gambar ?>" style="max-height: 280px;max-width: 280px"></td></tr>
    	    <tr><td></td><td><button type="button" class="btn btn-secondary" onclick="window.history.go.(-1)">Batalkan</button></td></tr>
    	</table>