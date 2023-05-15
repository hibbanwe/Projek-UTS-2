<?php
require_once 'dbkoneksi.php';
?>
<?php
$sql = "SELECT * FROM produk";

$rs = $dbh->query($sql);
?>

<div class="container-fluid">
    <a href="app.php?page=TambahDataProduk" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">kode</th>
                        <th scope="col">nama</th>
                        <th scope="col">harga</th>
                        <th scope="col">stok</th>
                        <th scope="col">jenis produk</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $nomor = 0;
                    foreach ($rs as $r) {
                    ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $r['kode'] ?></td>
                            <td><?= $r['nama'] ?></td>
                            <td><?= $r['harga'] ?></td>
                            <td><?= $r['stok'] ?></td>
                            <td><?= $r['jenis_produk'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="app.php?page=viewProduk&id=<?= $r['id'] ?>">View</a>
                                <a class="btn btn-primary" href="app.php?page=editProduk&id=<?= $r['id'] ?>">Edit</a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="produk/delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
            </table>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>