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
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dealer Isuzu Jakarta | Dapatkan Promo & Harga Terbaik Truck Isuzu</title>

    <meta name="description" content="Dealer Isuzu Jakarta resmi – Dapatkan promo dan harga terbaik untuk truk, pick up, dan kendaraan niaga Isuzu. Hubungi kami untuk penawaran Isuzu Elf, Giga, dan Traga terbaru di Jakarta. Pelayanan cepat & terpercaya!" />
    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, promo isuzu, harga truk isuzu terbaru, isuzu elf, isuzu giga, isuzu traga" />
    <link rel="canonical" href="https://salesisuzuofficial.com/" />

    <link rel="icon" type="image/png" href="/img/logo.png" />
    <link rel="apple-touch-icon" href="/img/logo.png" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/home_css/header.css" />
    <link rel="stylesheet" href="css/home_css/companyprofile.css" />
    <link rel="stylesheet" href="css/home_css/layanan.css" />
    <link rel="stylesheet" href="css/home_css/produk.css" />
    <link rel="stylesheet" href="css/home_css/promoutama.css" />
    <link rel="stylesheet" href="css/home_css/contact.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />

    <script src="js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
      /* ======== GLOBAL SECTION SPACING ======== */
      section {
        padding: 80px 0;
        margin: 0 auto;
      }

      @media (max-width: 768px) {
        section {
          padding: 60px 0;
        }
      }

      /* Pastikan semua section di dalam container sejajar */
      .about-company .container,
      .products-section .container,
      .features-section .container,
      .blog-section .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
      }

      /* Jarak antar judul section dan isi */
      .section-title {
        text-align: center;
        margin-bottom: 40px;
      }

      /* Tambah ruang antar elemen agar seimbang */
      .about-company,
      .products-section,
      .promo-section,
      .promo-utama,
      .features-section,
      .blog-section {
        margin-bottom: 30px;
      }

      /* Supaya gambar promo sejajar */
      .promo-section {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        max-width: 1200px;
        margin: 0 auto 80px auto;
        padding: 60px 20px;
      }

      .promo-text {
        flex: 1 1 500px;
      }

      .promo-main-image {
        flex: 1 1 500px;
        max-width: 550px;
        margin: 0 auto;
      }

      .promo-buttons {
        margin-top: 20px;
      }

      /* Konsisten antar section */
      .contact-container {
        padding: 60px 20px;
        max-width: 1200px;
        margin: 0 auto 80px auto;
      }

      .blog-section {
        padding-bottom: 100px;
      }

      @media (max-width: 768px) {
        .promo-section {
          flex-direction: column;
          text-align: center;
          padding: 40px 16px;
          margin-bottom: 60px;
        }
        .promo-main-image {
          margin-top: 20px;
        }
      }
    </style>
  </head>

  <body>
    <!-- Header -->
    <header>
      <div class="container header-content navbar">
        <div class="header-title">
          <a href="https://salesisuzuofficial.com">
            <img src="img/logo.png" alt="Logo Isuzu" style="height: 55px" />
          </a>
        </div>

        <div class="hamburger-menu">&#9776;</div>

        <nav class="nav links">
          <a href="index.php">Home</a>
          <a href="produk.php">Produk</a>
          <a href="maintance.html">Simulasi Kredit</a>
          <a href="maintance.html">Booking Service</a>
          <a href="maintance.html">Blog & Artikel</a>
          <a href="maintance.html">Contact</a>
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
              <strong>Dedy Chandra</strong> adalah Sales Executive resmi dari
              <strong>Dealer Astra Isuzu Daan Mogot Jakarta</strong> yang berkomitmen memberikan pelayanan terbaik untuk setiap pelanggan. Dengan pengalaman luas di dunia otomotif, khususnya kendaraan niaga Isuzu, Dedy selalu siap membantu Anda menemukan solusi transportasi yang paling tepat — baik untuk kebutuhan bisnis maupun operasional perusahaan.
            </p>

            <p>
              Sebagai bagian dari jaringan resmi <strong>Astra Isuzu</strong>, Dedy Chandra menawarkan berbagai tipe kendaraan Isuzu seperti
              <em>Elf, Traga Dan Giga</em> dengan layanan konsultasi profesional, proses cepat, serta dukungan after-sales yang terjamin.
            </p>

            <p>
              Percayakan kebutuhan truk dan kendaraan niaga Anda kepada
              <strong>Dedy Chandra Sales Astra Isuzu Daan Mogot Jakarta</strong>. Dapatkan pengalaman pembelian yang mudah, harga terbaik, dan layanan purna jual yang selalu siap membantu Anda setiap saat.
            </p>

            <div class="contact-buttons">
              <a href="https://wa.me/6281296632186" class="btn whatsapp-btn">
                <i class="fab fa-whatsapp"></i> Whatsapp
              </a>
              <a href="mailto:salesisuzuofficial@gmail.com" class="btn email-btn">
                <i class="fas fa-envelope"></i> Gmail
              </a>
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
          <h3>Isuzu Traga</h3>
          <p>Truk ringan dan tangguh, cocok untuk usaha kecil dan menengah.</p>
        </div>

        <div class="product">
          <img src="img/product/Isuzu-Elf-NLR.webp" alt="Isuzu Elf NLR" loading="lazy" />
          <h3>Isuzu ELF</h3>
          <p>Performa handal untuk pengangkutan berat dan jarak jauh.</p>
        </div>

        <div class="product">
          <img src="img/product/Isuzu-Giga-FTR.webp" alt="Isuzu Giga" loading="lazy" />
          <h3>Isuzu Giga</h3>
          <p>Solusi transportasi truk dengan kenyamanan terbaik.</p>
        </div>
      </div>
    </section>

    <!-- Section: Promo Utama -->
    <section id="promo-utama" class="promo-section fade-element">
      <div class="promo-text">
        <h2>Dapatkan Harga & Penawaran Terbaik Langsung dari Dealer Resmi Isuzu Indonesia</h2>
        <ul>
          <li>Ingin harga terbaik untuk semua jenis truk Isuzu?</li>
          <li>Bingung memilih kendaraan yang tepat untuk bisnis Anda?</li>
          <li>Butuh pelayanan cepat, ramah, dan profesional?</li>
          <li>Hubungi Dedy Chandra sekarang juga dan dapatkan solusi terbaik!</li>
        </ul>
        <p>Anda berada di tempat yang tepat! Dedy Chandra siap membantu Anda mendapatkan truk Isuzu baru dengan harga kompetitif untuk seluruh Indonesia, <strong>terutama di Jabodetabek</strong>.</p>
        <div class="promo-buttons">
          <a href="https://wa.me/6281296632186" class="btn-primary" target="_blank" rel="noopener noreferrer">Konsultasi Pembelian</a>
        </div>
      </div>
      <img src="img/product/Isuzu-Giga-FVM.webp" alt="Truk Isuzu Giga" loading="lazy" class="promo-main-image"/>
    </section>

    <!-- Feature Section -->
    <section class="features-section">
      <div class="section-title">
        <h2>Kenapa Harus Isuzu?</h2>
        <p>Pilih Isuzu untuk performa tangguh, efisiensi bahan bakar tinggi, dan layanan purna jual terbaik di Indonesia.</p>
      </div>

      <div class="features-container">
        <div class="feature-box">
          <div class="icon">
            <img src="img/icons/fast-process.svg" alt="Proses Cepat" />
          </div>
          <h3>Proses Cepat</h3>
          <p>Kami mengutamakan pelayanan cepat dan mudah tanpa ribet.</p>
        </div>

        <div class="feature-box">
          <div class="icon">
            <img src="img/icons/experienced-sales.svg" alt="Sales Berpengalaman" />
          </div>
          <h3>Sales Berpengalaman</h3>
          <p>Dibantu dengan tim profesional yang siap menjelaskan produk secara lengkap.</p>
        </div>

        <div class="feature-box">
          <div class="icon">
            <img src="img/icons/after-sales.svg" alt="After Sales" />
          </div>
          <h3>After Sales</h3>
          <p>Kami siap membantu Anda setelah pembelian dengan dukungan penuh.</p>
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
            +62 812-9663-2186
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone" />
          <div>
            <strong>Phone Call</strong><br />
            +62 812-9663-2186
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email" />
          <div>
            <strong>Email</strong><br />
            salesisuzuofficial@gmail.com
          </div>
        </div>
      </div>
    </div>

    <!-- Blog Section -->
    <section class="blog-section fade-element">
      <div class="container">
        <h2>Blog & Artikel</h2>
        <p>Dapatkan informasi terbaru seputar truk Isuzu, perawatan, dan promo terbaik.</p>

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
                  <a href="detail_artikel.php?id=<?= urlencode($artikel['id']) ?>" class="read-more">Baca Selengkapnya</a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Tidak ada artikel ditemukan.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Elfsight WhatsApp Chat | Untitled WhatsApp Chat -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba" data-elfsight-app-lazy></div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script>feather.replace();</script>
  </body>
</html>
