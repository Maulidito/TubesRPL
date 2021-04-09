<div class="boxBackground boxHasilPencarian">
    <div class="container">
        <div class="row transparentBox headerHasilPencarian .no-gutters">
            <div class="col-sm-8">
                <h2><?= $keyPencarian["kotaAsal"] ?> <img src="<?= base_url("assets/img/iconPanah.svg") ?>"> <?= $keyPencarian["kotaTujuan"] ?></h2>
                <h2><?= $keyPencarian["tanggal"] ?></h2>
                <h5><?= $keyPencarian["penumpang"] ?> kursi</h5>
            </div>
            <div class="col-sm-4 infoCuaca">
                <div class="row no-gutters">
                    <div class="col">
                        <img src="<?= base_url("assets/img/iconAwan.svg") ?>" alt="">
                    </div>
                    <div class="col">
                        <h5>Cuaca di <?= $keyPencarian["kotaTujuan"] ?></h5>
                        <h5>22 C</h5>
                        <h5>Berawan</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="transparentBox pilihTiket">
            <div class="col-sm-4">
                <h5>Pilih Jam Keberangkatan</h5>
            </div>
            <ul class="list-group">
                <?php foreach($hasilPencarian as $data): ?>
                    <li class='list-group-item'>
                        <div class="row align-items-center listTiket">
                            <div class="col">
                                <h5>Berangkat</h5>
                                <h5><?= $data['jam_keberangkatan'] ?></h5>
                            </div>
                            <div class="col">
                                <h5>Harga</h5>
                                <h5>Rp.<?= number_format($data['harga']) ?></h5>
                            </div>
                            <div class="col">
                                <h5>Kursi Kosong</h5>
                                <h5>40</h5>
                            </div>
                            <div class="col">
                                <a href="<?= base_url("pesanTiket/formPemesanan") ?>" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>