<?php
    session_start();
    if (!isset($_SESSION['user_email']))
        echo "<script>window.open('login.php?not_admin=You are not an Mod!','_self')</script>";
    else
    {
?>

<html>
    <body>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraftia" type="text/css"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/minecraft" type="text/css"/>
    </body>
</html>

<table id="prod_list" width="800" align="center" bgcolor="pink">
    <tr align="center">
        <td colspan="6"><h2>All Products</h2></td>
    </tr>

    <tr align="center" bgcolor="white">
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        include ("includes/db.php");

        $get_prod = "select * from products";
        $run_prod = mysqli_query($con, $get_prod);
        $i = 0;
        while ($row_prod=mysqli_fetch_array($run_prod))
        {
            $prod_id = $row_prod['product_id'];
            $prod_title = $row_prod['product_title'];
            $prod_image = $row_prod['product_image'];
            $prod_price = $row_prod['product_price'];
            $i++;
        
    ?>
    <tr align="center">
        <td><?php echo $i;?> </td>
        <td><?php echo $prod_title;?></td>
        <td><img style="background-color: white;" src="./product_images/<?php echo $prod_image;?>" width="50" height="50"/></td>
        <td><?php echo $prod_price;?></td>
        <td><a href="index.php?edit_prod=<?php echo $prod_id;?>">Edit</a></td>
        <td><a href="index.php?delete_prod=<?php echo $prod_id;?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>