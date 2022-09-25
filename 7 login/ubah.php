<?php
require 'functions.php';

//mengambil id di url
$id = $_GET["id"];

// menampilkan data sesuai id
$siswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit jika suda di tekan
if( isset($_POST["submit"])){
    
   // cek apakah data berhasil di tambah
    if( ubah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil di ubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal di ubah!');
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

<form action="" method="post" enctype="multipart/form-data">
    <ul>
            <input type="hidden" name="gambar" value="<?= $siswa["gambar"] ?>">
            <input type="hidden" name="id" value="<?= $siswa["id"]?>">
        <li>
            <label for="nama">nama mahasiswa :</label>
            <input type="text" name="nama" id="nama" required value="<?= $siswa["nama"];?>">
        </li>
        <li>
            <label for="nrp">nrp mahasiswa :</label>
            <input type="text" name="nrp" id="nrp" required value="<?= $siswa["nrp"];?>">
        </li>
        <li>
            <label for="email">email mahasiswa :</label>
            <input type="text" name="email" id="email" required value="<?= $siswa["email"];?>">
        </li>
        <li>
            <label for="jurusan">jurusan mahasiswa :</label>
            <input type="text" name="jurusan" id="jurusan" required value="<?= $siswa["jurusan"];?>">
        </li>
        <li>
            <label for="gambar">gambar mahasiswa :</label> <br>
            <img src="img/<?= $siswa["gambar"]; ?>" alt="" width="50px"> <br>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Ubah</button>
        </li>
    </ul>
</form>
</body>
</html>