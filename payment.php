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
    $username=$_SESSION['username'];

    $sql="select * from user where name ='$username'";//id is database name
    $result=$conn->query($sql);
  
    if($result->num_rows > 0){ //over 1 database(record) so run
       while($row = $result->fetch_assoc()){
           $_SESSION['id']=$row['id'];
           $_SESSION['name']=$row['name'];
           $_SESSION['phone']=$row['phone'];
           $_SESSION['email']=$row['email'];
           $_SESSION['address']=$row['address'];
           $_SESSION['image']=$row['image'];
       }
     }
}

$calculate="SELECT SUM(goodsPrice) as good FROM `orderlist` WHERE username='$username' and status='0'";
$calResult=$conn->query($calculate);

$sum=0;
while($row = mysqli_fetch_array($calResult)){
$sum = $row['good'];
$total1 = $sum * 0.01;//0.01 = 10% discount
$total2 = $sum + $total1; 
}
$totalPrice = $total2;


$print="select * from orderlist where username='$username' and status='0'";
$printResult=$conn->query($print);
if($result->num_rows > 0){ //over 1 database(record) so run
    while($row = $result->fetch_assoc()){
        $orderId = $row['orderid'];
        $username = $row['username'];
        $status = $row['status'];
    }
}
$status = 1;

$generateID = uniqid();
// echo $generateID;
if(isset($_POST['payment'])){
    $userName = $_SESSION['username'];
    $cardnumber = $_POST['cardNumber'];
    $cvv = $_POST['cvv'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    
    if($cardnumber != "" && $cvv != "" && $month != "" && $year != ""){
    //    if(strlen($cardnumber) == 16 && strlen($cvv) ==3){
    $End=" insert into paybil(paidID,username,totalPrice,cardnumber,month,year,ccv) values('$generateID','$userName',
    '$totalPrice','$cardnumber','$month','$year','$cvv')";
    $Endresult=$conn->query($End);
    
    if(isset($_POST['payment'])){ //change order status
        $changes = "Update orderlist set status='$status' where username='$username'";
        $changesResult=$conn->query($changes);
    }
    echo '<script>window.alert("Payment Succefully! Thank You Support")</script>';
    header('refresh:0.5;url=adidasLifestyle.php');
//    }else{
//        echo  '<script>window.alert("Card Number Or CVV NO complete!!!")</script>';
//    } 
  }else{
      echo '<script>window.alert("Payment Area Cannot Be Empty!!!")</script>';
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
    <link rel="stylesheet" type="text/css" href="project.php">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas Payment</title>
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
  .content{
      /* background-color:Grey; */
      width:100%;
      height:800px;
  }
  .panel{
      /* background-color:blue; */
      width:50%;
      height:600px;
      float:left;
  }
  .textform{
      width:90%;
      height:100px;
      background-color:white;
      margin-left:30px;
  }
  .productDiv{
      width:90%;
      height:150px;
      /* background-color:Grey; */
      margin-left:30px;
  }
  .imgdiv{
      width:150px;
      height:150px;
      /* background-color:yellow; */
      float:left;
  }
  .menudiv{
      width:305px;
      height:150px;
      /* background-color:pink; */
      float:left;
  }
  .word{
      font-family:Times New Roman;
      padding-top:10px;
  }
  .rightside{
      float:left;
      width:100px;
      height:150px;
  }
  .quan{
      margin-top:50px;
  }
  .imgset{
      width:150px;
      height:150px;
  }
  .checkOutBtn{
      width:90%;
      height:150px;
      background-color:white;
      margin-left:30px;
  }
  .bttn{
      width:300px;
      height:60px;
      font-size:1.6em;
      margin:50px 50px 0px 150px;
  }
  .creditCardForm {
    width: 600px;
    /* background-color: Blue; */
    overflow: hidden;
    padding: 25px;
    color: #4c4e56;
}
.creditCardForm .payment .form-group {
    float: left;
    margin-bottom: 15px;
}
.card{
    width:80px;
    height:50px;
    float:left;
}
 </style>

<body>
    <?php require_once ('header.php');?>

    <form action="payment.php" method="POST">
      <div class="content">
        <div class="panel">
            <div class="textform">
               <h1>Shipping Address</h1>
               <hr>
            </div>
            <div class="textform">
               <h4>Full Name:<h4>
               <input type="text" name="username" size="40" placeholder="" value="<?php echo $_SESSION['name'];?>"> 
            </div>
            <div class="textform">
               <h4>Phone Number:<h4>
               <input type="text" name="username" size="40" placeholder="" value="<?php echo $_SESSION['phone'];?>"> 
            </div>
            <div class="textform">
               <h4>Email Address:<h4>
               <input type="text" name="username" size="40" placeholder="" value="<?php echo $_SESSION['email'];?>"> 
            </div>
            <div class="textform">
               <h4>Address:<h4>
               <input type="text" name="username" size="40" placeholder="" value="<?php echo $_SESSION['address'];?>"> 
            </div>
            <!-- <div class="textform">
               <h4>Country:<h4>
               <input type="text" name="username" size="40" placeholder="" value=""> 
            </div> -->
            <!-- <div class="textform">
               <h4>State:<h4>
               <input type="text" name="username" size="40" placeholder="" value=""> 
            </div>
            <div class="textform">
               <h4>Postal Code:<h4>
               <input type="text" name="username" size="40" placeholder="" value=""> 
            </div>             -->
        </div>
        <div class="panel">
            <div class="textform">
               <h1>Order List</h1>
               <hr>
            </div>
        <div class="productDiv">
        <table class="table table-striped custab">
             <thead>
    <!-- <a href="register.php" style="width:130px;height:40px;text-align:center;margin-top:20px" type="button"><b>+</b> Add new product</a> -->
                <tr>
                     <th>Images</th>
                     <th>Name</th>
                     <th>Color</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <!-- <th class="text-center">Action</th> -->
                 </tr>
            </thead>
            <tbody>
            <?php
                 $payment=" select * from orderlist where username ='$username' and status='0'";
                 $result = $conn->query($payment);
                  if($result->num_rows > 0){ //over 1 database(record) so run
                  while($row = $result->fetch_assoc()){
                      $id=$row['orderid'];//[] inside is follow database 
                      $userId=$row['userid'];
                      $userName=$row['username'];
                      $goodsId=$row['goodsId'];
                      $goodsName=$row['goodsName'];
                      $goodsImage=$row['goodsImage'];
                      $goodsPrice=$row['goodsPrice'];
                      $goodsColor=$row['goodsColor'];
                      $goodsQuantity=$row['quantity'];
             ?>    
                <tr>
                     <td><img src="images/<?php echo $goodsImage;?>" style="width:50px;height:50px"></td>
                     <td><?php echo $goodsName; ?></td> 
                     <td><?php echo $goodsColor; ?></td>
                     <td><?php echo $goodsQuantity; ?></td>
                     <td><?php echo $goodsPrice; ?></td>
                     <td class="text-center">
                     <!-- <a class='btn btn-info btn-xs' href=".php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-edit"></span> Edit </a>  -->
                     </td>
                </tr>
            <?php
                }//end while
              }//end if
                $calculate="SELECT SUM(goodsPrice) as good FROM `orderlist` WHERE username='$userName' and status='0'";
                $calResult=$conn->query($calculate);

                $sum=0;
                while($row = mysqli_fetch_array($calResult)){
                $sum = $row['good'];
                $total1 = $sum * 0.01;
                $total2 = $sum + $total1; 
              }
            ?>              
         </table>

         <table> <!--table order payment-->
            <tr>
            <div class="creditCardForm">
    <div class="payment">
        <form>
        <div class="form-group" id="card-number-field">
                <label for="">Card Number</label>
                <input type="text"  class="form-control" name="cardNumber" placeholder="0000-0000-0000-0000">
            </div>
            <div class="form-group CVV">
                <label for="cvv">CVV</label>
                <input type="text"  class="form-control" name="cvv" placeholder="0-0-0">
            </div>
            <div class="form-group" id="expiration-date">
                <label>Expiration Date</label>
                <select name="month">
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="year">
                    <option value="19"> 2019</option>
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
                    <option value="22"> 2022</option>
                    <option value="23"> 2023</option>
                    <option value="24"> 2024</option>
                    <option value="25"> 2025</option>
                    <option value="26"> 2026</option>
                    <option value="27"> 2027</option>
                    <option value="28"> 2028</option>
                    <option value="29"> 2029</option>
                    <option value="30"> 2030</option>
                </select>
            </div>
            <div class="form-group" id="credit_cards">
                <img src="visa.png" id="visa" class="card onlinecard">
                <img src="master.png" id="mastercard" class="card onlinecard">
                <img src="amex.jpg" id="amex" class="card onlinecard">
            </div>
            <!-- <div class="form-group" id="pay-now">
                <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
            </div> -->
        </form>
    </div>
</div>       
            </tr>
            </table>
            <table>
            <tr> 
               <td colspan="3"><h4>Total:</h4></td>
               <!-- <td></td>
               <td></td> -->
               <td><p style="font-weight:bold;font-size:1.3em;padding-top:10px;padding-left:4px;padding-right:4px;"> RM </p></td>
               <td><input type="text"  name="t1" value="<?php echo $total2;?>"></td>
            </tr>
            <tr>   
                <td colspan="9" style="text-align:center">
                  <button type="submit" name="payment" class="btn btn-danger btn-xs" id="payment">Payment</button>
                  <!-- <input type="submit" name="payment" class="btn btn-danger btn-xs" value="Payment"> -->
                </td> 
            </tr> 
    </tbody>
    </table> 
       </div>
  </div>
  </from>
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