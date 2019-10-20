<?php
    $con = mysqli_connect("localhost", "root", "password", "csv_db");
    if (mysqli_connect_errno())
        echo "The connection was not established: ".mysqli_connect_error();
    
    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
        {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }

    function cart() {
        if (isset($_GET['add_cart']))
        {
            global $con;
            $ip = getUserIP();
            $prod_id = $_GET['add_cart'];

            $check_prod = "select * from cart where ip_add='$ip' AND prod_id='$prod_id'";
            $run_check = mysqli_query($con, $check_prod);

            if (mysqli_num_rows($run_check) > 0)
            {
            echo "";
            }
            else
            {
                $insert_prod = "insert into cart (prod_id,ip_add,qty) values ('$prod_id','$ip',1)";
                $run_prod = mysqli_query($con, $insert_prod);
                // header('Location: ' . basename(__FILE__));
                // echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }

    function total_items() {
        global $con;
        $ip = getUserIP();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
        echo $count_items; 
    }

    function total_price() {
        global $con;
        $total = 0;
        $ip = getUserIP();
        $get_price = "select * from cart where ip_add='$ip'";
        $run_price = mysqli_query($con, $get_price);
        while ($p_price=mysqli_fetch_array($run_price))
        {
            $cart_qty = $p_price['qty'];
            $prod_id = $p_price['prod_id'];
            $prod_price = "select * from products where product_id='$prod_id'";
            $run_prod_price = mysqli_query($con, $prod_price);
            while ($pp_price = mysqli_fetch_array($run_prod_price))
            {
                $product_price = array($pp_price['product_price']);
                $values = array_sum($product_price) * $cart_qty;
                $total += $values;
            }
        }
        echo "R$total"; 
    }
    
    function getcats() {
        global $con;
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con, $get_cats);
        while ($row_cats=mysqli_fetch_array($run_cats)) {
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];
            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        }
    }
    function getbrands() {
        global $con;
        $get_brands = "select * from brands";
        $run_brands = mysqli_query($con, $get_brands);
        while ($row_brands=mysqli_fetch_array($run_brands)) {
            $brand_id = $row_brands['brand_id'];
            $brand_title = $row_brands['brand_title'];
            echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
        }
    }

    function getprod() {

        if (!isset($_GET['cat']))
        {
            if (!isset($_GET['brand']))
            {
                global $con;
                $get_prod = "select * from products order by RAND() LIMIT 0,6";
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
                                <a href='index.php?add_cart=$prod_id'><button style='float: right'>Add to Cart</button></a>
                            </div>
                    ";
                }
            }
        }
    }

    function getcatprod() {

        if (isset($_GET['cat']))
        {
            $cat_id = $_GET['cat'];
            global $con;
            $get_cat_prod = "select * from products where product_cat='$cat_id'";
            $run_cat_prod = mysqli_query($con, $get_cat_prod);
            $count_cat = mysqli_num_rows($run_cat_prod);

            if ($count_cat == 0)
                echo "<h2 style='padding: 20px;'>There is no product in this category!</h2>";
        
            while ($row_cat_prod=mysqli_fetch_array($run_cat_prod))
            {
                $prod_id = $row_cat_prod['product_id'];
                $prod_cat = $row_cat_prod['product_cat'];
                $prod_brand = $row_cat_prod['product_brand'];
                $prod_title = $row_cat_prod['product_title'];
                $prod_price = $row_cat_prod['product_price'];
                $prod_image = $row_cat_prod['product_image'];                

                echo "
                        <div id='single_product'>
                            <h3>$prod_title</h3>
                            <img src='./mods/product_images/$prod_image' width='180' height='180'/>
                            <p><b>R$prod_price</b></p>
                            <a href='details.php?prod_id=$prod_id' style='float: left;'>Details</a>
                            <a href='index.php?add_cart=$prod_id'><button style='float: right'>Add to Cart</button></a>
                        </div>
                ";
            }
        }
    }
    function getbrandprod() {

        if (isset($_GET['brand']))
        {
            $brand_id = $_GET['brand'];
            global $con;
            $get_brand_prod = "select * from products where product_brand='$brand_id'";
            $run_brand_prod = mysqli_query($con, $get_brand_prod);
            $count_brand = mysqli_num_rows($run_brand_prod);

            if ($count_brand == 0)
                echo "<h2 style='padding: 10px;'>We have no products of this brand!</h2>";
        
            while ($row_brand_prod=mysqli_fetch_array($run_brand_prod))
            {
                $prod_id = $row_brand_prod['product_id'];
                $prod_cat = $row_brand_prod['product_cat'];
                $prod_brand = $row_brand_prod['product_brand'];
                $prod_title = $row_brand_prod['product_title'];
                $prod_price = $row_brand_prod['product_price'];
                $prod_image = $row_brand_prod['product_image'];                

                echo "
                        <div id='single_product'>
                            <h3>$prod_title</h3>
                            <img src='./mods/product_images/$prod_image' id='products'/>
                            <p><b>R$prod_price</b></p>
                            <a href='details.php?prod_id=$prod_id' style='float: left;'>Details</a>
                            <a href='index.php?add_cart=$prod_id'><button style='float: right'>Add to Cart</button></a>
                        </div>
                ";
            }
        }
    }


?>