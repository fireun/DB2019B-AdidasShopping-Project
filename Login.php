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

if(isset($_POST['login'])){
  $username= mysqli_real_escape_string($conn,$_POST['username']);
  $password= mysqli_real_escape_string($conn,$_POST['password']);

  if($username!="" && $password!=""){//不是空的
    $sql = "Select name from user where name='$username' and password='$password'";//username and password same ？
    $result= mysqli_query($conn,$sql);//sql
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);
    if($count == 1){//if have username and password  正确
      $_SESSION['username']=$username;
      header("location:profile.php");
    }else{//database 没有这个账户
      echo'<script type=text/javascript>';//add myself
      echo 'window.alert("unvariable username and password")';
      echo '</script>';
     } 
  }else{ //空的
    echo '<script>window.alert("Cannot empty username and password")</script>';
    // header('refresh:3; url=Login.php'); same with javascipt method
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="project.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas Login Page</title>
  </head>
  
  <style>
.dropbtn {
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
} */
.font{
       font-family:Times New Roman;
       padding:3% 0;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}
</style>

<script>
function myRegisterBtn() {
  window.location.href = "Register.php";
}
</script>

  <body>
    <?php require_once ("header.php"); ?>

     <form action="login.php" method="POST">
        <div style="width:90%;height:500px;margin-top:50px;margin-left:80px">

          <div style="width:500px;height:500px;float:left">
           <h1 style="font-size:3em;font-family:Time New Roman;padding-top:10px;padding-left:10px;">Login</h1>
           <a href="#"><ins style="font-size:1.5em;font-family:Time New Roman;padding-top:5px;padding-left:5px">Forgotten Your Password?</ins></a><br>
               <div style="width:400px;height:500px;float:left;backgroun-color:Red">
                   <input style="width:400px;height:50px;font-size:1.5em;font-family:Times New Roman;margin-top:50px;border-style: inset;" type="text" name="username" placeholder="Username"><br>
                   <input style="width:400px;height:50px;font-size:1.5em;font-family:Times New Roman;margin-top:40px;border-style: inset;" type="password" name="password" placeholder="Password"><br>
                   <!-- <button name="login" style="width:200px;height:50px;margin-top:50px;">Login</button> -->
                   <!-- <a href="profile.php?id=<?php echo $id;?>" class="btn btn-info btn-xs">Login</a> -->
                   <input type="submit" name="login" id="login" value="Login" style="width:230px;height:50px;margin-top:50px;background-color:black">
               </div>
          </div>

          <div style="width:710px;height:500px;float:left;">
             <h1>CREATE AN ACCOUNT</h1>
             <p>Creating an account is easy. Enter your email address and fill in the form on the next page and enjoy the benefits of having an account.</p>
             <p>&#10004;Simple overview of your personal information<br>
                &#10004;Faster checkout<br>
                &#10004;A single global login to interact with adidas products and services<br>
                &#10004;Exclusive offers and promotions<br>
                &#10004;Latest products arrivals<br>
                &#10004;New season and limited collections<br>
                &#10004;Upcoming events
              </p>
              <!-- <a href="Register.php" type="submit"  style="width:230px;height:50px;margin-top:105px;background-color:black;text-align:center;padding-top:10px;color:white">Click here to Register</a> -->
              <!-- <input type="button" style="width:230px;height:50px;margin-top:45px;background-color:black;color:white" value="Register" οnclick="myRegisterBtn()"> -->
              <!-- <input type="button" style="width:230px;height:50px;margin-top:45px;background-color:black" window.location.href="Register.php" value="Register"/> -->
              <!-- <button style="width:230px;height:50px;margin-top:45px;background-color:black;color:white" href="Register.php">Regiser</button> -->
              <!-- <button onclick="myRegisterBtn()">Register</button> -->
              <button style="width:230px;height:50px;margin-top:45px;background-color:black;color:white" onclick="window.location.href='Register.php'" type="button">Register</button>
              
          </div>
        </div>
     </form>
                <hr>
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