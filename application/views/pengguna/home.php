<div class="boxBackground boxHome">
    <div class="container">
        <h1>Selamat Datang</h1>
        <div class="transparentBox formCariTiket">
            <h3>Cari Tiket Keberangkatan</h3>
            <div class="formAndContact">
                <div class="contact">
                    <h3>Call Center</h3>
                    <h4>+62877 6154 1224</h4>
                </div>
                <?= form_open("pesanTiket/index") ?>
                <div class="form-group">
                    <label>Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value("tanggal") ?>">
                    <?= form_error("tanggal") ?>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Kota Asal</label>
                        <select name="kotaAsal" id="asal" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach($kotaAsal as $row): ?>
                                <option value="<?= $row['kota_asal'] ?>"><?= $row['kota_asal'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error("kotaAsal") ?>
                    </div>
                    <div class="col">
                        <label>Kota Tujuan</label>
                        <select name="kotaTujuan" id="kotaTujuan" class="form-control" disabled>
                            <option>Pilih</option>
                        </select>
                        <?= form_error("kotaTujuan") ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Jumlah Penumpang</label>
                    <input type="number" name="jmlPenumpang" class="form-control" placeholder="Jumlah Penumpang" value="<?= set_value("jmlPenumpang") ?>">
                    <?= form_error("jmlPenumpang") ?>
                </div>
                <input type="submit" value="Cari Tiket" class="btn btn-primary btn-block">
            </form>
            </div>
        </div>
    </div>
    </div>
</div>
<script>
    // mengambil tanggal hari ini, dan dijadikan min untuk input type date
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

    // Mengambil data keberangkatan sesuai dengan data asal
    $("#asal").change(function(){
        var asal = $("option:selected",this).attr("value")

        $.ajax({
            url : "<?= base_url('pesanTiket/getTujuan'); ?>",
            method : "GET",
            data : {
                asal : asal
            },
            dataType : "json",
            success:function(data){
                // menghapus data kota Tujuan sebelumnya agar data tidak double
                $("#kotaTujuan option").remove();
                $("#kotaTujuan").append($('<option>',{value : "",text : "Pilih"}))
                $.each(data, function(i, item){
                    $("#kotaTujuan").append($('<option>', {
                        value : item.kota_tujuan,
                        text : item.kota_tujuan
                    }));    
                });
                $("#kotaTujuan").prop("disabled",false);
            }
        })
    })
</script>