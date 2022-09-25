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

    
     //mengambil data gambar dari func upload
     $gambar = upload();

      //cek apakah gambar sudah di upload 
     if( !$gambar ){

    return false; 
     }
 
     //query inset data
     $query = "INSERT INTO mahasiswa 
                     VALUES
                     ('','$nama','$nrp','$email','$jurusan','$gambar')
                     ";
     mysqli_query($conn, $query);

    //mengembalikan nilai 
     return mysqli_affected_rows($conn);
}

// upload file
function upload(){

    //memasukan data dari $_FILES
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmptgambar = $_FILES['gambar']['tmp_name'];


    //cek apakah gambar sudah di upload 
    if( $error === 4){
        echo "
        <script>
            alert('silahkan upload gambar terlebih dahulu');
        </script>
    ";
    return false;
    }

    //cek apakah yg di upload gambar 
    $formatgambarvalid = ['jpg','jpeg','png'];
    $formatgambar = explode('.',$namafile);    //memecah string menjadi array
    $formatgambar = strtolower(end($formatgambar));    //memilih array terakhir

    if( !in_array($formatgambar, $formatgambarvalid)){
        echo "
        <script>
            alert('yang di upload bukan gambar');
        </script>
    ";
   return false;
    }

    //cek ukuran gambar
    if($ukuranfile > 1000000){
        echo "
        <script>
            alert('ukuran gambar terlalu besar');
        </script>
    ";
    return false;
    }
    
    //membuat nama gambar baru
    $namafilebaru = uniqid(); //nama uniq
    $namafilebaru .= '.';   //titik
    $namafilebaru .= $formatgambar; //format gambar


    //memindahkan directory gambar
    move_uploaded_file($tmptgambar, 'img/' . $namafilebaru);


    //mengembalikan nilai data
    return $namafilebaru;
}






// hapus data mahasiswa
function hapus($id){
    global $conn;
    
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
    //mengembalikan nilai 
    return mysqli_affected_rows($conn);
}

// ubah data siswa
function ubah($data){
    global $conn;
    
     //ambil data pada setiap elemen form
     $id = $data["id"];
     $nama = htmlspecialchars($data["nama"]);
     $nrp = htmlspecialchars($data["nrp"]);
     $email = htmlspecialchars($data["email"]);
     $jurusan = htmlspecialchars($data["jurusan"]);
     $gambarlama = $data["gambar"];
     //cek apakah ada gambar baru atau tidak
     if($_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarlama;
     }else{
         $gambar = upload();
     }
    
 
     //query inset data
     $query = " UPDATE mahasiswa SET
                    nama = '$nama',
                    nrp = '$nrp',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                WHERE id = $id
                     ";
     mysqli_query($conn, $query);

    //mengembalikan nilai 
     return mysqli_affected_rows($conn);
    
}

//cari siswa
function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
                        nama LIKE '%$keyword%' OR
                        nrp LIKE '%$keyword%' OR
                        email LIKE '%$keyword%' OR
                        jurusan LIKE '%$keyword%' 
                        ";
    return query($query);

}



?>