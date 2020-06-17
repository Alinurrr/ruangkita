
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Management 
            <small>Kurir</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $base_url; ?>admin/adminweb.php?module=home"> Home</a></li>
            <li><a href="<?php echo $base_url; ?>admin/adminweb.php?module=kurir"> Kurir </a></li>
            <li class="active"><i class="fa fa-dashboard"></i>Tambah Kurir</li>
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
                  <h3 class="box-title">Form Tambah Kurir</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../admin/module/kurir/aksi_simpan.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="namaKurir" class="col-sm-2 control-label">Nama Kurir</label>
                      <div class="col-sm-10">
                        <input autofocus type="text" class="form-control" id="namaKurir" name="namaKurir" placeholder="Nama Kurir">
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