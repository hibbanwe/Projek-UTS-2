<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT pelanggan.*,kartu.nama as kartu_nama
FROM pelanggan LEFT JOIN 
kartu ON pelanggan.kartu_id = kartu.id WHERE pelanggan.id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();

?>

<table>
    <tr>
        <td>nama_produk:</td>
        <td><?= $hasil['nama_produk'] ?></td>
    </tr>
    <tr>
        <td>qty:</td>
        <td><?= $hasil['qty'] ?></td>
    </tr>
    <tr>
        <td>tanggal :</td>
        <td><?= $hasil['tanggal'] ?></td>
    </tr>
    <tr>
        <td>total harga :</td>
        <td><?= $hasil['total_harga'] ?></td>
    </tr>
    <tr>
        <td>nama pemesan :</td>
        <td><?= $hasil['nama_pemesan'] ?></td>
    </tr>
    <tr>
        <td>alamat pemesan :</td>
        <td><?= $hasil['alamat_pemesan'] ?></td>
    </tr>
</table>