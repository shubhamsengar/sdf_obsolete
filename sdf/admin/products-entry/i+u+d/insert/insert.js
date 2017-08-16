//var app = angular.module('myApp', []);
m_iud.controller('myCtrl', function ($scope, $window,$http,$rootScope,$location,$route) {
    console.log('---==ctrl kurti insert==---');
    //----------Member Variables----------
    $scope.colors = ['red','green','blue', 'yellow', 'orange', 'black','As shown in image', 'multicolor'];
    $scope.sizes = ['s', 'm', 'l', 'xl', 'xxl', 'xxxl', '36', '38', '40', '42', '44', '46', '48', '50', '52', '54'];
    $scope.colors_len;
    $scope.sizes_len;
    $scope.fnl_colors;
    $scope.fnl_sizes;
    $scope.fnl_prices;
    $scope.fnl_qty;
    $scope.operation;


    $scope.first_screen_flag = true;
    $scope.price_flag = false;
    $scope.size_flag = false;
    $scope.upload_images_ui_flag = false;

    //----------***Member Variables----------

    //----------Member Functions--------
    $scope.colors_clk = function () {
          if ($rootScope.rs_kurti_comm_id == undefined) {
            alert('Please Select Id from previous page.');
            return false;
        }
        if ($scope.colors_mdl == undefined) {
            alert('Please Select Colors:');
            return false;
        }
        $scope.price_flag = true;
        // $window.alert($scope.colors_mdl.length);
        console.log(JSON.stringify($scope.colors_mdl));
        //console.log(typeof(JSON.stringify($scope.colors_mdl)));
        //Generation of input fieds dynamically, for Prices.

        $scope.fnl_colors = JSON.stringify($scope.colors_mdl);
        $scope.colors_len = $scope.colors_mdl.length;
        //Remove already appended childs.
        $( "#prices" ).empty();
        for (i = 1; i <= $scope.colors_mdl.length; i++) {
            var input = document.createElement("input");
            var line_brk = document.createElement("br");
            input.type = "number";
            input.className = "form-control";
            input.id = 'price'+i;
            input.placeholder = 'Price for' + i;
            $("#prices").append(input);
            $("#prices").append(line_brk);
        }//***Generation of input fieds dynamically, for Prices.
    }

    $scope.prices_clk = function(){
        prices =[];
        for(i=1;i<=$scope.colors_len;i++){
            if(document.getElementById('price'+i).value ==  ''){
                alert ('Please Provide all prices.');
                return false;
            }
            prices[i-1] = document.getElementById('price'+i).value;
        }
        console.log(prices);
        $scope.fnl_prices = JSON.stringify(prices);
        $scope.size_flag = true;
    }

    $scope.sizes_clk = function () {

        if ($scope.sizes_mdl == undefined) {
            alert('Please Select Sizes.');
            return false;
        }
       
        

        $scope.sizes_len = $scope.sizes_mdl.length;
        $scope.fnl_sizes = JSON.stringify($scope.sizes_mdl);
        console.log($scope.fnl_sizes);
        

        $scope.first_screen_flag = false;
        n = $scope.colors_len;
        m = $scope.sizes_len;
        id = 1;
        for (i = 1; i <= ($scope.colors_len); i++) {
            for (j = 1; j <= ($scope.sizes_len); j++) {

                var input = document.createElement("input");
                var line_brk = document.createElement("br");
                label = $scope.colors_mdl[i - 1] + ',' + $scope.sizes_mdl[j - 1];
                var x = document.createTextNode(label);
                //x.text = $scope.colors_mdl[i];


                input.type = "number";
                input.className = "form-control";
                input.id = 'qty' + id;
                input.placeholder = 'Qty' + id; // set the CSS class
                qty.appendChild(x);
                qty.appendChild(input); // put it into the DOM
                qty.appendChild(line_brk);
                id++;

            }

        }


    }

    $scope.final_clk = function () {
        qty = []; 
        for(i = 1; i <= ($scope.colors_len*$scope.sizes_len); i++ ){
            if(document.getElementById('qty'+i).value == ''){
                alert('Please Provide all the prices.');
                return false;
            }
            qty[i-1] = document.getElementById('qty'+i).value;
        }
        qty = JSON.stringify(qty);

        // Finally Writing Values to db
        
        products_entry = { "operation": "products_entry","kurti_comm_id":$rootScope.rs_kurti_comm_id, "colors": $scope.fnl_colors, "prices": $scope.fnl_prices, "sizes":$scope.fnl_sizes,"qty":qty };
        $scope.products_entry = JSON.stringify(products_entry);
            $http({
                    method: "POST",
                    url: "/SDF/service/php/reply.php",
                    data: $scope.products_entry
                }).then(
                    function success(response) {

                        switch (response.data.code) {
                            case 200:
                            alert('Data Saved Successfully.');
                               console.log('Successfully saved data.');
                               $scope.upload_images_ui_flag = true;
                               document.getElementById("final_btn").disabled = true;
                              // $window.location.reload();
                                //$location.path('/');                               
                                break;

                            case 2://pass & email do not match 
                                $scope.email_pass_not_found_err_flag = true;
                                //console.log($scope.lgn_pg_flag);
                                break;

                            case 400:
                                //$scope.already_in_use_flg = true;
                                break;
                            case 3:
                            document.getElementById("final_btn").disabled = true;
                            alert('This id exists before, please maintain unique constraint');


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
        //*** Finally Writing Values to db
    




});

