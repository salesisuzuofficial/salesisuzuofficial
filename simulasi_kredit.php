<?php
require_once 'admin/config.php'; // Koneksi database

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Ambil & bersihkan input
    $nama    = trim($_POST['nama'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');
    $mobil   = trim($_POST['mobil'] ?? '');
    $tenor   = trim($_POST['tenor'] ?? '');
    $budget  = trim($_POST['budget'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Bersihkan angka budget
    $budget = preg_replace('/[^0-9]/', '', $budget);
    if ($budget === '') {
        $budget = 0;
    }

    // Validasi input
    if ($nama === '' || $telepon === '' || $mobil === '' || $tenor === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    // Query INSERT
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17737236287"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-17737236287');
    </script>

    <!-- Event snippet for Website lead conversion page -->
    <script>
    gtag('event', 'conversion', {'send_to': 'AW-17737236287/arbmCI6H8MwbEL_-4olC'});
    </script>



    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Simulasi Kredit – Astra Isuzu Jakarta Resmi</title>
    <meta name="description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta." />

    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga isuzu, harga isuzu traga, isuzu traga, isuzu elf, isuzu giga, isuzu nlr, isuzu nmr, astra isuzu" />

    <link rel="canonical" href="https://salesisuzuofficial.com/simulasi_kredit" />

    <!-- Favicon utama -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://salesisuzuofficial.com/faviconisuzu.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://salesisuzuofficial.com/faviconisuzu.png">

    <!-- Favicon untuk browser (ICO multi-size) -->
    <link rel="icon" type="image/x-icon" href="https://salesisuzuofficial.com/faviconisuzu.ico">

    <!-- Apple Touch Icon (iPhone/iPad) -->
    <link rel="apple-touch-icon" href="https://salesisuzuofficial.com/faviconisuzu.png">

    <!-- Schema JSON-LD -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@graph": [

        {
        "@type": "Organization",
        "@id": "https://salesisuzuofficial.com/#organization",
        "name": "Dealer Resmi Isuzu Jakarta",
        "url": "https://salesisuzuofficial.com/",
        "logo": "https://salesisuzuofficial.com/img/isuzu1.jpeg"
        },

        {
        "@type": "AutoDealer",
        "@id": "https://salesisuzuofficial.com/#autodealer",
        "name": "Dealer Resmi Isuzu Jakarta",
        "url": "https://salesisuzuofficial.com/",
        "image": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
        "telephone": "+6281296632186",
        "email": "salesisuzuofficial@gmail.com",
        "priceRange": "IDR",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jalan Daan Mogot Km 13.9, Jakarta Barat",
            "addressLocality": "Jakarta Barat",
            "addressRegion": "DKI Jakarta",
            "postalCode": "11730",
            "addressCountry": "ID"
        },
        "areaServed": ["Jakarta", "Tangerang", "Bekasi", "Bogor", "Depok"]
        },

        {
        "@type": "WebPage",
        "@id": "https://salesisuzuofficial.com/simulasi_kredit",
        "url": "https://salesisuzuofficial.com/simulasi_kredit",
        "name": "Simulasi Kredit Isuzu – Dealer Resmi Isuzu Jakarta",
        "description": "Halaman simulasi kredit Isuzu untuk menghitung cicilan dan mengajukan pembelian kendaraan Isuzu melalui dealer resmi Astra Isuzu Jakarta."
        },

        {
        "@type": "BreadcrumbList",
        "@id": "https://salesisuzuofficial.com/simulasi_kredit#breadcrumb",
        "itemListElement": [
            {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://salesisuzuofficial.com/"
            },
            {
            "@type": "ListItem",
            "position": 2,
            "name": "Simulasi Kredit",
            "item": "https://salesisuzuofficial.com/simulasi_kredit"
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
    <meta property="og:url" content="https://salesisuzuofficial.com/simulasi_kredit" />
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
    <!-- Header -->
    <header>
        <div class="container header-content navbar">
            <div class="header-title">
                <a href="https://salesisuzuofficial.com/">
                    <img src="img/logo.png" alt="Logo Isuzu" style="height: 55px" />
                </a>
            </div>

            <div class="hamburger-menu">&#9776;</div>

            <nav class="nav links">
                <a href="https://salesisuzuofficial.com/">Home</a>
                <a href="https://salesisuzuofficial.com/showroom">Showroom</a>
                <a href="https://salesisuzuofficial.com/produk">Produk</a>
                <a href="https://salesisuzuofficial.com/simulasi_kredit" class="active">Simulasi Kredit</a>
                <a href="https://salesisuzuofficial.com/artikel">Blog & Artikel</a>
                <a href="https://salesisuzuofficial.com/contact">Contact</a>
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

</body>
</html>
