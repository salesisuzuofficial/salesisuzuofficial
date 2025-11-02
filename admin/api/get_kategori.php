<?php
include __DIR__ . '/../config.php'; // pastikan path config benar
header('Content-Type: application/json; charset=utf-8');

try {
    // Query kategori
    $stmt = $pdo->query("SELECT id, nama_kategori FROM kategori ORDER BY nama_kategori ASC");
    $kategori = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Ubah output jika kosong
    if (!$kategori) {
        $kategori = [];
    }

    echo json_encode($kategori, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} catch (Exception $e) {
    // Log error untuk developer
    error_log("Error get_kategori.php: " . $e->getMessage());

    // Kirim response JSON error
    http_response_code(500);
    echo json_encode(["error" => "Terjadi kesalahan saat mengambil kategori."]);
}
