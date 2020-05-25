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
    <div class="col-md-12" style="padding: 50px">
        <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Request Document</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Document</label>
                    <select class="form-control" id="sel_document">
                      <option> TRANSCRIPT OF RECORDS </option>
                      <option> DIPLOMA </option>
                      <option> CERTIFIED TRUE COPY </option>
                      <option> HONORABLE DISMISSAL </option>
                      <option> CERTIFICATE OF GRADUATION </option>
                      <option> OTHERS </option>
                    </select>
                    
                  </div>
                  <input type="text" id = "txt_document" placeholder ="Please Specify" class="form-control" name="" >
                  <p id="msg_document">Document is required</p>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Purpose</label>
                    <textarea id="txt_purpose" rows="5" class="form-control"></textarea>
                    <p id="msg_purpose">Purpose is required</p>
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="btn_submit"  class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
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
              console.log(result)
                if(result.statusCode == 201){
                  alert("Something went wrong")
                }
                else if(result.statusCode == 202){
                  alert("You already have a request")
                }
                 else if(result.statusCode == 200){
                  alert("Request has been successfully sent.")
                  location.href = "dashboard.php"
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
</script>
