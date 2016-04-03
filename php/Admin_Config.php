<?php
class Admin{
 
	//manager id
	var $admin_id = null;
	//manager pw
	var $admin_pw = null;

	// If there is invalid access
	function Validation($admin_id, $admin_pw){
		$errflag = false;
		if (empty($admin_id)|| empty($admin_pw))
		$errflag = true;
    		//If there are no input information, redirect back to the login form
		if($errflag) {
    		header("location:Main.php");
		}

		$this->admin_id = $admin_id;
		$this->admin_pw = $admin_pw;
	// Request to Admin Login
		$this->Req_Admin_Login();
	}

	// Confirm User request -> Admin mode
	function Req_Admin_Login() {
		// Connect with DB
		require_once("Config_DB.php");
		$db = new DB_Control();
		$link = $db->DBC();
		
		$sql = "SELECT * FROM manager WHERE id = '$this->admin_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$key = KEY;
		         $s_vector_iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB), MCRYPT_RAND);
		         $password = mysqli_real_escape_string($link,$row['password']);
		         $de_str = pack("H*", $password); //hex로 변환한 ascii를 binary로 변환
		         $decoding = mcrypt_decrypt(MCRYPT_3DES, $key, $de_str, MCRYPT_MODE_ECB, $s_vector_iv); 


	    	   	if($this->admin_pw==$decoding){
	   				mysqli_close($link);
	    			header("location:Admin_Page.php");
	    			exit();
	    		}
		} 
		else {
			echo "";
		}
		//DB Close
		mysqli_close($link);
	}

	// Admin Data Insert
	function Ins_Admin_Data(){
		// Connect with DB
		require_once("Config_DB.php");
		$db = new DB_Control();
		$link = $db->DBC();

		$admin_id = 'admin';
		$admin_pw = 'password';
		//Encryption for security
		$key = KEY;
		$s_vector_iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB), MCRYPT_RAND);
		$en_str = mcrypt_encrypt(MCRYPT_3DES, $key, $admin_pw, MCRYPT_MODE_ECB, $s_vector_iv);
		$encryption = bin2hex($en_str); 
		//Insert Data-manager table
		$sql = "INSERT INTO manager VALUES ('$admin_id', '$encryption')";
			if ($link->query($sql) === TRUE) {
				// Print part - If you want result, remove '//'
				// echo "New record created successfully";
			} else {
				// Print part - If you want result, remove '//'
				// echo "Error: " . $sql . "<br>" . $link->error;
			}

		$link->close();
	}
}
?>
