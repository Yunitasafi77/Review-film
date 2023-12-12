<?php
include_once '../controllers/C_login.php';

$login = new C_login();

    //untuk mengecek apakah action pada form register mengirimkan aksi register
    //tanda tanya aksi klo di pindah ke role akan jadi dolar get
    if ($_GET['aksi'] == 'register') {
        
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //hash password = enskripsi password
        //agar pass nya aman sehingga defeloper tidak mengetahui pass yg di inputkna
        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['role'];
        
         //memanggil method/fungsi register ke dalam r_login
         $login->register($id, $nama, $email, $password, $role);
    }
    elseif ($_GET['aksi'] == 'login') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        //memanggil method login
        $login->login($email, $password);

    } elseif ($_GET['aksi'] == 'logout') {
        $login->logout();
    }
?>