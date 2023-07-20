<div class="mb-3">
                        <label for="pbb" class="form-label">PBB(wajib) :</label>
                        <select class="form-control" name="pbb" id="pbb" required>
                            <option value="">Pilih PBB : </option>
                            <option value="sudah-bayar" <?php if ($pbb == "sudah-bayar") echo "selected" ?>>Sudah Bayar</option>
                            <option value="belum-bayar" <?php if ($pbb == "belum-bayar") echo "selected" ?>>Belum Bayar</option>
                            <option value="bebas-pajak" <?php if ($pbb == "bebas-pajak") echo "selected" ?>>Bebas Pajak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan1" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan1" name="suratdibutuhkan1" value="<?php echo $suratdibutuhkan1 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan2" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan2" name="suratdibutuhkan2" value="<?php echo $suratdibutuhkan2 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan3" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan3" name="suratdibutuhkan3" value="<?php echo $suratdibutuhkan3 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan4" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan4" name="suratdibutuhkan4" value="<?php echo $suratdibutuhkan4 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan(wajib) :</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?php echo $keperluan ?>" placeholder="Masukkan Keperluan" autocomplete="off" required>
                    </div>