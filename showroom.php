<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'admin/config.php';

// Ambil 3 artikel terbaru dari database
$sql = "
    SELECT 
        a.id, 
        a.judul, 
        a.slug, 
        a.isi, 
        a.gambar, 
        a.tanggal, 
        k.nama_kategori AS kategori
    FROM artikel a
    LEFT JOIN kategori k ON a.kategori_id = k.id
    ORDER BY a.tanggal DESC
    LIMIT 3
";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $artikelData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data artikel: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- TIDAK DIUBAH sesuai permintaan -->
    <title>Dealer Isuzu Jakarta – Astra Isuzu Jakarta Resmi</title>
    <meta name="description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta" />
    <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga isuzu, harga isuzu traga, isuzu traga pick up, isuzu traga box, isuzu elf, isuzu giga, isuzu jabodetabek, astra isuzu" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://salesisuzuofficial.com/" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/faviconisuzu.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/faviconisuzu.png">
    <link rel="icon" type="image/x-icon" href="/faviconisuzu.ico">
    <link rel="apple-touch-icon" href="/faviconisuzu.png">

    <!-- Preload FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

    <!-- CSS (Non-blocking preload + stylesheet) -->
    <link rel="preload" href="/css/style.css" as="style" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/navbar.css" />
    <link rel="stylesheet" href="/css/footer.css" />
    <link rel="stylesheet" href="/css/home_css/header.css" />
    <link rel="stylesheet" href="/css/home_css/companyprofile.css" />
    <link rel="stylesheet" href="/css/home_css/layanan.css" />
    <link rel="stylesheet" href="/css/home_css/produk.css" />
    <link rel="stylesheet" href="/css/home_css/promoutama.css" />
    <link rel="stylesheet" href="/css/home_css/contact.css" />
    <link rel="stylesheet" href="/css/home_css/blogcard.css" />

    <!-- Organization Schema (existing) + LocalBusiness + Product + FAQ (added) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "WebSite",
          "name": "Dealer Isuzu",
          "url": "https://salesisuzuofficial.com/",
          "alternateName": "Dealer Isuzu Jakarta",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://salesisuzuofficial.com/?s={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        },
        {
          "@type": "Organization",
          "name": "Dealer Astra Isuzu Jakarta Resmi",
          "url": "https://salesisuzuofficial.com/",
          "logo": "https://salesisuzuofficial.com/img/isuzu1.jpeg"
        },
        {
          "@type": "AutoDealer",
          "name": "Dealer Astra Isuzu Jakarta - Dedy Chandra",
          "image": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
          "telephone": "+6281296632186",
          "email": "salesisuzuofficial@gmail.com",
          "priceRange": "IDR",
          "url": "https://salesisuzuofficial.com/",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Daan Mogot / Cabang Astra Isuzu (lihat contact page)",
            "addressLocality": "Jakarta",
            "addressRegion": "DKI Jakarta",
            "postalCode": "",
            "addressCountry": "ID"
          },
          "sameAs": [
            "https://www.facebook.com/",
            "https://www.instagram.com/"
          ],
          "areaServed": ["Jakarta", "Tangerang", "Bekasi", "Jabodetabek"]
        }
      ]
    }
    </script>

    <!-- FAQ Schema (example common questions for dealer) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Bagaimana cara membeli mobil Isuzu di Dealer Astra Isuzu Jakarta?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Hubungi Sales kami via WhatsApp atau telepon, konsultasikan kebutuhan Anda, pilih unit, dan kami bantu proses kredit atau pembelian tunai sampai serah terima."
          }
        },
        {
          "@type": "Question",
          "name": "Apakah Dealer Isuzu melayani wilayah Tangerang dan Bekasi?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ya. Dealer kami melayani pembelian, pengecekan stok, dan pengiriman serta layanan after-sales di wilayah Jakarta, Tangerang, dan Bekasi."
          }
        },
        {
          "@type": "Question",
          "name": "Apakah tersedia paket kredit untuk Isuzu Traga dan ELF?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Tersedia berbagai paket kredit dan simulasi cicilan. Silakan hubungi Sales untuk perhitungan custom sesuai tenor dan DP."
          }
        }
      ]
    }
    </script>

    <!-- Open Graph -->
    <meta property="og:title" content="Dealer Isuzu Jakarta – Astra Isuzu Jakarta Resmi" />
    <meta property="og:description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru dan promo khusus mobil Isuzu." />
    <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
    <meta property="og:url" content="https://salesisuzuofficial.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Dealer Isuzu Jakarta – Astra Isuzu Jakarta Resmi" />
    <meta name="twitter:description" content="Promo resmi Astra Isuzu Jakarta. Dapatkan harga & kredit mobil Isuzu terbaru." />
    <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />

    <!-- Google Analytics (non-blocking) -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }

        window.addEventListener("DOMContentLoaded", function(){
            var s = document.createElement("script");
            s.src = "https://www.googletagmanager.com/gtag/js?id=G-TV2MJHYKCB";
            s.async = true;
            document.body.appendChild(s);

            gtag('js', new Date());
            gtag('config', 'G-TV2MJHYKCB');
        });
    </script>

    <!-- Feather Icons -->
    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>

    <!-- JS utama dipindah ke bawah (tidak blocking) -->
    <script defer src="/js/script.js"></script>

</head>

<body>
    <!-- Header -->
    <header>
        <div class="container header-content navbar">
            <div class="header-title">
                <a href="https://salesisuzuofficial.com">
                    <img src="img/logo.png" alt="Logo Dealer Isuzu Astra Jakarta" style="height: 55px" />
                </a>
            </div>

            <div class="hamburger-menu" aria-label="Menu">&#9776;</div>

            <nav class="nav links" aria-label="Main Navigation">
                <a href="/" title="Beranda Dealer Isuzu">Home</a>
                <a href="produk.php" title="Produk Isuzu">Produk</a>
                <a href="simulasi_kredit.php" title="Simulasi Kredit Isuzu">Simulasi Kredit</a>
                <a href="artikel.php" title="Blog & Artikel Isuzu">Blog & Artikel</a>
                <a href="contact.php" title="Kontak Dealer Isuzu">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero" aria-label="Hero banner">
        <div class="slider" role="region" aria-roledescription="carousel">
            <img src="img/hero3.webp" class="slide" alt="Promo Dealer Isuzu Jakarta - Harga & Kredit" loading="lazy" />
            <img src="img/hero4.webp" class="slide" alt="Penawaran Khusus Sales Isuzu Jakarta" loading="lazy" />
            <img src="img/hero5.webp" class="slide" alt="Isuzu Traga, ELF dan Giga - Dealer Resmi" loading="lazy" />
        </div>
    </section>

    <!-- About Company -->
    <section class="about-company" id="about-company">
        <div class="container">
            <div class="about-content">
                <div class="text">
                    <!-- H1 (only one H1 on page) -->
                    <h1>Dealer Isuzu Jakarta Resmi | Astra Isuzu Daan Mogot</h1>
                    <div class="divider"></div>
                    <p>
                        <strong>Astra Isuzu Daan Mogot</strong> adalah dealer resmi Isuzu di Jakarta Barat yang melayani pembelian, perawatan, dan purna jual kendaraan niaga Isuzu untuk wilayah <strong>Jakarta, Tangerang, dan Bekasi</strong>. Dealer ini menyediakan berbagai unit Isuzu mulai dari <em>Traga, ELF, NLR, NMR, FVR, FVM, hingga GIGA</em>, lengkap dengan harga resmi terbaru, promo menarik, dan paket kredit fleksibel untuk mendukung kebutuhan bisnis Anda.
                    </p>

                    <p>
                        Dengan layanan profesional dan showroom modern, Astra Isuzu Daan Mogot memastikan pengalaman pembelian kendaraan yang mudah dan nyaman. Dukungan bengkel resmi, suku cadang asli, dan fasilitas perawatan berkala membuat kendaraan Anda tetap dalam kondisi optimal.
                    </p>

                    <p>
                        Jika Anda mencari <strong>dealer Isuzu resmi di Jakarta Barat</strong>, Astra Isuzu Daan Mogot siap menjadi solusi terpercaya untuk kendaraan niaga Anda. Hubungi <strong>Dedy Chandra – Sales Astra Isuzu Daan Mogot</strong> untuk mendapatkan penawaran terbaik hari ini.
                    </p>
                    <div class="contact-buttons">
                        <a href="https://wa.me/6281296632186?text=Halo%20Chandra%2C%20Saya%20tertarik%20dengan%20mobil%20Isuzu%20dari%20website%20salesisuzuofficial.com" class="btn whatsapp-btn" aria-label="Hubungi via WhatsApp">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i> Whatsapp
                        </a>
                        <a href="mailto:dedychandra99@gmail.com" class="btn email-btn" aria-label="Kirim Email">
                            <i class="fas fa-envelope" aria-hidden="true"></i> Gmail
                        </a>
                    </div>
                </div>

                <div class="image-gallery">
                    <img src="img/dealer.webp" alt="Dealer Resmi Isuzu Jakarta - Dealer Astra Isuzu Jakarta" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <div class="contact-container fade-element" role="region" aria-label="Kontak Dealer">
        <div class="contact-tabs">
            <div class="tab active">Hubungi Kami</div>
        </div>

        <div class="contact-info">
            <div class="contact-item">
                <img src="img/cssupport.png" alt="WhatsApp Isuzu" />
                <div>
                    <strong>Whatsapp</strong><br />
                    +62 812-9663-2186
                </div>
            </div>

            <div class="divider"></div>

            <div class="contact-item">
                <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Telepon Isuzu" />
                <div>
                    <strong>Phone Call</strong><br />
                    +62 812-9663-2186
                </div>
            </div>

            <div class="divider"></div>

            <div class="contact-item">
                <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email Isuzu" />
                <div>
                    <strong>Email</strong><br />
                    salesisuzuofficial@gmail.com
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Widget -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba" data-elfsight-app-lazy></div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>
</body>
</html>
