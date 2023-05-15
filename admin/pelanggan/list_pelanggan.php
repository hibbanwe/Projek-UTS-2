<?php
require_once 'dbkoneksi.php';
?>
<?php
$sql = "SELECT * FROM pesanan";

$rs = $dbh->query($sql);
?>

<div class="container-fluid">
    <a href="app.php?page=TambahData" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">kode</th>
                        <th scope="col">nama_produk</th>
                        <th scope="col">qty</th>
                        <th scope="col">tanggal</th>
                        <th scope="col">total harga</th>
                        <th scope="col">nama pemesan</th>
                        <th scope="col">alamat pemesan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $nomor = 0;
                    foreach ($rs as $r) {
                    ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $r['nama_produk'] ?></td>
                            <td><?= $r['qty'] ?></td>
                            <td><?= $r['tanggal'] ?></td>
                            <td><?= $r['total_harga'] ?></td>
                            <td><?= $r['nama_pemesan'] ?></td>
                            <td><?= $r['alamat_pemesan'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="app.php?page=viewpelanggan&id=<?= $r['id'] ?>">View</a>
                                <a class="btn btn-primary" href="app.php?page=editpelanggan&id=<?= $r['id'] ?>">Edit</a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="pelanggan/delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
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