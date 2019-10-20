<?php
    session_start();
    include ("functions/functions.php");
    include ("db.php");
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
                    Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price();?> <a href="cart.php" style="color:yellow;">Go to Cart</a>

                    </span>
                </div>

                    <form action="customer_register.php" method="post" enctype="multipart/form-data">
                        <table align="center" width="750">
                            <tr align="center">
                                <td colspan="6"><h2>Create an Account</h2></td>
                            </tr>
                            <tr>
                                <td align="right">Name</td>
                                <td><input type="text" name="c_name" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Email</td>
                                <td><input type="text" name="c_email" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Password</td>
                                <td><input type="password" name="c_pass" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Profile Picture</td>
                                <td><input type="file" name="c_image" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Country</td>
                                <td><input type="text" name="c_country" required/></td>
                            </tr>
                            <tr>
                                <td align="right">City</td>
                                <td><input type="text" name="c_city" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Contact Number</td>
                                <td><input type="text" name="c_contact" required/></td>
                            </tr>
                            <tr>
                                <td align="right">Address</td>
                                <td><input type="text" name="c_address" required></td>
                            </tr>
                            <tr align="center">
                                <td colspan="6"><input type="submit" name="register" value="Create Account"/></td>
                            </tr>
                        </table>
                    </form>
            </div>

        </div>


        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px;">&copy; 2019 by <a href="https://github.com/bentenjamin">Bwebb</a>, <a href="https://github.com/JonathanLimbada">Jlimbada</a> & <a href="https://github.com/CharlieDeltaZA">Cdiogo</a></h2>
        </div>
    
    </div>

</body>
</html>

<?php

    if (isset($_POST['register']))
    {
        $ip = getuserip();
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];

        $c_pass = hash('adler32', $c_pass);
        move_uploaded_file($c_image_tmp, "./peeps/images/$c_image");
        $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
        $run_c = mysqli_query($con, $insert_c);
        $sel_cart = "select * from cart where ip_add='$ip'";

        $run_cart = mysqli_query($con, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created Successfuly!')</script>";
        echo (($check_cart == 0) ? "<script>window.open('./peeps/my_account.php','_self')</script>" : "<script>window.open('checkout.php','_self')</script");
    }
?>