<?php

  session_start();

  require_once 'db_connect.php';

  if (isset($_SESSION['customer'])){
  $res=mysqli_query($mysqli, "SELECT * FROM `customer` WHERE customer_id=". $_SESSION['customer']. "");
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
  }
  if (isset($_SESSION['admin'])){
  $res=mysqli_query($mysqli, "SELECT * FROM `customer` WHERE customer_id=". $_SESSION['admin']. "");
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
  }

  $email = "";
  $password = "";
  $loginError = "";
  $error = false;


  if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    if (!$error) {
    
      $userPass = hash('sha256', $password);

      $res=mysqli_query($mysqli, "SELECT customer_id, user_name, password, user_admin FROM `customer` WHERE email='$email'");

      $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
      $userRows = mysqli_num_rows($res);
    
      if($userRows == 1 && $row['password']==$userPass && $row['user_admin']==='Y'){
        $_SESSION['admin'] = $row['customer_id'];
        header("Location: index.php");
      }
      elseif($userRows == 1 && $row['password']==$userPass && $row['user_admin']==='N') {
        $_SESSION['customer'] = $row['customer_id'];
        header("Location: index.php");
      }
      else {
          $loginError = "Incorrect email or password";
      }
    }
  }

  if(isset($_POST['logout'])){
    unset($_SESSION['customer']);
    session_destroy();
    header("Location: login.php");
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
    <?php

      if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
        echo '
        <form method="POST">
          <div class="logoutbox centermepls">
          <br>
            <h3>Are you sure you want to sign out?</h3>
            <br>
            <input class="btn btn-danger" type="submit" name="logout" value="Sign Out">
            <a href="index.php" type="submit"  value="back"></a>
          </div>
        </form>
        ';
      }
      else{
        echo'
        <form class="loginform" method="post" accept-charset="utf-8">
          <span>'?><?php echo $loginError ?></span><?php echo '
          <div class="loginfield">
          <h2>Sign in</h2>
            <input type="text" name="email"  placeholder="Email" required>
          </div>
          <div class="loginfield">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <input class="btn btn-success loginbutton" type="submit" name="login" value="Sign in">
          <p>No account yet? <a class="createaccountlink" href="register.php" title="Create account">Create one here!</a></p>
        </form>
      ';
      }

    ?>
  </div>
</div>
<?php ob_end_flush(); ?>