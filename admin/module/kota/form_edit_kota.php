
<?php 
include "../lib/config.php";
include "../lib/koneksi.php";
 
$idKota=$_GET['id_kota'];
$queryEdit=mysqli_query($koneksi, "SELECT * FROM tbl_kota WHERE id_kota='$idKota'");

$hasilQuery=mysqli_fetch_array($queryEdit);
$idKota=$hasilQuery['id_kota'];  
$namaKota=$hasilQuery['nama_kota'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management
            <small>Kota</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $base_url; ?>admin/adminweb.php?module=home"> Home</a></li>
            <li><a href="<?php echo $base_url; ?>admin/adminweb.php?module=kota"> Kota </a></li>
            <li class="active"><i class="fa fa-dashboard"></i>Edit Kota</li>
          </ol>
        </section>

        <!-- Main content -->
    <section class="content">
          <!-- Info boxes -->
          <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Edit Kota</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/kota/aksi_edit.php" method="post">
                <input type="hidden" name="id_kota" value="<?php echo $idKota; ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="namaKota" class="col-sm-2 control-label">Nama Kota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaKota" name="nama_kota" placeholder="Nama Kota" value="<?= $namaKota;?>">
                      </div>
                    </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->   
            </div>
            </section>
            <!-- Main content -->          
    </div><!-- /.content-wrapper -->