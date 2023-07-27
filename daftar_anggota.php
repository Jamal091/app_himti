<?php
require 'koneksi.php';

/** Inisialisasi Variable form cari */
$q = isset($_POST["q"]) ? $_POST["q"] : "";
/**
* Memuat data anggota
*/
if ($q == "") {
    $sql_select_anggota = "SELECT * FROM data_mahasiswa";
} else {
    // Gunakan prepared statements untuk mencegah SQL injection
    $sql_select_anggota = "SELECT * FROM data_mahasiswa WHERE nama_lengkap=? OR nama_panggilan LIKE ?";
}

// Persiapkan pernyataan
$stmt = $koneksi_db->prepare($sql_select_anggota);

// Kaitkan parameter jika query menggunakan prepared statements
if ($q != "") {
    $search_param = "%".$q."%";
    $stmt->bind_param("ss", $q, $search_param);
}

// Jalankan query
$stmt->execute();

// Dapatkan hasil query
$result = $stmt->get_result();

// Tangani kemungkinan kesalahan
if (!$result) {
    die("Pengambilan data gagal: " . $koneksi_db->error);
}

$jumlah_data = $result->num_rows;
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

<!-- Daftar -->
<main class="main">
<section>
<div class="container">
 <div class="row">
    <div class="d-flex justify-content-center align-items-center mt-5 text-center">
      <div class="col-lg">
            <div class="section-title p-2">
            <h2>Daftar Anggota</h2>
          </div>
            <form action="?p=data_anggota" method="post">
            <div class="input-group mb-3">
                <input type="text" name="q" class="form-control" value="<?php echo $q; ?>">
                <button type="submit" name="cmdCari" value="Cari" class="btn btn-info">Cari...</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Tempat lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Daerah Asal</th>
                        <th>No. Hp/WA</th>
                        <th>Riwayat Penyakit</th>
                    </tr>
                <?php
                    $no = 1;
                    while ($data_select_anggota = $result->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$data_select_anggota["nama_lengkap"]."</td>";
                            echo "<td>".$data_select_anggota["nama_panggilan"]."</td>";
                            echo "<td>".$data_select_anggota["nim"]."</td>";
                            echo "<td>".$data_select_anggota["jurusan"]."</td>";
                            echo "<td>".$data_select_anggota["tempat_lahir"]."</td>";
                            echo "<td>".$data_select_anggota["tanggal_lahir"]."</td>";
                            echo "<td>".$data_select_anggota["jenis_kelamin"]."</td>";
                            echo "<td>".$data_select_anggota["alamat"]."</td>";
                            echo "<td>".$data_select_anggota["daerah_asal"]."</td>";
                            echo "<td>".$data_select_anggota["no_hp"]."</td>";
                            echo "<td>".$data_select_anggota["riwayat_penyakit"]."</td>";
                        echo "</tr>";
                    $no++;
                    }
                ?>
            </table>
            </div>
            </form>
      </div>
    </div>
 </div>
</div>
</section>