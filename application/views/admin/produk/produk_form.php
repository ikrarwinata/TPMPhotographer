<h2 style="margin-top:0px"><?php echo $title ?></h2>
<hr>
<?php echo form_open_multipart($action); ?>
<div class="form-group">
    <label for="varchar">Judul <?php echo form_error('judul') ?></label>
    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
</div>
<div class="form-group">
    <label for="varchar">Kategori <?php echo form_error('kategori') ?></label>
    <select class="chosen-select form-control" name="kategori" id="kategori" data-placeholder="Kategori">
        <option value="<?php echo $kategori; ?>"><?php echo $kategori; ?></option>
        <?php foreach ($kategoris as $key => $value) : ?>
            <option value="<?php echo $value->kategori ?>"><?php echo $value->kategori ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="float">Harga <?php echo form_error('harga') ?></label>
    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
    <textarea class="form-control" rows="3" name="deskripsi" id="deskripsis" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
</div>
<div class="form-group">
    <label for="gambar">Gambar <small>(File gambar bisa lebih dari 1)</small><?php echo form_error('gambar') ?></label>
    <div class="row">
        <?php if (isset($gambar) && $gambar != NULL) : ?>
            <?php foreach ($gambar as $key => $value) : ?>
                <div class="col-lg-4 center text-center">
                    <img align="center" src="<?php echo $value->gambar ?>" style="max-width: 250px; max-height: 250px">
                </div>
            <?php endforeach ?>
        <?php endif; ?>
    </div>
    <input name="gambar[]" type="file" multiple="multiple" class="form-control" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
<button type="button" class="btn btn-secondary" onclick="window.history.go(-1)">Batalkan</button>
</form>