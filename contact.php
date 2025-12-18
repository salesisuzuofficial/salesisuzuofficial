<?php
require_once 'admin/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Supaya respon fetch() tidak bercampur HTML
    header("Content-Type: text/plain; charset=utf-8");

    $name    = trim($_POST['name'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $phone === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    $sql = "INSERT INTO messages (name, phone, message)
            VALUES (:name, :phone, :message)";

    $params = [
        ':name'    => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
        ':phone'   => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'),
        ':message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8')
    ];

    try {
        $rowCount = execPrepared($pdo, $sql, $params);

        if ($rowCount > 0) {
            echo "✅ Pesan Anda berhasil dikirim.";
        } else {
            echo "❌ Gagal menyimpan pesan.";
        }
    } catch (Exception $e) {
        error_log("ERROR INSERT messages: " . $e->getMessage());
        echo "❌ Terjadi kesalahan server.";
    }

    exit; // PASTI exit agar HTML tidak ikut terkirim
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

  <title>Hubungi Kami | Dealer Resmi Isuzu Jakarta</title>

  <meta name="description" content="Dealer resmi Isuzu Jakarta dengan harga terbaru & promo besar hari ini! Traga, ELF & GIGA tersedia. DP ringan, cicilan mudah, konsultasi gratis." />

  <!-- Canonical fixed -->
  <link rel="canonical" href="https://salesisuzuofficial.com/contact" />

  <!-- Favicon utama -->
  <link rel="icon" type="image/png" sizes="32x32" href="https://salesisuzuofficial.com/faviconisuzu.png">
  <link rel="icon" type="image/png" sizes="192x192" href="https://salesisuzuofficial.com/faviconisuzu.png">

  <!-- Favicon untuk browser (ICO multi-size) -->
  <link rel="icon" type="image/x-icon" href="https://salesisuzuofficial.com/faviconisuzu.ico">

  <!-- Apple Touch Icon (iPhone/iPad) -->
  <link rel="apple-touch-icon" href="https://salesisuzuofficial.com/faviconisuzu.png">

  <!-- Preconnect for speed -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- JSON-LD Schema Contact Page - SEO & CTR Optimized -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "https://salesisuzuofficial.com/#organization",
        "name": "Dealer Resmi Isuzu Jakarta",
        "url": "https://salesisuzuofficial.com/",
        "logo": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
        "sameAs": [
          "https://www.facebook.com/",
          "https://www.instagram.com/",
          "https://wa.me/6281296632186"
        ]
      },
      {
        "@type": "WebSite",
        "@id": "https://salesisuzuofficial.com/#website",
        "url": "https://salesisuzuofficial.com/",
        "name": "Dealer Resmi Isuzu Jakarta",
        "alternateName": "Sales Resmi Isuzu Jakarta",
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
        "@type": ["AutoDealer", "LocalBusiness"],
        "@id": "https://salesisuzuofficial.com/#autodealer",
        "name": "Dealer Resmi Isuzu Jakarta",
        "url": "https://salesisuzuofficial.com/",
        "image": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
        "logo": "https://salesisuzuofficial.com/img/isuzu1.jpeg",
        "description": "Dealer resmi Isuzu Jakarta dengan harga terbaru & promo besar hari ini. Tersedia Isuzu Traga, ELF, dan GIGA. DP ringan, cicilan fleksibel, pengiriman cepat, konsultasi GRATIS sekarang!",
        "telephone": "+6281296632186",
        "email": "salesisuzuofficial@gmail.com",
        "areaServed": [
          "Jakarta",
          "Bekasi",
          "Depok",
          "Tangerang",
          "Bogor"
        ],
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Jalan Daan Mogot Km 13.9 Rawa Buaya RT 12 RW 3 Cengkareng Timur",
          "addressLocality": "Jakarta Barat",
          "addressRegion": "DKI Jakarta",
          "postalCode": "11730",
          "addressCountry": "ID"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": -6.1387,
          "longitude": 106.7219
        },
        "hasMap": "https://www.google.com/maps",
        "openingHours": "Mo-Sa 08:00-17:00",
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "+6281296632186",
          "contactType": "sales",
          "availableLanguage": ["Indonesian"]
        }
      },
      {
        "@type": "WebPage",
        "@id": "https://salesisuzuofficial.com/contact#webpage",
        "url": "https://salesisuzuofficial.com/contact",
        "name": "Kontak Dealer Resmi Isuzu Jakarta | Promo Traga, ELF & GIGA",
        "description": "Hubungi dealer resmi Isuzu Jakarta untuk harga terbaru, promo Traga, ELF & GIGA, simulasi kredit, dan pemesanan cepat via WhatsApp.",
        "isPartOf": {
          "@id": "https://salesisuzuofficial.com/#website"
        },
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "https://salesisuzuofficial.com/img/isuzu1.jpeg"
        }
      }
    ]
  }
  </script>

  <!-- Open Graph -->
  <meta property="og:title" content="Hubungi Kami | Dealer Resmi Isuzu Jakarta" />
  <meta property="og:description" content="Dealer resmi Isuzu Jakarta dengan harga terbaru & promo besar hari ini! Traga, ELF & GIGA tersedia. DP ringan, cicilan mudah, konsultasi gratis." />
  <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
  <meta property="og:url" content="https://salesisuzuofficial.com/contact" />
  <meta property="og:site_name" content="Dealer Resmi Isuzu Jakarta" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="id_ID" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Hubungi Kami | Dealer Resmi Isuzu Jakarta" />
  <meta name="twitter:description" content="Dealer resmi Isuzu Jakarta dengan harga terbaru & promo besar hari ini! Traga, ELF & GIGA tersedia. DP ringan, cicilan mudah, konsultasi gratis." />
  <meta name="twitter:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />

  <!-- Robots -->
  <meta name="robots" content="index, follow" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/product_css/header_product.css" />
  <link rel="stylesheet" href="css/contact_css/contact.css" />

  <!-- Scripts -->
  <script src="js/script.js" defer></script>

  <!-- Feather Icons FIX (Anti-Error) -->
    <script src="/js/feather.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
    </script>
</head>

<body>
  <!-- HEADER -->
  <header>
    <div class="container header-content navbar">
      <!-- Logo -->
      <div class="header-title">
        <a href="https://salesisuzuofficial.com">
          <img src="img/logo.png" alt="Logo Isuzu" style="height: 55px" />
        </a>
      </div>

      <!-- Hamburger Menu (Mobile) -->
      <div class="hamburger-menu">&#9776;</div>

      <!-- Navigation -->
      <nav class="nav links">
        <a href="/">Home</a>
        <a href="/showroom">Showroom</a>
        <a href="/produk">Produk</a>
        <a href="/simulasi_kredit">Simulasi Kredit</a>
        <a href="/artikel">Blog & Artikel</a>
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

    <!-- Teks Overlay -->
    <div class="hero-content">
      <h1>Hubungi Dealer Resmi Isuzu Jakarta</h1>
    </div>
  </section>

  <!-- CONTACT FORM -->
  <div class="wrapper">
    <h2>Kontak Sales Resmi Isuzu Jakarta</h2>
    <p>
    Konsultasi gratis seputar <strong>harga terbaru Isuzu Traga, ELF & GIGA</strong>, 
    promo DP ringan, serta simulasi kredit cepat & mudah.
    </p>

    <div class="container">

      <!-- Form -->
      <div class="contact-form">
        <form id="contactForm">
          <label for="name">Your Name:</label>
          <input type="text" id="name" name="name" required />

          <label for="phone">Your Phone Number:</label>
          <input type="tel" id="phone" name="phone" required />

          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="6" required></textarea>

          <button type="submit"><strong>Submit</strong></button>
        </form>
      </div>
      
      <!-- Map -->
      <div class="map1">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31734.59389305134!2d106.69774901083984!3d-6.154289500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7f2195f5fad%3A0x5a8498a332c8de14!2sASTRA%20ISUZU%20DAAN%20MOGOT!5e0!3m2!1sen!2sid!4v1761570863745!5m2!1sen!2sid"
          width="600"
          height="450"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php include 'footer.php'; ?>

  <!-- ELFSIGHT WHATSAPP CHAT -->
  <script src="https://elfsightcdn.com/platform.js" async></script>
  <div class="elfsight-app-f56c7d51-f2e3-421a-bdba-8f4071e20aba" data-elfsight-app-lazy></div>

  <!-- FORM HANDLER SCRIPT -->
  <script>
    document.getElementById("contactForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const form = e.target;
      const formData = new FormData(form);

      fetch("/contact", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        alert(data);
        form.reset();
      })
      .catch(err => {
        alert("❌ Gagal mengirim pesan.");
        console.error(err);
      });
    });
  </script>
</body>
</html>
