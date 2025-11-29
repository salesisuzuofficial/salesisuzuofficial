<?php
require_once 'admin/config.php'; // Pastikan file ini memuat koneksi PDO

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil dan bersihkan input
    $name    = trim($_POST['name'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi sederhana
    if ($name === '' || $phone === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    // Simpan ke database (tabel messages)
    $sql = "INSERT INTO messages (name, phone, message) VALUES (:name, :phone, :message)";
    $params = [
        ':name'    => $name,
        ':phone'   => $phone,
        ':message' => $message
    ];

    try {
        $rowCount = execPrepared($pdo, $sql, $params);
        if ($rowCount > 0) {
            echo "✅ Pesan Anda berhasil dikirim.";
        } else {
            echo "❌ Gagal menyimpan pesan.";
        }
    } catch (Exception $e) {
        error_log("Gagal insert pesan: " . $e->getMessage());
        echo "❌ Terjadi kesalahan. Silakan coba lagi nanti.";
    }

    exit; // Hentikan agar tidak melanjutkan ke HTML
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){
      w[l]=w[l]||[];
      w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
      var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
      j.async=true;
      j.src='https://googletagmanager.com/gtm.js?id='+i+dl;
      f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K58SQXH7');
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Analytics (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV2MJHYKCB"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-TV2MJHYKCB');
  </script>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Hubungi Kami | Dealer Resmi Astra Isuzu Jakarta</title>

  <meta name="description" content="Dealer Isuzu Jakarta resmi dari Astra. Dapatkan harga terbaru, promo khusus, dan paket kredit mobil Isuzu dengan proses cepat dan aman. Konsultasi gratis & siap melayani seluruh Jakarta." />

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

  <!-- JSON-LD Schema Valid -->
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
        "areaServed": ["Jakarta", "Bekasi", "Depok", "Tangerang", "Bogor"],
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
  <meta property="og:title" content="Hubungi Kami | Dealer Resmi Astra Isuzu Jakarta" />
  <meta property="og:description" content="Dealer Isuzu Jakarta resmi dari Astra. Konsultasi gratis & siap melayani seluruh area Jakarta dan Jabodetabek." />
  <meta property="og:image" content="https://salesisuzuofficial.com/img/isuzu1.jpeg" />
  <meta property="og:url" content="https://salesisuzuofficial.com/contact" />
  <meta property="og:site_name" content="Dealer Astra Isuzu Jakarta Resmi" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="id_ID" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Hubungi Kami | Dealer Resmi Astra Isuzu Jakarta" />
  <meta name="twitter:description" content="Dealer Isuzu Jakarta resmi dari Astra. Promo, harga terbaru, dan kredit mobil Isuzu." />
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

  <!-- Feather Icons (NON-BLOCKING) -->
  <script src="https://unpkg.com/feather-icons" defer></script>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          feather.replace();
      });
  </script>

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://googletagmanager.com/ns.html?id=GTM-K58SQXH7"
            height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

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
        <a href="produk.php">Produk</a>
        <a href="simulasi_kredit.php">Simulasi Kredit</a>
        <a href="artikel.php">Blog & Artikel</a>
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

    <!-- Teks Overlay -->
    <div class="hero-content">
      <h1>Contact</h1>
    </div>
  </section>

  <!-- CONTACT FORM -->
  <div class="wrapper">
    <h2>Contact Us</h2>
    <p>Fill out the form below to get in touch with us.</p>

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
          src="https://google.com/maps/embed?pb=!1m18!1m12!1m3!1d31734.59389305134!2d106.69774901083984!3d-6.154289500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7f2195f5fad%3A0x5a8498a332c8de14!2sASTRA%20ISUZU%20DAAN%20MOGOT!5e0!3m2!1sen!2sid!4v1761570863745!5m2!1sen!2sid"
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

  <!-- Feather Icons -->
  <script>feather.replace();</script>

  <!-- FORM HANDLER SCRIPT -->
  <script>
    document.getElementById("contactForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const form = e.target;
      const formData = new FormData(form);

      fetch("contact.php", {
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
