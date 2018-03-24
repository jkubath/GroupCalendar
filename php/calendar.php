<!DOCTYPE html>
<html>
    <head>
      <title>Calendar</title>
      
      <link rel='stylesheet' href='../css/clndr.css' />
      <link rel='stylesheet' href='../includes/fullcalendar/fullcalendar.css' />
      <script src='../includes/jquery-3.3.1.min.js'></script>
      <script src='../includes/moment.min.js'></script>
      <script src='../includes/fullcalendar/fullcalendar.js'></script>
      
      
      <script>
        $(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
              // put your options and callbacks here
            })


          });
      </script>

    
    </head>
    <body>
      <div id="calendar"></div>
    </body>

    </html>