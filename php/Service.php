<!DOCTYPE html>
<?php
session_start();

//simple_html_dom.php is needed to access hisnetpage information
require_once('simple_html_dom.php');

include('Stu_Grade.php');
$stu_grade = Stu_Grade::getInstance(0);

//simple_html_dom.php is needed to access hisnetpage information

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ServicePage</title>
     <link rel="stylesheet" type="text/css" href="../css/semantic.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/Service.css" rel="stylesheet">


 

</head>

<body ng-app="MyApp">

<nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <a class="navbar-brand" href="temp.php" id = "home_button">April</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
    <li><a href="#" class="foundation-competence">기초 역량</a></li>
    <li><a href="#" class="foundation-study">기초 학문</a></li>
    <li><a href="#" class="introduction">소개 페이지</a></li>
      <li><a href="logout.php">Logout</a></li>
      <li><a href="#" onclick="help()">Help</a></li>
    </ul>
  </div>
  </div>
</nav>  





 

        <!-- Sidebar -->
       

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="button_class">
                      
                      <?php 
                          $course_array = ["인문사회","이공학","ICT","ICT심화","인문사회","이공학","융합"];
                          $div_array =["competence_btn","study_btn"];
                          $class_array= ["btn btn-default sub-foundation-competence","btn btn-default sub-foundation-study"];
                          for ($i=0; $i <7 ; $i++) { 
                            # code...
                            ?><div class="<?php if($i<4){echo $div_array[0];} else{echo $div_array[1];}?>">
                                <button type="button" class="<?php if($i<4){echo $class_array[0];} else{echo $class_array[1];}?>">
                                 <span class="" aria-hidden="true"><?=$course_array[$i]?></span>    
                                </button>
                              </div>
                            <?php
                         }
                          
                          ?>
                        
                      </div>
                    </div>

                        <div class="introduce">
                            <div class="row api-lifecycle-components-description">
                              <center><h1>소개 페이지</h1> </center>
                              <div class="row col-md-6 col-xs-12">
                                  
                                  
                                  <div class="col-md-6">
                                    <img src="../img/college-graduation.png">
                                    <h3 class="api-lifecycle-component-name">Build + Test</h3>
                                    <p>Create and send any HTTP request using the awesome Postman Builder. Requests are saved to history and can be replayed later.</p>
                                  </div>
                                  
                                
                                  
                                
                                  
                                  <div class="col-md-6">
                                    <img src="../img/college-graduation.png">
                                    <h3 class="api-lifecycle-component-name">Organize</h3>
                                    <p>Manage and organize your APIs with Postman Collections for a more efficient testing and integration workflow.</p>
                                  </div>
                                  
                                
                                  
                                
                              </div>
                              <div class="row col-md-6 col-xs-12">
                              
                                
                              
                                
                                <div class="col-md-6">
                                  <img src="../img/college-graduation.png">
                                  <h3 class="api-lifecycle-component-name">Document</h3>
                                  <p>Automatically generate API documentation based on your Collections, and publish them to standard formats.</p>
                                </div>
                                
                              
                                
                              
                                
                                <div class="col-md-6">
                                  <img src="../img/college-graduation.png">
                                  <h3 class="api-lifecycle-component-name">Collaborate</h3>
                                  <p>Connect your team and your API tool-chain with team sync, API Library and access control.</p>
                                </div>
                                
                              
                              </div>
                            </div>

                          </div>
                        <?php $stu_grade->requestGrade($_SESSION['USER_NAME'], $_SESSION['USER_PW']); ?>
                        </div>
                        
                </div>
                    <br><br><br>
                    <form id="form_data" action="ResultServce.php" method="POST">
                       <center><div style="padding-top:30px"><h2>특성-<span id = "course_name">인문사회</span></h2></div></center>
                       <div class="total_table input_data" >

                       <?php
                        for($i=0; $i<3; $i++)
                       {?>

                        <div class="table_layer">
                          <?php 
                            if($i==0)
                            {
                                  echo "<b class='name'>교과과정</b>";

                            }
                            else if($i==1)
                            {
                               echo "<b class='name'>비교과과정</b>";
                               ?>

                                  
                                  
                     
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
                                            
                                            <th class="col-xs-6"  id="<?php if($i==1) echo "course"?>">
                                                <center>
                                                <?php 
                                                  if($i==0){
                                                    echo "교과";
                                                  }
                                                  else if($i==1)
                                                    echo "비교과";
                                                  else
                                                    echo "현장참여과정";

                                                ?>
                                                </center></th>
                                                <?php if($i!=1)
                                                {?>
                                                   <th class="col-xs-6">
                                                
                                                


                                                    <center>과목</center>
                                                   
                                                </th>
                                                 <?php }?>
                                             </tr>

                                        </thead>
                                        <tbody>
                                          
                      <?php
                        if($i==0)
                        {  
                          $course_data = ["인문사회","고전강독","세계관"];
                          for($k=0; $k<3; $k++)
                          {
                              echo "<tr>";
                                echo "<td class='subject_td'>";
                                echo $course_data[$k];
                                echo "</td>";
                                 echo "<td class='subject_td'>";
                                          $stu_grade->getSubject($k,"인문사회","기초 역량");
                                   
                                echo "</td>";
                                echo "</tr>";
                              }
                        } 
                        else if($i==1)
                        {
                          ?>
                            
                          <?php
                          
                          echo "<td class='nonsubject_id'>";
                            $stu_grade->getNonSubject(1,"인문사회");
                          echo "</td>";
                        }
                        else if($i==2)
                        { echo "<td></td>";
                        echo "<td>";
                        for($j=0; $j<3; $j++)
                            {
                              echo "<input type='checkbox'  name='data_info[]' value='$j'>학술 평가 과목 출력 할 부분<br>";
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
                       </div>
                       <input type="hidden" id ="foundation" value="">
                       <input type='button' class='btn' id ="submit_btn" value="submit">
                      </form>
                   </div>
               </div>
        <!-- /#page-content-wrapper -->




    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="../js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../js/Service.js"></script>
         <script src="../js/dropdown_menu.js"></script>
        
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    </script>
    <?php
      $_SESSION['Object']=serialize($stu_grade);
        
      ?>



</body>

</html>
