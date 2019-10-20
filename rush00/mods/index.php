<?php
    session_start();
    if (!isset($_SESSION['user_email']))
        echo "<script>window.open('login.php?not_admin=You are not an Mod!','_self')</script>";
    else
    {
?>

    <html>
        <head>
            <title>Mods Panel</title>
			<link rel="stylesheet" href="styles/style.css" media="all"/>
			<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        </head>
        <body>
            <div class="main_wrapper">
                <div class="header_wrapper">
					<img id="logo" src="../imgs/logo.png"/>
					<img id="logos" src="../imgs/logo2.png"/>
				</div>

                <div id="right">
                    <h2 style="text-align: center;">Manage Content</h2>
                    <a href="index.php?insert_product">Insert Product</a>
                    <a href="index.php?view_products">View All Products</a>
                    <a href="index.php?insert_cat">Insert Category</a>
                    <a href="index.php?view_cats">View All Categories</a>
                    <a href="index.php?insert_brand">Insert New Brand</a>
                    <a href="index.php?view_brands">View All Brands</a>
                    <a href="index.php?view_customers">View All Customers</a>
                    <a href="index.php?view_orders">View All Orders</a>
                    <a href="logout.php">Mod Logout</a>
                </div>
                <div id="left">
					<div id="logged">
						<h2 style="color: red; text-align: center;"><?php echo @$_GET['logged_in'];?></h2>
						<br>
						<p>Welcome! From here you can perform a number of admin tasks.<br>
						You can select one of the options from the sidebar to the right.</p>
					</div>
                    <?php
                        if (isset($_GET['insert_product']))
                            include ("insert_product.php");
                        if (isset($_GET['view_products']))
                            include ("view_products.php");
                        if (isset($_GET['edit_prod']))
                            include ("edit_prod.php");
                        if (isset($_GET['delete_prod']))
                            include ("delete_prod.php");
                        if (isset($_GET['insert_cat']))
                            include ("insert_cat.php");
                        if (isset($_GET['view_cats']))
                            include ("view_cats.php");
                        if (isset($_GET['edit_cat']))
                            include ("edit_cat.php");
                        if (isset($_GET['insert_brand']))
                            include ("insert_brand.php");
                        if (isset($_GET['view_brands']))
                            include ("view_brands.php");
                        if (isset($_GET['edit_brand']))
                            include ("edit_brand.php");
                        if (isset($_GET['view_customers']))
                            include ("view_customers.php");
                        if (isset($_GET['delete_c']))
                            include ("delete_c.php");
                        if (isset($_GET['view_orders']))
                            include ("view_orders.php");
                        if (isset($_GET['']))
                            include (".php");
                    ?>

                </div>
                <div></div>
                <div></div>

            </div>
        </body>
    </html>

<?php } ?>