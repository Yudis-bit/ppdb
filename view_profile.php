<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'ppdb_smpn2_cibadak');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM siswa WHERE id='$id'");
$siswa = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profil Siswa</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Profil Siswa</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td><?php echo $siswa['nama']; ?></td>
            </tr>
            <tr>
                <th>NISN</th>
                <td><?php echo $siswa['nisn']; ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td><?php echo $siswa['tempat_lahir']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $siswa['tanggal_lahir']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $siswa['alamat']; ?></td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td><?php echo $siswa['nama_ayah']; ?></td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td><?php echo $siswa['nama_ibu']; ?></td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td><?php echo $siswa['no_telepon']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $siswa['email']; ?></td>
            </tr>
            <tr>
                <th>Dokumen</th>
                <td><a href="uploads/<?php echo $siswa['dokumen']; ?>" class="btn btn-primary">Lihat Dokumen</a></td>
            </tr>
        </table>
        <a href="admin_dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
