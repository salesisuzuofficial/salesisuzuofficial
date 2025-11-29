<?php
require_once 'admin/config.php'; // Koneksi database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama    = trim($_POST['nama'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');
    $mobil   = trim($_POST['mobil'] ?? '');
    $tenor   = trim($_POST['tenor'] ?? '');
    $budget  = trim($_POST['budget'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // ✅ Bersihkan budget: hilangkan "Rp", titik, spasi, koma, dsb
    $budget = preg_replace('/[^0-9]/', '', $budget);

    // Jika kosong, set jadi 0
    if ($budget === '') {
        $budget = 0;
    }

    // Validasi input
    if ($nama === '' || $telepon === '' || $mobil === '' || $tenor === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    // Query simpan data
    $sql = "
        INSERT INTO simulasi_kredit 
        (nama, no_telepon, jenis_tipe_mobil, tenor, budget_dp, messages, tanggal_input)
        VALUES (:nama, :no_telepon, :jenis_tipe_mobil, :tenor, :budget_dp, :messages, NOW())
    ";

    $params = [
        ':nama'             => $nama,
        ':no_telepon'       => $telepon,
        ':jenis_tipe_mobil' => $mobil,
        ':tenor'            => $tenor,
        ':budget_dp'        => $budget,
        ':messages'         => $message
    ];

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        echo "✅ Data simulasi kredit berhasil dikirim.";
    } catch (Exception $e) {
        error_log("Gagal insert simulasi_kredit: " . $e->getMessage());
        echo "❌ Terjadi kesalahan saat menyimpan data.";
    }

    exit;
}
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

    <!-- Google Analytics -->
    <script async src="https://googletagmanager.com/gtag/js?id=G-TV2MJHYKCB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-TV2MJHYKCB');
    </script>
    <!-- End Google Analytics -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Simulasi Kredit – Astra Isuzu Jakarta Resmi</title>
    <meta name="description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta." />

    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga isuzu, harga isuzu traga, isuzu traga, isuzu elf, isuzu giga, isuzu nlr, isuzu nmr, astra isuzu" />

    <link rel="canonical" href="https://salesisuzuofficial.com/simulasi_kredit.php" />

    <!-- Favicon utama -->
    <link rel="icon" type="image/png" sizes="32x32" href="/faviconisuzu.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/faviconisuzu.png">

    <!-- Favicon untuk browser (ICO multi-size) -->
    <link rel="icon" type="image/x-icon" href="/faviconisuzu.ico">

    <!-- Apple Touch Icon (iPhone/iPad) -->
    <link rel="apple-touch-icon" href="/faviconisuzu.png">

    <!-- Schema JSON-LD -->
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
          "description": "Dealer Isuzu Jakarta resmi dari Astra. Promo, harga terbaru, dan kredit mobil Isuzu.",
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
          "areaServed": ["Jakarta","Bekasi","Depok","Tangerang","Bogor"],
          "makesOffer": [
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Product",
                "name": "Isuzu Elf",
                "description": "Isuzu Elf – Box, Engkel, Double, Microbus."
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Product",
                "name": "Isuzu Giga",
                "description": "Isuzu Giga – Truk Medium & Berat."
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Product",
                "name": "Isuzu Traga",
                "description": "Isuzu Traga – Pick Up & Box."
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Product",
                "name": "Isuzu NLR / NMR",
                "description": "Isuzu NLR & NMR – Truk Ringan & Medium."
              }
            }
          ]
        }
      ]
    }
    </script>

    <!-- Open Graph -->
    <meta property="og:title" content="Simulasi Kredit – Astra Isuzu Jakarta Resmi" />
    <meta property="og:description" content="Simulasi kredit Isuzu – Hitung cicilan dan dapatkan promo resmi dari Astra Isuzu Jakarta." />
    <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta property="og:url" content="https://salesisuzuofficial.com/simulasi_kredit.php" />
    <meta property="og:site_name" content="Dealer Astra Isuzu Jakarta Resmi" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Simulasi Kredit – Astra Isuzu Jakarta Resmi" />
    <meta name="twitter:description" content="Hitung cicilan & dapatkan promo kredit mobil Isuzu resmi Astra." />
    <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />

    <!-- Robots -->
    <meta name="robots" content="index, follow" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/navbar.css" />
    <link rel="stylesheet" href="/css/footer.css" />
    <link rel="stylesheet" href="/css/product_css/header_product.css" />
    <link rel="stylesheet" href="/css/simulasikredit_css/simulasi.css" />

    <!-- Scripts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="/js/script.js" defer></script>
    <script src="/js/simulasi_kredit.js" defer></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe 
            src="https://googletagmanager.com/ns.html?id=GTM-K58SQXH7"
            height="0"
            width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

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
                <a href="/">Home</a>
                <a href="produk.php">Produk</a>
                <a href="simulasi_kredit.php" class="active">Simulasi Kredit</a>
                <a href="artikel.php">Blog & Artikel</a>
                <a href="contact.php">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero hero-produk">
        <div class="slider">
            <img src="img/hero3.webp" class="slide" alt="Banner 1" />
            <img src="img/hero4.webp" class="slide" alt="Banner 2" />
            <img src="img/hero5.webp" class="slide" alt="Banner 3" />
        </div>
        <div class="hero-content">
            <h1>Simulasi Kredit</h1>
        </div>
    </section>

    <!-- Simulasi Kredit Form -->
    <form id="simulasiForm" class="simulasi-form">
        <p class="form-description">
            Jika Anda sudah menentukan jenis dan tipe mobil yang Anda inginkan, silakan isi form berikut dengan data yang benar.
            Kami akan segera merespon pesan Anda dalam waktu maksimal 1 x 24 jam.
        </p>

        <div class="form-row">
            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required />
            </div>

            <div class="form-group">
                <label for="telepon">NOMOR TELEPON</label>
                <input type="tel" id="telepon" name="telepon" placeholder="Nomor Yang Bisa Di Hubungi" required />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="mobil">JENIS & TIPE MOBIL</label>
                <input type="text" id="mobil" name="mobil" placeholder="Jenis & Tipe Mobil" required />
            </div>

            <div class="form-group">
                <label for="tenor">TENOR</label>
                <select id="tenor" name="tenor" required>
                    <option value="" disabled selected>Pilih Tenor</option>
                    <option value="12">12 Bulan</option>
                    <option value="24">24 Bulan</option>
                    <option value="48">48 Bulan</option>
                    <option value="60">60 Bulan</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="budget">BUDGET DP</label>
            <input type="text" id="budget" name="budget" placeholder="Rp." required />
        </div>

        <div class="form-group">
            <label for="message">MESSAGE</label>
            <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini ..." required></textarea>
        </div>

        <button type="submit" class="btn-submit">KIRIM PESAN</button>
    </form>

    <!-- Elfsight WhatsApp Chat -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div 
        class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba"
        data-elfsight-app-lazy>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Feather Icons -->
    <script>feather.replace();</script>

</body>
</html>
