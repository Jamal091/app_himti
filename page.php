<?php
require 'koneksi.php';

/** Inisialisasi Variabel Form Login Admin */
$txtnamalengkap = isset($_POST["namalengkap"]) ? $_POST["namalengkap"] : "";
$txtnamapanggilan = isset($_POST["namapanggilan"]) ? $_POST["namapanggilan"] : "";
$txtnim = isset($_POST["nim"]) ? $_POST["nim"] : "";
$txtjurusan = isset($_POST["jurusan"]) ? $_POST["jurusan"] : "";
$txttempatlahir = isset($_POST["tempatlahir"]) ? $_POST["tempatlahir"] : "";
$txttanggallahir = isset($_POST["tanggallahir"]) ? date('d/m/Y', strtotime($_POST["tanggallahir"])) : "";
$txtjeniskelamin = isset($_POST["jeniskelamin"]) ? $_POST["jeniskelamin"] : "";
$txtalamat = isset($_POST["alamat"]) ? $_POST["alamat"] : "";
$txtasaldaerah = isset($_POST["daerahasal"]) ? $_POST["daerahasal"] : "";
$txtnohp = isset($_POST["nohp"]) ? $_POST["nohp"] : "";
$txtpenyakit = isset($_POST["riwayatpenyakit"]) ? $_POST["riwayatpenyakit"] : "";
$btnsubmit = isset($_POST["submit"]) ? $_POST["submit"] : "";
$btnreset = isset($_POST["reset"]) ? $_POST["reset"] : "";
$notifikasi = "";

if($btnsubmit == 'submit' && $txtnamalengkap != "" && $txtnamapanggilan != "" && $txtnim != "" && $txtjurusan != "" && $txttempatlahir != "" && $txttanggallahir != "" && $txtjeniskelamin != "" && $txtalamat != "" && $txtasaldaerah != "" && $txtnohp != "" && $txtpenyakit != "") {
  /**
    * Menyimpan data ke database
    */
    $sql_tambah_anggota = "INSERT INTO data_mahasiswa (nama_lengkap,nama_panggilan,nim,jurusan,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,daerah_asal,no_hp,riwayat_penyakit) VALUES ('".$txtnamalengkap."','".$txtnamapanggilan."','".$txtnim."','".$txtjurusan."','".$txttempatlahir."','".$txttanggallahir."','".$txtjeniskelamin."','".$txtalamat."','".$txtasaldaerah."','".$txtnohp."','".$txtpenyakit."')";
    $kueri_tambah_anggota = $koneksi_db->query($sql_tambah_anggota);
    if ($kueri_tambah_anggota)
    {
        $notifikasi = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data anda atas nama ". $txtnamalengkap." telah disimpan.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
    else
    {
        $notifikasi = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Terjadi kesalahan pada sistem. Data tidak dapat disimpan.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
} elseif($btnreset == 'reset')
?>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="getstarted scrollto" href="login.php">Logout</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <main id="main">
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Form Pendaftaran</li>
          </ol>
            <h2>Form Pendaftaran</h2>
        </div>
      </section>
      <!-- End Breadcrumbs -->

<!-- Main -->
<section class="inner-page">
  <div class="container">
    <?php
      echo $notifikasi;
    ?>

    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama-lengkap" class="form-label"><b>Nama Lengkap</b></label>
        <input type="text" class="form-control" id="nama-lengkap" name="namalengkap" required>
      </div>
      <div class="mb-3">
        <label for="nama-panggilan" class="form-label"><b>Nama Panggilan</b></label>
        <input type="text" class="form-control" id="nama-panggilan" name="namapanggilan" required>
      </div>
      <div class="mb-3">
        <label for="nim" class="form-label"><b>NIM</b></label>
        <input type="text" class="form-control" id="nim" name="nim"required>
      </div>
      <div class="mb-3">
        <label for="jurusan" class="form-label"><b>Jurusan</b></label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
      </div>
      <div class="mb-3">
        <label for="tempat-lahir" class="form-label"><b>Tempat Lahir</b></label>
        <input type="text" class="form-control" id="tempat-lahir" name="tempatlahir" required>
      </div>
      <div class="mb-3">
        <label for="tanggal-lahir" class="form-label"><b>Tanggal Lahir</b></label>
        <input type="date" class="form-control" id="tanggal-lahir" name="tanggallahir" required>
      </div>
      <div class="mb-3">
        <label class="form-label"><b>Jenis Kelamin</b></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jeniskelamin" id="laki-laki" value="Laki-laki" checked value="laki" required>
          <label class="form-check-label" for="laki-laki">
            Laki-laki
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan" required>
          <label class="form-check-label" for="perempuan">
            Perempuan
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label"><b>Alamat</b></label>
        <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
      </div>
      <div class="mb-3">
        <label for="asal-daerah" class="form-label"><b>Daerah Asal</b></label>
        <textarea class="form-control" id="asal-daerah" rows="2" name="daerahasal"></textarea>
      </div>
      <div class="mb-3">
        <label for="no-hp" class="form-label"><b>No.HP/WA</b></label>
        <input type="text" class="form-control" id="no-hp" name="nohp" required>
      </div>
      <div class="mb-3">
        <label for="riwayat-penyakit" class="form-label"><b>Riwayat Penyakit Di Derita</b></label>
        <textarea class="form-control" id="riwayat-penyakit" rows="3" name="riwayatpenyakit"></textarea>
      </div>
      </div>
      <div class="d-flex justify-content-center my-4">
        <button type="submit" id="submit" class="btn btn-danger btn-xl rounded-pill shadow me-2" value="submit" name="submit">Submit</button>
        <button type="reset" id="reset" class="btn btn-secondary btn-xl rounded-pill shadow ms-2" value="reset" name="reset">Reset</button>
      </div>
  </div>
      </section>
    </main>
    <!-- End main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-newsletter">
        
      </div>

      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>UNITAMA</h3>
              <p>
                Jln. Perintis Kemerdekaan No.75,Makassar,Sulawesi Selatan <br /><br />
                <strong>Phone:</strong> 0411-588371<br />
                <strong>Email:</strong> info@unitama.com<br />
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Link</h4>
              <ul>
                <li>
                  <i class="bx bx-chevron-right"></i> 
                  <a href="#">Home</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> 
                  <a href="login.php">Login</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Sosial Media</h4>
              <p>
                Kunjungi Sosial Media Kami untuk mendapatkan informasi update dan jangan lupa Follow!
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

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
