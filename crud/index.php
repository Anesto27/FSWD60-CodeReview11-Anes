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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
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

    <!-- One -->
      <section id="one" class="wrapper">
        <div class="inner">
          <div class="flex flex-3">
            <article>
              <header>
                <h3>The most popular coding<br /> school in the town</h3>
              </header>
              <p>CodeFactory is one of the best coding schools in Vienna. Don't miss the possibility to become a Full Stack Web Developer</p>
              <footer>
                <a href="https://codefactory.wien/de/home/" class="button special">More</a>
              </footer>
            </article>
            <article>
              <header>
                <h3>THE BEST Nightlife in Vienna</h3>
              </header>
              <p>Apart from losing venues like Die Kantine, Café Leopold, and Ragnarhof due to closing last year, Vienna’s club scene is still at the top of its game, thriving and ever-vibrant. Find out more about the places to go at night to have drinks with friends, sweat heavily while dancing to great music, encounter strangers and a high chance to lose your pants in.</p>
              <footer>
                <a href="https://www.viennawurstelstand.com/guide/viennas-best-clubs-to-lose-your-pants-in-volume-1/" class="button special">More</a>
              </footer>
            </article>
            <article>
              <header>
                <h3>Unforgettable Night out in Vienna</h3>
              </header>
              <p>However, Austria’s capital city has a surprisingly lively nightlife within the city’s subcultures—here are a few of the best places to check out for a memorable evening.</p>
              <footer>
                <a href="https://theculturetrip.com/europe/austria/articles/12-places-for-an-unforgettable-night-out-in-vienna/" class="button special">More</a>
              </footer>
            </article>
          </div>
        </div>
      </section>

    <!-- Two -->
      <section id="two" class="wrapper style1 special">
        <div class="inner">
          <header>
            <h2>CEO & Founder</h2>
          </header>
          <div class="flex flex-4">
            <div class="box person">
              <div class="image round">
                <img src="img/Anes.jpg" alt="Person 1" />
              </div>
              <h3>Smajic Anes</h3>
              <hr>
              <p>email: smajic.kairo@gmx.at</p>
              <span class="icons2">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-pinterest-p"></i>
            </span>
            </div>
            
            
          </div>
        </div>
      </section>

    <!-- Three -->
      <section id="three" class="wrapper special">
        <div class="inner">
          <header class="align-center">
            <h2>VIENNA SIGHTSEEING TOURS</h2>
            <p>the two most popular skyscraper's </p>
          </header>
          <div class="flex flex-2">
            <article>
              <div class="image2">
                <img src="img/dc.jpg" alt="Pic 01" />
              </div>
              <header>
                <h3>DC Tower</h3>
              </header>
              <p>The DC Towers are two skyscrapers planned and partially completed by French architect Dominique Perrault in Vienna's Donau City. The first of the two buildings, DC Tower 1, opened on 26 February 2014 and has since been the tallest building in Austria.</p>
              <footer>
                <a href="https://de.wikipedia.org/wiki/DC_Towers" class="button special" class="button special">More</a>
              </footer>
            </article>
            <article>
              <div class="image2">
                <img src="img/millenium.jpg" alt="Pic 02" />
              </div>
              <header>
                <h3>Millenium-City Tower</h3>
              </header>
              <p>The Millennium Tower office tower at Handelskai 94-96 in Vienna's 20th district of Brigittenau was the highest office building in Austria with a height of 171 m and a total height of 202 m until the completion of DC Tower 1.</p>
              <footer>
                <a href="https://de.wikipedia.org/wiki/Millennium_Tower_(Wien)" class="button special">More</a>
              </footer>
            </article>
          </div>
        </div>
      </section>

    <!-- Footer -->
      <footer id="footer">
        <div class="inner">
          <div class="flex">
            <div class="copyright">
              &copy; Copyright: <a href="https://templated.co">Anes Smajic</a>
            </div>
            <ul class="icons">
              <li><i class="fab fa-facebook-f"></i></li>
              <li><i class="fab fa-twitter"></i></li>
              <li><i class="fab fa-pinterest-p"></i></li>
            </ul>
          </div>
        </div>
      </footer>

</body>
</html>