<!DOCTYPE html>
<html>
<head>
  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->

  
  <link rel='stylesheet' href='../includes/fullcalendar/fullcalendar.css' />
  
  <!-- <script src='../js/.js'></script> -->
  <link rel='stylesheet' href='../css/calendar.css' />


  <title>Calendar</title>
</head>
<body>
  <header>
    <div>
      <!-- Navigation Bar -->
      <?php include "../includes/navigation-bar.inc.php"; ?>
      <!-- End of Navigation Bar -->  
    </div>
  </header>
  
  <div class="container" id='calendar-container'>
    <div id="calendar"></div>
  </div>
  
  <!-- Footer -->
  <footer class="page-footer blue-grey darken-1">  
    <?php include "../includes/footer.inc.php"; ?>
  </footer>
  <!-- End of footer-->


  <!-- JavaScript at end of body for optimized loading -->
  <?php include "../includes/js-meta-data.inc.php"; ?> 
  
  <script type="text/JavaScript">
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
