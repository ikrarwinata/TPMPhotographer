<h2 style="margin-top:0px">Detail Pesanan</h2>
<table class="table">
    <tr>
        <td>Username</td>
        <td><?php echo $username; ?></td>
    </tr>
    <tr>
        <td>Id Produk</td>
        <td><?php echo $id_produk; ?></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><?php echo $tanggal; ?></td>
    </tr>
    <tr>
        <td>Id Transaksi</td>
        <td><?php echo $id_transaksi; ?></td>
    </tr>
    <tr>
        <td>Uang Muka</td>
        <td>Rp. <?php echo format_number($DP); ?></td>
    </tr>
    <tr>
        <td>Bukti Pembayaran</td>
        <td>
            <a href="<?php echo (base_url($bukti_pembayaran)) ?>"><img src="<?php echo (base_url($bukti_pembayaran)) ?>" alt="" style="max-width: 350px;"> </a>
        </td>
    </tr>
</table>