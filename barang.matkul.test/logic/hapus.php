<?php

require_once "../settings/db.php";
$id = $_GET['id'];


$koneksi->query('delete fron tb_barang where id  = `$id`');
