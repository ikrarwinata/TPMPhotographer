
        <h2 style="margin-top:0px">Informasi</h2>
        <hr>
        <?php echo form_open_multipart($action);?>
    	    <div class="form-group">
                <label for="varchar">Judul <?php echo form_error('judul') ?></label>
                <textarea class="form-control" id="judul" rows="2" name="judul" id="judul" placeholder="Judul"><?php echo $judul; ?></textarea>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori <?php echo form_error('kategori') ?></label>
                <input type="text" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>"
                class="form-control" list="kat">
                <datalist id="kat">
                    <?php foreach ($kategori as $key => $value): ?>
                        <option value="$value->kategori">
                    <?php endforeach ?>
                </datalist>
            </div>
    	    <div class="form-group">
                <label for="konten">Konten <?php echo form_error('konten') ?></label>                
                <textarea class="form-control" id="konten" rows="4" name="konten" id="konten" placeholder="Konten"><?php echo $content; ?></textarea>
            </div>
    	    <div class="form-group">
                <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
                <div class="row form-control">
                    <div class="col-lg-6">
                        <img src="<?php echo $gambar; ?>" style="max-height: 250px">
                    </div>
                    <div class="col-lg-6">
                        <input type="file" name="gambar">
                    </div>
                </div>
            </div>
    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    	    <a href="<?php echo site_url('news') ?>" class="btn btn-default">Cancel</a>
    	</form>