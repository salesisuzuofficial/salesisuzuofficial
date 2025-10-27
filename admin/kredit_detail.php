<?php
session_start();

// 🔐 Cek login admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php'; // Pastikan file ini mendefinisikan $pdo (PDO connection)

// ✅ Validasi ID dari URL
$id = $_GET['id'] ?? null;
if (!$id || !ctype_digit($id)) {
    $_SESSION['message'] = ['type' => 'danger', 'text' => 'Permintaan tidak valid.'];
    header("Location: kredit.php");
    exit;
}
$id = (int)$id;

// 🧩 Fungsi helper ambil 1 data
if (!function_exists('fetchOnePrepared')) {
    function fetchOnePrepared($pdo, $query, $params = [])
    {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// 🎯 Ambil data simulasi kredit
$kredit = fetchOnePrepared($pdo, "SELECT * FROM simulasi_kredit WHERE id = ?", [$id]);

if (!$kredit) {
    $_SESSION['message'] = ['type' => 'danger', 'text' => 'Data simulasi kredit tidak ditemukan.'];
    header("Location: kredit.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Simulasi Kredit</title>

<!-- Favicon -->
<link rel="icon" href="../img/logo.png" type="image/png" />

<!-- Bootstrap & FontAwesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- Custom Admin Style -->
<link rel="stylesheet" href="css/admin.css?v=2">
</head>
<body>

<!-- Tombol menu untuk mode mobile -->
<button class="menu-toggle"><i class="fa-solid fa-bars"></i></button>
<div class="overlay"></div>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo text-center">
        <img src="../img/logo.png" alt="Logo">
    </div>
    <a href="index.php"><i class="fa-solid fa-home"></i> Dashboard</a>
    <a href="produk.php"><i class="fa-solid fa-box"></i> Produk</a>
    <a href="artikel.php"><i class="fa-solid fa-file-alt"></i> Artikel</a>
    <a href="messages.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
    <a href="kredit.php" class="active"><i class="fa-solid fa-car"></i> Simulasi Kredit</a>
    <div class="mt-auto pt-3">
        <a href="logout.php" class="logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <h3 class="fw-semibold text-primary mb-4">
        <i class="fa-solid fa-car me-2"></i> Detail Simulasi Kredit
    </h3>

    <div class="card p-4 shadow-sm border-0">
        <div class="mb-3">
            <label class="fw-semibold">Nama:</label>
            <p><?= htmlspecialchars($kredit['nama'] ?? '-') ?></p>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">No Telepon:</label>
            <p><?= htmlspecialchars($kredit['no_telepon'] ?? '-') ?></p>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Jenis dan Tipe Mobil:</label>
            <p><?= htmlspecialchars($kredit['jenis_tipe_mobil'] ?? '-') ?></p>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Tenor:</label>
            <p><?= htmlspecialchars($kredit['tenor'] ?? '-') ?> Bulan</p>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Budget DP:</label>
            <p>Rp <?= number_format((float)($kredit['budget_dp'] ?? 0), 0, ',', '.') ?></p>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Pesan:</label>
            <p><?= nl2br(htmlspecialchars($kredit['messages'] ?? '-')) ?></p>
        </div>

        <div class="mb-3">
            <label class="fw-semibold">Tanggal Input:</label>
            <p><?= !empty($kredit['tanggal_input']) ? date("d M Y H:i", strtotime($kredit['tanggal_input'])) : '-' ?></p>
        </div>

        <a href="kredit.php" class="btn btn-primary">
            <i class="fa fa-arrow-left me-1"></i> Kembali ke Data Kredit
        </a>
    </div>
</div>

<!-- JS -->
<script src="js/admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
