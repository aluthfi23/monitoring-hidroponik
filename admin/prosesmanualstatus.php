<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    // Pastikan format tanggal menjadi YYYY-MM-DD sebelum disimpan
    $tgl = date("Y-m-d", strtotime($_POST['tgl']));

    // Simpan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO status_tanaman SET
        slot  = '$_POST[slot]',
        pipa = '$_POST[pipa]',
        kode   = '$_POST[kode]',
        mastertanaman   = '$_POST[mastertanaman]',
        status   = '$_POST[status]',
        tgl   = '$tgl'"); // Pastikan tanggal tersimpan dalam format YYYY-MM-DD

    if ($query) {
        echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'status_tanaman.php'; // Redirect ke halaman utama
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data!');
            window.location.href = 'status_tanaman.php'; // Redirect ke halaman utama
        </script>";
    }
}
?>
