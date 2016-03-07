<?php

// Connect with DB
require_once("Config_DB.php");
$db = new DB_Control();
$link = $db->DBC();

print_r($_POST);

// check second field and save result
if(!empty($_POST['chk_info'])) {
    $chk = array();
    $i = 0;


    foreach($_POST['chk_info'] as $check) {

            $chk[$i] =  $check;
            $i++;
    }

    $condition = "SELECT * FROM camp UNION SELECT * FROM academy ";

    $check = mysqli_query($link,$condition);
    $row_num = mysqli_num_rows($check);

    $non_course = array();
    $non_name = array();

    $non_area = array();

    $count = 0;
    while( $result = mysqli_fetch_array($check) ){
        $non_course[$count] = $result['course'];
        $non_name[$count] = $result['name'];
        $non_area[$count] = $result['area'];
        $count++;
    }

    $nonsubject = "";
    $nonarea = "";
    $nonyear = "";

    foreach($_POST['chk_info'] as $check){
    $nonsubject = $nonsubject."/".$non_name[$check];
    $nonarea = $nonarea."/".$non_area[$check];
    }
    foreach($_POST['year_array'] as $year){
    $nonyear = $nonyear."/".$year;   
    }
    $nonyear = "$nonyear";
    

}
// check third field and save result
if(!empty($_POST['data_info'])) {
    foreach($_POST['data_info'] as $check) {
            echo $check;
        }
    }

$id = $_SESSION['USER_NAME'];
$foundation = $_POST['foundation'];

//check the information

$qry = "SELECT * FROM `application` WHERE his_id = '$id' AND kind = '$foundation'";
$datas = $link->query($qry);

if($datas){
    echo "asdfasdf";
    foreach($datas as $data){

        if ($data) {
            if($data["status"]!="지원"){
                echo "Your status is already checking";
                header("Location: ../php/Service.php");
            }
        
            $sql = "UPDATE `application` SET his_id = '$id', non_sub = '$nonsubject', kind = '$foundation', area = '$nonarea', status = '지원',year = '$nonyear' WHERE his_id = '$id' AND kind = '$foundation'";       
   
        }                               
    }
    $sql = "INSERT INTO `application`(his_id,non_sub,kind,area,status,year) VALUES('$id','$nonsubject','$foundation','$nonarea','지원','$nonyear')";
    echo "123";
}
else{
    echo "fail..".$link->error;
}


//query execute and return value
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
    //header("Location: ../php/Service.php");
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

?>