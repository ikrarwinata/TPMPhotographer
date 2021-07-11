
        <h2 style="margin-top:0px"><?php echo $title ?></h2>
        <hr>
        <?php echo form_open_multipart($action);?>
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="gambar">Gambar <?php echo form_error('gambar') ?></label>
            <div class="row" style="margin-left: 3px;">
                <img src="<?php echo $gambar ?>" style="max-width: 250px;max-height: 250px;">
            </div>
            <input type="file" name="gambar" class="form-control">
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <button type="button" class="btn btn-secondary" onclick="window.history.go(-1)">Batalkan</button> 
	</form>
    </body>
</html>