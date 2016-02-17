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
    <?php 
                            if($i==0)
                            {
                                  echo "<b class='name'>교과과정</b>";

                            }
                            else if($i==1)
                            {
                               echo "<b class='name'>비교과과정</b>";
                               ?>

                                  
                                   <div class="dropdown" id="dropdown_id">
                                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="true">
                                        Dropdown
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" id ="dropdownmenu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation"><a name="글로벌리더십" class="uni_data" role="menuitem" tabindex="-1" href="#">글로벌리더십학부</a></li>
                                        <li role="presentation"><a name="창의융합교육원" class="uni_data" tabindex="-1" href="#">창의융합교육원</a></li>
                                        <li role="presentation"><a name="글로벌에디슨아카데미" class="uni_data" tabindex="-1" href="#">Global Edison Academy</a></li>
                                        <li role="presentation"><a name="국제어문" class="uni_data" tabindex="-1" href="#">국제어문학부</a></li>
                                        <li role="presentation"><a name="언론정보" class="uni_data" tabindex="-1" href="#">언론정보문화학부</a></li>
                                        <li role="presentation"><a name="경영경제" class="uni_data" tabindex="-1" href="#">경영경제학부</a></li>
                                        <li role="presentation"><a name="상담복지" class="uni_data" tabindex="-1" href="#">상담심리사회복지학부</a></li>
                                        <li role="presentation"><a name="법학부" class="uni_data" tabindex="-1" href="#">법학부</a></li>
                                        <li role="presentation"><a name="생명과학" class="uni_data" tabindex="-1" href="#">생명과학부</a></li>
                                        <li role="presentation"><a name="전산전자" class="uni_data" tabindex="-1" href="#">전산전자공학부</a></li>
                                        <li role="presentation"><a name="산업정보디자인" class="uni_data" tabindex="-1" href="#">산업정보디자인학부</a></li>
                                        <li role="presentation"><a name="기계제어" class="uni_data" tabindex="-1" href="#">기계제어공학부</a></li>
                                        <li role="presentation"><a name="공간환경시스템" class="uni_data" tabindex="-1" href="#">공간환경시스템공학부</a></li>
                                        <li role="presentation"><a name="콘텐츠융합디자인" class="uni_data" tabindex="-1" href="#">콘텐츠융합디자인학부</a></li>
                                        <li role="presentation"><a name="산업교육" class="uni_data" tabindex="-1" href="#">산업교육학부</a></li>
                                      </ul>
                                  </div>
                                  
                     
                                <?php
                            }
                            else
                            {
                              echo "<b class='name'>현장참여과정</b>";
                            }
                            ?>
   <div id="rt_table" class="bootstrap-table">
      <div class="fixed-table-container">
        <div class="fixed-table-header" style="height: 40px; border-bottom-width: 0px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221); margin-right:0px;"></div>
        <div class="fixed-table-body">
            <table id="table" class="table table-hover" style="margin-top: -40px;">
                 <thead>
                    <tr>
                    
                    <th class="col-xs-6" id="<?php if($i==1) echo "course"?>">
                        <center>
                        <?php 
                          if($i==0){
                            echo "교과";
                          }
                          else if($i==1)
                            echo "";
                          else if($i==2)
                          	echo "현장체험";

                        ?>
                        </center></th>
                    <?php
                     if($i!=1)
                                              {
                                                ?>
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
                    <?php }?>
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
                         
                      		echo "<td>";
                      		$stu_Grade->getNonSubject(1,$course); 
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