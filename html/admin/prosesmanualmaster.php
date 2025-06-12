<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    // Pastikan format tanggal menjadi YYYY-MM-DD sebelum disimpan
    
    // Simpan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO tb_mastertanaman SET
        mastertanaman = '$_POST[mastertanaman]',
        kode = '$_POST[kode]'"); // Pastikan tanggal tersimpan dalam format YYYY-MM-DD

    if ($query) {
        echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'mastertanaman.php'; // Redirect ke halaman utama
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data!');
            window.location.href = 'mastertanaman.php'; // Redirect ke halaman utama
        </script>";
    }
}
?>
