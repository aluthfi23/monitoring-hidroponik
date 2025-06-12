<?php
session_start();
if($_SESSION['level']==""){
		header("location:../admin/index.php?pesan=gagal");
	}

	?>

<!DOCTYPE html>
<html>
<head>
 <title>Data Status Tanaman</title>
</head>
<body>

 <center>
 
 <h2>DATA LAPORAN STATUS TANAMAN</h2>
 
 
 </center>
 
 <?php 
 include 'koneksi.php';
 ?>
 
 <table border="1" style="width: 100%">
 <tr>
 <th width="1%">No</th>
 
                                                 <th>Tanggal</th>
                                                <th>Slot Pipa</th>
                                                <th>Pipa</th>
                                                 <th>kode Tanaman</th>
                                                  <th>nama Tanaman</th>
                                                   <th>Status tanaman</th>
 
 </tr>
 <?php 
 $no = 1;
 $sql = mysqli_query($koneksi,"select * from status_tanaman");
 while($data = mysqli_fetch_array($sql)){
 ?>
 <tr>
 <td><?php echo $no++; ?></td>
 <td><?php echo $data['tgl']; ?></td>
 <td><?php echo $data['slot']; ?></td>
 <td><?php echo $data['pipa']; ?></td>
 <td><?php echo $data['kode']; ?></td>
 <td><?php echo $data['mastertanaman']; ?></td>
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