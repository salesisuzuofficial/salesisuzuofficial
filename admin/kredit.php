<?php
session_start();
require 'config.php'; // Pastikan $pdo sudah terdefinisi (PDO connection)

// Cek session login admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

try {
    // Ambil data simulasi kredit dari database (urut terbaru)
    $stmt = $pdo->query("SELECT * FROM simulasi_kredit ORDER BY tanggal_input DESC");
    $kredits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'Gagal mengambil data simulasi kredit: ' . $e->getMessage()
    ];
    $kredits = [];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Simulasi Kredit</title>

<link rel="icon" href="../img/logo.png" type="image/png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/admin.css?v=3">
</head>
<body>

<button class="menu-toggle"><i class="fa-solid fa-bars"></i></button>
<div class="overlay"></div>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo text-center">
        <img src="../img/logo.png" alt="Logo">
    </div>
    <a href="index.php"><i class="fa-solid fa-home"></i> Dashboard</a>
    <a href="artikel.php"><i class="fa-solid fa-file-alt"></i> Artikel</a>
    <a href="messages.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
    <a href="kredit.php" class="active"><i class="fa-solid fa-car"></i> Simulasi Kredit</a>
    <div class="mt-auto pt-3">
        <a href="logout.php" class="logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>

<!-- ALERT -->
<?php if (isset($_SESSION['message'])): ?>
<div class="alert alert-<?= $_SESSION['message']['type'] ?> alert-dismissible fade show"
     role="alert" style="margin-left:260px; margin-top:20px;">
  <?= htmlspecialchars($_SESSION['message']['text']) ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['message']); endif; ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-semibold text-primary">
            <i class="fa-solid fa-car me-2"></i> Data Simulasi Kredit
        </h3>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Jenis & Tipe Mobil</th>
                        <th>Tenor (Bulan)</th>
                        <th>Budget DP</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($kredits) === 0): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data simulasi kredit.</td>
                    </tr>
                    <?php else: ?>
                    <?php $no = 1; foreach ($kredits as $row): ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['no_telepon']); ?></td>
                        <td><?= htmlspecialchars($row['jenis_tipe_mobil']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['tenor']); ?></td>
                        <td>Rp <?= number_format($row['budget_dp'], 0, ',', '.'); ?></td>
                        <td><?= date("d M Y H:i", strtotime($row['tanggal_input'])); ?></td>
                        <td class="text-center">
                            <a href="kredit_detail.php?id=<?= $row['id']; ?>" 
                               class="btn btn-info btn-sm" title="Lihat Detail">
                               <i class="fa fa-eye"></i>
                            </a>
                            <a href="kredit_hapus.php?id=<?= $row['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')" 
                               title="Hapus">
                               <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="js/admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
