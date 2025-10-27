<?php
require_once 'admin/config.php'; // koneksi database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama       = trim($_POST['nama'] ?? '');
    $telepon    = trim($_POST['telepon'] ?? '');
    $mobil      = trim($_POST['mobil'] ?? '');
    $tenor      = trim($_POST['tenor'] ?? '');
    $budget     = trim($_POST['budget'] ?? '');
    $message    = trim($_POST['message'] ?? '');

    if ($nama === '' || $telepon === '' || $mobil === '' || $tenor === '' || $budget === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    $sql = "INSERT INTO simulasi_kredit 
            (nama, no_telepon, jenis_tipe_mobil, tenor, budget_dp, messages, tanggal_input)
            VALUES (:nama, :no_telepon, :jenis_tipe_mobil, :tenor, :budget_dp, :messages, NOW())";

    $params = [
        ':nama'            => $nama,
        ':no_telepon'      => $telepon,
        ':jenis_tipe_mobil'=> $mobil,
        ':tenor'           => $tenor,
        ':budget_dp'       => $budget,
        ':messages'        => $message
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dealer Isuzu Jakarta | Simulasi Kredit</title>

    <meta name="description" content="Isi formulir simulasi kredit Isuzu untuk mendapatkan estimasi cicilan kendaraan impian Anda. Dapatkan promo menarik dari Dealer Isuzu Jakarta." />
    <meta name="keywords" content="simulasi kredit isuzu, cicilan isuzu, kredit isuzu elf, kredit isuzu giga, kredit isuzu traga" />

    <link rel="canonical" href="https://salesisuzuofficial.com/simulasi_kredit.php" />
    <link rel="icon" type="image/png" href="/img/logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/product_css/header_product.css" />
    <link rel="stylesheet" href="css/product_css/product.css" />

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="js/script.js" defer></script>
    <script src="js/simulasi_kredit.js" defer></script> <!-- File JS baru -->
</head>
<body>
<header>
    <div class="container header-content navbar">
        <div class="header-title">
            <a href="https://salesisuzuofficial.com">
                <img src="img/logo.png" alt="Logo Isuzu" style="height: 55px" />
            </a>
        </div>
        <div class="hamburger-menu">&#9776;</div>
        <nav class="nav links">
            <a href="index.php">Home</a>
            <a href="maintance.html">Produk</a>
            <a href="simulasi_kredit.php">Simulasi Kredit</a>
            <a href="maintance.html">Blog & Artikel</a>
            <a href="maintance.html">Contact</a>
        </nav>
    </div>
</header>

<section class="hero hero-produk">
    <div class="slider">
        <img src="img/hero3.jpg" class="slide" alt="Banner 3" />
        <img src="img/hero4.jpg" class="slide" alt="Banner 4" />
        <img src="img/hero5.jpg" class="slide" alt="Banner 5" />
    </div>
    <div class="hero-content">
        <h1>Simulasi Kredit</h1>
    </div>
</section>

<form id="simulasiForm" style="max-width: 800px; margin: 0 auto; font-family: Poppins, sans-serif;">
    <p style="text-align: center; margin-bottom: 20px; font-size: 14px; color: #333;">
        Jika Anda sudah menentukan jenis dan tipe mobil yang Anda inginkan, silakan isi form berikut dengan data yang benar.
        Kami akan segera merespon pesan Anda dalam waktu maksimal 1 x 24 jam.
    </p>

    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 15px;">
        <div style="flex: 1; min-width: 250px;">
            <label for="nama" style="font-weight: 600; font-size: 13px;">Nama</label><br />
            <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" required />
        </div>

        <div style="flex: 1; min-width: 250px;">
            <label for="telepon" style="font-weight: 600; font-size: 13px;">Nomor Telepon</label><br />
            <input type="tel" id="telepon" name="telepon" placeholder="Nomor Yang Bisa Di Hubungi" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" required />
        </div>
    </div>

    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 15px;">
        <div style="flex: 1; min-width: 250px;">
            <label for="mobil" style="font-weight: 600; font-size: 13px;">Jenis & Tipe Mobil</label><br />
            <input type="text" id="mobil" name="mobil" placeholder="Jenis & Tipe Mobil" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" required />
        </div>

        <div style="flex: 1; min-width: 250px;">
            <label for="tenor" style="font-weight: 600; font-size: 13px;">Tenor</label><br />
            <select id="tenor" name="tenor" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" required>
                <option value="" disabled selected>Pilih Tenor</option>
                <option value="12">12 Bulan</option>
                <option value="24">24 Bulan</option>
                <option value="48">48 Bulan</option>
                <option value="60">60 Bulan</option>
            </select>
        </div>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="budget" style="font-weight: 600; font-size: 13px;">Budget DP</label><br />
        <input type="text" id="budget" name="budget" placeholder="Rp. 50.000.000" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" required />
    </div>

    <div style="margin-bottom: 20px;">
        <label for="message" style="font-weight: 600; font-size: 13px;">Message</label><br />
        <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini ..." style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;" required></textarea>
    </div>

    <button type="submit" style="width: 100%; background-color: #dc3545; color: white; padding: 12px 0; font-weight: 600; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">
        KIRIM PESAN
    </button>
</form>

<?php include 'footer.php'; ?>
</body>
</html>
