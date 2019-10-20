<?php
    session_start();
    include ("../functions/functions.php");
    include ("../includes/db.php");
?>

<html>
    <head>
        <title>We Think MCMerch</title>
        <link rel="stylesheet" href="../styles/styles.css" media="all"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraft" type="text/css"/>
    </head>
<body>

    <div class="main_wrapper">

        <div class="header_wrapper">

        <img id="logo" src="../imgs/logo.png"/>
            <img id="logos" src="../imgs/logo2.png"/>
        
        </div>


        <div class="menubar">

            <ul id="menu">

                <li> <a href="../index.php">Home</li>
                <li> <a href="../all_products.php">All products</li>
                <li> <a href="./my_account.php">My Account</li>
                <li> <a href="../customer_register.php">Sign Up</li>
                <li> <a href="../cart.php">Shopping Cart</li>
                <li> <a href="#">Contact Us</li>

            </ul>


            <div id="form">

                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search A Product"/>
                    <input type="submit" name="search" value="Search"/>
                </form>

            </div>

        </div>


        <div class="content_wrapper">
        
            <div id="sidebar">

                <div id="sidebar_title">My Account</div>

                <ul id="cats">

                    <?php
                        global $con;
                        $user = $_SESSION['customer_email'];
                        $get_img = "select * from customers where customer_email='$user'";
                        $run_img = mysqli_query($con, $get_img);
                        $row_img = mysqli_fetch_array($run_img);
                        $c_image = $row_img['customer_image'];
                        $c_name = $row_img['customer_name'];
                        // echo "<p style='text-align: center;'><img src='./images/$c_image' width='150' height='150'/>";
                        echo "<p style='text-align: center;'><img src='imgs/$c_image' onerror='this.onerror=null;this.src='./imgs/no-img.jpg;' width='150' height='150'/>";
					?>
					
					<!-- <img src='imgs/$c_image' onerror="this.onerror=null;this.src='./imgs/no-img.jpg';"/> -->
					<!-- <img src="images/<?= $product['product_image'] ?>" onerror="this.onerror=null;this.src='./images/not-found.jpg';"/>  CAMERONS -->

                    <li><a href="my_account.php?my_orders">My Orders</a></li>
                    <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                    <li><a href="../logout.php">Logout</a></li>

                </ul>

            </div>
            <div id="content_area">

                <?php cart();?>

                <div id="shopping_cart">
                <span id='textbar'>
                        <?php echo ((isset($_SESSION['customer_email'])) ? "<b>Welcome: </b>".$_SESSION['customer_email'] : "");?>
                        <?php echo ((!isset($_SESSION['customer_email'])) ? "<a href='../checkout.php' style='color: orange;'>Login</a>" : "<a href='../logout.php' style='color: orange;'>Logout</a>");?>
                    </span>
                </div>

                <div id="products_box">
                     <?php
                        if (!isset($_GET['my_orders']) && !isset($_GET['edit_account']) && !isset($_GET['change_pass']) && !isset($_GET['delete_account']))
                            echo "<h2 style='padding: 15px;'>Welcome: <?php echo '$c_name';?></h2><br /><b>You can see your orders' progress <a href='my_account.php?my_orders'>Here!</a></b>";
                     ?>
                     <?php
                        if (isset($_GET['edit_account']))
                            include ("edit_account.php");
                        if (isset($_GET['change_pass']))
                            include ("change_pass.php");
                        if (isset($_GET['delete_account']))
                            include ("delete_account.php");
                        if (isset($_GET['my_orders']))
                            include ("my_orders.php");
                    ?>
                </div>
            </div>

        </div>


        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;">&copy; 2019 by <a href="https://github.com/bentenjamin">Bwebb</a>, <a href="https://github.com/JonathanLimbada">Jlimbada</a> & <a href="https://github.com/CharlieDeltaZA">Cdiogo</a></h2>
        </div>
    
    </div>


</body>
</html>