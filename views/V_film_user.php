<?php
//modular memanggil file dari folder tampleate
$halaman = "Film";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_film.php';
$film = new C_film();


?>              
            <div class = "row">
                <div class = "col-lg-2"></div>
                <div class = "col-lg-8">
                      
                <!-- /.container-fluid -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Film</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>genre</th>
                                            <th>rating</th>
                                            <th>deskripsi</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if (empty($film->tampil())) {
                                            echo "Aseli gaada. Balik";
                                        }else {
                                            
                                        
                                        $nomor = 1;

                                        foreach ($film->tampil() as $b){

                                        ?>
        
                                        <tr>
                                            <!-- <-- yang ada di dalam $b itu nama kolom dari tabel di database -->
                                            <td><?php echo $nomor++?></td>
                                            <td><?= $b->judul?></td>
                                            <td><?= $b->genre?></td>
                                            <td><?= $b->rating?></td>
                                            <td><?= $b->deskripsi?></td>
                                            <td>
                                            <div style="display: flex ; justify-content: center; align-items: center;">
                                                <img src="<?= "../assets/img/" . $b->photo;?>" alt="<?= $b->nama?>" width="50" height="65">
                                        </div></td>
                                            <!-- tanda tanya setelah nama file berarti mempunyai fungsi yang sama dengan get-->
                                            <td align = 'center'><a href="V_tambah_review.php?id=<?= $b->id ?> "class="btn btn-primary btn-icon-split">
                                        <span class="text">Review</span>
                                    </a>
                                    <a href="V_tambah_transaksi.php?id=<?= $b->id ?> "class="btn btn-danger btn-icon-split">
                                        <span class="text">Transaksi</span>
                                    </a>
                                </td>
                                        </tr>
                                    
                                        <?php } }?>
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>genre</th>
                                            <th>rating</th>
                                            <th>deskripsi</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                                            
<?php
    include_once 'template/footer.php';
?>
