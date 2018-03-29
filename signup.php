<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import css files -->
  <link type="text/css" rel="stylesheet" href="css1/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css1/style.css" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Calendar</title>
</head>

<body id="home" class="scrollspy">
  <!--  Start of Header Section-->
  <header class="main-header">
    <div class="primary-overlay">
      <div class="navbar-fixed">
        <nav class="transparent">
          <div class="container">
            <div class="nav-wrapper">
              <a href="#home" class="brand-logo">Calendar</a>
              <a href="#" data-activates="mobile-nav" class="button-collapse">
                <i class="material-icons">menu</i>
              </a>
              <ul class="right hide-on-med-and-down">
                <li>
                  <a href="index.php">Home</a>
                </li>
                <li>
                  <a href="index.php#about">About</a>
                </li>
                <li>
                  <a href="index.php#features">Features</a>
                </li>
                <li>
                  <a href="index.php#contact">Contact</a>
                </li>
                <li>
                  <a href="signup.php">Sign Up</a>
                </li>
                <li>
                  <a href="login.php" class="btn blue">Log In</a>
                </li>

              </ul>
            </div>
          </div>
        </nav>
      </div>
      <!-- Side nav  for mobile devices-->
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
                        <input type="text" id="first_name">
                        <label for="first_name">First Name</label>
                      </div>
                      <div class="input-field">
                        <input type="text" id="last_name">
                        <label for="last_name">Last Name</label>
                      </div>
                      <div class="input-field">
                        <input type="email" id="email">
                        <label for="email">Email</label>
                      </div>
                      <div class="input-field">
                        <input type="password" id="password">
                        <label for="password">Password</label>
                      </div>

                      <input type="submit" value="Signup" class="btn btn-large purple btn-extend">
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
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5>Location:</h5>
        <p>The Calendar, INC</p>
        <p>1903 W Michigan Av, Kalamazoo MI</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li>
            <a class="white-text" href="#home">Home</a>
          </li>
          <li>
            <a class="white-text" href="#about">About</a>
          </li>
          <li>
            <a class="white-text" href="#testimonials">Features</a>
          </li>
          <li>
            <a class="white-text" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright blue-grey darken-4">
    <div class="container">
      Calendar © 2018
      <a class="grey-text text-lighten-4 right" href="#home">
        <i class="material-icons left">keyboard_arrow_up</i> Back To Top
      </a>
    </div>
  </div>
</footer>


  <!-- Script to initialize -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
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
  </script>
</body>


</html>
