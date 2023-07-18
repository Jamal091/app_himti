<?php
session_start();  
require 'koneksi.php';

/** Inisialisasi Variabel Form Login Admin */
$txtEmail = isset($_POST["email"]) ? $_POST["email"] : "";
$txtPassword = isset($_POST["password"]) ? $_POST["password"] : "";
$btnlogin = isset($_POST["login"]) ? $_POST["login"] : "";
$notifikasi = "";


/** Verifikasi Login Dilakukan Apabila Pengguna telah mengisi data Email dan Password serta mengklik tombol login  */

if ($btnlogin == "Login" && $txtEmail != "" && $txtPassword != "")
{
    
  /** Memeriksa Data Pengguna Pada Database */
  $sql_select_users = "SELECT * FROM users WHERE email='". $txtEmail ."' AND password='".md5($txtPassword)."'";
  $kueri_select_users = $koneksi_db->query($sql_select_users);
  if($kueri_select_users){
   $user = mysqli_fetch_assoc($kueri_select_users);
   
    $jumlah_pengguna = $kueri_select_users->num_rows;
    

    
    /** Jika Terdapat 1 data yang sesuai, maka login berhasil
     * Jika tidak, maka login gagal
     */
  
    if($jumlah_pengguna == 1){
      /** Merekam sesi pengguna dan mengalihkan ke halaman cek data */
    $_SESSION["email"] = $txtEmail;
    if($user['role'] == 'admin') {
      header("Location: dashboard.php?p=daftar_anggota");
    } else {
      header("Location: dashboard.php?p=page");
    }
    }
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HIMTI UNITAMA</title>
  <!-- Favicons -->
  <link href="assets/img/unitama.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" 
    rel="stylesheet"/>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet"/>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"/>
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"/>
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"/>
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php">UNITAMA</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="getstarted" href="index.php">Home</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
<!-- End Header -->

<!-- Login Admin -->
<main class="main">
<section>
<div class="container">
 <div class="row">
    <div class="d-flex justify-content-center align-items-center mt-5 text-center">
      <div class="col-md-6">
            <img src="assets/img/unitama.png" alt="" width="100px" height="100px">
            <div class="section-title p-2">
            <h2>Login </h2>
          </div>
            <form method="POST">
              <div class="mb-3 text-start">
                <label for="email" class="form-label"><b>Email<b></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
              <div class="mb-3 text-start">
                <label for="password" class="form-label text-start">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <div class="d-flex justify-content-center justify-content-lg-center mx-auto">
              <button class="btn btn-danger btn-xl btn-block rounded-pill shadow" type="submit" name="login" value="Login" id="login">Login</button>
              </div>
            </form>
      </div>
    </div>
 </div>
</div>
</section>
</main>
<!-- End Login Admin -->

  <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>
