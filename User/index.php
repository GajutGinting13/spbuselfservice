<!DOCTYPE html>
<html lang="en">
<?php
require '../database/koneksi.php';
$sql = mysqli_query($koneksi, "SELECT * FROM profil");
$data = mysqli_fetch_array($sql);
$nama = $data['nama'];
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$cari = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
$hasil = mysqli_fetch_array($cari);
$saldo = $hasil['saldo'];
include 'head.php';
?>

<body class="index-page">
  <?php include 'header.php' ?>
  <main class="main">
    <div class="container">
      <div class="content">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
            <div class="img-wrap text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
              <div class="img">
                <img src="assets/img/gas.jpg" alt="circle image" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
            <div class="px-3">
              <h2 class="content-title text-start">
                Selamat Datang di <?= $nama ?>!
              </h2>
              <p class="lead">
                Nikmati kemudahan dan kenyamanan membeli bahan bakar kapan saja dan di mana saja dengan <?= $nama ?>. Sistem self-service kami memungkinkan Anda mengisi bahan bakar tanpa antrian dan dengan pembayaran yang cepat serta aman.
              </p>
              <p class="mb-5">
                Mulai Sekarang dan Rasakan Bedanya dengan <?= $nama ?>!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <section id="pricing" class="pricing section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Harga</h2>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Premium</h3>
              <h4><sup>Rp</sup>8.000<span> / Liter</span></h4>
              <ul>
                <li>RON 88</li>
                <li> bahan bakar dengan angka oktan yang lebih rendah dan biasanya lebih murah. Cocok untuk kendaraan dengan rasio kompresi mesin yang lebih rendah.</li>
              </ul>
              <div class="btn-wrap">
                <a type="button" class="btn-buy" data-bs-toggle="modal" data-bs-target="#premium"><i class="bi bi-droplet"></i> Beli</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item recommended">
              <span class="recommended-badge">Recommended</span>
              <h3>Pertalite</h3>
              <h4><sup>Rp</sup>10.000<span> / Liter</span></h4>
              <ul>
                <li>RON 90</li>
                <li>ini adalah pilihan menengah yang lebih cocok untuk kendaraan dengan performa mesin yang lebih tinggi dibandingkan dengan Premium.</li>
              </ul>
              <div class="btn-wrap">
                <a type="button" class="btn-buy" data-bs-toggle="modal" data-bs-target="#pertalite"><i class="bi bi-droplet"></i> Beli</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item recommended">
              <h3>Pertamax</h3>
              <h4><sup>Rp</sup>13.000<span> / Liter</span></h4>
              <ul>
                <li>RON 92</li>
                <li>bahan bakar dengan angka oktan yang lebih tinggi, memberikan pembakaran yang lebih efisien dan biasanya digunakan untuk kendaraan modern dengan rasio kompresi yang lebih tinggi.</li>
              </ul>
              <div class="btn-wrap">
                <a type="button" class="btn-buy" data-bs-toggle="modal" data-bs-target="#pertamax"><i class="bi bi-droplet"></i> Beli</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="testimonials section">
      <div class="container section-title" data-aos="fade-up">
        <p>Apa Kata Mereka</p>
        <h2>Setelah Menggunakan <?= $nama ?></h2>
      </div>
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 1
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testimonial mx-auto">
                    <figure class="img-wrap">
                      <img src="assets/img/testimonials/testimonials-1.jpg" alt="Image" class="img-fluid">
                    </figure>
                    <h3 class="name">Agus Salim</h3>
                    <blockquote>
                      <p>
                        “Saya sangat puas dengan layanan <?= $nama ?>! Membeli bahan bakar kini menjadi sangat mudah dan praktis. Tidak perlu lagi mengantri di SPBU, cukup pesan melalui aplikasi dan isi bahan bakar sendiri. Pembayarannya juga sangat aman dan cepat. Terima kasih, <?= $nama ?>!.”
                      </p>
                    </blockquote>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial mx-auto">
                    <figure class="img-wrap">
                      <img src="assets/img/testimonials/testimonials-2.jpg" alt="Image" class="img-fluid">
                    </figure>
                    <h3 class="name">Agnes Sirait</h3>
                    <blockquote>
                      <p>
                        “<?= $nama ?> benar-benar mengubah cara saya mengisi bahan bakar. Dengan layanan self-service yang praktis, saya bisa menghemat waktu dan tenaga. Aplikasi ini sangat user-friendly dan proses pemesanannya sangat cepat. Saya sangat merekomendasikan <?= $nama ?> kepada semua orang!.”
                      </p>
                    </blockquote>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial mx-auto">
                    <figure class="img-wrap">
                      <img src="assets/img/testimonials/testimonials-3.jpg" alt="Image" class="img-fluid">
                    </figure>
                    <h3 class="name">Agun Krarista</h3>
                    <blockquote>
                      <p>
                        “Saya sangat terkesan dengan inovasi yang ditawarkan oleh <?= $nama ?>. Sistem self-service yang canggih dan mudah digunakan membuat pengalaman mengisi bahan bakar menjadi lebih efisien. Harga yang ditawarkan juga sangat kompetitif. <?= $nama ?> adalah solusi terbaik untuk kebutuhan bahan bakar saya!.”
                      </p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
          <div class="widget">
            <p>Sisa Saldo Anda : Rp <?= $saldo ?></p>
            <h3 class="widget-heading">About Us</h3>
            <p class="mb-4">
              <?= $nama ?> adalah solusi inovatif untuk kebutuhan bahan bakar Anda. Dengan layanan self-service yang mudah digunakan, kami memberikan kemudahan dan kenyamanan dalam mengisi bahan bakar kendaraan Anda kapan saja dan di mana saja.
              Kami berkomitmen untuk menyediakan layanan yang aman, cepat, dan efisien dengan harga yang kompetitif. Melalui teknologi canggih dan antarmuka yang ramah pengguna, kami memastikan pengalaman mengisi bahan bakar Anda menjadi lebih baik dan lebih nyaman.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5">
          <div class="widget">
            <h3 class="widget-heading">Connect</h3>
            <ul class="list-unstyled social-icons light mb-3">
              <li>
                <a href="#"><span class="bi bi-facebook"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-twitter-x"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-linkedin"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-google"></span></a>
              </li>
              <li>
                <a href="#"><span class="bi bi-google-play"></span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php include 'footer.php' ?>
    </div>
  </footer>
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <?php include 'script.php' ?>
  <!-- modal premium -->
  <div class="modal fade" id="premium" tabindex="-1" aria-labelledby="premiumLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="premiumLabel">Bahan Bakar Premium</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="validasi.php" method="post">
          <div class="modal-body">
            <div class="input-group mb-3">
              <input class="form-control form-control-lg" type="number" name="jumlah" min="0" aria-label=".form-control-lg example">
              <span class="input-group-text" id="basic-addon1">/ Liter</span>
            </div>
            <input type="hidden" name="jenis" value="premium">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Beli</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal pertalite -->
  <div class="modal fade" id="pertalite" tabindex="-1" aria-labelledby="pertaliteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="pertaliteLabel">Bahan Bakar Pertalite</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="validasi.php" method="post">
          <div class="modal-body">
            <div class="input-group mb-3">
              <input class="form-control form-control-lg" type="number" name="jumlah" min="0" aria-label=".form-control-lg example">
              <span class="input-group-text" id="basic-addon1">/ Liter</span>
            </div>
            <input type="hidden" name="jenis" value="pertalite">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Beli</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal pertamax -->
  <div class="modal fade" id="pertamax" tabindex="-1" aria-labelledby="pertamaxLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="pertamaxLabel">Bahan Bakar Pertamax</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="validasi.php" method="post">
          <div class="modal-body">
            <div class="input-group mb-3">
              <input class="form-control form-control-lg" type="number" name="jumlah" min="0" aria-label=".form-control-lg example">
              <span class="input-group-text" id="basic-addon1">/ Liter</span>
            </div>
            <input type="hidden" name="jenis" value="pertamax">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Beli</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  </script>
</body>

</html>