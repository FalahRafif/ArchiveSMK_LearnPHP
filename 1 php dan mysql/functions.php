<?php 
// menyambungkan ke database
$conn = mysqli_connect("localhost","root","","tutorial_php");


// mengquery data mahasiswa
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; //wadah elemen
    //mengambil elemen dalam lemari dan di simpan di dalam box row
    while ( $row = mysqli_fetch_assoc($result)){ 
        $rows[] = $row;     //menaro box row ke dalam wadah rows
    } 
    return $rows;
} 


?>