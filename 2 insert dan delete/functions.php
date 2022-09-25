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

// menambahkan data mahasiswa
function tambah($data){
    global $conn;
    
     //ambil data pada setiap elemen form
     
     $nama = htmlspecialchars($data["nama"]);
     $nrp = htmlspecialchars($data["nrp"]);
     $email = htmlspecialchars($data["email"]);
     $jurusan = htmlspecialchars($data["jurusan"]);
     $gambar = htmlspecialchars($data["gambar"]);
 
     //query inset data
     $query = "INSERT INTO mahasiswa 
                     VALUES
                     ('','$nama','$nrp','$email','$jurusan','$gambar')
                     ";
     mysqli_query($conn, $query);

    //mengembalikan nilai 
     return mysqli_affected_rows($conn);
}


// hapus data mahasiswa
function hapus($id){
    global $conn;
    
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
    //mengembalikan nilai 
    return mysqli_affected_rows($conn);
}
?>