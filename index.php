<?php
// index.php — Halaman Maintenance Website Isuzu
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isuzu Indonesia - Maintenance</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .logo {
            width: 150px;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            margin-bottom: 25px;
        }
        a.whatsapp-btn {
            display: inline-block;
            background-color: #25D366;
            color: #fff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        a.whatsapp-btn:hover {
            background-color: #1ebe5d;
        }
        footer {
            position: absolute;
            bottom: 15px;
            width: 100%;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="salesisuzuofficial.com/img/isuzu.webp" alt="Isuzu Logo" class="logo">
        <h1>Website Sedang Dalam Perawatan</h1>
        <p>Kami sedang melakukan pemeliharaan untuk meningkatkan layanan kami.</p>
        <p>Silakan hubungi kami melalui WhatsApp untuk informasi lebih lanjut:</p>
        <a class="whatsapp-btn" href="https://wa.me/6281296632186" target="_blank">Hubungi via WhatsApp</a>
    </div>
    <footer>
        &copy; <?php echo date("Y"); ?> Isuzu Indonesia. Semua hak dilindungi.
    </footer>
</body>
</html>
