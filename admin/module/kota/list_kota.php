<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajement
            <small>Kota Tujuan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $base_url; ?>admin/adminweb.php?module=home"> Home</a></li>
            <li class="active"><i class="fa fa-dashboard"></i>Kota Tujuan</li>
          </ol>
        </section>
    <!-- Main content -->
    <section class="content">
          <!-- Info boxes -->
          <div class="row">
         <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">List Kota Tujuan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead> 
                        <tr>
                          <th>Nama Kota</th>
                          <th style="width: 110px">Aksi</th>
                        </tr>
                      </thead>

                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $kueriKota = mysqli_query($koneksi, "select * from tbl_kota");
                        while($kot=mysqli_fetch_array($kueriKota)) {
                        ?>

                        <tr>
                            <td><?php echo $kot['nama_kota']; ?></td>
                            <td>
                            <div class="btn-group">
                            <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_kota&id_kota=<?php echo $kot['id_kota']; ?>" class = "btn btn-warning"><i class="fa fa-pencil"></i></button></a> 
                            <a href="<?php echo $admin_url; ?>module/kota/aksi_hapus.php?id_kota=<?php echo $kot['id_kota']; ?>" onClick = "return confirm('anda yakin ingin menghapus data ini')" class = "btn btn-danger"><i class="fa fa-power-off"></i></button></a> 
                            </div>
                            </td>
                        </tr>
                        
                        <?php } ?>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_kota" class="btn btn-sm btn-info btn-flat pull-left">Tambah Kota Tujuan</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
            </div>
            </section>
            <!-- Main content -->
        </div><!-- /.content-wrapper -->