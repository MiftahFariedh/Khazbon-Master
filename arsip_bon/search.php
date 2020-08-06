<?php
include '../db/db.php';

  if(isset($_POST['search'])){
    $cnt = 1;
    $search = $_POST['search'];
    $query = mysqli_query($connect, "SELECT tbl_arsip.id_arsip,
                                            tbl_arsip.no_bon,
                                            tbl_arsip.tanggal_kirim,
                                            tbl_arsip.prihal, 
                                            tbl_unit.nama_unit, 
                                            tbl_bon.order_product, 
                                            tbl_arsip.gambar,
                                            tbl_arsip.jumlah 
                                              FROM tbl_arsip 
                                              INNER JOIN tbl_unit ON tbl_arsip.id_unit = tbl_unit.id_unit 
                                              INNER JOIN tbl_bon ON tbl_arsip.id_bon = tbl_bon.id_bon 
                                              WHERE order_product LIKE '%".$search."%'");
    while($row = mysqli_fetch_assoc($query)){
      ?>
      <tr>
        <td><?php echo $cnt;?>.</td>
        <td><?=$row['no_bon']?></td>
        <td><?=$row['tanggal_kirim']?></td>
        <td><?=$row['prihal']?></td>
        <td><?=$row['nama_unit']?></td>
        <td><?=$row['order_product']?></td>
        <td><a href="gallery/<?php echo $row['gambar']?>" data-fancybox="gal">
          <img src="gallery/<?php echo $row['gambar'];?>" width="75px" height="75px"></a></td>
        <td><?=$row['jumlah']?></td>
        <td class="text-middle py-0 align-middle">
          <div class="btn-group btn-group-sm">
              <a href="form_arsip_bon.php?&hal=edit&id=<?php echo $row['id_arsip']?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
              <a href="arsip_bon.php?id=<?php echo $row['id_arsip']?>&del=delete" onClick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </div>
        </td>
       </tr>
      <?php 
				$cnt=$cnt+1;
				}
    }
?>
<html>
  <head>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
  </head>
  <body>
  <script src="../plugins/js/jquery.fancybox.min.js"></script>
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>
  <script src="../dist/js/demo.js"></script>
  <script src="../plugins/moment/moment.min.js"></script>
  </body>
</html>

