<?php 
$title = 'Data Jurusan';
include 'layout/header.php';

// memanggil fungsi koneksike database
include 'koneksi.php';

// membuat query untuk memanggil data
$query = mysqli_query($conn, "SELECT j.id_jurusan, j.nama_jurusan, COUNT(m.id_mahasiswa) as jumlah_mahasiswa
                            FROM data_jurusan j
                            LEFT JOIN data_mahasiswa m ON j.id_jurusan = m.id_jurusan
                            GROUP BY j.id_jurusan
");
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="data_mahasiswa.php">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Jurusan</li>
    </ol>
</nav>

<div class="card">
    <div class="card-header">
        List Mahasiswa
    </div>
    <div class="card-body">
        <a href="tambah_jurusan.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Jurusan</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($query as $get) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $get['nama_jurusan']; ?></td>
                            <td><?= $get['jumlah_mahasiswa']; ?></td>
                            <td>
                                <a href="edit_jurusan.php?id=<?= $get['id_jurusan'];?>" class="badge bg-primary">Edit</a>
                                <a onclick="return confirm('Hapus Data?')" href="hapus_jurusan.php?id=<?= $get['id_jurusan'];?>" class="badge bg-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>