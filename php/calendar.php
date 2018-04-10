<?php
require_once('../includes/databaseConnection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Style meta data -->
  <?php include "../includes/style-meta-data.inc.php"; ?>
  <!-- End of style meta data -->

  <!-- JavaScript at end of body for optimized loading -->
  <?php include "../includes/js-meta-data.inc.php"; ?>


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

  <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
   <div class="modal-content">

     <h4 >Modal Header</h4>
     <p >A bunch of text</p>
   </div>
   <div class="modal-footer">
     <a href="#!" class="modal-action modal-close waves-effect  btn blue">Add</a>
     <a href="#!" class="modal-action modal-close waves-effect  btn red">Remove</a>
     <a href="#!" class="modal-action modal-close waves-effect  btn black">Close</a>

   </div>
 </div>



 <!-- Modal Structure -->
 <div id="modal2" class="modal">
   <div class="modal-content">

     <h4 id="titleEvent">Modal 2</h4>
     <p id="descriptionEvent">A bunch of text 2</p>
   </div>
   <div class="modal-footer">
     <a href="#!" class="modal-action modal-close waves-effect  btn green">Modify</a>
     <a href="#!" class="modal-action modal-close waves-effect  btn red">Remove</a>
     <a href="#!" class="modal-action modal-close waves-effect  btn black">Close</a>

   </div>
 </div>
 <!-- Footer -->
 <footer class="page-footer blue-grey darken-1">
  <?php include "../includes/footer.inc.php"; ?>
</footer>
<!-- End of footer-->

<script type="text/JavaScript">
  $(document).ready(function() {
    $("#navbar-switch").removeClass("navbar-fixed");
    $("#navbar-switch").addClass("navbar");

    $('#calendar-right').fullCalendar({
      editable: true, //Allows for drag and drop events
      eventLimit: true,
      googleCalendarApiKey: 'AIzaSyCTsqrwq81z9cpRL8utVvSDAywz2zkBZ1s',
      //Their api key
      //googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

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

          //$(this).css('background-color', 'grey');
          $('#modal1').modal();
          $('#modal1').modal('open');
          //var elem = document.querySelector('.modal');
          //var instance = M.Modal.init(elem, options);
          //instance.open();
        },
          //events: 'http://localhost:8887/GroupCalendar/php/events.php',

          eventClick: function(calEvent, jsEvent, view){
            $('#titleEvent').html(calEvent.title);
            $('#descriptionEvent').html(calEvent.description);
            $('#modal2').modal();
            $('#modal2').modal('open');
            //$('#modal2').modal();
            //$('#modal2').modal('open');
          },
          viewRender: function (view, element) {
            /* Each time the view changes, the table is deleted and recreated */

            // Delete
            $("#calendar-left-table").remove();

            // Create
            $("#calendar-left").append("<table class='highlight' id='calendar-left-table'></table>");
            $("#calendar-left-table").append("<caption>Event List</caption>");
            $("#calendar-left-table").append("<thead id='table-head'></thead>");
            $("#table-head").append("<tr id='head-row'></tr>");
            $("#head-row").append("<th>Title</th>");
            $("#head-row").append("<th>Start</th>");
            $("#head-row").append("<th>End</th>");
            $("<tbody id='table-body'></tbody>").insertAfter("#table-head");
          },

          height: "auto",
          eventSources: [
            {
              //Get google holiday events
              googleCalendarId: 'en.usa#holiday@group.v.calendar.google.com' },
            {
              url: './getCalendarEvents.php',
              success: function(data) {

                var table = $("#calendar-left-table")[0];

                /* We need to give each row a different id/class to prevent duplicate entries */
                var i = 0;

                $.each(data, function(key, value) {

                  var title = data[key]['title'];
                  var start = data[key]['start'];
                  var end = data[key]['end'];

                  $("#table-body").append("<tr id='table-row-"+i+"'></tr>");
                  $("#table-row-"+i).append("<td>" + title + "</td>");
                  $("#table-row-"+i).append("<td>" + start + "</td>");
                  $("#table-row-"+i).append("<td>" + end + "</td>");

                  i++;
                });

              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("some error");
              }
          }
         ],// Second source
         eventDrop: function(event, delta, revertFunc) {
            alert(event.title + " was dropped on " + event.start.format());

            //Confirm with the user
            if (!confirm("Are you sure about this change?")) {
              //Revert the changes
              revertFunc();
            }
            //Change the date in the database
            else {
              $.ajax({
                url: "./updateCalendarEvents.php",
                type: "POST",
                data: {"id": event.id, "start": event.start.format(), "end": event.end.format()},
                success: function () {
                  //alert(event.title + " updated successfully!");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert("Update failed");
                  revertFunc();
                }
              });
            }
          },
        eventResize: function(event, delta, revertFunc) {
          /* Full calendar makes an all day event on 2018-04-29 end on 2018-04-30
           * This just subtracts on so it ends on 2018-04-29 
           * This prevents the user from being confused by the date
           */
          if(event.allDay){
            event.end.subtract(1, "days");
          }
          
          alert(event.title + " end is now " + event.end.format());

          /* Re-add the subtracted day */
          if(event.allDay){
            event.end.add(1, "days");
          }
          //Confirm with the user
          if (!confirm("Are you sure about this change?")) {
            //Revert the changes
            revertFunc();
          }
          //Change the date in the database
          else {
            $.ajax({
              url: "./updateCalendarEvents.php",
              type: "POST",
              data: {"id": event.id, "start": event.start.format(), "end": event.end.format()},
              success: function () {
                //alert(event.title + " updated successfully!");
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Update failed");
                revertFunc();
              }
            });
          }
        }


        });
  });


</script>
</body>
</html>
