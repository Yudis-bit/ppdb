<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'ppdb_smpn2_cibadak');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil dan validasi data dari form
    $nama = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama']));
    $nisn = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nisn']));
    $tempat_lahir = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tempat_lahir']));
    $tanggal_lahir = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tanggal_lahir']));
    $alamat = mysqli_real_escape_string($conn, htmlspecialchars($_POST['alamat']));
    $nama_ayah = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama_ayah']));
    $nama_ibu = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama_ibu']));
    $no_telepon = mysqli_real_escape_string($conn, htmlspecialchars($_POST['no_telepon']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $dokumen = $_FILES['dokumen']['name'];

    // Path untuk upload dokumen
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["dokumen"]["name"]);

    // Validasi tipe file
    $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    if (!in_array($file_type, $allowed_types)) {
        die("Tipe file tidak diperbolehkan.");
    }

    move_uploaded_file($_FILES["dokumen"]["tmp_name"], $target_file);

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO siswa (nama, nisn, tempat_lahir, tanggal_lahir, alamat, nama_ayah, nama_ibu, no_telepon, email, dokumen) VALUES ('$nama', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$nama_ayah', '$nama_ibu', '$no_telepon', '$email', '$dokumen')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Pendaftaran berhasil.</div></div>";
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div></div>";
    }

    $conn->close();
}
?>
