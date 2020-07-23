<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon" style="color: yellow; "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="adidas.php"><img src="images/Adidas.png" style="width: 75px;"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="adidasLifestyle.php">Lifestyle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adidasRunning.php">Running</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="adidasFootball.php">Football</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="adidasBasketball.php">Basketball</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="adidasTraining.php">Training</a>
                </li>
                <li>
                     <a href="myshoppingbag.php"><i class="fa fa-shopping-bag" 
                     style="font-size:30px;color:white;margin-top:3px;margin-left:5px"></i></a>               
                     <!-- <?php 
                         $username=$_SESSION['username'];                          
                         $countT = "SELECT count(quantity) as count from orderlist where username='$username'";
                         $countResult = $conn->query($countT);

                         $count=0;
                         while($row = mysqli_fetch_array($countResult)){
                         $count = $row['count'];
                       }
                       if(isset($_GET['id'])){
                         echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                     }else{
                         echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                     }
                     ?> -->

                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="adidaslifestyle.php" method="POST">
            <!-- <form class="form-inline my-2 my-lg-0" action="adidasBasketball.php" method="POST"> -->
            <!-- <form class="form-inline my-2 my-lg-0" action="adidasRunning.php" method="POST"> -->
            <!-- <form class="form-inline my-2 my-lg-0" action="adidasFootball.php" method="POST"> -->
            <!-- <form class="form-inline my-2 my-lg-0" action="adidasTraining.php" method="POST"> -->
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
             <div class="dropdown">
                  <span><a href="Login.php"><i class="fa fa-user-circle" style="font-size:40px;color:white;margin-left:20px"></i></a></span>
                     <div class="dropdown-content">
                         <a href="profile.php">Profile</a>
                     </div>
            </div>
       </div>
     </nav>
</header>