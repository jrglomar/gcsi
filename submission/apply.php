<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GCSI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
<?php include('includes/sidebar.php');?>
  
<?php include('includes/topHeader.php');?>
  <div class="content">
    

  <div class="content-wrapper">

  
  <div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><b>PUP</b> Clearance</a>
  </div>

    <div class="card">
        <div class="card-body register-card-body">
        <p class="login-box-msg">Fill up the form</p>

        <form action="functions/studentvalidation.php" method="post">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Student Number" name="a_studNo">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="First Name" name="a_fName">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Middle name" name="a_mName">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Last Name" name="a_lName">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="date" class="form-control" placeholder="Birthday" name="a_bDay">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
                <select id="sex" name="a_sex" class="form-control"> 
                    <option value="" disabled selected>Sex</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
                <select id="status" name="a_civilStatus" class="form-control"> 
                    <option value="" disabled selected>Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Others">Others</option>
                </select>
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="City" name="a_addCity">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Province" name="a_addProvince">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Postal" name="a_addPostal">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
                <select id="course" name="a_course" class="form-control"> 
                    <option value="" disabled selected>Course</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSBA">BSBA</option>
                    <option value="BBTE">BBTE</option>
                </select>
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
                <select id="course" name="a_status" class="form-control"> 
                    <option value="" disabled selected>Status</option>
                    <option value="graduated">Graduated</option>
                    <option value="returnee">Returnee</option>
                    <option value="enrolled">Currently Enrolled</option>
                </select>
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Year Graduated" name="a_yearGraduated">
            <div class="input-group-append">
                <div class="input-group-text">
                </div>
            </div>
            </div>

        
            <div class="row">
            <div class="col-8">
                <h6></h6>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            </div>
            </div>
                <?php if (isset($_SESSION['failed'])): ?>
                <div class="alert alert-danger alert-dismissible">
                            <?php
                            echo $_SESSION['failed'];
                            unset($_SESSION['failed']); 
                            ?>
                </div>
                <?php endif ?>
            
        <div>
            <p> <p>
        </div>
        </form>
    </div>
</div>

<?php if (isset($_SESSION['failed'])): ?>
        <div class="alert alert-danger alert-dismissible">
                    <?php
                    echo $_SESSION['failed'];
                    unset($_SESSION['failed']); 
                    ?>
        </div>
    <?php endif ?>
<!-- ./wrapper -->

    
    



<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>



