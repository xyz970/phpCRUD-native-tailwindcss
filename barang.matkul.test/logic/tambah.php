<?php

require_once "../settings/db.php";

// $id = $_GET['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$jenis = $_POST['jenis'];
$diskon = $_POST['diskon'];
$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
        $fileName = htmlspecialchars(basename($_FILES["img"]["name"]));
        $koneksi->query("INSERT INTO `tb_barang` (`id`, `nama`, `harga`, `stok`, `img`, `jenis`, `diskon`) VALUES (NULL, '$nama', '$harga', '$stok', '$fileName', '$jenis', '$diskon')");
        header("location: ../index.php ");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
