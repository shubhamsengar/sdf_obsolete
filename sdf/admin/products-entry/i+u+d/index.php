
	<!DOCTYPE html >
	<html lang='en'>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Shree Durga Fashions</title>
		<!--CSS-->

		<!--common.css-->
		<link href='/sdf/include/css/common.css' rel='stylesheet'>
		<link href='/sdf/include/bootstrap-3.3.7-dist/css/bootstrap.css' rel='stylesheet'>

		<!--CSS ***-->

		<!--SCRIPTS-->

		<!--jquery-->
		<!-- maintain the order of dependency, as jquery might be used in angular code-->
		<script src='/sdf/include/jquery/jquery-3.2.1.js'></script>
		<!-- bootstrap file-->
		<script src='/sdf/include/bootstrap-3.3.7-dist/js/bootstrap.min.js'></script>
		<!--angular 1.6.4 -->
		<script src="/sdf/include/js/angular_1.6.4.js"></script>
		<!-- ng route -->
		<script src="/sdf/include/js/angular-route_1.6.4.js"></script>
        <!--default js file for page -->
		<script src="index.js"></script>
		<script src='kurti-comm/index.js'></script>
		<script src='insert/insert.js'></script>
		<script src='kurti-comm/form/kurti-comm-form.js'></script>

        

		<!--SCRIPTS ***-->


	</head>
	
	<body  ng-app='m_iud' ng-controller='c_iud'>
		
		<div ng-view></div>
	</body>

	</html>