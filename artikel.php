<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil data kategori dan artikel dari API
$kategoriData = json_decode(file_get_contents("https://salesisuzuofficial.com/admin/api/get_kategori.php"), true);

$search            = $_GET['search'] ?? '';
$selectedKategori  = $_GET['kategori'] ?? '';
$page              = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage           = 6;

// Bangun URL API dengan filter
$apiUrl = "https://salesisuzuofficial.com/admin/api/get_artikel.php";
$params = [];

if ($search !== '') {
    $params[] = "search=" . urlencode($search);
}
if ($selectedKategori !== '') {
    $params[] = "kategori=" . urlencode($selectedKategori);
}
if (!empty($params)) {
    $apiUrl .= '?' . implode('&', $params);
}

$artikelData   = json_decode(file_get_contents($apiUrl), true);
$totalArtikel  = is_array($artikelData) ? count($artikelData) : 0;
$totalPages    = ceil($totalArtikel / $perPage);
$offset        = ($page - 1) * $perPage;
$artikel       = array_slice($artikelData, $offset, $perPage);
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
    <title>Blog & Artikel Isuzu Indonesia | Sales Isuzu Official</title>

    <meta name="description" content="Temukan berbagai artikel dan promo menarik seputar kendaraan Isuzu. Dapatkan update berita terbaru dari Dealer Isuzu Jakarta." />
    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga truk isuzu terbaru, harga isuzu traga, isuzu traga pick up, isuzu traga box, isuzu microbus, isuzu elf, isuzu elf box, isuzu elf engkel, isuzu elf double, isuzu cdd long, isuzu cde long, isuzu nlr, isuzu nmr, isuzu giga, isuzu truk ringan, isuzu truk medium, cicilan truk isuzu, kredit truk isuzu, isuzu jabodetabek, dealer truk isuzu, jual truk isuzu" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="/img/favicon.jpeg" />
    <link rel="canonical" href="https://salesisuzuofficial.com/artikel" />

    <!-- Open Graph -->
    <meta property="og:title" content="Dealer Isuzu Jakarta | Promo & Harga Truk Isuzu Terbaik Di Jakarta" />
    <meta property="og:description" content="Dapatkan promo truk Isuzu terbaru di Jakarta. Konsultasi langsung dengan sales profesional. Gratis penawaran & layanan cepat!" />
    <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta property="og:url" content="https://salesisuzuofficial.com/" />
    <meta property="og:type" content="website" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Dealer Isuzu Jakarta | Promo & Harga Truk Isuzu Terbaik Di Jakarta" />
    <meta name="twitter:description" content="Hubungi kami untuk mendapatkan penawaran terbaik truk Isuzu. Layanan cepat & profesional." />
    <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV2MJHYKCB">
    </script>
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
        .blog-filter {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 20px;
        }
        .blog-filter input,
        .blog-filter select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        .blog-filter button {
            padding: 10px 20px;
            background-color: #007e33;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        .pagination a {
            padding: 8px 16px;
            background: #eee;
            text-decoration: none;
            border-radius: 6px;
            color: #333;
        }
        .pagination a.active {
            background-color: #007e33;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe 
            src="https://googletagmanager.com/ns.html?id=GTM-K58SQXH7"
            height="0" width="0"
            style="display:none;visibility:hidden">
        </iframe>
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
                <a href="index.php">Home</a>
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
                    value="<?= htmlspecialchars($search) ?>" 
                />

                <select name="kategori" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <?php if (is_array($kategoriData)): ?>
                        <?php foreach ($kategoriData as $kat): ?>
                            <option 
                                value="<?= htmlspecialchars($kat['nama_kategori']) ?>" 
                                <?= $selectedKategori === $kat['nama_kategori'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($kat['nama_kategori']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <button type="submit">Filter</button>
            </form>

            <!-- Artikel -->
            <div class="blog-grid">
                <?php if (is_array($artikel) && count($artikel) > 0): ?>
                    <?php foreach ($artikel as $row): ?>
                        <div class="blog-post">
                            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>">
                            <h2>
                                <a href="detail_artikel.php?id=<?= urlencode($row['id']) ?>">
                                    <?= htmlspecialchars($row['judul']) ?>
                                </a>
                            </h2>
                            <p><?= substr(strip_tags($row['isi']), 0, 120) ?>...</p>
                            <div class="card-footer">
                                <a href="detail_artikel.php?id=<?= urlencode($row['id']) ?>">Baca Selengkapnya</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada artikel yang ditemukan.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a 
                        class="<?= $i === $page ? 'active' : '' ?>" 
                        href="?search=<?= urlencode($search) ?>&kategori=<?= urlencode($selectedKategori) ?>&page=<?= $i ?>">
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
