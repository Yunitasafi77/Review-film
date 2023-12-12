<?php
//session_start();
//modular memanggil file dari folder tampleate
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

include_once '../controllers/C_transaksi.php';

$transaksi = new C_transaksi();
?>
<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Transaksi</h1>
                        </div>

                        <form action="../routers/R_transaksi.php?aksi=update" method="POST" class="user" enctype ="multipart/form-data">
                            <?php foreach($transaksi->edit($_GET['id']) as $b){?>
                            <!--untuk menampung inputan id user -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Id" name="id" value ="<?= $b->id ?>" hidden>
                            </div>
                            <!--untuk menampung nama dari user-->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="transaksi" name="id_transaksi" value ="<?= $b->id_transaksi?>">
                            </div>
                   
                            <!--untuk menampung password dari user-->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="password"
                                    placeholder="pengguna" name="id_pengguna"value ="<?= $b->id_pengguna ?>">
                            </div>

                             <!--untuk menampung password dari user-->
                             <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="password"
                                    placeholder="id" name="id"value ="<?= $b->id ?>">
                            </div>

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


                            <!--untuk menampung nama dari user-->
                            <div class="form-group">
                                <input type="file" class="form-control form-control-user" id="photo"
                                    value="<?= $b->photo ?>" name="photo" hidden>
                            </div>
                           
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="photo" name="tgl_beli">
                            </div>

                            <div class="input-field">
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Edit">
                            </div>

                            <?php 
                            }
                            ?>

                        </form>
                        
                
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>

<?php
    include_once 'template/footer.php';
?>
