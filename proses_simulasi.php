<?php
require_once 'admin/config.php'; // koneksi database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama    = trim($_POST['nama'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');
    $mobil   = trim($_POST['mobil'] ?? '');
    $tenor   = trim($_POST['tenor'] ?? '');
    $budget  = trim($_POST['budget'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Bersihkan budget (hapus Rp, titik, spasi, dsb)
    $budget = preg_replace('/[^0-9]/', '', $budget);
    if ($budget === '') $budget = 0;

    // Validasi field wajib
    if ($nama === '' || $telepon === '' || $mobil === '' || $tenor === '' || $message === '') {
        echo "❌ Semua field wajib diisi.";
        exit;
    }

    $sql = "
        INSERT INTO simulasi_kredit 
        (nama, no_telepon, jenis_tipe_mobil, tenor, budget_dp, messages, tanggal_input)
        VALUES (:nama, :no_telepon, :jenis_tipe_mobil, :tenor, :budget_dp, :messages, NOW())
    ";

    $params = [
        ':nama' => $nama,
        ':no_telepon' => $telepon,
        ':jenis_tipe_mobil' => $mobil,
        ':tenor' => $tenor,
        ':budget_dp' => $budget,
        ':messages' => $message
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
