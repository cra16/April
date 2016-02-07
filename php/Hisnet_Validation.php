<?php
class HisnetValidation{
  //학번
  var $stu_id = null;
  //이름
  var $stu_name = null;
  //hisnet id
  var $his_id = null;
  //hisnet pw
  var $his_pw = null;
  /**
   * @function membercraHisValidation
   * @brief 생성자.히즈넷 아이디, 히즈넷 비밀번호를 프로퍼티에 넣기
   **/
  function validation($his_id, $his_pw){
    // Examine hisnet_id and hisnet_pw
    if (empty($his_id)|| empty($his_pw))
    $errflag = true;
    //If there are no input information, redirect back to the login form
    if($errflag) {
    session_write_close();
    header("location:Main.php");
    exit();
  }   
    $this->his_id = $his_id;
    $this->his_pw = $his_pw;
    // Request to HISNET
    $this->requestHisnet();
  }

  /**
   * @function requestHisnet
   * @brief 히즈넷 서버에 로그인 요청을 보낸다. fsockopen() 사용
   * 먼저 쿠키를 받아낸다.
   * 주의할 점은 /login.asp 와 /goMenu_eval.asp 그리고 /main.asp 3곳에 요청을 다 보내야 한다. (2012년 1월 31일 기준.)
   * 만약 히즈넷의 로그인 알고리즘이 바뀌면 이 부분을 수정해 주어야 한다.
   **/
  function requestHisnet() {
    // Create temorary file for save cookies
    $ckfile = tempnam ("/tmp", "CURLCOOKIE");
    // POST data form for login
    $dataopost = array (
      "Language" => "Korean",
      "f_name" => "",
      "id" => $this->his_id,
      "part" => "",
      "password" => $this->his_pw,
      "x" => 0,
      "y" => 0,
      );
    // Access hisnet basic information
      // 1st request
      $ch = curl_init ("http://hisnet.handong.edu/login/_login.php");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_POST, true);
      curl_setopt ($ch, CURLOPT_POSTFIELDS, $dataopost);
      curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/login/login.php");
      $result = curl_exec ($ch);
      curl_close ($ch);

      // 2nd request
      $ch = curl_init ("http://hisnet.handong.edu/login/goMenu_eval.php?cleaninet=1&language=Korean");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/login/_login.php");
      $result = curl_exec ($ch);
      curl_close ($ch);
      $dataopost = array (
        "memo" => "",
        );

      // 3rd request
      $ch = curl_init ("http://hisnet.handong.edu/main.php");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_POST, true);
      curl_setopt ($ch, CURLOPT_POSTFIELDS, $dataopost);
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/login/goMenu_eval.php?cleaninet=1&language=Korean");
      $result = curl_exec ($ch);
      curl_close($ch);

      // 4th request
      $ch = curl_init ("http://hisnet.handong.edu/for_student/main.php");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/main.php");

      $ch = curl_init ("http://hisnet.handong.edu/haksa/hakjuk/HHAK110M.php");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/for_student/main.php");
      $result = curl_exec ($ch);
      $result = iconv("EUC-KR","UTF-8", $result);
      curl_close($ch);
     
    // Hisnet login access success
    $html = str_get_html($result);  
    if(is_object($html->find('.tblcationTitlecls', 1)))
    {
      $table = $html->find('.tblcationTitlecls', 1)->parent()->parent();
      $td_id = $table->children(1)->children(1)->innertext;
      $temp_id = preg_replace("/[^0-9]*/s", "", $td_id);
      $stu_id = substr($temp_id,1,9);
      $stu_name = $html->find('strong', 0)->innertext;

      if($this->loginCheck($this->his_id)!=0){
        header("location:Main.php");
      }
      else{
        $id = $_POST['his_id'];
        $_SESSION['USER_NAME'] = $id;
        session_write_close();
        echo "login success";
      }
    }

    // Hisnet login access fail
    else
      header("location:Main.php");
    // Delete temp file after using
    unlink($ckfile);
  }
  function loginCheck($comp_id){
    return strcmp($this->his_id,$comp_id);
  }
}
?>