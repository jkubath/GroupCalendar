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

    var globalClickedEvent = null;

    $('#calendar-right').fullCalendar({
      editable: true, //Allows for drag and drop events
      eventLimit: true,
      googleCalendarApiKey: 'AIzaSyCb7F3cZOnQ-gmZCbFmjU6Z3DuBfe23jMo',
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
            var dateStr     = prompt("Enter a date in YYYY-MM-DD format");
            var titleStr    = prompt("Enter a name for the event");
            var start_date  = moment(dateStr);
            var end_date    = moment(dateStr);
            end_date.add(1, "days");
            var allDayBool  = true;

            if (start_date.isValid()) {
              $("#calendar-right").fullCalendar("renderEvent", {
                title: titleStr,
                start: start_date,
                end: end_date,
                allDay: allDayBool
              });
              alert("Great. Now, update your database...");
              $.ajax({
                url: "./addCalendarEvents.php",
                type: "POST",
                data: {"start": start_date.format(), "end": end_date.format(), "title": titleStr, "allDay": allDayBool },
                success: function () {
                  alert("Added successfully!");
                  $('#calendar-right').fullCalendar('rerenderEvents');
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


        $('#modal1').modal();
        $('#modal1').modal('open');

          //$("#txtDateStart").val(date.format("MMM DD, YYYY"));

          $('#txtTitle').val('');
          $('#txtColor').val('');
          $('#txtDescription').val('');

          $('#dayStart').addClass('active');
          $('#dayEnd').addClass('active');



          $('#txtHourStart').val('');

          $('#txtDateEnd').val('');
          $('#txtHourEnd').val('');

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
        //dayClick end
      },
          //events: 'http://localhost:8887/GroupCalendar/php/events.php',

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
            } else {
              $("#switchAllday").prop("checked", false);
            }

            $("#btnModify").show();
            $("#btnRemove").show();
            $("#btnAdd").hide();
          //eventClick end
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
              googleCalendarId: 'en.usa#holiday@group.v.calendar.google.com'
            },
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
          console.log("event id: " + event.id + " title: " + event.title + " was dropped on " + event.start.format() + " and ends on " + event.end + " allday: " + event.allDay);
          var end;
          var allDayBoolean;
          if (event.allDay) {
            if (event.end == null) {
              end = moment(event.start.format("YYYY-MM-DD HH:mm:ss").toString()).add(1, "days");
              console.log("end = " + end);
              $("#calendar-right").fullCalendar("updateEvent", event);
            } else {
              end = event.end;
            }
            allDayBoolean = 1;
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
          console.log(event.allDay);
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
                  //refresh the events in the calendar and the left list
                  //alert(event.title + " updated successfully!");
                  $('#calendar-right').fullCalendar('refetchEvents');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert("Update failed");
                  revertFunc();
                }
              });
        },
        eventResize: function(event, delta, revertFunc) {
          /* Full calendar makes an all day event on 2018-04-29 end on 2018-04-30
           * This just subtracts on so it ends on 2018-04-29
           * This prevents the user from being confused by the date
           */
          //  if(event.allDay){
          //   event.end.subtract(1, "days");
          // }

          console.log(" title: " + event.title + " was dropped on " + event.start.format() + " ends on: " + event.end.format() + " allday: " + event.allDay);

          /* Re-add the subtracted day */
          // if(event.allDay){
          //   event.end.add(1, "days");
          // }
          //Confirm with the user
          // if (!confirm("Are you sure about this change?")) {
          //   //Revert the changes
          //   revertFunc();
          // }
          //Change the date in the database
          // else {
            if (event.allDay) {
              allDayBoolean = 1;
            } else {
              allDayBoolean = 0;
            }
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
                //alert(event.title + " updated successfully!");
                //refresh the events in the calendar and left list
                $('#calendar-right').fullCalendar('refetchEvents');
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Update failed");
                revertFunc();
              }
            });
          // }
        }


      });

function getEventData() {
  console.log()
  newEvent = {
    id: globalClickedEvent,
    title: $("#txtTitle").val(),
    start:moment($("#txtDateStart").val() + " " + $("#txtHourStart").val() ).format('YYYY-MM-DD HH:mm:ss'),
    end:moment($("#txtDateEnd").val() + " " + $("#txtHourEnd").val() ).format('YYYY-MM-DD HH:mm:ss'),
    allDay: $("#switchAllday").prop("checked")? 1 : 0,// $("#txtColor").val()
    description: $("#txtDescription").val(),
    color: $("#txtColor").val(),
    textColor: 'black'
  };
}

function sendEventDataToDB(action, objEvent) {
  console.log(newEvent);
  var php = null;
  console.log(action);
  if (action == 1) {
    php = "./addCalendarEvents.php";
  } else if (action == "modify") {
    php = "./updateCalendarEvents.php";
  } else if (action == "remove") {

  }

  $.ajax({
    type: 'POST',
        url: php,//?action=+action
        data: objEvent,
        success:function (msg) {
          console.log(msg);
          //if (msg) {
            console.log("111");
            $("#calendar-right").fullCalendar('refetchEvents');
            console.log("222");
            $('#modal1').modal('close');
        //  }
        alert("Added successfully!");
      },
      error:function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(textStatus);
        console.log(errorThrown);
        alert("some error");
      }
    });
}

$("#btnAdd").click(function(){
  getEventData();

      //$('#calendar-right').fullCalendar('renderEvent', newEvent);
      sendEventDataToDB(1, newEvent);
      //$('#txtDateStart').datepicker('destroy');
      $("#txtDateStart").val('');

    });
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
