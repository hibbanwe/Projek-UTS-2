<?php
require_once 'dbkoneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM pelanggan WHERE id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Form Pemesan</title>
</head>

<body>
    <div class="container mt-5">
        <h2>
            Edit Data Pelanggan
        </h2>
        <br>
        <form action="pelanggan/proses_pelanggan.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $hasil['id']; ?>">
            <div class="form-group row">
                <label for="nama produk" class="col-4 col-form-label">nama produk</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-adn"></i>
                            </div>
                        </div>
                        <input id="nama produk" name="nama produk" placeholder="Massukan nama produk Anda" type="text" class="form-control" required="required" value="<?php echo $hasil['kode']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="qty" class="col-4 col-form-label">qty</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                        <input id="qty" name="qty" placeholder="Massukan qty Anda" type="text" class="form-control" required="required" value="<?php echo $hasil['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                <label for="tanggal" class="col-4 col-form-label">tanggal</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                        <input id="tanggal" name="tanggal" placeholder="Massukan tanggal Anda" type="text" class="form-control" required="required" value="<?php echo $hasil['nama']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="total_harga" class="col-4 col-form-label">total harga</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card-o"></i>
                            </div>
                        </div>
                        <input id="total_harga" name="total_harga" placeholder="Masukan total harga Anda " type="text" class="form-control" required="required" value="<?php echo $hasil['tmp_lahir']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pemesan" class="col-4 col-form-label">nama pemesan</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-align-right"></i>
                            </div>
                        </div>
                        <input id="nama_pemesan" name="nama_pemesan" type="date" class="form-control" value="<?php echo $hasil['tgl_lahir']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat_pemesan" class="col-4 col-form-label">alamat pemesan</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                        <input id="alamat_pemesan" name="alamat_pemesan" placeholder="Massukan alamat pemesan Anda" type="text" class="form-control" value="<?php echo $hasil['email']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_kartu" class="col-4 col-form-label">Kartu</label>
                <div class="col-8">
                    <?php
                    $sqljenis = "SELECT * FROM kartu";
                    $rsjenis = $dbh->query($sqljenis);
                    ?>
                    <select id="kartu_id" name="kartu_id" class="custom-select" value="" <?php foreach ($rsjenis as $rowjenis) {
                                                                                            ?> <option value="<?= $rowjenis['id'] ?>" <?php if ($hasil['kartu_id'] == $rowjenis['id']) {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>
                        <?= $rowjenis['nama'] ?></option>
                    <?php
                                                                                            }
                    ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="proses" type="submit" class="btn btn-primary" value="Update">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>