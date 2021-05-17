<div class="boxBackground boxFormPemesanan">
    <div class="container">
        <div class="transparentBox boxPembayaran">
            <?php if($this->session->userdata("konfirmasiPembayaran") == null): ?>
            <div class="boxInfoTiket">
                <div class="row headerBiru headerPembayaran">
                    <h2>Tiket Berhasil Dipesan</h2>
                </div>
                <div class="bodyInfoTiket bodyPembayaran">
                    <h5>Silahkan melakukan pembayaran di terminal atau direkening berikut ini :</h5>
                    <h1 class="text-danger">0928 8274 8282 1234</h1>
                    <h4>A/n PT Bus Jaya, BCA</h4>
                    <h5 class="text-secondary">Mohon mengisi form konfirmasi pembayaran jika 
                        melakukan pembayaran melalui transfer.</h5>
                </div>
            </div>
            <?php else: ?>
            <div class="boxInfoTiket">
                <div class="row headerBiru headerPembayaran">
                    <h2>Tiket Berhasil Dipesan</h2>
                </div>
                <div class="bodyInfoTiket bodyPembayaran">
                    <h1 class="text-success">Konfirmasi Pembayaran Berhasil Dikirim. Kami Akan Mengkonfirmasi Tiket Anda Melalu Telepon dan Email.</h1>
                </div>
            </div>
            <?php endif; ?>
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
                        <h5><?= $tiket["nama_pemesan"] ?></h5>
                        <h6>Nama Pemesan</h6>
                        <h5><?= "0".$tiket["no_telp"] ?></h5>
                        <h6>Nomor Telepon</h6>
                        <h5><?= $tiket["email"] ?></h5>
                        <h6>Email</h6>
                        <h5><?= $tiket["kota_asal"] ?></h5>
                        <h6>Keberangkatan</h6>
                        <h5><?= $tiket["kota_tujuan"] ?></h5>
                        <h6>Tujuan</h6>
                        <h5><?= ubahFormatTanggal($tiket["tgl_pemesanan"]) ?></h5>
                        <h6>Tanggal</h6>
                    </div>
                    <div class="col text-center">
                        <h3>Kursi</h3>
                        <h4 class="font-weight-normal"><?= $tiket["jumlah_penumpang"] ?></h4>
                        <h3>Total Harga</h3>
                        <h4 class="font-weight-normal text-danger">Rp.<?= number_format($tiket["total_biaya"]) ?>,-</h4>
                    </div>
                    <?php if($this->session->userdata("konfirmasiPembayaran") == null): ?>
                    <div class="col float-right mt-2 mb-2 mr-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-blue font-weight-bold mr-1" data-toggle="modal" data-target="#exampleModalCenter">
                            Konfirmasi Pembayaran
                        </button>
                        <a href="<?= site_url("pesanTiket/batalPembayaran/$tiket[id_pesanan]") ?>" class="btn btn-danger font-weight-bold">Batal</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerBiru">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open("pesanTiket/konfirmasiPembayaran") ?>
        <div class="form-group">
            <label>Nama Pengirim</label>
            <input type="text" class="form-control" name="nama_pengirim" placeholder="Nama Pengirim">
            <small>Sesuai dengan nama akun di bank</small>
        </div>
        <div class="form-group">
            <label>No Rekening</label>
            <input type="text" class="form-control" name="no_rekening" placeholder="No Rekening">
        </div>
        <div class="form-group">
            <label>Tanggal Transfer</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal">
        </div>
        <input type="hidden" name="total_pembayaran" value="<?= $tiket["total_biaya"] ?>">
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
    var date = new Date()

    var hari = date.getDate()
    var bulan = date.getMonth() + 1
    var tahun = date.getFullYear()

    if(hari < 10 ){
        hari = "0" + hari.toString()
    }
    if(bulan < 10){
        bulan = "0" + bulan.toString()
    }

    tanggal = tahun.toString() + '-' + bulan + '-' + hari
    $("#tanggal").attr("min",tanggal)
</script>