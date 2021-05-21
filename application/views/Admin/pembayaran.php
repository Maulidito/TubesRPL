<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Pembayaran PT. Bus Jaya</h1>
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
                <th>Id Pembayaran</th>
                <th>Id Pesanan</th>
                <th>Nama Pengirim</th>
                <th>Nomor Rekening</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <!-- Baris dari tabel, yang diambil dari variabel data[tiket] yang telah dioper sebelumnya -->
            <?php
                $i = 1;
                foreach ($pembayaran as $data):
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["id_pembayaran"] ?></td>
                    <td><?= $data["id_pesanan"] ?></td>
                    <td><?= $data["nama_pengirim"] ?></td>
                    <td><?= $data["nomor_rekening"] ?></td>
                    <td><?= $data["total_pembayaran"] ?></td>
                    <td><?= $data["tgl_pembayaran"] ?></td>
                    <td><?= $data["status_pembayaran"] ?></td>
                    <td><button data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning text-white btnUpdate">Update</button></td>
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
        <?= form_open("Admin/tambahDataPembayaran") ?>
        <div class="form-group">
            <label>Id Pembayaran</label>
            <input type="text" class="form-control" name="id_pembayaran" placeholder="id_pembayaran">
        </div>
        <div class="form-group">
            <label>Id Pesanan</label>
            <input type="text" class="form-control" name="id_pesanan" placeholder="id_pesanan">
        </div>
        <div class="form-group">
            <label>Nama Pengirim</label>
            <input type="text" class="form-control" name="nama_pengirim" placeholder="nama_pengirim">
        </div>
        <div class="form-group">
            <label>Nomor Rekening</label>
            <input type="text" class="form-control" name="nomor_rekening" placeholder="nomor_rekening">
        </div>
        <div class="form-group">
            <label>Total Pembayaran</label>
            <input type="text" class="form-control" name="total_pembayaran" placeholder="total_pembayaran">
        </div>
        <div class="form-group">
            <label>Tanggal Pembayaran</label>
            <input type="text" class="form-control" name="tgl_pembayaran" placeholder="tgl_pembayaran">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control" name="status_pembayaran" placeholder="status_pembayaran">
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
        <?= form_open("Admin/mengubahDataPembayaran") ?>
        <div class="form-group">
            <label>Id Pembayaran</label>
            <input type="text" class="form-control" name="id_pembayaran" id="id_pembayaran" placeholder="Id pembayaran" readonly>
        </div>
        <div class="form-group">
            <label>Id Pesanan</label>
            <input type="text" class="form-control" name="id_pesanan" id="id_pesanan" placeholder="id_pesanan">
        </div>
        <div class="form-group">
            <label>Nama Pengirim</label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="nama_pengirim">
        </div>
        <div class="form-group">
            <label>Nomor Rekening</label>
            <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" placeholder="nomor_rekening">
        </div>
        <div class="form-group">
            <label>Total Pembayaran</label>
            <input type="text" class="form-control" name="total_pembayaran" id="total_pembayaran" placeholder="total_pembayaran">
        </div>
        <div class="form-group">
            <label>Tanggal Pembayaran</label>
            <input type="text" class="form-control" name="tgl_pembayaran" id="tgl_pembayaran" placeholder="tgl_pembayaran">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="status_pembayaran">
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
        var idPembayaran = tr.children(":nth-child(2)").text()
        var idPesanan = tr.children(":nth-child(3)").text()
        var namaPengirim = tr.children(":nth-child(4)").text()
        var nomorRekening = tr.children(":nth-child(5)").text()
        var totalPembayaran = tr.children(":nth-child(6)").text()
        var tglPembayaran = tr.children(":nth-child(7)").text()
        var status= tr.children(":nth-child(8)").text()
       

        $("#id_pembayaran").attr("value",idPembayaran)
        $("#id_pesanan").val(idPesanan)
        $("#nama_pengirim").val(namaPengirim)
        $("#nomor_rekening").attr("value",nomorRekening)
        $("#total_pembayaran").attr("value",totalPembayaran)
        $("#tgl_pembayaran").attr("value",tglPembayaran)
        $("#status_pembayaran").attr("value",status)
        
    });

</script>