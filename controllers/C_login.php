
<?php
session_start();
//modularisasi. memanggil class dari file lain ke file ini
include_once 'C_koneksi.php';


class C_login {


    // -ini adalah fungsi atau method yang bernama registrasi user
    public function register($id=0, $nama=null, $email=null, $password=null, $role=null) {
        
        //membuat sebuah variable bertipe data objek
        $koneksi = new C_koneksi();

        //untuk menambahkan data objek dari kelas c_koneksi
        $sql = "INSERT INTO pengguna VALUES ('$id', '$nama', '$email','$password' ,'$role', '')";
        //$sql2 = "INSERT INTO (id, nama, email, pass, role, photo) user VALUES ('$id', '$nama', '$email','$pass' ,'$role', '')";
        
        //mysqli_query=fungsi bawa an dari php
        //mengesekusi perintah
        //2 parameter 1.koneksi 2.perintahnya
        $query = mysqli_query($koneksi->conn(), $sql); //->true/false

        //untuk mengecek data hasil dari query
        if ($query) {
            echo "Data berhasil di tambahkan";
        }else{
            echo "Data gagal di tambahkan";
        }
    }


    // membuat fungsi login user
    public function login($email, $password) {

        // ini membuat sebuah variabel yang bertipe data objek dari kelas koneksi 
        $conn = new C_koneksi();

        //untuk mengecek tombol login sudah di tekan / di klik oleh user
        if (isset($_POST['login'])) {
        
            // perintah untuk mengambil semua data dari tabel user berdasarkan email yang di inputkan oleh user 
            $sql = "SELECT * from pengguna WHERE email = '$email'";

            //exsekutor perintah diatas
            $query = mysqli_query($conn->conn(), $sql);  

            //mengubah data dari yg bertipe data objek menjadi aray asosiatif
            // assoc = array asosiatif -> key / index nya berupa string/huruf.
            $data = mysqli_fetch_assoc($query);

            //array biasa -> key / index nya berupa angka, dimulai dari 0 - tak terhingga 
            // $data2 = mysqli_fetch_array($query);

            // untuk mengecek apakah ada data dari hasil $query 
            if ($data) {

                //menggunkan array asosiatif
                //untuk membandingkan inputan password dari user dengan password dari tabel user 
                if (password_verify($password, $data['password'])) {
                    
        
                    //untuk mengecek posisi login sebagai admin, atau mengecek apakah role user itu sebagai admin atau bukan pengguna sebagai admin
                    if ($data['role'] == 'admin') {

                        //menampung query dari database yg nantinya di gunakan pada halaman admin atau user setelah proses login berhasil
                        // membuat variabel session yang nantinya akan digunkan pada halaman home admin/ login sebagai admin 
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data["role"];

                        // jika login berhasil dan rolenya sebagai admin maka akan berpindah kehalaman home 
                        header("Location: ../views/home.php");

                        //untuk menghentikan proses di bawahnya
                        exit;

                        
                        //untuk mengecek posisi login sebagai user, atau mengecek apakah role user itu sebagai admin atau bukan pengguna sebagai admin
                        //untuk role pengguna sebagai admin
                    }elseif ($data['role'] == 'penonton') {

                        
                        //menampung query dari database yg nantinya di gunakan pada halaman admin atau user setelah proses login berhasil
                        // membuat variabel session yang nantinya akan digunkan pada halaman home user/ login sebagai user 
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data["role"];

                        // jika login berhasil dan rolenya sebagai user maka akan berpindah kehalaman home 
                        header("Location: ../views/home_user.php");

                        //untuk menghentikan proses di bawahnya
                        exit;
                    
                    }else {
                        echo "cek password";
                    }
                    
                    //untuk role pengguna bukan sebagai admin dan user
                    }else {
                        // var_dump($sql);
                        echo "username ngasal beach";
                        var_dump($data);
                    }

                    
                }
            }
        }

        public function logout() {
             session_start();
            //menghapus session
            session_destroy();
            //fungsi untuk kembali ke halaman index.php
            header("location: ../index.php");
        }
        
        
    }

?>