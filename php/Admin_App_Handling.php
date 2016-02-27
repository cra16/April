<?php
// Session start 
session_start();
    
// Connect with DB 
require_once("Config_DB.php");  
$db = new DB_Control();
$link = $db->DBC();   
    
// Fetch the data.
$stat = $_POST['stat'];             // 상태 (지원 - 0, 심사중 - 1, 완료 - 2)
$req = $_POST['req'];      // CRUD MODE
$mode = $_POST['mode'];    
$serial_num = $_POST['serial_num'];
$his_id = $_POST['his_id'];

// Read(default)
 // Fetch application db
if($mode == 0){
    // FIXME: 서버로 올릴경우 변경 필수!
    $db_name  = 'april';
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = '111111';

    // connect to the database
    $dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);

    // send application db + student db.
    
    $sql = 'SELECT student.name, application.serial_num, application.kind, application.area, application.non_sub, application.status
                FROM application
                INNER JOIN student
                ON application.his_id = student.id';

        /*
        $sql = 'SELECT student.name, application.serial_num, application.kind, application.area, application.non_sub, application.status
                FROM application
                INNER JOIN student
                ON application.his_id = student.stu_id';
                */
    
    
    // use prepared statements, even if not strictly required is good practice
    $stmt = $dbh->prepare( $sql );
    // execute the query
    $stmt->execute();
    // fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );
   
    $json = json_encode( $result );
    //close Database
    $dbh = null;
    // echo the json string
    echo $json;
}


// Update 
if ($mode = 1)    // if edited "status" is "examining" (심사중 - 1), then let it be able to edit the status.
{      
    //DB connection
    include 'Config_DB.php';

    // Update the data.                                  
    $sql = "UPDATE application SET serial_num= '$serial_num', status = '$stat' 
            WHERE his_id = '$his_id'";                

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