<?php
include '../db/db.php';
  if(isset($_POST['search'])){
    $cnt = 1;
    $search = $_POST['search'];
    $query = mysqli_query($connect, "SELECT SUM(jumlah) AS total, tbl_unit.nama_unit, tbl_bon.order_product FROM tbl_arsip 
    INNER JOIN tbl_unit ON tbl_unit.id_unit = tbl_arsip.id_unit
    INNER JOIN tbl_bon ON tbl_bon.id_bon = tbl_arsip.id_bon
    WHERE tbl_arsip.id_unit = tbl_unit.id_unit AND tbl_arsip.id_bon = tbl_bon.id_bon AND tbl_unit.nama_unit = 'Cutpack' AND order_product LIKE '%".$search."%'
    GROUP by tbl_arsip.id_unit, tbl_arsip.id_bon");
    while($row = mysqli_fetch_assoc($query)){
      ?>
      <tr>
        <td><?php echo $cnt;?>.</td>
        <td><?php echo $row['order_product'];?></td>
        <td><?php echo $row['total'];?></td>
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
  </head>
  <body>
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>
  <script src="../dist/js/demo.js"></script>
  <script src="../plugins/moment/moment.min.js"></script>
  </body>
</html>

