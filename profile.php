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

   if(isset($_POST['upload'])){
     $target ="images/".basename($_FILES['image']['name']);

     $image = $_FILES['image']['name'];
     //$sql="INSERT INTO user(image) VALUES ('$image')";
     $sql="UPDATE user set image='$image' where name='$username'";
     mysqli_query($conn,$sql);
     

     if(move_uploaded_file($image,$target)){
       echo '<script>window.alert("There was a problem uploading image")</script>';
     }else{
      echo '<script>window.alert("Image upload successfully")</script>';
     }
    
   }
   //echo '<script>window.alert("Welcome")</script>';
}else{  //if no login
   echo '<script>window.alert("Please Login")</script>';//没有login
    header('refresh:0.5;url=Login.php');
}

if(isset($_POST['logout'])){

   session_destroy();
   header('location:login.php');
 }

$sql="select * from user where name = '$username'";//有where在sql，search sql 不能再有where 换成and
$result=$conn->query($sql);//Define sql, run sql
  if($result->num_rows > 0){ //over 1 database(record) so run
    while($row = $result ->fetch_assoc()){
      //display result
      $userImage=$row['image'];
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
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>Adidas user profile</title>
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
/* #cart_count{
       color:white;
       text-align:center;
       padding:0 0.9rem 0.1rem 0.9rem;
       border-radius:3rem;
   } */
 </style>
  
  <body>
    <?php require_once ("header.php"); ?>
     
     <form action="profile.php" method="POST" enctype="multipart/form-data">
       
        <div class="profile-background">
            <div class="profile-left"> 

                <!-- <img src="adidasLifestyle/<?php echo $userImage;?>" class="profile-image"> -->

                 <?php 
                 if(isset($_SESSION['username'])){
                   echo "<img src=\"user/$userImage\" class=\"profile-image\">";
                 }else{
                   echo "<img src=\"profileicon.png\" class=\"profile-image\">";
                 }
                ?>
                <div class="uploadbox">
                     <h6> Upload something image...</h6>
                     <input type="file" name="image" class="upload-filebtn"> 
                     <input type="submit" name="upload" style="width:150px;margin-top:15px" value="Upload"><br>
                     <a class="btn btn-info btn-xs editbtn" style="width:150px;margin-top:15px" href="Register.php?id=<?php echo $_SESSION['id'];?>"><span class="glyphicon glyphicon-edit" >
                        </span> Edit </a><br> <!--edit change sumbit-->
                    
                     <!-- <a class='btn btn-danger btn-xs editbtn' style="margin-top:20px" onclick="return confirm('Are you sure logout?')" name="logout">
                        <span class="glyphicon glyphicon-edit"></span> Log out 
                     </a> edit change sumbit -->
                     <input type="submit" style="width:150px;margin-top:15px" onclick="return confirm('Are you sure logout?')" name="logout" value="Logout">
                </div>
            </div>
            <div class="profile-right">
                <div class="profile-table">
                    <div class="profile-insidetable">
                        <h3 class="profile-font">ID</h3>
                      <input type="text" name="id" class="profile-inputbox" value="<?php echo $_SESSION['id'];?>" readonly/>
                    </div>
                    <div class="profile-insidetable">
                        <h3 class="profile-font">Username</h3>
                        <input type="text" name="username" class="profile-inputbox" value="<?php echo $_SESSION['name'];?>">
                    </div>
                    <div class="profile-insidetable">
                        <h3 class="profile-font">Phone</h3>
                        <input type="phone" name="phone" class="profile-inputbox" value="<?php echo $_SESSION['phone'];?>">
                    </div>
                    <div class="profile-insidetable">
                        <h3 class="profile-font">Email</h3>
                        <input type="email" name="email" class="profile-inputbox" value="<?php echo $_SESSION['email'];?>">
                    </div>  
                    <div class="profile-insidetable">
                        <h3 class="profile-font">Address</h3>
                        <input type="text" name="address" class="profile-inputbox" value="<?php echo $_SESSION['address'];?>">
                    </div>
                    <!-- value="<?php if(isset($_GET['username'])){echo $userid;}?>" -->
                    <!-- <div class="profile-insidetable">
                        <h3 class="profile-font">Address2</h3>
                        <input type="text" name="address1" class="profile-inputbox" placeholder="Secound Address">
                    </div>                        -->
                </div>
            </div>
        </div>
     </form>
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