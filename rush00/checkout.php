<?php
    session_start();
    include("functions/functions.php")
?>

<html>
    <head>
        <title>We Think MCMerch</title>
        <link rel="stylesheet" href="./styles/styles.css" media="all"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraft" type="text/css"/>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
<body>

    <div class="main_wrapper">

        <div class="header_wrapper">

        <img id="logo" src="./imgs/logo.png"/>
            <img id="logos" src="./imgs/logo2.png"/>
        
        </div>


        <div class="menubar">

            <ul id="menu">

                <li> <a href="index.php">Home</li>
                <li> <a href="all_products.php">All products</li>
                <li> <a href="./peeps/my_account.php">My Account</li>
                <li> <a href="customer_register.php">Sign Up</li>
                <li> <a href="cart.php">Shopping Cart</li>
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

                <div id="sidebar_title">
                <img id="cloth" src="./imgs/toy.png"/>
                    Items
                </div>

                    <ul id="cats">

                        <?php getcats();?>

                    </ul>

                <div id="sidebar_title">
                <img id="cloth" src="./imgs/diamond.png"/>
                    Materials
                </div>

                    <ul id="cats">

                        <?php getbrands();?>

                    </ul>

                </div>
            <div id="content_area">

                <?php cart();?>

                <div id="shopping_cart">
                    <span id='textbar'>
                    <?php echo ((isset($_SESSION['customer_email'])) ? "<b>Welcome: </b>".$_SESSION['customer_email']." <b style='color: yellow;'>Your </b>" : "<b>Welcome Guest:</b>");?> 
                        <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price();?> <a href="cart.php" style="color:yellow;">Go to Cart</a>

                    </span>
                </div>

                <div id="products_box">
                    
                    <?php
                        if (!isset($_SESSION['customer_email']))
                            include ("customer_login.php");
                        else{
                            // include ("./pay.php");
                            $user_ip = getUserIP();
                            $get_user = "select * from cart where ip_add='$user_ip'";
                            
                            echo "<script>console.log(\"".$get_user."\");</script>";
                            $run_user = mysqli_query($con, $get_user);
                            while ($row_user = mysqli_fetch_array($run_user))
                            {
                                $prod_id = $row_user['prod_id'];
                                $qty = $row_user['qty'];
                                $user_id = $_SESSION['customer_email'];
                                $date = date("d m Y");
                                $insert_order = "insert into orders (customer_id,prod_id,qty,date) values ('$user_id','$prod_id','$qty','$date')";
                                $run_order = mysqli_query($con, $insert_order);
                            }
                            
                            $delete_cart = "DELETE from cart where ip_add='$user_ip'";
                            $run_del = mysqli_query($con, $delete_cart);
                            // echo "<script>console.log(\"".$delete_cart."\");</script>";
                            echo "<div><h2 align=\"center\">Your order has been processed!</h2></div>";
                        }
                    ?>

                </div>
            </div>

        </div>

    </div>

    <div id="footer">
        <h2 style="text-align: center; padding-top: 30px;">&copy; 2019 by <a href="https://github.com/bentenjamin">Bwebb</a>, <a href="https://github.com/JonathanLimbada">Jlimbada</a> & <a href="https://github.com/CharlieDeltaZA">Cdiogo</a></h2>
    </div>

</body>
</html>