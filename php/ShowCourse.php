<?php

	session_start();

	require('Stu_Grade.php');

	$course = $_POST['Course'];
	$foundation = $_POST['foundation'];
	$stu_Grade = Stu_Grade::getInstance(unserialize($_SESSION['Object']));
	

	
	$number_foundation = [3,2,2,2];
	$number_study = [3,2,3];
	$count_cert=0;
	$foundation_cert = ["인문사회","이공학","ICT","ICT심화"];
	$study_cert = ["인문사회1","이공학","융합"];
	if(!strcmp($foundation,"기초 역량"))
	{
		$temp_array = $foundation_cert;
		$temp_number = $number_foundation;		
	}
	else
	{
		$temp_array = $study_cert;
		$temp_number = $number_study;
	}
	$i=0;
	foreach($temp_array as $temp)
	{
		if(!strcmp($course,$temp))
		{
			$count_cert = $temp_number[$i];
			if(!strcmp($foundation,"기초 역량") && !strcmp($course,"인문사회"))
			{
				$course_data = ["인문사회","고전강독","세계관"];
				$course_count = [6,2,4];
			}
			else if(!strcmp($foundation,"기초 역량") && !strcmp($course,"이공학"))
			{
				$course_data = ["수학과학","소통-융복합"];
				$course_count = [9,3];
			}
			else if(!strcmp($foundation,"기초 역량") && !strcmp($course,"ICT"))
			{
				$course_data = ["ICT융합기초","소통-융복합"];
				$course_count = [9,3];
			}
			else if(!strcmp($foundation,"기초 역량") && !strcmp($course,"ICT심화"))
			{
				$course_data = ["ICT융합기초","소통-융복합"];
				$course_count = [15,3];	
			}
			else if(!strcmp($foundation,"기초 학문") && !strcmp($course,"인문사회"))
			{
				$course_data = ["인문사회","고전강독","세계관"];
				$course_count = [12,2,4];
			}
			else if(!strcmp($foundation,"기초 학문") && !strcmp($course,"이공학"))
			{
				$course_data = ["ICT융합기초","소통-융복합"];
				$course_count = [15,3];
			}
			else if(!strcmp($foundation,"기초 학문") && !strcmp($course,"융합"))
			{
				$course_data = ["인문사회","수학과학","소통-융복합"];
				$course_count = [9,6,3];
			}
		}
		$i++;
	}
                                             
                                              
                                               

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
                          else
                            echo "비교과";

                        ?>
                        </center></th>
                    <th class="col-xs-6">
                        <center>과목</center>
                    </th>
                     </tr>

                </thead>
                <tbody>
                
                  
                    
                      <?php
                        if($i==0)
                        {	 
		                	for($k=0; $k<$count_cert; $k++)
		                	{
		                		echo "<tr>";
	                        	echo "<td>";
	                        	echo $course_data[$k];
	                        	echo "</td>";
	                    		echo "<td>";
	                                   	$stu_Grade->getSubject($k,$course,$foundation);
	                             
	                        	echo "</td>";
	                        	echo "</tr>";
                        	}
                        } 
                        else if($i==1)
                        {
                         	echo "<td></td>";
                    		echo "<td>";
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