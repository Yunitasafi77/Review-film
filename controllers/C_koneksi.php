<?php
// -ini adalah kelas, nama kelas harus sama persis dengan nama file

// use C_koneksi as GlobalC_koneksi;

class C_koneksi {


// -ini adalah fungsi atau method yang bernama connection
public function conn() {

    //membuat fungsi untuk terkoneksi kedalam database projectfilmxiirpl3
    //localhost itu servernya
    //root itu username
    //yang kosong itu password
    //review_film itu nama databasenya

        //membuat fungsi untuk terkoneksi kedalam database project_film
        $conn = mysqli_connect('localhost','root','','review_film');
        //untuk mengecek apakah koneksi berhasil di buat atau tidak
        if(!$conn){
            die("Koneksi gagal total : " .mysqli_connect_error());
        }else{
            //untuk mengembalikan nilai koneksi
            return $conn;
        }
}
}
//inisialisasi objek. objek harus diluar class
// $koneksi = new C_koneksi();
//memanggil method yang ada didalam class
// $koneksi->conn();

?>