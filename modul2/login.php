<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>LOGIN</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="">


    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link href="assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html">
                                            <img width="80" src="https://unibamadura.ac.id/page/images/profil/1.png" alt="">
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Login menggunakan akun anda</h4>
                                    <?php 
                                    if(isset($_GET['err'])) {
                                        $error = $_GET['err'];
                                        if($error == 'not') {
                                            echo '
                                                <div class="alert alert-warning alert-dismissable alert-alt fade show">
                                                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    </button>
                                                    <strong>Peringatan ! </strong>Tidak Dapat Masuk Login Dulu.
                                                </div>
                                            ';
                                        } else{
                                            echo '
                                                <div class="alert alert-danger alert-dismissable alert-alt fade show mt-3">
                                                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    </button>
                                                    <strong>Peringatan ! </strong>Email / Password Salah.
                                                </div>
                                            ';
                                        }
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="mb-1 form-label"> Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="mb-4 position-relative">
                                            <label class="mb-1 form-label">Password</label>
                                            <input type="password" id="dz-password" class="form-control" placeholder="123456" name="password">
                                            <span class="show-pass eye">

                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>

                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary light btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <?php
                                    include 'koneksi.php';
                                    if(isset($_POST['login'])) {
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];

                                        $cek = mysqli_query($conn, "SELECT * FROM operator WHERE email_operator = '$email' AND password_operator = '$password'");

                                        if(mysqli_num_rows($cek) > 0){
                                            $operator = mysqli_query($conn, "SELECT * FROM operator WHERE email_operator = '$email' AND password_operator = '$password'");

                                            $row = mysqli_fetch_array($operator);

                                            $_SESSION['email_operator'] = $row['email_operator'];
                                            $_SESSION['nama_operator'] = $row['nama_operator'];
                                            $_SESSION['id_operator'] = $row['id_operator'];
                                            $id_operator = $row['id_operator'];

                                            //set waktu login 
                                            date_default_timezone_set("Asia/Jakarta");
                                            $waktu_login = date('Y-m-d H:i:s');

                                            // update login
                                            mysqli_query($conn, "UPDATE operator SET last_login = '$waktu_login' WHERE id_operator = $id_operator");

                                            header("Location: index.php");
                                            exit();
                                        } else{
                                            header("Location: login.php?err=false");
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="asset/js/custom.min.js"></script>
    <script src="asset/js/deznav-init.js"></script>
</body>

</html>