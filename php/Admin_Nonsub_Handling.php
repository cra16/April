
<?php
// Session start 
session_start();

// Insert
if ($mode == 1)  
{      
	//DB connection
    include 'Config_DB.php';
        
    // Fetch the data.
    $field = $_POST['p_field'];
    $course = $_POST['p_course'];
    $area = $_POST['p_area'];
    $name = $_POST['p_name'];


    // Chech if it already exists.
    $rep = 0;	//repetition 약자
    $rep = "SELECT * FROM nonsubject WHERE field = '$field' AND course = '$course' AND area = '$area' AND name = '$name'";
      
    // Insert the data.   
    if($rep != 0){                            
    	mysql_query("INSERT INTO `nonsubject`(field, course, area, name) VALUES ('$field','$course','$area','$name')");   
    }     
    else {
  		echo "Same data exists! " . $link->error;
	}	        
}

// Remove
if ($mode == -1)
{      
	//DB connection
    include 'Config_DB.php';

    // Fetch the data.
    $field = $_POST['p_field'];
    $course = $_POST['p_course'];
    $area = $_POST['p_area'];
    $name = $_POST['p_name'];

    // Remove the data.                                  
    mysql_query("DELETE FROM nonsubject WHERE field = '$field' course = '$course' area = '$area' name = '$name'");                

    // Chech if it is deleted successfully.
    $del = 0;
    $del = "SELECT * FROM nonsubject WHERE field = '$field' AND course = '$course' AND area = '$area' AND name = '$name'";
    if($del != 0){
    	echo "Deletion failed! " . $link->error;
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
header("Location: Admin_Page.php");    
exit();
 
?>