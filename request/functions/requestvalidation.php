<?php

include ('dbconnection.php');
session_start();

$last_id = $_SESSION['last_id'];
$result = mysqli_query($conn, "SELECT student_studNo FROM r_student WHERE student_id = '$last_id'") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

# random control number
$today = date('hi');
echo $today;
$rand = rand(1000, 9999);
$random = ($rand);
$clear_ctrlNo = $today. $random. substr($row['student_studNo'], 2, 2). substr($row['student_studNo'], 5, 5);


$clear_student = $_SESSION['last_id'];
$clear_reqType = $_POST['clear_reqType'];
$clear_reqPurpose = $_POST['clear_reqPurpose'];

$student_type = mysqli_query($conn, "SELECT student_type FROM r_student WHERE student_id = '$last_id'") or die(mysqli_error($conn));
$type = mysqli_fetch_row($student_type);

if(empty($clear_reqPurpose)){
    $_SESSION['failed'] = "Purpose is required!";
    header('location: ../request.php');
}
else{
    mysqli_query($conn, "INSERT INTO t_clearance (clear_student, clear_ctrlNo, clear_reqType, clear_reqPurpose, clear_status, clear_dueDate, clear_dateFiled, 
    clear_dateUpdated)
    VALUES ('$clear_student', '$clear_ctrlNo', '$clear_reqType', '$clear_reqPurpose',0 ,DATE_ADD(CURDATE(),INTERVAL +2 MONTH), CURDATE(), null)")
    or die(mysqli_error($conn));

    $last_clearance_id = mysqli_insert_id($conn);

    $max_office_id = mysqli_query($conn, "SELECT MAX(office_id) FROM s_office");
    $max_row = mysqli_fetch_row($max_office_id);

    $min_office_id = mysqli_query($conn, "SELECT MIN(office_id) FROM s_office");
    $min_row = mysqli_fetch_row($min_office_id);

    if($type[0] == "Graduated"){
        for($x=$min_row[0]; $x<=$max_row[0]; $x++){
            mysqli_query($conn, "INSERT INTO t_clearance_office (clearOff_clearance, clearOff_office, clearOff_dateUpdated, clearOff_dateCreated, clearLogs_type)
            VALUES ('$last_clearance_id', $x, null, CURDATE(), 'PENDING')")
            or die(mysqli_error($conn));
            echo "Successfully tag as graduated";
        }
    }
    else if($type[0] == "Currently Enrolled"){
        $min = intval($min_row[0])+1;
        $max = intval($max_row[0])-1;
        for($x=$min_row[0]+1; $x<=$max_row[0]-1; $x++){
            mysqli_query($conn, "INSERT INTO t_clearance_office (clearOff_clearance, clearOff_office, clearOff_dateUpdated, clearOff_dateCreated, clearLogs_type)
            VALUES ('$last_clearance_id', $x, null, CURDATE(), 'PENDING')")
            or die(mysqli_error($conn));
            echo "Successfully tag as returnee";
        }
    }
}


