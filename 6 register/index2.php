<?php
//================================//
//        kurang efektif
//================================//



// menyambungkan ke database
$conn = mysqli_connect("localhost","root","","tutorial_php");

// mengambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
//cek jika result salah
// if ( !$result){
//     echo mysqli_error($conn);
// }
// var_dump($result); // krn hanya  menampilkan lemarinya saja

//ambil data (fetch) dari objek result
//mysqli_fetch_row()        mengembalikan array numerik 
//mysqli_fetch_assoc()      mengembalikan array associative <=== Recomended
//mysqli_fetch_array()      menggembalika array numerik & associative (doubel)
//mysqli_fetch_object()

// while($mhs = mysqli_fetch_assoc($result)){
// var_dump($mhs);
// }


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
    <table border="1px" cellpadding="10px" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Action</th>
            <th>Image</th>
            <th>Nrp</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <tr>
        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
        
            <td><?= $i;?></td>
            <td>
                <a href="">Edit</a> |
                <a href="">Delete </a>
            </td>
            <td><img src="img/<?= $row["gambar"];?>" alt="" srcset=""></td>
            <td><?= $row["nrp"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["email"];?></td>
        </tr>
        <?php $i++ ?>
        <?php endwhile?>

    </table>
</body>
</html>