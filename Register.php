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

  $generateid = uniqid();//generate random id
    //  echo uniqid();

if(isset($_POST['create'])){ 
    $name=$_POST['username'];
    $phone=$_POST['phone']; 
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $password1=$_POST['password1'];

 
    if($username!="" && $password!="" && $email!=""){//不是空的
      //step 5:Define SQL
      if($password == $password1){
        // if(isset($_POST['checkbox'])){   
           $sql="insert into user values('$generateid','$name','$phone','$email','$address','$password','')";//get $createname save follow database colmun
           //step 6 : Run SQL 
           $result=$conn->query($sql);
        

           echo '<script>window.alert("You are registered successfully.")</script>';
           header('refresh:2; url=Login.php'); 
        // echo "<div class='form'>
        // <h3>You are registered successfully.</h3>
        // <br/>Click here to <a href='login.php'>Login</a></div>";
        //  echo'<script type=text/javascript>';//add myself
        //  echo 'window.alert("You are registered successfully.")';
        //  echo '</script>';
        // header("location:Login.php");
        // }else{
        //    echo'<script type=text/javascript>';//add myself
        //    echo 'window.alert("Must read the Privary Policy!!!")';
        //    echo '</script>';
        // }
      }else{
        echo'<script type=text/javascript>';//add myself
        echo 'window.alert("Password are no same")';
        echo '</script>';
      }
    }else{ //空的
    //   $a = "Username or Password and Email cannot emptry";
    // // echo '<h3>Username or Password and Email cannot emptry</h3>';
    //  echo "<input type='text' value='$a'/>";
        echo'<script type=text/javascript>';//add myself
        echo 'window.alert("Username,Password And Email Area cannot be emptry")';
        echo '</script>';
     }
  }
  
  if(isset($_GET['id'])){
    $userId=$_GET['id']; //recived driverId from viewdriver.php
    $sql="select * from user where id='$userId'";//id is database name
    $result=$conn->query($sql);
 
    if($result->num_rows > 0){ //over 1 database(record) so run
     while($row = $result->fetch_assoc()){
         //display result
         $userId=$row['id'];//[] inside is follow database 
         $userName=$row['name'];
         $userPhone=$row['phone'];
         $userEmail=$row['email'];
         $userAddress=$row['address'];
         $userPassword=$row['password'];
         $userImage=$row['image'];
     }
    }
 }

 if(isset($_POST['upload'])){
  $userId=$_POST['randomid'];
  $userName=$_POST['username'];
  $userPhone=$_POST['phone'];
  $userEmail=$_POST['email'];
  $userAddress=$_POST['address'];
  
  $sql="update user set name='$userName',phone='$userPhone',
    email='$userEmail',address='$userAddress' where id='$userId'";

   $result=$conn->query($sql);
   echo '<script>window.alert("Upload done")</script>';
   header('refresh:0;url=adidas.php');
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas Register</title>

    <style>
     .keyinbox{
         width:370px;
         height:50px;
         font-size:1.5em;
         font-family:Times New Roman;
         margin-top:50px;
         border-style: inset;
     }
     
     .registerbtn{
      width:250px;
      height:50px;
      margin-top:0px;
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
  
  .dropdown:hover .dropdown-content {display: block;}

 </style>
    <script>
 function secureIndex()
 {
   var item = document.getElementById('item').checked;
   if(item==false){
     alert('Please confirm the Terms of use Privacy Policy.')
     return false;
   }else{
     return true;
   }
 }
    </script>
  </head>
  <body>
    <?php require_once ("header.php"); ?>

<!-- onsubmit="return myRegister()" =in form -->
     <form action="Register.php" method=POST >
        <div style="width:90%;height:800px;margin-top:50px;margin-left:80px">

          <div style="width:600px;height:700px;float:left;">
           <?php 
             if(isset($_GET['id'])){
              echo "<h1 style=\"font-size:3em;font-family:Time New Roman;padding-top:10px;padding-left:10px;\">Edit Profile</h1>";
             }else{            
              echo "<h1 style=\"font-size:3em;font-family:Time New Roman;padding-top:10px;padding-left:10px;\">Create New Account</h1>";
             }
             ?>
           <!-- <a href="#"><ins style="font-size:1.5em;font-family:Time New Roman;padding-top:5px;padding-left:5px">Forgotten Your Password?</ins></a><br> -->
               <div class="form" style="width:500px;height:300px;float:left;">
                   <input class="keyinbox" name="randomid" id="randomid" placeholder="<?php echo $generateid;?>" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>" readonly/>
                       <button style="width:40px;height:35px;margin-left:10px;margin-bottom:0px;margin-top:1px"><i class="fa fa-refresh"></i></button>
                   <input class="keyinbox" name="username" id="username" placeholder="Username" value="<?php if(isset($_GET['id'])){echo $userName;}?>" require>
                   <input class="keyinbox" name="phone" id="phone" placeholder="Phone" value="<?php if(isset($_GET['id'])){echo $userPhone;}?>" require>
                      <!-- <span id="message" style="background-color:Red;color:white;"> </span><br>                    -->
                   <input class="keyinbox" type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($_GET['id'])){echo $userEmail;}?>" require>
                   <input class="keyinbox" name="address" id="address" placeholder="Address" value="<?php if(isset($_GET['id'])){echo $userAddress;}?>" require>
                   <?php if(isset($_GET['id'])){
                     
                   }else{
                    echo "<input class=\"keyinbox\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"Password\" require>";
                      //  <!-- <span id="message1" style="background-color:Red;color:white;"> </span><br>                      -->
                    echo "<input class=\"keyinbox\" type=\"password\" id=\"password1\" name=\"password1\" placeholder=\"Confirm Password\" require>";
                      //  <!-- <span id="message2" style="background-color:Red;color:white;"> </span><br>                   -->     
                   }
                   ?>         
               </div>
          </div>

          <div style="width:600px;height:700px;float:left;">
          <?php if(isset($_GET['id'])){
            echo '<h1>Upload ACCOUNT</h1>';
          }else{
            echo '<h1>CREATE AN ACCOUNT</h1>';
          }?>             
             <p>Your Global Login will give you access to:</p>
             <p>&#10004;A single global login to interact with adidas products and services<br>
                &#10004;Checkout faster<br>
                &#10004;View your personal order history<br>
                &#10004;Add or change email preferences
              </p>
      <?php  //is need edit account change the tittle ,normally is Driver Register 19B
           if(isset($_GET['id'])){
         echo'  <input class="registerbtn" name="upload" type="submit" value="Upload" /><br>';
       }else{
        echo ' <input class="registerbtn" name="create" type="submit"  value="Register" onclick="return secureIndex();"/><br>';
       } 
        ?>
              <!-- <input class="registerbtn" name="create" type="submit" value="Register"  onclick=" return secureIndex();"/><br> -->
                       <!-- onclick="window.location.href='#'"  -->
                    <?php 
                       if(isset($_GET['id'])){
                         echo "";
                       }else{
                        echo "<input name=\"item\" id=\"item\" value=\"item\" type=\"checkbox\" name=\"insert\" style=\"width:20px;height:20px;float:left;margin-top:25px\">";
                        echo "<p style=\"font-size:1.1em;margin-top:20px;margin-left:15px\">";
                        echo "&nbsp;I have read and accepted<ins> Terms & Conditions</ins> ";
                        echo "and the adidas <ins>Privary Policy*</ins>";
                        echo "</p>";  
                       }
                    ?>
          </div>

        </div>
            <!-- <div style="width:490px;height:500px;float:left;text-align:center;border:2px">
               <h2 style="padding-top:20px">Login</h2>
                  <div style="width:250px;height:250px;text-align:center;margin-top:100px;margin-left:110px">
                      <input style="border-radius:25px;width:220px;height:50px;margin-top:50px;text-align:center;" type="text" name="username" placeholder="Username">
                      <input style="border-radius:25px;width:220px;height:50px;margin-top:50px;text-align:center;" type="text" name="password" placeholder="Password">
                      <button style="width:100px;height:30px;margin-top:15px;border-radius:10px">Login</button>
                  </div>
            </div>
            <div style="width:490px;height:500px;float:right;text-align:center">
               <h2 style="padding-top:20px">Register</h2>
                  <div style="width:250px;height:250px;text-align:center;margin-top:100px;margin-left:110px">
                      <input style="border-radius:25px;width:220px;height:50px;margin-top:50px;text-align:center;" type="text" name="username" placeholder="Username">
                      <input style="border-radius:25px;width:220px;height:50px;margin-top:50px;text-align:center;" type="text" name="password" placeholder="Password">
                      <button style="width:100px;height:30px;margin-top:15px;border-radius:10px">Register</button>
                  </div> -->
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
          
              <!-- Optional JavaScript -->
              <!-- jQuery first, then Popper.js, then Bootstrap JS -->
              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </body>
          </html>