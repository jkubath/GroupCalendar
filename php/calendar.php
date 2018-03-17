<?php

	echo '<!DOCTYPE html>
	<html>

	<head>
		 <meta charset="utf-8">
		 <title>XYZ Calendar</title>

		 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		 <link rel="stylesheet" type="text/css" href="../css/bp/css/bootstrap.css" media="screen">
		 <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen">
     <link rel="stylesheet" type="text/css" href="../css/clndr.css">
		 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		 <!--[if lt IE 9]>
			 <script src="../js/bootstrap/respond.min.js"></script>
			 <script src="../js/bootstrap/html5shiv.js"></script>
		 <![endif]-->

	</head>


		<body>


	<div class="container-fluid ">

			<p > Calendar </p>
      <p>
            <strong>clndr.defaultSetup</strong> Default settings.
        </p>

        <div id="pass-in-a-template" class="cal2"></div>

        <p>
            <strong>clndr.passInEvents</strong> Pass in events.
        </p>
        <div id="pass-in-events" class="cal1"></div>

        <p>
            <strong>clndr.callbacks</strong> Test the clickEvent callbacks.
            Logs in the console.
        </p>
        <div id="callbacks" class="cal1"></div>

        <p>
            <strong>clndr.multiday</strong> Show multi-day events (12th - 17th,
            24th - 27th). Logs in the console.
        </p>
        <div id="multiday" class="cal1"></div>

        <p>
            <strong>clndr.multidayMixed</strong> Show multi-day events (12th -
            17th, 24th - 27th), plus a single day event (19th). Logs in the
            console.
        </p>
        <div id="multiday-mixed" class="cal1"></div>

        <p>
            <strong>clndr.multidayMixedPerformance</strong> Show multi-day
            events (12th - 17th, 24th - 27th), plus 10 single-day events every
            day this month. This tests a performance optimization in clndr is
            event parsing. Rendered in
            <span id="multiday-mixed-performance-val"></span> seconds. Logs in
            the console.
        </p>
        <div id="multiday-mixed-performance" class="cal1"></div>

        <p>
            <strong>clndr.multidayLong</strong> Show multi-day events (3 months
            ago on the 12th - 17th of this month, 24th of this month - 4 months
            from now on the 27th). Logs in the console.
        </p>
        <div id="multiday-long" class="cal1"></div>

        <p>
            <strong>clndr.constraints</strong> Test start and end constraints.
            (the 4th of this month to the 12th of next month). Logs in the console.
        </p>
        <div id="constraints" class="cal1"></div>

        <p>
            <strong>clndr.prevNextMonthConstraints</strong> Test start and end constraints.
            (the 22nd of previous month to the 5th of next month).
        </p>
        <div id="prev-next-month-constraints" class="cal1"></div>

        <p>
            <strong>clndr.prevMonthConstraints</strong> Test start and end constraints.
            (the 2nd to the 5th of previous month).
        </p>
        <div id="prev-month-constraints" class="cal1"></div>

        <p>
            <strong>clndr.nextMonthConstraints</strong> Test start and end constraints.
            (the 22nd to the 25th of next month).
        </p>
        <div id="next-month-constraints" class="cal1"></div>

        <p>
            <strong>clndr.startConstraint</strong> Test start constraint. (4th
            of this month).
        </p>
        <div id="start-constraint" class="cal1"></div>

        <p>
            <strong>clndr.endConstraint</strong> Test end constraint. (12th of
            next month).
        </p>
        <div id="end-constraint" class="cal1"></div>

        <p>
            <strong>clndr.api</strong> Test calling the API (next, previous,
            setMonth, setYear) with/without { withCallbacks: true } as an
            argument. onMonthChange and onYearChange will log only if
            withCallbacks is true.
        </p>
        <div id="api" class="cal1"></div>

        <p>
            <strong>clndr.sixRows</strong> Test the forceSixRows option, which
            should make a six-row calendar regardless of the length of each
            month.
        </p>
        <div id="six-rows" class="cal1"></div>

        <p>
            <strong>clndr.customClasses</strong> Test using options.classes to
            define custom classes. Should appear normally with events and log to
            the console.
        </p>
        <div id="custom-classes" class="cal1"></div>

        <p>
            <strong>clndr.threeMonths</strong> Test lengthOfTime.months option,
            which should display three months. Interval changes log to the
            console.
        </p>
        <div id="three-months" class="cal2"></div>

        <p>
            <strong>clndr.threeMonthsWithEvents</strong> Test
            lengthOfTime.months option, which should display three months.
            Contains multi-day events.
        </p>
        <div id="three-months-with-events" class="cal2"></div>

        <p>
            <strong>clndr.threeMonthsWithConstraints</strong> Test
            lengthOfTime.months option, which should display three months.
            Contains multi-day events and constraints.
        </p>
        <div id="three-months-with-constraints" class="cal2"></div>

        <p>
            <strong>clndr.twoWeeks</strong> Test lengthOfTime.days option.
            Should display two weeks, and next and previous buttons should
            advance in one week intervals.
        </p>
        <div id="one-week" class="cal2"></div>

        <p>
            <strong>clndr.twoWeeksWithConstraints</strong> Two week view that
            advances in one week intervals. Contains multi-day events and
            constrains the calendar to the 4th of the current month to the 12th
            of the next month.
        </p>
        <div id="one-week-with-constraints" class="cal2"></div>

        <p>
            <strong>clndr.twoWeeksWithPrevMonthConstraints</strong> Test start and end constraints.
            (the 2nd to the 5th of previous month).
        </p>
        <div id="one-week-with-prev-month-constraints" class="cal2"></div>

        <p>
            <strong>clndr.twoWeeksWithNextMonthConstraints</strong> Test start and end constraints.
            (the 22nd to the 25th of next month).
        </p>
        <div id="one-week-with-next-month-constraints" class="cal2"></div>

        <p>
            <strong>clndr.selectedDate</strong> Should highlight the last date
            you clicked on.
        </p>
        <div id="selected-date" class="cal2"></div>

        <p>
            <strong>clndr.selectedDateIgnoreInactive</strong> Should highlight
            the last date you clicked on, except if it is an inactive date.
        </p>
        <div id="selected-date-ignore-inactive" class="cal2"></div>
	</div>


  <script type="text/template" id="clndr-template">
          <div class="clndr-controls">
              <div class="clndr-previous-button">&lsaquo;</div>
              <div class="month"><%= month %></div>
              <div class="clndr-next-button">&rsaquo;</div>
          </div>
          <div class="clndr-grid">
              <div class="days-of-the-week">
              <% _.each(daysOfTheWeek, function (day) { %>
                  <div class="header-day"><%= day %></div>
              <% }); %>
                  <div class="days">
                  <% _.each(days, function (day) { %>
                      <div class="<%= day.classes %>"><%= day.day %></div>
                  <% }); %>
                  </div>
              </div>
          </div>
          <div class="clndr-today-button">Today</div>
      </script>

      <script type="text/template" id="clndr-multimonth-template">
          <div class="multi-month-controls">
              <div class="clndr-previous-year-button quarter-button">&laquo;</div><!--
              --><div class="clndr-previous-button quarter-button">&lsaquo;</div><!--
              --><div class="clndr-next-button quarter-button right-align">&rsaquo;</div><!--
              --><div class="clndr-next-year-button quarter-button right-align">&raquo;</div>
          </div>
          <% _.each(months, function (oneMonth) { %>
          <div class="clndr-controls">
              <div class="month"><%= oneMonth.month.format("MMMM YYYY") %></div>
          </div>
          <div class="clndr-grid">
              <div class="days-of-the-week">
              <% _.each(daysOfTheWeek, function (day) { %>
                  <div class="header-day"><%= day %></div>
              <% }); %>
                  <div class="days">
                  <% _.each(oneMonth.days, function (day) { %>
                      <div class="<%= day.classes %>"><%= day.day %></div>
                  <% }); %>
                  </div>
              </div>
          </div>
          <div class="clndr-today-button">Today</div>
          <% }); %>
      </script>

      <script type="text/template" id="clndr-oneweek-template">
          <div class="clndr-controls">
              <div class="clndr-previous-button">&lsaquo;</div>
              <div class="month">
                  <%= intervalStart.format("MM/DD") %> - <%= intervalEnd.format("MM/DD") %>
              </div>
              <div class="clndr-next-button">&rsaquo;</div>
          </div>
          <div class="clndr-grid">
              <div class="days-of-the-week">
              <% _.each(daysOfTheWeek, function (day) { %>
                  <div class="header-day"><%= day %></div>
              <% }); %>
                  <div class="days">
                  <% _.each(days, function (day) { %>
                      <div class="<%= day.classes %>"><%= day.day %></div>
                  <% }); %>
                  </div>
              </div>
          </div>
      </script>









			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="../css/clndr.js"></script>
   <script src="../css/test.js"></script>
		</body>
	</html>
';



?>
