<?php 
session_start();
session_unset();
session_destroy();
error_reporting(0); ?> 
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="project.css">
</head>
<body>
  <div class="container">
  <div class="center">
    <form action="project_login.php" method="POST">
    <h2>Login</h2>
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="input-group">
        <button type="submit" class="btn">Login</button>
      </div>
    </form>
  </div>
  </div>
</body>
</html>

<?php
if((isset($_POST['username']) && isset($_POST['password']))){
$host = "localhost";  // Your database host
$dbUsername = "rohmatalpur";  // Your database username
$dbPassword = "pakistan";  // Your database password
$dbName = "blood_donation_management_system";  // Your database name

// Create a new PDO instance
$dsn = "mysql:host=$host;dbname=$dbName";
$db = new PDO($dsn, $dbUsername, $dbPassword);

// Retrieve the submitted username and password from the form
$username = $_POST['username'];
$password = sha1($_POST['password']);

// $username = 'rohmatalpur';
// $password =  'pakistan';


// Check if the username and password match a record in the database
try{
  $stmt = $db->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
}
catch(exception $e){
  echo $e->getMessage();
  die('Die');
}

$stmt->execute([$username,$password]);
$row = $stmt->fetch(PDO::FETCH_OBJ);

// If a matching record is found, the login is successful
if ($stmt->rowCount() > 0) { 
  session_start();
  $_SESSION['ss_username']=$username;
  echo"Login";
  header("location:project.php");


} else {
  echo "Invalid username or password!";
}
}
?>
