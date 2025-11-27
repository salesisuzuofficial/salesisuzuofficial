<?php
// Ambil SLUG artikel dari URL
$slug = $_GET['slug'] ?? null;

// Ambil data artikel berdasarkan slug
$artikel = null;
if ($slug) {
  $artikel = json_decode(
    file_get_contents("https://salesisuzuofficial.com/admin/api/get_artikel.php?slug=" . urlencode($slug)), 
    true
  );
}

// Ambil semua artikel untuk recent & related
$data = json_decode(file_get_contents("https://salesisuzuofficial.com/admin/api/get_artikel.php"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Meta SEO -->
  <meta name="keywords" content="<?= htmlspecialchars($artikel['judul']) ?>, Isuzu, Truk, Dealer Isuzu, Jabodetabek, Isuzu Indonesia" />
  <meta property="og:title" content="<?= htmlspecialchars($artikel['judul']) ?>" />
  <meta property="og:description" content="<?= substr(strip_tags($artikel['isi']), 0, 150) ?>..." />
  <meta property="og:image" content="<?= htmlspecialchars($artikel['gambar']) ?>" />
  <meta property="og:url" content="https://salesisuzuofficial.com/detail_artikel.php?slug=<?= htmlspecialchars($artikel['slug']) ?>" />

  <title><?= htmlspecialchars($artikel['judul'] ?? "Artikel") ?></title>

  <link rel="icon" type="image/png" href="/img/favicon.jpeg">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/home_css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/artikel.css" />

  <!-- JS -->
  <script src="js/script.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="container header-content navbar">
      <div class="header-title">
        <a href="https://salesisuzuofficial.com">
          <img src="img/logo.png" alt="Logo Isuzu" style="height: 60px" />
        </a>
      </div>

      <div class="hamburger-menu">&#9776;</div>

      <nav class="nav links">
        <a href="index.php">Home</a>
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
                if ($recent['slug'] !== $slug) {
                  echo '<div class="recent-post-item" style="display:flex; align-items:center; gap:12px; margin-bottom:15px;">';
                  echo '<a href="detail_artikel.php?slug=' . $recent['slug'] . '">';
                  echo '<img src="' . htmlspecialchars($recent['gambar']) . '" style="width:80px; height:60px; object-fit:cover; border-radius:6px;">';
                  echo '</a>';
                  echo '<div>';
                  echo '<a href="detail_artikel.php?slug=' . $recent['slug'] . '" style="font-weight:600; color:#333;">' . htmlspecialchars($recent['judul']) . '</a>';
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
                  echo '<a href="artikel.php?kategori=' . urlencode($kat) . '" style="color:#333; font-weight:500;">• ' . htmlspecialchars($kat) . '</a>';
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
            if ($rel['slug'] !== $slug && $rel['kategori'] === $artikel['kategori']) {
              echo '<div class="related-item" style="background:#fff; border:1px solid #ddd; border-radius:8px; overflow:hidden;">';
              echo '<a href="detail_artikel.php?slug=' . $rel['slug'] . '">';
              echo '<img src="' . $rel['gambar'] . '" style="width:100%; height:160px; object-fit:cover;">';
              echo '<div style="padding:15px;">';
              echo '<h4 style="font-size:16px; font-weight:600;">' . htmlspecialchars($rel['judul']) . '</h4>';
              echo '<p style="font-size:14px; color:#666;">' . substr(strip_tags($rel['isi']), 0, 100) . '...</p>';
              echo '</div></a></div>';

              if (++$related_count >= 3) break;
            }
          }
          ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <script>
    feather.replace();
  </script>
</body>
</html>
