<h2 style="margin-top:0px">Detail Paket Produk</h2>
<table class="table">
    <tr>
        <td>Judul</td>
        <td><?php echo $produk_data[0]->judul; ?></td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td><?php echo $produk_data[0]->kategori; ?></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>Rp.<?php echo format_number($produk_data[0]->harga); ?></td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td><?php echo $produk_data[0]->deskripsi; ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <?php foreach ($produk_data as $key => $p) : ?>
                <img src="<?php echo $p->gambar ?>" style="max-height: 250px">
            <?php endforeach ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><button type="button" class="btn btn-secondary" onclick="window.history.go(-1)">Batalkan</button></td>
    </tr>
</table>