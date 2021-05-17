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

<body class="loginBody">
    <!-- tag div untuk kerangka dari form login -->
    <div class="loginForm">
        <!-- link yang mengarahkan ke halaman mencari tiket -->
        <a href="<?= base_url("pesanTiket") ?>" class="text-decoration-none"><h1>Bus Jaya</h1></a>
        <!-- form login dengan action ke controller Admin dengan method login -->
        <?= form_open("Admin/login") ?>
        <!-- tag html untuk membuat input  -->
            <div class="form-group">
                <img src="<?= base_url("assets/img/iconUser.svg") ?>">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
                <?= form_error("username") ?>
            </div>
            <!-- tag html untuk membuat input password -->
            <div class="form-group">
                <img src="<?= base_url("assets/img/iconPassword.svg") ?>">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?= form_error("password") ?>
            </div>
            <!-- button untuk submit form -->
            <button type="submit" class="btn btn-primary btn-blue btn-block">Submit</button>
            <!-- link yang mengarahkan ke halaman mencari tiket -->
            <a href="<?= base_url("pesanTiket") ?>" class="backToHome text-decoration-none">Back to homepage</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>