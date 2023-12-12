<?php
//session_start();
//modular memanggil file dari folder tampleate
$transaksi = "Transaksi";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_film.php';
$film = new C_film();
?>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
                        </div>
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambahkan Transaksi Anda</h1>
                        </div>

                        <form action="../routers/r_transaksi.php?aksi=tambah" method="POST" class="user" enctype ="multipart/form-data">

                            <!--untuk menampung nama dari user-->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="transaksi"  name="id_transaksi" hidden>
                            </div>
                            <!--untuk menampung email dari user-->
                            <?php foreach ($film->edit($_GET['id']) as $b) {
                                 ?>
                            <div class="form-group">
                                <input hidden type="text" class="form-control form-control-user" id="id_review "
                                    placeholder="id" name="id" value = '<?= $b->id ?>'>
                            </div>
                            <tr><td>Film langganan</td><td>:</td><td><div style="display: flex ; justify-content: center; align-items: center;">
                                                <img src="<?= "../assets/img/" . $b->photo;?>" alt="<?= $b->nama?>" width="150" height="195">
                                        </div></td></tr>
                                <?php } ?>
                           
                             <!--untuk menampung password dari user-->
                             <div class="form-group">
                                <input hidden type="text" class="form-control form-control-user" id="deskripsi"
                                    placeholder="pengguna" name="id_pengguna" value = "<?= $_SESSION['data'] ['id_pengguna'] ?>">
                            </div>

                            <!--untuk menampung password dari user-->
                            
                             <!--untuk menampung password dari user-->

                             <div class="form-group">
                             <select class="form-control" id="deskripsi"
                                    placeholder="harga" name="harga"><?php for ($i=1; $i <= 500000; $i++) { 
                        if (($i % 50000) == 0) { ?>
    <option value="<?= $i ?> aja" ><?= $i ?> aja</option>
                           <?php
                        }
                    } ?>"
</select>

                             <!--untuk menampung password dari user-->
                             <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="deskripsi"
                                    placeholder="tanggal" name="tgl_beli">
                            </div>

                            <!--untuk menampung nama dari user-->
                            <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="photo"
                                    placeholder="photo" name="role" hidden>
                            </div> -->
                           
                            

                            <div class="input-field">
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambahkan" id="" name="tambah">
                            </div>

                        </form>
                        
                
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

</body>

<?php
    include_once 'template/footer.php';
?>
