<?php
include_once '../controllers/C_review.php';
$review1 = new C_review();

if ($_GET['aksi'] == 'tambah') {
    $id_review = $_POST['id_review'];
    $id = $_POST['id'];
    $id_pengguna = $_POST['pengguna'];
    $review = $_POST['review'];
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
            $review1->tambah_review($id_review = 0, $id, $id_pengguna, $review, $photo);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
     }else{
        echo"EKSTENSI TIDAK DIPERBOLEHKAN";
     }
 
    

   
}elseif ($_GET['aksi'] == 'update') {
    $id_review = $_POST['id_review'];
    $id = $_POST['id'];
    $pengguna = $_POST['pengguna'];
    $review = $_POST['review'];

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
            $review1->update($id_review, $id, $pengguna, $review, $photo);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
     }else{
        echo"EKSTENSI TIDAK DIPERBOLEHKAN";
     }



}elseif ($_GET['aksi'] == 'hapus') {
    $id_review = $_GET['id'];

    $review1->delete($id_review);
}
?>