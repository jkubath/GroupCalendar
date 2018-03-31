<!DOCTYPE html>
<html>

<head>

  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->

  <title>Sign up</title>
</head>

<body id="home" class="scrollspy">
  <!--  Start of Header Section-->
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
            <h1>Create An Account</h1>
            <div class="container transparent ">
              <div class="row transparent">

                <div class="col s12 m6 offset-m3 transparent">
                  <form>
                    <div class="input-field">
                      <input type="text" id="first-name">
                      <label for="first-name" id="first-name-label">First Name</label>
                    </div>
                    <div class="input-field">
                      <input type="text" id="last-name">
                      <label for="last-name" id="last-name-label">Last Name</label>
                    </div>
                    <div class="input-field">
                      <input type="email" id="email">
                      <label for="email" id="email-label">Email</label>
                    </div>
                    <div class="input-field">
                      <input type="password" id="password">
                      <label for="password" id="password-label">Password</label>
                    </div>

                    <input type="submit" value="Sign up" class="btn btn-large purple btn-extend">
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
  <script>
    $(document).ready(function () {
      // Init Sidenav
      $('.button-collapse').sideNav();

      // Init Scrollspy
      $('.scrollspy').scrollSpy()

      // ScrollFire
      const options = [
      {
        selector: '.main-text', offset: 0, callback: function (el) {
          Materialize.fadeInImage($(el));
        }
      },
      {
        selector: '.navbar-fixed', offset: 1500, callback: function () {
          $('nav').removeClass('transparent');
          $('nav').addClass('blue-grey darken-4');
        }
      },

      ];
      
      Materialize.scrollFire(options);
      
    });
    
    $(document).ready(function () {
      // First name field
      $("#first-name").focus(function() {
        $("#first-name-label").addClass("active");
      }); 
      $("#first-name").focusout(function() {
        $("#first-name-label").removeClass("active");
      }); 

      // Last name field
      $("#last-name").focus(function() {
        $("#last-name-label").addClass("active");
      }); 
      $("#last-name").focusout(function() {
        $("#last-name-label").removeClass("active");
      }); 
      
      // Email field
      $("#email").focus(function() {
        $("#email-label").addClass("active");
      }); 
      $("#email").focusout(function() {
        $("#email-label").removeClass("active");
      }); 
      
      // Password field
      $("#password").focus(function() {
        $("#password-label").addClass("active");
      }); 
      $("#password").focusout(function() {
        $("#password-label").removeClass("active");
      }); 
    });
  </script>
</body>


</html>
