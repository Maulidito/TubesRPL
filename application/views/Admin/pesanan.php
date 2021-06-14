<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Pesanan PT. Bus Jaya</h1>
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
                <th>Id Pesanan</th>
                <th>Nama Pemesan</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Penumpang</th>
                <th>Aksi</th>
            </tr>
            <!-- Baris dari tabel, yang diambil dari variabel data[tiket] yang telah dioper sebelumnya -->
            <?php
                $i = 1;
                foreach ($pesanan as $data):
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["id_pesanan"] ?></td>
                    <td><?= $data["nama_pemesan"] ?></td>
                    <td><?= $data["no_telp"] ?></td>
                    <td><?= $data["email"] ?></td>
                    <td><?= $data["jumlah_penumpang"] ?></td>
                    <td><a href="<?= base_url("admin/detail_pesanan/$data[id_pesanan]") ?>" class="btn btn-success">Detail</a>&nbsp;<button data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning text-white btnUpdate">Update</button>&nbsp;<a href="<?= base_url("Admin/menghapusDataPesanan/$data[id_pesanan]") ?>" class="btn btn-danger" onclick=" return confirm('Apakah Anda Yakin Menghapus Data Pesanan Ini ? (Data Pesanan dan Data Pembayaran Akan Dihapus)')">Delete</a></td>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open("Admin/tambahDataPesanan") ?>
        <div class="form-group">
            <label>Id Pesanan</label>
            <input type="text" class="form-control" name="id_pesanan" placeholder="Id Pemesan">
        </div>
        <div class="form-group">
            <label>Id Tiket</label>
            <select name="id_tiket" id="id_tiket" class="form-control">
                <option value="">Pilih</option>
                <?php
                    foreach($tiket as $id_tiket){
                        echo "<option value='$id_tiket[id_tiket]'>$id_tiket[id_tiket]</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nama Pemesan</label>
            <input type="text" class="form-control" name="nama_pemesan" placeholder="Nama Pemesan">
        </div>
        <div class="form-group">
            <label>Nomor Telfon</label>
            <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telfon">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Jumlah Penumpang</label>
            <input type="text" class="form-control" name="jumlah_penumpang" placeholder="Penumpang">
        </div>
        <div class="form-group">
            <label>Total Biaya</label>
            <input type="text" class="form-control" name="total_biaya" placeholder="Total Biaya">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Update Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open("Admin/mengubahDataPesanan") ?>
        <div class="form-group">
            <label>Id Pesanan</label>
            <input type="text" class="form-control" name="id_pesanan" id="id_pesanan" placeholder="Id Pesanan" readonly>
        </div>
        <div class="form-group">
            <label>Nama Pemesan</label>
            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="Nama Pemesan">
        </div>
        <div class="form-group">
            <label>Nomor Telfon</label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telfon">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Jumlah Penumpang</label>
            <input type="text" class="form-control" name="jumlah_penumpang" id="jumlah_penumpang" placeholder="Jumlah Penumpang">
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
        var idPesanan = tr.children(":nth-child(2)").text()
        var nama_pemesan = tr.children(":nth-child(3)").text()
        var no_telp = tr.children(":nth-child(4)").text()
        var email = tr.children(":nth-child(5)").text()
        var jumlah_penumpang = tr.children(":nth-child(6)").text()

        $("#id_pesanan").attr("value",idPesanan)
        $("#nama_pemesan").val(nama_pemesan)
        $("#no_telp").attr("value",no_telp)
        $("#email").attr("value",email)
        $("#jumlah_penumpang").attr("value",jumlah_penumpang)
    });

</script>