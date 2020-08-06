<?php
include '../db/db.php';
  if(isset($_POST['id_unit'])){    
    $id_unit = $_POST['id_unit'];

    if(isset($_POST['id_bon'])){
      $id_bon = $_POST['id_bon'];

    $sql = mysqli_query($connect,"SELECT SUM(jumlah) AS total, tbl_unit.nama_unit, tbl_bon.order_product FROM tbl_arsip 
    INNER JOIN tbl_unit ON tbl_unit.id_unit = tbl_arsip.id_unit
    INNER JOIN tbl_bon ON tbl_bon.id_bon = tbl_arsip.id_bon
    WHERE tbl_arsip.id_unit = tbl_unit.id_unit AND tbl_arsip.id_bon = tbl_bon.id_bon AND tbl_unit.id_unit = '$id_unit' 
    AND tbl_bon.id_bon = '$id_bon'
    GROUP by tbl_arsip.id_unit, tbl_arsip.id_bon");

    if($sql->num_rows>0){
      while($data = mysqli_fetch_array($sql)){
        $sisa = 100000-$data['total'];
      }
    }else{
      $sisa = 100000;
    }
    
  $res = [
    'sisa'=>$sisa,    
  ];
  echo json_encode($res);
    }
  }
?>