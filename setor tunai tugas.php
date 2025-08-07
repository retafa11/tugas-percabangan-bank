<?php
// Jumlah stor tunai yang ingin dilakukan
$jumlahStor = 5;

// Saldo awal
$saldo = 100000; // contoh Rp100.000

// Jumlah stor tunai per kali
$jumlahSetoran = 50000; // contoh Rp50.000

echo "=== Proses Stor Tunai ===<br>";

for ($i = 1; $i <= $jumlahStor; $i++) {
    echo "Stor ke-$i: +Rp" . number_format($jumlahSetoran, 0, ',', '.') . "<br>";
    $saldo += $jumlahSetoran;
    echo "Saldo sekarang: Rp" . number_format($saldo, 0, ',', '.') . "<br><br>";
}

echo "=== Total Saldo Akhir: Rp" . number_format($saldo, 0, ',', '.') . " ===";
?>