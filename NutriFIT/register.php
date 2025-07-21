<?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nutrifit_server";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

// Validate the first name
if (!preg_match('/^[a-zA-Z]{2,}$/', $firstname)) {
    echo "Invalid first name. First name should contain only letters and be at least 2 characters long.";
    exit();
}
// Validate the last name
if (!preg_match('/^[a-zA-Z]{2,}$/', $lastname)) {
    echo "Invalid last name. Last name should contain only letters and be at least 2 characters long.";
    exit();
}

// Format the first name
$firstname = ucfirst(strtolower(trim($firstname)));

// Format the last name
$lastname = ucfirst(strtolower(trim($lastname)));

//validate username
if (!preg_match('/^(?=.*\d)(?=.*[a-z])[a-z\d]{7,}$/', $username)) {
  echo "Invalid username. Username should be a combination of letters and numbers with a length of at least 7 and be in lowercase.";
  exit();
}

// Validate the email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $email)) {
    echo "Invalid email. Email should be in the format 'example@gmail.com'.";
    exit();
}

// Validate the phone number
if (!preg_match('/^\d{10}$/', $phonenumber)) {
    echo "Invalid phone number. Phone number should contain only numbers and be exactly 10 digits long.";
    exit();
}

// Validate the password
if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>\/?]).{8,}$/', $password)) {
    echo "Invalid password. Password should be a combination of uppercase letters, lowercase letters, special characters, and numbers with a length of at least 8.";
    exit();
}

// Insert the form data into the database
$sql = "INSERT INTO sign_up (first_name, last_name, user_name, email, phone_number, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$phonenumber', '$password')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the login page
    header("Location: usersignin.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
