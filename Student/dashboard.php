<?php
include('includes/config.php');
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  
<?php include('includes/sidebar.php');?>
  
<?php include('includes/topHeader.php');?>
  <div class="content">
    

  <div class="content-wrapper">

    
    <!-- /.row -->
        <div class="row" style="padding: 50px">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DOCUMENT REQUESTED</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th hidden>ID</th>
                      <th>DOCUMENT</th>
                      <th>STATUS</th>
                      <th>OFFICE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $sql="SELECT CLEAR_ID,CLEAR_REQTYPE,CLEAR_STATUS,OFFICE_NAME FROM T_CLEARANCE A 
                          INNER JOIN T_CLEARANCE_OFFICE_LOGS B ON A.CLEAR_ID = B.CLEARLOGS_CLEARANCE
                          INNER JOIN S_OFFICE C ON B.CLEARLOGS_OFFICE = C.OFFICE_ID
                          WHERE CLEAR_STUDENT =  '{$_SESSION['studID']}'";
                        $query=$dbh->prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        
                        foreach($results as $result)
                        { 
                      ?>
                    <tr>
                      
                      <td hidden><?php echo htmlentities($result->CLEAR_ID); ?></td>
                      <td><?php echo htmlentities($result->CLEAR_REQTYPE); ?></td>
                      <td><span class="tag tag-success"><?php 
                      if($result->CLEAR_STATUS == 0){
                        echo "PROCESSING";
                      } 
                      if($result->CLEAR_STATUS == 1){
                        echo "PENDING";
                      } 
                       if($result->CLEAR_STATUS == 3){
                        echo "FAILED";
                      }  ?>
                        
                      </span></td>
                      <td><?php echo htmlentities($result->OFFICE_NAME); ?></td>
                    </tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>

</div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>



<script type="text/javascript">
  $("#txt_document").hide()
  $("#msg_purpose").hide()
  $("#msg_document").hide()

  $("#btn_submit").click(function(){
   
     $document = "";
    if($("#sel_document").val() == "OTHERS"){
      $document = $("#txt_document").val()
      if($document != ""){
        $("#msg_document").hide()
        request()
      }
      else{
        $("#msg_document").show()
        $("#msg_purpose").hide()
      }
    }
    else{
       $document = $("#sel_document").val()
       request()
    }
  })

  function request(){
    if($("#txt_purpose").val() != "" ){
      $("#msg_purpose").hide()
      $.ajax({
            url:"queries/documentRequest.php", 
            type: "post", //request type,
            dataType: 'json',
            data: {
              document: $document,
              purpose: $("#txt_purpose").val()
            },
            success:function(result){
                if(result.statusCode == 201){
                  alert("Something went wrong")
                }
           }
      });
    }
    else{
      $("#msg_purpose").show()
    }
  }


  $("#sel_document").on('change',function(){
    if( $("#sel_document").val() == "OTHERS"){
      $("#txt_document").show()
    }
    else{
      $("#txt_document").hide()
    }
  })

  // trya()
  // function trya(){
  //   alert('asd')
  //   alert('<?php echo  $_SESSION['studID'] ?>')
  // }
</script>
