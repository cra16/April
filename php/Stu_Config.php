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
      $this->Req_Stu_Login($this->stu_id, $this->stu_pw);
   }

   // Confirm User request -> Student mode
   function Req_Stu_Login($stu_id, $stu_pw) {
      // Connect with DB 
      require_once("Config_DB.php");  
      $db = new DB_Control();
      $link = $db->DBC();   

      $sql = "SELECT * FROM student WHERE id = '$this->stu_id'";
      $result = mysqli_query($link, $sql);
      $check = mysqli_fetch_array($result);

      ###복호화###
      $key = KEY;
         $s_vector_iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB), MCRYPT_RAND);
         $password = mysqli_real_escape_string($link,$check['pw']);
         $de_str = pack("H*", $password); //hex로 변환한 ascii를 binary로 변환
         $decoding = mcrypt_decrypt(MCRYPT_3DES, $key, $de_str, MCRYPT_MODE_ECB, $s_vector_iv); 

      if ( mysqli_num_rows($result) > 0) {
         if( eregi("$decoding", "$stu_pw") ){
            $_SESSION['USER_NAME'] = $stu_id;
               $_SESSION['USER_PW'] = $stu_pw;
             header("location:Service.php");
             echo "totally success";
             exit();   
         }
      } 
      else {
         echo "first time or no data";
            $_SESSION['USER_NAME'] = $stu_id;
            $_SESSION['USER_PW'] = $stu_pw;
         header("location:agreement.php");
         exit();
      }
      //DB Close
      mysqli_close($link);
   }
}
?>