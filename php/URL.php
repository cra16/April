<?php
$array = array();
array_push($array,$_POST['user_id']);
array_push($array,$_POST['dataNo']);
echo $array[0];
?>