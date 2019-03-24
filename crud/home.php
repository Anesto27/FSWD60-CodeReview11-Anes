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
  if(isset($_POST['createTodo'])){
    $place_name = $_POST['place_name'];
    $place_img = $_POST['place_img'];
    $place_decrp = $_POST['place_decrp']
    ;$place_type = $_POST['place_type'];
    $place_address = $_POST['place_address'];
    $place_web_address = $_POST['place_web_address'];
    $sql = "INSERT INTO `todo`(`place_name`, `place_img`,`place_descrp`, `place_type`,  `place_address`, `place_web_address`) VALUES ('$place_name','$place_img','$place_decrp','$place_type','$place_address','$place_web_address')";
    if($mysqli->query($sql) ===TRUE){
      header("Location: home.php");
    }else{
      echo "Error while updating record : ". $mysqli->error;
    }
  }
  if(isset($_POST['updateTodo'])){
    $id = $_POST['todo_id'];
    $place_name = $_POST['place_name'];
    $place_img = $_POST['place_img'];
    $place_descrp = $_POST['place_descrp'];
    $place_type = $_POST['place_type'];
    $place_address = $_POST['place_address'];
    $place_web_address = $_POST['place_web_address'];
    $sql = "UPDATE `todo` SET `place_name`='$place_name',`place_img`='$place_img',`place_descrp`='$place_descrp',`place_type`='$place_type',`place_address`='$place_address',`place_web_address`='$place_web_address' WHERE todo_id={$id}";
    if($mysqli->query($sql) ===TRUE){
      header("Location: home.php");
    }else{
      echo "Error while updating record: ". $mysqli->error;
    }
  }
  if(isset($_POST['deleteTodo'])){
    $id = $_POST['todo_id'];
    $sql = "DELETE FROM `todo` WHERE todo_id = {$id}";
    if($mysqli->query($sql) === TRUE) {
      header("Location: home.php");
    } else {
      echo "Error while deleting record: ". $mysqli->error;
    }
  }
  if(isset($_POST['createRestaurants'])){
    $restaurant_name = $_POST['restaurant_name'];
    $restaurant_img = $_POST['restaurant_img'];
    $restaurant_descrp = $_POST['restaurant_descrp'];
    $telephone_number = $_POST['telephone_number'];
    $restaurant_type = $_POST['restaurant_type'];
    $restaurant_address = $_POST['restaurant_address'];
    $restaurant_web_address = $_POST['restaurant_web_address'];
    $sql = "INSERT INTO `todo`(`restaurant_name`, `restaurant_img`,`restaurant_descrp`, `telephone_number`,  `restaurant_type`, `restaurant_address`,`restaurant_web_address`) VALUES ('$restaurant_name','$restaurant_img','$restaurant_descrp','$telephone_number','$restaurant_type','$restaurant_address','$restaurant_web_address')";
    if($mysqli->query($sql) ===TRUE){
      header("Location: home.php");
    }else{
      echo "Error while updating record : ". $mysqli->error;
    }
  }
  if(isset($_POST['updateRestaurants'])){
    $id = $_POST['restaurant_id'];
    $restaurant_name = $_POST['restaurant_name'];
    $restaurant_img = $_POST['restaurant_img'];
    $restaurant_descrp = $_POST['restaurant_descrp'];
    $telephone_number = $_POST['telephone_number'];
    $restaurant_type = $_POST['restaurant_type'];
    $restaurant_address = $_POST['restaurant_address'];
    $restaurant_web_address = $_POST['restaurant_web_address'];
    $sql = "UPDATE `restaurants` SET `restaurant_name`='$restaurant_name',`restaurant_img`='$restaurant_img',`restaurant_descrp`='$restaurant_descrp',`telephone_number`='$telephone_number',`restaurant_type`='$restaurant_type',`restaurant_address`='$restaurant_address',`restaurant_web_address`='$restaurant_web_address' WHERE restaurant_id={$id}";
    if($mysqli->query($sql) ===TRUE){
      header("Location: home.php");
    }else{
      echo "Error while updating record: ". $mysqli->error;
    }
  }
  if(isset($_POST['deleteRestaurants'])){
    $id = $_POST['restaurant_id'];
    $sql = "DELETE FROM `restaurants` WHERE restaurant_id = {$id}";
    if($mysqli->query($sql) === TRUE) {
      header("Location: home.php");
    } else {
      echo "Error while deleting record: ". $mysqli->error;
    }
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
        <div class="row thingsToDo">
          <div class="rowdesc">
            <h1>Things To Do</h1>
            <?php
              if(isset($_SESSION['admin'])){
                echo '
                  <a data-toggle="modal" data-target="#createTodo" class="create" title="Create new Thing To Do"><button class="btn btn-success" type="submit" name ="create">Create new entry</button></a>
                  <form method="POST" accept-charset="utf-8">
                      <div class="modal fade" id="createTodo" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Create a new "Thing To Do"</h4>
                                  </div>
                                  <div class="modal-body">
                                      <p>Name</p>
                                      <input type="text" name="place_name" maxlength="55" required>
                                      <p>Image (url)</p>
                                      <input type="text" name="place_img" maxlength="500" required>
                                      <p>Address</p>
                                      <input type="text" name="place_address" maxlength="100" required>
                                      <p>Type (e.g. Museum, Park, Market etc.)</p>
                                      <input type="text" name="place_type" maxlength="55" required>
                                      <p>Description (max:100)</p>
                                      <textarea name="place_decrp" maxlength="100" required></textarea>
                                      <p>Web Address</p>
                                      <input type="text" name="place_web_address" maxlength="200" required>
                                  </div>
                                  <div class="modal-footer">
                                      <input type="submit" name="createTodo" class="btn btn-success" value="Create">
                                      <button type="submit" class="btn btn-danger" data-dismiss="modal">Go back</button>
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
          $sql = mysqli_query($mysqli, "SELECT * FROM `todo`");
          $count = mysqli_num_rows($sql);
          if($count > 0) { 
            while($todoRow = mysqli_fetch_array($sql)){
            echo
            '
              <div class="card col-lg-3 col-md-6 col-sm-12">
                  <div class="cardName">
                      <h3>'. $todoRow["place_name"]. '</h3>
                  </div>
                  <div class="cardImage">
                      <img src="'. $todoRow["place_img"]. '">
                  </div>
                  <div class="cardDescription">
                      <p><i class="fas fa-map-marker-alt fasdesc"></i>'. $todoRow["place_address"]. '</p>
                      <p><i class="fas fa-question fasdesc"></i>'. $todoRow["place_type"]. '</p>
                      <p><i class="fas fa-pencil-alt fasdesc"></i>'. $todoRow["place_descrp"]. '</p>
                      <p><i class="fas fa-globe-europe fasdesc"></i><a target="_blank" href="'. $todoRow["place_web_address"]. '">'. $todoRow["place_web_address"]. '</a></p>
                  </div>';
                  if(isset($_SESSION['admin'])){
                    echo
                    '
                      <div class="changeButtons">
                          <form class="changeform" method="POST" accept-charset="utf-8">
                              <input type="hidden" name="todo_id" value="'.$todoRow['todo_id'].'">
                              <a data-toggle="modal" data-target="#editThingsToDoModal'. $todoRow['todo_id']. '" class="create" title="Edit"><button class="btn btn-primary change" type="submit" name ="edit">Edit</button></a>
                              <div class="modal fade" id="editThingsToDoModal'. $todoRow['todo_id']. '" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Edit "'. $todoRow['place_name']. '"</h4>
                                          </div>
                                          <div class="modal-body">
                                              <p>Name</p>
                                              <input type="text" name="place_name" maxlength="55" value="'. $todoRow['place_name']. '" required>
                                              <p>Image (url)</p>
                                              <input type="text" name="place_img" maxlength="500" value="'. $todoRow['place_img']. '" required>
                                              <p>Address</p>
                                              <input type="text" name="place_address" maxlength="100" value="'. $todoRow['place_address']. '" required>
                                              <p>Type (e.g. Museum, Park, Market etc.)</p>
                                              <input type="text" name="place_type" maxlength="55" value="'. $todoRow['place_type']. '" required>
                                              <p>Description (max:100)</p>
                                              <textarea name="place_descrp" maxlength="100" required>'. $todoRow['place_descrp']. '</textarea>
                                              <p>Web Address</p>
                                              <input type="text" name="place_web_address" maxlength="200" value="'. $todoRow['place_web_address']. '" required>
                                          </div>
                                          <div class="modal-footer">
                                              <input type="submit" name="updateTodo" class="btn btn-primary" value="Update">
                                              <button type="submit1" class="btn btn-danger" data-dismiss="modal">Go back</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <form class="changeform" method="POST" accept-charset="utf-8">
                              <input type="hidden" name="todo_id" value="'.$todoRow['todo_id'].'">
                              <a data-toggle="modal" data-target="#deleteTodo'. $todoRow['todo_id']. '" class="create" href="deleteTodo.php" title="Delete"><button class="btn btn-danger change" type="submit" name ="deleteTodo">Delete</button></a>
                              <div class="modal fade" id="deletetodoModal'. $todoRow['todo_id']. '" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Delete "'. $todoRow['place_name']. '"</h4>
                                          </div>
                                          <div class="modal-body">
                                              <h3>Are you sure you want to delete "'. $todoRow['place_name']. '"?</h3>
                                          </div>
                                          <div class="modal-footer">
                                              <input type="submit" name="deleteTodo" class="btn btn-danger" value="Delete">
                                              <button type="submit" class="btn btn-danger" data-dismiss="modal">Go back</button>
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
            echo '<p>Sorry, no Things to do found!</p>';
          }
          ?>
        </div>
        <!-- Restaurants -->
        <div class="row restaurants">
          <div class="rowdesc">
            <h1>Restaurants</h1>
            <?php
              if(isset($_SESSION['admin'])){
                echo '
                  <a data-toggle="modal" data-target="#createRestaurants" class="create" title="Create new Restaurant"><button class="btn btn-success" type="submit" name ="create">Create new entry</button></a>
                  <form method="POST" accept-charset="utf-8">
                      <div class="modal fade" id="createRestaurants" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Create a new "Restaurant"</h4>
                                  </div>
                                  <div class="modal-body">
                                      <p>Name</p>
                                      <input type="text" name="restaurant_name" maxlength="55" required>
                                      <p>Image (url)</p>
                                      <input type="text" name="restaurant_img" maxlength="500" required>
                                      <p>Address</p>
                                      <input type="text" name="restaurant_address" maxlength="100" required>
                                      <p>Type (e.g. Asian, Mexican, Burgers etc.)</p>
                                      <input type="text" name="restaurant_type" maxlength="55" required>
                                      <p>Description (max:100)</p>
                                      <textarea name="restaurant_descrp" maxlength="100" required></textarea>
                                      <p>Phone Number</p>
                                      <input type="text" name="telephone_number" maxlength="20" required>
                                      <p>Web Address</p>
                                      <input type="text" name="restaurant_web_address" maxlength="200" required>
                                  </div>
                                  <div class="modal-footer">
                                      <input type="submit" name="createRestaurants" class="btn btn-success" value="Create">
                                      <button type="submit" class="btn btn-danger" data-dismiss="modal">Go back</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                  ';
              }
            ?>
          </div>
                  <hr>
          <?php
          $sql = mysqli_query($mysqli, "SELECT * FROM `restaurants`");
          $count = mysqli_num_rows($sql);
          if($count > 0) {
            while($restaurantRow = mysqli_fetch_array($sql)){
            echo
            '
              <div class="card col-lg-3 col-md-6 col-sm-12">
                  <div class="cardName">
                      <h3>'. $restaurantRow["restaurant_name"]. '</h3>
                  </div>
                  <div class="cardImage">
                      <img src="'. $restaurantRow["restaurant_img"]. '">
                  </div>
                  <div class="cardDescription">
                      <p><i class="fas fa-map-marker-alt fasdesc"></i>'. $restaurantRow["restaurant_address"]. '</p>
                      <p><i class="fas fa-utensils fasdesc"></i></i>'. $restaurantRow["restaurant_type"]. '</p>
                      <p><i class="fas fa-pencil-alt fasdesc"></i>'. $restaurantRow["restaurant_descrp"]. '</p>
                      <p><i class="fas fa-phone fasdesc"></i>'. $restaurantRow["telephone_number"]. '</p>
                      <p><i class="fas fa-globe-europe fasdesc"></i><a target="_blank" href="'. $restaurantRow["restaurant_web_address"]. '">'. $restaurantRow["restaurant_web_address"]. '</a></p>
                  </div>';
                  if(isset($_SESSION['admin'])){
                    echo
                    '
                      <div class="changeButtons">
                          <form class="changeform" method="POST" accept-charset="utf-8">
                              <input type="hidden" name="restaurant_id" value="'.$restaurantRow['restaurant_id'].'">
                              <a data-toggle="modal" data-target="#editRestaurantModal'. $restaurantRow['restaurant_id']. '" class="create" title="Edit"><button class="btn btn-primary change" type="submit" name ="edit">Edit</button></a>
                              <div class="modal fade" id="editRestaurantModal'. $restaurantRow['restaurant_id']. '" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Edit "'. $restaurantRow['restaurant_name']. '"</h4>
                                          </div>
                                          <div class="modal-body">
                                              <p>Name</p>
                                              <input type="text" name="restaurant_name" maxlength="55" value="'. $restaurantRow['restaurant_name']. '" required>
                                              <p>Image (url)</p>
                                              <input type="text" name="restaurant_img" maxlength="500" value="'. $restaurantRow['restaurant_img']. '" required>
                                              <p>Address</p>
                                              <input type="text" name="restaurant_address" maxlength="100" value="'. $restaurantRow['restaurant_address']. '" required>
                                              <p>Type (e.g. Asian, Mexican, Burgers etc.)</p>
                                              <input type="text" name="restaurant_type" maxlength="55" value="'. $restaurantRow['restaurant_type']. '" required>
                                              <p>Description (max:100)</p>
                                              <textarea name="restaurant_descrp" maxlength="100" required>'. $restaurantRow['restaurant_descrp']. '</textarea>
                                              <p>Phone Number</p>
                                              <input type="text" name="telephone_number" value="'. $restaurantRow['telephone_number']. '">
                                              <p>Web Address</p>
                                              <input type="text" name="restaurant_web_address" maxlength="200" value="'. $restaurantRow['restaurant_web_address']. '" required>
                                          </div>
                                          <div class="modal-footer">
                                              <input type="submit" name="updateRestaurants" class="btn btn-primary" value="Update">
                                              <button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <form class="changeform" method="POST" accept-charset="utf-8">
                              <input type="hidden" name="restaurant_id" value="'.$restaurantRow['restaurant_id'].'">
                              <a data-toggle="modal" data-target="#deleteRestaurantModal'. $restaurantRow['restaurant_id']. '" class="create" href="deletetRestaurants.php" title="Delete"><button class="btn btn-danger change" type="submit" name ="deletetRestaurants">Delete</button></a>
                              <div class="modal fade" id="deleteRestaurantsModal'. $restaurantRow['restaurant_id']. '" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Delete "'. $restaurantRow['restaurant_name']. '"</h4>
                                          </div>
                                          <div class="modal-body">
                                              <h3>Are you sure you want to delete "'. $restaurantRow['restaurant_name']. '"?</h3>
                                          </div>
                                          <div class="modal-footer">
                                              <input type="submit" name="deleteRestaurants" class="btn btn-danger" value="Delete">
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
            echo '<p>Sorry, no Restaurants found!</p>';
          }
          ?>
        </div>
    
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

        <div style='height:300px;width:100%;'><iframe width="" height="300" src=https://maps.google.de/maps?hl=de&q=Stephansdom%20%20Stephansplatz%20wien&t=&z=10&ie=utf8&iwloc=b&output=embed frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style='height:300px;width:100%;'></iframe><p style="text-align:right; margin:0px; padding-top:-10px; line-height:10px;font-size:10px;margin-top: -25px;"><a href="http://www.checkpoll.de/google-maps-generator/" style="font-size:10px;" target="_blank">Google Maps Generator</a> von <a href="https://www.on-projects.de/" style="font-size:10px;" title="Webdesign in Stuttgart" target="_blank">on-projects</a></p></div>


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