<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "adidas";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html lang="en">
  <link rel="icon" href="adidas-favicon.ico" type="image/x-icon"/>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/cardturn.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas Home</title>
  </head>
  <style>
/* .dropbtn {
  color: white;
  padding: 16px;
  font-size: 10px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 12px;
  text-decoration: none;
  display: block;
}

/* #cart_count{
       color:white;
       text-align:center;
       padding:0 0.9rem 0.1rem 0.9rem;
       border-radius:3rem;
} 
.font{
       font-family:Times New Roman;
       padding:3% 0;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;} */ */
</style>
  <body>
    <?php require_once ("header.php"); ?>
    <form action="adidas.php" method="POST">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/carousel3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/carousel7.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" style="width: 100%">
            <img src="images/carousel8.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/carousel9.jpg" class="d-block w-100" alt="..." >
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="container-fluid">
             
        <div class="row" style="margin-top: 15px">
          <div class="col-md-1"></div>
            <div class="col-md-3 cardturn">
              <div class="card " style="width: 18rem;">
                  <h6 style="text-align: center; padding-top: 10px;" class="card-title"><strong>Lifestyle</strong></h6>
                <img src="images/NITE JOGGER SHOES.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">NITE JOGGER SHOES</h5>
                  <p class="card-text">MODERN CUSHIONING UPDATES THIS FLASHY '80S STANDOUT.</p><br><br>
                  <a href="adidasLifetstyle.php" class="btn btn-primary">See More Detail</a>
                </div>
              </div>
            </div>
          <div class="col-md-1"></div>
            <div class="col-md-3 cardturn">
              <div class="card" style="width: 18rem;">
                  <h6 style="text-align: center; padding-top: 10px;" class="card-title"><strong>Basketball</strong></h6>
                <img src="images/Basket7Blackmen.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">PRO BOUNCE 2018 SHOES</h5>
                  <p class="card-text">LIGHTWEIGHT SHOES BUILT FOR QUICK, EXPLOSIVE MOVEMENT.</p><br><br>
                  <a href="adidasBasketball.php" class="btn btn-primary">See More Detail</a>
                </div>
              </div>
            </div>
          <div class="col-md-1"></div>
            <div class="col-md-3 cardturn">
              <div class="card" style="width: 18rem;">
                  <h6 style="text-align: center; padding-top: 10px;" class="card-title"><strong>Training</strong></h6>
                <img src="images/TrainingWomenPureboostXTR3.0LL1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">SOLAR LT TRAINERS</h5>
                  <p class="card-text">LIGHTWEIGHT SHOES READY FOR ANY TYPE OF WORKOUT.</p><br><br>
                  <a href="adidasTraining.php" class="btn btn-primary">See More Detail</a>
                </div>
              </div>
            </div>
        </div>

        <div class="row" style="margin-top: 40px">
          <div class="col-md-1"></div>
              <iframe width="420" height="345" src="https://www.youtube.com/embed/92cqs74EIaw"></iframe>
          <div class="col-md-2"></div>
              <iframe width="420" height="345" src="https://www.youtube.com/embed/gkIKphi2_P4"></iframe>
          <div class="col-md-2"></div>
        </div>  
        
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">NMD_R1 SHOES<br><span class="text-muted">A SPECIAL-EDITION NMD THAT HONOURS THE SPIRIT OF URBAN EXPLORATION.</span></h2>
              <p class="lead">With a nod to technical outerwear, these shoes blend heritage style with modern innovation. The soft knit textile upper is detailed with
                 subtle 3-Stripes and patch overlays. This special edition pays homage to the NMD's spirit of urban exploration with a graphic inspired by Japanese railway
                  maps printed on the inner midsole and heel. The Boost midsole provides responsive comfort and is accented with distinctive NMD plugs.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img src="images/NMD_R1 SHOES.jpg" width="400" height="400">
          </div>
        </div>
    
        <hr class="featurette-divider">
    
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">STAN SMITH SHOES<br><span class="text-muted" style="font-size: 1em">AN AUTHENTIC VERSION OF THE ICONIC 1972 TENNIS CLASSIC.</span></h2>
            <p class="lead">Back in the day, Stan Smith won big on the tennis court. The shoe that bears his name has been winning on the streets ever since. Top to bottom, these
               shoes capture the essential style of the 1972 original, with the minimalist leather build and clean trim that have always been its hallmark.</p>
          </div>
          <div class="col-md-5">
            <img src="images/STAN SMITH SHOES kid.jpg" width="400" height="400">
          </div>
        </div>
    
        <hr class="featurette-divider">
        </form>
        <footer class="container py-5">
          <div class="row">
            <div class="col-12 col-md">
              <small class="d-block mb-3 text-muted">&copy; 2019 Southern IT-19B</small>
            </div>
            <div class="col-6 col-md">
              <h5>Shoes</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="adidasLifestyle.php">Lifestyle</a></li>
                <li><a class="text-muted" href="adidasRunning.php">Running</a></li>
                <li><a class="text-muted" href="adidasFootball.php">Football</a></li>
                <li><a class="text-muted" href="adidasBasketball.php">Basketball</a></li>
                <li><a class="text-muted" href="adidasTraining.php">Training</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Company Info</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="http://www.adidas-group.com/en/">About Us</a></li>
                <li><a class="text-muted" href="https://careers.adidas-group.com/">Careers</a></li>
                <li><a class="text-muted" href="http://news.adidas.com/">Press</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Support</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="adidasCustomerService.html">Help & Customer Service</a></li>
                <li><a class="text-muted" href="AdidasFAQ.html">FAQ</a></li>
              </ul>
            </div>
          </div>
        </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>