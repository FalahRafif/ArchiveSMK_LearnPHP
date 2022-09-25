<?php
//memulai session
session_start();

require "functions.php";

//cek apakah ada cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //query username sesuai id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id ");

    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username 

    if($key === hash('joaat', $row['username'])){
        $_SESSION['login'] = true;
    }

    
    
}
//cek apakah ada session 
if( isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}


    //cek apakah tombol submit di tekan
    if( isset($_POST["submit"])){

        //masukan data form ke daram variabel

        $username = $_POST["username"];
        $password = $_POST["password"];
        //cek username
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

        //apakah query yg td mengembalikan nilai
        if( mysqli_num_rows($result) === 1){

            //cek password
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["password"])){

                //membuat cookie
                if(isset($_POST['remember'])){
                    setcookie('id', $row['id'], time()+ 3600);
                    setcookie('key', hash( 'joaat', $row['username']), time()+ 3600);
                }
                //membuat session
                $_SESSION["login"] = true;

                
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
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
    <h1>login</h1>

        <?php if( isset($error)) : ?>
            <p> username atau password salah</p>
        <?php endif ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me </label>
            </li>
            <li>
                <button type="submit" name="submit"> Login</button>
            </li>
        </ul>
    </form>
</body>
</html>