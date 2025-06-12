<?php
include "header.php";
include "sidebar.php"; 
include "topheader.php";
?>

<div class="container-fluid">
    <div class="row">

                <?php
include "koneksi.php";
$tanaman = mysqli_query($koneksi, "SELECT * FROM tb_mastertanaman");
$kelembapan = mysqli_query($koneksi, "SELECT * FROM kelembapan");

$jsTanaman = "var dataTanaman = {};\n";
$jsKelembapan = "var dataKelembapan = {};\n";
?>

<form action="prosesmanual.php" method="post" class="form-horizontal">
    <h5 class="card-title fw-semibold mb-4">Forms Input Data Monitoring Tanaman</h5>

    <div class="card">
        <div class="card-body"><br>

            <div class="mb-3">
                <label for="pipa" class="form-label">Pipa</label>
                <input type="text" required autocomplete="off" name="pipa" class="form-control" id="pipa" autofocus>
            </div>

            <div class="mb-3">
                <label for="slot" class="form-label">Slot Pipa</label>
                <input type="text" required autocomplete="off" name="slot" class="form-control" id="slot">
            </div>

            <!-- Dropdown Kelembapan -->
            <div class="mb-3">
                <label for="kode2" class="form-label">Kelembapan Tanah</label>
                <select name="kode2" id="kode2" required onchange="changeKelembapan(this.value)" class="form-control">
                    <option value="">- Pilih -</option>
                    <?php 
                    if (mysqli_num_rows($kelembapan)) {
                        while ($row = mysqli_fetch_array($kelembapan)) {
                            echo '<option value="' . $row["kode2"] . '">' . $row["kode2"] . '</option>';
                            $jsKelembapan .= "dataKelembapan['" . $row['kode2'] . "'] = {status:'" . addslashes($row['status']) . "'};\n";
                        }
                    } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Penyiraman</label>
                <input type="text" name="status" id="status" class="form-control" readonly placeholder="Status Penyiraman">
            </div>

            <!-- Dropdown Tanaman -->
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Tanaman</label>
                <select name="kode" id="kode" required onchange="changeTanaman(this.value)" class="form-control">
                    <option value="">- Pilih -</option>
                    <?php 
                    if (mysqli_num_rows($tanaman)) {
                        while ($row = mysqli_fetch_array($tanaman)) {
                            echo '<option value="' . $row["kode"] . '">' . $row["kode"] . '</option>';
                            $jsTanaman .= "dataTanaman['" . $row['kode'] . "'] = {mastertanaman:'" . addslashes($row['mastertanaman']) . "'};\n";
                        }
                    } 
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="mastertanaman" class="form-label">Nama Tanaman</label>
                <input type="text" name="mastertanaman" id="mastertanaman" class="form-control" readonly placeholder="Nama Tanaman">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tgl" required autocomplete="off" class="form-control"> *yyyy-mm-dd
            </div>

        </div>
    </div>


<script type="text/javascript">
<?php 
echo $jsTanaman;
echo $jsKelembapan;
?>

function changeTanaman(kode) {
    if (dataTanaman[kode]) {
        document.getElementById('mastertanaman').value = dataTanaman[kode].mastertanaman;
    } else {
        document.getElementById('mastertanaman').value = '';
    }
}

function changeKelembapan(kode2) {
    if (dataKelembapan[kode2]) {
        document.getElementById('status').value = dataKelembapan[kode2].status;
    } else {
        document.getElementById('status').value = '';
    }
}
</script>

                    <button type="submit" class="btn btn-primary" name="simpan">Simpan data</button>  
                    <button type="reset" class="btn btn-danger m-1">Reset</button>      
                  </form>
                </div>
              
            

        <div class="card">
            <div class="card-body">
                <h3>Data Penyiraman</h3>
                
                
            
            
      <?php
include "koneksi.php";

// Hapus data jika ada parameter 'kode'
if (isset($_GET['kode'])) {
    mysqli_query($koneksi, "DELETE FROM data_tanaman WHERE id='" . $_GET['kode'] . "'");
    echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
    echo "<meta http-equiv='refresh' content='2;url=datatanaman.php'>";
}

// Query pencarian
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$whereClause = $cari ? "WHERE kode LIKE '%$cari%' OR mastertanaman LIKE '%$cari%'" : "";

// Ambil data dan group berdasarkan mastertanaman, pipa, dan slot
$query = "SELECT mastertanaman, pipa, slot 
          FROM data_tanaman 
          $whereClause 
          GROUP BY mastertanaman, pipa, slot 
          ORDER BY mastertanaman, pipa, slot";
$result = mysqli_query($koneksi, $query);
?>
 

<style>
.table-wrapper {
    max-height: 500px;
    overflow: auto;
    border: 1px solid #ddd;
}
.group-header {
    background-color: #f0f8ff;
    font-weight: bold;
    padding: 10px;
}
.sub-table {
    margin-left: 20px;
    width: 95%;
}
.sub-table th, .sub-table td {
    border: 1px solid #ccc;
    padding: 6px;
    text-align: center;
}
</style>

<div class="mb-3">
    <form method="GET" class="form-inline">
        <input type="text" name="cari" class="form-control" placeholder="Cari kode atau nama" value="<?= htmlspecialchars($cari) ?>">
        <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fa fa-search"></i> Cari</button>
    </form>
</div>
 <a href="print_data_tanaman.php">      <button type="submit" class="btn btn-warning btn-sm" name="simpan">
                                                <i class="fa fa-print"></i>Print Data
                                </button></a><br>
<div class="table-wrapper">
<?php
$no = 1;
while ($group = mysqli_fetch_assoc($result)) {
    $mastertanaman = $group['mastertanaman'];
    $pipa = $group['pipa'];
    $slot = $group['slot'];

    echo "<div class='group-header'>[$no] Tanaman: <strong>$mastertanaman</strong> | Pipa: <strong>$pipa</strong> | Slot: <strong>$slot</strong></div>";

    // Ambil data per grup berdasarkan tanggal
    $subQuery = "SELECT id, tgl, kode2, status FROM data_tanaman 
                 WHERE mastertanaman='$mastertanaman' AND pipa='$pipa' AND slot='$slot' 
                 ORDER BY tgl ASC";
    $subResult = mysqli_query($koneksi, $subQuery);

    echo "<table class='sub-table'>";
    echo "<thead><tr><th>Tanggal</th><th>Kelembapan</th><th>Status Penyiraman</th><th>Aksi</th></tr></thead><tbody>";

    while ($sub = mysqli_fetch_assoc($subResult)) {
        echo "<tr>
                <td>{$sub['tgl']}</td>
                <td>{$sub['kode2']}</td>
                <td>{$sub['status']}</td>
                <td>
                    <a href='?kode={$sub['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">
                        <i class='fa fa-trash'></i> Hapus
                    </a>
                </td>
              </tr>";
    }

    echo "</tbody></table><br>";
    $no++;
}
?>
</div>
