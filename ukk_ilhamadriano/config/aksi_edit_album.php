<?php
session_start();
if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda Belum Login!');
        location.href='../index.php';
    </script>";
    exit();
}

// Cek jika data sudah diterima
if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];

    // Koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'ukk_ilhamadriano'; // Ganti dengan nama database Anda
    $koneksi = mysqli_connect($host, $user, $password, $dbname);

    if (!$koneksi) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Update data album
    $sql = "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi' WHERE albumid='$albumid' AND userid='" . $_SESSION['userid'] . "'";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
            alert('Album berhasil diupdate');
            location.href='../admin/album.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengupdate album');
            location.href='album.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Data tidak lengkap');
        location.href='album.php';
    </script>";
}
?>
