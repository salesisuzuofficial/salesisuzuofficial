<?php
include "../config.php";
header('Content-Type: application/json; charset=utf-8');

// Ambil parameter
$search   = isset($_GET['search']) ? trim($_GET['search']) : null;
$kategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : null;
$slug     = isset($_GET['slug']) ? trim($_GET['slug']) : null;

// Query dasar
$sql = "
    SELECT 
        a.id, 
        a.slug, 
        a.judul, 
        a.isi, 
        a.gambar, 
        a.tanggal, 
        k.nama_kategori AS kategori
    FROM artikel a
    LEFT JOIN kategori k ON a.kategori_id = k.id
";

$conditions = [];
$params = [];

// Filter slug (ambil 1 artikel berdasarkan slug)
if ($slug) {
    $conditions[] = "a.slug = :slug";
    $params[':slug'] = $slug;
}

// Filter pencarian
if ($search) {
    $conditions[] = "(a.judul LIKE :search OR a.isi LIKE :search)";
    $params[':search'] = "%{$search}%";
}

// Filter kategori
if ($kategori) {
    $conditions[] = "k.nama_kategori = :kategori";
    $params[':kategori'] = $kategori;
}

// Tambahkan kondisi jika ada
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$sql .= " ORDER BY a.id DESC";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    // Jika request pakai slug → hanya 1 artikel
    if ($slug) {
        $artikel = $stmt->fetch();
        if ($artikel && !empty($artikel['gambar'])) {
            $artikel['gambar'] = '../uploads/artikel/' . $artikel['gambar'];
        }
        echo json_encode($artikel, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    // Kalau tidak pakai slug → list artikel
    $artikel = $stmt->fetchAll();

    // Ubah path gambar ke URL lengkap
    foreach ($artikel as &$row) {
        if (!empty($row['gambar'])) {
            $row['gambar'] = '../uploads/artikel/' . $row['gambar'];
        }
    }

    echo json_encode($artikel, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    error_log("Error get_artikel: " . $e->getMessage());
    echo json_encode(['error' => 'Terjadi kesalahan saat mengambil data artikel.']);
}
?>
