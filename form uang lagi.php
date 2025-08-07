<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bank Sekolah - Penarikan Uang</title>
</head>
<body>
    <h1>🏦 Bank Sekolah</h1>

<?php
// Saldo awal ditentukan tetap
$saldo_awal = 500000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["transaksi"])) {
        // Proses transaksi
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $tanggal = $_POST["tanggal"];
        $jumlah = $_POST["jumlah"];

        echo "<h3>📋 Data Siswa</h3>";
        echo "<p><b>Nama:</b> $nama</p>";
        echo "<p><b>Kelas:</b> $kelas</p>";
        echo "<p><b>Tanggal:</b> $tanggal</p>";
        echo "<p><b>Saldo Awal:</b> Rp " . number_format($saldo_awal, 0, ',', '.') . "</p>";

        echo "<hr><h3>💸 Penarikan</h3>";
        echo "<p><b>Jumlah Penarikan:</b> Rp " . number_format($jumlah, 0, ',', '.') . "</p>";

        if ($jumlah <= 0) {
            echo "<p>⚠️ Jumlah tidak valid.</p>";
        } elseif ($jumlah > $saldo_awal) {
            echo "<p>❌ Penarikan gagal! Saldo tidak cukup.</p>";
        } else {
            $saldo_akhir = $saldo_awal - $jumlah;
            echo "<p>✅ Penarikan berhasil!</p>";
            echo "<p><b>Saldo Setelah Penarikan:</b> Rp " . number_format($saldo_akhir, 0, ',', '.') . "</p>";
        }

        echo '<br><br><a href="' . $_SERVER['PHP_SELF'] . '"><button>Ulangi</button></a>';
    } else {
        // Simpan data siswa, lanjut ke form penarikan
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $tanggal = $_POST["tanggal"];
        ?>

        <h3>📋 Data Siswa</h3>
        <p><b>Nama:</b> <?= htmlspecialchars($nama) ?></p>
        <p><b>Kelas:</b> <?= htmlspecialchars($kelas) ?></p>
        <p><b>Tanggal:</b> <?= htmlspecialchars($tanggal) ?></p>
        <p><b>Saldo Awal:</b> Rp <?= number_format($saldo_awal, 0, ',', '.') ?></p>

        <hr>
        <h3>💸 Masukkan Jumlah Penarikan</h3>
        <form method="post">
            <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
            <input type="hidden" name="kelas" value="<?= htmlspecialchars($kelas) ?>">
            <input type="hidden" name="tanggal" value="<?= htmlspecialchars($tanggal) ?>">
            <input type="hidden" name="transaksi" value="1">

            <label>Jumlah yang ingin ditarik (Rp):</label><br>
            <input type="number" name="jumlah" required><br><br>

            <button type="submit">Tarik Uang</button>
        </form>

        <br><a href="<?= $_SERVER['PHP_SELF'] ?>"><button>Kembali</button></a>

        <?php
    }
} else {
    // Form awal: isi data siswa
    ?>

    <h3>📝 Isi Data Siswa</h3>
    <form method="post">
        <label>Nama Siswa:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" required><br><br>

        <!-- Saldo awal tetap: Rp 500.000 -->
        <p><b>Saldo Awal:</b> Rp <?= number_format($saldo_awal, 0, ',', '.') ?></p>

        <button type="submit">Lanjut</button>
    </form>

<?php } ?>

</body>
</html>
