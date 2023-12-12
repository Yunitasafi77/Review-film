<?php
//modular memanggil file dari folder tampleate
$halaman = "Review";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_review.php';
$review = new C_review();


?>              
            <div class = "row">
                <div class = "col-lg-2"></div>
                <div class = "col-lg-8">
                <a href="V_tambah_review.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <span class="text"><i class = "fas fa-plus fa-sm text-white-50"></i></span><span>Tambah Review</span>
                                    </a>          
                <!-- /.container-fluid -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Review</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Film</th>
                                            <th>Pengguna</th>
                                            <th>Review</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if (empty($review->tampil())) {
                                            echo "Aseli gaada. Balik";
                                        }else {
                                            
                                        
                                        $nomor = 1;

                                        foreach ($review->tampil() as $b){

                                        ?>
        
                                        <tr>
                                            <!-- <-- yang ada di dalam $b itu nama kolom dari tabel di database -->
                                            <td><?php echo $nomor++?></td>
                                            <td hidden><?= $b->id_review?></td>
                                            <td><?= $b->judul?></td>
                                            <td><?= $b->nama?></td>
                                            <td><?= $b->review?></td>
                                            <td>
                                            <div style="display: flex ; justify-content: center; align-items: center;">
                                                <img src="<?= "../assets/img/" . $b->photo;?>" alt="<?= $b->nama?>" width="50" height="65">
                                        </div></td>
                                            <!-- tanda tanya setelah nama file berarti mempunyai fungsi yang sama dengan get-->
                                            <td align = 'center'><a href="V_edit_review.php?id=<?= $b->id_review ?> "class="btn btn-primary btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin data mau dihapus?')" href="../routers/r_review.php?id=<?=$b->id_review?>&aksi=hapus" class="btn btn-danger btn-icon-split">
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>
                                        </tr>
                                    
                                        <?php } }?>
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>No</th>
                                            <th>Film</th>
                                            <th>Pengguna</th>
                                            <th>Review</th>
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
