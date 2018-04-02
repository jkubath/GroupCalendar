<?php session_start(); ?>
<!DOCTYPE html>
<head>
  <title>Group Calendar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="..\css\login.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<div id='toolbar'>
        This is the toolbar-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      </div>
	<div class="loginContainer">

	<?php

	  //Are we trying to log in?
	  if (!isset($_SESSION["login"])) {
		  $_SESSION["login"] = "";
	  }

	  $_SESSION["username"] = "";
	  if(strcmp($_SESSION["login"], "") == 0 || strcmp($_SESSION["login"], "login") == 0) {
	    //Make the login box
	    login();
	  }
	  //Are they trying to register
	  else if(strcmp($_SESSION["login"], "register") == 0) {
	    register();
	  }

	function login() {
	?>
	  	<!--//Make the login box -->
	    <div class="login">
	    	<h1 id="loginTitle">LOGIN</h1>

	    	<!-- Username -->
	    	<div class="username"><input type="text" id="usernameBox" placeholder="Username" name="username"></div>
	    	<span id="usernameLoginError"></span>

	    	<!-- Password -->
	    	<div class="password"><input type="password" id="passwordBox" placeholder="Password" name="password"></div>
	    	
	    	<span id="passwordLoginError"></span>
	    	<br />

			
			<div id="loginButtonWrapper">
				<!-- Redirect to the create account -->
				<a id="createAccountLink" onclick="changePageType()">No account? Create an Account.</a>

				<br />
				<br />

				<!-- Validate the login -->
				<button id="loginButton" onclick="validateFormLogin()">Login</button>
			</div>

	    </div>

	</div>


	  	<?php
	  } // End of login function

	  function register() {
	  	?>
	  	<!-- Make the login box -->
		<div class="register">
			<h1 id="registerTitle">CREATE ACCOUNT</h1>
			
			<!-- User Account table -->
			<div class="myTable">
				
				<!-- First name -->
				<div class="row">
					<div class="col-xs-12">
						<input type="text" id="firstName" placeholder="First Name" name="first">
					</div>
					<span id="firstNameRegisterError"></span>
				</div>

				<!-- Last name -->
				<div class="row">
					<div class="col-xs-12">
						<input type="text" id="lastName" placeholder="Last Name" name="last">
					</div>
					<span id=\"lastNameRegisterError\"></span>
				</div>
				
				<!-- Username -->
				<div class="row">
					<div class="col-xs-12">
						<input type="text" id="username" placeholder="Username" name="username">
					</div>
					<span id="usernameRegisterError"></span>
				</div>

				<!-- Password -->
				<div class="row">
					<div class="col-xs-12">
						<input type="password" id="password" placeholder="Password" name="password">
					</div>
					<span id="passwordRegisterError"></span>
				</div>

				<!-- Confirm Pasword -->
				<div class="row">
					<div class="col-xs-12" id="confirm">
						<input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirm">
					</div>
					<span id="confirmPasswordRegisterError"></span>
				</div>

				<!-- Address -->
				<div class="row">
					<div id="tableAddress" class="col-xs-12">
						<input type="text" id="address" placeholder="Address" name="address">
					</div>
					<span id="addressRegisterError"></span>
				</div>
				
				<!-- City -->
				<div class="row">
					<div class="col-xs-12">
						<input type="text" id="city" placeholder="City" name="city">
					</div>
					<span id="cityRegisterError"></span>
				</div>
				
				<!-- State -->
				<div class="row">
					<div class="col-xs-12">
						<input type="text" id="state" placeholder="State" name="state">
					</div>
					<span id="stateRegisterError"></span>
				</div>
				
				<!-- Zip Code -->
				<div class="row">
					<div class="col-xs-12">
						<input type="text" id="zipCode" placeholder="Zip Code" name="zipCode">
					</div>
					<span id="zipCodeRegisterError"></span>
				</div>

				<div id="registerButtonWrapper">
					<!-- Back to login -->
					<a id="backToLoginLink" onclick="changePageType()">Back to Login.</a>
				
					<br />

					<!-- Validate the form -->
					<button id="registerButton" onclick=\"validateFormRegister();\">Register</button>	
				</div>
			</div> <!-- Close the table -->
		</div> <!-- End of Register html -->

	</div>
	
</body>

	<?php
	}
	?> <!-- End of register function -->

	<script>
	 function changePageType() {
	 	//Call ChangeLoginPage.php to set the 
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "ChangeLoginPage.php", true);
		xmlhttp.send();
		window.setTimeout(innerChangePageType, 10);
		function innerChangePageType() {
			document.location.href = "./login.php";
		}
	}

  	</script>

<?php
  	function validateFormLogin() {
	  var errorFlag = false;
	  //Only allow letters and numbers for the username and password
      var usernameBoxTest = /^[a-zA-Z0-9]{1,40}$/;
	  var passwordBoxTest = /^[a-zA-Z0-9]{8,40}$/;
	  
	  if(!usernameBoxTest.test(usernameBox.value)) {
		document.getElementById('usernameBox').style.backgroundColor = '#bb3333';
		document.getElementById('usernameBox').style.color = 'white';
		document.getElementById('usernameLoginError').innerHTML = 'Invalid Username.  Can only contain letters and numbers.';
		document.getElementById('usernameLoginError').style.color = '#FFFFFF';
		errorFlag = true;
	  }
	  
	  if(!passwordBoxTest.test(passwordBox.value)) {
		document.getElementById('passwordBox').style.backgroundColor = '#bb3333';
		document.getElementById('passwordBox').style.color = 'white';
		document.getElementById('passwordLoginError').innerHTML = 'Invalid Password.  Can only contain letters and numbers. Must be at least 8 characters in length.';
		document.getElementById('passwordLoginError').style.color = '#FFFFFF';
		errorFlag = true;
	  }
	  
	  if (!errorFlag) {
		    xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if (this.responseText == "fail") {
						document.getElementById('usernameBox').style.backgroundColor = '#bb3333';
						document.getElementById('usernameBox').style.color = 'white';
						document.getElementById('usernameLoginError').innerHTML = 'Invalid Login.  Username/Password do not exist.';
						document.getElementById('usernameLoginError').style.color = '#FFFFFF';
						
						document.getElementById('passwordBox').style.backgroundColor = '#bb3333';
						document.getElementById('passwordBox').style.color = 'white'
					} else {
						document.location.href = "./Main.php";
					}
				}
			};
			xmlhttp.open("GET", "CheckLogin.php?enteredUsername=" + usernameBox.value + "&enteredPassword=" + passwordBox.value, true);
			xmlhttp.send();
	  }
	}

?>
