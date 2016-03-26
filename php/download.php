<?php
  session_start();
  // Connect with DB
  require_once("Config_DB.php");
  $db = new DB_Control();
  $link = $db->DBC();

  Header("Content-type: application/vnd.ms-excel");
  Header("Content-type: charset=utf-8");
  Header("Content-Disposition: attachment; filename=".date("Y-m-d").".xls");
  Header("Content-Description: PHP5 Generated Data");
  Header("Pragma: no-cache");
  Header("Expires: 0");


  $qry = "SELECT * FROM `application`, `student` WHERE `application`.`his_id` = `student`.`id`";
  $result = mysqli_query($link,$qry);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <table border='1' cellpadding='2' cellspacing='5'>
      <thead>
        <th>이름</th>
        <th>지원서 번호</th>
        <th>인증 제도</th>
        <th>인증 항목</th>
        <th>비교과 과정</th>
        <th>현장체험학습</th>
        <th>상태</th>
      </thead>
      <tbody>
      <?php 

        while($data = mysqli_fetch_array($result)){

        echo "<tr>";    

        echo "<td>".$data['name']."</td>";
        echo "<td>".$data['serial_num']."</td>";
        echo "<td>".$data['kind']."</td>";
        echo "<td>".$data['area']."</td>";

        echo "<td>";

        $non_sub = explode("/",$data['non_sub']);
        $year = explode("/",$data['year']);      
                                                 
        $count_index = count($non_sub)-1;
     
        for($t=0;$t<$count_index;$t++){
          $index[$t] = $year[$t];    
        }

        for($t=0;$t<count($non_sub)-1;$t++){
          
          echo $non_sub[$t+1].": ";

          for($s=0;$s<intval($index[$t]);$s++){
             echo $year[$s+$count_index]."년 ";
          }
          
          echo "<br>";

          $count_index = $count_index+intval($index[$t]);
        }
        echo "</td>";
        echo "<td>";
        $active_array = array();
        $active_array = explode("/",$data['active']);
        foreach($active_array as $item){
          echo $item."<br>";
        }
        echo "</td>";

        echo "<td>".$data['status']."</td>";


        echo "</tr>";    
      }
      ?>
      </tbody>
    </table>

  </body>
</html>