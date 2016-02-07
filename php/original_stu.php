<?php
class Stu_Grade{
  //hisnet id
  var $his_id = null;
  //hisnet pw
  var $his_pw = null;
  /**
   * @function requestGrade
   * hisnet???꾩껜?깆쟻?쇰줈 ?묎렐?댁꽌 ?꾩젣源뚯? ?섍컯??怨쇰ぉ?ㅼ쓽 
   * ?뺣낫瑜??삳뒗 function?대떎.
   **/
  function requestGrade($his_id, $his_pw) {
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
      curl_setopt ($ch, CURLOPT_REFERER, "http://hisnet.handong.edu/login/goMenu_eval.php?cleaninet=1&language=Korean");
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
    $table = $html->find('table[id=att_list]');
    foreach($table as $value)
    {
      $gradeTable = $html->find('table[id=att_list]',$i++);
      $j = 0;
      foreach($gradeTable->find('tr') as $value)
      {
        if($j++<2)
          continue;
        echo $value->children(1);
        echo $value->children(3);
        echo $value->children(4);
        echo $value->children(5).'<br>';
        echo $valu; 
      }
      echo '<br>';
    }
  }
  // requestGrade function End
}
// Stu_Grade class End

?>