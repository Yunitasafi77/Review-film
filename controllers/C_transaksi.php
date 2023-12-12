<?php

   include_once 'C_koneksi.php';
class C_transaksi{

    public function tampil() {

       $conn = new C_koneksi();

        $sql = "SELECT * FROM `transaksi` JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna JOIN film ON transaksi.id = film.id ORDER BY id_transaksi DESC";

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

    public function tambah($transaksi, $pengguna, $id, $harga, $tanggal){

        $conn = new C_koneksi();

        $sql = "INSERT INTO `transaksi`(`id_transaksi`, `id_pengguna`, `id`, `harga`, `tgl_beli`) VALUES ($transaksi, $pengguna, $id, '$harga', '$tanggal' )";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), $sql);
        
        if($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_transaksi_user.php'</script>";
            
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

    public function edit($transaksi) {
        $conn = new C_koneksi();

        $sql ="SELECT * FROM transaksi WHERE id_transaksi = '$transaksi'";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }

        return $hasil;
    }

    public function update ($transaksi, $pengguna, $id, $harga, $tanggal) {

        $conn = new C_koneksi();

        $sql = "UPDATE `transaksi` SET `id_pengguna` = '$pengguna', `id` = '$id', `harga` = '$harga', `tgl_beli` = '$tanggal' WHERE `id_transaksi` = '$transaksi'";

        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_transaksi.php'</script>";

        }else {
            echo "Dataa gagal diubah";
        }
    }
    public function delete($id){
        $conn = new C_koneksi();
        
        $sql = "DELETE FROM transaksi WHERE id = '$id'";

        $query = mysqli_query($conn->conn(), $sql);

        header("Location:../views/V_transaksi.php");

    }

}
?>