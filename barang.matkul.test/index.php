<?php

require_once "settings/db.php";

// $data = $koneksi->query('select * from tb_barang');
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $data = $koneksi->query("select * from tb_barang where nama like '%" . $cari . "%'
        || jenis like '%" . $cari . "%' || diskon like '%" . $cari . "%' || stok like '%" . $cari . "%'
    ");
    // $data = $koneksi->query("select * from tb_barang where nama like '%" . $cari . "%' || jenis like '%" . $cari . "%' ");
} else {
    $data = $koneksi->query('select * from tb_barang');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Data Barang</title>
</head>

<body>



    <section class="px-3 py-7">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="flex flex-grow justify-end px-4 py-4">
                            <a href="tambah/" class="text-white bg-green-400 hover:bg-green-500 px-4 py-2 rounded antialiased font-bold">Tambah Data</a>
                        </div>

                        <div class="flex flex-grow justify-start py-6 px-4">
                            <form action="index.php" method="get">
                                <input type="text" name="cari" placeholder="Search.." class="shadow appearance-none border rounded w-48 py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white">
                                <!-- <div class="px-3 py-1">
                                    <button type="submit" class="bg-purple-800 hover:bg-purple-700 text-white font-bold py-1 px-4 rounded">Cari</button>
                                </div> -->
                                <button type="submit" class="bg-purple-800 hover:bg-purple-700 text-white font-bold py-1 px-4 rounded">Cari</button>

                            </form>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Foto
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Barang
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Stok
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jenis
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Diskon
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                    <!-- <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                $i = 1;
                                foreach ($data as $hasil) { ?>
                                    <tr>
                                        <td class="px-6 pb-12 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-20 w-20 rounded-full" src="assets/img/<?= $hasil['img'] ?>" alt="foto barang">
                                                </div>

                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?= $hasil['nama'] ?></div>
                                            <div class="text-sm text-gray-500">Rp <?= $hasil['harga'] ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                <?= $i++ ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-700 text-white">
                                                <?= $hasil['stok'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $hasil['jenis'] ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $hasil['diskon'] ?>%
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                            <a href="edit/index.php?id=<?= $hasil['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded antialiased font-bold">Edit</a>

                                            |

                                            <a href="hapus/index.php?id=<?= $hasil['id'] ?>&&foto?=<?= $hasil['img'] ?>" class="text-white bg-red-700 hover:bg-red-600 px-4 py-2 rounded antialiased font-bold">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>