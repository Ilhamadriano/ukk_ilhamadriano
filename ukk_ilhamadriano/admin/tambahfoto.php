<?php
session_start();
$host = 'localhost';
$username = 'root'; // ganti dengan username database Anda
$password = ''; // ganti dengan password database Anda
$dbname = 'ukk_ilhamadriano'; // ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah sudah login
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php';
    </script>";
}

$fotoTerbaru = '';  // Variabel untuk menyimpan path foto yang baru di-upload

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judulFoto = $_POST['judulfoto'];
    $deskripsiFoto = $_POST['deskripsifoto'];
    $namaAlbum = $_POST['nama_album'];
    $deskripsiAlbum = $_POST['deskripsi_album'];

    // Upload foto
    $foto = $_FILES['photoInput']['name'];
    $tmp_name = $_FILES['photoInput']['tmp_name'];
    $uploadDir = "gambar/"; // Folder untuk menyimpan foto (gunakan path yang tepat)
    $fotoPath = $uploadDir . basename($foto);

    // Periksa apakah folder upload ada, jika tidak buat
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($tmp_name, $fotoPath)) {
        // Ambil userid dari session
        $userId = $_SESSION['userid'];  // Pastikan session 'userid' sudah ada
        
        // Ambil tanggal upload saat ini
        $tanggalUnggah = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

        // Query untuk memasukkan data ke tabel foto
        $sql = "INSERT INTO foto (judulfoto, deskripsifoto, tanggalunggah, lokasifile, albumid, userid) 
                VALUES ('$judulFoto', '$deskripsiFoto', '$tanggalUnggah', '$fotoPath', 
                        (SELECT albumid FROM album WHERE nama_album = '$namaAlbum' LIMIT 1), '$userId')";

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            // Ambil foto terbaru yang baru saja di-upload
            $fotoTerbaru = $fotoPath;
            $judulFoto = htmlspecialchars($judulFoto);  // sanitize the title to avoid XSS
            $deskripsiFoto = htmlspecialchars($deskripsiFoto);  // sanitize the description to avoid XSS
        } else {
            echo "<script>
                    alert('Error: Gagal menambahkan foto! " . $conn->error . "');
                  </script>";
        }
    } else {
        echo "<script>
        alert('Gagal mengupload foto!');
        </script>";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Foto</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

<div class="container mt-4">
    <div class="form-container mt-4 p-3 shadow-lg rounded bg-white" style="max-width: 500px; margin: 0 auto;">
        <h2 class="text-center mb-4 text-primary">Tambah Foto</h2>
        <form method="POST" enctype="multipart/form-data" action="tambahfoto.php">
            <div class="mb-3">
                <label for="judulfoto" class="form-label text-dark">Judul Foto</label>
                <input type="text" class="form-control border-2 border-primary rounded-3" id="judulfoto" name="judulfoto" required>
            </div>
            <div class="mb-3">
                <label for="photoInput" class="form-label text-dark">Pilih Foto</label>
                <input type="file" class="form-control border-2 border-primary rounded-3" id="photoInput" name="photoInput" accept="image/*" required onchange="previewImage()">
            </div>
            <div class="mb-3">
                <label for="deskripsifoto" class="form-label text-dark">Deskripsi Foto</label>
                <textarea class="form-control border-2 border-primary rounded-3" id="deskripsifoto" name="deskripsifoto" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="nama_album" class="form-label text-dark">Nama Album</label>
                <input type="text" class="form-control border-2 border-primary rounded-3" id="nama_album" name="nama_album" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi_album" class="form-label text-dark">Deskripsi Album</label>
                <textarea class="form-control border-2 border-primary rounded-3" id="deskripsi_album" name="deskripsi_album" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm border-0 py-2 mt-3 text-uppercase">Tambahkan Foto</button>
        </form>

        <!-- Preview Foto -->
        <div id="photoPreview" class="mt-3" style="display:none;">
            <h5 class="text-center">Preview Foto</h5>
            <img id="previewImage" class="img-fluid rounded mx-auto d-block" style="max-width: 100%; height: auto;">
        </div>

        <!-- Menampilkan Foto yang Baru Ditambahkan -->
        <?php if ($fotoTerbaru != ''): ?>
            <div class="mt-5 text-center">
                <h3>Foto Baru Ditambahkan</h3>
                <img src="<?php echo $fotoTerbaru; ?>" alt="Foto Baru" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                <p><strong>Judul Foto:</strong> <?php echo $judulFoto; ?></p>
                <p><strong>Deskripsi Foto:</strong> <?php echo $deskripsiFoto; ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan preview gambar
    function previewImage() {
        const fileInput = document.getElementById("photoInput");
        const previewContainer = document.getElementById("photoPreview");
        const previewImage = document.getElementById("previewImage");

        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = "block"; // Tampilkan container preview
            };

            reader.readAsDataURL(file);
        }
    }
</script>

<style>
    /* Gaya CSS */
    .form-container {
        background-color: #f8f9fa;
    }
    .form-container h2 {
        font-weight: 600;
        color: #007bff;
    }
    .form-control {
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
