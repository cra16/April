var app = angular.module('Admin_App', []);

app.controller('Ctrl', function($scope,$http) {
	// 학생정보,교과과정, 비교과과정 view
	$scope.showMe1 = false;
	$scope.showMe2 = false;
	$scope.showMe3 = true;
	// 학부정보
	$scope.courses = ["전산전자","국제어문","경영경제","법학부","언론정보","상담복지",
			       "생명과학","공간시스템","콘텐츠융합디자인","기계제어","산업교육",
			       "글로벌에디슨아카데미","창의융합교육원"];
	$scope.areas    = ["인문사회","이공학","ICT"];
	$scope.fields     = ["캠프","학회"];
	// db로부터 정보 가져옴
	$http({
		method: 'POST', //방식
		url: 'Admin_Nonsub_Handling.php', /* 통신할 URL */
		data: {'mode' : 0},
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	})
	.success(function(data, status, headers, config) {
		if( data ) {
			/* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
			$scope.nonsubs = data;
		}
		else {
			/* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
			alert("Return Fail");
		}
	});

	$scope.Stu_Handling = function() {
	    $scope.showMe1 = true;
	    $scope.showMe2 = false;
	    $scope.showMe3 = false;
	}

	$scope.Sub_Handling = function() {
	    $scope.showMe1 = false;
	    $scope.showMe2 = true;
	    $scope.showMe3 = false;
	}

	$scope.Nonsub_Handling = function() {
	    $scope.showMe1 = false;
	    $scope.showMe2 = false;
	    $scope.showMe3 = true;
	}

	var dataObject = {};

	$scope.addRow = function(){
	dataObject = {'course':$scope.course, 'area': $scope.area, 
			'name':$scope.name,'field':$scope.field,'mode':1};

	/* AJAX 통신 처리 */
	$http({
		method: 'POST', //방식
		url: 'Admin_Nonsub_Handling.php', /* 통신할 URL */
		data: $.param(dataObject),
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	})
	.success(function(data, status, headers, config) {
		if( data ) {
			/* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
			alert("정보가 입력되었습니다!");
			if(data == 1)
			$scope.nonsubs.push(dataObject);
			
			else
			alert("중복되는 값을 입력하셨습니다!");
		}
		else {
			/* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
			alert("Return Fail");
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

	$scope.removeRow = function(course,area,num,name,field){	

		dataObject = {'course':course, 'area': area, 
				'name':name,'field':field,'mode':-1};

		var index = -1;		
		var comArr = eval( $scope.nonsubs );
		for( var i = 0; i < comArr.length; i++ ) {
			if( comArr[i].num ==num) {
				index = i;
				break;
			}
		}

		/* AJAX 통신 처리 */
		$http({
			method: 'POST', //방식
			url: 'Admin_Nonsub_Handling.php', /* 통신할 URL */
			data: $.param(dataObject),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		})
		.success(function(data, status, headers, config) {
			/* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
			if(data == 1)
			{
				alert("정보가 삭제되었습니다!");
				if( index === -1 ) {
				alert( "Something gone wrong" );
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




