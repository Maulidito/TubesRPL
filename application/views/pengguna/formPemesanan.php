<div class="boxBackground boxFormPemesanan">
    <div class="container">
        <div class="transparentBox">
            <h1>Data Penumpang</h1>
        </div>
        <div class="transparentBox formPemesanan">
            <div class="boxInfoTiket">
                <div class="row headerBiru headerInfoTiket">
                    <div class="col-sm-10">
                        <h3><?= $tiket["kota_asal"] ?> <img src="<?= base_url("assets/img/iconPanahWhite.svg") ?>"> <?= $tiket["kota_tujuan"] ?></h3>
                    </div>
                    <div class="col text-center">
                        <img src="<?= base_url("assets/img/iconTiket.svg") ?>">
                    </div>
                </div>
                <div class="row bodyInfoTiket">
                    <div class="col-sm-10">
                        <h5><?= $tiket["kota_asal"] ?></h5>
                        <h6>Keberangkatan</h6>
                        <h5><?= $tiket["kota_tujuan"] ?></h5>
                        <h6>Tujuan</h6>
                        <h5><?= ubahFormatTanggal($keyPencarian["tanggal"]) ?></h5>
                        <h6>Tanggal</h6>
                    </div>
                    <div class="col text-center">
                        <h5><?= $keyPencarian["penumpang"] ?></h5>
                        <h5>Kursi</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="headerBiru">
                        <h4 class="text-center">Data Penumpang</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="headerBiru">
                        <h4 class="text-center">Informasi Penumpang</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="<?= base_url("pesanTiket/formPemesanan/$tiket[id_tiket]/$keyPencarian[tanggal]/$keyPencarian[penumpang]") ?>" method="post" class="formDataPenumpang">
                        <div class="form-group">
                            <label>Nama Pemesan</label>
                            <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Pemesan" value="<?= set_value("nama") ?>">
                            <?= form_error("nama") ?>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control form-control-sm" name="noTelp" placeholder="No Telepon" value="<?= set_value("noTelp") ?>">
                            <?= form_error("noTelp") ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" placeholder="Email" value="<?= set_value("email") ?>">
                            <?= form_error("email") ?>
                        </div>
                        <input type="hidden" name="idTiket" value="<?= $tiket['id_tiket'] ?>">
                        <input type="hidden" name="jmlPenumpang" value="<?= $keyPencarian["penumpang"] ?>">
                        <input type="hidden" name="total" value="<?= $tiket["harga"]*$keyPencarian["penumpang"] ?>">
                        <input type="hidden" name="tanggal" value="<?= $keyPencarian["tanggal"] ?>">
                        <input type="submit" value="Pesan Tiket" class="btn btn-primary float-right">
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="col">
                    <form action="" class="formDataPenumpang">
                        <div class="form-group">
                            <label>Jumlah Kursi</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $keyPencarian["penumpang"] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Total Harga</label>
                            <input type="text" class="form-control form-control-sm" name="totalHarga" value="Rp. <?= number_format($tiket["harga"]*$keyPencarian["penumpang"]) ?>,-" disabled>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>