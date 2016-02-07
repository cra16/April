<!DOCTYPE html>
<html ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TestPage</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/test.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
    <script src="./data.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Main.php">April</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">LogOut</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Link3</a></li>
          </ul>
        </div>
      </div>
    </nav>  
   
<!--     <div class = "container" ng-controller="GetUsers">
      <div class="section" ng-repeat = "world in users">
        <div class="block">
          <h3>{{world.c_name}}</h3>
          <h5>조건1.{{world.cond_1}}</h5>
          <h5>조건2.{{world.cond_2}}</h5>
        </div>
      </div>
    </div> -->
   

<div ng-controller="Ctrl">
  My name :
    <input type="text" ng-model="name">
    <button ng-click='say(1)'>click</button>
    <button ng-click='say(2)'>click</button>
    <button ng-click='say(3)'>click</button>

  <hr>
  {{showme}}
</div>

<div ng-controller="namesCtrl">

<ul>
  <li ng-repeat="x in names | filter : {{tex}}">
    {{ x.c_name }}
    {{x.title}}
    {{tex}}
  </li>
</ul>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>