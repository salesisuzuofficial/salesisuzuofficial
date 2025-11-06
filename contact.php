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

  <!-- Google tag (gtag.js) -->
  <script async src="https://googletagmanager.com/gtag/js?id=G-TV2MJHYKCB"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-TV2MJHYKCB');
  </script>

  <!-- META BASIC -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dealer Isuzu Jakarta | Dapatkan Promo & Harga Terbaik Truck Isuzu</title>

  <!-- META SEO -->
  <meta name="description" content="Dealer Isuzu Jakarta resmi – Dapatkan promo dan harga terbaik untuk truk, pick up, dan kendaraan niaga Isuzu. Hubungi kami untuk penawaran Isuzu Elf, Giga, dan Traga terbaru di Jakarta. Pelayanan cepat & terpercaya!" />
  <meta name="keywords" content="sales isuzu, dealer isuzu jakarta, dealer isuzu resmi, promo isuzu terbaru, harga truk isuzu terbaru, harga isuzu traga, isuzu traga pick up, isuzu traga box, isuzu microbus, isuzu elf, isuzu elf box, isuzu elf engkel, isuzu elf double, isuzu cdd long, isuzu cde long, isuzu nlr, isuzu nmr, isuzu giga, isuzu truk ringan, isuzu truk medium, cicilan truk isuzu, kredit truk isuzu, isuzu jabodetabek, dealer truk isuzu, jual truk isuzu" />
  <link rel="canonical" href="https://salesisuzuofficial.com/contact" />

  <!-- FAVICON -->
  <link rel="icon" type="image/png" href="/img/favicon.jpeg" />
  <link rel="apple-touch-icon" href="/img/favicon.jpeg" />

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

  <!-- STYLES -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/product_css/header_product.css" />
  <link rel="stylesheet" href="css/contact_css/contact.css" />

  <!-- SCRIPTS -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="js/script.js" defer></script>
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
        <a href="index.php">Home</a>
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
