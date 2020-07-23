<!--step 3 : Connect Database @19B-->
<?php
$servername = "localhost";//localhost for local PC or use IP address
$username = "root"; //database name
$password = "";//database password
$database = "adidas";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//step 4 :Received all input date
//if user click create button <!-- one agian create account no limit agian-->
  $staffname=$_SESSION['staffname'];
  if(isset($_POST['insert'])){ 
  $target="images/";
  $target = $target.basename($_FILES['ProductImage']['name']);

  $ProductId=$_POST['ProductId'];//$createname=$_POST['input_value']
  $ProductName=$_POST['ProductName'];
  $ProductPrice=$_POST['ProductPrice'];
  $ProductImage=($_FILES['ProductImage']['name']);
  $ProductColor=$_POST['ProductColor'];
  $ProductQuantity=$_POST['ProductQuantity'];
  $ProductStyle=$_POST['ProductStyle'];
  // $ProductTitle=$_POST['ProductTitle'];
  // $ProductDescription=$_POST['ProductDescription'];

  //step 5:Define SQL
  $sql="insert into product values('$ProductId','$ProductName',
               '$ProductPrice','$ProductImage','$ProductColor',
               '$ProductQuantity','$ProductStyle','','')";//get $createname save follow database colmun

  echo'<script type=text/javascript>';//add myself
  echo 'window.alert("Create Successfull !!!")';
  echo '</script>';

   //step 6 : Run SQL 
  $result=$conn->query($sql);
  }

//save new id //new data
if(isset($_GET['id'])){
   $id=$_GET['id']; //recived driverId from viewdriver.php
   $sql="select * from product where id='$id'";//id is database name
   $result=$conn->query($sql);

   if($result->num_rows > 0){ //over 1 database(record) so run
    while($row = $result->fetch_assoc()){
        //display result
        $ProductId=$row['id'];//[] inside is follow database 
        $ProductName=$row['name'];
        $ProductPrice=$row['price'];
        $ProductImage=$row['image'];
        $ProductColor=$row['color'];
        $ProductQuantity=$row['quantity'];
        $ProductStyle=$row['style'];
        // $ProductTitle=$row['title'];
        // $ProductDescription=$row['description'];
    }
   }
}


// //change data methods
if(isset($_POST['update'])){
  $ProductId=$_POST['ProductId'];//$createname=$_POST['input_value']
  $ProductName=$_POST['ProductName'];
  $ProductPrice=$_POST['ProductPrice'];
  $ProductImage=($_FILES['ProductImage']['name']);
  $ProductColor=$_POST['ProductColor'];
  $ProductQuantity=$_POST['ProductQuantity'];
  $ProductStyle=$_POST['ProductStyle'];
  // $ProductTitle=$_POST['ProductTitle'];
  // $ProductDescription=$_POST['ProductDescription'];
  
  $sql="update product set id='$ProductId',name='$ProductName',price='$ProductPrice',image='$ProductImage',color='$ProductColor',
     quantity='$ProductQuantity',style='$ProductStyle',title='',description='' where id='$ProductId'";

   $result=$conn->query($sql);
   echo'<script type=text/javascript>';//add myself
   echo 'window.alert("Update Successfull !!!")';
   echo '</script>';

  echo "<script>window.location.assign('productTable.php');</script>";//Reload this page or go to hyperlink page
}

?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.body{
  background-color:grey;
}
.footer {
   /* position: fixed; */
   left: 0;
   bottom: 0;
   width: 82%;
   height:50px;
   margin-top:20px;
   background-color: Grey;
   color: white;
   text-align: center;
   margin-left:120px;
}
.fooBtn{
  font-size:1.2em;
  padding-top:60px;
  padding-right:20px;
  color:white;
}
</style>

<body>
<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">
    <?php  //@19B  is need edit account change the tittle ,normally is Driver Register 
       if(isset($_GET['id'])){
         echo "Edit Product";
       }else{
         echo "Create New Product";
       } 
    ?></h4>
	<p class="text-center">Easy update or create product</p>

 <!--Step 2 (set input name,form name,form action,Metohd="POST"---@19B-->
 <form name="DBManagement.php" action="DBManagement.php" method="POST" enctype="multipart/form-data"> <!--action是传去哪里 method="POST / GET" 寄过去 和 拿-->
    <div class="form-group input-group">
		  <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="	fa fa-address-book" style="font-size:18px"></i> </span>
	    </div>
         <input name="ProductId" class="form-control" placeholder="Product ID" type="text" 
         value="<?php if(isset($_GET['id'])){echo $ProductId;}?>">  <!--如果ID是空的 就是display click的ID--@19B-->
    </div> <!-- form-group// -->

	  <div class="form-group input-group">
		   <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-address-card" style="font-size:15px"></i> </span>
		   </div>
         <input name="ProductName" class="form-control" placeholder="Product name" type="text"
         value="<?php if(isset($_GET['id'])){echo $ProductName;}?>">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	 <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-dollar" style="font-size:23px"></i> </span>
		  </div>
        <input name="ProductPrice" class="form-control" placeholder="Product Price" type="text"
        value="<?php if(isset($_GET['id'])){echo $ProductPrice;}?>">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	 <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-file-picture-o"></i> </span>
		   </div>
    	   <input name="ProductImage" class="form-control" placeholder="ProductImage" type="file"
         value="<?php if(isset($_GET['id'])){echo $ProductImage;}?>">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
       <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-paint-brush"></i> </span>
		   </div>
		     <input name="ProductColor" class="form-control" placeholder="Product Color" type="text"
         value="<?php if(isset($_GET['id'])){echo $ProductColor;}?>">
	  </div> <!-- form-group end.// -->

    <div class="form-group input-group">
       <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-font"></i> </span>
		   </div>
		     <input name="ProductTitle" class="form-control" placeholder="Descripution Title" type="text"
         value="<?php if(isset($_GET['id'])){echo $ProductTittle;}?>">
	  </div> 

    <div class="form-group input-group">
       <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-list"></i> </span>
		   </div>
		     <input name="ProductDescription" class="form-control" placeholder="Description" type="text"
         value="<?php if(isset($_GET['id'])){echo $ProductDescription;}?>">
	  </div>

    <div class="form-group input-group">
       <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="	fa fa-folder"></i> </span>
		   </div>
		     <input name="ProductQuantity" class="form-control" placeholder="Product Quantity" type="text"
         value="<?php if(isset($_GET['id'])){echo $ProductQuantity;}?>">
	  </div> <!-- form-group end.// -->

    <div class="form-group input-group">
       <div class="input-group-prepend">
		     <span class="input-group-text"> <i class="fa fa-file-text-o"></i> </span>
		   </div>
		     <input name="ProductStyle" class="form-control" placeholder="Product Style" type="text"
         value="<?php if(isset($_GET['id'])){echo $ProductStyle;}?>">
	  </div> <!-- form-group end.// -->

    <div class="form-group">
        <?php  //is need edit account change the tittle ,normally is Driver Register 19B
       if(isset($_GET['id'])){
         echo' <button type="submit" class="btn btn-primary btn-block" name="update"> Update Product </button>';
       }else{
        echo '<button type="submit" class="btn btn-primary btn-block" name="insert" onclick="myfuction()" value="Create Successfull"> Create New Product </button>';
       } 
    ?>
    </div> <!-- form-group// -->  
                                                     
  </form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
<div class="footer">
     <!-- <P>footer</p> -->
    <a class="fooBtn" href="productTable.php">Product Table</a>
    <a class="fooBtn" href="userTable.php">User Table</a>
    <a class="fooBtn" href="orderTable.php">OrderList Table</a>
    <a class="fooBtn" name="logout" href="StaffLogin.php" onclick="return confirm('Are you sure logout?')">Logout</a>
</div>
</body>