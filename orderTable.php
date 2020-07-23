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

if(isset($_POST['delete'])){
  if(empty($_REQUEST['item'])){ //No item checked
}
else{
 foreach($_REQUEST['item'] as $deleteId){
 //delete the item with the username
 echo $sql="delete from orderlist where username='$deleteId'";
 $result=$conn->query($sql);
 echo'<script type=text/javascript>';//add myself
 echo 'window.alert("Delete Successfull !!!")';
 echo '</script>';
}
} 
}
if(isset($_POST['logout'])){

  session_destroy();
  header('location:login.php');
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
    <title>Adidas OrderList Table</title>
  </head>
  <style>
  .footer {
   /* position: fixed; */
   left: 0;
   bottom: 0;
   width: 80%;
   height:30px;
   margin-top:20px;
   background-color: Grey;
   color: white;
   text-align: center;
   margin-right:20px;
}
.fooBtn{
  font-size:1.2em;
  padding-top:20px;
  padding-right:20px;
  color:white;
}
  </style>
  <body>
     <form action="orderTable.php" method="POST">
<div class="container" style="text-align:center;margin-left:200px">
    <div class="row col-md-10 col-md-offset-2 custyle" >
    <table class="table table-striped custab">
    <h4 style="text-align:center;padding-left:350px;padding-top:20px;padding-bottom:10px">OrderList Table</h4>
    <thead>
    <!-- <a href="register.php" style="width:130px;height:40px;text-align:center;margin-top:20px" type="button"><b>+</b> Add new product</a> -->
        <tr>
        <th>
            <th>orderID</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Color</th>
            <!-- <th class="text-center">Action</th> -->
        </tr>
    </thead>
    <tbody>
         <?php
             $sql="select * from orderlist where status='1'";//id is database name
             $result=$conn->query($sql);
 
             if($result->num_rows > 0){ //over 1 database(record) so run
             while($row = $result->fetch_assoc()){
             //display result
             $orderID=$row['orderid'];//[] inside is follow database 
             $userID=$row['userid'];
             $userName=$row['username'];
             $productID=$row['goodsId'];
             $productName=$row['goodsName'];
             $productImage=$row['goodsImage'];
             $productColor=$row['goodsColor'];
             $productPrice=$row['goodsPrice'];

        ?>    
            <tr>
                <td><input type="checkbox" name="item[]" value="<?php echo $orderID;?>"></td>
                <td><?php echo $orderID; ?></td>
                <td><?php echo $userID; ?></td>
                <td><?php echo $userName; ?></td>
                <td><?php echo $productID; ?></td>
                <td><?php echo $productName; ?></td>
                <td><?php echo $productPrice; ?></td>
                <td><?php echo $productColor;?></td>
                <td class="text-center">
             <!-- <a class='btn btn-info btn-xs' href=".php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-edit"></span> Edit </a>  -->
                </td>
            </tr>
        <?php
             }//end while
            }//end if
        ?>
        <tr>
                <td colspan="9" style="text-align:center">
                  <button name="delete" type="submit" class="btn btn-danger btn-xs">Delete</button>
                </td> 
            </tr> 
    </tbody>
    </table>
    </div>
    </form>
    <div class="footer">
     <!-- <P>footer</p> -->
    <a class="fooBtn" href="DBManagement.php">Create New Product</a>
    <a class="fooBtn" href="productTable.php">Product Table</a>
    <a class="fooBtn" href="userTable.php">User Table</a>
    <a class="fooBtn" href="StaffLogin.php" onclick="return confirm('Are you sure logout?')">Logout</a>
    </div>
              <!-- Optional JavaScript -->
              <!-- jQuery first, then Popper.js, then Bootstrap JS -->
              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </body>
          </html>