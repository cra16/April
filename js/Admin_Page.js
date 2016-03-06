var admin_App = angular.module('routerApp', ['ngRoute','angularUtils.directives.dirPagination']);
admin_App.config(function ($routeProvider) {
$routeProvider
    .when('/app', {templateUrl: '../php/Admin_App.php', controller: 'app_Ctrl'})
    .when('/sub', {templateUrl: '../php/Admin_Sub.php', controller: 'sub_Ctrl'})
    .when('/nonsub', {templateUrl: '../php/Admin_Nonsub.php', controller: 'nonsub_Ctrl'})
    .otherwise({redirectTo: '/app'});
});

admin_App.controller('sub_Ctrl', function($scope,$http) {

	// 학부정보
	$scope.articles = ["인문사회","고전강독","세계관","수학과학","소통-융복합","ICT융합기초"];
	$scope.credits=["4","3","2","1"];
	var dataObject = {};
	// Request Nonsub Info
	$http({method: 'POST', url: 'Admin_Sub_Handling.php',data: {'mode' : 0}})
	.success(function(data) {
	if( data ) /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	$scope.subs = data;
	else /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */ 
	alert("Return Fail");
	});


	$scope.addRow = function(){
	      
	      dataObject = {'article':$scope.article, 'credit': $scope.credit, 'sub_name':$scope.sub_name,'mode':1};

	      /* AJAX 통신 처리 */
	      $http({
	        method: 'POST', url: 'Admin_Sub_Handling.php', 
	        data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	      })
	      .success(function(data, status, headers, config) {
	        if( data  == 1) {
	          /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
			$( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			$scope.subs.push(dataObject);
			}
			else {
			  /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
			  alert(data);
			}
			})
			.error(function(data, status, headers, config) {
			/* 서버와의 연결이 정상적이지 않을 때 처리 */
			alert("Connect Fail");
			});
			//  초기화
			$scope.article='';
			$scope.credit='';
			$scope.sub_name='';
	}; // addRow function End

	$scope.removeRow = function(sub){  

	      dataObject = {'article':sub.article, 'sub_name': sub.sub_name, 
	          'credit':sub.credit,'mode':-1};

	      var index = -1;   
	      var comArr = eval( $scope.subs);
	      for( var i = 0; i < comArr.length; i++) {
	        if( comArr[i].num == sub.num) {
	          index = i;
	          break;
	        }
	      }
	      console.log(dataObject);
	      console.log(index);

	      /* AJAX 통신 처리 */
	      $http({method: 'POST', url: 'Admin_Sub_Handling.php', data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'},})
	      .success(function(data, status, headers, config) {
	        if(data == 1) /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	        {
 		$( "div.warning" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
	          if( index === -1 ) {
 	          $( "div.failure").fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
	          }
	          $scope.subs.splice( index, 1);
	        }
	        
	        else {
	          /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
	          alert("Return Fail");
	        }
	      })
	      .error(function(data, status, headers, config) {
	        /* 서버와의 연결이 정상적이지 않을 때 처리 */
	        alert("Connect Fail");
	      }); // http_post End
	}; // removeRow function End
});

admin_App.controller('nonsub_Ctrl', function($scope,$http) {
	// 학부정보
	$scope.courses = ["전산전자","국제어문","경영경제","법학부","언론정보","상담복지","생명과학","공간시스템",
			       "콘텐츠융합디자인","기계제어","산업교육","글로벌에디슨아카데미","창의융합교육원"];
	$scope.areas = ["인문사회","이공학","ICT"];
	$scope.fields = ["캠프","학회"];
	$scope.years = ["2013","2014","2015","2016","2017","2018","2019","2020"];
	var dataObject = {};
	var req = 0;
	$scope.mode = "캠프";
	// Request Nonsub Info
	$http({method: 'POST', url: 'Admin_Nonsub_Handling.php', data: {'mode' : 0}})
	.success(function(data) {
	if( data ) /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	$scope.nonsubs = data;
	else /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */ 
	alert("Return Fail");
	});

	$scope.ShowNonsub = function(req){
	      $scope.mode = req;
	      if($scope.mode=="캠프")
	      req = 0;
	      else
	      req =1;
	      dataObject = {'mode':0,'req':req};
	      /* AJAX 통신 처리 */
	      $http({
	        method: 'POST', url: 'Admin_Nonsub_Handling.php', 
	        data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	      })
	      .success(function(data) {
	        if( data ) /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	        $scope.nonsubs = data;
	        else /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */ 
	        alert("Return Fail");
	      });
	};

	$scope.addRow = function(){
	      if($scope.mode=="캠프")
	      req = 0;
	      else
	      req =1;
	      dataObject = {'course':$scope.course, 'area': $scope.area, 'name':$scope.name,'mode':1,'req':req};

	      /* AJAX 통신 처리 */
	      $http({
	        method: 'POST', url: 'Admin_Nonsub_Handling.php', 
	        data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	      })
	      .success(function(data, status, headers, config) {
	        if( data  == 1) {
	          /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	          $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );	          
	          $scope.nonsubs.push(dataObject);
	        }
	        else {
	          /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
	          alert(data);
	        }
	      })
	      .error(function(data, status, headers, config) {
	        /* 서버와의 연결이 정상적이지 않을 때 처리 */
	        alert("Connect Fail");
	      });
	      //  초기화
	      $scope.course='';
	      $scope.area='';
	      $scope.name='';
	      $scope.field='';
	}; // addRow function End

	$scope.removeRow = function(nonsub){  
	      if($scope.mode=="캠프")
	      req = 0;
	      else
	      req =1;
	      dataObject = {'course':nonsub.course, 'area': nonsub.area, 
	          'name':nonsub.name,'mode':-1,'req':req};

	      var index = -1;   
	      var comArr = eval( $scope.nonsubs );
	      for( var i = 0; i < comArr.length; i++ ) {
	        if( comArr[i].num == nonsub.num) {
	          index = i;
	          break;
	        }
	      }

	      /* AJAX 통신 처리 */
	      $http({method: 'POST', url: 'Admin_Nonsub_Handling.php', data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'},})
	      .success(function(data, status, headers, config) {
	        if(data == 1) /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	        {
 		$( "div.warning" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
	          if( index === -1 ) {
 	          $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
	          }
	          $scope.nonsubs.splice( index, 1 );
	        }
	        
	        else {
	          /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
	          alert("Return Fail");
	        }
	      })
	      .error(function(data, status, headers, config) {
	        /* 서버와의 연결이 정상적이지 않을 때 처리 */
	        alert("Connect Fail");
	      }); // http_post End
	}; // removeRow function End
});



// 지원 정보 Controller 
admin_App.controller('app_Ctrl', function($scope,$http) {

	$scope.mode = "지원";
	$scope.all_status = ["지원", "심사", "완료"];
	
	var dataObject = {};
	var req = 0;

	// Request App Info
	 $scope.mode = req;

	  dataObject = {'mode':0,'req':req};
	  /* AJAX 통신 처리 */
	  $http({
	    method: 'POST', url: 'Admin_App_Handling.php', 
	    data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	  })
	  .success(function(data) {
	    if( data ) /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
	    $scope.apps = data;
	    else /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */ 
	    alert("Return Fail");
	  });



	$scope.updateRow = function(){

		// Fetch student name.

		dataObject = {'mode':1};

		/* AJAX 통신 처리 */
		$http({
		method: 'POST', url: 'Admin_App_Handling.php', 
		data: $.param(dataObject),headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.success(function(data, status, headers, config) {
		if( data  == 1) {
		  /* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
		  alert("정보가 수정되었습니다!");
		}
		else {
		  /* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
		  alert(data);
		}
		})
		.error(function(data, status, headers, config) {
		/* 서버와의 연결이 정상적이지 않을 때 처리 */
		alert("Connect Fail");
		});

		//  초기화
		$scope.kind='';
		$scope.area='';
		$scope.stat='';
		}; // addRow function End
});