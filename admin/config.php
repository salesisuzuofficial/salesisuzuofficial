<?php
$host = "localhost";
$user = "u142136422_isuzuoffc";
$pass = "Officialsalesisuzu22@@";
$db   = "u142136422_isuzuoffc";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
