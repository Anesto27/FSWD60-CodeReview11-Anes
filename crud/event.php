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

  if(!isset($_SESSION['admin']) && !isset($_SESSION['customer'])){
    header("Location: index.php");
  }

  $log = "Login";

  if(isset($_SESSION['admin']) || isset($_SESSION['customer'])){
    $log = "Logout";
  }
  
if(isset($_POST['createEvent'])){
    $event_name = $_POST['event_name'];
    $event_img = $_POST['event_img'];
    $eventDate = $_POST['eventDate'];
    $event_price = $_POST['event_price'];
    $event_address = $_POST['event_address'];
    $event_web_address = $_POST['event_web_address'];
    $sql = "INSERT INTO `concerts`(`event_name`, `event_img`, `eventDate`, `event_price`, `event_address`,`event_web_address`) VALUES ('$event_name', '$event_img', '$eventDate',  '$event_price', '$event_address','$event_web_address')";
    if($mysqli->query($sql) === TRUE) {
      header("Location: home.php");
    }
    else {
      echo "Error while creating record : ". $mysqli->error;
    }
  }
  if(isset($_POST['updateEvent'])){
    $id = $_POST['event_id'];
    $$event_name = $_POST['event_name'];
    $event_img = $_POST['event_img'];
    $eventDate = $_POST['eventDate'];
    $event_price = $_POST['event_price'];
    $event_address = $_POST['event_address'];
    $event_web_address = $_POST['event_web_address'];
    $sql = "UPDATE `concerts` SET event_name = '$event_name', event_img = '$event_img', eventDate = '$eventDate',  event_price = '$event_price', event_address = '$event_address',event_web_address = '$event_web_address' WHERE event_id = {$id}";
    if($mysqli->query($sql) === TRUE) {
      header("Location: home.php");
    } else {
      echo "Error while updating record: ". $mysqli->error;
    }
  }
  if(isset($_POST['deleteEvent'])){
    $id = $_POST['concert_id'];
    $sql = "DELETE FROM `concert` WHERE concert_id = {$id}";
    if($mysqli->query($sql) === TRUE) {
      header("Location: home.php");
    } else {
      echo "Error while deleting record: ". $mysqli->error;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <meta charset="UTF-8">
  <title>CodeReview11</title><html lang="en">

</head>
<body>
  <!-- Header -->
 

      <header id="header">
        <div class="inner">
          <a href="index.html" class="logo">Welcome to Vienna's best Travel Agency</a>
          <nav id="nav">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="home.php"><i class="fas fa-globe"></i> Sightseeing</a>
             <a href="restaurant.php"><i class="fas fa-globe"></i> Restaurants</a>
             <a href="event.php"><i class="fas fa-globe"></i> Events</a>
            <a href="login.php" title="login">
 <?php
        if (isset($_SESSION['customer'])) {
          $displayName = $userRow['user_name'];
          echo '<i class="fas fa-sign-out-alt"></i> '. $displayName;
        }
        elseif (isset($_SESSION['admin'])) {
          $displayName = $userRow['user_name'];
          echo '<i class="fas fa-sign-out-alt"></i> '. $displayName. " ADMIN";
        } 
        else {
          echo '<i class="fas fa-sign-in-alt"></i> Login';
        }
      ?>
            <a href="register.php"><i class="fas fa-user-plus"></i> Register</a>
          </nav>
          <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
      </header>
    <!-- Banner -->
      <section id="banner">
        <h1>Welcome to Vienna <hr> at Night</h1>
        
      </section>

   <div class="container">
      <div class="pageheader">
        <h1>Places to visit when you are in Vienna</h1>
      </div>
      <div class="maincontent">
        <!-- Things to do -->
        
    
        <!-- Concerts -->
        <div class="row concerts">
          <div class="rowdesc">
            <h1>Events</h1>
            <?php
              if(isset($_SESSION['admin'])){
                echo '
                  <a data-toggle="modal" data-target="#createEvent" class="create" title="Create new Restaurant"><button class="btn btn-success" type="submit" name ="create">Create new entry</button></a>
                  <form method="POST" accept-charset="utf-8">
                      <div class="modal fade" id="createEvent" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Create a new "Concert"</h4>
                                  </div>
                                  <div class="modal-body">
                                      <p>Name</p>
                                      <input type="text" name="event_name" maxlength="55" required>
                                      <p>Image (url)</p>
                                      <input type="text" name="event_img" maxlength="500" required>
                                      <p>Date</p>
                                      <input type="date" name="eventDate" required>
                                      <p>Ticket Price</p>
                                      <input type="text" name="event_price" required>
                                      <p>Address</p>
                                      <input type="text" name="event_address" maxlength="200" required>
                                      <p>Web-Address</p>
                                      <input type="text" name="event_web_ddress" maxlength="200" required>
                                  </div>
                                  <div class="modal-footer">
                                      <input type="submit" name="createEvent" class="btn btn-success" value="Create">
                                      <button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                ';
              }
            ?>
          </div>
            </div>



          <hr>
          <?php
          $sql = mysqli_query($mysqli, "SELECT * FROM `concerts`");
          $count = mysqli_num_rows($sql);
          if($count > 0) {
            while($concertRow = mysqli_fetch_array($sql)){
            echo
            '
              <div class="card col-lg-3 col-md-6 col-sm-12">
                  <div class="cardName">
                      <h3>'. $concertRow["event_name"]. '</h3>
                  </div>
                  <div class="cardImage">
                      <img src="'. $concertRow["event_img"]. '">
                  </div>
                  <div class="cardDescription">
                      <p><i class="fas fa-calendar-alt fasdesc"></i>'. $concertRow["eventDate"]. '</p>
                      <p><i class="fas fa-map-marker-alt fasdesc"></i>'. $concertRow["event_address"]. '</p>
                      <p><i class="fas fa-dollar-sign fasdesc"></i>'. $concertRow["event_price"]. '</p>
                      <p><i class="fas fa-globe-europe fasdesc"></i><a target="_blank" href="'. $concertRow["event_web_address"]. '">'. $concertRow["event_web_address"]. '</a></p>
                  </div>';
                  if(isset($_SESSION['admin'])){
                    echo
                    '
                      <div class="changeButtons">
                          <form class="changeform" method="POST" accept-charset="utf-8">
                              <input type="hidden" name="event_id" value="'.$concertRow['event_id'].'">
                              <a data-toggle="modal" data-target="#editConcertModal'. $concertRow['event_id']. '" class="create" title="Edit"><button class="btn btn-primary change" type="submit" name ="edit">Edit</button></a>
                              <div class="modal fade" id="editConcertModal'. $concertRow['event_id']. '" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Edit "'. $concertRow['event_name']. '"</h4>
                                          </div>
                                          <div class="modal-body">
                                              <p>Name</p>
                                              <input type="text" name="event_name" maxlength="55" value="'. $concertRow['event_name']. '" required>
                                              <p>Image (url)</p>
                                              <input type="text" name="event_img" maxlength="500" value="'. $concertRow['event_img']. '" required>
                                              <p>Date</p>
                                              <input type="date" name="eventDate" value="'. $concertRow['eventDate']. '" required>
                                              <p>Location</p>
                                              <input type="text" name="event_address" maxlength="100" value="'. $concertRow['event_address']. '" required>
                                              <p>Ticket Price</p>
                                              <input type="text" name="event_price" value="'. $concertRow['event_price']. '" required>
                                              <p>Web Address</p>
                                              <input type="text" name="event_web_address" maxlength="200" value="'. $concertRow['event_web_address']. '" required>
                                          </div>
                                          <div class="modal-footer">
                                              <input type="submit" name="updateEvent" class="btn btn-primary" value="Update">
                                              <button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <form class="changeform" method="POST" accept-charset="utf-8">
                              <input type="hidden" name="event_id" value="'.$concertRow['event_id'].'">
                              <a data-toggle="modal" data-target="#deleteEventModal'. $concertRow['event_id']. '" class="create" href="deleteEvent.php" title="Delete"><button class="btn btn-danger change" type="submit" name ="deleteEvent">Delete</button></a>
                              <div class="modal fade" id="deleteConcertModal'. $concertRow['event_id']. '" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Delete "'. $concertRow['event_name']. '"</h4>
                                          </div>
                                          <div class="modal-body">
                                              <h3>Are you sure you want to delete "'. $concertRow['event_name']. '"?</h3>
                                          </div>
                                          <div class="modal-footer">
                                              <input type="submit" name="deleteEvent" class="btn btn-danger" value="Delete">
                                              <button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                    ';
                  }
                  echo '
              </div>
            ';
            }
          }
          else
          {
            echo '<p>Sorry, no Concerts found!</p>';
          }
          ?>
        </div>
        </div>

    <!-- Footer -->
    <div class="container-fluid">
      <footer id="footer">
        <div class="inner">
          <div class="flex">
            <div class="copyright">
               Copyright: Anes Smajic</a>
            </div>
            <ul class="icons">
              <li><i class="fab fa-facebook-f"></i></li>
              <li><i class="fab fa-twitter"></i></li>
              <li><i class="fab fa-pinterest-p"></i></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>

</body>
</html>