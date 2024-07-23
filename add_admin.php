<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'ppdb_smpn2_cibadak');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tambahkan admin baru tanpa password hashing
$username = 'admin';
$password = 'admin_password'; // Simpan password dalam bentuk plain text

$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Admin berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
