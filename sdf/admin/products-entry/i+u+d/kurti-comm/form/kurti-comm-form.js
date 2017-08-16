m_iud.controller('c_kurti_comm_form', function ($scope, $window,$http,$rootScope,$location) {
    $scope.submit = function(){
         //, name, article_sub_type, style_name, material, product_desc, , occasion_type, sleeve_type, pattern, 
        kurti_comm_entry = { "operation": "kurti_comm_entry","name":$scope.name, "article_sub_type": $scope.article_sub_type,         "style_name": $scope.style_name, "material":$scope.material,"product_desc":$scope.product_desc,"occasion_type":$scope.occasion_type        ,"sleeve_type":$scope.sleeve_type,"pattern":$scope.pattern };
        $scope.kurti_comm_entry = JSON.stringify(kurti_comm_entry);
        $http({
                    method: "POST",
                    url: "/SDF/service/php/reply.php",
                    data: $scope.kurti_comm_entry
                }).then(
                    function success(response) {

                        switch (response.data.code) {
                            case 200:
                            alert('Data Saved Successfully.');
                               console.log('Successfully saved data.');
                               $window.location.reload();
                                $location.path('/');                               
                                break;

                            case 2://pass & email do not match 
                                $scope.email_pass_not_found_err_flag = true;
                                //console.log($scope.lgn_pg_flag);
                                break;

                            case 400:
                                //$scope.already_in_use_flg = true;
                                break;


                            default:
                            console.log('default called');
                                    console.log('code' , response.data);
                        }//*** switch

                        
                    }
                    ,
                    function error(response) {
                        console.log('inside error fucntion');
                    }
                    );//
            
        
    }
});