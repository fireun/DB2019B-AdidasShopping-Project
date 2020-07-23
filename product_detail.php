<html lang="en">
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


if(isset($_GET['id'])){
  $id=$_GET['id']; //recived driverId from adidasLifestyle.php
  $sql="SELECT * FROM product WHERE id='".$id."'";//id is database name
  $result=$conn->query($sql);

  if($result->num_rows > 0){ //over 1 database(record) so run
   while($row = $result->fetch_assoc()){
       //display result
       $id=$row['id'];//[] inside is follow database 
       $name=$row['name'];
       $price=$row['price'];
       $image=$row['image'];
       $color=$row['color'];
       $quantity=$row['quantity'];
       $style=$row['style'];
      //  $title=$row['title'];
      //  $description=$row['decription'];
   }
  }
}


// $userName=$_SESSION['username'];
// $userId=$_SESSION['id']; 
// $goodsprice = $price;
// $goodsimage = $image;
// $goodscolor = $color;
// $goodsquantity = $quantity;
// $goodsstyle = $style;

// echo $id;
// echo $productId,$productName,$goodsprice,$goodscolor,$goodsstyle,'<br>';
// echo $id,$name;
$generateOrderId = uniqid();
// $generateOrderId = 0;//order list id
  // //step 5:Define SQL
  //  $generateOrderId++;//if add new product id +1
 if(isset($_POST['add'])){
  if(isset($_SESSION['username'])){
    $userName=$_SESSION['username'];
      $userName=$_SESSION['username'];
       $userId=$_SESSION['id']; 
       $userquantity=$_POST['quantity'];
       $goodsSize=$_POST['size'];

       $sql="insert into orderlist(orderid,userid,username,goodsId,goodsName,goodsImage,goodsPrice,goodsColor,goodsSize,quantity)values
        ('$generateOrderId','$userId','$userName','$id','$name','$image','$price','$color','$goodsSize','$userquantity')";//get $createname save follow database colmun
      $result=$conn->query($sql);
 
  echo'<script type=text/javascript>';//add myself
  echo 'window.alert("Add Product Scessfully")';
  echo '</script>';
  }else{
     echo '<script>window.alert("Your must login first")</script>';
     header('refresh:0;url=Login.php');
  }
}
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Adidas</title>
  </head>
  <style>
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
  
  .dropdown:hover .dropdown-content {display: block;}

 </style>
  <body>
  <?php require_once ("header.php"); ?>
              
             <form action="product_detail.php?id=<?php echo $_GET['id'];?>" method="POST">
              <div class="row">
                <div class="col-md-6 col-sm-6" style="margin-top:10px;margin-left:10px;">
                    <img src="images/<?php echo $image; ?>" width=650px>
                </div>
                <div class="col-md-5 col-sm-6" style="margin-top:10px;">
                        ★★★★★
                        <br>
                        <h2><?php echo $name; ?></h2>
                        Rm<?php echo $price;?>
                        <br>
                        <br>
                        <h3>AVAILABLE COLORS</h3>
                        white&nbsp;
                        <br>
                        <br>
                        <a href="product_detail.php"><img src="images/<?php echo $image; ?>" class="img fluid rounded-circle" width=80px></a>
                        
                        <br>
                        
                        <br>
                        <br>
                        Please select your size : <input type="number" name="size" value="35" min="35" max="45"> 35-45
                        <div style="height:100px;">Quantity<input type="number" name="quantity" value="1" min="1" max="10"> Available stock :<?php echo $quantity;?></div>
                        <!-- <a href="adidasCalculate.php? id=<?php echo $id;?>"><?php echo $id; ?> -->
                        <button class="btn btn-danger btn-xs" name="add">Add to Cart</button>
                 <!-- this can user <a href="myCart.php?id=<?php echo $id;?>">Add to Cart</a> -->
                        <!-- <input type='hidden' name='goodsId' value='<?php echo $id;?>'> 
                        <input type='hidden' name='goodsName' value='<?php echo $name;?>'> -->

                </div>
                <div class="col-md-1 col-sm-6" style="margin-top:10px;"></div>
                    <div style="margin-left:10px;padding-left:10px;">
                            <h2><?php echo $name; ?></h2><br>
                            <h4>A TENNIS LOOK FROM THE 1980S RETURNS IN FRESH STYLE.</h4><br>
                            Steeped in nostalgia, the Continental 80 captures the retro look of indoor trainers from the early 1980s. The leather shoes feature a swooping two-tone stripe and a distinctive split rubber cupsole that's built for a comfortable, flexible feel.
                    </div>
              </div>
             </form>

              <footer class="container py-5">
                <div class="row">
                  <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2019 Southern IT-19B</small>
                  </div>
                  <div class="col-6 col-md">
                    <h5>Shoes</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="adidasLifestyle.html">Lifestyle</a></li>
                      <li><a class="text-muted" href="adidasRunning.html">Running</a></li>
                      <li><a class="text-muted" href="adidasFootball.html">Football</a></li>
                      <li><a class="text-muted" href="adidasBasketball.html">Basketball</a></li>
                      <li><a class="text-muted" href="adidasTraining.html">Training</a></li>
                      <li><a class="text-muted" href="AdidasCalculate.html">Calculate Tools</a></li>
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

                </body>
              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
              
          </html>
