<?php
//modular memanggil file dari folder tampleate
$halaman = "Transaksi";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_transaksi.php';
$transaksi = new C_transaksi();
include_once '../controllers/C_film.php';
$film = new C_film();


?>              
            <div class = "row">
                <div class = "col-lg-2"></div>
                <div class = "col-lg-8">
               
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>transaksi</th>
                                            <th>pengguna</th>
                                            <th>id</th>
                                            <th>harga</th>
                                            <th>tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if (empty($transaksi->tampil())) {
                                            echo "Aseli gaada. Balik";
                                        }else {
                                            
                                        
                                        $nomor = 1;

                                        foreach ($transaksi->tampil() as $b){

                                        ?>
        
                                        <tr>
                                            <!-- <-- yang ada di dalam $b itu nama kolom dari tabel di database -->
                                            <td><?php echo $nomor++?></td>
                                            <td><?= $b->id_transaksi?></td>
                                            <?php
                                        
                                               
                                            if ($b->nama == $_SESSION['data'] ['nama']) {
                                            ?>
                                            <td>
                                            <?= $b->nama ?></td>
                                            <?php
                                            }
                                        
                                            ?>
                                            <td align = "center"><div style="display: flex ; justify-content: center; align-items: center;">
                                                <img src="<?= "../assets/img/" . $b->photo;?>" alt="<?= $b->judul?>" width="50" height="65">
                                        </div> 
                                            <br><?= $b->judul?></td>
                                            <td><?= $b->harga?></td>
                                            <td><?= $b->tgl_beli?></td>
                                          
                                            <!-- tanda tanya setelah nama file berarti mempunyai fungsi yang sama dengan get-->
                                            <td align = 'center'><a href="V_edit_transaksi.php?id=<?= $b->id ?> "class="btn btn-primary btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin data mau dihapus?')" href="../routers/r_transaksi.php?id=<?= $b->id ?>&aksi=hapus" class="btn btn-danger btn-icon-split">
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>
                                        </tr>
                                    
                                        <?php } }?>
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>No</th>
                                            <th>transaksi</th>
                                            <th>pengguna</th>
                                            <th>id</th>
                                            <th>harga</th>
                                            <th>tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                                            
<?php
    include_once 'template/footer.php';
?>
