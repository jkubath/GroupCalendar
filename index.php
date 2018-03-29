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
            <h5>You found the...</h5>
            <h1>Best Place To Start</h1>
            <p class="flow-text">To create your calendar to the next level with our services</p>
            <br>
            <a href="signup.php" class="btn btn-large white black-text">Sign Up</a>
            <a href="#contact" class="white-text">
              <i class="material-icons medium scroll-icon">arrow_drop_down_circle</i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
<!--  End of Header Section -->


<!--  Start of Body Section -->

  <!-- Section: About -->
<section id="about" class="section blue darken-3 center scrollspy">
  <div class="container ">
    <h2>About Calendar</h2>
    <p class="flow-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis odit, at repellendus consequatur neque placeat
      esse explicabo voluptas reprehenderit nobis?</p>

  </div>
</section>
  <!-- End Section: About -->


<!-- Section: Features -->
<section id="Features" class="section section-about grey lighten-3 center scrollspy">
  <div class="container">
    <h3>We bring you ...</h2>
    <p class="flow-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis odit, at repellendus consequatur neque placeat
      esse explicabo voluptas reprehenderit nobis?</p>
    <div class="row">
      <div class="col s12 m6">
        <img src="img/iron1.jpg" alt="" class="responsive-img circle">
      </div>
      <div class="col s12 m5 offset-m1">
        <br>
        <ul class="collection with-header z-depth-4">
          <li class="collection-header">
            <h5>Features</h5>
          </li>
          <li class="collection-item">
            <i class="material-icons left">check</i> Month View
          </li>
          <li class="collection-item">
            <i class="material-icons left">check</i> Week View
          </li>
          <li class="collection-item">
            <i class="material-icons left">check</i> Day view
          </li>
          <li class="collection-item">
            <i class="material-icons left">check</i> Group Managament
          </li>
          <li class="collection-item">
            <i class="material-icons left">check</i> Custom Design
          </li>
          <li class="collection-item">
            <i class="material-icons left">check</i> Cloud Connection
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End Section: Features -->



<!-- Section: Contact -->
<section id="contact" class="section grey lighten-5 center scrollspy">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 offset-m3">
        <div class="card-panel">
          <h4>Contact Us</h4>
          <div class="input-field">
            <input type="text" id="name" placeholder="Name">
            <label for="name">Name</label>
          </div>
          <div class="input-field">
            <input type="email" id="email" placeholder="Email">
            <label for="email">Email</label>
          </div>
          <div class="input-field">
            <input type="text" id="phone" placeholder="Phone Number">
            <label for="phone">Phone</label>
          </div>
          <div class="input-field">
            <textarea class="materialize-textarea" id="message" placeholder="Message"></textarea>
            <label for="message">Message</label>
          </div>
          <input type="submit" value="Submit" class="btn blue-grey">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Section: Contact -->


<!--  End of Body Section -->

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
