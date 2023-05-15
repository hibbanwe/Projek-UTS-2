<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT produk.*,jenis_produk.nama as jenis_produk
FROM produk LEFT JOIN 
jenis_produk ON produk.jenis_produk_id WHERE produk.id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();

?>

<table>
    <tr>
        <td>Kode:</td>
        <td><?= $hasil['kode'] ?></td>
    </tr>
    <tr>
        <td>Nama:</td>
        <td><?= $hasil['nama'] ?></td>
    </tr>
    <tr>
        <td>harga:</td>
        <td><?= $hasil['harga_beli'] ?></td>
    </tr>
    <tr>
        <td>stok :</td>
        <td><?= $hasil['stok'] ?></td>
    </tr>
    <tr>
        <td>jenis produk :</td>
        <td><?= $hasil['jenis_produk'] ?></td>
    </tr>
</table>