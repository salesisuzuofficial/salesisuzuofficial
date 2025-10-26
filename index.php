<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'admin/config.php';

// Ambil 3 artikel terbaru dari database
$sql = "SELECT a.id, a.judul, a.isi, a.gambar, a.tanggal, k.nama_kategori AS kategori
        FROM artikel a
        LEFT JOIN kategori k ON a.kategori_id = k.id
        ORDER BY a.tanggal DESC
        LIMIT 3";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $artikelData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data artikel: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dealer Isuzu Jakarta | Dapatkan Promo & Harga Terbaik Truck Isuzu  </title>

    <meta name="description" content="Dealer Isuzu Jakarta resmi – Dapatkan promo dan harga terbaik untuk truk, pick up, dan kendaraan niaga Isuzu. Hubungi kami untuk penawaran Isuzu Elf, Giga, dan Traga terbaru di Jakarta. Pelayanan cepat & terpercaya!" />

    <meta name="keywords" content="sales isuzu, sales isuzu Jakarta, sales isuzu Jabodetabek, sales isuzu Tangerang, sales isuzu Bekasi, sales isuzu Depok, sales isuzu Bogor, sales truck isuzu, dealer isuzu, dealer isuzu Jabodetabek, dealer isuzu Tangerang, dealer isuzu Bekasi, dealer isuzu Depok, dealer isuzu Bogor, dealer truck isuzu, dealer isuzu resmi, dealer isuzu Jakarta, dealer isuzu Indonesia, jual truk isuzu, kredit truk isuzu, cicilan truk isuzu, promo truk isuzu, harga truk isuzu terbaru, diskon truk isuzu, truk isuzu Dutro, truk isuzu 300, truk isuzu 500, isuzu Dutro 136 HD, isuzu Dutro 4x4, isuzu Dutro box, isuzu Dutro engkel, spesifikasi isuzu Dutro, modifikasi truk isuzu, gambar truk isuzu, keunggulan truk isuzu, truk isuzu untuk bisnis, truk isuzu untuk logistik, perbandingan truk isuzu dan Isuzu Elf, dealer truk isuzu termurah, dealer truk isuzu tangerang, dealer hino cikupa, hino cikupa, dealer hino tangerang murah" />

    <link rel="canonical" href="https://salesisuzuofficial.com/" />

    <!-- Google tag (gtag.js)
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8BPF492E6Z"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-8BPF492E6Z');
    </script> -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/img/logo.png" />
    <link rel="apple-touch-icon" href="images/logo.png" />

    <!-- Font & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/home_css/header.css" />
    <link rel="stylesheet" href="css/home_css/companyprofile.css" />
    <link rel="stylesheet" href="css/home_css/layanan.css" />
    <link rel="stylesheet" href="css/home_css/produk.css" />
    <link rel="stylesheet" href="css/home_css/keunggulankami.css" />
    <link rel="stylesheet" href="css/home_css/contact.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />

    <script src="js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
  </head>

  <body>
    <!-- Header -->
    <header>
      <div class="container header-content navbar">
        <div class="header-title">
          <a href="https://salesisuzuofficial.com">
            <img src="img/logo.png" alt="Logo isuzu" style="height: 55px" />
          </a>
        </div>

        <div class="hamburger-menu">&#9776;</div>

        <nav class="nav links">
          <a href="index.php">Home</a>
          <a href="hino300.php">Produk</a>
          <a href="hino500.php">Simulasi Kredit</a>
          <a href="hinobus.php">Booking Service</a>
          <a href="artikel.php">Blog & Artikel</a>
          <a href="contact.php">Contact</a>
        </nav>
      </div>
    </header>

    <!-- Hero -->
    <section class="hero">
      <div class="slider">
        <img src="img/hero1.jpg" class="slide active" alt="Banner 1" />
        <img src="img/hero2.jpg" class="slide" alt="Banner 2" />
        <img src="img/hero3.jpg" class="slide" alt="Banner 3" />
        <img src="img/hero4.jpg" class="slide" alt="Banner 4" />
        <img src="img/hero5.jpg" class="slide" alt="Banner 5" />
      </div>
    </section>

    <!-- About Company -->
    <section class="about-company">
      <div class="container">
        <div class="about-content">
          <div class="text">
            <h2>Dealer Isuzu Jakarta</h2>
            <div class="divider"></div>
            <p>
                <strong>Dedy Chandra</strong> adalah Sales Executive resmi dari <strong>Dealer Astra Isuzu Daan Mogot Jakarta</strong> yang berkomitmen memberikan pelayanan terbaik untuk setiap pelanggan. Dengan pengalaman luas di dunia otomotif, khususnya kendaraan niaga Isuzu, Dedy selalu siap membantu Anda menemukan solusi transportasi yang paling tepat — baik untuk kebutuhan bisnis maupun operasional perusahaan.
            </p>
            
            <p>
                Sebagai bagian dari jaringan resmi <strong>Astra Isuzu</strong>, Dedy Chandra menawarkan berbagai tipe kendaraan Isuzu seperti <em>Elf, Traga, Giga, dan Panther</em> dengan layanan konsultasi profesional, proses cepat, serta dukungan after-sales yang terjamin. Dedy tidak hanya fokus pada penjualan, tetapi juga pada kepuasan dan kepercayaan pelanggan melalui pelayanan yang ramah, informatif, dan transparan.
                </p>
                
                <p>
                    Percayakan kebutuhan truk dan kendaraan niaga Anda kepada <strong>Dedy Chandra – Sales Astra Isuzu Daan Mogot Jakarta</strong>. Dapatkan pengalaman pembelian yang mudah, harga terbaik, dan layanan purna jual yang selalu siap membantu Anda setiap saat.
                </p>
                <div class="contact-buttons">
                    <a href="https://wa.me/6281296632186" class="btn whatsapp-btn"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                    <a href="mailto:salesisuzuofficial@gmail.com" class="btn email-btn"><i class="fas fa-envelope"></i> Gmail</a>
                </div>
            </div>
            <div class="image-gallery">
                <img src="img/dealer.webp" alt="Dealer Isuzu" />
          </div>
        </div>
    </div>
        </section>

        <!-- Produk -->
        <section id="products-section" class="products-section fade-element">
            <h2 class="section-title">Produk Truk Isuzu Unggulan</h2>
            <div class="products">
                <div class="product">
                    <img src="img/product/Isuzu-Traga.webp" alt="Isuzu Traga" loading="lazy" />
                    <h3>
                        <a href="https://salesisuzuofficial.com/hino300.php" target="_blank" rel="noopener noreferrer">Isuzu Traga</a>
                    </h3>
                  <p>Truk ringan dan tangguh, cocok untuk usaha kecil dan menengah.</p>
                </div>
                
                <div class="product">
                    <img src="img/product/Isuzu-Elf-NLR.webp" alt="Isuzu Elf NLR" loading="lazy" />
                    <h3>
                        <a href="https://salesisuzuofficial.com/hino500.php" target="_blank" rel="noopener noreferrer">Isuzu ELF</a>
                    </h3>
                    <p>Performa handal untuk pengangkutan berat dan jarak jauh.</p>
                </div>
                
                <div class="product">
                    <img src="img/product/Isuzu-Giga-FTR.webp" alt="isuzu Bus Series" loading="lazy" />
                    <h3>
                        <a href="https://salesisuzuofficial.com/hinobus.php" target="_blank" rel="noopener noreferrer">Isuzu Giga</a>
                    </h3>
                    <p>Solusi transportasi truk dengan kenyamanan terbaik.</p>
                </div>
              </div>
            </section>

<!-- Feature Section -->
<section class="features-section">
  <div class="section-title">
    <h2>Kenapa Harus Isuzu?</h2>
    <p>Pilih Isuzu untuk performa tangguh, efisiensi bahan bakar tinggi, dan layanan purna jual terbaik di Indonesia.</p>
  </div>

  <div class="feature-box active">
    <div class="icon">
      <img src="img/icons/fast-process.svg" alt="Icon 1">
    </div>
    <h3>Proses Cepat</h3>
    <p>Kami mengutamakan pelayanan terhadap customer dengan tidak akan membuat rumit proses pembelian unit Isuzu.</p>
    <span class="number">01</span>
  </div>

  <div class="feature-box">
    <div class="icon">
      <img src="img/icons/experienced-sales.svg" alt="Icon 2">
    </div>
    <h3>Sales Berpengalaman</h3>
    <p>Dibantu dengan sales executive kami yang akan menjelaskan kepada Anda mengenai detail produk Isuzu.</p>
    <span class="number">02</span>
  </div>

  <div class="feature-box">
    <div class="icon">
      <img src="img/icons/after-





    
        <!-- Keunggulan Kami -->
    <section class="advantages fade-element">
        <div class="advantages-container">
            <div class="advantages-image">
          <img src="img/worker.png" alt="Worker Image" />
        </div>

        <div class="advantages-content">
          <h2>Program Purna Jual</h2>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <div>
              <h4>Program Service</h4>
              <p>
                Nikmati layanan gratis biaya jasa service berkala untuk setiap pembelian unit isuzu tertentu. Pemeriksaan dilakukan oleh teknisi bersertifikat menggunakan suku cadang asli isuzu.
                Hemat biaya, kendaraan lebih terawat, performa maksimal.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6 5.87v-2a4 4 0 00-3-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <div>
              <h4>Program Suku Cadang</h4>
              <p>
                Dapatkan jaminan kualitas dan ketahanan terbaik untuk truk Anda dengan menggunakan suku cadang asli isuzu. Kami menyediakan layanan lengkap untuk memastikan setiap komponen kendaraan Anda bekerja secara optimal dan tahan lama.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zm0 0v13m-3.5-3.5L12 21l3.5-3.5" />
            </svg>
            <div>
              <h4>Program On Site Service</h4>
              <p>
                Kini, perawatan dan perbaikan truk isuzu menjadi lebih praktis dengan layanan On Site Service. Teknisi isuzu yang profesional akan datang langsung ke lokasi operasional Anda — menghemat waktu, tenaga, dan biaya operasional.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg xmlns="https://w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="#0a1950" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17H4a1 1 0 01-1-1V6a1 1 0 011-1h11a1 1 0 011 1v10a1 1 0 01-1 1h-1m5 0a2 2 0 100-4h-1m-4 4h6m-1 0a2 2 0 110 4 2 2 0 010-4zM6 17a2 2 0 100 4 2 2 0 000-4z" />
            </svg>
            <div>
              <h4>Pelatihan & Konsultasi</h4>
              <p>
                isuzu tidak hanya menjual truk, tapi juga memastikan setiap pengguna memahami cara terbaik untuk mengoperasikan dan merawatnya. Melalui program Pelatihan & Konsultasi, kami membekali operator dan manajemen Anda dengan pengetahuan teknis, keselamatan, efisiensi pengoperasian, serta perawatan kendaraan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <div class="contact-container fade-element">
      <div class="contact-tabs">
        <div class="tab active">Hubungi Kami</div>
      </div>

      <div class="contact-info">
        <div class="contact-item">
          <img src="img/cssupport.png" alt="WhatsApp" />
          <div>
            <strong>Whatsapp</strong><br />
            +62 812-1905-5571
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone" />
          <div>
            <strong>Phone Call</strong><br />
            +62 812-1905-5571
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email" />
          <div>
            <strong>Email</strong><br />
            denishinoindonesia@gmail.com
          </div>
        </div>
      </div>
    </div>

    <!-- Blog Section -->
    <section class="blog-section fade-element">
      <div class="container">
        <h2>Blog & Artikel</h2>
        <p>Dapatkan informasi terbaru seputar Truk isuzu, perawatan, dan promo terbaik.</p>

        <div class="blog-grid">
          <?php if (!empty($artikelData)): ?>
            <?php foreach ($artikelData as $artikel): ?>
              <div class="blog-card">
                <img 
                  src="https://salesisuzuofficial.com/admin/uploads/artikel/<?= htmlspecialchars($artikel['gambar']) ?>"
                  alt="<?= htmlspecialchars($artikel['judul']) ?>" 
                  loading="lazy"
                />
                <div class="blog-card-content">
                  <h3>
                    <a href="detail_artikel.php?id=<?= urlencode($artikel['id']) ?>">
                      <?= htmlspecialchars($artikel['judul']) ?>
                    </a>
                  </h3>

                  <p><?= htmlspecialchars(mb_strimwidth(strip_tags($artikel['isi']), 0, 100, '...')) ?></p>

                  <a href="detail_artikel.php?id=<?= urlencode($artikel['id']) ?>" class="read-more">
                    Baca Selengkapnya
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Tidak ada artikel ditemukan.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- WhatsApp Chat -->
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-1c150e27-6597-4113-becd-79df393b9756" data-elfsight-app-lazy></div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script>feather.replace();</script>
  </body>
</html>
