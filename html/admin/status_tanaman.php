<?php
include "koneksi.php";

// AJAX untuk ambil data berdasarkan slot
if (isset($_GET['action']) && $_GET['action'] === 'get_data' && isset($_GET['slot'])) {
    $slot = mysqli_real_escape_string($koneksi, $_GET['slot']);
    $query = "SELECT pipa, kode, mastertanaman 
              FROM data_tanaman 
              WHERE slot = '$slot' 
              ORDER BY tgl DESC LIMIT 1";
    $result = mysqli_query($koneksi, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo json_encode(null);
    }
    exit;
}

include "header.php";
include "sidebar.php"; 
include "topheader.php";
?>

<div class="container-fluid">
    <div class="row">

     <?php

include "koneksi.php";
  if(isset($_GET['kode'])){
    mysqli_query($koneksi,"delete from status_tanaman where id='$_GET[kode]'");

      echo '<div class="alert alert-danger" role="alert">
          <span class="badge badge-pill badge-success"></span>Data Berhasil Di Hapus
           </div>
             </div>';
             echo "<meta http-equiv='refresh' content='2;status_tanaman.php'>";
               }
                 ?> 
        <form action="prosesmanualstatus.php" method="post" class="form-horizontal">
            <h5 class="card-title fw-semibold mb-4">Forms Input Data Status Tanaman</h5>

            <div class="card">
                <div class="card-body"><br>

                    <div class="mb-3">
                        <label for="slot" class="form-label">Slot Pipa</label>
                        <select required name="slot" class="form-control" id="slot">
                            <option value="">-- Pilih Slot Pipa --</option>
                            <?php
                            $slots = mysqli_query($koneksi, "SELECT DISTINCT slot FROM data_tanaman ORDER BY slot ASC");
                            while ($row = mysqli_fetch_assoc($slots)) {
                                echo "<option value='{$row['slot']}'>{$row['slot']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pipa" class="form-label">Pipa</label>
                        <input type="text" required name="pipa" class="form-control" id="pipa" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode Tanaman</label>
                        <input type="text" name="kode" class="form-control" id="kode" readonly placeholder="Kode Tanaman">
                    </div>

                    <div class="mb-3">
                        <label for="mastertanaman" class="form-label">Nama Tanaman</label>
                        <input type="text" name="mastertanaman" id="mastertanaman" class="form-control" readonly placeholder="Nama Tanaman">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tgl" required autocomplete="off" class="form-control"> *yyyy-mm-dd
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Status Tanaman</label>
                      <div class="mb-3"><select name="status" required autocomplete="off" class="form-control">
                                                                <option value="" selected hidden>Status tanaman</option>
                                                                    <option value="mati">mati</option>
                                                                      <option value="layu">layu</option>
                                                                         <option value="kering">kering</option>
                                                                                          </select></div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan data</button>
                    <button type="reset" class="btn btn-danger m-1">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('slot').addEventListener('change', function () {
    var slot = this.value;
    if (slot) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '?action=get_data&slot=' + encodeURIComponent(slot), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                if (data) {
                    document.getElementById('pipa').value = data.pipa || '';
                    document.getElementById('kode').value = data.kode || '';
                    document.getElementById('mastertanaman').value = data.mastertanaman || '';
                } else {
                    document.getElementById('pipa').value = '';
                    document.getElementById('kode').value = '';
                    document.getElementById('mastertanaman').value = '';
                }
            }
        };
        xhr.send();
    } else {
        document.getElementById('pipa').value = '';
        document.getElementById('kode').value = '';
        document.getElementById('mastertanaman').value = '';
    }
});
</script>

        <div class="card">
            <div class="card-body">
                <h3>Data Status Tanaman</h3>
                

                
       <table
    <div class="table-wrapper">
    <table class="table table-bordered">

                                        <thead>
                                           <a href="print_data_status_tanaman.php">      <button type="submit" class="btn btn-warning btn-sm" name="simpan">
                                                <i class="fa fa-print"></i>Print Data
                                </button></a>  
                                        <form action="" method="GET"> 
                                        <tr align="right">
                                                <th colspan=9><input tye="text" name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>"> <button type="submit" class="btn btn-primary btn-sm" name="simpan">
                                                            <i class="fa fa-search"></i>Cari data
                                                        </button>
                                                </th>    
                                        </tr>
                                            </form>     
                                            </tr>
                                            <tr align="center" bgcolor="azure">
                                                <th>no</th>
                                                 <th>Tanggal</th>
                                                <th>Slot Pipa</th>
                                                <th>Pipa</th>
                                                 <th>kode Tanaman</th>
                                                  <th>nama Tanaman</th>
                                                   <th>Status tanaman</th>
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
                                            $query = "select * from status_tanaman where kode like '%".$pencarian."%' or mastertanaman like '%".$pencarian."%'" ;
                                        
                                            }else{
                                                $query="select * from status_tanaman";
                                            }
                                            $no=1;
                                            $ambildata = mysqli_query($koneksi,$query);
                                            while ($tampil= mysqli_fetch_array($ambildata)){
                                            
                                                echo "
                                                <tr>
                                                <td>$no</td>
                                                    <td>$tampil[tgl]</td>
                                                    <td>$tampil[slot]</td>
                                                    <td>$tampil[pipa]</td>
                                                    <td>$tampil[kode]</td>
                                                    <td>$tampil[mastertanaman]</td>
                                                    <td>$tampil[status]</td>
                                           
                                          
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
        

          
        </div>
          
            </tr>
        </tfoot>
    </table>
</div>
