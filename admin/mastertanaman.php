<?php
include "header.php";
include "sidebar.php"; 
include "topheader.php";
?>

<div class="container-fluid">
    <div class="row">

    <form action="prosesmanualmaster.php" method="post" class="form-horizontal">
        <h5 class="card-title fw-semibold mb-4">Forms Input Data Master Tanaman</h5>
         
        
    </a>

              <div class="card">
                <div class="card-body"><br>

                  <form>

                   <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode</label>
                      <input type="text" required autocomplete="off" name="kode" class="form-control" autofocus >

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Tanaman</label>
                      <input type="text" required autocomplete="off" name="mastertanaman" class="form-control" autofocus >
                    
                    </div>
              
                                                                         
  
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan data</button>  
                    <button type="reset" class="btn btn-danger m-1">Reset</button>      
                  </form>
                </div>
              </div>
            </div>

        <div class="card">
            <div class="card-body">
                <h3>Data Master Tanaman</h3>
                

                 <?php

include "koneksi.php";
  if(isset($_GET['kode'])){
    mysqli_query($koneksi,"delete from tb_mastertanaman where id='$_GET[kode]'");

      echo '<div class="alert alert-danger" role="alert">
          <span class="badge badge-pill badge-success"></span>Data Berhasil Di Hapus
           </div>
             </div>';
             echo "<meta http-equiv='refresh' content='2;mastertanaman.php'>";
               }
                 ?> 
       <table
    <div class="table-wrapper">
    <table class="table table-bordered">

                                        <thead>
                                           <a href="print_data_master.php">      
                                            <button type="submit" class="btn btn-warning btn-sm" name="simpan">
                                                <i class="fa fa-print"></i>Print Data</button></a>  
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
                                                <th>Kode Tanaman</th>
                                                <th>Nama Tanaman</th>
                                                  <th>Aksi</th>                                               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                               </div>
            
                                                        </form>
                                                    </div>
                                                   
                                            <?php
                                            include "koneksi.php";
                                            if (isset($_GET['cari'])){
                                            $pencarian = $_GET['cari'];
                                            $query = "select * from tb_mastertanaman where kode like '%".$pencarian."%' or mastertanaman like '%".$pencarian."%'" ;
                                        
                                            }else{
                                              $query="select * from tb_mastertanaman";
                                            }
                                            $no=1;
                                            $ambildata = mysqli_query($koneksi,$query);

                                            while ($tampil= mysqli_fetch_array($ambildata)){
                                            echo "
                                            <tr>
                                              <td>$no</td>
                                                <td>$tampil[kode]</td>
                                                <td>$tampil[mastertanaman]</td>
                                              
                                              
                                              <td><a href='?kode=$tampil[id]'class='btn btn-sm btn-danger'><i class='fa fa-trash'>Hapus</i></a></td>
                                              
                                            </tr>";

                                            $no++;
                                     }
                                     ?>
                                            </tr>
                                        </tbody>
                                    </table>
    </div>
</div>