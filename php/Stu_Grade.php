<?php  

class Stu_Grade{ 
  //hisnet id 
  var $his_id = null; 
  //hisnet pw 

  var $his_pw = null; 
  var $stu_course = array(); 
  var $stu_credit = null; 
  var $stu_grade = null; 
  var $link = null;
  var $db =null;
  /**
   * @function requestGrade
   * hisnet의 전체성적으로 접근해서 현제까지 수강한 과목들의 
   * 정보와 합계를 얻는 function이다.
   **/
  function __construct()
  {
 

    require_once('Config_DB.php');
    $this->db = new DB_Control();
    $this->link = $this->db->DBC();
  }
  function requestGrade($his_id, $his_pw){
    $this->his_id = $his_id;
    $this->his_pw = $his_pw;
    
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
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/login/goMenu_eval. php?cleaninet=1&language=Korean"); 
      $result = curl_exec ($ch); 
      curl_close($ch); 
 
      // 4th request
      // -access main page
      $ch = curl_init ("http://hisnet.handong.edu/for_student/main.php"); 
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile); 
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/main.php"); 
      // -access '?숈쟻' 
      $ch = curl_init ("http://hisnet.handong.edu/haksa/hakjuk/HHAK110M.php"); 
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile); 
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/for_student/main.php"); 
      // -access -'?깆쟻' 
      $ch = curl_init ("http://hisnet.handong.edu/haksa/record/HREC110M.php"); 
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
      curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile); 
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/haksa/hakjuk/HHAK110M.php"); 
      $result = curl_exec ($ch); 
      $result = iconv("EUC-KR","UTF-8", $result); 
      curl_close($ch); 
     
    // Hisnet login access success
    $html = str_get_html($result); 
    $i = 2;
    $j = 0;
    $w = 0;
    $stu_count = 0;
    $table = $html->find('table[id=att_list]');

    foreach($table as $value){
      $gradeTable = $html->find('table[id=att_list]',$i++);
      $j = 0;
      if($gradeTable == null){
        break;
      }
      foreach($gradeTable->find('tr') as $value)
      {
        if($j++<2)
          continue;
        $stu_course[$w] = (string)$value->children(1)->plaintext;
        $stu_grade[$w] = $value->children(5);
        $w++;        
      }
      $stu_count = $w;
    }

    $p = 0;
    $condition = "SELECT * FROM subject ";

    $check = mysqli_query($this->link,$condition);
    
    $row_num = mysqli_num_rows($check);

    $re_name = array();
    $re_credit = array();
    $re_article = array();
    $sum = array();

    $t = 0;
    while( $result = mysqli_fetch_array($check) ){
        $re_name[$t] = $result['sub_name'];
        $re_credit[$t] = $result['credit'];
        $re_article[$t] = $result['article'];
        $t++;
    }

    $w = 0;
    $sum = array_fill(0,$stu_count,0);
    while( $w < $stu_count ) {
      $course = $stu_course[$w];

      for($t=0; $t < $row_num; $t++){
        if( strcmp($course, $re_name[$t]) == TRUE ){ // string comparison
          echo $course." ";
          $field = $re_article[$t];
          $sum[$field]['credit'] += $re_credit[$t];
          $sum[$field]['index'] = $field;
          echo 'sum'.'<br/>';
        } 
      }
      $w++;
    }

    foreach( $sum as $sum ){
      if( $sum >0 ){
        echo $sum['index']." : ".$sum['credit'];
        echo '<br/>';
      }
    }

  }
  // requestGrade function End

}
// Stu_Grade class End

?>