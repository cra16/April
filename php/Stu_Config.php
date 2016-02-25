<?php

class Student{
 
	//student id
	var $stu_id = null;
	//student pw
	var $stu_pw = null;
	//db connection
	var $db = null;

	// If there is invalid access
	function Validation($stu_id, $stu_pw){
		// Examine admin_id and admin_pw
		$errflag = false;
		if (empty($stu_id)|| empty($stu_pw))
			$errflag = true;
    	//If there are no input information, redirect back to the login form
		if($errflag) {
    		header("location:Main.php");
		}

		$this->stu_id = $stu_id;
		$this->stu_pw = $stu_pw;

		// Request to Student Login
		$this->Req_Stu_Login();
	}

	// Confirm User request -> Student mode
	function Req_Stu_Login() {
		// Connect with DB 
		require_once("Config_DB.php");  
		$db = new DB_Control();
		$link = $db->DBC();   
		$sql = "SELECT * FROM student WHERE id = '$this->stu_id' AND pw = '$this->stu_pw'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
 			$_SESSION['USER_NAME'] = $this->stu_id;
      			$_SESSION['USER_PW'] = $this->stu_pw;
    			header("location:Service.php");
    			exit();
    			echo "success";
		} 
		else {
			echo "first time";
		   	$_SESSION['USER_NAME'] = $this->stu_id;
      		$_SESSION['USER_PW'] = $this->stu_pw;
			header("location:agreement.php");
			exit();
		}
		//DB Close
		mysqli_close($db->link);
	}
}
?>
