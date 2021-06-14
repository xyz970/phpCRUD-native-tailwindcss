<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>

<body>
    <section class="flex items-center justify-center">

        <div class="w-1/2">
            <div class="py-8 ">
                <h2 class="font-bold text-2xl">Tambah Data</h2>
            </div>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data" method="POST" action="../logic/tambah.php">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Nama Barang
                    </label>
                    <input name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Nama Barang">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Harga Barang
                    </label>
                    <input name="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Harga Barang">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Stok Barang
                    </label>
                    <input name="stok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Stok Barang">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Jenis Barang
                    </label>
                    <input name="jenis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Jenis Barang">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Diskon Barang
                    </label>
                    <input name="diskon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Diskon Barang">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">

                    </label>
                    <input name="img" id="img" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="file">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="submit" type="submit">
                        Tambah
                    </button>

                </div>
            </form>
        </div>
    </section>
</body>

</html>