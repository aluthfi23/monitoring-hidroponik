<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    // Pastikan format tanggal menjadi YYYY-MM-DD sebelum disimpan
    $tgl = date("Y-m-d", strtotime($_POST['tgl']));

    // Simpan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO data_tanaman SET
        pipa = '$_POST[pipa]',
        slot  = '$_POST[slot]',
        kode2   = '$_POST[kode2]',
        status  = '$_POST[status]',
        kode   = '$_POST[kode]',
        mastertanaman   = '$_POST[mastertanaman]',
        tgl   = '$tgl'"); // Pastikan tanggal tersimpan dalam format YYYY-MM-DD

    if ($query) {
        echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'datatanaman.php'; // Redirect ke halaman utama
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data!');
            window.location.href = 'datatanaman.php'; // Redirect ke halaman utama
        </script>";
    }
}
?>
