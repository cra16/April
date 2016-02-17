<?php

// Connect with DB
require_once('Config_DB.php');

// check second field and save result
if(!empty($_POST['chk_info'])) {
	$chk = array();
	$i = 0
	$nonsubject

	foreach($_POST['chk_info'] as $check) {

            $chk[$i] =  $check;
			$i++;
	}

	$qry = "SELECT * FROM nonsubject";
    $result = mysqli_query($link,$qry);
    while($temp = mysqli_fetch_assoc($result)){
    	for($j=0;$j<$i;$j++){
    		if($temp['index']==$chk[$i]){
    			$nonsubject = $nonsubject."".$temp['course']."".$temp['name'];
    		}
    	}
    }
    
    

}
// check third field and save result
if(!empty($_POST['data_info'])) {
    foreach($_POST['data_info'] as $check) {
            echo $check;
        }
    }

$id = $_SESSION['USER_NAME'];


//check the information
if(!empty($_POST['field']))

//making insert query 
if($_POST['field']== 0){
	$qry = "UPDATE student SET nonsubject = '$nonsubject' submit = '1' WHERE id = '$id'";
}
else{
	$qry = "UPDATE student SET nonsubject = '$nonsubject' submit2 = '1' WHERE id = '$id'";
}

//query execute and return value
if ($link->query($qry) === TRUE) {
    echo "New record created successfully";
    header("Location: ../php-views/app_preview.php");
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();



?>