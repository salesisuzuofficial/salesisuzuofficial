<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sanitasi input dari query string
$search = isset($_GET['search']) ? trim((string)$_GET['search']) : '';
$selectedKategori = isset($_GET['kategori']) ? trim((string)$_GET['kategori']) : '';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) $page = 1;
$perPage = 6;

// Ambil data kategori (cek error fetching)
$kategoriJson = @file_get_contents("https://salesisuzuofficial.com/admin/api/get_kategori.php");
$kategoriData = $kategoriJson ? json_decode($kategoriJson, true) : [];

// Bangun URL API dengan filter (pakai rawurlencode)
$apiUrl = "https://salesisuzuofficial.com/admin/api/get_artikel.php";
$params = [];
if ($search !== '') {
    $params[] = "search=" . rawurlencode($search);
}
if ($selectedKategori !== '') {
    $params[] = "kategori=" . rawurlencode($selectedKategori);
}
if (!empty($params)) {
    $apiUrl .= '?' . implode('&', $params);
}

// Ambil data artikel (cek error fetching)
$artikelJson = @file_get_contents($apiUrl);
$artikelData = $artikelJson ? json_decode($artikelJson, true) : [];
if (!is_array($artikelData)) $artikelData = [];

$totalArtikel = count($artikelData);
$totalPages = (int) ceil($totalArtikel / $perPage);
$offset = ($page - 1) * $perPage;
$artikel = array_slice($artikelData, $offset, $perPage);

// Canonical & OG URL logic
// Canonical untuk halaman daftar: /artikel.php (tambahkan ?search/kategori/page jika ada)
$canonicalBase = 'https://salesisuzuofficial.com/artikel.php';
$canonical = $canonicalBase;
$queryParts = [];
if ($search !== '') $queryParts['search'] = $search;
if ($selectedKategori !== '') $queryParts['kategori'] = $selectedKategori;
if ($page > 1) $queryParts['page'] = $page;
if (!empty($queryParts)) {
    $canonical .= '?' . http_build_query($queryParts);
}

// Meta description (static fallback)
$metaDescription = 'Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta.'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){
            w[l]=w[l]||[];
            w[l].push({'gtm.start': new Date().getTime(), event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),
                dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;
            j.src='https://googletagmanager.com/gtm.js?id='+i+dl;
            f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K58SQXH7');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita Terbaru Isuzu – Astra Isuzu Jakarta Resmi</title>

    <meta name="description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES); ?>" />
    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga isuzu, harga isuzu traga, isuzu traga pick up, isuzu traga box, isuzu microbus, isuzu elf, isuzu elf box, isuzu elf engkel, isuzu elf double, isuzu cdd long, isuzu cde long, isuzu nlr, isuzu nmr, isuzu giga, isuzu jabodetabek, astra isuzu, jual truk isuzu" />
    <link rel="canonical" href="<?= htmlspecialchars($canonical, ENT_QUOTES); ?>" />

    <!-- Prev/Next pagination links untuk SEO (jika perlu) -->
    <?php if ($page > 1): 
        $prevQuery = $queryParts;
        $prevQuery['page'] = $page - 1;
        $prevHref = $canonicalBase . (empty($prevQuery) ? '' : '?' . http_build_query($prevQuery)); ?>
    <link rel="prev" href="<?= htmlspecialchars($prevHref, ENT_QUOTES); ?>" />
    <?php endif; ?>

    <?php if ($page < $totalPages): 
        $nextQuery = $queryParts;
        $nextQuery['page'] = $page + 1;
        $nextHref = $canonicalBase . (empty($nextQuery) ? '' : '?' . http_build_query($nextQuery)); ?>
    <link rel="next" href="<?= htmlspecialchars($nextHref, ENT_QUOTES); ?>" />
    <?php endif; ?>

    <link rel="icon" type="image/png" href="/img/favicon.jpeg" />
    <link rel="apple-touch-icon" href="/img/favicon.jpeg" />

    <!-- Schema JSON (TELEPHONE FIXED & CLEAN) -->
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
          "description": "Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu.",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jalan Daan Mogot Km 13.9 Rawa Buaya RT 12 RW 3 Cengkareng Timur",
            "addressLocality": "Jakarta Barat",
            "addressRegion": "DKI Jakarta",
            "postalCode": "11730",
            "addressCountry": "ID"
          },
          "telephone": "+6281296632186",
          "email": "salesisuzuofficial@gmail.com",
          "areaServed": ["Jakarta", "Bekasi", "Depok", "Tangerang", "Bogor"]
        }
      ]
    }
    </script>

    <!-- Open Graph -->
    <meta property="og:title" content="Berita Terbaru Isuzu – Astra Isuzu Jakarta Resmi" />
    <meta property="og:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES); ?>" />
    <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta property="og:image:alt" content="Dealer Resmi Isuzu Jakarta - Astra Isuzu" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:url" content="<?= htmlspecialchars($canonical, ENT_QUOTES); ?>" />
    <meta property="og:site_name" content="Dealer Astra Isuzu Jakarta Resmi" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Berita Terbaru Isuzu – Astra Isuzu Jakarta Resmi" />
    <meta name="twitter:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES); ?>" />
    <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta name="twitter:image:alt" content="Dealer Resmi Isuzu Jakarta - Astra Isuzu" />

    <meta name="robots" content="index, follow" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV2MJHYKCB"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-TV2MJHYKCB');
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/product_css/header_product.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />
    <link rel="stylesheet" href="css/blog.css" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Custom Style -->
    <style>
        .blog-filter { display:flex; gap:10px; flex-wrap:wrap; align-items:center; margin-bottom:20px; }
        .blog-filter input, .blog-filter select { padding:10px; border:1px solid #ccc; border-radius:8px; font-size:16px; }
        .blog-filter button { padding:10px 20px; background-color:#007e33; color:#fff; border:none; border-radius:8px; cursor:pointer; }
        .pagination { display:flex; justify-content:center; gap:10px; margin-top:30px; }
        .pagination a { padding:8px 16px; background:#eee; text-decoration:none; border-radius:6px; color:#333; }
        .pagination a.active { background-color:#007e33; color:#fff; }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe 
            src="https://googletagmanager.com/ns.html?id=GTM-K58SQXH7"
            height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- HEADER -->
    <header>
        <div class="container header-content navbar">
            <div class="header-title">
                <a href="https://salesisuzuofficial.com">
                    <img src="img/logo.png" alt="Logo Isuzu" style="height: 55px;" />
                </a>
            </div>

            <div class="hamburger-menu">&#9776;</div>

            <nav class="nav links">
                <a href="/">Home</a>
                <a href="produk.php">Produk</a>
                <a href="simulasi_kredit.php">Simulasi Kredit</a>
                <a href="artikel.php" class="active">Blog & Artikel</a>
                <a href="contact.php">Contact</a>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero hero-produk">
        <div class="slider">
            <img src="img/hero3.webp" class="slide" alt="Banner 1" />
            <img src="img/hero4.webp" class="slide" alt="Banner 2" />
            <img src="img/hero5.webp" class="slide" alt="Banner 3" />
        </div>

        <div class="hero-content">
            <h1>Blog & Artikel</h1>
        </div>
    </section>

    <!-- BLOG CONTENT -->
    <section class="content-section">
        <div class="container">
            
            <!-- Filter -->
            <form method="get" class="blog-filter">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari artikel..." 
                    value="<?= htmlspecialchars($search, ENT_QUOTES) ?>" 
                />

                <select name="kategori" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <?php if (is_array($kategoriData) && count($kategoriData) > 0): ?>
                        <?php foreach ($kategoriData as $kat): 
                            $namaKat = $kat['nama_kategori'] ?? '';
                        ?>
                            <option 
                                value="<?= htmlspecialchars($namaKat, ENT_QUOTES) ?>" 
                                <?= $selectedKategori === $namaKat ? 'selected' : '' ?>>
                                <?= htmlspecialchars($namaKat) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <button type="submit">Filter</button>
            </form>

            <!-- Artikel -->
            <div class="blog-grid">
                <?php if (is_array($artikel) && count($artikel) > 0): ?>
                    <?php foreach ($artikel as $row): 
                        $slugRow = $row['slug'] ?? '';
                        $judulRow = $row['judul'] ?? '';
                        $gambarRow = $row['gambar'] ?? '/img/isuzu1.jpeg';
                        $excerpt = substr(strip_tags($row['isi'] ?? ''), 0, 120);
                    ?>
                        <div class="blog-post">
                            <img src="<?= htmlspecialchars($gambarRow, ENT_QUOTES) ?>" alt="<?= htmlspecialchars($judulRow, ENT_QUOTES) ?>">
                            <h2>
                                <a href="/detail_artikel/<?= rawurlencode($slugRow) ?>">
                                    <?= htmlspecialchars($judulRow) ?>
                                </a>
                            </h2>
                            <p><?= htmlspecialchars($excerpt) ?>...</p>
                            <div class="card-footer">
                                <a href="/detail_artikel/<?= rawurlencode($slugRow) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada artikel yang ditemukan.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php
                // Build base query for pagination links
                $baseQuery = [];
                if ($search !== '') $baseQuery['search'] = $search;
                if ($selectedKategori !== '') $baseQuery['kategori'] = $selectedKategori;

                for ($i = 1; $i <= max(1, $totalPages); $i++):
                    $q = $baseQuery;
                    if ($i > 1) $q['page'] = $i;
                    $href = 'artikel.php' . (empty($q) ? '' : '?' . http_build_query($q));
                ?>
                    <a 
                        class="<?= $i === $page ? 'active' : '' ?>" 
                        href="<?= htmlspecialchars($href, ENT_QUOTES) ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <!-- WhatsApp Widget -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div 
        class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba" 
        data-elfsight-app-lazy>
    </div>

    <!-- JS -->
    <script src="js/script.js"></script>
    <script>feather.replace();</script>
</body>
</html>
