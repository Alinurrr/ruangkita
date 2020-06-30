 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">
     <div class="row">


       <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
           <div class="card-body">
             <h2>Data User</h2>
             <hr>
             <br>
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th style="width: 100px"> Id</th>
                   <th> Nama</th>
                   <th> email </th>
                   <th> password </th>
                   <th> status </th>
                   <th style="width: 100px"> Aksi </th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $QueryUser = mysqli_query($koneksi, "SELECT * FROM tb_user");
                  while ($pro = mysqli_fetch_array($QueryUser)) {
                  ?>
                   <tr>
                     <td><?php echo $pro['id_user']; ?></td>
                     <td><?php echo $pro['nama']; ?></td>
                     <td><?php echo $pro['email']; ?></td>
                     <td><?php echo $pro['password']; ?></td>
                     <td>
                       <?php
                        $status = $pro['status'];
                        if ($status == "1") { ?>
                         <button type="button" class="btn btn-primary btn-fw">Admin</button>
                       <?php } else if ($status == "2") { ?>
                         <button type="button" class="btn btn-success btn-fw">Founder</button>
                       <?php } else if ($status == "3") { ?>
                         <button type="button" class="btn btn-secondary btn-fw">Cust</button>
                       <?php } ?>
                     </td>
                     <td>
                       <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_user&id_user=<?php echo $pro['id_user']; ?>" class="btn btn-icons btn-inverse-primary">
                         <i class="mdi mdi-file-document"></i></button></a>
                       <a href="<?php echo $admin_url; ?>module/data_user/aksi_hapus.php?id_user=<?php echo $pro['id_user']; ?>" class="btn btn-icons btn-inverse-warning">
                         <i class="mdi mdi-alert-outline"></i></button></a>
                     </td>
                   </tr>

                 <?php } ?>

               </tbody>
             </table>
             <br>
             <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_user" class="btn btn-info btn-fw">
               <i class="mdi mdi-upload"></i>Tambah Admin</button></a>
           </div>
         </div>
       </div>
     </div>
   </div>