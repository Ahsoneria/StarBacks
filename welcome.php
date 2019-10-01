<?php
// Initialize the session
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'demo2');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; 
            color: #E2E4FF;
            background-image: url("bg-masthead.jpg");
}
    .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <h1>StarBack</h1>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <h2>
    <?php
      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
      $username = $_SESSION['username'];
      $user_check = "SELECT * FROM users WHERE username='$username' LIMIT 1";
      $res = mysqli_query($link, $user_check);
      $user = mysqli_fetch_assoc($res);
      $radio = $user['radio'];
      echo "Designation : ";
      echo $user['radio'];
      echo "<br>";
    ?>
    </h2>
</body>
</html>