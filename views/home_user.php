

<?php
//session_start();
//modular memanggil file dari folder tampleate
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Selamat Datang <?= $_SESSION['data'] ['nama'] ?>, dan role kamu disini sebagai <?= 
                    $_SESSION['data'] ['role']?>

                    </h1>
                </div>
                <!-- /.container-fluid -->
<?php
    include_once 'template/footer.php';
?>