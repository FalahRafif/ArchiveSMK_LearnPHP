<?php
require 'functions.php';

//cek apakah tombol submit jika suda di tekan
if( isset($_POST["submit"])){


    // cek apakah data berhasil di tambah
    if( tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil di tambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal di tambahkan!');
            </script>
        ";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>tambah mahasiswa</h1>

<form action="" method="post">
    <ul>
        <li>
            <label for="nama">nama mahasiswa :</label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="nrp">nrp mahasiswa :</label>
            <input type="text" name="nrp" id="nrp" required>
        </li>
        <li>
            <label for="email">email mahasiswa :</label>
            <input type="text" name="email" id="email" required>
        </li>
        <li>
            <label for="jurusan">jurusan mahasiswa :</label>
            <input type="text" name="jurusan" id="jurusan" required>
        </li>
        <li>
            <label for="gambar">gambar mahasiswa :</label>
            <input type="text" name="gambar" id="gambar" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambahkan</button>
        </li>
    </ul>
</form>
</body>
</html>