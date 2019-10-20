
<html>
    <body>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraft" type="text/css"/>
    </body>
</html>

<table id="order_list" width="800" align="center" bgcolor="pink">
    <tr align="center">
        <td colspan="9"><h2>All Orders</h2></td>
    </tr>

    <tr align="center" bgcolor="white">
        <th>S.N</th>
        <th>Order ID</th>
        <th>Customer Email/ID</th>
        <th>Product Name</th>
        <th>Product ID</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Order Date</th>
    </tr>
    <?php
        include ("includes/db.php");
        session_start();
        $get_order = "select * from orders";
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
        <td><?php echo $c_id;?></td>
        <td><?php echo $prod_title;?></td>
        <td><?php echo $prod_id;?></td>
        <td><?php echo "R$prod_price";?></td>
        <td><?php echo $qty;?></td>
        <td><?php echo $date;?></td>
    </tr>
    <?php } ?>
</table>