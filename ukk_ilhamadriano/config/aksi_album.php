<?php
session_start(); 
include 'koneksi.php';


if (isset($_POST['tambah'])) {
  $namaalbum = $_POST['namaalbum'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal = date('Y-m-d');
  $userid = $_SESSION['userid'];

  $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('',' $namaalbum', '$deskripsi', '$tanggal', '$userid')");
  
  echo "<script>
  alert('Data berhasil disimpan!');
  location.href='../admin/album.php';
  </script>";
}

  ?>
  


