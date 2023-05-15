<?php
//memanggil koneksi
require_once '../dbkoneksi.php';

$Nama_Produk = $_POST['nama_produk'];
$qty = $_POST['qty'];
$Tanggal = $_POST['tanggal'];
$Total_Harga = $_POST['total_harga'];
$Nama_Pemesan = $_POST['nama_pemesan'];
$Alamat_Pemesan = $_POST['alamat_pemesan'];
$Proses = $_POST['proses'];


// array data
$ar_data[] = $Nama_Produk; // ? 1
$ar_data[] = $qty; // ? 2
$ar_data[] = $Tanggal; // 3
$ar_data[] = $Total_Harga;
$ar_data[] = $Nama_Pemesan;
$ar_data[] = $Alamat_Pemesan;

if ($Proses == "Simpan") {
    //data baru
    $sql = "INSERT INTO pesanan (nama_produk,qty,tanggal,total_harga,nama_pemesan,
    alamat_pemesan) VALUES (?,?,?,?,?,?)";
} else if ($Proses == "Update") {
    $ar_data[] = $_POST['id']; // ? 8
    $sql = "UPDATE pesanan SET nama_produk=?,qty=?,tanggal=?,total_harga=?,
    nama_pemesan=?,alamat_pemesan=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:../app.php?page=pelanggan');
?>





?>