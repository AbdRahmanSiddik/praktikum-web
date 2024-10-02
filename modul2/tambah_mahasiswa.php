<?php
$title = 'Tambah Mahasiswa';
include 'layout/header.php';
include 'koneksi.php';
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="data_mahasiswa.php">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Mahasiswa</li>
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
                <input type="text" class="form-control" name="nim_mahasiswa" placeholder="Masukkan NIM...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Nama Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" name="tgl_lahir">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Jenis Kelamin</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="L">
                    <label class="form-check-label" for="">Laki_Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="P">
                    <label class="form-check-label" for="">Perempuan</label>
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
                    <?php foreach ($option_jurusan as $key) : ?>
                        <option value="<?= $key['id_jurusan'] ?>"><?= $key['nama_jurusan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="data_mahasiswa.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php
include 'layout/footer.php';

if (isset($_POST['simpan'])) {

    $nim_mahasiswa = $_POST['nim_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];

    $cekNIM = mysqli_query($conn, "SELECT * FROM data_mahasiswa WHERE nim_mahasiswa = '$nim_mahasiswa'");
    if (mysqli_num_rows($cekNIM) > 0) {
        echo "
            <script>
                alert('Data NIM $nim_mahasiswa sudah ada');
            </script>
        ";
    } else {
        $simpan = mysqli_query($conn, "INSERT INTO data_mahasiswa VALUES(null, '$nama_mahasiswa', '$nim_mahasiswa', '$tgl_lahir', '$jenis_kelamin', '$jurusan')");
        if ($simpan) {
            echo '<script>
                alert("data berhasil disimpan");
                window.location.href="data_mahasiswa.php";
            </script>';
        }
    }
}

?>