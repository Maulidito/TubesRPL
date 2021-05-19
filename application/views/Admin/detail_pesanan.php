<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Detail Pesanan</h1>
    </div>

    <!-- tag div untuk kerangka konten dari halaman -->
    <div class="contentAdmin">
        <div class="searchDanTambah d-flex flex-row">
            <!-- form search -->
            <form action="" class="p-2">
                <div class="form-inline">
                    <input type="text" class="form-control" placeholder="Cari">&nbsp;
                    <input type="submit" value="Cari" class="btn btn-primary btn-blue">
                </div>
            </form>
            <!-- Button tambah data -->
            <div class="p-2 ml-auto">
                <a href="" class="btn btn-primary btn-blue">Tambah Data</a>
            </div>
        </div>

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
                    <td><a href="<?= base_url("admin/pesanan/$data[id_pesanan]") ?>" class="btn btn-warning">Update</a>&nbsp;<a href="" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</div>