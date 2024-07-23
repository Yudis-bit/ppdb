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

// Ambil data pendaftar
$result = $conn->query("SELECT * FROM siswa");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Custom CSS -->
    <title>Dashboard Admin</title>
</head>
<body>
    <div class="container mt-5">
        <div class="header d-flex justify-content-between align-items-center">
            <h1 class="text-center">Dashboard Admin</h1>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nisn']; ?></td>
                    <td><?php echo $row['tempat_lahir']; ?></td>
                    <td><?php echo $row['tanggal_lahir']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['nama_ayah']; ?></td>
                    <td><?php echo $row['nama_ibu']; ?></td>
                    <td><?php echo $row['no_telepon']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><a href="uploads/<?php echo $row['dokumen']; ?>" class="btn btn-primary">Lihat Dokumen</a></td>
                    <td>
                        <a href="view_profile.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Lihat Profil</a>
                        <a href="edit_profile.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit Profil</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
