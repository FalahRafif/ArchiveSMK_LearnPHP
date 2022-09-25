<?php
//memulai session
session_start();

//jika tdk memiliki session
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';


//pagination
// config
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM mahasiswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman); // membulatan dengan round(terdekat) floor(kebawah) ceil(keatas)
//menggunakan temporary
$halamanaktif = ( isset($_GET['halaman']) ? $_GET["halaman"] : 1);
//logic halaman
//halaman = 2, awaldata nya = 2
//halaman = 3, awal datanya = 4
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;



$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awaldata, $jumlahdataperhalaman");

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
<br> <br>



<!-- nav pagnation -->
<!-- memunculkan panah < -->
<?php if($halamanaktif > 1)  :?>
    <a href="?halaman=<?= $halamanaktif -1 ?>">&laquo; </a>
<?php endif ?>

<!-- memunculkan pengulangan sesuai jumlah halaman -->
<?php for( $i = 1; $i <= $jumlahhalaman; $i = $i + 1 ) : ?>
    <?php if($i == $halamanaktif) :?>
        <a href="?halaman=<?= $i?>" style="font-weight:bold; color:red;"><?= $i ?></a>
    <?php else :?>
        <a href="?halaman=<?= $i?>"><?= $i ?></a>
    <?php endif ?>
<?php endfor ?>

<!-- memunculkan panah > -->

<?php if($halamanaktif < $jumlahhalaman)  :?>
    <a href="?halaman=<?= $halamanaktif + 1 ?>">&raquo; </a>
<?php endif ?>


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
<?php $i = $i + 1; ?>
<?php endforeach; ?>

    </table>
</body>
</html>