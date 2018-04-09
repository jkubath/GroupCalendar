<!-- Start of Navigation bar-->
<div class="navbar-fixed" id="navbar-switch">
  <nav class="transparent" id="navbar">
    <div class="container">
      <div class="nav-wrapper">
        <a href="../php/calendar.php" class="brand-logo">Calendar</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="../index.php">Home</a>
          </li>
          <li>
            <a href="../index.php#about">About</a>
          </li>
          <li>
            <a href="../index.php#features">Features</a>
          </li>
          <li>
            <a href="../index.php#contact">Contact</a>
          </li>
          <!-- <li>
            <a href="../php/signup.php">Sign Up</a>
          </li> -->
            <?php if(isset($_SESSION["username"]) && $_SESSION["username"] != "") {
              //echo '<li><div class="btn blue" ">' . $_SESSION['username']. '</div></li>';

              echo '<li ><a href="#" id="logOutButton">Log Out</a></li>';
              echo '<li><a href="../php/calendar.php" class="btn blue">' . $_SESSION['username'] . '</a></li>';
            }
            else {
              echo '<li><a href="../php/signup.php">Sign Up</a></li>';
              echo '<li><a href="../php/new-login.php" class="btn blue">Log In</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!-- End of Naviagation bar-->

<!-- Side nav for mobile devices-->
<ul class="side-nav " id="mobile-nav">
  <h4 class="black-text center">Calendar</h4>
  <li>
    <div class="divider"></div>
  </li>
  <li>
    <a href="#home">Home</a>
  </li>
  <li>
    <a href="#about">About</a>
  </li>
  <li>
    <a href="#features">Features</a>
  </li>
  <li>
    <a href="#contact">Contact</a>
  </li>
  <li>
    <a href="signup.php">Sign Up</a>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <li>
    <a href="login.php" class="btn blue">Login</a>
  </li>
</ul>
<!-- End of side nav for mobile devies-->

<!-- Log out function -->
<script type='text/javascript'>
  $(document).ready(function() {
    $("#logOutButton").click(function logOut() {
      $.ajax({
        type: "POST",
         url: './resetSessionUsername.php',
         dataType: "JSON", //tell jQuery to expect JSON encoded response
         success: function (response){
          if(response.success === 'success'){
            //alert("User Logged Out");
            window.location.href = "../php/new-login.php";
          }
          else {
            alert("Log out failed");
          }
         }
      });
    });
  });
</script>
