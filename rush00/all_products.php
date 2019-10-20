<?php
    include("functions/functions.php")
?>

<html>
    <head>
        <title>We Think MCMerch</title>
        <link rel="stylesheet" href="./styles/styles.css" media="all"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraft" type="text/css"/>
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
            <div id="content_area" style="height: auto">

                <?php cart();
                    if (isset($_GET['add_cart']))
                        header('Location: ' . basename(__FILE__));
                ?>


                <div id="shopping_cart">
                <span id='textbar'>
                        <?php echo ((isset($_SESSION['customer_email'])) ? "<b>Welcome: </b>".$_SESSION['customer_email']." <b style='color: green;'>Your </b>" : "<b>Welcome Guest:</b>");?> 
                        <b style="color: green">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price();?> <a href="cart.php" style="color:green;">Go to Cart</a>
                        <?php echo ((!isset($_SESSION['customer_email'])) ? "<a href='checkout.php' style='color: yellow;'>Login</a>" : "<a href='logout.php' style='color: yellow;'>Logout</a>");?>
                    </span>
                </div>
                <div id="products_box">
                    <?php
                        $get_prod = "select * from products";
                        $run_prod = mysqli_query($con, $get_prod);
        
                        while ($row_prod=mysqli_fetch_array($run_prod))
                        {
                            $prod_id = $row_prod['product_id'];
                            $prod_cat = $row_prod['product_cat'];
                            $prod_brand = $row_prod['product_brand'];
                            $prod_title = $row_prod['product_title'];
                            $prod_price = $row_prod['product_price'];
                            $prod_image = $row_prod['product_image'];
                            echo "
                                    <div id='single_product'>
                                        <h3>$prod_title</h3>
                                        <img src='./mods/product_images/$prod_image' width='180' height='180'/>
                                        <p><b>R$prod_price</b></p>
                                        <a href='details.php?prod_id=$prod_id' style='float: left;'>Details</a>
                                        <a href='all_products.php?add_cart=$prod_id'><button style='float: right'>Add to Cart</button></a>
                                    </div>
                            ";
                        }
                    ?>
                </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;">&copy; 2019 by <a href="https://github.com/bentenjamin">Bwebb</a>, <a href="https://github.com/JonathanLimbada">Jlimbada</a> & <a href="https://github.com/CharlieDeltaZA">Cdiogo</a></h2>
        </div>
    
    </div>


</body>
</html>