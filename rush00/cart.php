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
                        <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price();?> <a href="index.php" style="color:yellow;">Back to Shop</a>
                    <?php echo ((!isset($_SESSION['customer_email'])) ? "<a href='checkout.php' style='color: orange;'>Login</a>" : "<a href='logout.php' style='color: orange;'>Logout</a>");?>


                    </span>
                </div>

                <div id="products_box">
                    <br />
                    <form action="" method="post" enctype="multipart/form-data">
                        <table id='carty'>
                            <tr align="center">
                                <th>Remove</th>
                                <th>Product(S)</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                            <?php
                                
                                    if (isset($_POST['update_cart']))
                                    {
                                        $qty = $_POST['qty'];
                                        $update_qty = "update cart set qty='$qty'";
                                        $run_qty = mysqli_query($con, $update_qty);
                                        $_SESSION['qty'] = $qty;
                                        $total *= $qty;
                                    }
                            ?>
                            <?php
                                global $con;
                                $total = 0;
                                $ip = getUserIP();
                                $get_price = "select * from cart where ip_add='$ip'";
                                $run_price = mysqli_query($con, $get_price);
                                while ($p_price=mysqli_fetch_array($run_price))
                                {
                                    $prod_id = $p_price['prod_id'];
                                    $item_qty = $p_price['qty'];
                                    $prod_price = "select * from products where product_id='$prod_id'";
                                    $run_prod_price = mysqli_query($con, $prod_price);
                                    while ($pp_price = mysqli_fetch_array($run_prod_price))
                                    {
                                        $product_price = array($pp_price['product_price']);
                                        $product_title = $pp_price['product_title'];
                                        $product_image = $pp_price['product_image'];
                                        $single_price = $pp_price['product_price'];

                                        $values = array_sum($product_price);
                                        $total += $single_price*$item_qty;
                                ?>
                                <tr align="center">
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $prod_id;?>"/></td>
                                    <td>
                                        <?php echo $product_title;?><br />
                                        <img src="./mods/product_images/<?php echo $product_image;?>" width="60" height="60"/>
                                    </td>
                                    <td><input type="text" size="4" name="qty" value="<?php echo $item_qty;?>"/></td>


                                    <td><?php echo "R$single_price";?></td>
                                    <td><?php echo "R".($single_price*$item_qty);?></td>
                                </tr>
                                <?php } } ?>
                                <tr align="right">
                                    <td colspan="4"><b>Sub Total: </b></td>
                                    <td colspan="3"><?php echo "R$total";?></td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
                                    <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                                    <td><button><a href="checkout.php" style="text-decoration: none; color: black;">Order</a></button></td>
                                </tr>

                        </table>
                    </form>

                    <?php
                        $ip = getuserip();
                        if (isset($_POST['update_cart']))
                        {
                            foreach ($_POST['remove'] as $remove_id)
                            {
                                $delete_product = "delete from cart where prod_id='$remove_id' AND ip_add='$ip'";
                                $run_delete = mysqli_query($con, $delete_product);
                                if ($run_delete)
                                    echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                        if (isset($_POST['continue']))
                            echo "<script>window.open('index.php','_self')</script>";
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