<?php
include('includes/config.php');
session_start();
?>
<!DOCTYPE html>
<?php

if(isset($_POST['submit'])){
    $office_name = $_POST['office_name'];
    $office_location = $_POST['office_location'];
    $office_inCharge = $_POST['sel_inCharge'];
    $currentDateTime = date('Y-m-d H:i:s');
    $connection = mysqli_connect('localhost','root','','GCSI');
    
    
    
    
    $query = "insert into s_office(office_id, office_name, office_location, office_inCharge, office_dateUpdated, office_dateCreated, office_isDeleted)";
    $query .= "values ('28','$office_name','$office_location','$office_inCharge','$currentDateTime','$currentDateTime','0')";
    
    $result = mysqli_query($connection, $query);
        
    if(!$result){
        die('Query Failed' . mysqli_error($connection));
    }
    else{
        //run javascript for success window please :< HAHAHAHHAHAHAH
    }

}

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
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
<body class="hold-transition sidebar-mini sidebar">

<div class="wrapper">

  
<?php include('includes/sidebar.php');?>
  
<?php include('includes/topHeader.php');?>
<div class="content">
     <!-- Navbar -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add office</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Office Registration</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!--form-->
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Office</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="office_name">Office Name</label>
                    <input type="text" class="form-control" name="office_name" placeholder="Office Name">
                  </div>
                  <div class="form-group">
                    <label for="office_location">Office Location</label>
                    <input type="text" class="form-control" name="office_location" placeholder="Office Location">
                  </div>
                  <div class="form-group">
                    <label for="officer_in_charge">Office in charge</label>
                    <select class="form-control" id="sel_inCharge" name="sel_inCharge">
                      <?php 
                        $sql="SELECT USER_ID,CONCAT(student_fName, ' ',student_lName) AS NAME FROM R_STUDENT A INNER JOIN R_USER B ON A.STUDENT_USERACCOUNT = B.USER_ID";
                        $query=$dbh->prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        
                        foreach($results as $result)
                        { 
                      ?>
                        <option value="<?php echo htmlentities($result->USER_ID);  ?>"><?php echo htmlentities($result->NAME);  ?></option>
                         <?php } ?>
                    </select>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 <center>
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </center>            
                </div>
              </form>
            </div>
            <!-- /.card -->
        <!--/.form-->
      </div><!-- /.container-fluid -->

    </div>
     </div>
    <!-- /.content-header -->
    </div>
    </div>
    </div>
    </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

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
