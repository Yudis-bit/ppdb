<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Pendaftaran Siswa Baru</title>
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h4 class="text-center mb-4">Formulir Pendaftaran Siswa Baru SMP Negeri 2 CiBadak</h4>
                    <form action="proses_pendaftaran.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nisn">NISN:</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah:</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu:</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">Nomor Telepon:</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="dokumen">Upload Dokumen (Kartu Keluarga, Akta Kelahiran, dll):</label>
                            <input type="file" class="form-control-file" id="dokumen" name="dokumen" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
