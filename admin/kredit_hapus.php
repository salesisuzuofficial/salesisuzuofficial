<?php
session_start();

// Pastikan admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php'; // Pastikan file ini sudah men-define $pdo

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        // Hapus data simulasi kredit berdasarkan ID menggunakan prepared statement
        $stmt = $pdo->prepare("DELETE FROM simulasi_kredit WHERE id = ?");
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['message'] = [
                'type' => 'success',
                'text' => 'Data simulasi kredit berhasil dihapus!'
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Data simulasi kredit tidak ditemukan.'
            ];
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = [
            'type' => 'danger',
            'text' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()
        ];
    }

} else {
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'ID data tidak valid.'
    ];
}

// Kembali ke halaman kredit
header("Location: kredit.php");
exit;
?>
