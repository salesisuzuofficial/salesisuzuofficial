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
$canonicalBase = 'https://salesisuzuofficial.com/artikel';

$canonical = $canonicalBase;

$queryParts = [];
if ($search !== '') $queryParts['search'] = $search;
if ($selectedKategori !== '') $queryParts['kategori'] = $selectedKategori;

// Tambahkan page HANYA untuk page > 1
if ($page > 1) {
    $queryParts['page'] = $page;
}

if (!empty($queryParts)) {
    $canonical .= '?' . http_build_query($queryParts);
}


// Meta description (static fallback)
$metaDescription = 'Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta.'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita Terbaru Isuzu – Dealer Resmi Isuzu Jakarta</title>

    <meta name="description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES); ?>" />
    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga isuzu, harga isuzu traga, isuzu traga pick up, isuzu traga box, isuzu microbus, isuzu elf, isuzu elf box, isuzu elf engkel, isuzu elf double, isuzu cdd long, isuzu cde long, isuzu nlr, isuzu nmr, isuzu giga, isuzu jabodetabek, astra isuzu, jual truk isuzu" />
    <link rel="canonical" href="<?= htmlspecialchars($canonical, ENT_QUOTES); ?>" />

    <!-- Prev/Next pagination links untuk SEO (jika perlu) -->
    <?php if ($page > 1): 
        $prevQuery = $queryParts;
        $prevQuery['page'] = $page - 1;
    
    // Jika kembali ke page 1 → HAPUS ?page=1 agar jadi /artikel.php saja
        if ($page - 1 == 1) unset($prevQuery['page']);
    
        $prevHref = $canonicalBase . (empty($prevQuery) ? '' : '?' . http_build_query($prevQuery)); ?>
    <link rel="prev" href="<?= htmlspecialchars($prevHref, ENT_QUOTES); ?>" />
    <?php endif; ?>


    <?php if ($page < $totalPages): 
        $nextQuery = $queryParts;
        $nextQuery['page'] = $page + 1;
        $nextHref = $canonicalBase . (empty($nextQuery) ? '' : '?' . http_build_query($nextQuery)); ?>
    <link rel="next" href="<?= htmlspecialchars($nextHref, ENT_QUOTES); ?>" />
    <?php endif; ?>

    <!-- Favicon utama -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://salesisuzuofficial.com/faviconisuzu.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://salesisuzuofficial.com/faviconisuzu.png">

    <!-- Favicon untuk browser (ICO multi-size) -->
    <link rel="icon" type="image/x-icon" href="https://salesisuzuofficial.com/faviconisuzu.ico">

    <!-- Apple Touch Icon (iPhone/iPad) -->
    <link rel="apple-touch-icon" href="https://salesisuzuofficial.com/faviconisuzu.png">

    <!-- ✅ SEO Optimized Article & Blog Schema for artikel.php -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@graph": [

        {
        "@type": "Organization",
        "@id": "https://salesisuzuofficial.com/#organization",
        "name": "Dealer Resmi Isuzu Jakarta",
        "url": "https://salesisuzuofficial.com/",
        "logo": {
            "@type": "ImageObject",
            "url": "https://salesisuzuofficial.com/img/isuzu1.jpeg"
        },
        "sameAs": [
            "https://www.facebook.com/",
            "https://www.instagram.com/"
        ]
        },

        {
        "@type": "WebSite",
        "@id": "https://salesisuzuofficial.com/#website",
        "url": "https://salesisuzuofficial.com/",
        "name": "Dealer Resmi Isuzu Jakarta",
        "publisher": {
            "@id": "https://salesisuzuofficial.com/#organization"
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://salesisuzuofficial.com/?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
        },

        {
        "@type": "AutoDealer",
        "@id": "https://salesisuzuofficial.com/#dealer",
        "name": "Dealer Resmi Isuzu Jakarta",
        "image": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
        "url": "https://salesisuzuofficial.com/",
        "telephone": "+6281296632186",
        "email": "salesisuzuofficial@gmail.com",
        "priceRange": "IDR",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Daan Mogot No.Km 13,9, Cengkareng Timur",
            "addressLocality": "Jakarta Barat",
            "addressRegion": "DKI Jakarta",
            "postalCode": "11730",
            "addressCountry": "ID"
        },
        "areaServed": [
            "Jakarta",
            "Bekasi",
            "Depok",
            "Tangerang",
            "Bogor"
        ]
        },

        {
        "@type": "WebPage",
        "@id": "https://salesisuzuofficial.com/artikel#webpage",
        "url": "https://salesisuzuofficial.com/artikel",
        "name": "Artikel & Berita Truk Isuzu Terbaru",
        "description": "Kumpulan artikel, tips perawatan, harga, promo dan berita terbaru seputar truk Isuzu di Jakarta & sekitarnya.",
        "isPartOf": {
            "@id": "https://salesisuzuofficial.com/#website"
        }
        }

    ]
    }
    </script>

    <!-- Open Graph -->
    <meta property="og:title" content="Berita Terbaru Isuzu – Dealer Resmi Isuzu Jakarta" />
    <meta property="og:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES); ?>" />
    <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta property="og:image:alt" content="Dealer Resmi Isuzu Jakarta" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:url" content="<?= htmlspecialchars($canonical, ENT_QUOTES); ?>" />
    <meta property="og:site_name" content="Dealer Resmi Isuzu Jakarta" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Berita Terbaru Isuzu – Dealer Resmi Isuzu Jakarta" />
    <meta name="twitter:description" content="<?= htmlspecialchars($metaDescription, ENT_QUOTES); ?>" />
    <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta name="twitter:image:alt" content="Dealer Resmi Isuzu Jakarta" />

    <meta name="robots" content="index, follow" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/product_css/header_product.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />
    <link rel="stylesheet" href="css/blog.css" />

  <!-- Feather Icons (NON-BLOCKING) -->
    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>

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
                <a href="/showroom">Showroom Isuzu</a>
                <a href="/produk">Produk</a>
                <a href="/simulasi_kredit">Simulasi Kredit</a>
                <a href="/artikel" class="active">Blog & Artikel</a>
                <a href="/contact">Contact</a>
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
            <h1>Artikel & Berita Isuzu Terbaru</h1>
        </div>
    </section>

    <!-- Blog Intro -->
    <section class="blog-intro">
    <div class="container">
        <h2>Update Terbaru Seputar Harga, Promo & Tips Truk Isuzu</h2>
        <p>
        Temukan artikel lengkap seputar <strong>harga truk Isuzu terbaru</strong>, 
        <strong>promo dealer Isuzu Jakarta</strong>, serta tips perawatan untuk 
        Traga, ELF, dan Giga agar bisnis Anda semakin efisien.
        </p>
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

            <!-- Blog List Title -->
            <h2 class="blog-list-title">
            Daftar Artikel Truk Isuzu & Promo Dealer Terbaru
            </h2>

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
                    $href = '/artikel' . (empty($q) ? '' : '?' . http_build_query($q));
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
    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>
</body>
</html>
