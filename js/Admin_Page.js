var app = angular.module('myApp', []);
app.controller('Ctrl', function($scope,$http) {
    $scope.showMe1 = true;
    $scope.showMe2 = false;
    $scope.Stu_Request = function() {
        $scope.showMe1 = true;
        $scope.showMe2 = false;
    }

    $scope.Camp_Handling = function() {
        $scope.showMe1 = false;
        $scope.showMe2 = true;
    }

	var dataObject =
	{
		dataNo : "이게 나오다니!!",
		user_id : "ggggggg",
		dataContent : $scope.dataContent
	};


	/* AJAX 통신 처리 */
	$http({
		method: 'POST', //방식
		url: 'http://localhost/April/php/URL.php', /* 통신할 URL */
		data: $.param(dataObject),
		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	})
	.success(function(data, status, headers, config) {
		if( data ) {
			/* 성공적으로 결과 데이터가 넘어 왔을 때 처리 */
			alert(data);
		}
		else {
			/* 통신한 URL에서 데이터가 넘어오지 않았을 때 처리 */
	
			alert("NO1!!");
		}
	})
	.error(function(data, status, headers, config) {
		/* 서버와의 연결이 정상적이지 않을 때 처리 */
		console.log(status);
	});


$scope.companies = [
                    
                    ];
$scope.addRow = function(){
	$copy = $scope.name;		
	$scope.name = $scope.name.slice(0,8);
	$scope.slicename = $copy.slice(9,13);
	$scope.companies.push({'name':$scope.name, 'employees': $scope.employees, 'headoffice':$scope.headoffice,'slicename':$scope.slicename});
	$scope.name='';
	$scope.employees='';
	$scope.headoffice='';
};
$scope.removeRow = function(name){				
		var index = -1;		
		var comArr = eval( $scope.companies );
		for( var i = 0; i < comArr.length; i++ ) {
			if( comArr[i].name === name ) {
				index = i;
				break;
			}
		}
		if( index === -1 ) {
			alert( "Something gone wrong" );
		}
		$scope.companies.splice( index, 1 );		
	};

});




