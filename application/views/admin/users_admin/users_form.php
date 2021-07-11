<h2 style="margin-top:0px">Akun Administrator</h2>
<hr>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">NIK</label>
        <input type="text" class="form-control" name="newid" id="newid" placeholder="Nomor Induk Kependudukan" value="<?php echo $id; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Password <?php echo form_error('password') ?></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="varchar">Tempat lahir <?php echo form_error('tempatlahir') ?></label>
                <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempatlahir" value="<?php echo $tempatlahir; ?>" />
            </div>
            <div class="col-lg-6">
                <label for="varchar">Tanggal lahir <?php echo form_error('tanggallahir') ?></label>
                <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggallahir" value="<?php echo $tanggallahir; ?>" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
        <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <button type="button" class="btn btn-secondary" onclick="window.history.go(-1)">Batalkan</button>
</form>