<?php
include ('dbconnection.php');
session_start();


$a_studNo = $_POST['a_studNo'];
$a_fName = $_POST['a_fName'];
$a_mName = $_POST['a_mName'];
$a_lName = $_POST['a_lName'];
$a_bDay = $_POST['a_bDay'];
$a_sex = $_POST['a_sex'];
$a_civilStatus = $_POST['a_civilStatus'];
$a_addCity = $_POST['a_addCity'];
$a_addProvince = $_POST['a_addProvince'];
$a_addPostal = $_POST['a_addPostal'];
$a_course = $_POST['a_course'];
$a_status = $_POST['a_status'];
$a_yearGraduated = $_POST['a_yearGraduated'].'-01-01';  


if(empty($a_studNo)){
    $_SESSION['failed'] = "Please enter student number";
    header('location: ../apply.php');
}
else if(empty($a_fName)){
    $_SESSION['failed'] = "Please enter your first name.";
    header('location: ../apply.php');
}
else if(empty($a_lName)){
    $_SESSION['failed'] = "Please enter your last name.";
    header('location: ../apply.php');
}
else if(empty($a_bDay)){
    $_SESSION['failed'] = "Please enter your birthday.";
    header('location: ../apply.php');
}
else if(empty($a_sex)){
    $_SESSION['failed'] = "Please select your sex";
    header('location: ../apply.php');
}
else if(empty($a_civilStatus)){
    $_SESSION['failed'] = "Please select your civil status.";
    header('location: ../apply.php');
}
else if(empty($a_addCity)){
    $_SESSION['failed'] = "Please enter city.";
    header('location: ../apply.php');
}
else if(empty($a_addPostal)){
    $_SESSION['failed'] = "Please enter postal.";
    header('location: ../apply.php');
}
else if(empty($a_course)){
    $_SESSION['failed'] = "Please select your course.";
    header('location: ../apply.php');
}
else if(empty($a_status)){
    $_SESSION['failed'] = "Please select your status.";
    header('location: ../apply.php');
}

else{

    mysqli_query($conn, "INSERT INTO r_student (student_studNo, student_fName, student_mName, student_lName, student_bDay, student_sex, 
    student_civilStatus, student_addCity, student_addProvince, student_addPostal, student_yearGraduated, student_dateUpdated, student_type) 
    VALUES ('$a_studNo', '$a_fName', '$a_mName', '$a_lName', '$a_bDay', '$a_sex', '$a_civilStatus',
    '$a_addCity', '$a_addProvince', '$a_addPostal', '$a_yearGraduated', null, '$a_status')") 
    or die(mysqli_error($conn));

    $_SESSION['last_id'] = mysqli_insert_id($conn);

    header('location: ../request.php');
}