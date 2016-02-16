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
      <li><a href="logout.php">Logout</a></li>
      <li><a href="#" onclick="help()">Help</a></li>
    </ul>
  </div>
  </div>
</nav>  






    <div id="wrapper" ng-controller="table_event">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="#" class="foundation-competence">기초 역량</a>
                </li>
                <li>
                    <a href="#" class="foundation-study">기초 학문</a>
                </li>
                <li>
                    <a href="#" class="introduction">소개 페이지</a>
                </li>
                <li>
                    <a href="#">Service 4</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      
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
                        <h1>ServicePage</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <?php $stu_grade->requestGrade($_SESSION['USER_NAME'], $_SESSION['USER_PW']); ?>
                        </div>
                        
                </div>
                    <br><br><br>
                    <form id="form_data" action="ResultServce.php" method="POST">
                       <span id = "course_name">인문사회</span>
                       <div class="col-lg-12 total_table input_data" >

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
                              <td>
                              <div>
                                <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                  year
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                              </div>
                              <div class="dropdown" style="float:left">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                  전공
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                </ul>
                              </div>
                              </div>
                            </td>
                          <?php
                          
                          echo "<td>";
                          echo "<br>";
                          $stu_grade->getNonSubject();
                          echo "</td>";
                        }
                        else if($i==2)
                        { echo "<td></td>";
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
                       </div>
                       <input type="hidden" id ="foundation" value="">
                       <input type='button' class='btn' id ="submit_btn" value="submit">
                      </form>
                   </div>
               </div>
        <!-- /#page-content-wrapper -->


    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/Service.js"></script>
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
