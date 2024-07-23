<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'ppdb_smpn2_cibadak');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username dan password
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) { // Perbandingan langsung tanpa hashing
            // Jika login berhasil, buat sesi dan arahkan ke dashboard
            $_SESSION['admin'] = $username;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            header('Location: login.php?error=Password salah.');
            exit;
        }
    } else {
        header('Location: login.php?error=Username tidak ditemukan.');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}

$conn->close();
?>
