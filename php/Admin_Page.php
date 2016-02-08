<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ServicePage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/Admin_Page.css" rel="stylesheet">
</head>

<body ng-app="myApp">

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
  <!-- Nav-bar End -->


  <div ng-controller="Ctrl">
    <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#" ng-click="Stu_Request()">Stu_Info</a>
        </li>
        <li>
        <a href="#" ng-click="Camp_Handling()">Data Manage</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <div class="container-fluid row col-lg-12">
        <div ng-show="showMe2">
            <h1>학생정보</h1>
        </div>
        <div ng-show="showMe1">
          <h1>캠프관리</h1>
          <form class="form-horizontal" role="form" ng-submit="addRow()">
          <div class="form-group">
            <label class="col-md-2 control-label">인증제 선택</label>
            <select name="name" ng-model="name">
              <option value="기초역량 인증제apple">기초역량 인증제</option>
              <option value="기초학문 인증제bababa">기초학문 인증제</option>
            </select>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">항목</label>
           <select name="employees" ng-model="employees">
              <option value="인문사회">인문사회</option>
              <option value="이공학  s">이공학</option>
              <option value="ICT">ICT</option>
              <option value="ICT심화">ICT심화</option>
              <option value="융복합">융복합</option>

            </select>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">이름</label>
            <div class="col-md-4">
              <input type="text" class="form-control" name="headoffice"
                ng-model="headoffice" />
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
    <th>인증제도
    </th>
    <th>항목
    </th>
    <th>비교과 이름
    </th>
    <th>Action
    </th>
  </tr>
  <tr ng-repeat="company in companies">
    <td>{{company.name}} {{company.slicename}}
    </td>
    <td>{{company.employees}}
    </td>
    <td>{{company.headoffice}}
    </td>
    <td>
    <input type="button" value="Remove" class="btn btn-primary" ng-click="removeRow(company.name)"/>
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
