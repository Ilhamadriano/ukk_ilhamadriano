<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GalleryHamz</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Background Page */
      body {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/random/1920x1080') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        font-family: 'Arial', sans-serif;
      }

      /* Navbar */
      .navbar {
        background-color: rgba(0, 0, 0, 0.7); /* Navbar dengan latar belakang transparan */
        border-bottom: 1px solid #ddd;
      }

      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
      }

      .navbar a {
        font-weight: bold;
      }

      /* Gambar Gallery */
      .image-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      }

      .image-container img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease-in-out;
        border-radius: 10px;
      }

      .image-container:hover img {
        transform: scale(1.05); /* Efek zoom saat hover pada gambar */
      }

      /* Bagian Like */
      .like-container {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
      }

      .like-button {
        background-color: #ff6347;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 14px;
        transition: background-color 0.3s ease;
      }

      .like-button:hover {
        background-color: #ff4500;
      }

      /* Komentar */
      .comment-section {
        position: relative;
        padding: 15px;
        background: rgba(0, 0, 0, 0.7);
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
      }

      .comment-input {
        width: 100%;
        padding: 8px;
        border: none;
        border-radius: 5px;
        margin-bottom: 8px;
        font-size: 14px;
      }

      .comment-input:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.6);
      }

      .comments-list {
        max-height: 150px;
        overflow-y: auto;
        margin-top: 10px;
        color: #ddd;
      }

      /* Card Layout */
      .card {
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
      }

      .card-body {
        padding: 20px;
      }

      /* Button */
      button {
        background-color: #28a745;
        color: white;
        border-radius: 25px;
        padding: 8px 16px;
        border: none;
        transition: background-color 0.3s ease;
      }

      button:hover {
        background-color: #218838;
      }

      /* Section Styling */
      .section-title {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #fff;
      }
    </style>
  </head>
  <body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">GalleryHamz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto"></div>
        <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
        <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
      </div>
    </div>
  </nav>

  <!-- Gallery Section -->
  <div class="container py-5">
    <div class="section-title">Galeri Pemandangan</div>
    <div class="row">
      <!-- Gambar pertama -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="image-container">
            <img class="image img-fluid" src="pemandangan1.jpg" alt="Gambar 1" />
            <div class="like-container">
              <button class="like-button" onclick="redirectToHome()">Like ❤️</button>
            </div>
          </div>
          <div class="comment-section">
            <textarea class="comment-input" id="commentInput1" placeholder="Tulis komentar..."></textarea>
            <button onclick="addComment(1)">Kirim</button>
            <div class="comments-list" id="commentsList1"></div>
          </div>
        </div>
      </div>

      <!-- Gambar kedua -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="image-container">
            <img class="image img-fluid" src="pemandangan2.jpg" alt="Gambar 2" />
            <div class="like-container">
              <button class="like-button" onclick="redirectToHome()">Like ❤️</button>
            </div>
          </div>
          <div class="comment-section">
            <textarea class="comment-input" id="commentInput2" placeholder="Tulis komentar..."></textarea>
            <button onclick="addComment(2)">Kirim</button>
            <div class="comments-list" id="commentsList2"></div>
          </div>
        </div>
      </div>

      <!-- Gambar ketiga -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="image-container">
            <img class="image img-fluid" src="pemandangan3.jpg" alt="Gambar 3" />
            <div class="like-container">
              <button class="like-button" onclick="redirectToHome()">Like ❤️</button>
            </div>
          </div>
          <div class="comment-section">
            <textarea class="comment-input" id="commentInput3" placeholder="Tulis komentar..."></textarea>
            <button onclick="addComment(3)">Kirim</button>
            <div class="comments-list" id="commentsList3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk redirect ke halaman login
    function redirectToHome() {
      window.location.href = 'login.php';  // Ganti dengan URL halaman login Anda
    }

    // Fungsi untuk menambahkan komentar
    function addComment(id) {
      const commentInput = document.getElementById(`commentInput${id}`);
      const commentList = document.getElementById(`commentsList${id}`);
      const newComment = document.createElement('div');
      newComment.classList.add('comment');
      newComment.innerText = commentInput.value;
      commentList.appendChild(newComment);
      commentInput.value = ''; // Bersihkan input setelah komentar ditambahkan
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
