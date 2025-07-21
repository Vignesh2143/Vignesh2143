<!DOCTYPE html>
<html>
  <head>
    <title>Booking Session</title>
    <link rel="stylesheet" type="text/css" href="userbookingsession.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  </head>
  <body>
    <h2>Book a Session</h2>
    <div class="container">
    <div class="image">
        <img src="img/booksession.svg">
      </div>
      <form action="userbookingconn.php" method="POST">
      <div class="form-group">
  <label for="date-input">Select a date:</label>
  <div class="flatpickr" id="date-picker"></div>
  <input type="hidden" id="selected-date" name="date-input">
</div>

        <div class="form-group">
          <label for="nutritionist">Choose a Nutritionist:</label>
          <select id="nutritionist" name="nutritionist" required>
            <option value="">Select a Nutritionist</option>
            <option value="David Parker">David Parker</option>
            <option value="Crystal Finn">Crystal Finn</option>
            <option value="Ariana Grande">Ariana Grande</option>
          </select>
        </div>
        <div class="form-group">
          <label for="session">Choose a Session Time:</label>
          <select id="session" name="session" required>
            <option value="">Select a Session Time</option>
            <option value="10:30am - 11:00am">10:30am - 11:00am</option>
            <option value="11:30am - 12:00pm">11:30am - 12:00pm</option>
            <option value="12:30pm - 1:00pm">12:30pm - 1:00pm</option>
            <option value="1:30pm - 2:00pm">1:30pm - 2:00pm</option>
          </select>
        </div>
        <button type="submit" name="submit">Book a Session</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  const datePicker = flatpickr("#date-picker", {
    inline: true,
    minDate: new Date().fp_incr(1), // set minDate to tomorrow's date
    dateFormat: "Y-m-d",
    disableMobile: true,
    onChange: function(selectedDates, dateStr, instance) {
      document.getElementById("selected-date").value = dateStr;
    }
  });
</script>


  </body>
</html>
