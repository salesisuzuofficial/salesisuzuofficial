<?php
// Ambil slug dari URL
$slug = $_GET['slug'] ?? null;

// Ambil semua artikel
$data = json_decode(file_get_contents("https://salesisuzuofficial.com/admin/api/get_artikel.php"), true);
$artikel = null;

// Cari berdasarkan slug
if ($slug && is_array($data)) {
  foreach ($data as $item) {
    if ($item['slug'] === $slug) {
      $artikel = $item;
      break;
    }
  }
}

// Jika tidak ditemukan
if (!$artikel) {
    http_response_code(404);
    $artikel = [
        "judul" => "Artikel tidak ditemukan",
        "isi" => "Maaf, artikel yang Anda cari tidak tersedia.",
        "gambar" => "/img/default.jpg",
        "tanggal" => date("Y-m-d"),
        "kategori" => "",
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <base href="https://salesisuzuofficial.com/">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keywords" content="<?= htmlspecialchars($artikel['judul']) ?>" />
  <meta property="og:title" content="<?= htmlspecialchars($artikel['judul']) ?>" />
  <meta property="og:description" content="<?= substr(strip_tags($artikel['isi']), 0, 150) ?>..." />
  <meta property="og:image" content="<?= htmlspecialchars($artikel['gambar']) ?>" />
  <meta property="og:url" content="https://salesisuzuofficial.com/artikel/<?= $artikel['slug'] ?>" />

  <title><?= htmlspecialchars($artikel['judul']) ?></title>

  <link rel="icon" type="image/png" href="/img/favicon.jpeg">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/navbar.css" />
  <link rel="stylesheet" href="/css/home_css/header.css" />
  <link rel="stylesheet" href="/css/footer.css" />
  <link rel="stylesheet" href="/css/artikel.css" />

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

<!-- Header -->
<header>
  <div class="container header-content navbar">
    <div class="header-title">
      <a href="/">
        <img src="/img/logo.png" alt="Logo Isuzu" style="height: 60px" />
      </a>
    </div>

    <div class="hamburger-menu">&#9776;</div>

    <nav class="nav links">
      <a href="/">Home</a>
      <a href="/produk.php">Produk</a>
      <a href="/simulasi_kredit.php">Simulasi Kredit</a>
      <a href="/artikel.php">Blog & Artikel</a>
      <a href="/contact.php">Contact</a>
    </nav>
  </div>
</header>

<!-- Konten Artikel -->
<section class="detail-artikel">
  <div class="container">
    <div class="artikel-wrapper" style="display:flex; flex-wrap:wrap; gap:30px;">

      <!-- Artikel Utama -->
      <div class="artikel-main" style="flex:1 1 65%;">
        <h1><?= htmlspecialchars($artikel['judul']) ?></h1>
        <p style="color:#888; font-size:14px; margin-bottom:15px;">
          Diposting oleh <strong><?= htmlspecialchars($artikel['author'] ?? 'Dedy Chandra Isuzu') ?></strong>
          pada <?= date('d M Y', strtotime($artikel['tanggal'])) ?>
        </p>
        <img src="<?= htmlspecialchars($artikel['gambar']) ?>" style="width:100%; margin-bottom:20px;">

        <div class="isi-artikel">
          <?= nl2br($artikel['isi']) ?>
        </div>

        <a href="/artikel.php" class="btn-kembali" style="display:inline-block; margin-top:20px;">
          Kembali ke Daftar Artikel
        </a>
      </div>

      <!-- Sidebar -->
      <aside class="artikel-sidebar" style="flex:1 1 30%;">
        <div class="sidebar-section">
          <h3>Recent Posts</h3>
          <div class="recent-posts-list">

            <?php foreach (array_slice($data, 0, 5) as $recent): ?>
              <div class="recent-post-item" style="display:flex; gap:12px; margin-bottom:15px;">
                <a href="/artikel/<?= urlencode($recent['slug']) ?>">
                  <img src="<?= $recent['gambar'] ?>" style="width:80px; height:60px; object-fit:cover; border-radius:6px;">
                </a>
                <div>
                  <a href="/artikel/<?= urlencode($recent['slug']) ?>" style="font-weight:600; color:#333;">
                    <?= htmlspecialchars($recent['judul']) ?>
                  </a>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>

        <div class="sidebar-section">
          <h3>Kategori</h3>
          <ul style="list-style:none; padding-left:0;">
            <?php
            $kategori = array_unique(array_column($data, 'kategori'));
            foreach ($kategori as $kat):
            ?>
              <li style="margin-bottom:8px;">
                <a href="/artikel.php?kategori=<?= urlencode($kat) ?>">• <?= htmlspecialchars($kat) ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </aside>

    </div>

    <!-- Related -->
    <div class="related-posts" style="margin-top:60px;">
      <h2 style="margin-bottom:25px;">Related Posts</h2>

      <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:25px;">
        <?php
        $count = 0;
        foreach ($data as $rel):
          if ($rel['slug'] !== $artikel['slug'] && $rel['kategori'] === $artikel['kategori']):
        ?>
        <div class="related-item">
          <a href="/artikel/<?= urlencode($rel['slug']) ?>">
            <img src="<?= $rel['gambar'] ?>" style="width:100%; height:160px; object-fit:cover;">
            <h4><?= htmlspecialchars($rel['judul']) ?></h4>
            <p><?= substr(strip_tags($rel['isi']), 0, 100) ?>...</p>
          </a>
        </div>
        <?php
            $count++;
            if ($count >= 3) break;
          endif;
        endforeach;
        ?>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<script>feather.replace();</script>
</body>
</html>
