<?php 

    session_start();

  if(isset($_SESSION['customer']) || isset($_SESSION['admin'])){
    header("Location: home.php");
  }
    require_once 'db_connect.php';

  $user_name = "";
  $email = "";
  $password ="";
  $emailError ="";

  if(isset($_POST["register"])){
    $user_name = trim($_POST['user_name']);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $error = false;
    $userPass = hash('sha256', $password);

    $query = "SELECT email FROM `customer` WHERE email='$email'";
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);

    if($count!=0){
      $error = true;
      $emailError = "Provided Email is already in use.";
    }

    if(!$error){
    $sql = "INSERT INTO `customer` (user_name, email, password) VALUES ('$user_name', '$email', '$userPass')";
    header("Location: a_register.php");

    if($mysqli->query($sql) === FALSE){
      echo "Error signing up". $mysqli->connect_error;
      }
    }
  }
    $log = "login";
    if(isset($_SESSION['admin']) || isset($_SESSION['customer'])){
    $log = "logout";
  }
 ?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="style.css">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h2>Register</h2>
      <br>
      <br>
    </div>

    <!-- Login Form -->
    <form class="register" action="register.php" method="POST" accept-charset="utf-8">
      <input type="text" id="name" class="fadeIn second" name="user_name" placeholder="Enter Fullname" required="">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Enter Email-Address" value="<?= $email ?>"  required>
       <span><?php echo $emailError; ?></span>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password" maxlength="25" value="" required>
      <a href="a_register.php"><input class="btn btn-success" type="submit" name="register" value="Sign Up"></a>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="login.php">Sign in</a>
      <br>
      <a class="underlineHover" href="index.php">Back to Homepage</a>

    </div>

  </div>
</div>