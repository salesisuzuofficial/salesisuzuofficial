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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hubungi Kami | Hino Official</title>

    <!-- Meta Description -->
    <meta
      name="description"
      content="Hino Official - Dealer Truck Hino Tangerang. Hubungi : 0812 1905 5571 Untuk mendapatkan informasi produk Hino. Layanan Terbaik dan Jaminan Mutu."
    />

    <!-- Meta Keywords -->
    <meta name="keywords" content="sales Hino, sales Hino Jakarta, sales Hino Jabodetabek, sales Hino Tangerang, sales Hino Bekasi, sales Hino Depok, sales Hino Bogor, sales truck Hino, dealer Hino, dealer Hino Jabodetabek, dealer Hino Tangerang, dealer Hino Bekasi, dealer Hino Depok, dealer Hino Bogor, dealer truck Hino, dealer Hino resmi, dealer Hino Jakarta, dealer Hino Indonesia, jual truk Hino, kredit truk Hino, cicilan truk Hino, promo truk Hino, harga truk Hino terbaru, diskon truk Hino, truk Hino Dutro, truk Hino 300, truk Hino 500, Hino Dutro 136 HD, Hino Dutro 4x4, Hino Dutro box, Hino Dutro engkel, spesifikasi Hino Dutro, modifikasi truk Hino, gambar truk Hino, keunggulan truk Hino, truk Hino untuk bisnis, truk Hino untuk logistik, perbandingan truk Hino dan Isuzu Elf, dealer truk Hino termurah, dealer truk hino tangerang, dealer hino cikupa, hino cikupa, dealer hino tangerang murah" />

    <!-- Canonical URL -->
    <link rel="canonical" href="https://official-hino.com/contact.php" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8BPF492E6Z"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-8BPF492E6Z');
    </script>

    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="/img/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="img/logo.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/contact_css/header_contact.css" />
    <link rel="stylesheet" href="css/contact_css/contact.css" />
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
  </head>

  <body>
    <!-- Header -->
    <header>
      <div class="container header-content navbar">
        <div class="header-title">
          <a href="https://official-hino.com">
            <img src="img/logo3.png" alt="Logo Hino" style="height: 60px" />
          </a>
        </div>
        <div class="hamburger-menu">&#9776;</div>
        <nav class="nav links">
          <a href="index.php">Home</a>
          <a href="hino300.php">Hino 300 Series</a>
          <a href="hino500.php">Hino 500 Series</a>
          <a href="hinobus.php">Hino Bus Series</a>
          <a href="artikel.php">Blog & Artikel</a>
          <a href="contact.php">Contact</a>
        </nav>
      </div>
    </header>

    <!-- Contact Hero -->
    <section class="about-hero" style="background-image: url('img/Euro 4 Hino 300.jpeg'); background-size: cover; background-position: center;">
      <div class="about-hero-overlay">
        <div class="about-hero-content container">
          <h1>Contact Us</h1>
          <p>Jika Anda membutuhkan bantuan atau informasi lebih lanjut, kami siap membantu Anda dengan solusi terbaik. Hubungi kami sekarang!.</p>
        </div>
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
