<?php

session_start();

//simple_html_dom.php is needed to access hisnetpage information
require_once('simple_html_dom.php');

include('Stu_Grade.php');

$stu_grade = Stu_Grade::getInstance(0);

// Connect with DB
require_once("Config_DB.php");
$db = new DB_Control();
$link = $db->DBC();



//checking login
if(!$_SESSION['USER_NAME']){
    header("Location: ../php/Main.php");
}

$id = $_SESSION['USER_NAME'];
$foundation = $_POST['foundation'];
$area = $_POST['area'];

 //checking submit permission variable
    $check_sub = $stu_grade->requestGrade($_SESSION['USER_NAME'], $_SESSION['USER_PW'], $foundation, $area);
    $check_nonsub = FALSE;
    $check_active = FALSE;
    //$check_sub = TRUE;

//check second field and save result
if(!empty($_POST['chk_info'])&&count($_POST['index_array'])==count($_POST['chk_info'])&&count($_POST['year_array'])>=count($_POST['chk_info'])){
    $check_nonsub = TRUE;}
// check third field
if(!empty($_POST['data_info'])) {    
    $check_active = TRUE;
    }
if($check_sub&&$check_nonsub&&$check_active){
     exit();
}
else{
    $excep_number = 0;

    if(!$check_sub){
        $excep_number += 1;       
    }
    if(!$check_nonsub){
        $excep_number += 10;   
    }
    if(!$check_active){
        $excep_number += 100;
    }
    echo $excep_number;
    throw new Exception();

}

?>