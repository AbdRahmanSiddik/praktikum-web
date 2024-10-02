<?php include 'koneksi.php';
$password = "rahman17";
$email = "abd_rahman-it.student@unibamadura.ac.id";

// $email = $_POST['email'];
// $password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM operator WHERE email_operator = '$email' AND password_operator = '$password'");

if (mysqli_num_rows($cek) > 0) {
    echo "Berhasil";
    $row = mysqli_fetch_array($cek);

    echo $row['email_operator'];
    echo $row['nama_operator'];
    echo $row['id_operator'];
}
?>