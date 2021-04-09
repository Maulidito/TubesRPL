<div class="container">
    <div class="boxHome">
   
        <div class="boxFormSearch">
        <div class="row">
            <div class="col-sm-6">
                <h3></h3>
                <h5><?= $parameter[0] ?></h5>
                <h6><?= $parameter[1] ?></h6>
                <h5><?= $parameter[2] ?></h5>
            </div>
            <div class="justify-content-center align-self-center" style="margin-left:25%" >
                <h2><?= $parameter[3] ?></h2>
                <h6>kursi</h6>
            </div>
        </div>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item list-group-item-secondary">PILIH JAM KEBERANGKATAN</li>
        <?php
            foreach($hasilPencarian as $data){
                echo $data['id_tiket'];
            }
        ?>
    </ul>
</div>