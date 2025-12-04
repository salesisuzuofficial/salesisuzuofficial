<?php
// =======================
// Mulai session (sekali saja)
// =======================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// =======================
// Konfigurasi Database
// =======================
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_NAME') ?: 'u166903321_isuzuofficial';
$db_user = getenv('DB_USER') ?: 'u166903321_isuzuofficial';
$db_pass = getenv('DB_PASS') ?: 'Isuzuoff1c1al22!""'; // ✔ tetap hanya sebagai fallback

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Selalu throw exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Return array asosiatif
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Gunakan prepared statements asli
];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    http_response_code(500);
    exit('Koneksi database gagal.'); // Jangan tampilkan detail error ke user
}

// =======================
// Helper functions
// =======================

/**
 * Fetch multiple rows
 */
function fetchAllPrepared(PDO $pdo, string $sql, array $params = []): array {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

/**
 * Fetch single row
 */
function fetchOnePrepared(PDO $pdo, string $sql, array $params = []): ?array {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch();
    return $row ?: null;
}

/**
 * Execute insert/update/delete
 */
function execPrepared(PDO $pdo, string $sql, array $params = []): int {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->rowCount();
}
