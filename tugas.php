<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
</head>
<body>

<h2>Form Pembelian Barang</h2>

<form method="POST" action="">
    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" required><br><br>

    <label>Harga Satuan:</label><br>
    <input type="number" name="harga_satuan" min="0" required><br><br>

    <label>Jumlah Pembelian:</label><br>
    <input type="number" name="jumlah" min="1" required><br><br>

    <button type="submit" name="hitung">Hitung Pembayaran</button>
</form>

<?php

if (isset($_POST['hitung'])) {

    $nama_barang = $_POST['nama_barang'];
    $harga_satuan = $_POST['harga_satuan'];
    $jumlah = $_POST['jumlah'];

    if ($harga_satuan < 0 || $jumlah < 1) {

        echo "<p>Harga tidak boleh negatif dan jumlah pembelian minimal 1.</p>";

    } else {

        $total_harga = $harga_satuan * $jumlah;

        if ($total_harga >= 500000) {
            $diskon = 20;
        } elseif ($total_harga >= 250000) {
            $diskon = 10;
        } else {
            $diskon = 0;
        }

        $nilai_diskon = $total_harga * $diskon / 100;
        $total_pembayaran = $total_harga - $nilai_diskon;

        echo "<h2>Hasil Pembayaran</h2>";
        echo "Nama Barang: " . $nama_barang . "<br>";
        echo "Harga Satuan: Rp" . number_format($harga_satuan, 0, ',', '.') . "<br>";
        echo "Jumlah Pembelian: " . $jumlah . "<br>";
        echo "Diskon: " . $diskon . "%<br>";
        echo "Total Pembayaran: Rp" . number_format($total_pembayaran, 0, ',', '.') . "<br>";
    }
}

?>

</body>
</html>