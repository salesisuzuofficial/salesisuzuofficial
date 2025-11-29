<?php
include 'header.php';

// FORM PROCESS (tetap sama)
$success = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = trim($_POST['nama']);
    $telp     = trim($_POST['telp']);
    $pesan    = trim($_POST['pesan']);

    if (empty($nama) || empty($telp) || empty($pesan)) {
        $errors[] = "Semua field harus diisi.";
    }

    if (empty($errors)) {
        $success = "Terima kasih, pesan Anda sudah terkirim.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<title>Hubungi Kami – Dealer Resmi Isuzu Jakarta</title>

<meta name="description" content="Hubungi Sales Isuzu Resmi Jakarta untuk pembelian mobil Isuzu baru, konsultasi kredit, test drive, dan penawaran terbaru. Respons cepat!">
<link rel="canonical" href="https://salesisuzuofficial.com/contact" />

<!-- OPEN GRAPH -->
<meta property="og:title" content="Hubungi Kami – Dealer Resmi Isuzu Jakarta">
<meta property="og:description" content="Kontak sales resmi Isuzu Jakarta untuk informasi pembelian, promo, dan konsultasi kredit. Fast response!">
<meta property="og:url" content="https://salesisuzuofficial.com/contact">
<meta property="og:type" content="website">
<meta property="og:image" content="https://salesisuzuofficial.com/assets/img/isuzu-cover.jpg">

<!-- BREADCRUMB JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Beranda",
      "item": "https://salesisuzuofficial.com/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Contact",
      "item": "https://salesisuzuofficial.com/contact"
    }
  ]
}
</script>

<!-- CONTACT PAGE SCHEMA -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Hubungi Sales Isuzu Jakarta",
  "url": "https://salesisuzuofficial.com/contact"
}
</script>

<!-- ORGANIZATION + AUTO DEALER SCHEMA (DIPERBAIKI QUOTES ERROR) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AutoDealer",
  "name": "Sales Isuzu Jakarta",
  "url": "https://salesisuzuofficial.com/",
  "image": "https://salesisuzuofficial.com/assets/img/isuzu-cover.jpg",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jl. Yos Sudarso No.1",
    "addressLocality": "Jakarta Utara",
    "addressRegion": "DKI Jakarta",
    "postalCode": "14350",
    "addressCountry": "ID"
  },
  "telephone": "+6281296632186"
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<style>
.contact-form { max-width: 600px; margin: auto; }
.error { color: red; margin-bottom: 10px; }
.success { color: green; margin-bottom: 10px; }
</style>
</head>

<body>

<div class="container" style="padding:40px 0;">

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb" style="margin-bottom:20px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>

    <h1>Hubungi Sales Isuzu Jakarta</h1>
    <p>Silakan isi form berikut, tim kami akan segera menghubungi Anda.</p>

    <?php if (!empty($errors)): ?>
        <div class="error"><?= implode("<br>", $errors); ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="success"><?= $success; ?></div>
    <?php endif; ?>

    <!-- FORM (tidak diubah alur POST-nya) -->
    <form action="" method="POST" class="contact-form">

        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>

        <label>No. Telp / Whatsapp</label>
        <input type="text" name="telp" class="form-control" required>

        <label>Pesan</label>
        <textarea name="pesan" class="form-control" rows="4" required></textarea>

        <br>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>

    <br><br>

    <!-- MAP -->
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18..." 
        width="100%" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
