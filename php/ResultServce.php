<?php
	if(!empty($_POST['chk_info'])) {
    foreach($_POST['chk_info'] as $check) {
            echo $check;
	}
}
if(!empty($_POST['data_info'])) {
    foreach($_POST['data_info'] as $check) {
            echo $check;
        }
    }

?>