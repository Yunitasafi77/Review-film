<?php
include_once '../controllers/C_film.php';
$film = new C_film();

if ($_GET['aksi'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $deskripsi = $_POST['deskripsi'];
     //ekstensi yang diperbolehkan hanya jpg dan png
     $ekstensi_diperbolehkan = array('png','jpg','jpeg');

     $photo = $_FILES['photo']['name'];
 
     $x = explode('.', $photo);

     $ekstensi = strtolower(end($x));
    //endapatkan ukurran 
     $ukuran = $_FILES ['photo']['size'];

    //untuk mendapatkan tempory file yang di uplod
     $file_tmp = $_FILES['photo']['tmp_name']; 

     //menegecek ekstensi yang di buat
     if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){

        if( $ukuran < 1044070){
            move_uploaded_file($file_tmp,'../assets/img/'. $photo);

            // $query = $film->tambah($id=0, $nama, $genre, $rating, $deskripsi, $nama_photo);
            $film->tambah_film($id = 0, $nama, $genre, $rating, $deskripsi, $photo);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
     }else{
        echo"EKSTENSI TIDAK DIPERBOLEHKAN";
     }
 
    

   
}elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $deskripsi = $_POST['deskripsi'];

     //ekstensi yang diperbolehkan hanya jpg dan png
     $ekstensi_diperbolehkan = array('png','jpg','jpeg');

     $photo = $_FILES['photo']['name'];
 
     $x = explode('.', $photo);

     $ekstensi = strtolower(end($x));
    //endapatkan ukurran 
     $ukuran = $_FILES ['photo']['size'];

    //untuk mendapatkan tempory file yang di uplod
     $file_tmp = $_FILES['photo']['tmp_name']; 

     //menegecek ekstensi yang di buat
     if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){

        if( $ukuran < 1044070){
            move_uploaded_file($file_tmp,'../assets/img/'. $photo);

            // $query = $film->tambah($id=0, $nama, $genre, $rating, $deskripsi, $nama_photo);
            $film->update($id, $nama, $genre, $rating, $deskripsi, $photo);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
     }else{
        echo"EKSTENSI TIDAK DIPERBOLEHKAN";
     }



}elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $film->delete($id);
}
?>