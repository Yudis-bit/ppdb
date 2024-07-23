<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'ppdb_smpn2_cibadak');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data pengumuman
$result = $conn->query("SELECT * FROM pengumuman");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Pengumuman Hasil Seleksi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Pengumuman Hasil Seleksi</h1>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="alert alert-info">
                <h4><?php echo $row['judul']; ?></h4>
                <p><?php echo $row['isi']; ?></p>
                <p><small><?php echo $row['tanggal']; ?></small></p>
            </div>
        <?php endwhile; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
