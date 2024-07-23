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

// Proses pembaruan data jika formulir disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama']));
    $nisn = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nisn']));
    $tempat_lahir = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tempat_lahir']));
    $tanggal_lahir = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tanggal_lahir']));
    $alamat = mysqli_real_escape_string($conn, htmlspecialchars($_POST['alamat']));
    $nama_ayah = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama_ayah']));
    $nama_ibu = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama_ibu']));
    $no_telepon = mysqli_real_escape_string($conn, htmlspecialchars($_POST['no_telepon']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));

    // Query untuk memperbarui data siswa
    $sql = "UPDATE siswa SET nama='$nama', nisn='$nisn', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', no_telepon='$no_telepon', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Profil berhasil diperbarui.</div></div>";
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div></div>";
    }
} else {
    // Ambil data siswa berdasarkan ID
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM siswa WHERE id='$id'");
    $siswa = $result->fetch_assoc();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Profil Siswa</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Profil Siswa</h1>
        <form action="edit_profile.php" method="post">
            <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $siswa['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $siswa['nisn']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $siswa['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah:</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $siswa['nama_ayah']; ?>">
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $siswa['nama_ibu']; ?>">
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon:</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $siswa['no_telepon']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $siswa['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="admin_dashboard.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
