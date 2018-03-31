<!DOCTYPE html>
<html>

<head>

  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->

  <title>My Calendar</title>
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
    <div class="container">
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
            <img src="../img/iron1.jpg" alt="" class="responsive-img circle">
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
  </script>
</body>

</html>
