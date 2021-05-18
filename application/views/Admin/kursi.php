<div class="container">
    <!-- Judul dari halaman -->
    <div class="headerAdmin">
        <h1>Data Kursi PT. Bus Jaya</h1>
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
                <th>Nomor Kursi</th>
                <th>Aksi</th>
               
            </tr>
            <!-- Baris dari tabel, yang diambil dari variabel data[tiket] yang telah dioper sebelumnya -->
            <?php
                $i = 1;
                foreach ($kursi as $data):
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["nomor_kursi"] ?></td>
                    
                  
                    <td><a href="" class="btn btn-primary btn-blue">Update</a>&nbsp;<a href="" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php 
                $i++;
                endforeach; 
            ?>
        </table>
    </div>
</div>