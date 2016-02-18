<?php
session_start();

//simple_html_dom.php is needed to access hisnetpage information
require_once('simple_html_dom.php');
// Connect with DB

// Admin login
require_once('Admin_Config.php');
// Student login
require_once('Stu_Config.php');

$admin_login = new Admin();
$admin_login->Validation($_POST['his_id'],$_POST['his_pw']);
// $admin_login->Ins_Admin_Data();

$stu_login = new Student();
$stu_login->validation($_POST['his_id'],$_POST['his_pw']);

?>