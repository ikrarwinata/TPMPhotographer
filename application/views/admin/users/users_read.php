
        <h2 style="margin-top:0px">Detail akun pengguna</h2>
        <hr>
        <table class="table">
    	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
    	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
    	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
    	    <tr><td>Tempatlahir</td><td><?php echo $tempatlahir; ?></td></tr>
    	    <tr><td>Tanggallahir</td><td><?php echo $tanggallahir; ?></td></tr>
    	    <tr><td>Alamat</td><td><?php echo $alamat==NULL?"-":$alamat; ?></td></tr>
    	</table>