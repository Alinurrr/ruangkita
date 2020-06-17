<?php
include "../lib/config.php";
include "../lib/koneksi.php";
$idBiaya = $_GET['id_biaya_kirim'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim WHERE id_biaya_kirim = '$idBiaya'");
$row = mysqli_fetch_array($QueryEdit);
$id_biaya_kirim = $row['id_biaya_kirim'];
$id_kota = $row['id_kota'];
$id_kurir = $row['id_kurir'];
$biaya = $row['biaya'];
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Manajement
            <small>Biaya Kirim</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengiriman</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Biaya Kirim</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../admin/module/biaya/aksi_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id_biaya_kirim" value="<?= $id_biaya_kirim; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kota" class="col-sm-2 control-label">List Kota</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kota">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $QueryKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                        while ($kota = mysqli_fetch_array($QueryKota)) {

                                            if ($id_kota==$kota['id_kota']) {
                                                $select="selected";
                                            }else {
                                                $select="";
                                            }
                                        ?>
                                            <option value="<?= $kota['id_kota']; ?>" <?= $select; ?>><?= $kota['nama_kota']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kurir" class="col-sm-2 control-label">List Kurir</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kurir">
                                        <?php
                                        include "../lib/koneksi.php";
                                        $QueryKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                        while ($kurir = mysqli_fetch_array($QueryKurir)) {
                                            
                                            if ($id_kurir==$kurir['id_kurir']) {
                                                $select="selected";
                                            }else {
                                                $select="";
                                            }
                                        ?>
                                            <option value="<?= $kurir['id_kurir']; ?>" <?= $select; ?>><?= $kurir['nama_kurir']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="biayaKirim" class="col-sm-2 control-label">Biaya</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="biaya" placeholder="Biaya Kirim" value="<?= $biaya; ?>">
                                </div>
                            </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>