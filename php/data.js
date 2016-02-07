function GetUsers($scope, $http) {
    // this is where the JSON from api.php is consumed
    $http.get('./api.php').
        success(function(data) {
            // here the data from the api is assigned to a variable named users
            $scope.users = data;
        });
}


 
 
var myApp = angular.module('spicyApp1', []);

myApp.controller('SpicyController', ['$scope', function($scope) {
    $scope.spice = 'very';

    $scope.chiliSpicy = function() {
        $scope.spice = 'chili';
    };

    $scope.jalapenoSpicy = function() {
        $scope.spice = 'jalapeño';
    };
}]);


myApp.controller('homeCtrl', function($scope) {
        $scope.array = [1, 5];
        $scope.array_ = angular.copy($scope.array);
        $scope.list = [{
            "id": 1,
            "value": "apple",
        }, {
            "id": 3,
            "value": "orange",
        }, {
            "id": 5,
            "value": "pear"
        }];

       

    })
    .directive("checkboxGroup", function() {
        return {
            restrict: "A",
            link: function(scope, elem, attrs) {
                // Determine initial checked boxes
                if (scope.array.indexOf(scope.item.id) !== -1) {
                    elem[0].checked = true;
                }

                // Update array on click
                elem.bind('click', function() {
                    var index = scope.array.indexOf(scope.item.id);
                    // Add if checked
                    if (elem[0].checked) {
                        if (index === -1) scope.array.push(scope.item.id);
                    }
                    // Remove if unchecked
                    else {
                        if (index !== -1) scope.array.splice(index, 1);
                    }
                    // Sort and update DOM display
                    scope.$apply(scope.array.sort(function(a, b) {
                        return a - b;
                    }));
                });
            }
        };
    });




function Ctrl($scope) {
  $scope.name = 'Nextree';
 
  $scope.say = function(eee) {
    alert(eee);
    $scope.showme = 'Hello ' + $scope.name ;
  };
}

function namesCtrl($scope){
     $scope.names = [
{"c_name":"Amazing Story","title":"a"},
{"c_name":"Armstrong","title":"b"},
{"c_name":"CCC","title":"CCC"},
{"c_name":"CRA","title":"ddd"},
{"c_name":"DUDUS","title":"eee"}
    ]

     $scope.tex = 'i';
}

var myApp = angular.module('myApp', []);

 function MainCtrl($scope) {
    
    $scope.text = 'Hello, Angular fanatic.';
    
}