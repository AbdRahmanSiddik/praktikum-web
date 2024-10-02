<?php 
include 'koneksi.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $check_students_query = mysqli_query($conn, "SELECT COUNT(*) as jumlah_mahasiswa FROM data_mahasiswa WHERE id_jurusan = $id");
    $row = mysqli_fetch_assoc($check_students_query);
    $jumlah_mahasiswa = $row['jumlah_mahasiswa'];

    if ($jumlah_mahasiswa == 0) {
        $hapus = mysqli_query($conn, "DELETE FROM data_jurusan WHERE id_jurusan = '$id'");
        
        if ($hapus) {
            echo '<script>
                alert("data berhasil di hapus");
                window.location.href="data_jurusan.php";
            </script>';
        } else{
            echo 'Tidak dapat menghapus data';
        }
    } else{
        echo '<script>
            alert("Jurusan masih memiliki mahasiswa. Tidak dapat menghapus");
            window.location.href="data_jurusan.php";
        </script>';
    }
} else{
    echo 'Errorrrr request';
}

?>