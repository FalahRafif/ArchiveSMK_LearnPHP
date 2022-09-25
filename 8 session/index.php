<?php
//memulai session
session_start();

//jika tdk memiliki session
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

// jika tombol cari di tekan
if( isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
</head>
<body>
<p><a href="logout.php">log out</a></p>
<h1> data mahasiswa</h1>
<a href="tambah.php">tambah data mahasiswa</a>

<!-- cari siswa -->
<form action="" method="post">
    <input type="text" name="keyword" id="keyword" autofocus placeholder="masukan keyword" autocompleye="off">
    <button type="submit" name="cari"> cari</button>
</form>


    <table border="1px" cellpadding="10px" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Action</th>
            <th>Image</th>
            <th>Nrp</th>
            <th>Name</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr> 

<!-- munculkan data mahasiswa -->
<?php $i = 1; ?>
<?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"];?>">Edit</a> |
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');">Delete </a>
            </td>
            <td><img src="img/<?= $row["gambar"];?>" width="50px"></td>
            <td><?= $row["nrp"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
<?php $i = $i++; ?>
<?php endforeach; ?>

    </table>
</body>
</html>