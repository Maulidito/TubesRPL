<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Pesanan PT. Bus Jaya</h1>
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
                    <td><a href="<?= base_url("admin/detail_pesanan/$data[id_pesanan]") ?>" class="btn btn-success">Detail</a>&nbsp;<a href="<?= base_url("admin/pesanan/$data[id_pesanan]") ?>" class="btn btn-warning">Update</a>&nbsp;<a href="" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</div>