<?php
include_once '../controllers/C_transaksi.php';
$transaksi1 = new C_transaksi();

if ($_GET['aksi'] == 'tambah') {
    $transaksi = $_POST['id_transaksi'];
    $pengguna = $_POST['id_pengguna'];
    $id = $_POST['id'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tgl_beli'];

    $transaksi1->tambah($transaksi = 0, $pengguna, $id, $harga, $tanggal);

    
   
}elseif ($_GET['aksi'] == 'update') {
    $transaksi = $_POST['id_transaksi'];
    $pengguna = $_POST['id_pengguna'];
    $id = $_POST['id'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tgl_beli'];

    $transaksi1->update($transaksi, $pengguna, $id, $harga, $tanggal);

    
   
}elseif ($_GET['aksi'] == 'hapus') {
    $transaksi = $_GET['id'];

    $transaksi1->delete($transaksi);
}
?>