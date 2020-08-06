<?php
include '../db/db.php';

  if(isset($_POST['search'])){
    $cnt = 1;
    $search = $_POST['search'];
    $query = mysqli_query($connect, "SELECT * FROM tbl_bon WHERE order_product LIKE '%".$search."%'");
    while($row = mysqli_fetch_assoc($query)){
      ?>
      <tr>
        <td><?php echo $cnt;?>.</td>
        <td><?php echo $row['order_product'];?></td>
        <td class="text-middle py-0 align-middle">
        <div class="btn-group btn-group-sm">
          <a href="pengiriman_bon.php?&hal=edit&id=<?php echo $row['id_bon']?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
          <a href="pengiriman_bon.php?id=<?php echo $row['id_bon']?>&del=delete" onClick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

