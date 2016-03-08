<!DOCTYPE html>
<?php
session_start();

//simple_html_dom.php is needed to access hisnetpage information
require_once('simple_html_dom.php');

include('Stu_Grade.php');
$stu_grade = Stu_Grade::getInstance(0);

//simple_html_dom.php is needed to access hisnetpage information

?>
<?php $stu_grade->requestGrade($_SESSION['USER_NAME'], $_SESSION['USER_PW']); ?>
                       
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
      <a class="navbar-brand" href="Service.php" id = "home_button">April</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" class="introduction">소개 페이지</a></li>
      <li><a href="#" class="foundation-competence">기초역량</a></li>
      <li><a href="#" class="foundation-study">기초학문</a></li>
      <li><a href="#" class="register_data">지원 정보</a></li>
      <li><a href="Main.php">Logout</a></li>

    </ul>
  </div>
  </div>
</nav>  





 

        <!-- Sidebar -->
       

        <!-- Page Content -->
         <div class ="col-md-1"></div>
         <div class ="col-md-10">
        <div id="container">
        
          
                   <div class="button_class"  style="margin-top:40px;">
                      
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
                      <form id="form_data" action="ResultService.php" method="POST" >
                       <center><h2>특성-<span id = "course_name">인문사회</span></h2></center>
                       <div class="total_table input_data" >

                       <?php
                        for($i=0; $i<3; $i++)
                       {?>

                        <div class="table_layer" style="margin-top:40px;">
                          <center><?php 
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
                            ?></center>

                           <div id="rt_table" style="margin-top:40px;">

                                    <table id="table" class="table" >
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
                                          $stu_grade->getSubject($k,"인문사회","기초역량");
                                   
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
                                <?php
                                  if($i==2)
                              if($i==2)
                               {
                                echo "* 현장참여과정은 코너스톤을 제외하고는 모든 보고서는 창의융합교육원 오피스에 필요서류를 제출하셔야 합니다.";
                               }
                                ?>
                         </div>
                         <?php

                       }?>
                       </div>
                       <input type="hidden" id ="foundation" name = "foundation" value="">
                       <center style="margin-top:40px;"><input type='button' class='btn btn-primary bt-lg' id ="submit_btn" value="제출">
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type='button' class='btn btn-primary bt-lg' id ="check_btn" style="" value="확인"></center>
                     
                      </form>
            </div>
     

                        <div class="introduce" style="margin-top:40px;">
                           
                              <h1>기초역량 기초학문 인증제</h1> 
      <div id="tagline">
      <center><p>April provides you a Certification of your capability or study</p></center>
      </div>
      <br>
      <h3>기초역량 기초학문 인증제가 무엇인가요?</h3>
      <p>기초 역량 기초학문 인증제는 전공 진입을 위한 학습 능력과 기초 학문에 대한 이해 능력을 학교가 공식적으로
        인증하여 학생들의 융합 역량 강화를 위한 노력을 돕는 제도입니다.
      </p>
      <br><br>
      <h3>인증 대상은 누구인가요?</h3>
      <h5>1. 기초역량 인증</h5>
      <div class="desc_contain">
      <div style="float:left;" id="description">
       
           <p>1.해당 교과 과정에서 각 과목 B0학점 이상의 성적을 얻은 학생</p>  
           <p>2.코너스톤 창의과제를 수강한 학생</p>
            <p>3.학술캠프나 ICT 학술학회를 참여한 학생</p>
           
          
           
            
        
      </div>
          <img style="float:left;" src="../img/back.jpg">
     </div>
      <h5>2. 기초학문 인증</h5>
      <div class="desc_contain">
        <div style="float:left;" id="description">
           <p>1.해당 교과 과정에서 각 과목 B0학점 <br>이상의 성적을 얻은 학생<br><br>
                 2.교내 학술학회에서 활동한 학생<br><br>
                 3.기초 학문 분야와 연관 전공에 대한 <br>심화된 학습 결과물을 낸 학생<br>
           </p>
      </div>
      <img style="float:left;" src="../img/bg2.png">
      </div>
      <hr>

      <h1>기초역량 인증</h1> 
      <div id="tagline">
      <p>인문사회,이공학,ICT,ICT 심화</p>
      </div>
      <br>
      <h3>기초역량 인증제란 무엇인가요?</h3>
      <p>기초역량 인증은 전공 학습에 필요한 기초 역량을 갖춘
        학생을 인증하는 제도입니다.
        전공을 이수하는 데 어려움이 없도록 기초 과목을 충분히 수강하고 심화학습
        능력을 갖춘 학생들에게 인증을 부여합니다.
      </p>
      <center><h5>기초역량 인증제 교과과정</h5></center>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th></th>
            <th>교과과정<br>(학점B0이상)</th>
            <th>비교과과정</th>
            <th>현장참여과정<br>(교과/비교과)</th>
          </tr>
          <tr>
            <td>인문<br>사회</td>
            <td>인문사회(6)<br>고전강독(2)<br>세계관(4)</td>
            <td rowspan="3">방학중<br>학술캠프<br>참여</td>
            <td rowspan="3">코너스톤<br>창의과제(2)</td>
          </tr>
          <tr>
            <td>이공학</td>
            <td>수학과학(9)<br>소통-융복함(3)</td>
          </tr>
          <tr>
            <td>ICT</td>
            <td>ICT융합기초(9)<br>소통-융복함(3)</td>
          </tr>
          <tr>
            <td>ICT<br>심화</td>
            <td>ICT융합기초(15)<br>소통-융복함(3)</td>
            <td>ICT 학술<br>학회 참여</td>
            <td>심화보고서/프로젝트</td>
          </tr>  
        </table>
      </div>
      <hr>
       <h1>기초학문 인증</h1> 
      <div id="tagline">
      <p>인문사회,이공학,융합</p>
      </div>
      <br>
      <h3>기초학문 인증제란 무엇인가요?</h3>
      <p>기초학문 인증은 기초학문 분야에서 깊은 이해를 가진
            학생을 인증하는 제도입니다. 학회활동을 통해 <br>
            기초학문을 공부하여 전문 분야에서도 더 나은 실력을<br>
            발휘할 수 있는 학생들에게 인증을 부여합니다.
      </p>
      <center><h5>기초학문 인증제 교과과정</h5></center>
      <div class="table-responsive">
        <table class="table">
           <tr>
              <th></th>
              <th>교과과정<br>(학점B0이상)</th>
              <th>비교과과정</th>
              <th>현장참여과정<br>(교과/비교과)</th>
           </tr>
           <tr>
            <td>인문<br>사회</td>
            <td>인문사회(12)<br>고전강독(2)<br>세계관(4)</td>
            <td>인문사회<br>교내 학술<br>학회 참여</td>
            <td>심화보고서</td>
           </tr>
           <tr>
            <td>이공학</td>
            <td>수학과학(15)<br>소총-융복합(3)</td>
            <td>이공학<br>교내학술<br>학회참여</td>
            <td>심화보고서</td>
           </tr>
           <tr>
             <td>융합</td>
             <td>인문사회(9)<br>수학과학(6)<br>소통-융복합(3)</td>
             <td>교내 학술<br>학회 참여</td>
             <td>심화보고서/<br>프로젝트</td>
           </tr>
        </table>
      </div>     

                        </div>
                   
                    <br><br><br>
                    
               
            
                  <div class ="register_table">
                   <center><h3 class="header">기초학문</h3></center>
                      <table class="table">
                        <thead>
                          <th>인증제도</th>
                          <th>인증항목</th>
                          <th>Serial number</th>
                          <th>교과영역</th>
                          <th>비교과영역</th>
                          <th>현장체험학습</th>
                          <th>상태</th>
                        </thead>
                        <tbody>
                        <tr>
                          <?php $stu_grade->SubmitInformation($_SESSION['USER_NAME'],"기초학문"); ?>
                        </tr>
                      
                      </tbody>
                      </table>

                  </div>
                  
                  <div class ="register_table">
                   <center><h3 class="header" >기초역량</h3></center>
                      <table class="table">
                        <thead>
                          <th>인증제도</th>
                          <th>인증항목</th>
                          <th>Serial number</th>
                          <th>교과영역</th>
                          <th>비교과영역</th>
                          <th>현장체험학습</th>
                          <th>상태</th>
                        </thead>
                        <tbody>
                        <tr>
                          <?php $stu_grade->SubmitInformation($_SESSION['USER_NAME'],"기초역량"); ?>
                        </tr>
                      
                      </tbody>
                      </table>
                  </div>

                  <div class ="register_table_mobile">
                      <table class="table">
                        <thead>
                          <th>기초학문</th>
                          <th></th>
                          
                        </thead>
                        <tbody>
                        <tr>
                          <td>데이터</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>교과정보</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>비교과정보</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>현장참여과정</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>승인여부</td>
                          <td></td>
                        </tr>

                      
                      </tbody>
                      </table>
                       <table class="table">
                        <thead>
                          <th>기초연구</th>
                          <th></th>
                          
                        </thead>
                        <tbody>
                        <tr>
                          <td>데이터</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>교과정보</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>비교과정보</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>현장참여과정</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>승인여부</td>
                          <td></td>
                        </tr>

                      
                      </tbody>
                      </table>

                  </div>
                 
        <div class="introduce_mobile">
             <h1>기초역량 기초학문 인증제</h1> 
      <div id="tagline">
      <center><p>April provides you a Certification of your capability or study</p></center>
      </div>
      <br>
      <h3>기초역량 기초학문 인증제가 무엇인가요?</h3>
      <p>기초 역량 기초학문 인증제는 전공 진입을 위한 학습 능력과 기초 학문에 대한 이해 능력을 학교가 <br>공식적으로
        인증하여 학생들의 융합 역량 강화를 위한 노력을 돕는 제도입니다.
      </p>
      <br><br>
      <h3>인증 대상은 누구인가요?</h3>
      <h5>1. 기초역량 인증</h5>
      <div class="desc_contain">
      <div style="float:left;" id="description">
       
           <p>1.해당 교과 과정에서 각 과목 B0학점 이상의 성적을 얻은 학생</p>  
           <p>2.코너스톤 창의과제를 수강한 학생</p>
            <p>3.학술캠프나 ICT 학술학회를 참여한 학생</p>
           
          
           
            
        
      </div>
          <img style="float:left;" src="../img/back.jpg">
     </div>
      <h5>2. 기초학문 인증</h5>
      <div class="desc_contain">
        <div style="float:left;" id="description">
           <p>1.해당 교과 과정에서 각 과목 B0학점 <br>이상의 성적을 얻은 학생<br><br>
                 2.교내 학술학회에서 활동한 학생<br><br>
                 3.기초 학문 분야와 연관 전공에 대한 <br>심화된 학습 결과물을 낸 학생<br>
           </p>
      </div>
      <img style="float:left;" src="../img/bg2.png">
      </div>
      <hr>

      <h1>기초역량 인증</h1> 
      <div id="tagline">
      <p>인문사회,이공학,ICT,ICT 심화</p>
      </div>
      <br>
      <h3>기초역량 인증제란 무엇인가요?</h3>
      <p>기초역량 인증은 전공 학습에 필요한 기초 역량을 갖춘
        학생을 인증하는 제도입니다.
        전공을 이수하는 데 <br>어려움이 없도록 기초 과목을 충분히 수강하고 심화학습
        능력을 갖춘 학생들에게 인증을 부여합니다.
      </p>
      <center><h5>기초역량 인증제 교과과정</h5></center>
  
          <table class="table">
            
            <th>인문사회</th>
            <th></th>

            <tr>
            <td>교과과정(학점B0이상)</td>
            <td>인문사회(6)<br>고전강독(2)<br>세계관(4)</td>
            </tr>
            <tr>
            <td>비교과과정</td>
            <td>방학중<br>학술캠프<br>참여</td>
            </tr>
            <tr>
            <td>현장참여과정<br>(교과/비교과)</td>
            <td>코너스톤<br>창의과제(2)</td>
            
            </tr>
         </table>
         <table class="table">
            <th>이공학</th>
            <th></th>
            <tr>
            <td>교과과정(학점B0이상)</td>
            <td>수학과학(9)<br>소통-융복함(3)</td>
            </tr>
            <tr>
            <td>비교과과정</td>
            <td>방학중<br>학술캠프<br>참여</td>
            </tr>
            <tr>
            <td>현장참여과정<br>(교과/비교과)</td>
            <td>코너스톤<br>창의과제(2)</td>
            </tr>
        </table>
        <table class="table">

            <th>ICT</th>
            <th></th>
            <tr>
            <td>교과과정<br>(학점B0이상)</td>
            <td>ICT융합기초(9)<br>소통-융복함(3)</td>
            </tr>
            <tr>
            <td>비교과과정</td>
            <td>방학중<br>학술캠프<br>참여</td>
            </tr>
            <tr>
            <td>현장참여과정<br>(교과/비교과)</td>
            <td>코너스톤<br>창의과제(2)</td>
            </tr>
        </table>
        <table class="table">
            <th>ICT<br>심화</th>
            <th></th>
            <tr>
            <td>교과과정<br>(학점B0이상)</td>
            <td>ICT융합기초(15)<br>소통-융복함(3)</td>
            </tr>
            <tr>
            <td>비교과과정</td>
            <td>ICT 학술<br>학회 참여</td>
            </tr>
            <tr>
            <td>현장참여과정<br>(교과/비교과)</td>
            <td>심화보고서/프로젝트</td>
            </tr>
        </table>

       <h1>기초학문 인증</h1> 
      <div id="tagline">
      <p>인문사회,이공학,융합</p>
      </div>
      <br>
      <h3>기초학문 인증제란 무엇인가요?</h3>
      <p>기초학문 인증은 기초학문 분야에서 깊은 이해를 가진
            학생을 인증하는 제도입니다. 학회활동을 통해 <br>
            기초학문을 공부하여 전문 분야에서도 더 나은 실력을<br>
            발휘할 수 있는 학생들에게 인증을 부여합니다.
      </p>
      <center><h5>기초학문 인증제 교과과정</h5></center>
        <table class="table">
            <th>인문사회</th>
            <th></th>
            <tr>
            <td>교과과정<br>(학점B0이상)</td>
            <td>인문사회(12)<br>고전강독(2)<br>세계관(4)</td>
            </tr>
            <tr>
            <td>비교과과정</td>
            <td>인문사회<br>교내 학술<br>학회 참여</td>
            </tr>
            <tr>
             <td>현장참여과정<br>(교과/비교과)</td>
            <td>심화보고서</td>
            </tr>
       
     </table>
     <table class="table">
            <th>이공학</th>
            <th></th>
            <tr>
            <td>교과과정<br>(학점B0이상)</td>
            <td>수학과학(15)<br>소총-융복합(3)</td>
            </tr>
            <tr>
            <td>비교과과정</td>
            <td>이공학<br>교내학술<br>학회참여</td>
            </tr>
            <tr>
            <td>현장참여과정<br>(교과/비교과)</td>
            <td>심화보고서</td>
            </tr>
    </table>
    <table class="table">
             <th>융합</th>
             <th></th>
             <tr>
             <td>교과과정<br>(학점B0이상)</td>
             <td>인문사회(9)<br>수학과학(6)<br>소통-융복합(3)</td>
             </tr>
             <tr>
             <td>비교과과정</td>
             <td>교내 학술<br>학회 참여</td>
             </tr>
             <tr>
             <td>현장참여과정<br>(교과/비교과)</td>
             <td>심화보고서/<br>프로젝트</td>
              </tr>
              </table>
      
        </div>

              
                   
            
        <div class="footer">
        <p> Produced by CRA - <a href="#" data-toggle="tooltip" title="이동영 이세계 조은비 조혜인 임현우">April-team</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Github : <a href="https://github.com/cra16/April"> https://github.com/cra16/April</a></p>
        <p> Person in charge : 최하림   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; email: cce.handong@gamil.com</p>
        <p> Office : 현동홀 206B 창의융합교육원 학생통합역량개발지원실</p>
        <p> Phone : 054)260-3308</p>
        </div>   
            </div>
            <div class ="col-md-1"></div>
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
