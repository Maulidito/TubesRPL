<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Tiket PT. Bus Jaya</h1>
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
                <th>Id Tiket</th>
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
                    <td><?= $data["kota_asal"] ?></td>
                    <td><?= $data["kota_tujuan"] ?></td>
                    <td><?= $data["jam_keberangkatan"] ?></td>
                    <td><?= "Rp.",number_format($data["harga"]) ?></td>
                    <td><a href="" class="btn btn-primary btn-blue">Update</a>&nbsp;<a href="" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</div>