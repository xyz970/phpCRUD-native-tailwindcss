<?php

require_once "../settings/db.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$image = $_POST['img'];
$foto = $_POST['foto'];
$jenis = $_POST['jenis'];
$diskon = $_POST['diskon'];
$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $uploadOk = 0;
}

if ($_FILES["img"]["size"] > 500000) {
    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $koneksi->query("UPDATE `tb_barang` SET `nama` = '$nama', `harga` = '$harga', `stok` = '$stok', `jenis` = '$jenis', `diskon` = '$diskon' WHERE `tb_barang`.`id` = '$id'");

    header('location: ../index.php');
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
        $fileName = htmlspecialchars(basename($_FILES["img"]["name"]));
        // // $data = $koneksi->query("select * from tb_barang where id = '$id' ");
        unlink("../assets/img/" . $foto);
        $koneksi->query("UPDATE `tb_barang` SET `nama` = '$nama',`img` = '$fileName', `harga` = '$harga', `stok` = '$stok', `jenis` = '$jenis', `diskon` = '$diskon' WHERE `tb_barang`.`id` = '$id'");
        // $koneksi->query("INSERT INTO `tb_barang` (`id`, `nama`, `harga`, `stok`, `img`, `jenis`, `diskon`) VALUES (NULL, '$nama', '$harga', '$stok', '$fileName', '$jenis', '$diskon')");
        header("location: ../index.php ");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// if ($image) {
//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//         // if everything is ok, try to upload file
//     } else {
//         if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
//             echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
//             $fileName = htmlspecialchars(basename($_FILES["img"]["name"]));
//             // // $data = $koneksi->query("select * from tb_barang where id = '$id' ");
//             unlink("../assets/img/" . $);
//             $koneksi->query("UPDATE `tb_barang` SET `nama` = '$nama',`img` = '$fileName', `harga` = '$harga', `stok` = '$stok', `jenis` = '$jenis', `diskon` = '$diskon' WHERE `tb_barang`.`id` = '$id'");
//             // $koneksi->query("INSERT INTO `tb_barang` (`id`, `nama`, `harga`, `stok`, `img`, `jenis`, `diskon`) VALUES (NULL, '$nama', '$harga', '$stok', '$fileName', '$jenis', '$diskon')");
//             header("location: / ");
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }
//     }
// } else {
//     $koneksi->query("UPDATE `tb_barang` SET `nama` = '$nama', `harga` = '$harga', `stok` = '$stok', `jenis` = '$jenis', `diskon` = '$diskon' WHERE `tb_barang`.`id` = '$id'");
//     // $koneksi->query("INSERT INTO `tb_barang` (`id`, `nama`, `harga`, `stok`, `img`, `jenis`, `diskon`) VALUES (NULL, '$nama', '$harga', '$stok', '$fileName', '$jenis', '$diskon')");
//     header("location: / ");
// }
