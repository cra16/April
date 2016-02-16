<?php

	session_start();

	require_once('Stu_Grade.php');
	require_once('Total_Subject.php');
	$course = $_POST['Course'];
	$foundation = $_POST['foundation'];
	$stu_Grade = Stu_Grade::getInstance(unserialize($_SESSION['Object']));
    $total_subject = new Total_Subject($foundation,$course);          
                                               

?>

 <?php
for($i=0; $i<3; $i++)
{?>
<div class="col-lg-4 table_layer">
   <div id="rt_table" class="bootstrap-table">
      <div class="fixed-table-container">
        <div class="fixed-table-header" style="height: 40px; border-bottom-width: 0px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); margin-right:0px;"></div>
        <div class="fixed-table-body">
            <table id="table" class="table table-hover" style="margin-top: -40px;">
                 <thead>
                    <tr>
                    
                    <th class="col-xs-6">
                        <center>
                        <?php 
                          if($i==0){
                            echo "교과";
                          }
                          else if($i==1)
                            echo "비교과";
                          else if($i==2)
                          	echo "현장체험";

                        ?>
                        </center></th>
                    <th class="col-xs-6">
                       <center>
	                       <?php 
	                          if($i==0){
	                            echo "과목";
	                          }
	                          else if($i==1)
	                            echo "항목";
	                          else if($i==2)
	                            echo "항목";

	                        ?>
                        </center>
                    </th>
                     </tr>

                </thead>
                <tbody>
                
                  
                    
                      <?php
                        if($i==0)
                        {	 

		                	for($k=0; $k<$total_subject->count_cert; $k++)
		                	{
		                		echo "<tr>";
	                        	echo "<td class='subject_td'>";
	                        	echo $total_subject->course_data[$k];
	                        	echo "</td>";
	                    		echo "<td class='subject_td'>";
	                                   	$stu_Grade->getSubject($k,$course,$foundation);
	                             
	                        	echo "</td>";
	                        	echo "</tr>";
                        	}
                        } 
                        else if($i==1)
                        {
                         	echo "<td></td>";
                    		echo "<td>";
                    		$stu_Grade->getNonSubject(); 
                    		echo "</td>";
                        }
                        else if($i==2)
                        {	echo "<td></td>";
                    		echo "<td>";
                    		for($j=0; $j<3; $j++)
                          	{
                            	echo "<input type='checkbox' name='data_info[]' value='$j'>학술 평가 과목 출력 할 부분<br>";
                         	}
                        	echo "</td>";
                           
                        }
                      ?>
                   
                  
                  

                </tbody>
            </table>
        </div>
    </div>
  </div>
 </div>
 <?php
}?>