<?php
session_start();

//simple_html_dom.php is needed to access hisnetpage information
require_once('simple_html_dom.php');
// Connect with DB
require_once('Config_DB.php');
// Admin login
require_once('Admin_Config.php');
// Hisnet login
require_once('Hisnet_Validation.php');
// Get student grade
require_once('Stu_Grade.php');

$admin_login = new Admin();
$admin_login->Validation($_POST['his_id'],$_POST['his_pw']);
// $admin_login->Ins_Admin_Data();

$his_login = new HisnetValidation();
$his_login->validation($_POST['his_id'],$_POST['his_pw']);
$stu_grade = new Stu_Grade();
$stu_grade->requestGrade($_POST['his_id'],$_POST['his_pw']);


?>