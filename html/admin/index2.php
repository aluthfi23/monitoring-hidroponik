<?php
include "header.php";
include "sidebar.php";
include "topheader.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        <?php
        include "koneksi.php"; // Pastikan file koneksi ke database

        // Query untuk menghitung jumlah akun
        $query_akun = "SELECT COUNT(*) as total_akun FROM akun";
        $result_akun = mysqli_query($koneksi, $query_akun);
        $row_akun = mysqli_fetch_assoc($result_akun);
        $total_akun = $row_akun['total_akun'];

       
        $query_tanaman = "SELECT COUNT(*) as total_tanaman FROM tb_mastertanaman";
        $result_tanaman = mysqli_query($koneksi, $query_tanaman);
        $row_tanaman = mysqli_fetch_assoc($result_tanaman);
        $total_tanaman = $row_tanaman['total_tanaman'];

        ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Kartu Total Akun -->
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Akun</h5>
                            <h3><?php echo $total_akun; ?></h3>
                        </div>
                    </div>
                </div>

                <!-- Kartu Total Akun -->
                <div class="col-md-4">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Tanaman</h5>
                            <h3><?php echo $total_tanaman; ?></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="calendar"></div>
    </div>
</div>

<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Developed by <a href="" target="_blank" class="pe-1 text-primary text-decoration-underline">Aluthfi</a> UNSIKA @2025</p>
</div>

<!-- Tambahkan FullCalendar CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/id.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        events: 'fetch_events.php', // Pastikan Anda membuat file ini untuk mengambil event dari database
    });
    calendar.render();
});
</script>

<script src="https://webstokfg.ct.ws/jquery.min.js"></script>
<script src="https://webstokfg.ct.ws/bootstrap.bundle.min.js"></script>
<script src="https://webstokfg.ct.ws/sidebarmenu.js"></script>
<script src="https://webstokfg.ct.ws/app.min.js"></script>
<script src="https://webstokfg.ct.ws/apexcharts.min.js"></script>
<script src="https://webstokfg.ct.ws/simplebar.js"></script>
<script src="https://webstokfg.ct.ws/dashboard.js"></script>

</body>
</html>
