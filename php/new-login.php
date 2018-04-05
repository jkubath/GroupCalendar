<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->

  <title>Sign in</title>
</head>

<body>
  <!-- Start of Header Section-->
  <header class="main-header">
    <div class="primary-overlay">

      <!-- Navigation Bar -->
      <?php include "../includes/navigation-bar.inc.php"; ?>
      <!-- End of Navigation Bar -->

      <!-- Showcase Panel -->
      <div class="showcase container">
        <div class="row">
          <div class="col s12 main-text">
            <h5>Welcome to Calendar</h5>
            <h1>Sign in to your Account</h1>
            <div class="container transparent ">
              <div class="row transparent">

                <div class="col s12 m6 offset-m3 transparent">
                  <form>
                    <div class="input-field">
                      <input type="text" id="username">
                      <label for="username" id="username-label">Username</label>
                    </div>
                    <div class="input-field">
                      <input type="password" id="password">
                      <label for="password" id="password-label">Password</label>
                    </div>
                    <!-- Added the onclick function to validate the form, onclick="validateFormLogin()"-->
                    <input id="submitButton" onclick="validateFormLogin(); return false;" type="submit" value="Sign In" class="btn btn-large purple btn-extend">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--  End of Header Section -->



  <!-- Footer -->
  <footer class="page-footer blue-grey darken-1">
    <?php include "../includes/footer.inc.php"; ?>
  </footer>
  <!-- End of footer-->

  <!--JavaScript at end of body for optimized loading-->
  <?php include "../includes/js-meta-data.inc.php"; ?>
  <script type="text/javascript">
    $(document).ready(function () {
      // Email field
      $("#username").focus(function() {
        $("#username-label").addClass("active");
      });
      $("#username").focusout(function() {
        if ($("#username").val() == '') {
          $("#username-label").removeClass("active");
        }
      });

      // Password field
      $("#password").focus(function() {
        $("#password-label").addClass("active");
      });
      $("#password").focusout(function() {
        if ($("#password").val() == '') {
          $("#password-label").removeClass("active");
        }
      });
    });

    function validateFormLogin() {
      var errorFlag = false;
      //Only allow letters and numbers for the username and password
      var usernameBoxTest = /^[a-zA-Z0-9]{1,40}$/;
      var passwordBoxTest = /^[a-zA-Z0-9]{1,40}$/;
      
      if(!usernameBoxTest.test(username.value)) {
        document.getElementById('username').style.backgroundColor = '#bb3333';
        document.getElementById('username').style.color = 'white';
        // document.getElementById('usernameLoginError').innerHTML = 'Invalid Username.  Can only contain letters and numbers.';
        // document.getElementById('usernameLoginError').style.color = '#FFFFFF';
        errorFlag = true;
      }
      
      if(!passwordBoxTest.test(password.value)) {
        document.getElementById('password').style.backgroundColor = '#bb3333';
        document.getElementById('password').style.color = 'white';
        // document.getElementById('passwordLoginError').innerHTML = 'Invalid Password.  Can only contain letters and numbers. Must be at least 8 characters in length.';
        // document.getElementById('passwordLoginError').style.color = '#FFFFFF';
        errorFlag = true;
      }
      
      if (!errorFlag) {
        xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "fail") {
              //alert("failed");
              document.getElementById('username').style.backgroundColor = '#bb3333';
              document.getElementById('username').style.color = 'white';
              // document.getElementById('usernameLoginError').innerHTML = 'Invalid Login.  Username/Password do not exist.';
              // document.getElementById('usernameLoginError').style.color = '#FFFFFF';
              
              document.getElementById('password').style.backgroundColor = '#bb3333';
              document.getElementById('password').style.color = 'white'
            } else {
              document.location.href = "./calendar.php";
            }
          }
        };

        xmlhttp.open("GET", "CheckLogin.php?enteredUsername=" + username.value + "&enteredPassword=" + password.value, true);
        xmlhttp.send();

      }
  }
</script>
</body>
</html>


