<?php 
$title = 'Edit Data Mahasiswa';
include 'layout/header.php';
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM data_mahasiswa WHERE id_mahasiswa = '$id'");
$get = mysqli_fetch_array($query);

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="data_mahasiswa.php">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Mahasiswa</li>
    </ol>
</nav>

<form method="POST" action="" class="card">
    <div class="card-header">
        Form Mahasiswa
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIM Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nim_mahasiswa']?>" name="nim_mahasiswa" placeholder="Masukkan NIM...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Nama Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_mahasiswa']?>" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" value="<?= $get['tgl_lahir']?>" name="tgl_lahir">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Jenis Kelamin</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="L" <?php if ($get['jenis_kelamin'] == "L") echo "checked"; ?>>
                    <label class="form-check-label" for="">
                        Laki_Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="P" <?php if ($get['jenis_kelamin'] == "P") echo "checked"; ?>>
                    <label class="form-check-label" for="">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Jurusan</label>
            </div>
            <div class="col-lg-9">
                <?php $option_jurusan = mysqli_query($conn, "SELECT * FROM data_jurusan"); ?>
                <select class="form-select" size="3" aria-label="Size 3 select example" name="jurusan">
                    <?php foreach($option_jurusan as $key): ?>
                        <?php $selected = ($key["id_jurusan"] == $get['id_jurusan']) ? 'selected' : ''; ?>
                        <option value="<?= $key['id_jurusan'] ?>" <?= $selected; ?>><?= $key['nama_jurusan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="edit" class="btn btn-success">Edit Data</button>
        <a href="data_mahasiswa.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php 
include 'layout/footer.php';
include 'koneksi.php';

if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $nim_mahasiswa = $_POST['nim_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_jurusan = $_POST['jurusan'];

    $simpan = mysqli_query($conn, "UPDATE data_mahasiswa
        SET
        nim_mahasiswa = '$nim_mahasiswa',
        nama_mahasiswa = '$nama_mahasiswa',
        tgl_lahir = '$tgl_lahir',
        jenis_kelamin = '$jenis_kelamin',
        id_jurusan = '$id_jurusan'
        WHERE id_mahasiswa = '$id'
    ");

    if($simpan){
        echo '<script>
            alert("data berhasil di edit");
            window.location.href="data_mahasiswa.php";
        </script>';
    }
}
?>