
        <h2 style="margin-top:0px">Profil Perusahaan</h2>
        <div class="row center text-center">
            <span class="center text-center"><small><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></small></span>
        </div>
        <hr>
        <form action="admin/Perusahaan/update_action" method="post">
            <div class="form-group">
                <label class="text-primary">Banner Depan</label>
                <textarea class="form-control" rows="3" id="judul_teks_depan" name="judul_teks_depan" id="judul_teks_depan" placeholder="judul_teks_depan"><?php echo $judul_teks_depan->nilai; ?></textarea>
                <textarea class="form-control" rows="3" id="isi_teks_depan" name="isi_teks_depan" id="isi_teks_depan" placeholder="isi_teks_depan"><?php echo $isi_teks_depan->nilai; ?></textarea>
            </div>
            <div class="form-group">
                <label class="text-primary">Deskripsi Tentang Perusahaan</label>
                <textarea class="form-control" rows="3" id="tentang" name="tentang" id="tentang" placeholder="tentang"><?php echo $tentang->nilai; ?></textarea>
            </div>
            <div class="form-group">
                <label class="text-primary">Alamat Perusahaan</label>
                <textarea class="form-control" rows="3" id="alamat_perusahaan" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="alamat_perusahaan"><?php echo $alamat_perusahaan->nilai; ?></textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="text-primary">Handphone</label>
                        <input type="tel" class="form-control" id="telepon" name="telepon" id="telepon" placeholder="telepon" value="<?php echo $telepon->nilai; ?>">
                    </div>
                    <div class="col-lg-4">
                        <label class="text-primary">Whatsapp</label>
                        <input type="tel" class="form-control" id="whatsapp1" name="whatsapp1" id="whatsapp1" placeholder="whatsapp1" value="<?php echo $whatsapp1->nilai; ?>">
                    </div>
                    <div class="col-lg-4">
                        <label class="text-primary">Whatsapp</label>
                        <input type="tel" class="form-control" id="whatsapp2" name="whatsapp2" id="whatsapp2" placeholder="whatsapp2" value="<?php echo $whatsapp2->nilai; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="text-primary">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $facebook->nilai; ?>">
                    </div>
                    <div class="col-lg-4">
                        <label class="text-primary">Twitter</label>
                        <input type="tel" class="form-control" id="twitter" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $twitter->nilai; ?>">
                    </div>
                    <div class="col-lg-4">
                        <label class="text-primary">Instagram</label>
                        <input type="tel" class="form-control" id="instagram" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $instagram->nilai; ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <button type="button" class="btn btn-secondary" onclick="window.history.go(-1)">Batalkan</button> 
        </form>