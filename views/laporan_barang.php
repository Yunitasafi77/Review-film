<?php
include_once '../controllers/C_film.php';

$film = new C_film();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device, initial-scale=1.0">
    <title>Laporan Film</title>
</head>
<body>
    <center><h2>DAFTAR FILM</h2></center>

    <table border="1" style="width: 100%;">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>genre</th>
            <th>rating</th>
            <th>deskripsi</th>
            <th>Photo</th>
</tr>
</thead>
<tbody>
    <?php $no = 1; foreach($film->tampil() as $b) { ?>
        <tr>
        <td><?= $no++?></td>
         <td><?= $b->id?></td>
         <td><?= $b->genre?></td>
         <td><?= $b->rating?></td>
         <td><?= $b->deskripsi?></td>

       <td>
         <div style="display: flex ; justify-content: center; align-items: center;">
          <img src="<?= "../assets/img/" . $b->photo;?>" alt="<?= $b->nama?>" width="50" height="65">
         </div></td>
            </tr>
            <?php }?>
            </tbody>
            </table>

            <script>
            window.print();
            </script>
            </body>
            </html>


</body>
</html>

