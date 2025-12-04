<?php
// ===== Log & error handling =====
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/sitemap_error.log');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Header XML
header('Content-Type: application/xml; charset=utf-8');

// XML header
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// fungsi bantu
function printUrl($loc, $lastmod, $changefreq = 'monthly', $priority = '0.7') {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>$changefreq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

$base_url = 'https://isuzuindonesia.com';

// halaman index artikel
printUrl("$base_url/artikel", date('Y-m-d'), 'weekly', '0.9');

try {
    // koneksi database
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_name = getenv('DB_NAME') ?: 'u166903321_isuzuofficial';
    $db_user = getenv('DB_USER') ?: 'u166903321_isuzuofficial';
    $db_pass = getenv('DB_PASS') ?: 'Isuzuoff1c1al22!""';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $conn->set_charset('utf8mb4');

    // cek tabel artikel
    $res = $conn->query("SHOW TABLES LIKE 'artikel'");
    if ($res && $res->num_rows > 0) {

        $stmt = $conn->prepare("SELECT slug, tanggal FROM artikel ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $slug_raw = trim($row['slug'] ?? '');
            if ($slug_raw === '') continue;

            $lastmod = !empty($row['tanggal'])
                ? date('Y-m-d', strtotime($row['tanggal']))
                : date('Y-m-d');

            $url = $base_url . '/artikel/' . $slug_raw;
            printUrl($url, $lastmod, 'monthly', '0.6');
        }
        $stmt->close();
    }

    $conn->close();

} catch (Throwable $e) {
    error_log("sitemap-artikel.php caught: " . $e->getMessage());
}

echo "</urlset>\n";
exit;
