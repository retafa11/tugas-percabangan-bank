<?php
// Data pendaftaran siswa
$nama = "REGINA HANDAYANI";
$kelas = "XI RPL 2";
$nis = "123456";
$tanggal_daftar = date("d-m-Y");
$no_rekening = "TAB" . substr($nis, -3) . date("dm");

// Saldo awal ditentukan berdasarkan jenjang kelas
$saldo_awal = 0;
$status = "";

if (strpos($kelas, "X") === 0) {
    $saldo_awal = 5000;
    $status = "Tabungan Pemula";
} elseif (strpos($kelas, "XI") === 0) {
    $saldo_awal = 10000;
    $status = "Tabungan Berkembang";
} elseif (strpos($kelas, "XII") === 0) {
    $saldo_awal = 15000;
    $status = "Tabungan Senior";
} else {
    $status = "Kelas tidak valid";
}

// Tampilkan slip buku tabungan
echo "<h2>Buku Tabungan Bank Sekolah</h2>";
echo "Tanggal Daftar : $tanggal_daftar<br>";
echo "Nama Siswa     : $nama<br>";
echo "NIS            : $nis<br>";
echo "Kelas          : $kelas<br>";
echo "No. Rekening   : $no_rekening<br>";
echo "Saldo Awal     : Rp " . number_format($saldo_awal, 0, ',', '.') . "<br>";
echo "<strong>Status : $status</strong>";
?>
