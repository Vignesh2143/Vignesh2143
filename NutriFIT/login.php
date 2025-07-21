<?PHP
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the user exists in the database
  $sql = "SELECT * FROM sign_up WHERE user_name='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Set the username as a cookie
    setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie will expire in 30 days
    // Redirect to the homepage
    header("Location: homepage.php");
    exit();
  } else {
    echo "Incorrect username or password.";
  }
  
}

// Close the database connection
$conn->close();
