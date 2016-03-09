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
    $check_sub = TRUE;
    $check_nonsub = FALSE;
    $check_active = FALSE;
    
//check second field and save result
if(!empty($_POST['chk_info'])&&count($_POST['index_array'])==count($_POST['chk_info'])){
 
     //call the nonsubject list from db
    $condition = "SELECT * FROM camp UNION SELECT * FROM academy ";

    $check = mysqli_query($link,$condition);
    $row_num = mysqli_num_rows($check);

    $non_course = array();
    $non_name = array();

    $count = 0;
    while( $result = mysqli_fetch_array($check) ){
        $non_course[$count] = $result['course'];
        $non_name[$count] = $result['name'];
        $count++;
    }

    //making nonsubject information
    $nonsubject = "";
    $nonyear = "";

    $check_num = count($_POST['chk_info']);

    foreach($_POST['chk_info'] as $check){
    $nonsubject = $nonsubject."/".$non_name[$check];
    }
    foreach($_POST['index_array']as $index){
    $nonyear = $nonyear."/".$index;
    }
    foreach($_POST['year_array'] as $year){
    $nonyear = $nonyear."/".$year;   
    }

    $check_nonsub = TRUE;
}else if(!empty($_POST['chk_info'])){
    echo "<script language='javascript'>location.replace('Service.php'); alert('입력정보가 부족합니다'); </script>"; 
    exit();
}
// check third field and save result
if(!empty($_POST['data_info'])) {

    $active = "";
    foreach($_POST['data_info'] as $third) {
          $active = $active."/"."현장체험".$third;
        }
    
    $check_active = TRUE;
    }
if($check_sub&&$check_nonsub&&$check_active){
    //insert information

    $qry = "SELECT * FROM `application` WHERE his_id = '$id' AND kind = '$foundation' AND area = '$area'";
    $datas = $link->query($qry);

    if($datas){

        foreach($datas as $data){

            if ($data) {
                if($data["status"]!="지원"){
                    echo "<script language='javascript'>location.replace('Service.php'); alert('제출서류가 이미 확인 되었습니다'); </script>";
                }
            
                $sql = "UPDATE `application` SET non_sub = '$nonsubject' ,year = '$nonyear',area = '$area',active = '$active' WHERE his_id = '$id' AND kind = '$foundation'AND area = '$area'";       
       
            }
            else{
              $sql = "INSERT INTO `application`(his_id,non_sub,kind,area,status,year,active) VALUES('$id','$nonsubject','$foundation','$area','지원','$nonyear','$active')";  
            }                               
        }
    }
    else{
        echo "fail..".$link->error;
    }

    //query execute and return value
    if ($link->query($sql) === TRUE) {
        echo "<script language='javascript'>location.replace('Service.php'); alert('저장되었습니다'); </script>";
        //header("Location: ../php/Service.php");
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $link->close();
}
else{
    $message = "";

    if(!$check_sub){
        $message = $message."인증을 받기위한 학점이 부족합니다.\n";
    }
    if(!$check_nonsub){
        $message = $message."인증을 받기위한 학회(캠프)활동이 부족합니다.\n";
    }
    if(!$check_active){
        $message = $message."인증을 받기위한 현장체험활동이 부족합니다.";
    }

    echo "<script> location.replace('Service.php'); alert('지원조건을 만족하지 못합니다'); </script> "; 

    exit();
}

?>