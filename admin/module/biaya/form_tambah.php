<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Biaya Kirim
            <small>Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Biaya kirim</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Biaya Kirim</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../admin/module/biaya/aksi_simpan.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kota" class="col-sm-2 control-label">Kota Tujuan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kota" >
                                        <?php
                                        include "../lib/koneksi.php";
                                        $QueryKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                        while ($kota = mysqli_fetch_array($QueryKota)) {
                                        ?>
                                            <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kurir" class="col-sm-2 control-label">List Kurir</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kurir">
                                        <?php
                                        include "../assets/lib/koneksi.php";
                                        $QueryKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                        while ($kurir = mysqli_fetch_array($QueryKurir)) {
                                        ?>
                                            <option value="<?= $kurir['id_kurir']; ?>"><?= $kurir['nama_kurir']; ?></option>
                                        <?php } ?>
                                    </select> </div>
                            </div>
                            <div class="form-group">
                                <label for="biaya" class="col-sm-2 control-label">Biaya</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="biaya" placeholder="Biaya kirim" >
                                </div>
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