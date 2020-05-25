<?php
session_start();
	$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "gcsi";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	$document=$_POST['document'];
	$purpose=$_POST['purpose'];


	$sql = "INSERT INTO `t_clearance` values( null, '{$_SESSION['studID']}', '$document', '$purpose' ,0,DATE_ADD(CURDATE(),INTERVAL +2 MONTH),CURDATE(),null)";
	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		mysqli_close($conn);
		 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
  		$sql = "INSERT INTO `t_clearance_office_logs` values( null, 28, '$last_id', 0 ,CURDATE(),null)";
  		if (mysqli_query($conn, $sql)) {
  			echo json_encode(array("statusCode"=>200));
  		}
  		else {
		echo json_encode(array("statusCode"=>2011));
		}
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>