<?php

require_once "../settings/db.php";
$id = $_GET['id'];
$foto = $_GET['foto'];
// foreach ($variable as $key => $value) {
//     # code...
// }
// $data = $koneksi->query("select * from tb_barang where id = '$id' ");
unlink("../assets/img/" . $foto);
$koneksi->query("DELETE FROM `tb_barang` WHERE `tb_barang`.`id` = '$id' ");

header("location: ../index.php ");
