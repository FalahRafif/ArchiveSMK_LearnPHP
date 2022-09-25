<?php
require 'functions.php';

    //mengambil data di url
    $id = $_GET["id"];

    if( hapus($id)){
        echo "
            <script>
                alert('data berhasil di hapus!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal di hapus!');
                document.location.href = 'index.php';
            </script>
        ";
    }

?>