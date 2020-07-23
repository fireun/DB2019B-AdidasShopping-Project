<?php
$servername = "localhost";//localhost for local PC or use IP address
$username = "root"; //database name
$password = "";//database password
$database = "adidas";//database name

// Create connection #scawx
$conn = new mysqli($servername, $username, $password,$database);

// Check connection #scawx
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['userimage'])){
    $username=$_GET['username'];
    $ui=$_GET['image']; //recived driverId from viewdriver.php
    $sql="select image from user where username='$username'";//id is database name
    $result=$conn->query($sql);
 
    if($result->num_rows > 0){ //over 1 database(record) so run
     while($row = $result->fetch_assoc()){
         //display result
         $username=$row['username'];//[] inside is follow database 
         $ui=$row['image'];
     }
    }
 }
?>

<!doctype html>
<html lang="en">
        <link rel="icon" href="adidas-favicon.ico" type="image/x-icon"/>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/cardturn.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="project.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas Basketball</title>
  </head>
  
  <style>
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
   .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 100px;
    box-shadow: 0px 4px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 10px -5px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {background-color: #ddd;}
  
  .dropdown:hover .dropdown-content {display: block;} */
   </style>
  <body>
  <?php require_once ("header.php"); ?>

              <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                        <ul class="list-group" style="margin-top:100px;">
                            <li class="list-group-item"><a href="adidasLifestyle.php" class="word">Lifestyle</a></li>
                            <li class="list-group-item"><a href="adidasRunning.php" class="word">Running</a></li>
                            <li class="list-group-item"><a href="adidasFootball.php" class="word">Football</a></li>
                            <li class="list-group-item"><a href="adidasBasketball.php" class="word">Basketball</a></li>
                            <li class="list-group-item"><a href="adidasTraining.php" class="word">Training</a></li>
                          </ul>
                        </div>
                        <div class="col-md-9">
                        <div class="card border-0">
                            <h5 clas="card-title">Men</h5>
                                <div class="row">
                                    <?php
                                         //Step:2 for search
                                         if(isset($_POST['search'])){
                                         $keyword=$_POST['search'];
                                         }

                                         //step:3 for search
                                         $search="";
                                         if(isset($_POST['search'])){
                                         $search=" and name like '%".$keyword."%'";//（.）把keyword把search
                                         }

                                         $sql="select * from product where style='basketball'".$search;//有where在sql，search sql 不能再有where 换成and
                                         $result=$conn->query($sql);//Define sql, run sql
                                         if($result->num_rows > 0){ //over 1 database(record) so run
                                             while($row = $result ->fetch_assoc()){
                                                 //display result
                                                 $name=$row['name'];
                                                 $price=$row['price'];
                                                 $image=$row['image'];
                                                 $color=$row['color'];
                                                 $quantity=$row['quantity'];
                                                 $style=$row['style'];
                                                 $id=$row['id']; //for view detail
                                     ?>       
                                    <div class="col-sm-4 cardselect">
                                        <div class="card h-100">
                                            <div class="card-body">
                                             <h5 class="card-title"><?php echo $name; ?></h5>
                                            <img src="images/<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-fluid">
                                            <div class="card-heading">RM <?php echo $price; ?><a href="product_detail.php?id=<?php echo $id;?>" class="btn btn-danger btn-xs" style="float:right;">Select</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php
                                             }//while
                                         }//if
                                     ?>

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