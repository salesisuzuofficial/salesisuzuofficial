<?php
// Ambil SLUG artikel dari URL (hasil rewrite)
$slug = $_GET['slug'] ?? null;

// Ambil data artikel dari API
$data = json_decode(file_get_contents("https://salesisuzuofficial.com/admin/api/get_artikel.php"), true);
$artikel = null;

// Cari artikel berdasarkan slug
if ($slug && is_array($data)) {
  foreach ($data as $item) {
    if (isset($item['slug']) && $item['slug'] === $slug) {
      $artikel = $item;
      break;
    }
  }
}

// Default jika artikel tidak ditemukan
$judul = $artikel['judul'] ?? 'Produk Isuzu – Astra Isuzu Jakarta Resmi';
$deskripsi = isset($artikel['isi']) ? strip_tags($artikel['isi']) : 'Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman.';
$deskripsi = substr($deskripsi, 0, 160);

// Canonical URL (PERBAIKAN)
$canonical = $artikel
  ? "https://salesisuzuofficial.com/detail_artikel/{$slug}"
  : "https://salesisuzuofficial.com/produk.php";

// Gambar OG
$og_image = $artikel['gambar'] ?? "https://salesisuzuofficial.com/img/isuzu1.jpeg";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TITLE -->
  <title><?= htmlspecialchars($judul, ENT_QUOTES); ?> – Astra Isuzu Jakarta Resmi</title>

  <!-- META DESCRIPTION -->
  <meta name="description" content="<?= htmlspecialchars($deskripsi, ENT_QUOTES); ?>">

  <!-- CANONICAL -->
  <link rel="canonical" href="<?= $canonical; ?>">

  <!-- Favicon utama -->
  <link rel="icon" type="image/png" sizes="32x32" href="https://salesisuzuofficial.com/faviconisuzu.png">
  <link rel="icon" type="image/png" sizes="192x192" href="https://salesisuzuofficial.com/faviconisuzu.png">

  <!-- Favicon untuk browser (ICO multi-size) -->
  <link rel="icon" type="image/x-icon" href="https://salesisuzuofficial.com/faviconisuzu.ico">

  <!-- Apple Touch Icon (iPhone/iPad) -->
  <link rel="apple-touch-icon" href="https://salesisuzuofficial.com/faviconisuzu.png">

  <!-- PERFORMANCE BOOST -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- JSON-LD ARTICLE (SEO MAX & CTR FRIENDLY) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?= $canonical; ?>"
    },
    "headline": "<?= htmlspecialchars($judul, ENT_QUOTES); ?>",
    "description": "<?= htmlspecialchars($deskripsi, ENT_QUOTES); ?>",
    "image": [
      "<?= $og_image; ?>"
    ],
    "author": {
      "@type": "Person",
      "name": "Dedy Chandra",
      "jobTitle": "Sales Consultant Isuzu",
      "worksFor": {
        "@type": "Organization",
        "name": "Dealer Resmi Isuzu Jakarta"
      }
    },
    "publisher": {
      "@type": "Organization",
      "name": "Dealer Resmi Isuzu Jakarta",
      "logo": {
        "@type": "ImageObject",
        "url": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
        "width": 600,
        "height": 60
      }
    },
    "datePublished": "<?= date('Y-m-d', strtotime($tanggal)); ?>",
    "dateModified": "<?= date('Y-m-d', strtotime($tanggal)); ?>",
    "url": "<?= $canonical; ?>",
    "inLanguage": "id-ID",
    "articleSection": "Blog Dealer Isuzu",
    "keywords": "dealer isuzu jakarta, harga isuzu terbaru, isuzu traga, isuzu elf, isuzu giga, promo isuzu",
    "isAccessibleForFree": true
  }
  </script>

  <!-- OPEN GRAPH -->
  <meta property="og:title" content="<?= htmlspecialchars($judul, ENT_QUOTES); ?>">
  <meta property="og:description" content="<?= htmlspecialchars($deskripsi, ENT_QUOTES); ?>">
  <meta property="og:image" content="<?= $og_image; ?>">
  <meta property="og:url" content="<?= $canonical; ?>">
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="Dealer Resmi Isuzu Jakarta">
  <meta property="og:locale" content="id_ID">

  <!-- TWITTER CARD -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($judul, ENT_QUOTES); ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($deskripsi, ENT_QUOTES); ?>">
  <meta name="twitter:image" content="<?= $og_image; ?>">

  <!-- ROBOTS -->
  <meta name="robots" content="index, follow">

  <!-- FONTS & STYLES -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/navbar.css">
  <link rel="stylesheet" href="/css/home_css/header.css">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/artikel.css">

  <!-- Feather Icons (NON-BLOCKING) -->
    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>
  
  <script src="/js/script.js" defer></script>
</head>
<body>

<header>
  <div class="container header-content navbar">
    <div class="header-title">
      <a href="https://salesisuzuofficial.com">
        <img src="/img/logo.png" alt="Logo Isuzu" style="height:60px">
      </a>
    </div>
    <div class="hamburger-menu">&#9776;</div>
    <nav class="nav links">
      <a href="/">Home</a>
      <a href="/showroom">Showroom Isuzu</a>
      <a href="/produk.php">Produk</a>
      <a href="/simulasi_kredit.php">Simulasi Kredit</a>
      <a href="/artikel.php">Blog & Artikel</a>
      <a href="/contact.php">Contact</a>
    </nav>
  </div>
</header>

<section class="detail-artikel">
  <div class="container">
    <div class="artikel-wrapper" style="display:flex; flex-wrap:wrap; gap:30px;">

      <!-- Artikel Utama -->
      <div class="artikel-main" style="flex:1 1 65%;">
        <?php if ($artikel): ?>
          <h1><?= htmlspecialchars($artikel['judul']); ?></h1>

          <p style="color:#888; font-size:14px; margin-bottom:15px;">
            Diposting oleh <strong><?= htmlspecialchars($artikel['author'] ?? 'Dedy Chandra Isuzu'); ?></strong>
            pada <?= date('d M Y', strtotime($artikel['tanggal'] ?? 'now')); ?>
          </p>

          <img src="<?= htmlspecialchars($artikel['gambar']); ?>"
               alt="<?= htmlspecialchars($artikel['judul']); ?>"
               style="width:100%; height:auto; margin-bottom:20px;">

          <div class="isi-artikel">
            <?= nl2br($artikel['isi']); ?>
          </div>

          <a href="/artikel.php" class="btn-kembali" style="display:inline-block; margin-top:20px;">
            Kembali ke Daftar Artikel
          </a>
        <?php else: ?>
          <p>Artikel tidak ditemukan.</p>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <aside class="artikel-sidebar" style="flex:1 1 30%;">

        <!-- Recent Posts (PERBAIKAN URL) -->
        <div class="sidebar-section">
          <h3>Artikel Terbaru Isuzu</h3>
          <div class="recent-posts-list">
            <?php foreach (array_slice($data, 0, 5) as $recent): ?>
              <?php if ($recent['slug'] != $slug): ?>
                <div class="recent-post-item" style="display:flex; gap:12px; margin-bottom:15px;">
                  <a href="/detail_artikel/<?= $recent['slug']; ?>">
                    <img src="<?= htmlspecialchars($recent['gambar']); ?>" 
                         alt="<?= htmlspecialchars($recent['judul']); ?>" 
                         style="width:80px; height:60px; object-fit:cover; border-radius:6px;">
                  </a>
                  <div>
                    <a href="/detail_artikel/<?= $recent['slug']; ?>" 
                       style="font-weight:600; text-decoration:none; color:#333; display:block;">
                      <?= htmlspecialchars($recent['judul']); ?>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Kategori -->
        <div class="sidebar-section">
          <h3>Kategori Artikel Isuzu</h3>
          <ul style="list-style:none; padding-left:0;">
            <?php foreach (array_unique(array_column($data, 'kategori')) as $kat): ?>
              <?php if (!empty($kat)): ?>
                <li style="margin-bottom:8px;">
                  <a href="/artikel.php?kategori=<?= urlencode($kat); ?>" style="color:#333; font-weight:500;">
                    • <?= htmlspecialchars($kat); ?>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>

      </aside>
    </div>

    <!-- Related Posts (PERBAIKAN URL) -->
    <?php if ($artikel): ?>
    <div class="related-posts" style="margin-top:60px;">
      <h2 style="margin-bottom:25px; font-size:26px;">Artikel Terkait Seputar Isuzu</h2>

      <div class="related-list" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:25px;">
        <?php
        $count = 0;
        foreach ($data as $rel):
          if ($rel['slug'] != $slug && $rel['kategori'] === $artikel['kategori']):
        ?>
          <div class="related-item" style="background:#fff; border:1px solid #ddd; border-radius:8px; overflow:hidden;">
            <a href="/detail_artikel/<?= $rel['slug']; ?>" style="text-decoration:none; color:#333;">
              <img src="<?= htmlspecialchars($rel['gambar']); ?>" 
                   alt="<?= htmlspecialchars($rel['judul']); ?>" 
                   style="width:100%; height:160px; object-fit:cover;">
              <div style="padding:15px;">
                <h4 style="font-size:16px; font-weight:600;"><?= htmlspecialchars($rel['judul']); ?></h4>
                <p style="font-size:14px; color:#666;">
                  <?= substr(strip_tags($rel['isi']), 0, 100); ?>...
                </p>
              </div>
            </a>
          </div>
        <?php
            $count++;
            if ($count >= 3) break;
          endif;
        endforeach;

        if ($count === 0) echo "<p>Tidak ada artikel terkait.</p>";
        ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba"></div>

    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>

</body>
</html>
