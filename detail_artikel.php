<?php
// Ambil SLUG artikel dari URL
$slug = $_GET['slug'] ?? null;
$data = json_decode(file_get_contents("https://salesisuzuofficial.com/admin/api/get_artikel.php"), true);
$artikel = null;

// Cari artikel berdasarkan SLUG
if ($slug && is_array($data)) {
  foreach ($data as $item) {
    if (isset($item['slug']) && $item['slug'] == $slug) {
      $artikel = $item;
      break;
    }
  }
}
// Default jika artikel tidak ditemukan
$judul = $artikel['judul'] ?? 'Produk Isuzu – Astra Isuzu Jakarta Resmi';
$deskripsi = isset($artikel['isi']) ? strip_tags($artikel['isi']) : 'Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman.';
$deskripsi = substr($deskripsi, 0, 160); // potong maksimal 160 karakter
$canonical = $artikel ? "https://salesisuzuofficial.com/detail_artikel.php?slug={$slug}" : "https://salesisuzuofficial.com/produk.php";

// Gambar OG, bisa gunakan gambar default atau dari artikel jika ada
$og_image = $artikel['gambar'] ?? "https://salesisuzuofficial.com/img/isuzu1.jpeg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($judul, ENT_QUOTES); ?> – Astra Isuzu Jakarta Resmi</title>

  <meta name="description" content="<?php echo htmlspecialchars($deskripsi, ENT_QUOTES); ?>" />
  <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga isuzu, harga isuzu traga, isuzu traga pick up, isuzu traga box, isuzu microbus, isuzu elf, isuzu elf box, isuzu elf engkel, isuzu elf double, isuzu cdd long, isuzu cde long, isuzu nlr, isuzu nmr, isuzu giga, isuzu jabodetabek, astra isuzu, jual truk isuzu" />
  <link rel="canonical" href="<?php echo $canonical; ?>" />

  <link rel="icon" type="image/png" href="/img/favicon.jpeg" />
  <link rel="apple-touch-icon" href="/img/favicon.jpeg" />

  <!-- Schema JSON -->
  <script type="application/ld+json">
  {
  "@context": "https://schema.org",
  "@graph": [
      {
      "@type": "Organization",
      "name": "Dealer Astra Isuzu Jakarta Resmi",
      "url": "https://salesisuzuofficial.com/",
      "logo": "https://salesisuzuofficial.com/img/isuzu1.jpeg"
      },
      {
      "@type": "WebSite",
      "url": "https://salesisuzuofficial.com/",
      "name": "Dealer Astra Isuzu Jakarta Resmi",
      "publisher": {
          "@type": "Organization",
          "name": "Dealer Astra Isuzu Jakarta Resmi",
          "logo": {
          "@type": "ImageObject",
          "url": "https://salesisuzuofficial.com/img/isuzu1.jpeg"
          }
      }
      },
      {
      "@type": "AutoDealer",
      "name": "Dealer Astra Isuzu Jakarta Resmi",
      "url": "https://salesisuzuofficial.com/",
      "logo": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
      "image": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
      "description": "Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta dan Jabodetabek.",
      "address": {
          "@type": "PostalAddress",
          "streetAddress": "Jalan Daan Mogot Km 13.9 Rawa Buaya RT 12 RW 3 Cengkareng Timur",
          "addressLocality": "Jakarta Barat",
          "addressRegion": "DKI Jakarta",
          "postalCode": "11730",
          "addressCountry": "ID"
      },
      "telephone": "+6281296632186"",
      "email": "salesisuzuofficial@gmail.com",
      "areaServed": ["Jakarta", "Bekasi", "Depok", "Tangerang", "Bogor"],
      "makesOffer": [
          {
          "@type": "Offer",
          "itemOffered": {
              "@type": "Product",
              "name": "Isuzu Elf",
              "description": "Isuzu Elf – Box, Engkel, Double, Microbus. Dealer resmi Astra Isuzu Jakarta."
          }
          },
          {
          "@type": "Offer",
          "itemOffered": {
              "@type": "Product",
              "name": "Isuzu Giga",
              "description": "Isuzu Giga – Truk Medium & Berat. Dealer resmi Astra Isuzu Jakarta."
          }
          },
          {
          "@type": "Offer",
          "itemOffered": {
              "@type": "Product",
              "name": "Isuzu Traga",
              "description": "Isuzu Traga – Pick Up & Box. Promo dan kredit ringan tersedia."
          }
          },
          {
          "@type": "Offer",
          "itemOffered": {
              "@type": "Product",
              "name": "Isuzu NLR / NMR",
              "description": "Isuzu NLR & NMR – Truk Ringan & Medium. Dealer resmi Astra Isuzu Jakarta."
          }
          }
      ]
      }
  ]
  }
  </script>

  <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
  <meta property="og:title" content="Dealer Isuzu Jakarta – Astra Isuzu Jakarta Resmi" />
  <meta property="og:description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta." />
  <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
  <meta property="og:image:alt" content="Dealer Resmi Isuzu Jakarta - Astra Isuzu" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:url" content="https://salesisuzuofficial.com/" />
  <meta property="og:site_name" content="Dealer Astra Isuzu Jakarta Resmi" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="id_ID" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Dealer Isuzu Jakarta – Astra Isuzu Jakarta Resmi" />
  <meta name="twitter:description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman." />
  <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
  <meta name="twitter:image:alt" content="Dealer Resmi Isuzu Jakarta - Astra Isuzu" />

  <!-- Robots -->
  <meta name="robots" content="index, follow" />

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/navbar.css" />
  <link rel="stylesheet" href="/css/home_css/header.css" />
  <link rel="stylesheet" href="/css/footer.css" />
  <link rel="stylesheet" href="/css/artikel.css" />

  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){
      w[l]=w[l]||[];
      w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
      var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
      j.async=true;
      j.src='https://googletagmanager.com/gtm.js?id='+i+dl;
      f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K58SQXH7');
  </script>
  <!-- End Google Tag Manager -->

  <!-- JS -->
  <script src="/js/script.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://googletagmanager.com/ns.html?id=GTM-K58SQXH7"
            height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV2MJHYKCB">
  </script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-TV2MJHYKCB');
  </script>

  <!-- Header -->
  <header>
    <div class="container header-content navbar">
      <!-- Logo -->
      <div class="header-title">
        <a href="https://salesisuzuofficial.com">
          <img src="img/logo.png" alt="Logo Isuzu" style="height: 60px" />
        </a>
      </div>

      <div class="hamburger-menu">&#9776;</div>

      <nav class="nav links">
        <a href="/">Home</a>
        <a href="produk.php">Produk</a>
        <a href="simulasi_kredit.php">Simulasi Kredit</a>
        <a href="artikel.php">Blog & Artikel</a>
        <a href="contact.php">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Konten Artikel -->
  <section class="detail-artikel">
    <div class="container">
      <div class="artikel-wrapper" style="display: flex; flex-wrap: wrap; gap: 30px;">
        
        <!-- Artikel Utama -->
        <div class="artikel-main" style="flex: 1 1 65%;">
          <?php if ($artikel): ?>
            <h1><?= htmlspecialchars($artikel['judul']) ?></h1>
            <p style="color:#888; font-size:14px; margin-bottom:15px;">
              Diposting oleh <strong><?= htmlspecialchars($artikel['author'] ?? 'Dedy Chandra Isuzu') ?></strong>
              pada <?= date('d M Y', strtotime($artikel['tanggal'] ?? 'now')) ?>
            </p>
            <img src="<?= htmlspecialchars($artikel['gambar']) ?>"
                 alt="<?= htmlspecialchars($artikel['judul']) ?>"
                 class="featured-image"
                 style="width:100%; height:auto; margin-bottom:20px;">

            <div class="isi-artikel">
              <?= nl2br($artikel['isi']) ?>
            </div>

            <a href="artikel.php" class="btn-kembali" style="display:inline-block; margin-top:20px;">
              Kembali ke Daftar Artikel
            </a>
          <?php else: ?>
            <p>Artikel tidak ditemukan.</p>
          <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <aside class="artikel-sidebar" style="flex: 1 1 30%;">
          
          <!-- Recent Posts -->
          <div class="sidebar-section">
            <h3>Recent Posts</h3>
            <div class="recent-posts-list">
              <?php
              foreach (array_slice($data, 0, 5) as $recent) {
                if ($recent['slug'] != $slug) {
                  echo '<div class="recent-post-item" style="display:flex; align-items:center; gap:12px; margin-bottom:15px;">';
                  echo '<a href="detail_artikel.php?slug=' . $recent['slug'] . '" style="flex-shrink:0;">';
                  echo '<img src="' . htmlspecialchars($recent['gambar']) . '" alt="' . htmlspecialchars($recent['judul']) . '" style="width:80px; height:60px; object-fit:cover; border-radius:6px;">';
                  echo '</a>';
                  echo '<div style="flex:1;">';
                  echo '<a href="detail_artikel.php?slug=' . $recent['slug'] . '" style="font-weight:600; text-decoration:none; color:#333; line-height:1.3; display:block;">' . htmlspecialchars($recent['judul']) . '</a>';
                  echo '</div></div>';
                }
              }
              ?>
            </div>
          </div>

          <!-- Kategori -->
          <div class="sidebar-section">
            <h3>Kategori</h3>
            <ul style="list-style:none; padding-left:0;">
              <?php
              $kategori = array_unique(array_column($data, 'kategori'));
              foreach ($kategori as $kat) {
                if (!empty($kat)) {
                  echo '<li style="margin-bottom:8px;">';
                  echo '<a href="artikel.php?kategori=' . urlencode($kat) . '" style="text-decoration:none; color:#333; font-weight:500;">• ' . htmlspecialchars($kat) . '</a>';
                  echo '</li>';
                }
              }
              ?>
            </ul>
          </div>

        </aside>
      </div>

      <!-- Related Posts -->
      <?php if ($artikel): ?>
      <div class="related-posts" style="margin-top:60px;">
        <h2 style="margin-bottom:25px; font-size:26px; font-weight:700;">Related Posts</h2>
        <div class="related-list" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:25px;">
          <?php
          $related_count = 0;
          foreach ($data as $rel) {
            if (
              $rel['slug'] != $slug &&
              isset($rel['kategori'], $artikel['kategori']) &&
              $rel['kategori'] === $artikel['kategori']
            ) {
              echo '<div class="related-item" style="background:#fff; border:1px solid #ddd; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">';
              echo '<a href="detail_artikel.php?slug=' . $rel['slug'] . '" style="text-decoration:none; color:#333;">';
              echo '<img src="' . htmlspecialchars($rel['gambar']) . '" alt="' . htmlspecialchars($rel['judul']) . '" style="width:100%; height:160px; object-fit:cover;">';
              echo '<div style="padding:15px;">';
              echo '<h4 style="font-size:16px; font-weight:600; margin:0 0 10px 0;">' . htmlspecialchars($rel['judul']) . '</h4>';
              echo '<p style="font-size:14px; color:#666;">' . substr(strip_tags($rel['isi']), 0, 100) . '...</p>';
              echo '</div></a></div>';
              $related_count++;
              if ($related_count >= 3) break;
            }
          }
          if ($related_count === 0) {
            echo "<p>Tidak ada artikel terkait.</p>";
          }
          ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- WhatsApp Chat (Elfsight) -->
  <script src="https://elfsightcdn.com/platform.js" async></script>
  <div class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba" data-elfsight-app-lazy></div>

  <script>
    feather.replace();
  </script>
</body>
</html>
