<?php
session_start();
if($_SESSION['nik']==""){
		header("location:../html/admin/index.php?pesan=gagal");
	}

	?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tanaman Hidroponik</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/head.svg" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>