<?php
require 'functions.php';

if( isset($_POST["submit"])){

    if( registrasi($_POST) > 0 ){
        echo "
            <script>
                alert('user baru berhasil di buat');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('gagal di menambahkan User baru ');
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
    <title>Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Registrasi</h1>


    <form action="" method="post">
    <ul>
        <li>
            <label for="username">username</label>
            <input type="text" name="username" id="username" autocompleye="off">
        </li>
        <li>
            <label for="password">password</label>
            <input type="password" name="password" id="password" autocompleye="off">
        </li>
        <li>
            <label for="konfirmasipassword">konfirmasi password</label>
            <input type="password" name="konfirmasipassword" id="konfirmasipassword">
        </li>
        <li>
            <button type="submit" name="submit">Sign Up</button>
        </li>
    </ul>
</form>
</body>
</html>