<?php
include "header.php";
include "sidebar.php";
include "topheader.php";

?>

<div class="container-fluid">
        <!--  Row 1 -->
          
        
          
          <!--hapus informasi-->
          <?php

include "koneksi.php";
  if(isset($_GET['kode'])){
    mysqli_query($koneksi,"delete from akun where nik='$_GET[kode]'");

      echo '<div class="alert alert-danger" role="alert">
          <span class="badge badge-pill badge-success"></span>Data Akun  Berhasil Di Hapus
           </div>
             </div>';
             echo "<meta http-equiv='refresh' content='2;dataakun.php'>";
               }
                 ?> 
                 
<!--hapus informasi-->
</div>

<div>
        <div>
            <div class="card">

                <div class="card-header">
                    <strong class="card-title">Data Akun</strong>
                </div>
                <div class="card">
                    <div class="card-header">
                   <a href="akun.php"> <button type="submit" class="btn btn-primary btn-sm" name="simpan">
                                                <i class="fa fa-plus"></i>Tambah Akun 
                                            </button></a>
                     <a href="print_data_akun.php">      <button type="submit" class="btn btn-warning btn-sm" name="simpan">
                                                <i class="fa fa-print"></i>Print Data
                                </button></a>

                <br> <table 
                           
                            class="table table-striped table-bordered">

                            <thead>
                            <form action="" method="GET"> 
                            <tr align="right">
                                    <th colspan=9><input tye="text" name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>"> 
                                    <button type="submit" class="btn btn-primary btn-sm" name="simpan">
                                                <i class="fa fa-search"></i>Cari data
                                            </button>
                                    </th>    
                            </tr>
                                </form>     
                                </tr>
                                <tr align="center" bgcolor="azure">
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Level</th>
                                    <th>Pembuat Akun</th>
                                    <th>Status Login</th>
                                   

                                    <th colspan=7>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   </div>

                                            </form>
                                        </div>
            
<!-- validasi simpan akun -->
                                       
                                <?php
                                include "koneksi.php";
                                if (isset($_GET['cari'])){
                                $pencarian = $_GET['cari'];
                                $query = "select * from akun where nik like '%".$pencarian."%' or level like '%".$pencarian."%' or karyawan like '%".$pencarian."%' or jk like '%".$pencarian."%'" ;
                            
                                }else{
                                 $query="select * from akun";
                                }
                                 $no=1;
                         
                                 $ambildata = mysqli_query($koneksi,$query);
                                 while ($tampil= mysqli_fetch_array($ambildata)){
                                 ?>
                             <tr>
                             <td><?php echo $no++;?></td>
                                <td><?php echo $tampil['nik'];?></td>
                               <td><?php echo $tampil['karyawan'];?></td>
                               <td><?php echo $tampil['password'];?></td>
                               <td><?php echo $tampil['jk'];?></td>
                               <td><?php echo $tampil['level'];?></td>
                               <td><?php echo $tampil['operator'];?></td>
                               
                               

                               <td><?php 
                                
                                if($tampil['status']=="1")
                                echo "Aktif";
                                   else
                                   echo "Tidak Aktif";
                                 ?>
                                </td>
                                <td>
                                 <?php 
                                 if ($tampil['status']=="1")
                                echo
                                "<a href=nonaktif.php?id=".$tampil['id']." class='btn btn-success'>Non Aktifkan</a>";
                                   else
                                   echo
                                 "<a href=aktif.php?id=".$tampil['id']." class='btn btn-danger'>Aktifkan</a>";
                                ?>
                                 </td>
                                 <td><a href='?kode=<?php echo $tampil['nik'];?>'class="btn btn-sm btn-danger" onclick="return confirm ('Yakin ingin menghapus?');"><i class='fa fa-trash'>Hapus</i></a></td>
                                 
                               <!-- <td><a href= '?update.php?kode=$tampil[nik]'class='btn btn-sm btn-warning'><i class='fa fa-edit alias'>Update</i></a></td> -->
                             </tr>

                             <?php
                         }
                         ?>
                            </tbody>
                        </table>
                
        
                        </div>
          
        </div>
        <div class="py-6 px-6 text-center">
         <p class="mb-0 fs-4"> Developed by <a href="" target="_blank" class="pe-1 text-primary text-decoration-underline">Aluthfi</a> UNSIKA 2025<a href=""></a></p>        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>