<?php
session_start();
require_once 'config/functions.php';

if(isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Konfirgurasi COOKIE
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = $conn->query("SELECT email_user FROM tb_user WHERE email_user = id") or die(mysqli_error($conn));
    $rowC = $result->fetch_assoc();
    if($key == hash('sha256', $rowC['email'])) {
        $_SESSION['user'] = $rowC;
    }
}

if(isset($_POST['masuk'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // cek, apakah email ada di DB
    $result = $conn->query("SELECT * FROM tb_user WHERE email_user = '$email'") or die($conn);
    if($result->num_rows === 1) {
        $rowL = $result->fetch_assoc();
        if(password_verify($password, $rowL['pass_user'])) {
            // set session
            $_SESSION['user'] = $rowL;
            // var_dump($_SESSION['user']); die;

            // SET COOKIE
            if(isset($_POST['rememberme'])) {
                setcookie('id', $rowL['id_user'], time() + 60);
                setcookie('key', hash('sha256', $rowL['email']), time() + 60);
            }
            header("Location: index.php");
            exit;
        }
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">POS<b>RDO</b></a>
            <small>Selamat Datang Di Aplikasi POS</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="">
                    <div class="msg">Masuk Sekarang</div>
                    <?php if(isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Email/Password anda salah!
                        </div>
                    <?php endif; ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="masuk" type="submit">Masuk</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url(); ?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url(); ?>js/admin.js"></script>
    <script src="<?= base_url(); ?>js/pages/examples/sign-in.js"></script>
</body>

</html>