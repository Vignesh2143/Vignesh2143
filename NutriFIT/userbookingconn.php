<?php
session_start();

// Retrieve the username from the cookie
if (isset($_COOKIE['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
}


// Connect to database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "nutrifit_server";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get user's first and last name from sign_up table using their username
$username = $_SESSION['username'];
$sql = "SELECT first_name, last_name FROM sign_up WHERE user_name = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
} else {
  // User not found in sign_up table
  mysqli_close($conn);
  header("Location: login.php");
  exit();
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $set_time = $_POST['session'];
    $set_day = $_POST['date-input'];
    $nutri_name = $_POST['nutritionist'];
    $booking_time = date('Y-m-d H:i:s');
    $user_name = $_SESSION['username'];
  
    // Check if the selected time slot is already booked by another user for the same day
    $sql = "SELECT * FROM booking_table WHERE Set_Time = '$set_time' AND Set_Day = '$set_day' AND nutri_name = '$nutri_name'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) > 0) {
      // The time slot is already booked, show an error message
      echo "The selected time slot is not available. Please choose another time slot.";
    } else {
      // The time slot is available, proceed with the booking
      // Insert booking into database
      $sql = "INSERT INTO booking_table (Set_Time, Set_Day, nutri_name, first_name, last_name, booking_time, user_name)
              VALUES ('$set_time', '$set_day', '$nutri_name', '$first_name', '$last_name', '$booking_time', '$user_name')";
  
      // Check if the nutritionist already has four sessions for the selected day
      $sql2 = "SELECT COUNT(*) AS count FROM booking_table WHERE Set_Day = '$set_day' AND nutri_name = '$nutri_name'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $count = $row2['count'];
  
      if ($count >= 4) {
        // The nutritionist already has four sessions, show an error message
        echo "The selected nutritionist is not available on the selected day. Please choose another nutritionist or day.";
      } else {
        // The nutritionist has less than four sessions, proceed with the booking
        if (mysqli_query($conn, $sql)) {
          // Insert the booking information into user_log table
          $sql3 = "INSERT INTO user_log (nutri_name, user_name, booking_time)
                   VALUES ('$nutri_name', '$user_name', '$booking_time')";
          if (!mysqli_query($conn, $sql3)) {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
          }
          // Redirect to success page
          header("Location: userbookingsession.php");
          exit();
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }
  }
  
  
mysqli_close($conn);
?>

