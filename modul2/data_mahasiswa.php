<?php
$title  = "Data Mahasiswa";
include 'layout/header.php';

// memanggil fungsi koneksi ke database
include 'koneksi.php';

// membuat query untuk memanggil data
$query = mysqli_query($conn, "SELECT 
    data_mahasiswa.id_mahasiswa,
    data_mahasiswa.nama_mahasiswa,
    data_mahasiswa.nim_mahasiswa,
    data_mahasiswa.jenis_kelamin,
    data_mahasiswa.tgl_lahir,
    data_jurusan.nama_jurusan
FROM data_mahasiswa
LEFT JOIN data_jurusan ON data_mahasiswa.id_jurusan = data_jurusan.id_jurusan");
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header">
        List Mahasiswa
    </div>
    <div class="card-body">
        <a href="tambah_mahasiswa.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Mahasiswa</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($query as $get) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $get['nim_mahasiswa']; ?></td>
                            <td><?= $get['nama_mahasiswa']; ?></td>
                            <td><?= $get['nama_jurusan']; ?></td>
                            <td>
                                <?php
                                $gender = ($get['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
                                echo $gender;
                                ?>
                            </td>
                            <td><?= $get['tgl_lahir']; ?></td>
                            <td>
                                <a href="edit_mahasiswa.php?id=<?= $get['id_mahasiswa']; ?>" class="badge bg-primary ">Edit</a><a onclick="return confirm('Hapus Data?')" href="hapus_mahasiswa.php?id=<?= $get['id_mahasiswa']; ?>" class="badge bg-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>