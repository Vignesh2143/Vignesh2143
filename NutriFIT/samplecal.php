<!DOCTYPE html>
<html>

<head>
<style>
    .calendar-container {
  max-width: 600px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}

.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.prev-month-btn, .next-month-btn {
  background-color: transparent;
  border: none;
  cursor: pointer;
  font-size: 20px;
}

.month-year {
  font-size: 24px;
  font-weight: bold;
}

.calendar-grid {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.weekday-header {
  display: flex;
  justify-content: space-around;
  width: 100%;
  background-color: #eee;
  padding: 5px;
  margin-bottom: 5px;
}

.weekday-header div {
  text-align: center;
}

.calendar-dates {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  width: 100%;
}

.calendar-dates div {
  width: calc(100% / 7);
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.calendar-dates div:hover {
  background-color: #ddd;
}

</style>
</head>
<body>
<div class="calendar-container">
  <div class="calendar-header">
    <button class="prev-month-btn">&lt;</button>
    <h2 class="month-year"></h2>
    <button class="next-month-btn">&gt;</button>
  </div>
  <div class="calendar-grid">
    <div class="weekday-header">
      <div>Sun</div>
      <div>Mon</div>
      <div>Tue</div>
      <div>Wed</div>
      <div>Thu</div>
      <div>Fri</div>
      <div>Sat</div>
    </div>
    <div class="calendar-dates"></div>
  </div>
</div>
<script>
    // Get the current date
var today = new Date();

// Get the year and month of the current date
var year = today.getFullYear();
var month = today.getMonth();

// Get the number of days in the current month
var daysInMonth = new Date(year, month + 1, 0).getDate();

// Get the day of the week of the first day of the current month
var firstDayOfWeek = new Date(year, month, 1).getDay();

var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];


// Create a table element for the calendar
var calendar = document.createElement('table');

// Create a header row for the calendar
var headerRow = document.createElement('tr');
for (var i = 0; i < 7; i++) {
  var headerCell = document.createElement('th');
  headerCell.textContent = days[i];
  headerRow.appendChild(headerCell);
}
calendar.appendChild(headerRow);

// Create rows and cells for the calendar days
var dayOfMonth = 1;
for (var row = 0; row < 6; row++) {
  var weekRow = document.createElement('tr');
  for (var col = 0; col < 7; col++) {
    var dayCell = document.createElement('td');
    if (row == 0 && col < firstDayOfWeek) {
      // This cell is before the first day of the month
      dayCell.textContent = '';
    } else if (dayOfMonth > daysInMonth) {
      // This cell is after the last day of the month
      dayCell.textContent = '';
    } else {
      // This cell contains a day of the month
      dayCell.textContent = dayOfMonth;
      dayOfMonth++;
    }
    weekRow.appendChild(dayCell);
  }
  calendar.appendChild(weekRow);
}

// Add the calendar to the page
document.body.appendChild(calendar);

    </script>
</body>
</html>