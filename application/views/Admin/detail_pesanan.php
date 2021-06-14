<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Detail Pesanan</h1>
    </div>

    <!-- tag div untuk kerangka konten dari halaman -->
    <div class="contentAdmin">
        <!-- Tabel untuk menampilkan data tiket -->
        <table class="table text-center mt-4">
            <!-- heading dari tabel -->
            <tr>
                <th>No</th>
                <th>Id Pesanan</th>
                <th>Id Tiket</th>
                <th>Total Biaya</th>
                <th>Tanggal Pemesanan</th>
                <th>Aksi</th>
            </tr>
            <!-- Baris dari tabel, yang diambil dari variabel data[tiket] yang telah dioper sebelumnya -->
            <?php
                $i = 1;
                foreach ($detail_pesanan as $data):
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["id_pesanan"] ?></td>
                    <td><?= $data["id_tiket"] ?></td>
                    <td><?= $data["total_biaya"] ?></td>
                    <td><?= $data["tgl_pemesanan"] ?></td>
                    <td><button data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning text-white btnUpdate">Update</button></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
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
        <?= form_open("Admin/mengubahDetailPesanan") ?>
        <div class="form-group">
            <label>Id Pesanan</label>
            <input type="text" class="form-control" name="id_pesanan" placeholder="Id Pemesan" value="<?= $detail_pesanan[0]['id_pesanan']?>" readonly>
        </div>
        <div class="form-group">
            <label>Id Tiket</label>
            <input type="text" class="form-control" name="id_tiket" placeholder="Id Tiket" id="id_tiket">
        </div>
        <div class="form-group">
            <label>Total Biaya</label>
            <input type="text" class="form-control" name="total_biaya" placeholder="Total Biaya" id="total_biaya">
        </div>
        <div class="form-group">
            <label>Tanggal Pemesanan</label>
            <input type="text" class="form-control" name="tgl_pemesanan" placeholder="Tanggal Pemesanan" id="tgl_pemesanan">
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
        var idTiket = tr.children(":nth-child(3)").text()
        var total_biaya = tr.children(":nth-child(4)").text()
        var tgl_pemesanan = tr.children(":nth-child(5)").text()
        
        $("#id_pesanan").attr("value",idPesanan)
        $("#id_tiket").val(idTiket)
        $("#total_biaya").attr("value",total_biaya)
        $("#tgl_pemesanan").attr("value",tgl_pemesanan)
    });

</script>