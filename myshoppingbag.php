<?php
$servername = "localhost";//localhost for local PC or use IP address
$username = "root"; //database name
$password = "";//database password
$database = "adidas";//database name

session_start();
// Create connection #scawx
$conn = new mysqli($servername, $username, $password,$database);

// Check connection #scawx
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['username'])){
  $userName=$_SESSION['username'];
  if(isset($_POST['delete'])){
     $dID = $_POST['deleteid'];
     $cancel="delete from orderlist where orderid = '$dID' and username='$userName'";
     $canResult=$conn->query($cancel);

    echo '<script>window.alert("Product Is Remove from Cart")</script>';
   }
}else{
  echo '<script>window.alert("Please Login First")</script>';
  header('refresh:1;url=Login.php');
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
    <link rel="stylesheet" type="text/css" href="project.php">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas My Shopping Bag </title>
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
  
  .removeBtn:hover{
    background-color: Red;
    box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
    color: #fff;
    transform: translateY(-7px);
  }
  /* .coBtn{
    padding-top:70px;
    padding-left:200px;
  } */
 </style>
  <body>
    <?php require_once ('header.php');?>
     <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h3 class="font">My Shopping Cart</h3>
                <hr>
                <!-- <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>color</th>
            <th>Quantity</th>
            <th>Style</th>
            <th class="text-center">Action</th>
        </tr> -->
    </thead>
    <tbody>
         <?php
            if(isset($_SESSION['username'])){
             $user = $_SESSION['username'];
             $sql="select * from orderlist where username='$user' and status='0'";//id is database name
             $result=$conn->query($sql);
            
             if($result->num_rows > 0){ //over 1 database(record) so run
             while($row = $result->fetch_assoc()){
             //display result
             $id=$row['orderid'];//[] inside is follow database 
             $userId=$row['userid'];
             $userName=$row['username'];
             $goodsId=$row['goodsId'];
             $goodsName=$row['goodsName'];
             $goodsImage=$row['goodsImage'];
             $goodsPrice=$row['goodsPrice'];
             $goodsColor=$row['goodsColor'];
             $goodsSize=$row['goodsSize'];
             $goodsQuantity=$row['quantity'];
        ?> 
                             <form action="myshoppingbag.php" method="POST" class="cart-items">
                                    <div class="border rounded">
                                        <div class="row bg-white">
                                        <!-- <input type="checkbox" name="item[]"  value="<?php echo $id;?>" style="width:20px;height:20px;margin-top:65px;margin-right:20px"> -->
                                            <div class="col-md-3 pl-0">
                                                <img src="images/<?php echo $goodsImage;?>" alt="<?php echo $goodsName;?>" class="img-fluid">
                                            </div>
                                            <div class="col-md-4">
                                                <h5 class="pt-2"><?php echo $goodsName;?></h5>
                                                <small><?php echo $goodsColor;?></small><br>
                                                <h4 class="text-secondary">Size :<?php echo $goodsSize;?></h4>
                                                <!-- <h5 class="pt-2">RM<?php echo $goodsQuantity*$goodsPrice;?></h5> -->
                                                RM<input type="text" style="border:0;margin-top:20px;size:1.5em" value="<?php echo $goodsQuantity*$goodsPrice; ?>" name="price[]" size="6" id="price[]"/>
                                                <!-- <button type="submit" class="btn btn-danger" name="remove">Remove</button>     -->
                                            </div>
                                            <div class="col-md-3 py-5">
                                                <div>
                                                    <!-- <button type="button"  id="plus" class="btn bg-light border rounded-circle"><i class="fa fa-minus"></i></button> -->
                                                    <input type="text"  name="numquantity" id="numquntity" value="<?php echo $goodsQuantity;?>" class="form-control w-25 d-inline" readonly/>
                                                    <!-- <button type="button" id="subtract" class="btn bg-light border rounded-circle"><i class="fa fa-plus"></i></button> -->
                                                    <button name="delete" type="submit" class="btn btn-danger btn-xs">Remove
                                                    <input type="hidden" name="deleteid" value="<?php echo $id;?>"></button>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

          <?php
             }//end while
            }else{
              echo "<h1>Your Cart is Emptry ...</h1>";
              echo "<a href=\"adidas.php\">Home Page</a>";
            }
          }else{
            echo "<h1>Your Must Login First !!!</h1>";
          }
        ?>
             </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
           <div class="pt-4">
           <?php
            if(isset($_SESSION['username'])){
              //calculate price
            //  $getQuantity="SELECT COUNT(quantity) as gQuantity FROM `orderlist` WHERE username='$userName' and status='0' and goodsName='$goodsName'";
            //  $getQuantityResult = $conn->query($getQuantity);

             $calculate="SELECT SUM(goodsPrice) as good FROM `orderlist` WHERE username='$userName' and status='0'";
             $calResult=$conn->query($calculate);

             $sum=0;
             while($row = mysqli_fetch_array($calResult)){
              $sum = $row['good'];
              $total1 = $sum * 0.01;//cal tax
              $total2 = $sum + $total1; //all total
             }
            }else{
              
            }           
             ?>
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6" >   
                        <h6 style="pandding-top:50px;">Subtotal</h6>
                        <hr>
                        <h6>Delivery Charges (1%)</h6>
                        <hr>
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">RM<?php if(isset($_SESSION['username'])){ echo $sum; }?></h6><hr>                        
                        <h6 class="text-success">RM<?php if(isset($_SESSION['username'])){ echo $total1;}?></h6><hr>
                        <h6 class="text-success">RM<?php if(isset($_SESSION['username'])){ echo $total2;}?></h6>
                    </div>
                </div>
            </div>
            <!-- <input type="submit" style="width:400px;" href="payment.php" value="CheckOut"> -->
            <button class="checkOutBtn" onclick="window.location.href='payment.php'" type="button">CheckOut</button>
            <!-- <a href="payment.php" class="coBtn">Checkout</a> -->
        </div>
        
        <div style="width:100%;height:40px;padding-left:500px;font-family:times new roman;font-size:1.6em;margin-top:50px">
            <h3><a href="adidas.php">--- Continues Shopping ---</a></h3>
        </div>
    </div>
    <!-- <?php if(isset($_SESSION['username'])){
       echo "<button type=\"submit\" class=\"btn btn-danger removeBtn\" style=\"width:300px;height:40px;
            margin-left:100px;margin-top:10px;box-shadow: 0px 8px 15px rgba(0,0,0,0.1)\";
            name=\"delete\">Remove</button>";
     echo "<button type=\"submit\" class=\"btn btn-info removeBtn\" style=\"width:300px;height:40px;
          margin-left:50px;margin-top:10px;box-shadow: 0px 8px 15px rgba(0,0,0,0.1)\";
          name=\"buy\">CheckOut</button>";
    }else{

     }?> -->  
</div>
                <footer class="container py-5">
                 <hr>
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
                          <li><a class="text-muted" href="Training.html">Training</a></li>
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
          
              <!-- Optional JavaScript -->
              <!-- jQuery first, then Popper.js, then Bootstrap JS -->
              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </body>
          </html>