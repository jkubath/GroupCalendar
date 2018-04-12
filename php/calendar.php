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
        <!-- <div class="col s3 purple accent-4" id="calendar-left"></div> -->
        <div class="col s12" id="calendar-right"></div>
      </div>
    </div>
  </section>

  <!-- Modal Trigger -->

  <!-- Modal Structure -->

  <!-- Modal -->
  <div id="modal1" class="modal">
    <div class="modal-content">

      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s9">
              <input id="txtTitle" type="text" data-length="128">
              <label for="txtTitle" id="title">Title</label>
            </div>
            <div class="input-field col s3">
              <input id="txtColor" type="text" > <!-- Picker Of Colors Later -->
              <label for="txtColor" id="color">Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s10">
              <textarea id="txtDescription" class="materialize-textarea" data-length="255"></textarea>
              <label for="txtDescription" id="descrip">Description</label>
            </div>
            <div class="input-field col s2">
              <!-- Switch -->
              <div class="switch">
                <label>
                  Off
                  <input id="switchAllday" type="checkbox" name="switch">
                  <span class="lever"></span>
                  On
                </label>
              </div>
              <label class="active" for="switchAllday" id="allday">All Day</label> <!-- Conditions missing for now -->
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="txtDateStart" type="text" class="datepicker">
              <label class="active" for="txtDateStart" id="dayStart">Start Date</label>
            </div>
            <div class="input-field col s6">
             <input id="txtHourStart" type="text" class="timepicker">
             <label for="txtHourStart" id="hourStart">Start Hour</label>
           </div>
         </div>
         <div class="row">
          <div class="input-field col s6">
            <input id="txtDateEnd" type="text" class="datepicker">
            <label class="active" for="txtDateEnd" id="dayEnd">End Date</label>
          </div>
          <div class="input-field col s6">
            <input id="txtHourEnd" type="text" class="timepicker">
            <label for="txtHourEnd" id ="hourEnd">End Hour</label>
          </div>
        </div>


      </form>
    </div>
  </div>

  <div class="modal-footer">
    <a href="#!" id="btnAdd" class="modal-action modal-close waves-effect  btn blue">Add</a>
    <a href="#!" id="btnModify" class="modal-action modal-close waves-effect  btn green">Modify</a>
    <a href="#!" id="btnRemove" class="modal-action modal-close waves-effect  btn red">Remove</a>
    <a href="#!" id="btnClose" class="modal-action modal-close waves-effect  btn black">Close</a>

  </div>
</div><!--  End of Modal1 -->




<!-- Footer -->
<footer class="page-footer blue-grey darken-1">
  <?php include "../includes/footer.inc.php"; ?>
</footer>
<!-- End of footer-->

<script type="text/JavaScript">
  $(document).ready(function() {
    $("#navbar-switch").removeClass("navbar-fixed");
    $("#navbar-switch").addClass("navbar");
    $("#navbar").removeClass("transparent");
    $("#navbar").css("background-color", "rgba(55, 71, 79, 1.0)");

    var globalClickedEvent = null;

    $('#calendar-right').fullCalendar({
      editable: true, //Allows for drag and drop events
      eventLimit: true, //When there are more events than the day can hold, compress to a list
      googleCalendarApiKey: 'AIzaSyCb7F3cZOnQ-gmZCbFmjU6Z3DuBfe23jMo', //pull Google Calendar Events

      header :{
        left: 'today,prev,next',
        center: 'importGoogle',
        right: 'month,agendaWeek,agendaDay,listMonth'//, basicDay,basicWeek'
      },
      customButtons: {
        /* Add a Google Calendar ID to the google_calendar table */
        importGoogle: {
          text: 'Import Google Calendar',
          click: function() {
            var calendarID = prompt("Enter the Google Calendar ID");
            if(calendarID === ""){
              alert("Calendar ID was empty");
              console.log("Calendar ID was empty");
              return;
            }

            var username = <?php echo '"'.$_SESSION['username'].'"'; ?>;

            console.log(username);
            console.log("Add the Google Calendar ID to the database");
            /* Add the calendar ID to the database */
            $.ajax({
              url: "./addGoogleCalendarID.php",
              type: "POST",
              data: {"username": username, "calendarID": calendarID},
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
        $('#modal1').modal();
        $('#modal1').modal('open');

          //$("#txtDateStart").val(date.format("MMM DD, YYYY"));

          // $('#txtTitle').val('');
          // $('#txtColor').val('');
          // $('#txtDescription').val('');

          $('#dayStart').addClass('active');
          $('#dayEnd').addClass('active');



          // $('#txtHourStart').val('');

          // $('#txtDateEnd').val('');
          // $('#txtHourEnd').val('');



          var elem = document.querySelector('#txtDateStart');
          var instance = M.Datepicker.init(elem, options = {
            defaultDate: new Date(date.format("MMM DD, YYYY")),
            setDefaultDate: true,
            //format: "yyyy-mm-dd",
            //firstDay: 0
          });

          $('#txtDateStart').val(date.format("MMM DD, YYYY"));

          //var elem2 = document.querySelector('#txtHourStart');
          //var instance2 = M.Timepicker.init(elem, options);
          $('#txtHourStart').timepicker();
          $('#txtHourEnd').timepicker();


          $("#txtDateEnd").val(date.format("MMM DD, YYYY"));
          $("#txtDateEnd").click(function(){
            console.log("Click ... !");
            $(document).ready(function(){
              $('#txtDateEnd').datepicker();
              $('#txtDateEnd').datepicker('open');
            });
          })


          $("#btnAdd").show();
          $("#btnRemove").hide();
          $("#btnModify").hide();
      }, //dayClick end

      eventClick: function(calEvent, jsEvent, view){
        globalClickedEvent = calEvent.id;
        console.log("Clicked event id: " + globalClickedEvent);

        $('#modal1').modal();
        $('#modal1').modal('open');

        console.log(calEvent);

        $('#title').removeClass('active').addClass('active');
        $('#descrip').removeClass('active').addClass('active');
        $('#descrip').removeClass('active').addClass('active');
        $('#hourStart').removeClass('active').addClass('active');
        $('#hourEnd').removeClass('active').addClass('active');

        //If there is color data, move the label above the text
        if(calEvent.color){
          $('#color').removeClass('active').addClass('active');
        }

        $('#dayStart').addClass('active');
        $('#dayEnd').addClass('active');

        $('#txtTitle').val(calEvent.title);
        $('#txtColor').val(calEvent.color);
        $('#txtDescription').val(calEvent.description);

        $('#txtDateStart').val(moment(calEvent.start).format("MMM DD, YYYY"));
        $('#txtHourStart').val(moment(calEvent.start).format("h:mm A"));

        $('#txtDateEnd').val(moment(calEvent.end).format("MMM DD, YYYY"));
        $('#txtHourEnd').val(moment(calEvent.end).format("h:mm A"));

        if (calEvent.allDay == true) {
          $("#switchAllday").prop("checked", true);

          $('#txtHourStart').prop("disabled", true);
          $('#txtDateEnd').prop("disabled", true);
          $('#txtHourEnd').prop("disabled", true);
        } else {
          $("#switchAllday").prop("checked", false);

          $('#txtHourStart').prop("disabled", false);
          $('#txtDateEnd').prop("disabled", false);
          $('#txtHourEnd').prop("disabled", false);
        }

        $("#btnModify").show();
        $("#btnRemove").show();
        $("#btnAdd").hide();
      }, //eventClick end

        /* Auto resize the calendar */
        height: "auto",

        /* Pull calendar events from multiple sources */
        eventSources: [
        <?php include './getGoogleCalendars.php'; ?>
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
            console.log("end = " + end);
            $("#calendar-right").fullCalendar("updateEvent", event);
          } else {
            end = event.end;
          }
          allDayBoolean = 1;
        /* (event.end == null) -> start + 1 hour
         * (event.end != null) -> end
         */
        } else {
            console.log("start----->"+event.start.format());
            if (event.end == null) {
              end = moment(event.start.format("YYYY-MM-DD HH:mm:ss").toString()).add(1, "h");
              console.log("end ----->"+end.format());
            } else {
              end = event.end;
            }
            allDayBoolean = 0;
        }

        //console.log(event.allDay);

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
            "color": event.color,
            "textColor": event.textColor
          },
          success: function () {
            console.log(event.title + " updated successful (./updateCalendarEvents.php)");
                // $('#calendar-right').fullCalendar('refetchEvents');
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
              "color": event.color,
              "textColor": event.textColor
            },
            success: function () {
              console.log(event.title + " updated successfully!");
              $('#calendar-right').fullCalendar('refetchEvents');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              alert("Update failed");
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
    title: $("#txtTitle").val(),
    start:moment($("#txtDateStart").val() + " " + $("#txtHourStart").val() ).format('YYYY-MM-DD HH:mm:ss'),
    end:moment($("#txtDateEnd").val() + " " + $("#txtHourEnd").val() ).format('YYYY-MM-DD HH:mm:ss'),
    allDay: $("#switchAllday").prop("checked")? 1 : 0,// $("#txtColor").val()
    description: $("#txtDescription").val(),
    color: $("#txtColor").val(),
    textColor: null
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
          console.log("111");
          $("#calendar-right").fullCalendar('refetchEvents');
          console.log("222");
          $('#modal1').modal('close');
        alert("New event added successfully!");
      },
      error:function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown);
        alert("some error");
      }
    });
}

/* Add function when an event is added */
$("#btnAdd").click(function(){
  getEventData();
  sendEventDataToDB(1, newEvent);
  $("#txtDateStart").val('');
});

/* Add function when an event is modified */
$("#btnModify").click(function(){
  getEventData();
  sendEventDataToDB(2, newEvent);
});

/* Add function when an event is changed to an all day event */
$("#switchAllday").click(function() {
  if ($("#switchAllday").is(":checked")) {
    $('#txtHourStart').prop("disabled", true);
    $('#txtDateEnd').prop("disabled", true);
    $('#txtHourEnd').prop("disabled", true);
    console.log()
    $('#txtDateEnd').val(moment($("#txtDateStart").val()).add(1, "days").format("MMM DD, YYYY"));
  } else {
    $('#txtHourStart').prop("disabled", false);
    $('#txtDateEnd').prop("disabled", false);
    $('#txtHourEnd').prop("disabled", false);
  }
});
});


</script>
</body>
</html>
