<?php
  session_start();
  include '../db/db.php';
  if(!isset($_SESSION['username'])) {
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Khazbon | Data Lini A</title>
  <link rel="shortcut icon" href="" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="text" id="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link">
      <img src="../image/admin.png"  class="brand-image elevation-3">
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
            <a href="data_unit.php" class="nav-link">
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
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Data Arsip Bon
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../arsip_bon/arsip_bon.php" class="nav-link">
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Pecahan X
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../cemor/cemor.php" class="nav-link ">
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
                <a href="lini_a.php" class="nav-link active">
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
            <h1>Data Lini A</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Data Pecahan X</li>
              <li class="breadcrumb-item active">Data Lini A</li>
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
          
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-message">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Order Product</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody id = "tampil">
                  <?php
					          $sql=mysqli_query($connect,"SELECT SUM(jumlah) AS total, tbl_unit.nama_unit, tbl_bon.order_product FROM tbl_arsip 
                    INNER JOIN tbl_unit ON tbl_unit.id_unit = tbl_arsip.id_unit
                    INNER JOIN tbl_bon ON tbl_bon.id_bon = tbl_arsip.id_bon
                    WHERE tbl_arsip.id_unit = tbl_unit.id_unit AND tbl_arsip.id_bon = tbl_bon.id_bon AND tbl_unit.nama_unit = 'Lini A'
                    GROUP by tbl_arsip.id_unit, tbl_arsip.id_bon");
					          $cnt=1;
						        while($row=mysqli_fetch_assoc($sql))
							    {
				          ?>
                    <tr>
                      <td><?php echo $cnt;?>.</td>
                      <td><?php echo $row['order_product'];?></td>
                      <td><?php echo $row['total'];?></td>
                    </tr>
                    <?php 
					          	$cnt=$cnt+1;
					          }?>
                  </tbody>
                </table>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</body>
<script type="text/javascript">
    $(document).ready( function() {
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#tampil').html(data);
          }
        });
      });
    });
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": false,
      "lengthChange": false,
      "paging": true,
    });
  });
  </script>
</html>