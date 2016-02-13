<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>관리자 페이지</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/Admin_Page.css" rel="stylesheet">
</head>

<body ng-app="Admin_App">

      <!-- Nav-bar Start -->
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
                <a class="navbar-brand" href="Admin_Page.php" id = "home_button">April</a>
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
      <!-- Nav-bar End -->


      <div ng-controller="Ctrl">
      <div id="wrapper">

           <!-- Sidebar -->
           <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                  <li >
                  <a href="#" ng-click="Stu_Handling()">학생 정보</a>
                  </li>
                  <li>
                  <a href="#" ng-click="Sub_Handling()">교과과정</a>
                  </li>
                  <li >
                  <a href="#" ng-click="Nonsub_Handling()">비교과과정</a>
                  </li>
              </ul>
           </div>
           <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
           <div id="page-content-wrapper">
           <div class="container-fluid row col-lg-12">
                <div ng-show="showMe1">
                    <h1>학생정보</h1>
                </div>

                <!-- 비교과과정 view -->
                <div ng-show="showMe3">
                      <h1>비교과과정</h1>
                      <form class="form-horizontal" role="form" ng-submit="addRow()">
                      <!-- 학부 선택 -->
                      <div class="form-group">
                           <label class="col-md-2 control-label">학부선택</label>
                           <select name="course" ng-model="course">
                           <option ng-repeat="course in courses" value="{{course}}">{{course}}</option>
                           </select>
                      </div>
                      <!--  항목 선택 ex) 인문사회-->
                      <div class="form-group">
                           <label class="col-md-2 control-label">항목선택</label>
                           <select name="area" ng-model="area">
                           <option ng-repeat="area in areas" value="{{area}}">{{area}}</option>
                           </select>
                      </div>

                      <!--  캠프 or 학회 ex) 인문사회-->
                      <div class="form-group">
                           <label class="col-md-2 control-label">캠프/학회</label>
                           <select name="field" ng-model="field">
                           <option ng-repeat="field in fields" value="{{field}}">{{field}}</option>
                           </select>
                      </div>

                      <div class="form-group">
                           <label class="col-md-2 control-label">이름</label>
                           <div class="col-md-4">
                           <input type="text" class="form-control" name="name" ng-model="name" />
                           </div>
                      </div>

                      <div class="form-group">                
                           <div style="padding-left:110px">
                           <input type="submit" value="Submit" class="btn btn-primary"/>
                           </div>
                      </div>
                      </form>


                      <table class="table">
                      <tr>
                       <th>학부명       </th>
                      <th>항목명        </th>
                      <th>비교과명     </th>
                      <th>캠프/학회    </th>
                      <th>Action         </th>
                      </tr>
                      <tr ng-repeat="nonsub in nonsubs | orderBy:'name'">
                      <td>{{nonsub.course}}</td>
                      <td>{{nonsub.area}}</td>
                      <td>{{nonsub.name}}</td>
                      <td>{{nonsub.field}}</td>
                      <td>
                      <input type="button" value="Remove" class="btn btn-warning" ng-click="removeRow(nonsub.course,nonsub.area,nonsub.num,nonsub.name,nonsub.field)"/>
                      </td>
                      </tr>
                      </table>
                </div>


    </div>
    </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  </div>

 

    <!-- Angular JavaScript plugins -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/Admin_Page.js"></script>


</body>

</html>
