<!DOCTYPE html>
<html>
    <head>
      <title>Calendar</title>
      
      <link rel='stylesheet' href='../css/calendar.css' />
      <link rel='stylesheet' href='../includes/fullcalendar/fullcalendar.css' />
      <script src='../includes/jquery-3.3.1.min.js'></script>
      <script src='../includes/moment.min.js'></script>
      <script src='../includes/fullcalendar/fullcalendar.js'></script>
      
      
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

    
    </head>
    <body>
      <div id='toolbar'>
        This is the toolbar---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      </div>
      <div id='calendar-container'>
       <div id="calendar"></div>
     </div>
    </body>

    </html>