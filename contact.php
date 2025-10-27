<?php
require_once 'admin/config.php'; // pastikan file ini memuat koneksi PDO

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil dan bersihkan input
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi sederhana
    if ($name === '' || $phone === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    // Simpan ke database (tabel messages)
    $sql = "INSERT INTO messages (name, phone, message) VALUES (:name, :phone, :message)";
    $params = [
        ':name' => $name,
        ':phone' => $phone,
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

    exit; // stop di sini agar tidak melanjutkan ke HTML
}
?>


<!DOCTYPE html>
<html lang="id">
  <head>
    <!-- ========== META BASIC ========== -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Dealer Isuzu Jakarta | Dapatkan Promo & Harga Terbaik Truck Isuzu
    </title>

    <!-- ========== META SEO ========== -->
    <meta
      name="description"
      content="Dealer Isuzu Jakarta resmi – Dapatkan promo dan harga terbaik untuk truk, pick up, dan kendaraan niaga Isuzu. Hubungi kami untuk penawaran Isuzu Elf, Giga, dan Traga terbaru di Jakarta. Pelayanan cepat & terpercaya!"
    />
    <meta
      name="keywords"
      content="sales isuzu, dealer isuzu jakarta, promo isuzu, harga truk isuzu terbaru, isuzu elf, isuzu giga, isuzu traga"
    />
    <link rel="canonical" href="https://salesisuzuofficial.com/" />

    <!-- ========== FAVICON ========== -->
    <link rel="icon" type="image/png" href="/img/logo.png" />
    <link rel="apple-touch-icon" href="/img/logo.png" />

    <!-- ========== FONTS ========== -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />

    <!-- ========== STYLES ========== -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/product_css/header_product.css" />
    <link rel="stylesheet" href="css/contact_css/contact.css" />

    <!-- ========== SCRIPTS ========== -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="js/script.js" defer></script>
  </head>

  <body>
    <!-- ========== HEADER ========== -->
    <header>
      <div class="container header-content navbar">
        <!-- Logo -->
        <div class="header-title">
          <a href="https://salesisuzuofficial.com">
            <img
              src="img/logo.png"
              alt="Logo Isuzu"
              style="height: 55px"
            />
          </a>
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <div class="hamburger-menu">&#9776;</div>

        <!-- Navigation -->
        <nav class="nav links">
          <a href="index.php">Home</a>
          <a href="produk.php">Produk</a>
          <a href="simulasi_kredit.php">Simulasi Kredit</a>
          <a href="maintance.html">Blog & Artikel</a>
          <a href="contact.php">Contact</a>
        </nav>
      </div>
    </header>

    <!-- ========== HERO SECTION ========== -->
    <section class="hero hero-produk">
    <div class="slider">
        <img src="img/hero3.jpg" class="slide" alt="Banner 3" />
        <img src="img/hero4.jpg" class="slide" alt="Banner 4" />
        <img src="img/hero5.jpg" class="slide" alt="Banner 5" />
    </div>

    <!-- Teks Overlay -->
    <div class="hero-content">
        <h1>Contact</h1>
    </div>
    </section>

    <!-- Contact Form -->
    <div class="wrapper">
      <h2>Contact Us</h2>
      <p>Fill out the form below to get in touch with us.</p>
      <div class="container">
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

        <div class="map1">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4165925685147!2d106.4925165!3d-6.2086551000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42014b1ba54cb5%3A0x8cbdfa3c0d9e5809!2sDealer%20Hino%20Cikupa!5e0!3m2!1sid!2sid!4v1761059143239!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Elfsight WhatsApp -->
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-1c150e27-6597-4113-becd-79df393b9756" data-elfsight-app-lazy></div>

    <!-- Feather Icons -->
    <script>feather.replace();</script>

    <!-- Form Handler JS -->
    <script>
      document.getElementById("contactForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        fetch("contact.php", {
          method: "POST",
          body: formData,
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
