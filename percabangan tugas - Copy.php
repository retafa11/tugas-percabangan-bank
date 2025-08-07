<?php
// Saldo awal di rekening
$saldo = 100000; // Rp100.000

// Jumlah yang ingin ditarikss
$jumlahTarik = 100000; // Ubah angka ini untuk menguji kondisi berhasil/gagal

echo "=== Simulasi Tarik Tunai ===<br>";
echo "Saldo Anda: Rp" . number_format($saldo, 0, ',', '.') . "<br>";
echo "Jumlah yang ingin ditarik: Rp" . number_format($jumlahTarik, 0, ',', '.') . "<br><br>";

// Percabangan untuk menentukan berhasil atau tidak
if ($jumlahTarik <= $saldo) {
    $saldo -= $jumlahTarik;
    echo "✅ Penarikan BERHASIL.<br>";
    echo "Sisa saldo Anda: Rp" . number_format($saldo, 0, ',', '.');
} else {
    echo "❌ Penarikan GAGAL. Saldo tidak mencukupi.<br>";
    echo "Saldo Anda tetap: Rp" . number_format($saldo, 0, ',', '.');
}
?>