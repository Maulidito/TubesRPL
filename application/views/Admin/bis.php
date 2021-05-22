<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Bis PT. Bus Jaya</h1>
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
                <th>Id Bis</th>
                <th>Jumlah Kursi</th>
                <th>Aksi</th>
            </tr>
            <!-- Baris dari tabel, yang diambil dari variabel data[Bis] yang telah dioper sebelumnya -->
            <?php
                $i = 1;
                foreach ($bis as $data):
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["id_bis"] ?></td>
                    <td><?= $data["jumlah_kursi"] ?></td>
                    <td><a href="<?= base_url("admin/kursi/$data[id_bis]")?>" class="btn btn-primary btn-success">Kursi</a>&nbsp;<button data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning text-white btnUpdate">Update</button>&nbsp;<a href="<?=base_url("admin/menghapusDataBis/$data[id_bis]")?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin')">Delete</a></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</div>

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
        <?= form_open("Admin/tambahDataBis") ?>
        <div class="form-group">
            <label>Id Bis</label>
            <input type="text" class="form-control" name="id_bis"  placeholder="id Bis">
        </div>
        <div class="form-group">
            <label>Jumlah Kursi</label>
            <input type="text" class="form-control" name="jumlah_kursi"  placeholder="jumlah kursi">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-blue">Submit</button>
        </div>
    </form>
    </div>
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
        <?= form_open("Admin/mengubahDataBis") ?>
        <div class="form-group">
            <label>Id Bis</label>
            <input type="text" class="form-control" name="id_bis" id="id_bis" placeholder="Id bis" readonly>
        </div>
        <div class="form-group">
            <label>Jumlah Kursi</label>
            <input type="text" class="form-control" name="jumlah_kursi" id="jumlah_kursi">
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-blue">Submit</button>
        </div>
    </form>
    </div>
  </div>`
</div>

<script>
    $(".btnUpdate").on("click",function(){
        var tr = ($(this).parent()).parent()

        // mengambil data yang ada di tabel
        var idBis = tr.children(":nth-child(2)").text()
        var jumlahKursi = tr.children(":nth-child(3)").text()
  

        $("#id_bis").attr("value",idBis)
        $("#jumlah_kursi").val(jumlahKursi)
     
    });

</script>