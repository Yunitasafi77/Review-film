<?php

   include_once 'C_koneksi.php';
class C_film{

    public function tampil() {

       $conn = new C_koneksi();

        $sql = "SELECT * FROM film ORDER BY id DESC";

        $query = mysqli_query($conn->conn(),$sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }
        if (empty($hasil)) {
            echo "";
        }else{
        return $hasil;
        }
    }

    public function tambah_film($id, $nama, $genre, $rating, $deskripsi, $photo){

        $conn = new C_koneksi();

        // $sql = " INSERT INTO barang VALUES ($id, '$nama', '$genre', '$rating', 'deskripsi', '$nama_photo')";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), "INSERT INTO film VALUES ($id, '$nama', '$genre', '$rating', '$deskripsi', '$photo')");
        

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_film.php'</script>";
            
        }else {
            echo "Selalu Gagal ";
            
        }

    }

    // public function tambah($id=0,$nama,$genre,$rating,$deskripsi,$nama_photo) {

    //     $conn = new C_koneksi();

    //     $sql = "INSERT INTO film VALUES ($id,'$nama','$genre','$rating',$deskripsi,'$nama_photo')";
    //     var_dump($sql);

    //    $query = mysqli_query($conn->conn(),$sql);

    //      //$sql = "INSERT INTO film VALUES ('$id','$nama','$genre','$raring',$deskripsi,'$photo')";
    //      //var_dump($sql);

    //     // $query = mysqli_query($conn->conn(), $sql);
    //     var_dump($query);

    //     if ($query) {
    //         echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_barang.php'</script>";
    //     }else{
    //         echo "Selalu Gagal ";
    //     }
    // }

    public function edit($id) {
        $conn = new C_koneksi();

        $sql ="SELECT * FROM film WHERE id = '$id'";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }

        if (empty($hasil)) {
            echo "";
        }else{
        return $hasil;
        }
    }
    public function update ($id, $nama, $genre, $rating, $deskripsi, $photo) {

        $conn = new C_koneksi();

        $sql = "UPDATE `film` SET `judul` = '$nama', `genre` = '$genre', `rating` = '$rating', `deskripsi` = '$deskripsi', `photo` = '$photo' WHERE `id` = '$id'";

        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_film.php'</script>";

        }else {
            echo "Dataa gagal diubah";
        }
    }
    public function delete($id){
        $conn = new C_koneksi();
        
        $sql = "DELETE FROM film WHERE id = '$id'";

        $query = mysqli_query($conn->conn(), $sql);

        header("Location:../views/V_film.php");

    }

}
?>