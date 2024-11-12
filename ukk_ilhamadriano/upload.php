<?php
// Mulai sesi dan cek login
session_start();
if ($_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda Belum Login!');
        location.href='../index.php';
    </script>";
}

// Include koneksi ke database
include('../config/koneksi.php');

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul_foto = $_POST['judulfoto'];
    $deskripsi_foto = $_POST['deskripsifoto'];
    $nama_album = $_POST['nama_album'];
    $deskripsi_album = $_POST['deskripsi_album'];

    // Proses file upload
    if (isset($_FILES['photoInput']) && $_FILES['photoInput']['error'] == 0) {
        $photo = $_FILES['photoInput']['tmp_name']; // Ambil file gambar
        $photo_data = file_get_contents($photo); // Ambil konten file gambar

        // Escape karakter khusus untuk mencegah SQL Injection
        $judul_foto = mysqli_real_escape_string($conn, $judul_foto);
        $deskripsi_foto = mysqli_real_escape_string($conn, $deskripsi_foto);
        $nama_album = mysqli_real_escape_string($conn, $nama_album);
        $deskripsi_album = mysqli_real_escape_string($conn, $deskripsi_album);

        // Query untuk menyimpan data ke database
        $query = "INSERT INTO photos (judul_foto, photo, deskripsi_foto, nama_album, deskripsi_album) 
                  VALUES ('$judul_foto', '$photo_data', '$deskripsi_foto', '$nama_album', '$deskripsi_album')";

        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Foto berhasil ditambahkan!');
                location.href='album.php';
            </script>";
        } else {
            echo "<script>
                alert('Terjadi kesalahan, coba lagi!');
                location.href='tambahfoto.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Gagal mengupload foto!');
            location.href='tambahfoto.php';
        </script>";
    }
}
?>
