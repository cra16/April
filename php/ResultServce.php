<?php

// Connect with DB
require_once("Config_DB.php");
$db = new DB_Control();
$link = $db->DBC();

print_r($_POST);
echo "er5yeyry";
echo "11111111";
echo $_POST['foundation'];
echo "2222222";
foreach($_POST['chk_info'] as $check) {
    echo $check;
    }
    echo "333333";
foreach($_POST['data_info'] as $check) {
    echo $check;
    }

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
    foreach($_POST['chk_info'] as $check) {
    $nonsubject = $nonsubject."/".$non_name[$check];
    $nonarea = $nonarea."/".$non_area[$check];
    }
    

}
// check third field and save result
if(!empty($_POST['data_info'])) {
    foreach($_POST['data_info'] as $check) {
            echo $check;
        }
    }

$id = "yyll9933";//$_SESSION['USER_NAME'];
$foundation = $_POST['foundation'];

//check the information

// $qry = "SELECT * FROM `application` WHERE his_id = '$id'";
// $data = $link->query($qry);
// echo "+++++++".$data['kind']."-------"; 
// if ($data&&$data["kind"] === $foundation) {
//     if($data["status"]!="지원")
//     {
//         echo "Your status is already checking";
//         //header("Location: ../php/Service.php");
//     }
//     $sql = "UPDATE `application` SET his_id = $id, non_sub = $nonsubject, kind = $foundation, area = $nonarea, status = '지원' WHERE id = $id AND kind = $foundation";       
// } else {
   $sql = "INSERT INTO `application`(his_id,non_sub,kind,area,status) VALUES('$id','$nonsubject','$foundation','$nonarea','지원' )";
//}

//making insert query 

//query execute and return value
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
    //header("Location: ../php/Service.php");
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();



?>