<?php
session_start();
if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda Belum Login!');
        location.href='../index.php';
    </script>";
    exit();
}

// Cek jika ID album diteruskan
if (isset($_GET['id'])) {
    $albumid = $_GET['id'];

    // Koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'ukk_ilhamadriano'; // Ganti dengan nama database Anda
    $koneksi = mysqli_connect($host, $user, $password, $dbname);

    if (!$koneksi) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Query untuk menghapus album
    $sql = "DELETE FROM album WHERE albumid='$albumid' AND userid='" . $_SESSION['userid'] . "'";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
            alert('Album berhasil dihapus');
            location.href='album.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus album');
            location.href='album.php';
        </script>";
    }
} else {
    // Jika ID album tidak diteruskan
    echo "<script>
        alert('ID album tidak valid!');
        location.href='album.php';
    </script>";
}
?>
