<!DOCTYPE html>
<html>
<head>
  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->

  <link rel='stylesheet' href='../css/calendar.css' />
  <link rel='stylesheet' href='../includes/fullcalendar/fullcalendar.css' />
  <script src='../includes/jquery-3.3.1.min.js'></script>
  <script src='../includes/moment.min.js'></script>
  <script src='../includes/fullcalendar/fullcalendar.js'></script>
  <script src='../js/.js'></script>


  <title>Calendar</title>
</head>
<body>
  <header class="main-header">
    <div class="primary-overlay">
      <!-- Navigation Bar -->
      <?php include "../includes/navigation-bar.inc.php"; ?>
      <!-- End of Navigation Bar -->
    </div>

  </header>
  <div class="container" id='calendar-container'>
   <div id="calendar"></div>
 </div>

<script>
  $(document).ready(function() {

          // page is now ready, initialize the calendar...

          $('#calendar').fullCalendar({
            // put your options and callbacks here
            height: 'parent',
            events: './getCalendarEvents.php'
            //contentHeight: 'auto'
          })


        });
      </script>
    </body>


    </html>
