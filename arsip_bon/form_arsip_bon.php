<?php
  session_start();
  include '../db/db.php';
  if(!isset($_SESSION['username'])) {
    header("Location: index.php");
  }

  if(isset($_GET['hal']))
   {

    	if(@$_GET['hal'] == "edit")
    	{
    		//tampilkan data yg akan di edit
	        $tampil = mysqli_query($connect, "SELECT
                tbl_arsip.*,
                tbl_unit.nama_unit,
                tbl_bon.order_product
                FROM
                  tbl_arsip, tbl_unit, tbl_bon
                WHERE
                tbl_arsip.id_unit = tbl_unit.id_unit
                AND tbl_arsip.id_bon = tbl_bon.id_bon 
	              AND tbl_arsip.id_arsip='$_GET[id]'");

	        $data = mysqli_fetch_array($tampil);
	        if($data){
            //jika data ditemukan maka akan ditampung ke variabel
            $vid_arsip = $data['id_arsip'];
	        	$vno_bon = $data['no_bon'];
	        	$vtanggal_kirim = $data['tanggal_kirim'];
	        	$vprihal = $data['prihal'];
	        	$vid_unit = $data['id_unit'];
	        	$vnama_unit = $data['nama_unit'];
	        	$vid_bon = $data ['id_bon'];
            $vorder_product = $data ['order_product'];
            $vgambar = $data['gambar'];
	        	$vjumlah = $data['jumlah'];
	        }
    	}
    }

  if(isset($_POST['submit'])) {

    if(@$_GET['hal'] == "edit"){
      $file=$_FILES['file']['name'];
      $folder='./gallery/';
      $hasil=mysqli_query($connect,"SELECT * from tbl_arsip where id_arsip='".$_GET['id']."'");
      $data=mysqli_fetch_assoc($hasil);
      $old_file=$data['gambar'];

      if($file!=""){
        $tmp_name=$_FILES['file']['tmp_name'];
        $tipe_file = $_FILES['file']['type'];
        $ekstensi_file = array('jpeg', 'jpg', 'png', 'pdf');
        $ekstensi = pathinfo($file, PATHINFO_EXTENSION);
        $ekstensi_ok = in_array($ekstensi, $ekstensi_file);
        if(!($ekstensi_ok)){
          echo "<script>alert('Oops! Ekstensi type file tidak diijinkan upload..');window.location='arsip_bon.php';</script>";
        }else{  
          unlink("gallery/$old_file");
          move_uploaded_file($tmp_name, $folder.$file);
          $ubah = mysqli_query($connect, "UPDATE tbl_arsip SET										    
          no_bon          = '$_POST[no_bon]',
          tanggal_kirim   = '$_POST[tanggal_kirim]',
          prihal          = '$_POST[prihal]',
          id_unit         = '$_POST[id_unit]',
          id_bon          = '$_POST[id_bon]',
          gambar          = '$file',									    
          jumlah          = '$_POST[jumlah]'
          WHERE id_arsip  = '$_GET[id]' ");

            if($ubah)
            {
            echo "<script>
            alert('Ubah Data Sukses');
            window.location= 'arsip_bon.php';</script>";
            }
            else
            {
            echo "<script>
            alert('Ubah Data GAGAL');
            window.location= 'arsip_bon.php';</script>";
            }
        }
      }else{
        $ubah = mysqli_query($connect, "UPDATE tbl_arsip SET										    
        no_bon          = '$_POST[no_bon]',
        tanggal_kirim   = '$_POST[tanggal_kirim]',
        prihal          = '$_POST[prihal]',
        id_unit         = '$_POST[id_unit]',
        id_bon          = '$_POST[id_bon]',								    
        jumlah          = '$_POST[jumlah]'
        WHERE id_arsip  = '$_GET[id]' ");

          if($ubah)
          {
          echo "<script>
          alert('Ubah Data Sukses');
          window.location= 'arsip_bon.php';</script>";
          }
          else
          {
          echo "<script>
          alert('Ubah Data GAGAL');
          window.location= 'arsip_bon.php';</script>";
          }
      }

    }else{
    
    $no_bon = $_POST['no_bon'];
		$tanggal_kirim = $_POST['tanggal_kirim'];
		$prihal = $_POST['prihal'];
		$id_unit = $_POST['id_unit'];
		$id_bon = $_POST['id_bon'];
    $jumlah = $_POST['jumlah'];
    $file=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $tipe_file = $_FILES['file']['type'];
    $ukuran	= $_FILES['file']['size'];
    $folder='./gallery/';
    $ekstensi_file = array('png', 'jpg', 'jpeg', 'pdf');
    $ekstensi = pathinfo($file, PATHINFO_EXTENSION);
    $ekstensi_ok = in_array($ekstensi, $ekstensi_file);
        if(!($ekstensi_ok)){
          echo "<script>alert('Oops! Ekstensi type file tidak diijinkan upload..');
          window.location='form_arsip_bon.php';</script>";
        }else{
          move_uploaded_file($tmp_name, $folder.$file);
          $simpan = mysqli_query($connect, "INSERT INTO tbl_arsip(
            no_bon, tanggal_kirim, prihal,
            id_unit, id_bon, gambar, jumlah)
            VALUES ('$no_bon','$tanggal_kirim',
            '$prihal','$id_unit',
            '$id_bon',
            '$file',
            '$jumlah'
            )	");

            if($simpan){
            echo "<script>alert('Simpan Data Sukses');
            window.location= 'arsip_bon.php';</script>"; 
            }else{
            echo "<script>
            alert('Simpan Data GAGAL!!');
            window.location= 'arsip_bon.php';</script>";
            } 
        }	
        }

      
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Khazbon | Form Arsip Bon</title>
  <link rel="shortcut icon" href="" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../datepicker/css/jquery-ui.css">
	<script src="../datepicker/js/jquery-1.12.4.js"></script>
	<script src="../datepicker/js/jquery-ui.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tanggal_kirim").datepicker({
				showAnim:'drop',
        dateFormat:'dd/mm/yy',
				autoclose: true,
				todayHighlight: true,
				showOtherMonths: true,
				selectOtherMonths: true,
				changeMonth: true,
				changeYear: true,
				minDate: new Date()
				});
			});
	</script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
      <img src="../image/admin.png" class="brand-image elevation-3">
      <span class="brand-text font-weight-light">Admin Khazbon</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="../dashboard.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li><li class="nav-item">
            <a href="../data_unit/data_unit.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Unit
              </p>
            </a>
          </li>
          <li class="nav-item has treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dice-d6 "></i>
              <p>
                Data Order Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../pengiriman_bon/pengiriman_bon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pecahan X</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pecahan Y</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Data Arsip Bon
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="arsip_bon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pecahan X</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pecahan Y</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Pecahan X
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../cemor/cemor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cemor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../cutpack/cutpack.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cutpack</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../khazcutas/khazcutas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khazcutas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../lini_a/lini_a.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lini A</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sortir/sortir.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sortir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../yetsak/yetsak.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yetsak</p>
                </a>
              </li>
            </ul>
          </li>   
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Pecahan Y
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cemor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cutpack</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khazcutas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lini A</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sortir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yetsak</p>
                </a>
              </li>
            </ul>
          </li>                 
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon far fa-arrow-alt-circle-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Arsip Bon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">Data Arsip Bon</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Data Arsip Bon</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="" method="POST" id="arsip" enctype="multipart/form-data">
            <!--
              <div class="form-group">
                <label for="id_arsip">ID Arsip</label><br>
                  <?php
                    $query = mysqli_query($connect, "SELECT MAX(id_arsip) as KodeTerbesar FROM tbl_arsip");
                    $data = mysqli_fetch_array($query);
                  ?>
                <input type="number" name="id_arsip" id="id_arsip" class="form-control" value="<?php
                  if(@$_GET['hal'] == "edit"){
                    echo @$vid_arsip;
                  }else{
                    echo $data['KodeTerbesar']+1;
                  }
                ?>" disabled required>
              </div>
              -->
              <div class="form-group">
                <label for="no_bon">No Bon</label><br>
                <input type="number" name="no_bon" id="no_bon" class="form-control" value="<?=@$vno_bon?>" required>
              </div>
              <div class="form-group">
              <label for="tanggal_kirim">Tanggal Kirim</label><br>
              <input type="text" id="tanggal_kirim" name="tanggal_kirim" class="form-control" value="<?=@$vtanggal_kirim?>"required>
              </div>
              <div class="form-group">
                <label for="prihal">Prihal</label><br>
                <input type="text" name="prihal" id="prihal" value="<?=@$vprihal?>" class="form-control" required>
              </div>
              <div class="form-group">
	  	          <label for="id_unit">Unit / Tujuan</label>
	  	            <select class="form-control" name="id_unit" id="id_unit">
	  		            <option value="<?=@$vid_unit?>" required><?=@$vnama_unit?></option>
	  		              <?php
                        $tampil = mysqli_query($connect, "SELECT * from tbl_unit order by nama_unit asc");
                          while($data = mysqli_fetch_array($tampil)){
                	          echo "<option value = '$data[id_unit]'>  $data[nama_unit] </option>  ";
                          }
                      ?>
	  	              </select> 	  	
  	          </div>   	
              <div class="form-group">
	  	          <label for="id_bon">Order Product</label>
	  	            <select class="form-control" name="id_bon" id="id_bon">
	  		            <option value="<?=@$vid_bon?>" required><?=@$vorder_product?></option>
	  		              <?php
                        $tampil = mysqli_query($connect, "SELECT * from tbl_bon order by order_product desc");
                          while($data = mysqli_fetch_array($tampil)){
                	          echo "<option value = '$data[id_bon]'>  $data[order_product] </option>";
                          }
                      ?>
	  	            </select>
  	          </div>
              <?php
              if(@$_GET['hal'] == "edit"){
                    ?>
                      <div class="form-group">
                        <label for="PilihFile">Pilih File</label><br>
                        <input type="file" name="file">
                      </div>
                      <div class="form-group">
                      <p>
                      Gambar saat ini :<br>
                      <img src="gallery/<?php echo @$vgambar;?>" height="100" width="100">
                      </p>
                      </div>
                    <?php
                  }else{
                    ?>
                    <div class="form-group">
                      <label for="PilihFile">Pilih File</label><br>
                      <input type="file" name="file">
              </div>
              <?php
                  }
              ?>
              
  	          <div class="form-group">
	  	          <label for="jumlah">Jumlah</label>
	  	            <input type="number" class="form-control"id="jumlah" name="jumlah" value="<?=@$vjumlah?>" required>
                  <p name="limit" id="limit" class="limit"></p>
  	          </div>
              <input type="submit" name ="submit" value="Submit" class="btn btn-block btn-primary">
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Khazanah Penyelesaian</strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
<script type="text/javascript">
let sisa = 0;
    $(document).change( function() {
      var arsip = $('#arsip').serialize();
      $.ajax({
        method:"POST",
        dataType:"JSON",
        url:"limit.php",
        data: arsip,
        success:function(data){
          console.log(data);
          sisa = data.sisa;
          $("#limit").html("Stok tersedia: "+sisa);
        }
      });
    });

    $('#jumlah').blur(function(){
      let val = $(this).val();
      if(val>sisa){
        alert("Jumlah lebih besar daripada sisa!");
        document.getElementById("jumlah").value="";
      }else{
        $('#arsip').submit();
      }
    });
  </script>
</html>