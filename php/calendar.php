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
  <section class="section center scrollspy" id="calendario">
    <div class="container">
      <div class="row" id="calendar-container">
        <div class="col s12" id="calendar"></div>
      </div>
    </div>
  </section>

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
        header :{
          left: 'today, prev,next',
          center: 'title',
          right: 'month,agendaWeek,agendaDay, basicDay,basicWeek'
        },
        dayClick: function(date, jsEvent, view) {
          // alert('Clicked on: ' + date.format());
          // alert('Coordinates: ' + jsEvent.pageX + ', ' + jsEvent.pageY);
          // alert('Current view: ' + view.name);
          $(this).css('background-color', 'grey');
        },
        
        height: "auto"
      //  events: './getCalendarEvents.php'
    })

    });

  </script>
</body>


</html>
