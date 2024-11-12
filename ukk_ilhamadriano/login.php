<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - GalleryHamz</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Kustomisasi gaya untuk tampilan form */
      body {
        background-color: #f0f2f5; /* Mengganti warna latar belakang halaman menjadi abu-abu muda */
      }

      .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #343a40; /* Warna latar belakang card menjadi abu-abu gelap */
      }

      .card-body {
        background: linear-gradient(135deg, #4e5d6c, #2c3e50); /* Gradient biru gelap dan abu-abu */
        border-radius: 15px;
        color: white; /* Mengubah teks di dalam card menjadi putih */
      }

      .form-control {
        border-radius: 10px;
        margin-bottom: 15px;
        background-color: #495057; /* Warna latar belakang input menjadi abu-abu gelap */
        color: white;
        border: 1px solid #6c757d; /* Warna border abu-abu */
      }

      .form-control:focus {
        background-color: #6c757d; /* Warna latar belakang saat input fokus */
        border-color: #007bff; /* Border biru ketika input fokus */
      }

      .btn-primary {
        border-radius: 10px;
        background-color: #007bff; /* Biru terang untuk tombol */
        border: none;
        transition: all 0.3s ease-in-out;
      }

      .btn-primary:hover {
        background-color: #0056b3; /* Warna biru lebih gelap saat tombol dihover */
      }

      .navbar {
        border-bottom: 2px solid #ddd;
      }

      .navbar-brand {
        font-weight: bold;
      }

      /* Tautan yang di dalam card menjadi lebih terang */
      .card a {
        color: #66afe9; /* Warna biru terang untuk tautan */
      }

      .card a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
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

  <!-- Form Login -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="text-center mb-4">
              <h4 class="text-primary">Masuk</h4>
            </div>
            <form action="config/aksi_login.php" method="POST">
              <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <div class="d-grid mt-4">
                <button class="btn btn-primary" type="submit" name="kirim">Login</button>
              </div>
            </form>
            <hr>
            <p class="text-center">Belum punya akun? <a href="register.php">Daftar di sini!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS & Dependencies -->
  <script src="script.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  </body>
</html>
