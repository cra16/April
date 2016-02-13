<?php
// Session start 
session_start();
    
// Connect with DB
require_once("Config_DB.php");
$db = new DB_Control();
$link = $db->DBC();
    
// Fetch the data.
$field = $_POST['field'];            // 학회 or 캠프
$course = $_POST['course'];    // 학부
$area = $_POST['area'];          // 항목 ex) 인문사회
$name = $_POST['name'];       // 이름
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
    $sql = 'SELECT * FROM nonsubject';
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
    // Check if it already exists.
    $sql  = "SELECT * FROM nonsubject WHERE field = '$field' AND course = '$course' AND area = '$area' AND name = '$name'";
    $result = $link->query($sql);
    if ($result->num_rows > 0){
        echo -1; //중복된 결과
    }
    else{        // Insert the data.   
        $sql = "INSERT INTO `nonsubject`(field, course, area, name) VALUES ('$field','$course','$area','$name')";
        if ($link->query($sql) === TRUE) {
        echo 1; //입력 성공
        } else {
        echo -1; //입력 실패
        }
    }            
}
      

// Remove
if($mode == -1){
    // Remove the data.                                  
    $sql = "DELETE FROM nonsubject WHERE field = '$field' AND course = '$course' AND area = '$area' AND name = '$name'";                

    if ($link->query($sql) === TRUE) {
    echo 1;
    } else {
    echo -1;
    }
}

/*
// Update
if ($mode == 2)
{      
    //DB connection
    include 'Config_DB.php';

    // Fetch the old data.
    $o_field = $_POST['p_field'];
    $o_course = $_POST['p_course'];
    $o_area = $_POST['p_area'];
    $o_name = $_POST['p_name'];
          
    // Update the data.                                  
    mysql_query("UPDATE nonsubject SET field = '$field' course = '$course' area = '$area' name = '$name'
                 WHERE some_column=some_value ");                
}

*/


$link->close();
// header("Location: Admin_Page.php");    
// exit();

?>
