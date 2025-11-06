<?php
require_once 'admin/config.php'; // koneksi ke database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data & sanitasi
    $name    = trim($_POST['name'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi sederhana
    if ($name === '' || $phone === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    // Simpan ke tabel messages
    $sql = "INSERT INTO messages (name, phone, message) VALUES (:name, :phone, :message)";
    $params = [
        ':name' => $name,
        ':phone' => $phone,
        ':message' => $message
    ];

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        echo "✅ Pesan Anda berhasil dikirim.";
    } catch (Exception $e) {
        error_log("Gagal insert pesan: " . $e->getMessage());
        echo "❌ Terjadi kesalahan saat menyimpan pesan.";
    }

    exit;
}
?>
