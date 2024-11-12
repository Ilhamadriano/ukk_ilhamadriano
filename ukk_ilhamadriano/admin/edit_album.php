<?php
session_start();
if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda Belum Login!');
        location.href='../index.php';
    </script>";
    exit();
}

// Cek apakah ada ID album yang diterima
if (isset($_GET['id'])) {
    $albumid = $_GET['id'];
    
    // Koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'ukk_ilhamadriano';  // Ganti dengan nama database Anda
    $koneksi = mysqli_connect($host, $user, $password, $dbname);
    
    if (!$koneksi) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Ambil data album berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM album WHERE albumid='$albumid' AND userid='" . $_SESSION['userid'] . "'");
    $album = mysqli_fetch_assoc($query);
    
    // Cek jika album tidak ditemukan
    if (!$album) {
        echo "<script>
            alert('Album tidak ditemukan!');
            location.href='album.php';
        </script>";
        exit();
    }
} else {
    // Jika ID album tidak ditemukan dalam URL
    echo "<script>
        alert('ID album tidak valid!');
        location.href='album.php';
    </script>";
    exit();
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Album</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">GalleryHamz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a href="album.php" class="nav-link">Album</a>
                    <a href="tambahfoto.php" class="nav-link">Tambah Foto</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Edit Album</h2>
        <form action="../config/aksi_edit_album.php" method="POST">
            <input type="hidden" name="albumid" value="<?php echo $album['albumid']; ?>">

            <div class="mb-3">
                <label for="namaalbum" class="form-label">Nama Album</label>
                <input type="text" class="form-control" id="namaalbum" name="namaalbum" value="<?php echo $album['namaalbum']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $album['deskripsi']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="edit">Update Album</button>
            <a href="album.php" class="btn btn-secondary mt-1">Kembali ke Daftar Album</a>

        </form>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
