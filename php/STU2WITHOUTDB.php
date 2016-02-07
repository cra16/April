<?php
session_start();

//simple_html_dom.php is needed to access hisnetpage information
require_once('simple_html_dom.php');
// Connect with DB
require_once('Config_DB.php');
// Hisnet login
require_once('Hisnet_Validation.php');
// Get student grade
require_once('Stu_Grade.php');
    

$his_login = new HisnetValidation();
$his_login->validation($_POST['his_id'],$_POST['his_pw']);
$stu_grade = new Stu_Grade();
$stu_grade->requestGrade($_POST['his_id'],$_POST['his_pw']);

$p = 0;
$condition = "SELECT * FROM subject ";

$check = mysqli_query($link,$condition);
$row_num = mysqli_num_rows($check);

echo 'row_num : '.$row_num ;
$re_name = array();
$re_credit = array();
$re_article = array();
$sum = array();

$t = 0;
while( $result = mysqli_fetch_array($check) ){
    $re_name[$t] = $result['sub_name'];
   	$re_credit[$t] = $result['credit'];
   	$re_article[$t] = $result['article'];
   	echo $re_name[$t].'<br/>';
   	$t++;
}

$w = 0;
$count = $_SESSION['stu_count'];
$sum = array_fill(0,$count,0);
while( $w < $count ) {
	$stu_course = $_SESSION['stu_course'][$w];

	for($t=0; $t < $row_num; $t++){
		if( eregi($stu_course, $re_name[$t]) == TRUE ){ // string comparison
			$field = $re_article[$t];
			$_SESSION[$stu_course]['article'] = $field;
			$sum[$field] += $re_credit[$t];
			echo 'sum';
		}	
	}
	$w++;
}

$_SESSION['sum'] = $sum;

echo 'result<br/>';
foreach( $sum as $sum ){
	if( $sum >0 ){
		echo $sum;
		echo '<br/>';
	}
}

?>