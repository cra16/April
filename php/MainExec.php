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

$a=0;
for($a=0; $a < $_SESSION['stu_count']; $a++){
	$course[$a] = (string)$_SESSION['stu_course'][$a];
}

$p = 0;
$condition = "SELECT * FROM subject WHERE ";
for( $p=0; $p < $_SESSION['stu_count'] ; $p++){ 
	if( $p == ($_SESSION['stu_count']-1) ){ //last node
		$condition = $condition."sub_name = '" .$course[$p]."'";
	}else{
		$condition = $condition."sub_name = '".$course[$p]."' OR ";
	}
}
echo '<br>'.$condition.'<br/>';	

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

// $w = 0;
// $count = $_SESSION['stu_count'];
// $sum = array_fill(0,$count,0);
// while( $w < $count ) {
// 	$stu_course = $_SESSION['stu_course'][$w];

// 	// for($t=0; $t < $row_num; $t++){
// 	// 	if( eregi($stu_course, $re_name[$t]) == TRUE ){
// 	// 		$field = $re_article[$t];
// 	// 		$_SESSION[$stu_course]['article'] = $field;
// 	// 		$sum[$field] += $re_credit[$t];
// 	// 		echo 'sum';
// 	// 	}	
// 	// }
// $at=0;
// 	for($t=0; $t < $row_num; $t++){
// 		$field = $re_article[$t];
// 		switch ($field) {
// 			case 'ICT융합기초':
// 				$at = 0;
// 				break;
// 			case '수학과학':
// 				$at = 1;
// 				break;
// 			case '인문사회':
// 				$at = 2;
// 				break;
// 			case '세계관':
// 				$at = 3;
// 				break;
// 			case '고전강독 ':
// 				$at = 4;
// 				break;
// 			case '소통-융복합':
// 				$at = 5;
// 				break;
// 		}
// 		$sum[$at] += $re_credit[$t];
// 		echo 'sum';
// 	}

// 	$w++;
// }

// $_SESSION['sum'] = $sum;

// echo 'result<br/>';
// foreach( $sum as $sum ){
// 	if( $sum >0 ){
// 		echo $sum;
// 		echo '<br/>';
// 	}
// }

?>