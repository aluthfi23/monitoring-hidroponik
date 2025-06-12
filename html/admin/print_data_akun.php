<?php
session_start();
if($_SESSION['level']==""){
		header("location:../admin/index.php?pesan=gagal");
	}

	?>

<!DOCTYPE html>
<html>
<head>
 <title>CETAK DATA AKUN</title>
</head>
<body>

 <center>
 
 <h2>DATA LAPORAN AKUN TANAMAN HIDROPONIK</h2>
 
 
 </center>
 
 <?php 
 include 'koneksi.php';
 ?>
 
 <table border="1" style="width: 100%">
 <tr>
 <th width="1%">No</th>
 <th>NIK</th>
 <th>Nama Dosen</th>
 <th>jk</th>
 <th>Password</th>
 <th>Username</th>
 <th>Level</th>
 <th>Status Login</th>
 </tr>
 <?php 
 $no = 1;
 $sql = mysqli_query($koneksi,"select * from akun");
 while($data = mysqli_fetch_array($sql)){
 ?>
 <tr>
 <td><?php echo $no++; ?></td>
 <td><?php echo $data['nik']; ?></td>
 <td><?php echo $data['karyawan']; ?></td>
 <td><?php echo $data['jk']; ?></td>
 <td><?php echo $data['nik']; ?></td>
 <td><?php echo $data['nik']; ?></td>
 <td><?php echo $data['level']; ?></td>
 <td><?php echo $data['status']; ?></td>
 </tr>
 <?php 
 }
 ?>
 </table>
 
 <script>
 window.print();
 

 </script>

<br>
 Di Buat Oleh
 <br>
 <br>
 <font color="black"><?php 

                    include "koneksi.php";
                    
                    $nik = $_SESSION['nik'];
                    $query = "SELECT karyawan FROM akun WHERE nik = '$nik'";
                    $result = mysqli_query($koneksi, $query);
                    $row = mysqli_fetch_assoc($result);
                    
                    ?> 

                    <?php echo $row['karyawan'];?> <br> NIK <?php echo $_SESSION['nik'];?> 
                
                   </font>
 
</body>
</html>