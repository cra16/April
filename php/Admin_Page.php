<html ng-app="routerApp">
<head>
  <meta charset="UTF-8">
 
  <title>관리자 페이지</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../css/Admin_Page.css" rel="stylesheet">
 </head>
 <body>
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
                <li><a href="#app">지원정보</a></li>
                <li><a href="#sub">교과과정</a></li>
                <li><a href="#nonsub">비교과과정</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="#" onclick="help()">Help</a></li>
                </ul>
           </div>
           </div>
      </nav>  
      <!-- Nav-bar End -->



   <div class="container">
 
     <ng-view></ng-view>
     <!--  ngView 지시자를 이용하여 URL 경로가 변경될 시 해당 URL 경로에 해당하는 HTML 조각을 삽입할 곳을 지정한다. -->
   </div>

    <!-- Insert for ng-route -->
    <script type="text/javascript" src="../js/angular.js"></script>
    <script type="text/javascript" src="../js/angular-route.js"></script>
    <!-- Control Admin_Page -->
    <script type="text/javascript" src="../js/Admin_Page.js"></script>  
    <!-- Insert for ng-pagination -->
    <script type="text/javascript" src="../js/dirPagination.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 </body>
 </html>