
	<div style=''>
		<div class='container-fluid pm0' style=''>
			<div style='height:66px;' class='pm0'>
				<!--HEADER -->

				<div class='row border fill pm0'>

					<div class='col-xs-3 borderb fill '>
						<table class='fill '>
							<th valign='middle' style='font-size:18px;'>SHREE DURGA FASHIONS
							</th>
						</table>
					</div>


					<div class='col-lg-3 col-xs-4 borderg pull-right fill' style=''>
						<table class='fill'>
							<th valign='middle'>
								<button id='loginSignupBtn' ng-show='lgn_sgn_btn' ng-click='lgn_in_sgn_up_btn()' type='button' class='btn btn-success btn-lg '>Log In / Sign Up</button>

								<div ng-show='!lgn_sgn_btn' class="dropdown">
									<button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">{{inputEmail }}
								<span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="#">Settings</a></li>
										<li><a href="#">Order History</a></li>
										<li><a href="http://localhost/SDF/index.php">Logout</a></li>
									</ul>
								</div>
							</th>

							<th>
								<span style='margin-left:20px;' class=' large glyphicon glyphicon-shopping-cart'></span>
							</th>

							<th valign='top'>
								<span class='badge block' style='font-size:13px!important;' ;>9</span>
							</th>

						</table>

					</div>

				</div>



				<!--HEADER ***-->
				<!-- Page below header -->

				<!-- ***Page below header -->



			</div>

		</div>

		<!--Login Page-->
		<div style='background-color:rgba(23,23,23,0.3);position:fixed;top:0;left:0;;width:100%;height:100%;' class='border' ng-show='lgn_pg_flag'>
			<div id='loginPage' style='border-radius:8px;background-color:white;width:80%;height:80%;margin-left:10%;margin-top:5%;'
			 class=' delete'>
				<div class='login conatiner '>
					<form id='myform'>
						<input type='text' name='one' />
						<input type='text' name='two' ng-model='two' id='two' />
						<button type='submit'>submit</button>
					</form>
					<div class='row   pm0'>
						<span id='closeLoginPage' ng-click='close_lgn_pge()' class='glyphicon glyphicon-remove pull-right' style='cursor:pointer;font-size:20px'> </span>
					</div>
					<div class='row '>
						<div class='col-lg-6 col-lg-offset-3' style='margin-top:20px;'>

							<!--form-->
							<form id='loginForm'>

								<div class='text-center' ng-show='already_in_use_flg' style='background-color:red;color:white;font-size:13px;'>
									Email already in use.
								</div>

								<div class='text-center' ng-show='email_pass_not_found_err_flag' style='background-color:red;color:white;font-size:13px;'>
									Invalid email/password.
								</div>

								<div class='form-group'>
									<label for='inputEmail'>Email Address</label>
									<input id='inputEmail' name='inputEmail' ng-model='inputEmail' class='form-control' placeholder='Email Address' />
								</div>

								<div class='text-center' ng-show='email_max_len_err_flag' style='color:red;'>
									Upto 35 characters allowed.
								</div>


								<div id='emailErr' ng-show='email_err_flag' class='text-center' style='color:red;'>
									Please enter valid E-mail.
								</div>

								<div id='Pass' ng-show='pass_flag' class='form-group'>
									<label for='inputPass'>Password</label>
									<input type='password' ng-blur='pass_blur()' ng-model='inputPass' class='form-control' placeholder='Password' id='inputPass'
									/>
								</div>


								<div class='text-center' ng-show='pass_max_len_err_flag' style='color:red;'>
									Upto 25 characters allowed.
								</div>

								<div class='form-group' ng-show='confirm_pass_flag' id='confirmPass'>
									<label for='inputConfirmPass'>Confirm Password</label>
									<input type='password' ng-blur='confirm_pass_blur()' ng-model='inputConfirmPass' class='form-control' placeholder='Confirm Password'
									 id='inputConfirmPass' />
								</div>

								<div id='passErr' ng-show='pass_err_flag' class='text-center' style='color:red;'>
									Password should be atleast 3 characters.
								</div>

								<div id='passMatchErr' ng-show='pass_mismatch_err_flag' class='text-center' style='color:red;'>
									Passwords do not match.
								</div>


								<div id='forgotPass' ng-click='forgot_pass_clk()' ng-show='forgot_pass_flag' class='text-center form-group row' style='font-size:12px;cursor:pointer;'>
									Forgot Password?
								</div>


								<div id='backToLogin' ng-click='bck_to_lgn_clk()' ng-show='bck_to_lgn_flag' class='text-center form-group row' style='font-size:12px;cursor:pointer;'>
									Back to Login
								</div>

								<div class='text-center'>
									<button type='submit'>Submit
								</button>
								</div>

								<div id='newUserSignUp' ng-click='sgn_up_clk()' ng-show='new_usr_sgn_up_flag' class='text-center' style='font-size:12px;cursor:pointer;'>
									{{new_usr_sgn_up_txt}}
								</div>

							</form>

						</div>
					</div>

				</div>

			</div>
		</div>

		<!--Login Page***-->

	</div>