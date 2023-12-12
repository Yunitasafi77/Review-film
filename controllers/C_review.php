<?php

   include_once 'C_koneksi.php';
class C_review{

    public function tampil() {

       $conn = new C_koneksi();

        $sql = "SELECT * FROM review  JOIN pengguna ON review.id_pengguna = pengguna.id_pengguna JOIN film ON review.id = film.id ORDER BY id_review DESC";

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

    public function tambah_review($id_review, $id, $id_pengguna, $review, $photo){

        $conn = new C_koneksi();

        // $sql = " INSERT INTO barang VALUES ($id, '$nama', '$genre', '$rating', 'deskripsi', '$nama_photo')";
        // var_dump($sql);
        $sql = "INSERT INTO review VALUES ($id_review, $id, $id_pengguna, '$review', '$photo')";
        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_review_user.php'</script>";
            
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

    public function edit($id_review) {
        $conn = new C_koneksi();

        $sql ="SELECT * FROM review JOIN pengguna ON review.id_pengguna = pengguna.id_pengguna JOIN film ON review.id = film.id WHERE id_review = '$id_review'";

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


    public function update ($id_review, $id, $id_pengguna, $review, $photo) {

        $conn = new C_koneksi();

        $sql = "UPDATE `review` SET `id` = '$id', `review` = '$review', `photo` = '$photo' WHERE `id_review` = '$id_review'";

        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_review_user.php'</script>";

        }else {
            echo "Dataa gagal diubah";
        }
    }
    public function delete($id_review){
        $conn = new C_koneksi();
        
        $sql = "DELETE FROM review WHERE id_review = '$id_review'";

        $query = mysqli_query($conn->conn(), $sql);

        header("Location:../views/V_review_user.php");

    }

}
?>