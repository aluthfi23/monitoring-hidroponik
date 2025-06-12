<?php
session_start();

// Hapus session
session_unset();

// Hancurkan session
session_destroy();

// Hapus cookie session
setcookie(session_name(), '', time() - 42000);

// Arahkan ke halaman login
header("Location: ../../index.php");
exit;
?>