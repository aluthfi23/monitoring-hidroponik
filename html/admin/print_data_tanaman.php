<?php
session_start();
if ($_SESSION['level'] == "") {
    header("location:../admin/index.php?pesan=gagal");
    exit;
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>CETAK DATA TANAMAN</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body onload="window.print();">

<h2>DATA LAPORAN TANAMAN HIDROPONIK</h2>

<?php
// Ambil data dan group berdasarkan mastertanaman, pipa, dan slot
$query = "SELECT mastertanaman, pipa, slot 
          FROM data_tanaman 
          GROUP BY mastertanaman, pipa, slot 
          ORDER BY mastertanaman, pipa, slot";
$result = mysqli_query($koneksi, $query);
$no = 1;
while ($group = mysqli_fetch_assoc($result)) {
    $mastertanaman = $group['mastertanaman'];
    $pipa = $group['pipa'];
    $slot = $group['slot'];

    echo "<h4>[$no] Tanaman: <strong>$mastertanaman</strong> | Pipa: <strong>$pipa</strong> | Slot: <strong>$slot</strong></h4>";

    // Ambil data per grup berdasarkan tanggal
    $subQuery = "SELECT tgl, kode2, status FROM data_tanaman 
                 WHERE mastertanaman='$mastertanaman' AND pipa='$pipa' AND slot='$slot' 
                 ORDER BY tgl ASC";
    $subResult = mysqli_query($koneksi, $subQuery);

    echo "<table>
            <tr>
                <th>Tanggal</th>
                <th>Kelembapan</th>
                <th>Status Penyiraman</th>
            </tr>";

    while ($sub = mysqli_fetch_assoc($subResult)) {
        echo "<tr>
                <td>{$sub['tgl']}</td>
                <td>{$sub['kode2']}</td>
                <td>{$sub['status']}</td>
              </tr>";
    }

    echo "</table><br>";
    $no++;
}
?>

<br><br>
<div>
    <p>Di Buat Oleh:</p>
    <p>
        <?php
        $nik = $_SESSION['nik'];
        $query = "SELECT karyawan FROM akun WHERE nik = '$nik'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        echo $row['karyawan'] . "<br>NIK: " . $nik;
        ?>
    </p>
</div>

</body>
</html>
