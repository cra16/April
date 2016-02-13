<?php

	session_start();

	require('Stu_Grade.php');

	$course = $_POST['Course'];
	$foundation = $_POST['foundation'];
	$stu_Grade = Stu_Grade::getInstance(unserialize($_SESSION['Object']));


	$stu_Grade->getSubject(1,$course,$foundation);