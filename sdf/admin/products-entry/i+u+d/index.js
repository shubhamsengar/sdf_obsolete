var m_iud = angular.module('m_iud', ['ngRoute']);

m_iud.config(function($routeProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "kurti-comm/index.php",
    controller: "c_kurti_comm"
  })
  .when("/kurti", {//shows kurti form
    templateUrl : "insert/insert.php",
    controller: "myCtrl"
  })
  .when("/kurti-comm-form", {//shows kurti common form
    templateUrl : "kurti-comm/form/kurti-comm-form.php",
    controller: "c_kurti_comm_form"
  })
  
});

m_iud.controller('c_iud', function ($scope,$rootScope) {
  console.log('---==ctrl products entry==---');
  //root scope variables for inter-controller communication.
    $rootScope.rs_kurti_comm_id;
  
});


