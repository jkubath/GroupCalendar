<?php
require_once('../includes/databaseConnection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->


  <link rel='stylesheet' href='../includes/fullcalendar/fullcalendar.css' />
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
  <section class="section center scrollspy" id="calendar-section">
    <div class="container" id="container-width">
      <div class="row" id="calendar-container">
        <div class="col s3 purple accent-4" id="calendar-left"></div>
        <div class="col s9 deep-orange darken-2" id="calendar-right"></div>
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
      $("#navbar-switch").removeClass("navbar-fixed");
      $("#navbar-switch").addClass("navbar");


      // page is now ready, initialize the calendar...
      $('#calendar-left').fullCalendar({
        header :{
          left: 'title',
          right: 'prev,next'
        },
        dayClick: function(date, jsEvent, view) {
          // FOR TESTING
          $(this).css('background-color', 'grey');
        },

        height: "auto",
        // events: './getCalendarEvents.php'
      }),


      $('#calendar-right').fullCalendar({
        header :{
          left: 'today,prev,next',
          center: 'addEventButton',
          right: 'month,agendaWeek,agendaDay, basicDay,basicWeek'
        },
        customButtons: {
          addEventButton: {
            text: 'add event...',
            click: function() {
              var dateStr = prompt("Enter a date in YYYY-MM-DD format");
              var titleStr = prompt("Enter a name for the event");
              var date = moment(dateStr);
              var allDayBool = true;

              if (date.isValid()) {
                $("#calendar-right").fullCalendar("renderEvent", {
                  title: titleStr,
                  start: date,
                  allDay: allDayBool
                });
                alert("Great. Now, update your database...");
                $.ajax({
                  url: "./addCalendarEvents.php",
                  type: "POST",
                  data: {"dateStr": dateStr, "title": titleStr, "allDay": allDayBool },
                  success: function () {
                    alert("Added successfully!");
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("some error");
                  }
                });
              } else {
                alert('Invalid date.');
              }
            }
          }
        },
        dayClick: function(date, jsEvent, view) {
          // FOR TESTING
          $(this).css('background-color', 'grey');
        },

        height: "auto",
        events: './getCalendarEvents.php'
      })

      

    });
    

  </script>
</body>


</html>
