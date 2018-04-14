<?php
require_once('../includes/databaseConnection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>

  <!-- JavaScript at end of body for optimized loading -->
  <?php include "../includes/js-meta-data.inc.php"; ?>

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
        <div class="col m2 l2" id="calendar-left">

          <div class="row" id="calendar-container">

              <div class="col s12  blue-grey lighten-5" id="calendar-left"></div>
              <div class="col s12 blue lighten-5" id="lista">
                <div class="row">
                  <p> This will be a list </p>

                  <div class="col s12">
                    <a id="btnAddUser" class="modal-action modal-close waves-effect waves-light btn blue">Add User</a>
                  <a id="btnRemoveUser" class="modal-action modal-close waves-effect waves-light btn red ">Remove User</a>
                  </div>

                </div>
              </div>

          </div>
        </div>

        <div class="col s12 m10 l10" id="calendar-right"></div>
      </div>
    </div>
  </section>

  <!-- Modal User Permissions-->
  <div id="modalUser" class="modal">
    <div class="modal-content">
      <div class="row">
        <h4 id="textPrompt"> Enter userID to both share your calendars:</h4>
        <div class="input-field col s12">
          <input id="userID" type="text" data-length="128">
          <label for="userID" id="userIDtext">UserID</label>
        </div>

      </div>

    </div>

    <div class="modal-footer">
      <a href="#!" id="btnAddUserModal" class="modal-action modal-close waves-effect btn blue">Add</a>
      <a href="#!" id="btnRemoveUserModal" class="modal-action modal-close waves-effect btn red">Remove</a>
      <a href="#!" id="btnCloseUserModal" class="modal-action modal-close waves-effect btn black">Close</a>
    </div>
  </div>

  <!-- Modal -->
  <div id="modal" class="modal">
    <div class="modal-content">

      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <input id="title" type="text" data-length="128">
              <label for="title" id="label-title">Title</label>
            </div>
            <div class="input-field col s3">
              <input id="text-color" type="text" > <!-- Picker Of Colors Later -->
              <label for="text-color" id="label-text-color">Text Color</label>
            </div>
            <div class="input-field col s3">
              <input id="background-color" type="text" > <!-- Picker Of Colors Later -->
              <label for="background-color" id="label-background-color">Background Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10">
              <textarea id="description" class="materialize-textarea" data-length="255"></textarea>
              <label for="description" id="label-description">Description</label>
            </div>
            <div class="input-field col s2">
              <!-- Switch -->
              <div class="switch">
                <label>
                  Off
                  <input id="switch-allday" type="checkbox" name="switch">
                  <span class="lever"></span>
                  On
                </label>
              </div>
              <label class="active" for="switch-allday" id="label-switch-allday">All Day</label> <!-- Conditions missing for now -->
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="date-start" type="text" class="datepicker">
              <label class="active" for="date-start" id="label-day-start">Start Date</label>
            </div>
            <div class="input-field col s6">
             <input id="hour-start" type="text" class="timepicker">
             <label for="hour-start" id="label-hour-start">Start Hour</label>
           </div>
         </div>
         <div class="row">
          <div class="input-field col s6">
            <input id="date-end" type="text" class="datepicker">
            <label class="active" for="date-end" id="label-day-end">End Date</label>
          </div>
          <div class="input-field col s6">
            <input id="hour-end" type="text" class="timepicker">
            <label for="hour-end" id ="label-hour-end">End Hour</label>
          </div>
        </div>


      </form>
    </div>
  </div>

  <div class="modal-footer">
    <a href="#!" id="btn-add" class="modal-action modal-close waves-effect  btn blue">Add</a>
    <a href="#!" id="btn-modify" class="modal-action modal-close waves-effect  btn green">Modify</a>
    <a href="#!" id="btn-remove" class="modal-action modal-close waves-effect  btn red">Remove</a>
    <a href="#!" id="btn-close" class="modal-action modal-close waves-effect  btn black">Close</a>

  </div>
</div><!--  End of Modal -->




<!-- Footer -->
<!-- <footer class="page-footer blue-grey darken-1"> -->
  <?php include "./footer.php"; ?>
<!-- </footer> -->

<!-- End of footer-->

<script type="text/JavaScript">
  $(document).ready(function() {

    /// PART CALENDAR LEFT ###########################################################
    $('#calendar-left').fullCalendar({
      //themeSystem: 'jquery-ui',
      header :{
        left: 'prev,next',
        center: 'title',
        right: ''
      },
      dayNamesShort: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
      height: "auto"
    });



    $("#navbar-switch").removeClass("navbar-fixed");
    $("#navbar-switch").addClass("navbar");
    $("#navbar").removeClass("transparent");

    var globalClickedEvent = null;

    $('#calendar-right').fullCalendar({
      editable: true, //Allows for drag and drop events
      eventLimit: true, //When there are more events than the day can hold, compress to a list
      googleCalendarApiKey: 'AIzaSyCb7F3cZOnQ-gmZCbFmjU6Z3DuBfe23jMo', //pull Google Calendar Events
      // themeSystem: 'jquery-ui',
      // themeButtonIcons: {
      //   prev: 'circle-triangle-w',
      //   next: 'circle-triangle-e',
      //   prevYear: 'seek-prev',
      //   nextYear: 'seek-next'
      // },
      header: {
        left: 'today,prev,next',
        center: 'importGoogle',
        right: 'month,agendaWeek,agendaDay, listMonth'//, basicDay,basicWeek'
      },
      customButtons: {
        /* Add a Google Calendar ID to the google_calendar table */
        importGoogle: {
          text: 'Import Google Calendar',
          click: function() {
            var calendarID = prompt("Enter the Google Calendar ID");
            if (calendarID === ""){
              alert("Calendar ID was empty");
              console.log("Calendar ID was empty");
              return;
            }

            /* Probably better to call session in the file itself */
            // var username = <?php //echo '"'.$_SESSION['username'].'"'; ?>;
            // console.log(username);

            console.log("Add the Google Calendar ID to the database");
            /* Add the calendar ID to the database */
            $.ajax({
              url: "./addGoogleCalendarID.php",
              type: "POST",
              data: {"calendarID": calendarID},
              success: function () {
                console.log("Google Calendar was added");
                //Re-render the calendar events
                location.reload();
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error adding the Google Calendar to the database");
              }
            });
          }
        }
      },
      /* Add an event to the calendar by clicking a day */
      dayClick: function(date, jsEvent, view) {
        /* When clicking on day, clears fields if it was previously filled. */
        $('#title').val('');
        $('#text-color').val('');
        $('#background-color').val('');
        $('#description').val('');
        $('#hour-start').val('');
        $('#date-end').val('');
        $('#hour-end').val('');

        /* Remove active class before opening the modal */
        $('#label-title').removeClass('active');
        $('#label-description').removeClass('active');
        $('#label-hour-start').removeClass('active');
        $('#label-hour-end').removeClass('active');
        $('#label-text-color').removeClass('active');
        $('#label-background-color').removeClass('active');


        $('#modal').modal();
        $('#modal').modal('open');


        /* Reset all day for dayclick */
        $('#switch-allday').prop("checked", false);
        $('#hour-start').prop("disabled", false);
        $('#date-end').prop("disabled", false);
        $('#hour-end').prop("disabled", false);

        /* Always fileld so should always be active */
        $('#label-day-start').addClass('active');
        $('#label-day-end').addClass('active');


        var elem = document.querySelector('#date-start');
        var instance = M.Datepicker.init(elem, options = {
          defaultDate: new Date(date.format("MMM DD, YYYY")),
          setDefaultDate: true,
        });

        $('#date-start').val(date.format("MMM DD, YYYY"));

          //var elem2 = document.querySelector('#hour-start');
          //var instance2 = M.Timepicker.init(elem, options);
          $('#hour-start').timepicker();
          $('#hour-end').timepicker();


          $("#date-end").val(date.format("MMM DD, YYYY"));
          $("#date-end").click(function(){
            console.log("Click ... !");
            $(document).ready(function(){
              $('#date-end').datepicker();
              $('#date-end').datepicker('open');
            });
          })


          $("#btn-add").show();
          $("#btn-remove").hide();
          $("#btn-modify").hide();
      }, //dayClick end

      eventClick: function(calEvent, jsEvent, view){
        globalClickedEvent = calEvent.id;
        console.log("Clicked event id: " + globalClickedEvent);

        /* Move the labels before opening the modal */
        if (calEvent.title) {
          $('#label-title').addClass('active');
        }

        if ($("#description").val() != "" || $("#description").val() != null) {
          $('#label-description').addClass('active');
        }

        if (calEvent.start) {
          $('#label-hour-start').addClass('active');
        }

        if (calEvent.end) {
          $('#label-hour-end').addClass('active');
        }

        if (calEvent.textColor){
          $('#label-text-color').addClass('active');
        }

        if (calEvent.color){
          $('#label-background-color').addClass('active');
        }


        $('#label-day-start').addClass('active');
        $('#label-day-end').addClass('active');

        if (calEvent.allDay == true) {
          $("#switch-allday").prop("checked", true);

          $('#hour-start').prop("disabled", true);
          $('#date-end').prop("disabled", true);
          $('#hour-end').prop("disabled", true);
        } else {
          $("#switch-allday").prop("checked", false);

          $('#hour-start').prop("disabled", false);
          $('#date-end').prop("disabled", false);
          $('#hour-end').prop("disabled", false);
        }

        $('#modal').modal();
        $('#modal').modal('open');

        console.log(calEvent);


        $('#title').val(calEvent.title);
        $("#background-color").val(calEvent.color);
        $('#text-color').val(calEvent.textColor);
        $('#description').val(calEvent.description);

        $('#date-start').val(moment(calEvent.start).format("MMM DD, YYYY"));
        $('#hour-start').val(moment(calEvent.start).format("h:mm A"));

        $('#date-end').val(moment(calEvent.end).format("MMM DD, YYYY"));
        $('#hour-end').val(moment(calEvent.end).format("h:mm A"));



        $("#btn-modify").show();
        $("#btn-remove").show();
        $("#btn-add").hide();
      }, //eventClick end

      /* Auto resize the calendar */
      windowResizeDelay: 20,
      height: "auto",
      /* Pull calendar events from multiple sources */
      eventSources: [
        <?php include_once './getGoogleCalendars.php'; ?> //Adds all the user's public google calendars as eventSources
        {
          //Get google holiday events
          googleCalendarId: 'en.usa#holiday@group.v.calendar.google.com',
          editable: false
        },
        {
          url: './getCalendarEvents.php',
          success: function(data) {
            console.log("fetch succesful (./getCalendarEvents.php)");
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("fetch unsuccessful (./getCalendarEvents.php)");
          }
        }], // End of event sources

        /* Handle when the user drag and drops an event */
        eventDrop: function(event, delta, revertFunc) {
          console.log("event id: " + event.id + " title: " + event.title + " was dropped on " + event.start.format() + " and ends on " + event.end + " allday: " + event.allDay);
          var end;
          var allDayBoolean;
        /* (event.end == null) -> start + 1 day
         * (event.end != null) -> end
         */
         if (event.allDay) {
          if (event.end == null) {
            end = moment(event.start.format("YYYY-MM-DD HH:mm:ss").toString()).add(1, "days");
          } else {
            end = event.end;
          }
          allDayBoolean = 1;
        /* (event.end == null) -> start + 1 hour
         * (event.end != null) -> end
         */
       } else {
        if (event.end == null) {
          end = moment(event.start.format("YYYY-MM-DD HH:mm:ss").toString()).add(1, "h");
        } else {
          end = event.end;
        }
        allDayBoolean = 0;
      }

        //console.log(event.allDay);

        var description = $("#description").val();

        /* Update the database with the new information */
        $.ajax({
          url: "./updateCalendarEvents.php",
          type: "POST",
          data: {
            "id": event.id,
            "title": event.title,
            "start": event.start.format(),
            "end": end.format(),
            "allDay": allDayBoolean,
            "description": description,
            "color": event.color,
            "textColor": event.textColor
          },
          success: function () {
            console.log(event.title + " updated successful (./updateCalendarEvents.php)");
            $('#calendar-right').fullCalendar('refetchEvents');
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("updated unsuccessful (./updateCalendarEvents.php)");
            revertFunc();
          }
        });
        }, //End of event Drop

        /* Handle the resizing of events */
        eventResize: function(event, delta, revertFunc) {
          console.log(" title: " + event.title + " was dropped on " + event.start.format() + " ends on: " + event.end.format() + " allday: " + event.allDay);
          /* calendar_events table uses 1 and 0 to represent all day */
          if (event.allDay) {
            allDayBoolean = 1;
          } else {
            allDayBoolean = 0;
          }
          var description = $("#description").val();
          /* Update the information in the database */
          $.ajax({
            url: "./updateCalendarEvents.php",
            type: "POST",
            data: {
              "id": event.id,
              "title": event.title,
              "start": event.start.format(),
              "end": event.end.format(),
              "allDay": allDayBoolean,
              "description": description,
              "color": event.color,
              "textColor": event.textColor
            },
            success: function () {
              console.log(event.title + " updated successfully (./updateCalendarEvents.php)");
              $('#calendar-right').fullCalendar('refetchEvents');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("Update failed (./updateCalendarEvents.php)");
              revertFunc();
            }
          });
        } //End of event resizing
      });

/* Used to modify or add an event.  This function will collect the
 * data in the form to be sent to the database for adding/updating
 */
 function getEventData() {
  newEvent = {
    id: globalClickedEvent,
    title: $("#title").val(),
    start:moment($("#date-start").val() + " " + $("#hour-start").val() ).format('YYYY-MM-DD HH:mm:ss'),
    end:moment($("#date-end").val() + " " + $("#hour-end").val() ).format('YYYY-MM-DD HH:mm:ss'),
    allDay: $("#switch-allday").prop("checked")? 1 : 0,// $("#text-color").val()
    description: $("#description").val(),
    color: $("#background-color").val(),
    textColor: $("#text-color").val()
  };
}

/* Takes in an event object created om getEventData() and calls
 * the correct database action based on the action value
 */
 function sendEventDataToDB(action, objEvent) {
  console.log(newEvent);
  var php = null;
  console.log(action);
  if (action == 1) {
    php = "./addCalendarEvents.php";
  } else if (action == 2) {
    php = "./updateCalendarEvents.php";
  } else if (action == 3) {
    php = "./deleteCalendarEvents.php";
  }

  $.ajax({
    type: 'POST',
    url: php,
    data: objEvent,
    success:function (msg) {
      console.log(msg);
      $("#calendar-right").fullCalendar('refetchEvents');
      $('#modal').modal('close');
      console.log("Operation (" + php + ") successful.");
    },
    error:function(XMLHttpRequest, textStatus, errorThrown) {
      console.log(textStatus);
      console.log(errorThrown);
      console.log("Operation (" + php + ") failed.");
    }
  });
}

/* Add function when an event is added */
$("#btn-add").click(function(){
  getEventData();
  sendEventDataToDB(1, newEvent);
  $("#date-start").val('');
});

/* Add function when an event is modified */
$("#btn-modify").click(function(){
  getEventData();
  sendEventDataToDB(2, newEvent);
});

$("#btn-remove").click(function(){
  getEventData();
  sendEventDataToDB(3, newEvent);
});

/* Add function when an event is changed to an all day event */
$("#switch-allday").click(function() {
  if ($("#switch-allday").is(":checked")) {
    $('#hour-start').prop("disabled", true);
    $('#date-end').prop("disabled", true);
    $('#hour-end').prop("disabled", true);
    console.log()
    $('#date-end').val(moment($("#date-start").val()).add(1, "days").format("MMM DD, YYYY"));
  } else {
    $('#hour-start').prop("disabled", false);
    $('#date-end').prop("disabled", false);
    $('#hour-end').prop("disabled", false);
  }
});

////////////////////////////////////////////////////////////////////////
$("#btnAddUser").click(function(){
  $('#modalUser').modal();
  $('#modalUser').modal('open');

});

$("#btnAddUserModal").click(function () {
  var userID = {
    userID:$('#userID').val()
  };
  console.log(userID);
  console.log($('#userID').val());
    $.ajax({
      url: "./permissions.php",
      type: "POST",
      data: userID,
      success: function (msg) {
        //alert("Go!");
        console.log(msg);
        console.log("Go!");

        $("#calendar-right").fullCalendar('refetchEvents');
        $('#modalUser').modal('close');

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown);
        //alert("some error");
      }
    });

});

$("#btnRemoveUser").click(function(){
  $('#modalUser').modal();
  $('#modalUser').modal('open');
});


// css

// $('#calendar-right').addClass('blue-grey lighten-1').css('opacity', '0.85');

// $('#calendar-left').addClass('light-blue lighten-5').css('opacity', '0.9');
// $('#calendar-left').addClass("fc fc-unthemed fc-ltr");
$('#calendar-left').css("font-size","0.7em");
$('#calendar-left .fc-center h2').css("font-size","1em");
//$('#calendar-left .fc-day-number').css("font-size","7px");
//$('#calendar-left tr').css("height","11px");

$('#calendar-right .fc-today-button').html("Today");
$('#calendar-right a').css("color","black");


$('#calendar-left .fc-next-button.fc-button.fc-state-default.fc-corner-right').click(function(){
   $('#calendar-right').fullCalendar('next');
});

$('#calendar-left .fc-prev-button.fc-button.fc-state-default.fc-corner-left').click(function(){
   $('#calendar-right').fullCalendar('prev');
});

$('#calendar-right .fc-next-button.fc-button.fc-state-default.fc-corner-right').click(function(){
  console.log($(this).html());
   $('#calendar-left').fullCalendar('next');
});

$('#calendar-right .fc-prev-button.fc-button.fc-state-default').click(function(){
   $('#calendar-left').fullCalendar('prev');
});

$('#calendar-right .fc-today-button').click(function() {
  $('#calendar-left').fullCalendar('today');
  $('#calendar-right').fullCalendar('today');
});

});

/* Hides the left calendar when the screen
 * is less than 1024 
 */
$(window).resize(function() {
  if ($(this).width() < 1024) {
    $('#calendar-left').hide();
    $('#calendar-right').removeClass("col s12 m10 l10");
    $('#calendar-right').addClass("col s12 m12 l10");
  } else {
    $('#calendar-left').show();
    $('#calendar-right').removeClass("col s12 m12 l10");
    $('#calendar-right').addClass("col s12 m10 l10");
  }

});
</script>



</body>
</html>
