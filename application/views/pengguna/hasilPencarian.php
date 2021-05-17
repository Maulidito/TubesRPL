<!-- tag div yang digunakan sebagai kerangka dari halaman cari tiket -->
<div class="boxBackground boxHasilPencarian">
    <div class="container">
        <div class="row transparentBox headerHasilPencarian .no-gutters">
            <!-- untuk menampilkan informasi tiket keberangkatan sesuai dengan parameter pencarian -->
            <div class="col-sm-8">
                <h2><?= $keyPencarian["kotaAsal"] ?> <img src="<?= base_url("assets/img/iconPanah.svg") ?>"> <span id="tujuan"><?= $keyPencarian["kotaTujuan"] ?></span></h2>
                <h2><?= ubahFormatTanggal($keyPencarian["tanggal"]) ?></h2>
                <h5><?= $keyPencarian["penumpang"] ?> kursi</h5>
            </div>
            <!-- untuk menampilkan sistem informasi cuaca di tempat tujuan -->
            <div class="col-sm-4 infoCuaca">
                <div class="row no-gutters">
                    <div class="col iconCuaca">
                    </div>
                    <div class="col">
                        <h5>Cuaca di <?= $keyPencarian["kotaTujuan"] ?></h5>
                        <h5><span id="temperatur"></span>&#8451;</h5>
                        <h5 id="keteranganCuaca"></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- kerangka div dari list tiket yang tersedia -->
        <div class="transparentBox pilihTiket">
            <div class="col-sm-4">
                <h5>Pilih Jam Keberangkatan</h5>
            </div>
            <ul class="list-group">
                <!-- list dari tiket diambil dari variabel $data[hasilPencarian] yang telah dioper dari controller -->
                <?php foreach($hasilPencarian as $data): ?>
                    <li class='list-group-item'>
                        <div class="row align-items-center listTiket">
                            <div class="col">
                                <h5>Jam Berangkat</h5>
                                <h5 class="text-primary"><?= $data['jam_keberangkatan'] ?></h5>
                            </div>
                            <div class="col">
                                <h5>Harga</h5>
                                <h5 class="text-primary">Rp.<?= number_format($data['harga']) ?></h5>
                            </div>
                            <div class="col">
                                <h5>Kursi Kosong</h5>
                                <h5 class="text-primary">40</h5>
                            </div>
                            <div class="col">
                                <a href="<?= base_url("pesanTiket/formPemesanan/$data[id_tiket]/$keyPencarian[tanggal]/$keyPencarian[penumpang]") ?>" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<script>
    // mengambil elemen span dengan id tujuan
    var kotaTujuan = $("#tujuan")
    // Untuk mengambil data informasi cuaca dari API openweather
    fetch("https://api.openweathermap.org/data/2.5/weather?q="+kotaTujuan.text()+"&lang=id&appid=43d63594d997f9705d82ccb598fef7a4")
    .then(response => response.json())
    .then(function(data){
        // memasukkan data dari API openweather kedalam variable
        var celcius = data.main.temp - 273
        var icon = data.weather[0].icon
        var keteranganCuaca = data.weather[0].description

        // menampilkan hasil informasi cuaca dari API openweather ke tag html
        $("#temperatur").text(celcius.toFixed(2))
        $(".iconCuaca").append("<img src='http://openweathermap.org/img/wn/"+icon+"@2x.png'>")
        $("#keteranganCuaca").text(keteranganCuaca)
    })
    .catch(err => alert("Maaf terjadi kesalahan koneksi, Informasi cuaca tidak dapat ditampilkan"))
</script>