<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Bus Jaya</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  </head>
  <body class="bodyAdmin">
    <nav class="navbar navbar-expand-lg navbar-dark nav-blue">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url("Admin/index")?>"><strong><i>Bus Jaya</i></strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url("Admin/index")?>">Tiket</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url("Admin/pesanan")?>">Pesanan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url("Admin/bis")?>">Bis</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url("Admin/pembayaran")?>">Pembayaran</a>
                    </li>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url("Admin/logout")?>">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
            if($this->session->flashdata("succNotice")){
                echo '<div class="alert alert-success" role="alert">
                '.$this->session->flashdata("succNotice").'
                </div>';
                $this->session->unset_userdata("succNotice");
            }
            
            if($this->session->flashdata("errNotice")){
                echo '<div class="alert alert-danger" role="alert">
                '.$this->session->flashdata("errNotice").'
                </div>';
                $this->session->unset_userdata("errNotice");
            }
        ?>
    </div>
