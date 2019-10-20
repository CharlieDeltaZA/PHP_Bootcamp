
<table width="800" align="center" bgcolor="pink">
    <tr align="center">
        <td colspan="7"><h2>Your order details</h2></td>
    </tr>

    <tr align="center" bgcolor="white">
        <th>S.N</th>
        <th>Order ID</th>
        <th>product Name</th>
        <th>product ID</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Order Date</th>
        <th>Generate Invoice</th>
    </tr>
    <?php
        include ("includes/db.php");
        session_start();
        $user_id = $_SESSION['customer_email'];
        $get_order = "select * from orders where customer_id='$user_id'";
        $run_order = mysqli_query($con, $get_order);
        $i = 0;
        while ($row_order=mysqli_fetch_array($run_order))
        {
            $order_id = $row_order['order_id'];
            $c_id = $row_order['customer_id'];
            $prod_id = $row_order['prod_id'];
            $qty = $row_order['qty'];
            $date = $row_order['date'];
            $i++;

            $get_prod = "select * from products where product_id='$prod_id'";
            $run_prod = mysqli_query($con, $get_prod);
            $row_prod = mysqli_fetch_array($run_prod);
            $prod_title = $row_prod['product_title'];
            $prod_price = $row_prod['product_price'];
        
    ?>
    <tr align="center">
        <td><?php echo $i;?> </td>
        <td><?php echo $order_id;?></td>
        <td><?php echo $prod_title;?></td>
        <td><?php echo $prod_id;?></td>
        <td><?php echo "R$prod_price";?></td>
        <td><?php echo $qty;?></td>
        <td><?php echo $date;?></td>
        <td><a href="my_orders.php?mkinvoice=<?php echo $order_id;?>">Invoice</a></td>
    </tr>
    <?php }

        if (isset($_GET['mkinvoice']))
        {
            $user = $_SESSION['customer_email'];
            $order_id = $_GET['mkinvoice'];
            $get_order = "select * from orders where order_id='$order_id'";
            $run_order = mysqli_query($con, $get_order);
            $row_order = mysqli_fetch_array($run_order);
            
            $date = $row_order['date'];
            $prod_id = $row_order['prod_id'];
            $qty = $row_order['qty'];
            
            $invoice = "Invoice".$order_id.$user;
            
            $get_prod = "select * from products where product_id='$prod_id'";
            $run_prod = mysqli_query($con, $get_prod);
            $row_prod = mysqli_fetch_array($run_prod);
            
            $prod_title = $row_prod['product_title'];
            $prod_price = $row_prod['product_price'];
            $prod_desc = $row_prod['product_desc'];

            $get_user = "select * from customers where customer_email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row_user = mysqli_fetch_array($run_user);

            $c_id = $row_user['customer_id'];
            $name = $row_user['customer_name'];
            $email = $row_user['customer_email'];
            $pass = $row_user['customer_pass'];
            $country = $row_user['customer_country'];
            $city = $row_user['customer_city'];
            $contact = $row_user['customer_contact'];
            $address = $row_user['customer_address'];
            $image = $row_user['customer_image'];

            $fpc = file_put_contents("$invoice.txt", "
            INVOICE\n
            \n
            WeThinkMinecraft_\n
            Accross from the Aquarium\n
            Cape Town, South Africa\n
            Phone: 133743069\n
            \n
            \n
            \n
            Invoice #: $invoice\n
            Date: $date;\n
            \n
            BILL TO:\n
            $name\n
            $address\n
            $city\n
            $country\n
            $contact\n
            $email\n
            \n
            \n
            \n
            Description:\n
            \n
            $prod_title\n
            R$prod_price x $qty\n
            \n
            TOTAL: R".($prod_price*$qty));

            echo "<script>window.open('dl.php?file=$invoice','_self')</script>";
        }
    ?>
</table>