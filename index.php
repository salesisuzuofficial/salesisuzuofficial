<?php
// ===========================================================
// 🚫 BLOKIR LINK MALWARE - FIX HOSTINGER
// ===========================================================

$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$query       = $_SERVER['QUERY_STRING'] ?? '';
$path_info   = $_SERVER['PATH_INFO'] ?? '';

if (
    preg_match('#index\.php\?detail/[0-9]+#i', $request_uri) ||
    preg_match('#/detail/[0-9]+#i', $request_uri) ||
    preg_match('#detail/[0-9]+#i', $query) ||
    preg_match('#detail/[0-9]+#i', $path_info)
) {
    // Blokir langsung
    header("HTTP/1.1 410 Gone");
    header("Content-Type: text/html; charset=UTF-8");
    echo "<!DOCTYPE html><html><head><title>410 Gone</title></head><body>";
    echo "<h1>410 - Halaman sudah dihapus</h1>";
    echo "<p>Konten ini tidak tersedia lagi di situs Sales Hino Indonesia.</p>";
    echo "</body></html>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Title -->
    <title>Dealer Hino Jabodetabek | Sales Truck Hino Terbaik di Indonesia</title>

    <!-- Meta Description -->
    <meta name="description" content="Dealer Resmi Hino Jakarta. Hubungi : 0859 7528 7684 / 0882 1392 5184 Untuk mendapatkan informasi produk Hino. Layanan Terbaik dan Jaminan Mutu." />
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="sales Hino, sales Hino Jakarta, sales Hino Jabodetabek, sales Hino Tangerang, sales Hino Bekasi, sales Hino Depok, sales Hino Bogor, sales truck Hino, dealer Hino, dealer Hino Jabodetabek, dealer Hino Tangerang, dealer Hino Bekasi, dealer Hino Depok, dealer Hino Bogor, dealer truck Hino, dealer Hino resmi, dealer Hino Jakarta, dealer Hino Indonesia, jual truk Hino, kredit truk Hino, cicilan truk Hino, promo truk Hino, harga truk Hino terbaru, diskon truk Hino, truk Hino Dutro, truk Hino 300, truk Hino 500, Hino Dutro 136 HD, Hino Dutro 4x4, Hino Dutro box, Hino Dutro engkel, spesifikasi Hino Dutro, modifikasi truk Hino, gambar truk Hino, keunggulan truk Hino, truk Hino untuk bisnis, truk Hino untuk logistik, perbandingan truk Hino dan Isuzu Elf, dealer truk Hino termurah" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2ZY8E57Z99"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-2ZY8E57Z99');
    </script>

    <!-- Canonical URL -->
    <link rel="canonical" href="https://salesisuzuofficial.com/" />

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="Dealer Hino Indonesia | Promo & Harga Truk Terbaik" />
    <meta property="og:description" content="Dapatkan promo truk Hino terbaru di Jakarta. Konsultasi langsung dengan sales profesional. Gratis penawaran & layanan cepat!" />
    <meta property="og:image" content="https://salesisuzuofficial.com/img/promohino1.jpg" />
    <meta property="og:url" content="https://salesisuzuofficial.com/" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Dealer Hino Indonesia | Promo & Harga Truk Terbaik" />
    <meta name="twitter:description" content="Hubungi kami untuk mendapatkan penawaran terbaik truk Hino. Layanan cepat & profesional." />
    <meta name="twitter:image" content="https://salesisuzuofficial.com/img/promohino1.jpg" />

    <!-- Robots -->
    <meta name="robots" content="index, follow" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/img/astra-logo.png">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/home_css/header.css" />
    <link rel="stylesheet" href="css/home_css/product.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/home_css/contactsec.css" />
    <link rel="stylesheet" href="css/home_css/companyprofilehome.css" />
    <link rel="stylesheet" href="css/home_css/ourcommitment.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />
    <link rel="stylesheet" href="css/home_css/keunggulankami.css" />
    <link rel="stylesheet" href="css/home_css/contact.css" />

    <!-- Scripts -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>


  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="container header-content navbar">
        <div class="header-title">
          <a href="https://salesisuzuofficial.com">
            <img src="img/isuzu.webp" alt="Logo Hino" style="height: 60px" />
          </a>
        </div>
        
        <div class="hamburger-menu">&#9776;</div>

        <nav class="nav links">
          <a href="index.php">Home</a>
          <a href="hino300.html">Hino 300 Series</a>
          <a href="hino500.html">Hino 500 Series</a>
          <a href="hinobus.html">Hino Bus Series</a>
          <a href="artikel.php">Blog & Artikel</a>
          <a href="contact.php">Contact</a>
        </nav>
      </div>
    </header>
    
    <!-- Hero -->
    <section class="hero">
      <div class="slider">
        <img src="img/bannerhino2.png" class="slide active" alt="Banner 1" />
        <img src="img/Euro 4 Hino 300.jpeg" class="slide active" alt="Banner 2" />
        <img src="img/Euro 4 Hino 500.jpeg" class="slide" alt="Banner 3" />
        <img src="img/Euro 4 Hino Bus.jpeg" class="slide" alt="Banner 4" />
      </div>
      <div class="container">
        <h2>Sales Hino No.1 Dengan Layanan Profesional & Cepat</h2>
        <p>Profesional, cepat, dan siap memberikan solusi terbaik untuk kebutuhan truk bisnis Anda. Layanan responsif, proses mudah, dan harga kompetitif!</p>
        <a href="https://wa.me/+6285975287684?text=Halo%20Saya%20Dapat%20Nomor%20Anda%20Dari%20Google" class="btn btn-contact">Hubungi Sekarang</a>
      </div>
    </section>
    
    <!-- About Company -->
    <section class="about-company">
      <div class="container">
        <div class="about-content">
          <div class="text">
            <h2>Sales Hino Indonesia</h2>
            <div class="divider"></div>
            <p>
              Nathan, Sales Hino Indonesia yang berpengalaman dan profesional, siap menjadi mitra terbaik Anda dalam memenuhi kebutuhan kendaraan niaga. Dengan pemahaman mendalam tentang produk Hino serta solusi pembiayaan yang fleksibel, Nathan selalu memberikan pelayanan cepat, ramah, dan tepat sasaran untuk setiap jenis usaha.
            </p>
            <p>
          Komitmen Nathan adalah memberikan lebih dari sekadar penjualan. Ia hadir untuk membangun hubungan jangka panjang dengan pelanggan melalui layanan after-sales yang responsif, konsultasi kebutuhan armada yang akurat, serta penawaran harga terbaik. Percayakan kebutuhan truk Hino Anda kepada Nathan, dan rasakan pengalaman membeli yang aman, nyaman, dan menguntungkan.
        </p>
            <div class="contact-buttons">
              <a href="https://wa.me/6285975287684" class="btn whatsapp-btn"><i class="fab fa-whatsapp"></i> +62 859-7528-7684</a>
              <a href="mailto:saleshinojabodetabek@gmail.com" class="btn email-btn"><i class="fas fa-envelope"></i> saleshinojabodetabek@gmail.com</a>
            </div>
          </div>
          <div class="image-gallery">
            <img src="img/promohino1.jpg" alt="Promo Hino" />
          </div>
          </div>
        </div>
        </section>
        
        <!-- Hero 2 -->
        <section class="hero1">
          <img src="img/hino1.jpg" alt="Header Background" style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: 0;" />
          <div class="container">
            <h2>Solusi Terbaik Kebutuhan Armada Anda</h2>
            <p>Kami menyediakan truk Hino berkualitas dengan layanan cepat dan dukungan penuh, memastikan armada Anda selalu siap bekerja maksimal di setiap proyek.</p>
            <a href="#product-carousel" class="btn btn-contact">Browse Catalog</a>
          </div>
        </section>
        
    <!-- Product Section -->
    <div id="product-carousel"></div>
    <section class="product-carousel">
      <h2>Our Product</h2>
      <p>Pilihan Utama Pengusaha Cerdas di Seluruh Indonesia</p>
      <div class="carousel-wrapper">
        <button class="carousel-btn left">&#10094;</button>
        <div class="carousel">
          <div class="product-item"><a href="hino300.html"><img src="img/300series/136MDL.png" alt="Hino 300" /><p><strong>Hino 300 Series</strong></p></a></div>
          <div class="product-item"><a href="hino500.html"><img src="img/500series/FM340TH.png" alt="Hino 500" /><p><strong>Hino 500 Series</strong></p></a></div>
          <div class="product-item"><a href="hinobus.html"><img src="img/hinobus.png" alt="Hino Bus" /><p><strong>Hino Bus Series</strong></p></a></div>
        </div>
        <button class="carousel-btn right">&#10095;</button>
      </div>
    </section>
    
    <!-- Contact Section -->
    <div class="contact-container">
      <div class="contact-tabs"><div class="tab active">Hubungi Kami</div></div>
      <div class="contact-info">
        <div class="contact-item"><img src="img/cssupport.png" alt="WhatsApp" /><div><strong>Whatsapp</strong><br />+62 859-7528-7684</div></div>
        <div class="divider"></div>
        <div class="contact-item"><img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone" /><div><strong>Phone Call</strong><br />+62 882-1392-5184</div></div>
        <div class="divider"></div>
        <div class="contact-item"><img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email" /><div><strong>Email</strong><br />saleshinojabodetabek@gmail.com</div></div>
      </div>
    </div>

    <!-- Keunggulan Kami -->
  <section class="advantages">
    <div class="advantages-container">
        <div class="advantages-image">
          <img src="img/worker.png" alt="Worker Image" />
        </div>
        <div class="advantages-content">
          <h2>Program Purna Jual</h2>
          
          <div class="advantage-item">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="#0a1950"
              stroke-width="2"
              >
              <path
              stroke-linecap="round"
              stroke-linejoin="round"
                d="M5 13l4 4L19 7"
                />
              </svg>
            
            <div>
              <h4>Program Service</h4>
              <p>
                Nikmati layanan gratis biaya jasa service berkala untuk setiap pembelian unit Hino tertentu. Pemeriksaan dilakukan oleh teknisi bersertifikat menggunakan suku cadang asli Hino.
Hemat biaya, kendaraan lebih terawat, performa maksimal.
              </p>
            </div>
          </div>

          <div class="advantage-item">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="#0a1950"
              stroke-width="2"
              >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6 5.87v-2a4 4 0 00-3-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z"
                />
            </svg>
            <div>
              <h4>Program Suku Cadang</h4>
              <p>
                Dapatkan jaminan kualitas dan ketahanan terbaik untuk truk Anda dengan menggunakan suku cadang asli Hino. Kami menyediakan layanan lengkap untuk memastikan setiap komponen kendaraan Anda bekerja secara optimal dan tahan lama.
              </p>
            </div>
          </div>
          
          <div class="advantage-item">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="#0a1950"
              stroke-width="2"
              >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zm0 0v13m-3.5-3.5L12 21l3.5-3.5"
                />
              </svg>
            <div>
              <h4>Program On Site Service</h4>
              <p>
                Kini, perawatan dan perbaikan truk Hino menjadi lebih praktis dengan layanan On Site Service. Teknisi Hino yang profesional akan datang langsung ke lokasi operasional Anda — menghemat waktu, tenaga, dan biaya operasional.
              </p>
            </div>
          </div>
          
          <div class="advantage-item">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon"
            fill="none"
            viewBox="0 0 24 24"
            stroke="#0a1950"
            stroke-width="2"
            >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 17H4a1 1 0 01-1-1V6a1 1 0 011-1h11a1 1 0 011 1v10a1 1 0 01-1 1h-1m5 0a2 2 0 100-4h-1m-4 4h6m-1 0a2 2 0 110 4 2 2 0 010-4zM6 17a2 2 0 100 4 2 2 0 000-4z"
                />
              </svg>
              <div>
              <h4>Pelatihan & Konsultasi</h4>
              <p>
                Hino tidak hanya menjual truk, tapi juga memastikan setiap pengguna memahami cara terbaik untuk mengoperasikan dan merawatnya. Melalui program Pelatihan & Konsultasi, kami membekali operator dan manajemen Anda dengan pengetahuan teknis, keselamatan, efisiensi pengoperasian, serta perawatan kendaraan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube Section -->
  <style>
    .video-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 75px;
      width: 100%;
    }

    .video-container iframe {
      width: 80%;
      max-width: 1200px;
      height: 500px;
    }
  </style>
</head>
<body>

  <div class="video-container">
    <iframe src="https://www.youtube.com/embed/FgvKuKNTMVk?si=IkUZ_Xu16KkYXmQ1" frameborder="0" allowfullscreen></iframe>
  </div>

</body>


    <!-- Blog Section -->
    <section class="blog-section">
      <div class="container">
        <h2>Blog & Artikel</h2>
        <p>Dapatkan informasi terbaru seputar Truk Hino, perawatan, dan promo terbaik.</p>
        <div class="blog-grid">
          <?php
            $artikelData = json_decode(file_get_contents("https://salesisuzuofficial.com/admin/api/get_artikel.php"), true);
            if (is_array($artikelData)) {
              $terbaru = array_slice($artikelData, 0, 3);
              foreach ($terbaru as $artikel):
          ?>
            <div class="blog-card">
              <img src="<?= htmlspecialchars($artikel['gambar']) ?>" alt="<?= htmlspecialchars($artikel['judul']) ?>" />
              <div class="blog-card-content">
                <h3><a href="detail_artikel.php?id=<?= $artikel['id'] ?>"><?= htmlspecialchars($artikel['judul']) ?></a></h3>
                <p><?= substr(strip_tags($artikel['isi']), 0, 100) ?>...</p>
                <a href="detail_artikel.php?id=<?= $artikel['id'] ?>" class="read-more">Baca Selengkapnya</a>
              </div>
            </div>
          <?php endforeach; } else { echo "<p>Tidak ada artikel ditemukan.</p>"; } ?>
        </div>
      </div>
    </section>

    <!-- WhatsApp Chat -->
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-1c150e27-6597-4113-becd-79df393b9756" data-elfsight-app-lazy></div>

    <!-- Footer -->
    <footer class="site-footer">
      <div class="footer-container">
        <div class="footer-section">
          <img src="img/logo3.png" alt="Logo" class="footer-logo" />
          <p>Nathan, Sales Hino Indonesia yang berpengalaman dan profesional, siap menjadi mitra terbaik Anda dalam memenuhi kebutuhan kendaraan niaga.</p>
        </div>
        <div class="footer-section">
          <h4>HUBUNGI KAMI</h4>
          <p>📞 0859-7528-7684</p>
          <p>📧 saleshinojabodetabek@gmail.com</p>
          <p>📍 Golf Lake Ruko Venice, Jl. Lkr. Luar Barat No.78 Blok B, RT.9/RW.14, Cengkareng Tim., Kecamatan Cengkareng, Jakarta</p>
          <div class="footer-social">
            <h4>SOSIAL MEDIA</h4>
          <div class="social-icons">
            <a href="https://www.instagram.com/saleshinojabodetabek" target="_blank" aria-label="Instagram Sales Hino Jabodetabek">
              <i data-feather="instagram"></i>
            </a>
            <a href="https://wa.me/+6285975287684?text=Halo%20Saya%20Dapat%20Nomor%20Anda%20Dari%20Google" target="_blank" aria-label="WhatsApp Sales Hino Jabodetabek">
              <i data-feather="phone"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61573843992250" target="_blank" aria-label="Facebook Sales Hino Jabodetabek">
              <i data-feather="facebook"></i>
            </a>
          </div>
          </div>
        </div>
        <div class="footer-section">
          <div class="google-map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63471.95288843176!2d106.65860738294855!3d-6.131096504333846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d775401fa6d%3A0xc7e25a8d81b821ec!2sDealer%20Hino%20Jabodetabek%20Resmi!5e0!3m2!1sen!2sus!4v1760817261750!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 Sales Hino Indonesia. All Rights Reserved.</p>
      </div>
    </footer>

    <!-- Feather Icons Init -->
    <script>feather.replace();</script>
  </body>
</html>
