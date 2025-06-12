
<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nik = $_POST['nik'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * from akun where nik='$nik' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    
    // cek jika user login sebagai admin
    if($data['level'] == "admin" && $data['status'] == 1){
        // buat session login dan username
        $_SESSION['nik'] = $nik;
        $_SESSION['level'] = "admin";
        $_SESSION['status'] = 1;
        // alihkan ke halaman dashboard admin
          header("location:../tanaman/admin/index2.php");
    
    // cek jika user login sebagai user
    // }else if($data['level']=="user" && $data['status'] == 1){
    //     // buat session login dan username
    //     $_SESSION['nik'] = $nik;
    //     $_SESSION['level'] = "user";
    //      $_SESSION['status'] = 1;
    //     // alihkan ke halaman dashboard pengurus
    //  header("Location:/user/user.php");
        
    }else{
        // alihkan ke halaman login kembali
        echo "<script>alert('Akses akun Anda ditolak ! Silakan hubungi administrator.'); window.location.href = 'index.php';</script>";
    }
    
}else{
    // cek apakah akun sudah terdaftar
    $cek_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nik='$nik'");
    if(mysqli_num_rows($cek_akun) == 0){
        echo "<script>alert('Akun Anda belum didaftarkan ! Silakan hubungi administrator.'); window.location.href = 'index.php';</script>";
    }else{
        echo "<script>alert('NIK atau password salah !'); window.location.href = 'index.php';</script>";
    }
}
?>
