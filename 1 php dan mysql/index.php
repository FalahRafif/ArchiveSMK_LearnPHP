<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");


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


<?php $i = 1; ?>
<?php foreach($mahasiswa as $row) : ?>
        <tr>
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
<?php $i = $i++; ?>
<?php endforeach; ?>

    </table>
</body>
</html>