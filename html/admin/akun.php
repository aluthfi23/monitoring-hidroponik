
<?php
include "header.php";
include "sidebar.php";
include "topheader.php";

?>


<div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          
        <?php

        include "koneksi.php";
        if (isset($_POST['simpan'])) {

        $nik = $_POST['nik'];
        $karyawan = $_POST['karyawan'];
        $jk = $_POST['jk'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $status = $_POST['status'];
        $operator = $_POST['operator'];
  

        $query_cek = "SELECT * FROM akun WHERE nik = '$nik' ";
        $hasil_cek = mysqli_query($koneksi, $query_cek);

           if (mysqli_num_rows($hasil_cek) > 0) {
              echo '<div class="alert alert-warning" role="alert">
                 <span class="badge badge-pill badge-success"></span>Data Akun  Sudah Ada
                    </div>            
                      </div>';
                          echo "<meta http-equiv='refresh' content='3;akun.php'>";
                             } else {
                                $query = "INSERT INTO akun VALUES ('','$nik', '$karyawan', '$jk','$password', '$level', '$status','$operator') ";
                                  if (mysqli_query($koneksi, $query)) {
                                     echo '<div class="alert alert-success" role="alert"">
                                       <span class="badge badge-pill badge-success"></span>Data Akun Berhasil Di Buat
                                         </div>            
                                          </div>';
                                            echo "<meta http-equiv='refresh' content='2;dataakun.php'>";
                                              } else {
                                              echo '<div class="alert alert-danger" role="alert">
                                                <span class="badge badge-pill badge-success"></span>Pembuatan Akun  gagal silahkan ulangi Kembali
                                                </div>            
                                                </div>';
                                                   echo "<meta http-equiv='refresh' content='2;akun.php'>";
                                                }
                                            }
                                            }
                                            ?>    


                

<form action="" method="post" class="form-horizontal">
        <h5 class="card-title fw-semibold mb-4">Forms Registrasi Akun</h5>
              <div class="card">
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">NIK</label>
                      <input type="number" required autocomplete="off" name="nik" placeholder= "NIK" class="form-control" autofocus >
                    
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama</label>
                      <input type="text" required autocomplete="off" name="karyawan" placeholder="Nama" class="form-control">
                    
                    </div>  

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                      <div class="mb-3">
                        <select name="jk" required autocomplete="off" class="form-control">

                          <option value="" selected hidden>Jenis Kelamin</option>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                                                                        
                        </select></div>

                    </div>

                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="text" name="password" required autocomplete="off" class="form-control">
                    </div>


                    <div class="mb-3">
                    <div class="mb-3"><label  class=" form-label">Level</label></div>
                        <div class="mb-3"><select name="level" required autocomplete="off" class="form-control">
                            <option value="" selected hidden>pilih Level</option>
                                  <option value="admin">Admin</option>
                                  <option value="user">User</option>                                         
                                        </select>
                                      </div>            
                                        </div>

                    <div class="mb-3">
                      <div class="mb-3"><label class=" form-label">Status Login</label></div>
                          <div class="mb-9"><select name="status" required autocomplete="off" class="form-control">
                              <option value="" selected hidden></option>
                                  <option value="1">Aktif</option>
                                        </select></div></div>                  
                    
                                                                   
                    <div class="mb-3">
                      <label class="form-control-label">Operator</label>
                    </div>
                                                                     
                    <div class="mb-3">
                    <input required autocomplete="off" type="text" name="operator" value="<?php include "koneksi.php";

$nik = $_SESSION['nik'];
$query = "SELECT karyawan FROM akun WHERE nik = '$nik'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

?> 
<?php echo $row['karyawan'];?> 


" class="form-control" readonly>
                        <span class="help-block"></span>
                      </div>
                                           
                                                                         
  
                    <button type="submit" class="btn btn-primary" name="simpan">Daftar Akun</button>  
                    <button type="reset" class="btn btn-danger m-1">Reset</button>      
                  </form>
                </div>
              </div>
            </div>


        
          
        </div>
        <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4"> Developed by <a href="" target="_blank" class="pe-1 text-primary text-decoration-underline">Aluthfi</a> UNSIKA 2025<a href=""></a></p>
        </div>
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