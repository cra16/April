<?php

	session_start();

	require('Stu_Grade.php');

	$course = $_POST['Course'];
	$stu_Grade = Stu_Grade::getInstance(unserialize($_SESSION['Object']));


	$stu_Grade->getSubject(1,$course,"기초학문");