<?php
// Session start 
session_start();
    
// Connect with DB
require_once("Config_DB.php");
$db = new DB_Control();
$link = $db->DBC();
    
// Fetch the data.
$article = $_POST['article'];            // 학회 or 캠프
$credit = $_POST['credit'];    // 학부
$sub_name = $_POST['sub_name'];       // 이름
$mode = $_POST['mode'];      // CRUD MODE

// Read(default)
if($mode == 0){
    // FIXME: 서버로 올릴경우 변경 필수!
    $db_name  = 'april';
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = 'gksehdeo357';

    // connect to the database
    $dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
    
   
    $sql = 'SELECT * FROM subject';
    // use prepared statements, even if not strictly required is good practice
    $stmt = $dbh->prepare( $sql );
    // execute the query
    $stmt->execute();
    // fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );
    // convert to json
    $json = json_encode( $result );
    //close Database
    $dbh = null;
    // echo the json string
    echo $json;
}

// Insert
if($mode == 1){
    $sql  = "SELECT * FROM subject WHERE sub_name = '$sub_name' AND article = '$article' AND credit = '$credit'";

    $result = $link->query($sql);
    if ($result->num_rows > 0){
        echo -1; //중복된 결과
    }
    else{        // Insert the data.   
      
        $sql = "INSERT INTO `subject`(sub_name, article, credit) VALUES ('$sub_name','$article','$credit')";
        
        if ($link->query($sql) === TRUE) {
        echo 1; //입력 성공
        } else {
        echo 0; //입력 실패
        }
    }            
}
      
// Remove
if($mode == -1){
  
    $sql = "DELETE FROM subject WHERE sub_name = '$sub_name' AND article = '$article' AND credit = '$credit'";                

    if ($link->query($sql) === TRUE) {
    echo 1;
    } else {
    echo -1;
    }
}



$link->close();
// header("Location: Admin_Page.php");    
// exit();

?>
