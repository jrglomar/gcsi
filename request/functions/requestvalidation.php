<?php

include ('dbconnection.php');
session_start();

$last_id = $_SESSION['last_id'];
$result = mysqli_query($conn, "SELECT student_studNo FROM r_student WHERE student_id = '$last_id'") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

# random control number
$today = date('hi');
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
    clear_dateUpdated, clear_studAcadStatus)
    VALUES ('$clear_student', '$clear_ctrlNo', '$clear_reqType', '$clear_reqPurpose',0 ,DATE_ADD(CURDATE(),INTERVAL +2 MONTH), CURDATE(), null, '$type[0]')")
    or die(mysqli_error($conn));

    $last_clearance_id = mysqli_insert_id($conn);

    $enrolled_id = mysqli_query($conn, "SELECT office_id FROM s_office WHERE office_category = 1");
    $office_e_row = mysqli_fetch_all($enrolled_id);

    $graduate_id = mysqli_query($conn, "SELECT office_id FROM s_office");
    $office_g_row = mysqli_fetch_all($graduate_id);

    if($type[0] == "Graduated" || $type[0] == "Graduating" || $type[0] == "Honorable Dismissal"){
        foreach($office_g_row as $g_office){
            mysqli_query($conn, "INSERT INTO t_clearance_office (clearOff_clearance, clearOff_office, clearOff_dateUpdated, clearOff_dateCreated, clearLogs_type)
            VALUES ('$last_clearance_id', '$g_office[0]', null, CURDATE(), 'PENDING')")
            or die(mysqli_error($conn));
            header('location: ../index.php');
        }
    }
    else if($type[0]== "Currently Enrolled" || $type[0] == "Returnee"){
        foreach($office_e_row as $e_office){
            mysqli_query($conn, "INSERT INTO t_clearance_office (clearOff_clearance, clearOff_office, clearOff_dateUpdated, clearOff_dateCreated, clearLogs_type)
            VALUES ('$last_clearance_id', '$e_office[0]', null, CURDATE(), 'PENDING')")
            or die(mysqli_error($conn));
            header('location: ../index.php');
        }
    }
}


