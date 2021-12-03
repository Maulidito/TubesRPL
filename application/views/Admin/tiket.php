<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Tiket PT. Bus Jaya</h1>
    </div>

    <!-- tag div untuk kerangka konten dari halaman -->
    <div class="contentAdmin">
        <div class="searchDanTambah d-flex flex-row">
            <!-- Button tambah data -->
            <div class="p-2 ml-auto">
                <button href="" class="btn btn-primary btn-blue" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
            </div>
        </div>

        <!-- Tabel untuk menampilkan data tiket -->
        <table class="table text-center mt-4">
            <!-- heading dari tabel -->
            <tr>
                <th>No</th>
                <th>Id Tiket</th>
                <th>Id Bis</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Jam Keberangkatan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <!-- Baris dari tabel, yang diambil dari variabel data[tiket] yang telah dioper sebelumnya -->
            <?php
                $i = 1;
                foreach ($tiket as $data):
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["id_tiket"] ?></td>
                    <td><?= $data["id_bis"] ?></td>
                    <td><?= $data["kota_asal"] ?></td>
                    <td><?= $data["kota_tujuan"] ?></td>
                    <td><?= $data["jam_keberangkatan"] ?></td>
                    <td><?= "Rp.",number_format($data["harga"]) ?></td>
                    <td><button data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning text-white btnUpdate">Update</button>&nbsp;<a href="<?= base_url("Admin/menghapusDataTiket/$data[id_tiket]") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Delete</a></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerBiru">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tiket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open("Admin/tambahDataTiket") ?>
        <div class="form-group">
            <label>Id Tiket</label>
            <input type="text" class="form-control" name="id_tiket" placeholder="Id Tiket">
        </div>
        <div class="form-group">
            <label>Id Bis</label>
            <select name="id_bis" class="form-control">
                <option value="">Pilih</option>
                <?php
                    foreach($bis as $id_bis){
                        echo "<option value='$id_bis[id_bis]'>$id_bis[id_bis]</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" class="form-control" name="kota_asal" placeholder="Kota Asal">
        </div>
        <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" class="form-control" name="kota_tujuan" placeholder="Kota Tujuan">
        </div>
        <div class="form-group">
            <label>Jam Keberangkatan</label>
            <input type="text" class="form-control" name="jam_keberangkatan" placeholder="Jam Keberangkatan">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga" placeholder="Harga">
        </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-blue">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerBiru">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Tiket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open("Admin/mengubahDataTiket") ?>
        <div class="form-group">
            <label>Id Tiket</label>
            <input type="text" class="form-control" name="id_tiket" id="id_tiket" placeholder="Id Tiket" readonly>
        </div>
        <div class="form-group">
            <label>Id Bis</label>
            <select name="id_bis" id="id_bis" class="form-control">
                <option value="">Pilih</option>
                <?php
                    foreach($bis as $id_bis){
                        echo "<option value='$id_bis[id_bis]'>$id_bis[id_bis]</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" class="form-control" name="kota_asal" id="kota_asal" placeholder="Kota Asal">
        </div>
        <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" class="form-control" name="kota_tujuan" id="kota_tujuan" placeholder="Kota Tujuan">
        </div>
        <div class="form-group">
            <label>Jam Keberangkatan</label>
            <input type="text" class="form-control" name="jam_keberangkatan" id="jam_keberangkatan" placeholder="Jam Keberangkatan">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
        </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-blue">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>

<script>
    $(".btnUpdate").on("click",function(){
        var tr = ($(this).parent()).parent()

        // mengambil data yang ada di tabel
        var idTiket = tr.children(":nth-child(2)").text()
        var idBis = tr.children(":nth-child(3)").text()
        var asal = tr.children(":nth-child(4)").text()
        var tujuan = tr.children(":nth-child(5)").text()
        var keberangkatan = tr.children(":nth-child(6)").text()
        var harga = tr.children(":nth-child(7)").text()
        var hargaNum = harga.replace( /^\D+/g, '');

        $("#id_tiket").attr("value",idTiket)
        $("#id_bis").val(idBis)
        $("#kota_asal").attr("value",asal)
        $("#kota_tujuan").attr("value",tujuan)
        $("#jam_keberangkatan").attr("value",keberangkatan)
        $("#harga").attr("value",parseInt(hargaNum.match(/\d/g).join("")))
    });

</script>